<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class WishlistController extends Controller
{
    // Menambahkan produk ke wishlist
    public function add(Request $request)
    {
        $wishlist = Session::get('wishlist', []); // Ambil data wishlist dari session

        // Tambahkan ID produk ke wishlist jika belum ada
        if (!in_array($request->id, $wishlist)) {
            $wishlist[] = $request->id;
            Session::put('wishlist', $wishlist);

            return response()->json(['success' => true, 'message' => 'Produk berhasil ditambahkan ke wishlist!']);
        }

        return response()->json(['success' => false, 'message' => 'Produk sudah ada di wishlist.']);
    }

    // Menampilkan wishlist
    public function index()
    {
        $wishlist = Session::get('wishlist', []); // Ambil ID produk dari session

        // Ambil data produk berdasarkan ID di wishlist
        $products = Product::whereIn('id', $wishlist)->get();

        return view('wishlistproduk', compact('products'));
    }

    // Menghapus produk dari wishlist
    public function remove($id)
    {
        $wishlist = Session::get('wishlist', []); // Ambil data wishlist dari session

        // Hapus produk dari wishlist
        if (($key = array_search($id, $wishlist)) !== false) {
            unset($wishlist[$key]);
            Session::put('wishlist', array_values($wishlist)); // Menjaga index array
        }

        return response()->json(['success' => true, 'message' => 'Produk berhasil dihapus dari wishlist.']);
    }
}
