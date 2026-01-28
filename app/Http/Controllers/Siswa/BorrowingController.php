<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = auth()->user()->borrowings()->with('item')->latest()->get();
        return view('siswa.borrowings.index', compact('borrowings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'jumlah' => 'required|integer|min:1',
            'tgl_pinjam' => 'required|date',
        ]);

        $item = \App\Models\Item::findOrFail($request->item_id);

        if ($item->stok < $request->jumlah) {
            return back()->with('error', 'Stok tidak mencukupi.');
        }

        auth()->user()->borrowings()->create([
            'item_id' => $request->item_id,
            'jumlah' => $request->jumlah,
            'tgl_pinjam' => $request->tgl_pinjam,
            'status' => 'pending',
        ]);

        return redirect()->route('siswa.borrowings.index')->with('success', 'Pengajuan peminjaman berhasil dikirim!');
    }
}
