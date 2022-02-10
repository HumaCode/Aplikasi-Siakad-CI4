<?php

namespace App\Controllers;

use App\Models\ModelMakul;
use App\Models\ModelProdi;

class Makul extends BaseController
{
    public function __construct()
    {
        $this->ModelMakul = new ModelMakul();
        $this->ModelProdi = new ModelProdi();
    }

    public function index()
    {
        $data = [
            'title'     => 'Mata Kuliah',
            'isi'       => 'admin/makul/v_makul',
            'prodi'     => $this->ModelProdi->allData(),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function detail($id_prodi)
    {
        $data = [
            'title'     => 'Detail Mata Kuliah',
            'isi'       => 'admin/makul/v_detail-makul',
            'prodi'     => $this->ModelProdi->dataId($id_prodi),
            'makul'     => $this->ModelMakul->allDataMakul($id_prodi),
        ];

        return view('layout/v_wrapper', $data);
    }
}
