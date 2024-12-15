<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    public function updateStatusProduk($id)
    {
        // Temukan transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($id);

        // Pastikan status belum "Pesanan Selesai" untuk menghindari perubahan ganda
        if ($transaction->status_produk != 'Pesanan Selesai') {
            // Update status produk menjadi "Pesanan Selesai"
            $transaction->status_produk = 'Pesanan Selesai';
            $transaction->save();
        }

        // Redirect ke halaman yang sama dengan pesan sukses
        return redirect()->back()->with('success', 'Status produk telah diperbarui.');
    }



    public function showStatusProduk()
    {
        $transactions = Transaction::with('product', 'alamat') // Eager load related data
            ->get();

        return view('statusproduk', compact('transactions'));
    }

    public function addToTransaction(Request $request)
    {
        // Menambahkan log di awal untuk mengecek apakah request masuk
        Log::info('Masuk ke method addToTransaction');

        // Validasi input dari form
        $validatedData = $request->validate([
            'alamat_id' => 'required|exists:alamats,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'bukti_pembayaran' => 'required|image|max:2048', // File gambar bukti
        ]);

        // Menambahkan log setelah validasi berhasil
        Log::info('Validasi berhasil:', $validatedData);

        // Ambil data produk dari database
        $product = Product::findOrFail($request->product_id);

        // Periksa stok produk
        if ($product->stok < $request->quantity) {
            Log::warning('Stok produk tidak mencukupi untuk produk ID: ' . $product->id);
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi');
        }

        // Upload bukti pembayaran ke storage
        $buktiPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        Log::info('Bukti pembayaran berhasil diupload, path: ' . $buktiPath);

        // Hitung total harga transaksi
        $hargaOngkir = 30000.00; // Ongkos kirim tetap
        $totalHarga = ($product->harga * $request->quantity) + $hargaOngkir;

        // Buat transaksi baru
        try {
            $transaction = Transaction::create([
                'customer_id' => Auth::id(), // ID customer yang login
                'alamat_id' => $request->alamat_id,
                'product_id' => $product->id,
                'bukti_pembayaran' => $buktiPath,
                'harga_ongkir' => $hargaOngkir,
                'quantity' => $request->quantity,
                'total_harga' => $totalHarga,
                'status_pembayaran' => 'Pending',
                'status_produk' => 'Unprocessed',
            ]);
            Log::info('Transaksi berhasil dibuat: ', $transaction->toArray());
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat membuat transaksi: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuat transaksi.');
        }

        // Kurangi stok produk
        $product->decrement('stok', $request->quantity);
        Log::info('Stok produk berhasil dikurangi: ' . $product->stok);

        // Redirect ke halaman home dengan pesan sukses
        return redirect()->route('status.produk')->with('success', 'Pembayaran berhasil. Status produk: Belum diproses.');
    }
}
