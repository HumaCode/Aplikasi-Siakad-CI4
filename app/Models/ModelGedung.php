<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelGedung extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_gedung')
            ->orderBy('id_gedung', 'desc')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_gedung')->insert($data);
    }

    public function edit($id_gedung, $data)
    {
        $this->db->table('tbl_gedung')->where('id_gedung', $id_gedung)->update($data);
    }

    public function hapus($id_gedung)
    {
        $this->db->table('tbl_gedung')->where('id_gedung', $id_gedung)->delete();
    }
}
