<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class SiswaController extends Controller
{
    public function dashboard() {
        return view('siswa.dashboard');
    }

    public function index() {
        return view('siswa.transaksi.index');
    }

    public function create() {
        return view('siswa.transaksi.create');
    }

    public function show($id) {
        return view('siswa.transaksi.show');
    }
}
