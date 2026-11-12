<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function index() {
        return view('admin.transaksi.index');
    }

    public function edit($id) {
        return view('admin.transaksi.edit');
    }

    public function show($id) {
        return view('admin.transaksi.show');
    }
}
