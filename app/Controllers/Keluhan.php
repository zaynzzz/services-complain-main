<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Irsyadulibad\DataTables\DataTables;

class Keluhan extends BaseController
{

    public function editproses()
    {
        $id = $this->request->getVar('idkeluhan');
        $idpelanggan = $this->request->getVar('idpelanggan');
        $keluhan =  $this->request->getVar('keluhan');
        $penyebab =  $this->request->getVar('penyebab');
        $tindakan =  $this->request->getVar('tindakan');
        $tgl_keluhan =  $this->request->getVar('tgl_keluhan');
        $tgl_perbaikan =  $this->request->getVar('tgl_perbaikan');
        $idteknisi =  $this->request->getVar('idteknisi');
        $sql = db_connect()->query(
            "UPDATE keluhan SET idpelanggan ='$idpelanggan',keluhan='$keluhan',penyebab='$penyebab',tindakan='$tindakan',
        tgl_keluhan='$tgl_keluhan',tgl_perbaikan='$tgl_perbaikan',idteknisi='$idteknisi' WHERE idkeluhan=$id"
        );
        return redirect()->to('Keluhan');
    }
    public function edit($id)
    {

        $data['sql'] = $this->keluhan->getEdit($id);
        $data['contents'] = "Keluhan/edit";
        // $data['sql'] = $this->listing;
        return view('Layout/template', $data);
    }
    public function add()
    {
        $data = [
            'idpelanggan' => $this->request->getVar('idpelanggan'),
            'keluhan' =>  $this->request->getVar('keluhan'),
            'penyebab' =>  $this->request->getVar('penyebab'),
            'tindakan' =>  $this->request->getVar('tindakan'),
            'tgl_keluhan' =>  $this->request->getVar('tgl_keluhan'),
            'tgl_perbaikan' =>  $this->request->getVar('tgl_perbaikan'),
            'idteknisi' =>  $this->request->getVar('idteknisi'),
        ];
        $this->keluhan->insert($data);
        return redirect()->to('Keluhan');
    }
    public function index()
    {
        $data['conf'] = $this->listing;
        $data['contents'] = "Keluhan/index";
        $data['keluhan'] = $this->keluhan->getData();
        return view('Layout/template', $data);
    }
    public function del($id)
    {
        $sql = db_connect()->query("DELETE from keluhan where idkeluhan='$id'");
        return redirect()->back();
    }
    public function editData()
    {
        $id = (int)$this->request->getPost('id');
        $sql = db_connect()->query("SELECT idkeluhan,keluhan.idteknisi,keluhan.idpelanggan,nama_pelanggan,keluhan,penyebab,tindakan,tgl_keluhan,keluhan.tgl_perbaikan,nama_teknisi FROM keluhan
        JOIN `pelanggan` ON keluhan.idpelanggan=`pelanggan`.idpelanggan 
        JOIN teknisi ON keluhan.idteknisi=teknisi.idteknisi Where idkeluhan=$id")->getRow();
        $data['sql'] = $sql;
        return view('Keluhan/edit', $data);
    }
}
