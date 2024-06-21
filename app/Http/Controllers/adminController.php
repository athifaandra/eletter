<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class adminController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {

            return view('admin/dashboard');
            
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}