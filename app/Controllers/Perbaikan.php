<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Perbaikan extends BaseController
{
    public function index()
    {
        $data['conf'] = $this->listing;
        $data['contents'] = "perbaikan/index";
        $data['perbaikan'] = $this->perbaikan->getData();
        return view('Layout/template', $data);
    }

    public function finished()
    {
        $idperbaikan = $_POST['id'];
        $finished = 1;
        $sql = db_connect()->query("UPDATE perbaikan SET finished=$finished WHERE idperbaikan=$idperbaikan");
    }
    public function add()
    {
        $id = $this->request->getVar('idpelanggan');
        $sql = db_connect()->query("SELECT * FROM KELUHAN WHERE idkeluhan='$id'")->getRow();
        $data = [
            'idpelanggan' => $sql->idpelanggan,
            'idkeluhan' =>  $sql->idkeluhan,
            'idteknisi' =>  $sql->idteknisi,
            'perbaikan' =>  $this->request->getVar('perbaikan'),
            'tindakan' =>  $this->request->getVar('tindakan'),
            'tgl_keluhan' =>  $this->request->getVar('tgl_keluhan'),
            'tgl_perbaikan' =>  $this->request->getVar('tgl_perbaikan'),
        ];
        $finished = 1;
        db_connect()->query("UPDATE keluhan SET finished=$finished WHERE idkeluhan=$sql->idkeluhan");
        $this->perbaikan->insert($data);
        return redirect()->to('Perbaikan');
    }
    public function getsukses()
    {
        $sql = db_connect()->query('SELECT idperbaikan,perbaikan.finished,perbaikan,perbaikan.idkeluhan,nama_pelanggan,keluhan,penyebab,tindakan,tgl_keluhan,perbaikan.tgl_perbaikan,nama_teknisi FROM keluhan
        JOIN `pelanggan` ON keluhan.idpelanggan=`pelanggan`.idpelanggan 
        JOIN teknisi ON keluhan.idteknisi=teknisi.idteknisi 
        JOIN perbaikan ON keluhan.idkeluhan = perbaikan.idkeluhan WHERE perbaikan.finished=1')->getResultArray();
        $data['sukses'] = $sql;
        return view('perbaikan/getsukses', $data);
    }
    public function getdata()
    {
        $id = $this->request->getPost('id');
        $perbaikan = $this->perbaikan->getEdit($id);
        if (!$perbaikan) {
            echo 'Tidak ada keluhan !';
            exit;
        }
        $data['perbaikan'] = $perbaikan;
        return view('perbaikan/getdata', $data);
    }
}
