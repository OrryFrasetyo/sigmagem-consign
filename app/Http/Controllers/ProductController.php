<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Category;
use App\Models\ListCategory;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('uploadproduk', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
            'panjang' => 'required|integer|min:0',
            'lebar' => 'required|integer|min:0',
            'tinggi' => 'required|integer|min:0',
            'packing_kayu' => 'nullable|boolean',
            'asuransi' => 'nullable|boolean',
            'sisi_depan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'sisi_kanan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'sisi_atas' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'lainnya' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kondisi_barang' => 'required|string|max:120',
            'garansi' => 'required|string|in:On,Off',
            'lama_pemakaian' => 'required|string|max:20',
            'tangan_ke' => 'required|integer|min:1',
            'waktu_pembelian' => 'nullable|string|max:255',
            'minus' => 'required|string|max:20',
            'kelengkapan' => 'required|string|max:255',
            'wireless' => 'nullable|string|in:Wireless,Wired',
            'suara_aman' => 'nullable|string',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validated = $validator->validated();

        // Tambahkan `customer_id` secara otomatis
        $validated['customer_id'] = auth('customer')->id();

        // Upload gambar
        $images = [];
        try {
            foreach (['sisi_depan', 'sisi_kanan', 'sisi_atas', 'lainnya'] as $key) {
                if ($request->hasFile($key)) {
                    $images[$key] = $request->file($key)->store('products', 'public');
                }
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to upload images: ' . $e->getMessage()], 500);
        }

        // Simpan produk ke database
        $product = Product::create(array_merge($validated, $images));

        // Kembalikan respons
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product,
            'images' => array_map(fn($path) => asset("storage/{$path}"), $images),
        ], 201);
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
