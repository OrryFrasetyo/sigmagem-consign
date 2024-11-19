<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('uploadproduk');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created produk in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'harga' => 'required|numeric|min:0',
            'berat' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'dimensi_barang' => 'required|array', // Panjang, lebar, tinggi sebagai array
            'dimensi_barang.panjang' => 'required|integer|min:0',
            'dimensi_barang.lebar' => 'required|integer|min:0',
            'dimensi_barang.tinggi' => 'required|integer|min:0',
            'packing_kayu' => 'nullable|boolean',
            'asuransi' => 'nullable|boolean',
            'gambar' => 'required|array|min:4|max:4',
            'gambar.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'kondisi_barang' => 'required|string|max:255',
            'garansi' => 'nullable|integer|min:0',
            'lama_pemakaian' => 'nullable|string|max:255',
            'tangan_ke' => 'nullable|integer|min:0',
            'waktu_pembelian' => 'nullable|string|max:255',
            'minus' => 'nullable|string|max:255',
            'kelengkapan' => 'nullable|string|max:255',
            'wireless' => 'nullable|string',
            'suara_aman' => 'nullable|string',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Upload gambar
        $uploadedImages = [];
        foreach ($request->file('gambar') as $image) {
            $path = $image->store('uploads/products', 'public');
            $uploadedImages[] = $path;
        }


        // Hitung fee penjualan dan dana diterima
        $harga = $request->harga;

        // Simpan data produk
        $produk = Product::create([
            'nama_produk' => $request->nama_produk,
            'category_id' => $request->category_id,
            'harga' => $harga,
            'berat' => $request->berat,
            'stok' => $request->stok,
            'dimensi_barang' => $request->dimensi_barang,
            'packing_kayu' => $request->packing_kayu ?? false,
            'asuransi' => $request->asuransi ?? false,
            'gambar' => json_encode($uploadedImages),
            'kondisi_barang' => $request->kondisi_barang,
            'garansi' => $request->garansi,
            'lama_pemakaian' => $request->lama_pemakaian,
            'tangan_ke' => $request->tangan_ke,
            'waktu_pembelian' => $request->waktu_pembelian,
            'minus' => $request->minus,
            'kelengkapan' => $request->kelengkapan,
            'wireless' => $request->wireless,
            'suara_aman' => $request->suara_aman,
        ]);

        return response()->json(['message' => 'Produk berhasil ditambahkan', 'produk' => $produk], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, Product $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $produk)
    {
        //
    }
}
