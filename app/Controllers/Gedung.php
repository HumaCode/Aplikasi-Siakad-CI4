<?php

namespace App\Controllers;

use App\Models\ModelGedung;

class Gedung extends BaseController
{
    public function __construct()
    {
        $this->ModelGedung = new ModelGedung();
    }

    public function index()
    {
        $data = [
            'title'     => 'Gedung',
            'isi'       => 'admin/v_gedung',
            'gedung'    => $this->ModelGedung->allData()
        ];

        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'gedung' => htmlspecialchars($this->request->getVar('gedung'))
        ];

        // masukan ke dalam model
        $this->ModelGedung->add($data);

        session()->setFlashdata('pesan', 'Data Gedung berhasil di tambahkan...!!!');
        return redirect()->to('gedung');
    }

    public function edit($id_gedung)
    {

        $data = [
            'gedung' => htmlspecialchars($this->request->getVar('gedung'))
        ];

        // masukan ke dalam model
        $this->ModelGedung->edit($id_gedung, $data);

        session()->setFlashdata('pesan', 'Data Gedung berhasil di edit...!!!');
        return redirect()->to('gedung');
    }

    public function hapus($id_gedung)
    {
        // masukan ke dalam model
        $this->ModelGedung->hapus($id_gedung);

        session()->setFlashdata('pesan', 'Data Gedung berhasil di hapus...!!!');
        return redirect()->to('gedung');
    }
}
