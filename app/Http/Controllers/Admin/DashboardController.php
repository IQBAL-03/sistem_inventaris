<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems = \App\Models\Item::count();
        $pendingBorrowings = \App\Models\Borrowing::where('status', 'pending')->count();
        $activeBorrowings = \App\Models\Borrowing::where('status', 'approved')->count();
        $studentCount = \App\Models\User::where('role', 'siswa')->count();

        return view('admin.dashboard', compact('totalItems', 'pendingBorrowings', 'activeBorrowings', 'studentCount'));
    }
}
