<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        // Gunakan auth guard untuk 'customer' jika Anda menggunakan custom guard
        $customerId = auth()->guard('customer')->id();

        if (!$customerId) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Ambil produk dari tabel wishlist berdasarkan pelanggan yang login
        $products = Product::whereIn('id', function ($query) use ($customerId) {
            $query->select('product_id')
                ->from('wishlists')
                ->where('customer_id', $customerId);
        })->get();

        // Pastikan variabel $products dikirimkan ke view
        return view('wishlistproduk', compact('products'));
    }

    public function add(Request $request)
    {
        $productId = $request->id;
        // Gunakan auth guard untuk 'customer'
        $customerId = auth()->guard('customer')->id();

        // Cek jika id customer valid
        if (!$customerId) {
            return response()->json(['success' => false, 'message' => 'User not authenticated.']);
        }

        // Logika untuk menambahkan produk ke wishlist
        Wishlist::create([
            'product_id' => $productId,
            'customer_id' => $customerId,
        ]);

        return response()->json(['success' => true, 'message' => 'Product added to wishlist.']);
    }

    public function remove($productId)
    {
        // Gunakan auth guard untuk 'customer'
        $customerId = auth()->guard('customer')->id();

        if (!$customerId) {
            return response()->json(['success' => false, 'message' => 'User not authenticated.']);
        }

        // Hapus produk dari wishlist berdasarkan customer_id dan product_id
        Wishlist::where('customer_id', $customerId)->where('product_id', $productId)->delete();

        return response()->json(['success' => true, 'message' => 'Product removed from wishlist.']);
    }
}
