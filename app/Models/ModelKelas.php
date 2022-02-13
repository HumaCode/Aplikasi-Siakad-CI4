<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelKelas extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_kelas.id_prodi', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_kelas.id_dosen', 'left')
            ->orderBy('id_kelas', 'desc')
            ->get()
            ->getResultArray();
    }

    public function detail($id_kelas)
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_kelas.id_prodi', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_kelas.id_dosen', 'left')
            ->where('tbl_kelas.id_kelas', $id_kelas)
            ->orderBy('id_kelas', 'desc')
            ->get()
            ->getRowArray();
    }

    // mahasiswa yang memiliki kelas
    public function mhsByKelas($id_kelas)
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->where('tbl_mhs.id_kelas', $id_kelas)
            ->orderBy('id_mhs', 'desc')
            ->get()
            ->getResultArray();
    }

    // mahasiswa belum memiliki kelas
    public function mhsAll()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->where('tbl_mhs.id_kelas =', null)
            ->get()
            ->getResultArray();
    }

    public function edit($id_mhs, $data)
    {
        $this->db->table('tbl_mhs')->where('id_mhs', $id_mhs)->update($data);
    }


    public function jmlMhs($id_kelas)
    {
        return $this->db->table('tbl_mhs')
            ->where('id_kelas', $id_kelas)
            ->countAllResults();
    }

    public function add($data)
    {
        $this->db->table('tbl_kelas')->insert($data);
    }

    public function hapus($id_kelas)
    {
        $this->db->table('tbl_kelas')->where('id_kelas', $id_kelas)->delete();
    }
}
