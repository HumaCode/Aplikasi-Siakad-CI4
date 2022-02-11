<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelDosen extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_dosen')
            ->orderBy('id_dosen', 'desc')
            ->get()
            ->getResultArray();
    }

    public function dataId($id_dosen)
    {
        return $this->db->table('tbl_dosen')
            ->where('id_dosen', $id_dosen)
            ->get()
            ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_dosen')->insert($data);
    }

    public function edit($id_dosen, $data)
    {
        $this->db->table('tbl_dosen')->where('id_dosen', $id_dosen)->update($data);
    }

    public function hapus($id_dosen)
    {
        $this->db->table('tbl_dosen')->where('id_dosen', $id_dosen)->delete();
    }
}
