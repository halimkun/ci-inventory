<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Barang extends BaseController
{
    protected $barang;
    protected $aktivitas;

    public function __construct()
    {
        $this->barang = new \App\Models\BarangModel();
        $this->aktivitas = new \App\Models\AktivitasModel();
    }

    public function index()
    {
        return view("barang/index", [
            'segment' => $this->request->uri->getSegments(),
            'barang' => $this->barang->findAll()
        ]);
    }

    public function add()
    {
        
        if (isset($_GET['item'])) {
            $item = $_GET['item'];
        } else {
            $item = '';
        }

        return view("barang/add", [
            'segment' => $this->request->uri->getSegments(),
            'barang' => $this->barang->findAll(),
            'aktivitas' => $this->aktivitas->where('type', 'add')->findAll(),
            'item' => $item
        ]);
    }

    public function min()
    {
        if (isset($_GET['item'])) {
            $item = $_GET['item'];
        } else {
            $item = '';
        }

        return view("barang/min", [
            'segment' => $this->request->uri->getSegments(),
            'barang' => $this->barang->findAll(),
            'aktivitas' => $this->aktivitas->where('type', 'min')->findAll(),
            'item' => $item
        ]);
    }

    public function store()
    {
        $data = [
            "nama" => trim(strtolower($this->request->getVar("nama"))),
            "stok" => trim(strtolower($this->request->getVar("jumlah"))),
            "keterangan" => trim(strtolower($this->request->getVar("keterangan")))
        ];

        $old = $this->barang->where("nama", $data['nama'])->findAll();
        if (count($old) > 0) {
            session()->setFlashdata("error", "Data yang anda maksud sudah ada, silahkan tamba jumlah stok atau tambahkan data yang berbeda");
            return redirect()->to("/barang");
        } else {
            if ($this->barang->save($data)) {
                session()->setFlashdata("success", "Data barang berhasil ditambahkan");
                return redirect()->to("/barang");
            } else {
                session()->setFlashdata("error", "Data barang gagal ditambahkan");
                return redirect()->to("/barang");
            }
        }
    }

    public function add_stok()
    {
        $old = $this->barang->where("id", $this->request->getPost('barang'))->findAll();
        $new = $old[0]->stok + $this->request->getPost('stok');

        $data = [
            'id' => $this->request->getPost('barang'),
            'stok' => $new
        ];

        if (count($old) > 0) {
            if ($this->barang->save($data)) {
                // ? apakah keterangan diperlukan ?
                simpanAktifitas('add', $old[0]->nama, $this->request->getPost('stok'), $old[0]->stok);
                
                session()->setFlashdata("success", "Berhasil menambahkan stok barang");
                return redirect()->to("/barang/add");
            } else {
                session()->setFlashdata("error", "Gagal menambahkan stok barang");
                return redirect()->to("/barang/add");
            }
        } else {
            session()->setFlashdata("error", "Barang tidak ditemukan");
            return redirect()->to("/barang/add");
        }
    }
    
    public function min_stok()
    {
        $old = $this->barang->where("id", $this->request->getPost('barang'))->findAll();

        $data = [
            'id' => $this->request->getPost('barang'),
            'stok' => $old[0]->stok -= $this->request->getPost('stok')
        ];

        if (count($old) > 0) {
            if ($this->barang->save($data)) {
                simpanAktifitas('min', $old[0]->nama, $this->request->getPost('stok'), $old[0]->stok);

                session()->setFlashdata("success", "Berhasil menambahkan stok barang");
                return redirect()->to("/barang/min");
            } else {
                session()->setFlashdata("error", "Gagal menambahkan stok barang");
                return redirect()->to("/barang/min");
            }
        } else {
            session()->setFlashdata("error", "Barang tidak ditemukan");
            return redirect()->to("/barang/min");
        }
    }
}
