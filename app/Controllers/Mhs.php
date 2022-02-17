<?php

namespace App\Controllers;

use App\Models\ModelKrs;
use App\Models\ModelTa;

class Mhs extends BaseController
{
    public function __construct()
    {
        $this->ModelTa = new ModelTa();
        $this->ModelKrs = new ModelKrs();
    }

    public function index()
    {
        $data = [
            'title'         => 'Dashboard',
            'mhs'           => $this->ModelKrs->dataMahasiswa(),
            'ta'            => $this->ModelTa->ta_aktif(),
            'isi'           => 'v_dashboard-mhs',
        ];

        return view('layout/v_wrapper', $data);
    }

    public function absensi()
    {
        // detail mhs by session login
        $id_mhs = $this->ModelKrs->dataMahasiswa();
        $ta     = $this->ModelTa->ta_aktif();

        $data = [
            'title'         => 'Absensi',
            'isi'           => 'mahasiswa/v_absensi',
            'ta'            => $this->ModelTa->ta_aktif(),
            'dataMakul'     => $this->ModelKrs->dataKrs($id_mhs['id_mhs'], $ta['id_ta']),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function khs()
    {
        // detail mhs by session login
        $id_mhs = $this->ModelKrs->dataMahasiswa();

        // dd($id_mhs['nama_kelas']);
        $ta     = $this->ModelTa->ta_aktif();

        $data = [
            'title'         => 'Kartu Hasil Studi (KHS)',
            'isi'           => 'mahasiswa/v_khs',
            'ta'            => $this->ModelTa->ta_aktif(),
            'mhs'           => $this->ModelKrs->dataMahasiswa(),
            'dataMakul'     => $this->ModelKrs->dataKrs($id_mhs['id_mhs'], $ta['id_ta']),
            'krsId'         => $this->ModelKrs->dataKrsById($id_mhs['id_mhs'], $ta['id_ta']),
            'jadwalTawar'   => $this->ModelKrs->makulTawar($ta['id_ta'], $id_mhs['id_prodi']),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function printKHS()
    {
        // detail mhs by session login
        $id_mhs = $this->ModelKrs->dataMahasiswa();

        // dd($id_mhs['nama_kelas']);
        $ta     = $this->ModelTa->ta_aktif();

        $data = [
            'title'         => 'Cetak KHS',
            'ta'            => $this->ModelTa->ta_aktif(),
            'mhs'           => $this->ModelKrs->dataMahasiswa(),
            'dataMakul'     => $this->ModelKrs->dataKrs($id_mhs['id_mhs'], $ta['id_ta']),
            'krsId'         => $this->ModelKrs->dataKrsById($id_mhs['id_mhs'], $ta['id_ta']),
            'jadwalTawar'   => $this->ModelKrs->makulTawar($ta['id_ta'], $id_mhs['id_prodi']),
        ];

        return view('mahasiswa/v_print-khs', $data);
    }
}
