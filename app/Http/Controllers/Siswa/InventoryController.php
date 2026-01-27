<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Item::with('category');

        if ($request->has('search')) {
            $query->where('nama_barang', 'like', '%'.$request->search.'%')
                  ->orWhere('merk', 'like', '%'.$request->search.'%');
        }

        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        $items = $query->latest()->get();
        $categories = \App\Models\Category::all();

        return view('siswa.inventory.index', compact('items', 'categories'));
    }
}
