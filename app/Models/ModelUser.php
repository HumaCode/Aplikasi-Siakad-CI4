<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelUser extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_user')
            ->orderBy('id_user', 'desc')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }

    public function edit($id_user, $data)
    {
        $this->db->table('tbl_user')->where('id_user', $id_user)->update($data);
    }

    public function hapus($id_user)
    {
        $this->db->table('tbl_user')->where('id_user', $id_user)->delete();
    }
}
