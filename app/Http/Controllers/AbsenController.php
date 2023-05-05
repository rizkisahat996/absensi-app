<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    public function index()
    {
        $skema = DB::table('tb_skema')->get();

        return view('absen', compact('skema'));
    }

    public function store()
    {
        dd('ok');
    }
}
