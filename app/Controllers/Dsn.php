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
            'dsn'         => $this->ModelDsn->dataDosen(),
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

    public function simpanNilai($id_jadwal)
    {
        $mhs = $this->ModelDsn->mhs($id_jadwal);

        foreach ($mhs as $key => $value) {

            // nilai akhir
            $absen  = $this->request->getPost($value['id_krs'] . 'absen');
            $tugas  = $this->request->getPost($value['id_krs'] . 'nilai_tugas');
            $uts    = $this->request->getPost($value['id_krs'] . 'nilai_uts');
            $uas    = $this->request->getPost($value['id_krs'] . 'nilai_uas');

            $na = ($absen * 15 / 100) + ($tugas * 15 / 100) + ($uts * 30 / 100) + ($uas * 40 / 100);


            // nilai huruf 
            if ($na >= 85) {
                $nh     = 'A';
                $bobot  = 4;
            } else if ($na < 85 && $na >= 75) {
                $nh     = 'B';
                $bobot  = 3;
            } else if ($na < 75 && $na >= 65) {
                $nh     = 'C';
                $bobot  = 2;
            } else if ($na < 65 && $na >= 55) {
                $nh     = 'D';
                $bobot  = 1;
            } else {
                $nh     = 'E';
                $bobot  = 0;
            }


            $data = [
                'id_krs'        => $this->request->getPost($value['id_krs'] . 'id_krs'),
                'nilai_tugas'   => $this->request->getPost($value['id_krs'] . 'nilai_tugas'),
                'nilai_uts'     => $this->request->getPost($value['id_krs'] . 'nilai_uts'),
                'nilai_uas'     => $this->request->getPost($value['id_krs'] . 'nilai_uas'),
                'nilai_akhir'   => number_format($na, 0),
                'nilai_huruf'   => $nh,
                'bobot'         => $bobot,
            ];

            $this->ModelDsn->simpanNilai($data);
        }

        session()->setFlashdata('pesan', 'Nilai berhasil di simpan...!!!');
        return redirect()->to('dsn/dataNilai/' . $id_jadwal);
    }

    public function printNilai($id_jadwal)
    {
        $ta         =  $this->ModelTa->ta_aktif();

        $data = [
            'title'         => 'Nilai Mahasiswa Tahun Akademik ' . $ta['ta'] . ' | ' . $ta['semester'],
            'detailJadwal'  => $this->ModelDsn->detailJadwal($id_jadwal),
            'mhs'           => $this->ModelDsn->mhs($id_jadwal),
            'ta'            => $ta,
        ];

        return view('dosen/nilai/v_print-nilai', $data);
    }
}
