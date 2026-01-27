<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = \App\Models\Borrowing::with(['user', 'item'])->latest()->get();
        return view('admin.borrowings.index', compact('borrowings'));
    }

    public function approve(\App\Models\Borrowing $borrowing)
    {
        if ($borrowing->item->stok < $borrowing->jumlah) {
            return back()->with('error', 'Insufficient stock.');
        }

        $borrowing->status = 'approved';
        $borrowing->save();

        $borrowing->item->decrement('stok', $borrowing->jumlah);

        return back()->with('success', 'Borrowing approved.');
    }

    public function reject(\App\Models\Borrowing $borrowing)
    {
        $borrowing->status = 'rejected';
        $borrowing->save();
        return back()->with('success', 'Borrowing rejected.');
    }

    public function returned(\App\Models\Borrowing $borrowing)
    {
        $borrowing->status = 'returned';
        $borrowing->save();

        $borrowing->item->increment('stok', $borrowing->jumlah);

        return back()->with('success', 'Item marked as returned.');
    }
}
