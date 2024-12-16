<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        return view('admin.produk.index', compact('produk'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.produk.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:categories,id',
            'jumlah_stok' => 'required|integer|min:0',
            'harga_seller' => 'required|string',
            'harga_user' => 'required|string',
            'keterangan' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Menyimpan gambar jika diunggah
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cover', 'public');
        }
    
        // Menyimpan data ke database
        Produk::create([
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'jumlah_stok' => $request->jumlah_stok,
            'harga_seller' => $request->harga_seller,
            'harga_user' => $request->harga_user,
            'keterangan' => $request->keterangan,
            'cover' => $imagePath, // Simpan path gambar jika ada
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Data barang berhasil ditambahkan.');
    }    

    public function edit(Produk $produk)
    {
        $categories = Category::all();
        return view('admin.produk.edit', compact('produk', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:categories,id',
            'jumlah_stok' => 'required|integer',
            'harga_seller' => 'required|string',
            'harga_user' => 'required|string',
            'keterangan' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Ambil produk berdasarkan ID
        $produk = Produk::findOrFail($id);
    
        // Simpan data yang diubah
        $produk->nama_barang = $validated['nama_barang'];
        $produk->kategori_id = $validated['kategori_id'];
        $produk->jumlah_stok = $validated['jumlah_stok'];
        $produk->harga_seller = $validated['harga_seller'];
        $produk->harga_user = $validated['harga_user'];
        $produk->keterangan = $validated['keterangan'];
    
        // Menghandle upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada dari storage
            if ($produk->cover) {
                // Hapus gambar di storage
                Storage::disk('public')->delete('cover/' . $produk->cover);
    
                // Hapus gambar di public/storage
                $publicCoverPath = public_path('storage/cover/' . $produk->cover);
                if (file_exists($publicCoverPath)) {
                    unlink($publicCoverPath);
                }
            }
    
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('cover', 'public');
            $produk->cover = basename($imagePath);  // Menyimpan hanya nama file
        }
    
        // Simpan perubahan ke database
        $produk->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Data barang berhasil diperbarui!');
    }
    

    public function destroy(Produk $produk)
    {
        // Hapus gambar jika ada dari storage
        if ($produk->cover) {
            // Hapus gambar di storage
            Storage::disk('public')->delete('cover/' . $produk->cover);
    
            // Hapus gambar di public/storage
            $publicCoverPath = public_path('storage/cover/' . $produk->cover);
            if (file_exists($publicCoverPath)) {
                unlink($publicCoverPath);
            }
        }
    
        // Hapus produk dari database
        $produk->delete();
    
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }    
}
