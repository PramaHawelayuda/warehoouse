<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::orderBy('created_at', 'DESC')-> get();

        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        $kategori = Kategori::all();

        return view('kategori.create', compact('kategori'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')-> with('success','Kategori added successfully');
    }

    public function show(string $id)
    {
        $kategori = Kategori::find($id);

        if($kategori){
            if($kategori->status){
                $kategori->status = 0;
            }
            else{
                $kategori->status = 1;
            }
        }

        $kategori->save();

        return back();

        $kategori = Kategori::findOrFail($id);

        return view('kategori.show', compact('kategori'));
    }

    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, string $id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required'
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success','Satuan updated successfully');
    }

    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Satuan deleted succesfully');
    }

    public function status($kategoriId)
    {
        $kategori = Kategori::find($kategoriId);

        if($kategori){
            if($kategori->status){
                $kategori->status = 0;
            }
            else{
                $kategori->status = 1;
            }
        }

        $kategori->save();

        return back();
    }
}
