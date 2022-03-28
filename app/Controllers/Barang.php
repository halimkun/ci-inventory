<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Barang extends BaseController
{
    protected $barang;

    public function __construct()
    {
        $this->barang = new \App\Models\BarangModel();
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
            'item' => $item
        ]);
    }

    public function min()
    {
        return view("barang/min", [
            'segment' => $this->request->uri->getSegments(),
            'barang' => $this->barang->findAll()
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

        $data = [
            'id' => $this->request->getPost('barang'),
            'stok' => $old[0]->stok += $this->request->getPost('stok')
        ];

        if (count($old) > 0) {
            if ($this->barang->save($data)) {
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
