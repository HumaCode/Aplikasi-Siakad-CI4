<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelMakul extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_makul')
            ->orderBy('id_makul', 'desc')
            ->get()
            ->getResultArray();
    }

    public function allDataMakul($id_prodi)
    {
        return $this->db->table('tbl_makul')
            ->where('id_prodi', $id_prodi)
            ->orderBy('smt', 'asc')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_makul')->insert($data);
    }

    public function edit($id_makul, $data)
    {
        $this->db->table('tbl_makul')->where('id_makul', $id_makul)->update($data);
    }

    public function hapus($id_makul)
    {
        $this->db->table('tbl_makul')->where('id_makul', $id_makul)->delete();
    }
}
