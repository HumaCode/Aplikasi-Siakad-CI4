<?php

namespace App\Controllers;

use App\Models\ModelGedung;
use App\Models\ModelRuangan;

class Ruangan extends BaseController
{
    public function __construct()
    {
        $this->ModelRuangan = new ModelRuangan();
        $this->ModelGedung = new ModelGedung();
    }

    public function index()
    {
        $data = [
            'title'     => 'Ruangan',
            'isi'       => 'admin/ruangan/v_index',
            'ruangan'   => $this->ModelRuangan->allData()
        ];

        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title'     => 'Tambah Ruangan',
            'isi'       => 'admin/ruangan/v_add',
            'gedung'    => $this->ModelGedung->allData()
        ];

        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        // validasi
        if ($this->validate([
            'gedung' => [
                'label' => 'Gedung',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!'
                ]
            ]
        ])) {
            $data = [
                'id_gedung' => htmlspecialchars($this->request->getVar('gedung')),
                'ruangan' => htmlspecialchars($this->request->getVar('ruangan')),
            ];

            // masukan ke dalam model
            $this->ModelRuangan->add($data);

            session()->setFlashdata('pesan', 'Data Ruangan berhasil di tambahkan...!!!');
            return redirect()->to('ruangan');
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('ruangan/add');
        }
    }

    public function edit($id_ruangan)
    {

        $data = [
            'title'     => 'Edit Ruangan',
            'isi'       => 'admin/ruangan/v_edit',
            'gedung'    => $this->ModelGedung->allData(),
            'ruangan'   => $this->ModelRuangan->dataId($id_ruangan),
        ];

        return view('layout/v_wrapper', $data);
    }

    public function update($id_ruangan)
    {
        // validasi
        if ($this->validate([
            'gedung' => [
                'label' => 'Gedung',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong..!!'
                ]
            ]
        ])) {
            $data = [
                'id_gedung' => htmlspecialchars($this->request->getVar('gedung')),
                'ruangan' => htmlspecialchars($this->request->getVar('ruangan')),
            ];

            // masukan ke dalam model
            $this->ModelRuangan->edit($id_ruangan, $data);

            session()->setFlashdata('pesan', 'Data Ruangan berhasil di diubah...!!!');
            return redirect()->to('ruangan');
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('ruangan/edit/' . $id_ruangan);
        }
    }

    public function hapus($id_ruangan)
    {
        // masukan ke dalam model
        $this->ModelRuangan->hapus($id_ruangan);

        session()->setFlashdata('pesan', 'Data ruangan berhasil di hapus...!!!');
        return redirect()->to('ruangan');
    }
}
