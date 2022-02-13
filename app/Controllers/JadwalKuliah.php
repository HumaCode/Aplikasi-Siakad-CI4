<?php

namespace App\Controllers;

use App\Models\ModelDosen;
use App\Models\ModelJadwalKuliah;
use App\Models\ModelMakul;
use App\Models\ModelProdi;
use App\Models\ModelRuangan;
use App\Models\ModelTa;

class jadwalKuliah extends BaseController
{
    public function __construct()
    {
        $this->ModelTa = new ModelTa();
        $this->ModelProdi = new ModelProdi();
        $this->ModelJadwalKuliah = new ModelJadwalKuliah();
        $this->ModelMakul = new ModelMakul();
        $this->ModelDosen = new ModelDosen();
        $this->ModelRuangan = new ModelRuangan();
    }

    public function index()
    {
        $data = [
            'title' => 'Jadwal Kuliah',
            'isi'   => 'admin/jadwal-kuliah/v_index',
            'ta'    => $this->ModelTa->ta_aktif(),
            'prodi' => $this->ModelProdi->allData(),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function detailJadwal($id_prodi)
    {
        $data = [
            'title'     => 'Detail Jadwal',
            'isi'       => 'admin/jadwal-kuliah/v_detail-makul',
            'ta'        => $this->ModelTa->ta_aktif(),
            'prodi'     => $this->ModelProdi->dataId($id_prodi),
            'jadwal'    => $this->ModelJadwalKuliah->allData($id_prodi),
            'makul'     => $this->ModelJadwalKuliah->makul($id_prodi),
            'dosen'     => $this->ModelDosen->allData(),
            'kelas'     => $this->ModelJadwalKuliah->kelas($id_prodi),
            'ruangan'     => $this->ModelRuangan->allData(),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function add($id_prodi)
    {
        // validasi
        if ($this->validate([
            'makul' => [
                'label' => 'Mata Kuliah',
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
            'kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!'
                ]
            ],
            'hari' => [
                'label' => 'Hari',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                ]
            ],
            'jam' => [
                'label' => 'Jam',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                ]
            ],
            'ruangan' => [
                'label' => 'Ruangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                ]
            ],
            'kuota' => [
                'label' => 'Kuota',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!',
                ]
            ],
        ])) {

            $id_ta = $this->ModelTa->ta_aktif();

            $data = [
                'id_prodi'          => $id_prodi,
                'id_ta'             => $id_ta['id_ta'],
                'id_kelas'          => htmlspecialchars($this->request->getVar('kelas')),
                'id_makul'          => htmlspecialchars($this->request->getVar('makul')),
                'id_dosen'          => htmlspecialchars($this->request->getVar('dosen')),
                'hari'              => htmlspecialchars($this->request->getVar('hari')),
                'waktu'             => htmlspecialchars($this->request->getVar('jam')),
                'id_ruangan'        => htmlspecialchars($this->request->getVar('ruangan')),
                'kuota'             => htmlspecialchars($this->request->getVar('kuota')),
            ];


            // masukan ke dalam model
            $this->ModelJadwalKuliah->add($data);

            session()->setFlashdata('pesan', 'Jadwal kuliah berhasil di tambahkan...!!!');
            return redirect()->to('jadwalKuliah/detailJadwal/' . $id_prodi);
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('jadwalKuliah/detailJadwal/' . $id_prodi);
        }
    }

    public function hapus($id_jadwal, $id_prodi)
    {

        // masukan ke dalam model
        $this->ModelJadwalKuliah->hapus($id_jadwal);

        session()->setFlashdata('pesan', 'Data berhasil di hapus...!!!');
        return redirect()->to('jadwalKuliah/detailJadwal/' . $id_prodi);
    }
}
