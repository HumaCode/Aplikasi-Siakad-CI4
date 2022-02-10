<?php

namespace App\Controllers;

use App\Models\ModelFakultas;
use App\Models\ModelProdi;

class Prodi extends BaseController
{
    public function __construct()
    {
        $this->ModelProdi = new ModelProdi();
        $this->ModelFakultas = new ModelFakultas();
    }

    public function index()
    {
        $data = [
            'title'     => 'Program Study',
            'isi'       => 'admin/prodi/v_index',
            'prodi'     => $this->ModelProdi->allData()
        ];

        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title'     => 'Tambah Prodi',
            'isi'       => 'admin/prodi/v_add',
            'fakultas'  => $this->ModelFakultas->allData()
        ];

        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        // validasi
        if ($this->validate([
            'fakultas' => [
                'label' => 'Fakultas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!'
                ]
            ],
            'kd_prodi' => [
                'label' => 'Kode Prodi',
                'rules' => 'required|is_unique[tbl_prodi.kd_prodi]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                    'is_unique' => '{field} sudah ada..!!'
                ]
            ],
            'prodi' => [
                'label' => 'Peodi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!'
                ]
            ]
        ])) {
            $data = [
                'id_fakultas'   => htmlspecialchars($this->request->getVar('fakultas')),
                'kd_prodi'      => htmlspecialchars($this->request->getVar('kd_prodi')),
                'prodi'         => htmlspecialchars($this->request->getVar('prodi')),
                'jenjang'       => htmlspecialchars($this->request->getVar('jenjang')),
            ];

            // masukan ke dalam model
            $this->ModelProdi->add($data);

            session()->setFlashdata('pesan', 'Data Prodi berhasil di tambahkan...!!!');
            return redirect()->to('prodi');
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('prodi/add');
        }
    }

    public function edit($id_prodi)
    {

        $data = [
            'title'     => 'Edit Prodi',
            'isi'       => 'admin/prodi/v_edit',
            'fakultas'  => $this->ModelFakultas->allData(),
            'prodi'     => $this->ModelProdi->dataId($id_prodi),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function update($id_prodi)
    {
        // validasi
        if ($this->validate([
            'fakultas' => [
                'label' => 'Fakultas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!'
                ]
            ],
            'kd_prodi' => [
                'label' => 'Kode Prodi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                ]
            ],
            'prodi' => [
                'label' => 'Peodi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!'
                ]
            ]
        ])) {
            $data = [
                'id_fakultas'   => htmlspecialchars($this->request->getVar('fakultas')),
                'kd_prodi'      => htmlspecialchars($this->request->getVar('kd_prodi')),
                'prodi'         => htmlspecialchars($this->request->getVar('prodi')),
                'jenjang'       => htmlspecialchars($this->request->getVar('jenjang')),
            ];

            // masukan ke dalam model
            $this->ModelProdi->edit($id_prodi, $data);

            session()->setFlashdata('pesan', 'Data Prodi berhasil di diubah...!!!');
            return redirect()->to('prodi');
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('ruangan/edit/' . $id_prodi);
        }
    }

    public function hapus($id_prodi)
    {
        // masukan ke dalam model
        $this->ModelProdi->hapus($id_prodi);

        session()->setFlashdata('pesan', 'Data prodi berhasil di hapus...!!!');
        return redirect()->to('prodi');
    }
}
