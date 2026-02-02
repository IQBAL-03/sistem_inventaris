<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return redirect()->route('admin.categories.index');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_kategori' => 'required']);
        \App\Models\Category::create($request->all());
        return back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(\App\Models\Category $category)
    {
        return view('admin.categories.index', [
            'categories' => \App\Models\Category::latest()->get(),
            'editCategory' => $category
        ]);
    }

    public function update(Request $request, \App\Models\Category $category)
    {
        $request->validate(['nama_kategori' => 'required']);
        $category->update($request->all());
        return back()->with('updated', 'Kategori berhasil diperbarui!');
    }

    public function destroy(\App\Models\Category $category)
    {
        $category->delete();
        return back()->with('deleted', 'Kategori berhasil dihapus!');
    }
}
