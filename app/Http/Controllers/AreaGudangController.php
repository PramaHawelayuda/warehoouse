<?php

namespace App\Http\Controllers;

use App\Models\AreaGudang;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class AreaGudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $area_gudang = AreaGudang::orderBy('created_at','DESC')->get();

        return view('areagudang.index', compact('area_gudang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warehouse = Warehouse::all();
        
        return view('areagudang.create', compact('warehouse'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_warehouse' => 'required',
            'nama_area' => 'required'
        ]);

        AreaGudang::create($request->all());

        return redirect()->route('areagudang.index')
            ->with('success', 'Area Gudang added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $area_gudang = AreaGudang::findOrFail($id);

        return view('areagudang.show', compact('area_gudang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $area_gudang = AreaGudang::findOrFail($id);
        $warehouse = Warehouse::all();

        return view('areagudang.edit', compact('area_gudang', 'warehouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $area_gudang = AreaGudang::findOrFail($id);

        // $area_gudang -> update($request->all());
        
        $area_gudang ->update([
            'id_warehouse' => $request->id_warehouse,
            'nama_area' => $request->nama_area

        ]);

        return redirect()->route('areagudang.index')
            ->with('success', 'Area Gudang updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $area_gudang = AreaGudang::findOrFail($id);

        $area_gudang->delete();

        return redirect()->route('areagudang.index')
            ->with('success', 'Lokasi Gudang deleted succesfully');
    }

    public function status(string $id)
    {
        $area_gudang = AreaGudang::find($id);

        if($area_gudang){
            if($area_gudang->status){
                $area_gudang->status = 0;
            }
            else{
                $area_gudang->status = 1;
            }
        }

        $area_gudang->save();
        return back();
    }
}
