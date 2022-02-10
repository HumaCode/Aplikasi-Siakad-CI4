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

    public function add($id_prodi)
    {
        // validasi
        if ($this->validate([
            'kd_makul' => [
                'label' => 'Kode Mata Kuliah',
                'rules' => 'required|is_unique[tbl_makul.kd_makul]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                    'is_unique' => '{field} Sudah digunakan..!!',
                ]
            ],
            'makul' => [
                'label' => 'Mata Kuliah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                ]
            ],
            'sks' => [
                'label' => 'SKS',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!'
                ]
            ],
            'semester' => [
                'label' => 'Semester',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!'
                ]
            ],
            'kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!'
                ]
            ]
        ])) {
            $smt = $this->request->getVar('semester');
            if ($smt == 1 || $smt == 3 || $smt == 5 || $smt == 7) {
                $semester = 'Ganjil';
            } else {
                $semester = 'Genap';
            }

            $data = [
                'kd_makul'          => htmlspecialchars($this->request->getVar('kd_makul')),
                'makul'             => htmlspecialchars($this->request->getVar('makul')),
                'sks'               => htmlspecialchars($this->request->getVar('sks')),
                'kategori'          => htmlspecialchars($this->request->getVar('kategori')),
                'smt'               => htmlspecialchars($this->request->getVar('semester')),
                'semester'          => $semester,
                'kategori'          => htmlspecialchars($this->request->getVar('kategori')),
                'id_prodi'          => $id_prodi,
            ];

            // masukan ke dalam model
            $this->ModelMakul->add($data);

            session()->setFlashdata('pesan', 'Data makul berhasil di tambah...!!!');
            return redirect()->to('makul/detail/' . $id_prodi);
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('makul/detail/' . $id_prodi);
        }
    }

    public function hapus($id_prodi, $id_makul)
    {
        // masukan ke dalam model
        $this->ModelMakul->hapus($id_makul);

        session()->setFlashdata('pesan', 'Data makul berhasil di hapus...!!!');
        return redirect()->to('makul/detail/' . $id_prodi);
    }
}
