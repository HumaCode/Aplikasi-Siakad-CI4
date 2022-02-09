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
}
