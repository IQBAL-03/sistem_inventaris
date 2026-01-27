<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems = \App\Models\Item::count();
        $activeBorrowings = \App\Models\Borrowing::whereIn('status', ['pending', 'approved'])->count();

        return view('admin.dashboard', compact('totalItems', 'activeBorrowings'));
    }
}
