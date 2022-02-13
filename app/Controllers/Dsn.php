<?php

namespace App\Controllers;


class Dsn extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title'         => 'Dashboard',
            'isi'           => 'v_dashboard-dosen',
        ];

        return view('layout/v_wrapper', $data);
    }
}
