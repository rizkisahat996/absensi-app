<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absen;

class AbsensiController extends Controller
{
    // fungsi index untuk user
    public function index()
    {
        $user_id = auth()->user()->id; // mendapatkan user ID dari user yang login
        $absensi = Absen::where('user_id', $user_id)->orderBy('tanggal', 'desc')->get(); // mendapatkan data absensi user dan diurutkan berdasarkan tanggal

        return view('absensi.index', compact('absensi'));
    }

    // fungsi index_admin untuk admin
    public function index_admin()
    {
        $absensi = Absen::orderBy('tanggal', 'desc')->get(); // mendapatkan semua data absensi yang tersimpan
        $users = User::all(); // mendapatkan semua data user

        return view('absensi.index_admin', compact('absensi', 'users'));
    }

    // fungsi store untuk admin
    public function store(Request $request)
    {
        $absen = new Absen;
        $absen->user_id = $request->user_id;
        $absen->tanggal = $request->tanggal;
        $absen->status = $request->status;
        $absen->keterangan = $request->keterangan;
        $absen->save();

        return redirect()->route('absensi.index_admin')->with('success', 'Data absensi berhasil disimpan.');
    }

    // fungsi store_user untuk user
    public function store_user(Request $request)
    {
        $absen = new Absen;
        $absen->user_id = auth()->user()->id;
        $absen->tanggal = date('Y-m-d');
        $absen->status = $request->status;
        $absen->keterangan = $request->keterangan;
        $absen->save();

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan.');
    }

    // fungsi update untuk admin
    public function update(Request $request, $id)
    {
        $absen = Absen::find($id);
        $absen->status = $request->status;
        $absen->keterangan = $request->keterangan;
        $absen->save();

        return redirect()->route('absensi.index_admin')->with('success', 'Data absensi berhasil diupdate.');
    }
}
