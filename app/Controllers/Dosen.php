<?php

namespace App\Controllers;

use App\Models\ModelDosen;

class Dosen extends BaseController
{
    public function __construct()
    {
        $this->ModelDosen = new ModelDosen();
    }

    public function index()
    {
        $data = [
            'title' => 'Dosen',
            'isi'   => 'admin/dosen/v_index',
            'dosen' => $this->ModelDosen->allData(),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title'     => 'Tambah Dosen',
            'isi'       => 'admin/dosen/v_add'
        ];

        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        // validasi
        if ($this->validate([
            'kd_dosen' => [
                'label' => 'Kode Dosen',
                'rules' => 'required|is_unique[tbl_dosen.kd_dosen]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                    'is_unique' => '{field} sudah ada..!!'
                ]
            ],
            'nidn' => [
                'label' => 'NIDN',
                'rules' => 'required|is_unique[tbl_dosen.nidn]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                    'is_unique' => '{field} sudah ada..!!'
                ]
            ],
            'nama' => [
                'label' => 'Nama Dosen',
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
                'kd_dosen'      => htmlspecialchars($this->request->getVar('kd_dosen')),
                'nidn'          => htmlspecialchars($this->request->getVar('nidn')),
                'nama_dosen'    => htmlspecialchars($this->request->getVar('nama')),
                'foto'          => $nama_file,
                'password'      => htmlspecialchars($this->request->getVar('password')),
            ];

            // masukan ke folder
            $foto->move('fotodosen', $nama_file);

            // masukan ke dalam model
            $this->ModelDosen->add($data);

            session()->setFlashdata('pesan', 'Data dosen berhasil di tambahkan...!!!');
            return redirect()->to('dosen');
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('dosen/add');
        }
    }

    public function edit($id_dosen)
    {

        $data = [
            'title'     => 'Edit Dosen',
            'isi'       => 'admin/dosen/v_edit',
            'dosen'     => $this->ModelDosen->dataId($id_dosen),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function update($id_dosen)
    {

        // dd(htmlspecialchars($this->request->getVar('nama')));
        // validasi
        if ($this->validate([
            'kd_dosen' => [
                'label' => 'Kode Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                ]
            ],
            'nidn' => [
                'label' => 'NIDN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                ]
            ],
            'nama' => [
                'label' => 'Nama Dosen',
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
                    'min_length' => '{field} minimal 5 karakter..!!',
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} maksimal 1 Mb..!!',
                    'mime_in' => '{field} yang anda upload bukan foto..!!',
                ]
            ]
        ])) {
            $foto = $this->request->getFile('foto');

            if ($foto->getError() == 4) {
                $data = [
                    'kd_dosen'      => htmlspecialchars($this->request->getVar('kd_dosen')),
                    'nidn'          => htmlspecialchars($this->request->getVar('nidn')),
                    'nama_dosen'    => htmlspecialchars($this->request->getVar('nama')),
                    'password'      => htmlspecialchars($this->request->getVar('password')),
                ];

                // masukan ke dalam model
                $this->ModelDosen->edit($id_dosen, $data);
            } else {
                // hapus foto lama
                $dosen = $this->ModelDosen->dataId($id_dosen);

                if ($dosen['foto'] != "default.png") {
                    unlink('fotodosen/' . $dosen['foto']);
                }

                $nama_file = $foto->getRandomName();

                $data = [
                    'kd_dosen'      => htmlspecialchars($this->request->getVar('kd_dosen')),
                    'nidn'          => htmlspecialchars($this->request->getVar('nidn')),
                    'nama_dosen'    => htmlspecialchars($this->request->getVar('nama')),
                    'foto'          => $nama_file,
                    'password'      => htmlspecialchars($this->request->getVar('password')),
                ];

                // masukan ke folder
                $foto->move('fotodosen', $nama_file);

                // masukan ke dalam model
                $this->ModelDosen->edit($id_dosen, $data);
            }


            session()->setFlashdata('pesan', 'Data dosen berhasil di tambahkan...!!!');
            return redirect()->to('dosen');
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('dosen/add');
        }
    }

    public function hapus($id_dosen)
    {
        // hapus foto lama
        $dosen = $this->ModelDosen->dataId($id_dosen);

        if ($dosen['foto'] != "") {
            unlink('fotodosen/' . $dosen['foto']);
        }

        // masukan ke dalam model
        $this->ModelDosen->hapus($id_dosen);

        session()->setFlashdata('pesan', 'Data dosen berhasil di hapus...!!!');
        return redirect()->to('dosen');
    }
}
