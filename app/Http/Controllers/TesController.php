<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesController extends Controller
{
    public function index()
    {
        return view('tes');
    }
    public function store(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        return view('tes', compact('angka1', 'angka2'));
    }
}
