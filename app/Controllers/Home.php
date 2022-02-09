<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'isi' => 'v_home',
        ];

        return view('layout/v_wrapper', $data);
    }
}
