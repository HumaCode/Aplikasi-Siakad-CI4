<?php

namespace App\Controllers;

use App\Models\ModelDsn;

class Dsn extends BaseController
{
    public function __construct()
    {
        $this->ModelDsn = new ModelDsn();
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
        $id_dosen = $this->ModelDsn->dataDosen();

        $data = [
            'title'         => 'Jadwal Mengajar',
            'isi'           => 'dosen/v_jadwal-mengajar',
            'jadwal'        => $this->ModelDsn->jadwalDosen($id_dosen['id_dosen']),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function absenKelas()
    {
        $id_dosen = $this->ModelDsn->dataDosen();

        $data = [
            'title'         => 'Absensi Kelas',
            'isi'           => 'dosen/absensi/v_absensi-kelas',
            'jadwal'        => $this->ModelDsn->jadwalDosen($id_dosen['id_dosen']),
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
}
