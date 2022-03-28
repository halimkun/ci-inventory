<?php

namespace App\Controllers;

class Home extends BaseController
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
}
