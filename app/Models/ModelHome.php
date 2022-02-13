<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelHome extends Model
{
    public function jmlGedung()
    {
        return $this->db->table('tbl_gedung')
            ->countAll();
    }

    public function jmlRuangan()
    {
        return $this->db->table('tbl_ruangan')
            ->countAll();
    }

    public function jmlFakultas()
    {
        return $this->db->table('tbl_fakultas')
            ->countAll();
    }

    public function jmlProdi()
    {
        return $this->db->table('tbl_prodi')
            ->countAll();
    }

    public function jmlDosen()
    {
        return $this->db->table('tbl_dosen')
            ->countAll();
    }

    public function jmlMhs()
    {
        return $this->db->table('tbl_mhs')
            ->countAll();
    }

    public function jmlMakul()
    {
        return $this->db->table('tbl_makul')
            ->countAll();
    }

    public function jmlUser()
    {
        return $this->db->table('tbl_user')
            ->countAll();
    }
}
