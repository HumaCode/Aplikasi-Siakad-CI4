<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelKrs extends Model
{
    public function dataMahasiswa()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_mhs.id_kelas', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_kelas.id_dosen', 'left')
            ->where('nim', session()->get('username'))
            ->get()
            ->getRowArray();
    }

    public function makulTawar($id_ta, $id_prodi)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_makul', 'tbl_makul.id_makul=tbl_jadwal.id_makul', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal.id_kelas', 'left')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_jadwal.id_dosen', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_jadwal.id_prodi', 'left')
            ->where('tbl_jadwal.id_ta', $id_ta)
            ->where('tbl_jadwal.id_prodi', $id_prodi)
            ->get()
            ->getResultArray();
    }

    public function tambahMakul($data)
    {
        $this->db->table('tbl_krs')->insert($data);
    }

    public function dataKrs($id_mhs,  $id_ta)
    {
        return $this->db->table('tbl_krs')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal=tbl_krs.id_jadwal', 'left')
            ->join('tbl_makul', 'tbl_makul.id_makul=tbl_jadwal.id_makul', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal.id_kelas', 'left')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_jadwal.id_dosen', 'left')
            ->where('id_mhs', $id_mhs)
            ->where('tbl_krs.id_ta', $id_ta)
            ->get()
            ->getResultArray();
    }

    public function dataKrsById($id_mhs,  $id_ta)
    {
        return $this->db->table('tbl_krs')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal=tbl_krs.id_jadwal', 'left')
            ->join('tbl_makul', 'tbl_makul.id_makul=tbl_jadwal.id_makul', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal.id_kelas', 'left')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_jadwal.id_dosen', 'left')
            ->where('id_mhs', $id_mhs)
            ->where('tbl_krs.id_ta', $id_ta)
            ->get()
            ->getRowArray();
    }

    public function hapus($id_krs)
    {
        $this->db->table('tbl_krs')->where('id_krs', $id_krs)->delete();
    }
}
