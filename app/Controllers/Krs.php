<?php

namespace App\Controllers;

use App\Models\ModelKrs;
use App\Models\ModelTa;

class Krs extends BaseController
{
    public function __construct()
    {
        $this->ModelTa = new ModelTa();
        $this->ModelKrs = new ModelKrs();
    }

    public function index()
    {
        // detail mhs by session login
        $id_mhs = $this->ModelKrs->dataMahasiswa();

        // dd($id_mhs['nama_kelas']);
        $ta     = $this->ModelTa->ta_aktif();

        $data = [
            'title'         => 'Kartu Rencana Studi (KRS)',
            'isi'           => 'mahasiswa/krs/v_krs',
            'ta'            => $this->ModelTa->ta_aktif(),
            'mhs'           => $this->ModelKrs->dataMahasiswa(),
            'dataMakul'     => $this->ModelKrs->dataKrs($id_mhs['id_mhs'], $ta['id_ta']),
            'krsId'         => $this->ModelKrs->dataKrsById($id_mhs['id_mhs'], $ta['id_ta']),
            'jadwalTawar'   => $this->ModelKrs->makulTawar($ta['id_ta'], $id_mhs['id_prodi']),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function tambahMakul($id_jadwal)
    {
        // ambil data mahasiswa id nya
        $mhs = $this->ModelKrs->dataMahasiswa();

        $id_ta = $this->ModelTa->ta_aktif();

        $data = [
            'id_jadwal' => $id_jadwal,
            'id_ta'     => $id_ta['id_ta'],
            'id_mhs'     => $mhs['id_mhs'],
        ];

        $this->ModelKrs->tambahMakul($data);

        session()->setFlashdata('pesan', 'Mata Kuliah berhasil di tambahkan...!!!');
        return redirect()->to('krs');
    }

    public function hapus($id_krs)
    {
        // masukan ke dalam model
        $this->ModelKrs->hapus($id_krs);

        session()->setFlashdata('pesan', 'Krs berhasil di hapus...!!!');
        return redirect()->to('krs');
    }

    public function print()
    {
        // detail mhs by session login
        $id_mhs = $this->ModelKrs->dataMahasiswa();
        $ta     = $this->ModelTa->ta_aktif();

        $data = [
            'title'         => 'Print KRS',
            'ta'            => $this->ModelTa->ta_aktif(),
            'mhs'           => $this->ModelKrs->dataMahasiswa(),
            'krsId'         => $this->ModelKrs->dataKrsById($id_mhs['id_mhs'], $ta['id_ta']),
            'dataMakul'     => $this->ModelKrs->dataKrs($id_mhs['id_mhs'], $ta['id_ta']),
        ];

        return view('mahasiswa/krs/v_print-krs', $data);
    }
}
