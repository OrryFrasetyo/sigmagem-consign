<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\ListCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateProdukRequest;


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

    public function listAllProducts()
    {
        // Ambil semua produk
        $products = Product::with('category')->get();

        // Kirim data produk ke view
        return view('allproduk', compact('products'));
    }




    public function showByCategory($id)
    {
        // Ambil kategori berdasarkan ID
        $category = Category::findOrFail($id);

        // Ambil produk berdasarkan kategori tersebut
        $products = Product::where('category_id', $id)->with('category')->get();

        // Kirim data ke view
        return view('listproduk', compact('products', 'category'));
    }




    // public function list()
    // {
    //     $categories = Category::all();
    //     $products = Product::with('category')->get();

    //     return view('listproduk', compact('categories', 'products'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

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
            // 'fee_penjualan' => 'required|numeric|min:0',
            // 'dana_diterima' => 'required|numeric|min:0',
            'berat' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'panjang' => 'required|integer|min:0',
            'lebar' => 'required|integer|min:0',
            'tinggi' => 'required|integer|min:0',
            'packing_kayu' => 'nullable|boolean',
            'asuransi' => 'nullable|boolean',
            'sisi_depan' => 'required|image|mimes:jpeg,png,jpg',
            'sisi_kanan' => 'required|image|mimes:jpeg,png,jpg',
            'sisi_atas' => 'required|image|mimes:jpeg,png,jpg',
            'lainnya' => 'required|image|mimes:jpeg,png,jpg',
            'kondisi_barang' => 'required|string|max:120',
            'garansi' => 'required|string|in:On,Off',
            'lama_pemakaian' => 'required|string|max:20',
            'tangan_ke' => 'required|integer|min:1',
            'waktu_pembelian' => 'nullable|string|max:255',
            'minus' => 'required|string|max:255',
            'kelengkapan' => 'required|string|max:255',
            'wireless' => 'nullable|string|in:Wireless,Wired',
            'suara_aman' => 'nullable|string',
        ]);



        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        // //untuk melihat apakah data terkirim dengan benar
        // dd($request->all());

        $validated = $validator->validated();

        // Tambahkan `customer_id` secara otomatis
        $validated['customer_id'] = auth('customer')->id();
        $validated['fee_penjualan'] = $request->input('fee_penjualan');
        $validated['dana_diterima'] = $request->input('dana_diterima');

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

        // Mengirimkan response redirect dengan pesan sukses
        // Mengirimkan response redirect dengan pesan sukses
        return redirect()->route('upload-produk')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($productId)
    {
        // Ambil ID customer yang sedang login
        $customerId = auth()->guard('customer')->id();

        if (!$customerId) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Ambil produk berdasarkan ID
        $product = Product::findOrFail($productId);

        $product->increment('views');

        // Cek apakah produk sudah ada di wishlist
        $isInWishlist = Wishlist::where('customer_id', $customerId)->where('product_id', $productId)->exists();

        // Kirim data produk dan status wishlist ke view
        return view('detailproduk', compact('product', 'isInWishlist'));
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
