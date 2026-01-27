<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = \App\Models\Item::with('category')->latest()->get();
        return view('admin.items.index', compact('items'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'nama_barang' => 'required',
            'merk' => 'required',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $data['gambar'] = $imageName;
        }

        \App\Models\Item::create($data);

        return redirect()->route('admin.items.index')->with('success', 'Item created successfully.');
    }

    public function edit(\App\Models\Item $item)
    {
        $categories = \App\Models\Category::all();
        return view('admin.items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, \App\Models\Item $item)
    {
        $request->validate([
            'category_id' => 'required',
            'nama_barang' => 'required',
            'merk' => 'required',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $data['gambar'] = $imageName;
        }

        $item->update($data);

        return redirect()->route('admin.items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(\App\Models\Item $item)
    {
        $item->delete();
        return redirect()->route('admin.items.index')->with('success', 'Item deleted successfully.');
    }
}
