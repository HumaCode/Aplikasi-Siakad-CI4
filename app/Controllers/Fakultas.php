<?php

namespace App\Controllers;

use App\Models\ModelFakultas;

class Fakultas extends BaseController
{
    public function __construct()
    {
        $this->ModelFakultas = new ModelFakultas();
    }

    public function index()
    {
        $data = [
            'title'     => 'Fakultas',
            'isi'       => 'admin/v_fakultas',
            'fakultas'  => $this->ModelFakultas->allData()
        ];

        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'fakultas' => htmlspecialchars($this->request->getVar('fakultas'))
        ];

        // masukan ke dalam model
        $this->ModelFakultas->add($data);

        session()->setFlashdata('pesan', 'Data Fakultas berhasil di tambahkan...!!!');
        return redirect()->to('fakultas');
    }
}
