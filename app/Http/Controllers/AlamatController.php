<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alamat;
use Illuminate\Support\Facades\Auth;

class AlamatController extends Controller
{
    public function index()
    {
        $alamat = Alamat::where('customer_id', Auth::id())->get();
        return view('alamatcustomer', compact('alamat'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'alamat' => 'required|string',
            'detail' => 'nullable|string',
        ]);

        $validated['customer_id'] = Auth::id();
        Alamat::create($validated);

        return redirect()->route('alamat.index')->with('success', 'Alamat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $alamat = Alamat::findOrFail($id);
        return view('alamat.edit', compact('alamat'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'alamat' => 'required|string',
            'detail' => 'nullable|string',
        ]);

        $alamat = Alamat::findOrFail($id);
        $alamat->update($validated);

        return redirect()->route('alamat.index')->with('success', 'Alamat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $alamat = Alamat::findOrFail($id);
        $alamat->delete();

        return redirect()->route('alamat.index')->with('success', 'Alamat berhasil dihapus.');
    }
}
