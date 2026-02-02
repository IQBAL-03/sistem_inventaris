<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'gambar' => 'nullable|image|max:2048',
            'cropped_image' => 'nullable',
        ]);

        $data = $request->except(['gambar', 'cropped_image']);

        if ($request->filled('cropped_image')) {
            $data['gambar'] = $this->uploadBase64Image($request->cropped_image);
        } elseif ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('items', 'public');
        }

        \App\Models\Item::create($data);

        return redirect()->route('admin.items.index')->with('success', 'Barang berhasil ditambahkan!');
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
            'gambar' => 'nullable|image|max:2048',
            'cropped_image' => 'nullable',
        ]);

        $data = $request->except(['gambar', 'cropped_image']);

        if ($request->filled('cropped_image')) {
            // Delete old image
            if ($item->gambar) {
                Storage::disk('public')->delete($item->gambar);
            }
            $data['gambar'] = $this->uploadBase64Image($request->cropped_image);
        } elseif ($request->hasFile('gambar')) {
            if ($item->gambar) {
                Storage::disk('public')->delete($item->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('items', 'public');
        }

        $item->update($data);

        return redirect()->route('admin.items.index')->with('updated', 'Barang berhasil diperbarui!');
    }

    public function destroy(\App\Models\Item $item)
    {
        if ($item->gambar) {
            Storage::disk('public')->delete($item->gambar);
        }
        $item->delete();
        return redirect()->route('admin.items.index')->with('deleted', 'Barang berhasil dihapus!');
    }

    private function uploadBase64Image($base64Data)
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $base64Data, $type)) {
            $base64Data = substr($base64Data, strpos($base64Data, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, etc

            if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                return null;
            }

            $base64Data = base64_decode($base64Data);

            if ($base64Data === false) {
                return null;
            }

            $fileName = 'items/' . Str::random(20) . '.' . $type;
            Storage::disk('public')->put($fileName, $base64Data);
            
            return $fileName;
        }
        
        return null;
    }
}
