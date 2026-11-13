<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $transaksis = Transaksi::with('user')->latest()->get();

        return view('admin.transaksi.index', compact('transaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('admin.transaksi.show', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('admin.transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $validate = $request->validate([
            'status' => 'required|in:waiting,in_progress,done,rejected',
            'response' => 'nullable|string'
        ]);

        $transaksi->status = $validate['status'];
        $transaksi->response = $validate['response'];
        $transaksi->save();

        return redirect()->route('admin.transaksi.index')->with('success', 'Status laporan berhasil diubah');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        if($transaksi->photo && Storage::disk('public')->exists($transaksi->photo)) {
            Storage::disk('public')->delete($transaksi->photo);
        }

        $transaksi->delete();
        return redirect()->route('admin.transaksi.index')->with('success', 'Data laporan berhasil dihapus');
    }

    public function category()
    {
        return view('admin.category.index');
    }

    public function feedback()
    {
        return view('admin.feedback.index');
    }
}
