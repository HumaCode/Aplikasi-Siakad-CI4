<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelProdi extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_prodi')
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas', 'left')
            ->orderBy('tbl_prodi.id_prodi', 'asc')
            ->get()
            ->getResultArray();
    }

    public function dataId($id_prodi)
    {
        return $this->db->table('tbl_prodi')
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas', 'left')
            ->where('id_prodi', $id_prodi)
            ->orderBy('tbl_prodi.id_prodi', 'asc')
            ->get()
            ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_prodi')->insert($data);
    }

    public function edit($id_prodi, $data)
    {
        $this->db->table('tbl_prodi')->where('id_prodi', $id_prodi)->update($data);
    }

    public function hapus($id_prodi)
    {
        $this->db->table('tbl_prodi')->where('id_prodi', $id_prodi)->delete();
    }
}
