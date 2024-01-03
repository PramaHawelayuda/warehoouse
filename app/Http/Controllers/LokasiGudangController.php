<?php

namespace App\Http\Controllers;

use App\Models\LokasiGudang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LokasiGudangController extends Controller
{
    public function index()
    {
        $lokasi_gudang = LokasiGudang::orderBy('created_at', 'DESC')-> get();

        return view('lokasigudang.index', compact('lokasi_gudang'));
    }

    public function create()
    {
        return view('lokasigudang.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'provinsi' => 'required',
            'kota' => 'required'
        ]);

        LokasiGudang::create($request->all());

        return redirect()->route('lokasigudang.index')-> with('success','Lokasi Gudang added successfully');
    }

    public function show(string $id)
    {

        $lokasi_gudang = LokasiGudang::findOrFail($id);

        return view('lokasigudang.show', compact('lokasi_gudang'));
    }

    public function edit(string $id)
    {
        $lokasi_gudang = LokasiGudang::findOrFail($id);

        return view('lokasigudang.edit', compact('lokasi_gudang'));
    }

    public function update(Request $request, string $id)
    {
        $lokasi_gudang = LokasiGudang::findOrFail($id);

        $request->validate([
            'provinsi' => 'required',
            'kota' => 'required'
        ]);

        $lokasi_gudang->update($request->all());

        return redirect()->route('lokasigudang.index')->with('success','Satuan updated successfully');
    }

    public function destroy(string $id)
    {
        $lokasi_gudang = LokasiGudang::findOrFail($id);
        
        $lokasi_gudang->delete();

        return redirect()->route('lokasigudang.index')->with('success', 'Lokasi Gudang deleted succesfully');
    }

    public function status($lokasiId)
    {
        $lokasi_gudang = LokasiGudang::find($lokasiId);

        if($lokasi_gudang){
            if($lokasi_gudang->status){
                $lokasi_gudang->status = 0;
            }
            else{
                $lokasi_gudang->status = 1;
            }
        }

        $lokasi_gudang->save();

        return back();
    }
}
