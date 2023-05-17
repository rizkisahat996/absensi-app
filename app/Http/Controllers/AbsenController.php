<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;

class AbsenController extends Controller
{
  public function index()
  {
    $skema = DB::table('tb_skema')->get();
    return view('absen', compact('skema'));
  }

  public function store(Request $request)
  {
    $absen_id = DB::table('tb_absen')->orderBy('id', 'desc')->first()->id + 1;

    // Signature
    $folderUrl = URL::to('/upload');
    $image_parts = explode(";base64,", $request->signed);
    if (count($image_parts) < 2) {
      return back()->with('error', 'Invalid signature format');
    }
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = isset($image_type_aux[1]) ? $image_type_aux[1] : null;
    $image_base64 = base64_decode($image_parts[1]);
    $signature = uniqid() . '.' . $image_type;

    Storage::disk('public')->put('upload/' . $signature, $image_base64);

    DB::table('tb_absen')->insert([
      'nama' => $request->nama,
      'tanggal' => Carbon::now(),
      'status' => $request->status,
      'keterangan' => $request->keterangan
    ]);

    DB::table('tb_signature')->insert([
      'absen_id' => $absen_id,
      'skema_absen' => $request->skema,
      'tanda_tangan' => $folderUrl . '/' . $signature
    ]);

    return redirect()->back()->with('success', 'Data Absensi Anda Berhasil di Input.');
  }
}