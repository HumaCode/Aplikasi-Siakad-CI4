<?php

namespace App\Controllers;

use App\Models\ModelMahasiswa;
use App\Models\ModelProdi;

class Mahasiswa extends BaseController
{
    public function __construct()
    {
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelProdi       = new ModelProdi();
    }

    public function index()
    {
        $data = [
            'title' => 'Mahasiswa',
            'isi'   => 'admin/mahasiswa/v_index',
            'mhs'   => $this->ModelMahasiswa->allData(),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title'     => 'Tambah Mahasiswa',
            'isi'       => 'admin/mahasiswa/v_add',
            'prodi'     => $this->ModelProdi->allData(),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        // validasi
        if ($this->validate([
            'nim' => [
                'label' => 'NIM',
                'rules' => 'required|is_unique[tbl_mhs.nim]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                    'is_unique' => '{field} sudah ada..!!'
                ]
            ],
            'nama' => [
                'label' => 'Nama Mahasiswa',
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
            'prodi' => [
                'label' => 'Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
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
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getRandomName();

            $data = [
                'nim'      => htmlspecialchars($this->request->getVar('nim')),
                'nama_mhs'          => htmlspecialchars($this->request->getVar('nama')),
                'id_prodi'    => htmlspecialchars($this->request->getVar('prodi')),
                'password'      => htmlspecialchars($this->request->getVar('password')),
                'foto'          => $nama_file,
            ];

            // masukan ke folder
            $foto->move('fotomhs', $nama_file);

            // masukan ke dalam model
            $this->ModelMahasiswa->add($data);

            session()->setFlashdata('pesan', 'Data mahasiswa berhasil di tambahkan...!!!');
            return redirect()->to('mahasiswa');
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('mahasiswa/add');
        }
    }

    public function edit($id_mhs)
    {

        $data = [
            'title'     => 'Edit Mahasiswa',
            'isi'       => 'admin/mahasiswa/v_edit',
            'mhs'       => $this->ModelMahasiswa->dataId($id_mhs),
            'prodi'     => $this->ModelProdi->allData(),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function update($id_mhs)
    {
        // validasi
        if ($this->validate([
            'nim' => [
                'label' => 'NIM',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                ]
            ],
            'nama' => [
                'label' => 'Nama Mahasiswa',
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
            'prodi' => [
                'label' => 'Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
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
            ],
        ])) {
            $foto = $this->request->getFile('foto');


            if ($foto->getError() == 4) {
                $data = [
                    'nim'               => htmlspecialchars($this->request->getVar('nim')),
                    'nama_mhs'          => htmlspecialchars($this->request->getVar('nama')),
                    'id_prodi'          => htmlspecialchars($this->request->getVar('prodi')),
                    'password'          => htmlspecialchars($this->request->getVar('password')),
                ];
            } else {
                // hapus foto lama
                $mhs = $this->ModelMahasiswa->dataId($id_mhs);

                if ($mhs['foto'] != "default.png") {
                    unlink('fotomhs/' . $mhs['foto']);
                }


                $nama_file = $foto->getRandomName();

                $data = [
                    'nim'      => htmlspecialchars($this->request->getVar('nim')),
                    'nama_mhs'          => htmlspecialchars($this->request->getVar('nama')),
                    'id_prodi'    => htmlspecialchars($this->request->getVar('prodi')),
                    'password'      => htmlspecialchars($this->request->getVar('password')),
                    'foto'          => $nama_file,
                ];

                // masukan ke folder
                $foto->move('fotomhs', $nama_file);
            }



            // masukan ke dalam model
            $this->ModelMahasiswa->edit($id_mhs, $data);

            session()->setFlashdata('pesan', 'Data mahasiswa berhasil di edit...!!!');
            return redirect()->to('mahasiswa');
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('mahasiswa/edits');
        }
    }

    public function hapus($id_mhs)
    {
        // hapus foto lama
        $mhs = $this->ModelMahasiswa->dataId($id_mhs);

        if ($mhs['foto'] != "") {
            unlink('fotomhs/' . $mhs['foto']);
        }

        // masukan ke dalam model
        $this->ModelMahasiswa->hapus($id_mhs);

        session()->setFlashdata('pesan', 'Data mahasiswa berhasil di hapus...!!!');
        return redirect()->to('mahasiswa');
    }
}
