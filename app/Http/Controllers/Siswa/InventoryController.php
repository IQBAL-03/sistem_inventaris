<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Item::with('category');

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nama_barang', 'like', '%'.$request->search.'%')
                  ->orWhere('merk', 'like', '%'.$request->search.'%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $items = $query->latest()->get();
        $categories = \App\Models\Category::all();

        return view('siswa.inventory.index', compact('items', 'categories'));
    }
}
