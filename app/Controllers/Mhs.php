<?php

namespace App\Controllers;

use App\Models\ModelHome;

class Mhs extends BaseController
{
    public function __construct()
    {
        $this->ModelHome = new ModelHome();
    }

    public function index()
    {
        $data = [
            'title'         => 'Dashboard',
            'isi'           => 'v_dashboard-mhs',
        ];

        return view('layout/v_wrapper', $data);
    }
}
