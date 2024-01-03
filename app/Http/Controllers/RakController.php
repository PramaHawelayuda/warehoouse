<?php

namespace App\Http\Controllers;

use App\Models\AreaGudang;
use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rak = Rak::orderBy('created_at', 'DESC')->get();

        return view('rak.index', compact('rak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $area_gudang = AreaGudang::all();
        return view('rak.create', compact('area_gudang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_area' => 'required',
            'nama_rak' => 'required'
        ]);

        Rak::create($request->all());

        return redirect()->route('rak.index')
            ->with('success', 'Rak added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $rak = Rak::findOrFail($id);

        return view('rak.show', compact('rak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rak = Rak::findOrFail($id);
        $area_gudang = AreaGudang::all();

        return view('rak.edit', compact('rak','area_gudang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $rak = Rak::findOrFail($id);
        $area_gudang = AreaGudang::findOrFail($id);

        $rak->update([
            'id_area' => $request->id_area,
            'nama_rak' => $request->nama_rak
        ]);
        

        return redirect()->route('rak.index')
            ->with('Success', 'Rak updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rak = Rak::findOrFail($id);

        $rak->delete();

        return redirect()->route('rak.index')
            ->with('success', 'Rak deleted succesfully');
    }

    public function status($rakId)
    {
        $rak = Rak::find($rakId);

        if($rak){
            if($rak->status){
                $rak->status = 0;
            }
            else{
                $rak->status = 1;
            }
        }

        $rak->save();
        return back();
    }
}
