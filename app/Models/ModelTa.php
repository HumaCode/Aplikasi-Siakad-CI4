<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelTa extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_ta')
            ->orderBy('id_ta', 'desc')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_ta')->insert($data);
    }

    public function edit($id_ta, $data)
    {
        $this->db->table('tbl_ta')->where('id_ta', $id_ta)->update($data);
    }

    public function hapus($id_ta)
    {
        $this->db->table('tbl_ta')->where('id_ta', $id_ta)->delete();
    }

    public function resetTa()
    {
        $this->db->table('tbl_ta')->update(['status' => 0]);
    }

    public function ta_aktif()
    {
        return $this->db->table('tbl_ta')
            ->where('status', 1)
            ->get()
            ->getRowArray();
    }
}
