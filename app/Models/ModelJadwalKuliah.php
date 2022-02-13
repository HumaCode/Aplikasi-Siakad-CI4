<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelJadwalKuliah extends Model
{

    public function allData($id_prodi)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_jadwal.id_ta', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal.id_kelas', 'left')
            ->join('tbl_makul', 'tbl_makul.id_makul=tbl_jadwal.id_makul', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_jadwal.id_dosen', 'left')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan', 'left')
            ->where('tbl_jadwal.id_prodi', $id_prodi)
            ->orderBy('tbl_jadwal.id_jadwal', 'desc')
            ->get()
            ->getResultArray();
    }

    public function makul($id_prodi)
    {
        return $this->db->table('tbl_makul')
            ->where('id_prodi', $id_prodi)
            ->orderBy('smt', 'asc')
            ->get()
            ->getResultArray();
    }

    public function kelas($id_prodi)
    {
        return $this->db->table('tbl_kelas')
            ->where('id_prodi', $id_prodi)
            ->orderBy('id_kelas', 'asc')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_jadwal')->insert($data);
    }

    public function hapus($id_jadwal)
    {
        $this->db->table('tbl_jadwal')->where('id_jadwal', $id_jadwal)->delete();
    }
}
