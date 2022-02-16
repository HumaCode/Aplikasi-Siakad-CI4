<?php

namespace App\Controllers;

use App\Models\ModelDsn;
use App\Models\ModelTa;

class Dsn extends BaseController
{
    public function __construct()
    {
        $this->ModelDsn = new ModelDsn();
        $this->ModelTa = new ModelTa();
    }

    public function index()
    {
        $data = [
            'title'         => 'Dashboard',
            'isi'           => 'v_dashboard-dosen',
        ];

        return view('layout/v_wrapper', $data);
    }

    public function jadwal()
    {
        $id_dosen   = $this->ModelDsn->dataDosen();
        $ta         =  $this->ModelTa->ta_aktif();

        $data = [
            'title'         => 'Jadwal Mengajar',
            'isi'           => 'dosen/v_jadwal-mengajar',
            'ta'            => $ta,
            'jadwal'        => $this->ModelDsn->jadwalDosen($id_dosen['id_dosen'], $ta['id_ta']),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function absenKelas()
    {
        $id_dosen = $this->ModelDsn->dataDosen();
        $ta         =  $this->ModelTa->ta_aktif();

        $data = [
            'title'         => 'Absensi Kelas',
            'isi'           => 'dosen/absensi/v_absensi-kelas',
            'ta'            => $ta,
            'jadwal'        => $this->ModelDsn->jadwalDosen($id_dosen['id_dosen'], $ta['id_ta']),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function absensi($id_jadwal)
    {
        $data = [
            'title'         => 'Daftar Absensi',
            'isi'           => 'dosen/absensi/v_absensi',
            'detailJadwal'  => $this->ModelDsn->detailJadwal($id_jadwal),
            'mhs'           => $this->ModelDsn->mhs($id_jadwal),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function simpanAbsen($id_jadwal)
    {
        $mhs = $this->ModelDsn->mhs($id_jadwal);

        foreach ($mhs as $key => $value) {
            $data = [
                'id_krs' => $this->request->getPost($value['id_krs'] . 'id_krs'),
                'p1' => $this->request->getPost($value['id_krs'] . 'p1'),
                'p2' => $this->request->getPost($value['id_krs'] . 'p2'),
                'p3' => $this->request->getPost($value['id_krs'] . 'p3'),
                'p4' => $this->request->getPost($value['id_krs'] . 'p4'),
                'p5' => $this->request->getPost($value['id_krs'] . 'p5'),
                'p6' => $this->request->getPost($value['id_krs'] . 'p6'),
                'p7' => $this->request->getPost($value['id_krs'] . 'p7'),
                'p8' => $this->request->getPost($value['id_krs'] . 'p8'),
                'p9' => $this->request->getPost($value['id_krs'] . 'p9'),
                'p10' => $this->request->getPost($value['id_krs'] . 'p10'),
                'p11' => $this->request->getPost($value['id_krs'] . 'p11'),
                'p12' => $this->request->getPost($value['id_krs'] . 'p12'),
                'p13' => $this->request->getPost($value['id_krs'] . 'p13'),
                'p14' => $this->request->getPost($value['id_krs'] . 'p14'),
                'p15' => $this->request->getPost($value['id_krs'] . 'p15'),
                'p16' => $this->request->getPost($value['id_krs'] . 'p16'),
                'p17' => $this->request->getPost($value['id_krs'] . 'p17'),
                'p18' => $this->request->getPost($value['id_krs'] . 'p18'),
                'nilai_absen' => $this->request->getPost($value['id_krs'] . 'nilai_absen'),
            ];

            $this->ModelDsn->simpanAbsen($data);
        }

        session()->setFlashdata('pesan', 'Absensi berhasil di simpan...!!!');
        return redirect()->to('dsn/absensi/' . $id_jadwal);
    }

    public function printAbsensi($id_jadwal)
    {

        $data = [
            'title'         => 'Print Absensi',
            'detailJadwal'  => $this->ModelDsn->detailJadwal($id_jadwal),
            'mhs'           => $this->ModelDsn->mhs($id_jadwal),
        ];

        return view('dosen/absensi/v_print-absensi', $data);
    }

    public function nilaiMhs()
    {
        $id_dosen = $this->ModelDsn->dataDosen();
        $ta         =  $this->ModelTa->ta_aktif();

        $data = [
            'title'         => 'Nilai Mahasiswa',
            'isi'           => 'dosen/nilai/v_nilai-mhs',
            'ta'            => $ta,
            'jadwal'        => $this->ModelDsn->jadwalDosen($id_dosen['id_dosen'], $ta['id_ta']),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function dataNilai($id_jadwal)
    {
        $id_dosen = $this->ModelDsn->dataDosen();
        $ta         =  $this->ModelTa->ta_aktif();

        $data = [
            'title'         => 'Data Nilai Mahasiswa',
            'isi'           => 'dosen/nilai/v_data-nilai',
            'detailJadwal'  => $this->ModelDsn->detailJadwal($id_jadwal),
            'mhs'           => $this->ModelDsn->mhs($id_jadwal),
            'ta'            => $ta,
        ];

        return view('layout/v_wrapper', $data);
    }
}
