<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelFakultas extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_fakultas')
            ->orderBy('id_fakultas', 'desc')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_fakultas')->insert($data);
    }

    public function edit($id_fakultas, $data)
    {
        $this->db->table('tbl_fakultas')->where('id_fakultas', $id_fakultas)->update($data);
    }

    public function hapus($id_fakultas)
    {
        $this->db->table('tbl_fakultas')->where('id_fakultas', $id_fakultas)->delete();
    }
}
