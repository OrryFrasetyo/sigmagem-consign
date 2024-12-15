<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // fungsi menampilkan semua transaksi di status produk (user sedang login)
    public function getTransaction()
    {
        $transactionItems = Transaction::where('customer_id', Auth::id())
                            ->with('')
                            ->get();
    }

    public function showTransaction()
    {

    }

    public function addToTransaction(Request $request)
    {
        // Validasi input
        $request->validate([
            'alamat_id' => 'required|exists:alamats,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'bukti_pembayaran' => 'required|image|max:2048', // File gambar bukti
        ]);

        // Ambil data produk
        $product = Product::findOrFail($request->product_id);

        // Periksa stok produk
        if ($product->stok < $request->quantity) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi');
        }

        // Upload bukti pembayaran
        $buktiPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        // Hitung total harga
        $hargaOngkir = 30000.00; // Harga ongkir tetap
        $totalHarga = ($product->harga * $request->quantity) + $hargaOngkir;

        // Buat transaksi baru
        $transaction = Transaction::create([
            'customer_id' => Auth::id(), // ID customer yang login
            'alamat_id' => $request->alamat_id,
            'product_id' => $product->id,
            'bukti_pembayaran' => $buktiPath,
            'harga_ongkir' => $hargaOngkir,
            'quantity' => $request->quantity,
            'total_harga' => $totalHarga,
            'status_pembayaran' => 'Sedang diproses',
            'status_produk' => 'Belum diproses',
        ]);

        // Kurangi stok produk
        $product->decrement('stok', $request->quantity);

        return redirect()->route('statusproduk')->with('success', 'Pembayaran berhasil. Status produk: Belum diproses.');
    }


}
