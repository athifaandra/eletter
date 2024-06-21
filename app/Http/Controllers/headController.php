<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class headController extends Controller
{
    public function index()
    {
        if (Gate::allows('isHead')) {

            return view('head/head_dashboard');
            
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}
