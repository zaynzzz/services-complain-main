<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Notif extends BaseController
{
    public function showmess()
    {
        $sql = db_connect()->query("SELECT * from comments ")->getResult();
        while ($sql) {
            $sql;
        }
        echo json_encode($sql);
    }
    public function store()
    {
        $subject = $this->request->getVar('subject');
        $comment = $this->request->getVar('comment');
        $query = "INSERT INTO comments(comment_subject, comment_text)VALUES ('$subject', '$comment')";
    }
    public function jumlah()
    {
        $sql = db_connect()->query("SELECT * from comments")->getNumRows();
        return json_encode($sql);
    }
    public function index()
    {
        $data['contents'] = "Notif/index";
        return view('Layout/template', $data);
    }
}
