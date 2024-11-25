<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    // CartController.php
    public function getCart()
    {
        // Mengambil semua item keranjang yang dimiliki customer yang sedang login
        $cartItems = Cart::where('customer_id', Auth::id())
            ->with('product.customer') // Mengambil relasi produk dan customer
            ->get(); // Mengambil data sebagai koleksi Eloquent

        return view('keranjangproduk', compact('cartItems')); // Mengirim data ke view
    }



    public function showCart()
    {
        // Mengambil data keranjang dan mengelompokkan berdasarkan customer_id
        $cartItems = Cart::with('product.customer') // Memastikan data produk dan customer tersedia
            ->get()
            ->groupBy(function ($item) {
                return $item->product->customer->id; // Mengelompokkan berdasarkan customer_id
            });

        return view('cart.index', compact('cartItems'));
    }



    // Fungsi untuk menambahkan produk ke keranjang
    public function addToCart(Request $request, $productId)
    {
        // Mendapatkan customer yang sedang login
        $customer = Auth::user();

        // Mendapatkan produk berdasarkan ID
        $product = Product::findOrFail($productId);

        // Mengecek apakah produk sudah ada di keranjang customer ini
        $cartItem = Cart::where('customer_id', $customer->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // Jika produk sudah ada, update quantity
            $cartItem->quantity += $request->input('quantity', 1);
            $cartItem->save();
        } else {
            // Jika produk belum ada, tambahkan ke keranjang
            Cart::create([
                'customer_id' => $customer->id,
                'product_id' => $product->id,
                'quantity' => $request->input('quantity', 1),
            ]);
        }

        // Redirect atau response sesuai kebutuhan
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // CartController.php




    public function removeFromCart($cartItemId)
    {
        // Mendapatkan item keranjang berdasarkan ID
        $cartItem = Cart::findOrFail($cartItemId);

        // Pastikan item tersebut milik customer yang sedang login
        if ($cartItem->customer_id != Auth::id()) {
            return redirect()->route('cart.index')->with('error', 'Anda tidak dapat menghapus item ini.');
        }

        // Menghapus item dari keranjang
        $cartItem->delete();

        // Redirect kembali ke halaman keranjang
        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }


    public function decreaseQuantity(Request $request, $cartItemId)
    {
        $cartItem = Cart::with('product')->findOrFail($cartItemId);  // Pastikan relasi produk dimuat

        // Pastikan stok lebih dari 1 sebelum mengurangi quantity
        if ($cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->save();
        }

        return response()->json([
            'quantity' => $cartItem->quantity,
            'total' => $this->getCartTotal(),
            'max_stock' => $cartItem->product->stok  // Menyertakan stok maksimal produk
        ]);
    }

    public function increaseQuantity(Request $request, $cartItemId)
    {
        $cartItem = Cart::with('product')->findOrFail($cartItemId);  // Pastikan relasi produk dimuat

        if ($cartItem->quantity < $cartItem->product->stok) {
            $cartItem->quantity += 1;
            $cartItem->save();
        }

        return response()->json([
            'quantity' => $cartItem->quantity,
            'total' => $this->getCartTotal()  // Menghitung ulang total cart
        ]);
    }



    // Function untuk mendapatkan total harga cart
    private function getCartTotal()
    {
        // Hanya ambil cart untuk customer yang sedang login dan relasi produk
        $cartItems = Cart::where('customer_id', Auth::id())->with('product')->get();

        return $cartItems->sum(function ($item) {
            return $item->product->harga * $item->quantity;
        });
    }
}
