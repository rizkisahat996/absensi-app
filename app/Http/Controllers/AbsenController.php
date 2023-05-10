<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    //signature

    $folderPath = public_path('upload') . DIRECTORY_SEPARATOR;

    $image_parts = explode(";base64,", $request->signed);
    if (count($image_parts) < 2) {
      return back()->with('error', 'Invalid signature format');
    }

    $image_type_aux = explode("image/", $image_parts[0]);

    $image_type = isset($image_type_aux[1]) ? $image_type_aux[1] : null;

    $image_base64 = base64_decode($image_parts[1]);

    $signature = $folderPath . uniqid() . '.' . $image_type;

    file_put_contents($signature, $image_base64);

    DB::table('tb_absen')->insert([
      'nama' => $request->nama,
      'tanggal' => Carbon::now(),
      'status' => $request->status,
      'keterangan' => $request->keterangan
    ]);

    DB::table('tb_signature')->insert([
      'absen_id' => $absen_id,
      'skema_absen' => $request->skema,
      'tanda_tangan' => $signature
    ]);

    return redirect()->back()->with('success', 'Successfuly edit!');
  }
}