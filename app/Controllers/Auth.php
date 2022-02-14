<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'isi' => 'v_login',
        ];

        return view('layout/v_wrapper', $data);
    }

    public function cek_login()
    {
        // validasi
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!'
                ]
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                    'min_length' => '{field} minimal 5 karakter..!!'
                ]
            ]
        ])) {
            $level = $this->request->getVar('level');
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');


            // jika valid
            if ($level == 1) {
                $cek_user = $this->ModelAuth->login_user($username, $password);

                if ($cek_user) {
                    // buat session
                    session()->set('nama_user', $cek_user['nama_user']);
                    session()->set('username', $cek_user['username']);
                    session()->set('foto', $cek_user['foto']);
                    session()->set('level', $level);
                    return redirect()->to('admin');
                } else {
                    session()->setFlashdata('pesan', 'Username atau Password salah...!!!');
                    return redirect()->to('auth');
                }
            } else if ($level == 2) {
                $cek_mhs = $this->ModelAuth->login_mhs($username, $password);

                if ($cek_mhs) {
                    // buat session
                    session()->set('nama_user', $cek_mhs['nama_mhs']);
                    session()->set('username', $cek_mhs['nim']);
                    session()->set('foto', $cek_mhs['foto_mhs']);
                    session()->set('level', $level);
                    return redirect()->to('mhs');
                } else {
                    session()->setFlashdata('pesan', 'Username atau Password salah...!!!');
                    return redirect()->to('auth');
                }
            } else if ($level == 3) {
                $cek_dosen = $this->ModelAuth->login_dosen($username, $password);

                if ($cek_dosen) {
                    // buat session
                    session()->set('nama_user', $cek_dosen['nama_dosen']);
                    session()->set('username', $cek_dosen['nidn']);
                    session()->set('foto', $cek_dosen['foto']);
                    session()->set('level', $level);
                    return redirect()->to('dsn');
                } else {
                    session()->setFlashdata('pesan', 'Username atau Password salah...!!!');
                    return redirect()->to('auth');
                }
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('auth');
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nama_user');
        session()->remove('username');
        session()->remove('foto');
        session()->remove('level');

        session()->setFlashdata('success', 'Berhasil logout...!!!');
        return redirect()->to('auth');
    }
}
