<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function dashboard()
    {
        return view('siswa.dashboard');
    }

    public function index()
    {
        $transaksis = Transaksi::where('user_id', Auth::id())->latest()->get();

        return view('siswa.transaksi.index', compact('transaksis'));
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
        $transaksi = Transaksi::findOrFail($id);
        if($transaksi->user_id != Auth::id() || $transaksi->status != 'waiting') {
            return redirect()->route('siswa.transaksi.index')->with('error', 'Laporan tidak bisa diedit karena sedang diproses');
        }

        return view('siswa.transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, $id) {
        $transaksi = Transaksi::findOrFail($id);
        
        if($transaksi->user_id != Auth::id() || $transaksi->status != 'waiting') {
            return redirect()->route('siswa.transaksi.index')->with('error', 'Laporan tidak dapat diubah');
        }

        $validate = $request->validate([
            'transaction' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'desc' => 'required|string',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if($request->hasFile('photo')) {
            if(Storage::disk('public')->exists($transaksi->photo)) {
                Storage::disk('public')->delete($transaksi->photo);
            }

            $photo = $request->file('photo')->store('bukti_laporan', 'public');
            $transaksi->photo = $photo;
        }
        
        $transaksi->transaction = $validate['transaction'];
        $transaksi->category = $validate['category'];
        $transaksi->desc = $validate['desc'];
        $transaksi->save();

        return redirect()->route('siswa.transaksi.index')->with('success', 'Laporan berhasil diperbarui');
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        if($transaksi->user_id != Auth::id()) {
            abort(403, 'Akses ditolak');
        }

        return view('siswa.transaksi.show', compact('transaksi'));
    }

    public function destroy($id) {
        $transaksi = Transaksi::findOrFail($id);

        if($transaksi->user_id != Auth::id() || $transaksi->status != 'waiting') {
            return redirect()->route('siswa.transaksi.index')->with('success', 'Laporan tidak dapat dihapus');
        }

        if(Storage::disk('public')->exists($transaksi->photo)) {
            Storage::disk('public')->delete($transaksi->photo);
        }

        $transaksi->delete();
        return redirect()->route('siswa.transaksi.index')->with('success', 'Laporan berhasil dihapus');
    }

    public function feedback()
    {
        return view('siswa.feedback.index');
    }
}
