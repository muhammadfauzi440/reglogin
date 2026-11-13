<?php

namespace App\Http\Controllers;

class SiswaController extends Controller
{
    public function dashboard()
    {
        return view('siswa.dashboard');
    }

    public function index()
    {
        return view('siswa.transaksi.index');
    }

    public function create()
    {
        return view('siswa.transaksi.create');
    }

    public function edit($id)
    {
        return view('siswa.transaksi.edit');
    }

    public function show($id)
    {
        return view('siswa.transaksi.show');
    }

    public function feedback()
    {
        return view('siswa.feedback.index');
    }
}
