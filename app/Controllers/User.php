<?php

namespace App\Controllers;

use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'title'     => 'User',
            'isi'       => 'admin/v_user',
            'user'      => $this->ModelUser->allData()
        ];

        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        // validasi
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[tbl_user.username]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                    'is_unique' => '{field} sudah dipakai user lain..!!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                    'min_length' => '{field} minimal 5 karakter..!!',
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} tidak boleh kosong..!!',
                    'max_size' => '{field} maksimal 1 Mb..!!',
                    'mime_in' => '{field} yang anda upload bukan foto..!!',
                ]
            ]
        ])) {

            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getRandomName();


            $data = [
                'nama_user'  => htmlspecialchars($this->request->getVar('nama_user')),
                'username'   => htmlspecialchars($this->request->getVar('username')),
                'password'   => htmlspecialchars($this->request->getVar('password')),
                'foto'       => $nama_file,
            ];

            // masukan ke folder
            $foto->move('foto', $nama_file);

            // masukan ke dalam model
            $this->ModelUser->add($data);

            session()->setFlashdata('pesan', 'Data user berhasil di tambahkan...!!!');
            return redirect()->to('user');
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('user');
        }
    }
}
