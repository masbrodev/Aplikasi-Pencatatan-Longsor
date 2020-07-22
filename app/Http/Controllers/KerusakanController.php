<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kerusakan;

class KerusakanController extends Controller
{
    public function index(Request $request)
    {
        $data['kerusakan'] = Kerusakan::get();
        return view('pages.kerusakan', $data);
        // return $data;
    }

    public function tambah(Request $request)
    {
        $data = [
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'jenis_kerusakan' => $request->jenis_kerusakan,
            'penyebab' => $request->penyebab,
            'jumlah_kerusakan' => $request->jumlah_kerusakan,
        ];

        $simpan = Kerusakan::create($data);
        if ($simpan) {
            return redirect()->back();
        }
    }
    public function edit(Request $request, $id)
    {
        $data = [
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'jenis_kerusakan' => $request->jenis_kerusakan,
            'penyebab' => $request->penyebab,
            'jumlah_kerusakan' => $request->jumlah_kerusakan,
        ];

        $simpan = Kerusakan::where('id', $id)->update($data);
        if ($simpan) {
            return redirect()->back();
        }
    }

    public function hapus($id)
    {
        $hapus = Kerusakan::where('id', $id)->delete();
        if ($hapus) {
            return redirect()->back();
        }
    }
}
