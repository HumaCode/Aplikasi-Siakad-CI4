<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelRuangan extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_ruangan')
            ->join('tbl_gedung', 'tbl_gedung.id_gedung=tbl_ruangan.id_gedung', 'left')
            ->orderBy('tbl_gedung.id_gedung', 'asc')
            ->get()
            ->getResultArray();
    }

    public function dataId($id_ruangan)
    {
        return $this->db->table('tbl_ruangan')
            ->join('tbl_gedung', 'tbl_gedung.id_gedung=tbl_ruangan.id_gedung', 'left')
            ->where('id_ruangan', $id_ruangan)
            ->orderBy('tbl_gedung.id_gedung', 'asc')
            ->get()
            ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_ruangan')->insert($data);
    }

    public function edit($id_ruangan, $data)
    {
        $this->db->table('tbl_ruangan')->where('id_ruangan', $id_ruangan)->update($data);
    }

    public function hapus($id_ruangan)
    {
        $this->db->table('tbl_ruangan')->where('id_ruangan', $id_ruangan)->delete();
    }
}
