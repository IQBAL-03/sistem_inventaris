<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $activeBorrowings = Borrowing::where('user_id', Auth::id())
            ->whereIn('status', ['pending', 'approved'])
            ->count();
            
        $returnedBorrowings = Borrowing::where('user_id', Auth::id())
            ->where('status', 'returned')
            ->count();

        $totalItems = Item::count();

        return view('siswa.dashboard', compact('activeBorrowings', 'returnedBorrowings', 'totalItems'));
    }
}
