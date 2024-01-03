<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = Satuan::orderBy('created_at', 'DESC')-> get();

        return view('satuan.index', compact('satuan'));
    }

    public function create()
    {
        return view('satuan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_satuan' => 'required'
        ]);

        Satuan::create($request->all());

        return redirect()->route('satuan.index')-> with('success','Satuan added successfully');
    }

    public function show(string $id)
    {

        $satuan = Satuan::findOrFail($id);

        return view('satuan.show', compact('satuan'));
    }

    public function edit(string $id)
    {
        $satuan = Satuan::findOrFail($id);

        return view('satuan.edit', compact('satuan'));
    }

    public function update(Request $request, string $id)
    {
        $satuan = Satuan::findOrFail($id);

        $request->validate([
            'nama_satuan' => 'required'
        ]);

        $satuan->update($request->all());

        return redirect()->route('satuan.index')->with('success','Satuan updated successfully');
    }

    public function destroy(string $id)
    {
        $satuan = Satuan::findOrFail($id);
        
        $satuan->delete();

        return redirect()->route('satuan.index')->with('success', 'Satuan deleted succesfully');
    }

    public function status($satuanId)
    {
        $satuan = Satuan::find($satuanId);

        if($satuan){
            if($satuan->status){
                $satuan->status = 0;
            }
            else{
                $satuan->status = 1;
            }
        }

        $satuan->save();

        return back();
    }
}
