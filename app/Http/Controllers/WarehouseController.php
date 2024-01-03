<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouse = Warehouse::orderBy('created_at', 'DESC')->get();
        
        return view('warehouse.index', compact('warehouse'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kota' => 'required',
            'nama_warehouse' => 'required',
            'alamat' => 'required',
            'pic' => 'required',
            'nomor_hp_pic' => 'required',
            'owner' => 'required'
        ]);

        Warehouse::create($request->all());
        
        return redirect()->route('warehouse.index')->with('success','Warehouse added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $warehouse = Warehouse::findOrFail($id);
        
        return view('warehouse.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $warehouse = Warehouse::findOrFail($id);

        return view('warehouse.edit', compact('warehouse'));
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $warehouse = Warehouse::findOrFail($id);

        $warehouse->update($request->all());

        return redirect()->route('warehouse.index')
            ->with('sucess', 'Warehouse updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warehouse = Warehouse::findOrFail($id);

        $warehouse->delete();

        return redirect()->route('warehouse.index')
            ->with('success', 'Warehouse deleted succesfully.');
    }

    public function status($warehouseId)
    {
        $warehouse = Warehouse::find($warehouseId);

        if($warehouse){
            if($warehouse->status){
                $warehouse->status = 0;
            }
            else{
                $warehouse->status = 1;
            }
        }

        $warehouse->save();
        return back();
    }
}
