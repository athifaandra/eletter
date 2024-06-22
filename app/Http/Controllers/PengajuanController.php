<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        return view ('staff/staff_pengajuan');
    }

    public function create()
    {
        return view('staff/staff_create');
    }

    
}
