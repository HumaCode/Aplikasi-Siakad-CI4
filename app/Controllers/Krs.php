<?php

namespace App\Controllers;

use App\Models\ModelKrs;
use App\Models\ModelTa;

class Krs extends BaseController
{
    public function __construct()
    {
        $this->ModelTa = new ModelTa();
        $this->ModelKrs = new ModelKrs();
    }

    public function index()
    {
        $data = [
            'title'         => 'Kartu Rencana Studi (KRS)',
            'isi'           => 'mahasiswa/krs/v_krs',
            'ta'            => $this->ModelTa->ta_aktif(),
            'mhs'           => $this->ModelKrs->dataMahasiswa(),
            'jadwalTawar'   => $this->ModelKrs->makulTawar(),
        ];

        return view('layout/v_wrapper', $data);
    }
}
