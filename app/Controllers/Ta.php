<?php

namespace App\Controllers;

use App\Models\ModelTa;

class Ta extends BaseController
{

    public function __construct()
    {
        $this->ModelTa = new ModelTa();
    }

    public function index()
    {
        $data = [
            'title' => 'Tahun Akademik',
            'isi'   => 'admin/v_tahun-akademik',
            'ta'    => $this->ModelTa->allData(),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'ta'        => htmlspecialchars($this->request->getVar('ta')),
            'semester'  => htmlspecialchars($this->request->getVar('semester')),
        ];

        // masukan ke dalam model
        $this->ModelTa->add($data);

        session()->setFlashdata('pesan', 'Data berhasil di tambahkan...!!!');
        return redirect()->to('ta');
    }

    public function edit($id_ta)
    {

        $data = [
            'ta'        => htmlspecialchars($this->request->getVar('ta')),
            'semester'  => htmlspecialchars($this->request->getVar('semester')),
        ];

        // masukan ke dalam model
        $this->ModelTa->edit($id_ta, $data);

        session()->setFlashdata('pesan', 'Data berhasil di edit...!!!');
        return redirect()->to('ta');
    }

    public function hapus($id_ta)
    {
        // masukan ke dalam model
        $this->ModelTa->hapus($id_ta);

        session()->setFlashdata('pesan', 'Data berhasil di hapus...!!!');
        return redirect()->to('ta');
    }
}
