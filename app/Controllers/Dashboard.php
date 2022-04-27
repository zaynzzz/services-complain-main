<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $this->listing = $this->konfig->listing();
        $hitungkeluhan = $this->keluhan->count();
        $hitungperbaikan = $this->perbaikan->count();
        $data['contents'] = "Admin/index";
        $data['conf'] = $this->listing;
        $data['hitkel'] = $hitungkeluhan;
        $data['hitper'] = $hitungperbaikan;
        return view('Layout/template', $data);
    }
}
