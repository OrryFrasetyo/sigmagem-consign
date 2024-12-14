<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Simpan transaksi setelah validasi stok.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'alamat_id' => 'required|exists:alamats,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'bukti_pembayaran' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048'
        ]);

        // Ambil data produk dari database
        $product = Product::findOrFail($request->product_id);

        // Cek ketersediaan stok
        if ($request->quantity > $product->stok) {
            return back()->with('error', 'Stok produk tidak mencukupi. Stok saat ini: ' . $product->stok);
        }

        // Hitung total harga
        $totalHarga = $product->harga * $request->quantity;

        try {
            DB::beginTransaction();

            // Buat transaksi baru
            $transaction = Transaction::create([
                'customer_id' => $request->customer_id,
                'alamat_id' => $request->alamat_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'total_harga' => $totalHarga,
                'status_pembayaran' => 'pending',
                'bukti_pembayaran' => $request->file('bukti_pembayaran')
                    ? $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public')
                    : null
            ]);

            // Kurangi stok produk
            $product->stok -= $request->quantity;
            $product->save();

            DB::commit();

            return redirect()->route('checkout.success')->with('success', 'Transaksi berhasil, stok telah diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function checkout()
    {
        // Misalkan customer_id diambil dari sesi login
        $customerId = auth('customer')->id();

        // Ambil semua alamat milik customer
        $alamats = Alamat::where('customer_id', $customerId)->get();

        return view('statusproduk', compact('alamats'));
    }
}
