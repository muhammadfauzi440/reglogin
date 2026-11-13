<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'transaction' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'desc' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('bukti_laporan', 'public');
        } else {
            return back()->with('error', 'Foto bukti harus diunggah');
        }

        Transaksi::create([
            'user_id' => Auth::id(),
            'transaction' => $validateData['transaction'],
            'category' => $validateData['category'],
            'desc' => $validateData['desc'],
            'photo' => $photo,
            'status' => 'waiting',
            'response' => ''
        ]);

        return redirect()->route('siswa.transaksi.index')->with('success', 'Laporan berhasil dibuat');
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
