<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absensi;
use App\Models\Absen;

class AbsensiController extends Controller
{
  public function index()
  {
    // Mendapatkan user ID dari user yang login
    $user_id = auth()->user()->id;

    $absensi = Absen::join('absensis', 'absensis.id', '=', 'absens.absensi_id')
      ->join('users', 'users.id', '=', 'absens.user_id')
      ->where('user_id', $user_id)
      ->get();

    // dd($absensi);

    return view('absensi.index', compact('absensi'));
  }


  public function index_admin()
  {
    // Mendapatkan semua data absensi
    $absensi = Absen::get();

    return view('absensi.index_admin', compact('absensi'));
  }

  public function store(Request $request)
  {
    // Membuat objek baru untuk tabel absensi
    $absensi = new Absensi;
    $absensi->tanggal = $request->tanggal;
    $absensi->keterangan = $request->keterangan;
    $absensi->save();

    // Mendapatkan semua user yang terdaftar
    $users = User::all();

    // Membuat objek baru untuk setiap user dengan absen kosong
    foreach ($users as $user) {
      $absen = new Absen;
      $absen->user_id = $user->id;
      $absen->absensi_id = $absensi->id;
      $absen->tanggal_absen = $absensi->tanggal;
      $absen->save();
    }

    return back()->with('success', 'Absensi berhasil ditambahkan.');
  }

  public function update_user(Request $request, $id)
  {

    // Mendapatkan objek absen berdasarkan ID dan user ID
    // $absen = Absen::where('user_id', auth()->user()->id)->find($id);
    $absen = Absen::where('absensi_id', $id)->where('user_id', auth()->user()->id)->first();

    // dd($absen);
    // Memperbarui status pada objek absen
    $absen->status = $request->status;

    // Menyimpan perubahan pada objek absen
    $absen->save();

    return back()->with('success', 'Absen berhasil diupdate.');
  }

  public function update(Request $request, $id)
  {
    // Mendapatkan objek absen berdasarkan ID dan user ID
    $absen = Absen::find($id);

    // Memperbarui status pada objek absen
    $absen->status = $request->status;

    // Menyimpan perubahan pada objek absen
    $absen->save();

    return back()->with('success', 'Absen berhasil diupdate.');
  }

  public function destroy($id)
  {
    // Mendapatkan objek absen berdasarkan ID
    $absen = Absen::find($id);

    // Menghapus objek absen
    $absen->delete();

    return back()->with('success', 'Absen berhasil dihapus.');
  }
}