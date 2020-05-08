<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Longsor;

class DataLongsorController extends Controller
{
    public function index(Request $request)
    {
        $data['longsor'] = Longsor::get();
        return view('pages/longsor', $data);
        // return $data;
    }
}
