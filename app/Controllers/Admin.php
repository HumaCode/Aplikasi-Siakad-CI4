<?php

namespace App\Controllers;

use App\Models\ModelHome;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelHome = new ModelHome();
    }

    public function index()
    {
        $data = [
            'title'         => 'Dashboard',
            'isi'           => 'v_admin',
            'jmlGedung'     => $this->ModelHome->jmlGedung(),
            'jmlRuangan'    => $this->ModelHome->jmlRuangan(),
            'jmlFakultas'   => $this->ModelHome->jmlFakultas(),
            'jmlProdi'      => $this->ModelHome->jmlProdi(),
            'jmlDosen'      => $this->ModelHome->jmlDosen(),
            'jmlMhs'        => $this->ModelHome->jmlMhs(),
            'jmlMakul'      => $this->ModelHome->jmlMakul(),
            'jmlUser'       => $this->ModelHome->jmlUser(),
        ];

        return view('layout/v_wrapper', $data);
    }
}
