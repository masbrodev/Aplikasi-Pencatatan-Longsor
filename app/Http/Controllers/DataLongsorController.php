<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Longsor;

class DataLongsorController extends Controller
{
    public function index(Request $request)
    {
        $data['longsor'] = Longsor::orderBy('created_at', 'DESC')->get();
        return view('pages.longsor', $data);
        // return $data;
    }

    public function tambah(Request $request)
    {
        $data = [
            'desa' => $request->desa,
            'kecamatan' => $request->kec,
            'jumlah_kejadian' => $request->jumk,
            'tahun' => $request->thn
        ];

        $simpan = Longsor::create($data);
        if ($simpan) {
            return redirect()->back();
        }
    }
    public function edit(Request $request, $id)
    {
        $data = [
            'desa' => $request->desa,
            'kecamatan' => $request->kec,
            'jumlah_kejadian' => $request->jumk,
            'tahun' => $request->thn
        ];

        $simpan = Longsor::where('id', $id)->update($data);
        if ($simpan) {
            return redirect()->back();
        }
    }

    public function hapus($id)
    {
        $hapus = Longsor::where('id', $id)->delete();
        if ($hapus) {
            return redirect()->back();
        }
    }
}
