<?php

namespace App\Controllers;

use App\Models\ModelDosen;
use App\Models\ModelKelas;
use App\Models\ModelProdi;

class Kelas extends BaseController
{
    public function __construct()
    {
        $this->ModelKelas = new ModelKelas();
        $this->ModelProdi = new ModelProdi();
        $this->ModelDosen = new ModelDosen();
    }

    public function index()
    {
        $data = [
            'title'     => 'Kelas',
            'isi'       => 'admin/kelas/v_kelas',
            'kelas'     => $this->ModelKelas->allData(),
            'prodi'     => $this->ModelProdi->allData(),
            'dosen'     => $this->ModelDosen->allData(),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        // validasi
        if ($this->validate([
            'kelas' => [
                'label' => 'Nama Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                ]
            ],
            'prodi' => [
                'label' => 'Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                ]
            ],
            'dosen' => [
                'label' => 'Nama Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                ]
            ],
            'th_angkatan' => [
                'label' => 'Tahun Angkatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!'
                ]
            ],
        ])) {
            $data = [
                'nama_kelas'        => htmlspecialchars($this->request->getVar('kelas')),
                'id_prodi'          => htmlspecialchars($this->request->getVar('prodi')),
                'id_dosen'          => htmlspecialchars($this->request->getVar('dosen')),
                'th_angkatan'       => htmlspecialchars($this->request->getVar('th_angkatan')),
            ];

            // masukan ke dalam model
            $this->ModelKelas->add($data);

            session()->setFlashdata('pesan', 'Data kelas berhasil di tambahkan...!!!');
            return redirect()->to('kelas');
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('kelas');
        }
    }

    public function hapus($id_kelas)
    {

        // masukan ke dalam model
        $this->ModelKelas->hapus($id_kelas);

        session()->setFlashdata('pesan', 'Data kelas berhasil di hapus...!!!');
        return redirect()->to('kelas');
    }

    public function detailKelas($id_kelas)
    {
        $kelas = $this->ModelKelas->detail($id_kelas);

        $data = [
            'title'     => 'Kelas ' . $kelas['nama_kelas'],
            'isi'       => 'admin/kelas/v_detail-kelas',
            'kelas'     => $kelas,
            'mhs'       => $this->ModelKelas->mhsByKelas($id_kelas),
            'mhsAll'    => $this->ModelKelas->mhsAll(),
            'jml'       => $this->ModelKelas->jmlMhs($id_kelas),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function tambahAnggota($id_mhs, $id_kelas)
    {
        $data = [
            'id_kelas'   => $id_kelas
        ];

        // masukan ke dalam model
        $this->ModelKelas->edit($id_mhs, $data);

        session()->setFlashdata('pesan', 'Anggota berhasil di tambahkan...!!!');
        return redirect()->to('kelas/detailKelas/' . $id_kelas);
    }

    public function hapusAnggota($id_mhs, $id_kelas)
    {
        $data = [
            'id_kelas'   => null
        ];

        // masukan ke dalam model
        $this->ModelKelas->edit($id_mhs, $data);

        session()->setFlashdata('pesan', 'Anggota berhasil di hapus...!!!');
        return redirect()->to('kelas/detailKelas/' . $id_kelas);
    }
}
