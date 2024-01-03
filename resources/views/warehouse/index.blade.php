@extends('layouts.index')
@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
    
        <div class="card">
            <div class="card-header">
                <h3>Warehouse</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('warehouse.create') }}" onclick="add()" class="btn btn-success btn-sm my-2"></i>Add New</a>
                <div class="card">
                    <div class="card-datatable text-nowrap">
                        <table class="datatables-ajax table table-bordered" id="dt"> 
                            <thead>
                              <tr>
                                <th scope="col">Kota</th>
                                <th scope="col">Nama Warehouse</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">PIC</th>
                                <th scope="col">Nomor HP PIC</th>
                                <th scope="col">Owner</th>
                                <th scope="col">Status</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                @if ($warehouse->count() > 0)
                                    @foreach ($warehouse as $warehouse)
                                        <tr>
                                            
                                            <td>{{ $warehouse->kota }}</td>
                                            <td>{{ $warehouse->nama_warehouse }}</td>
                                            <td>{{ $warehouse->alamat }}</td>
                                            <td>{{ $warehouse->pic }}</td>
                                            <td>{{ $warehouse->nomor_hp_pic }}</td>
                                            <td>{{ $warehouse->owner }}</td>
                                            {{-- <td>{{ $warehouse->status }}</td> --}}
                                            <td>
                                                <a href="warehouse/{{ $warehouse->id }}/status" class="btn btn-sm btn-{{ $warehouse->status ? 'success' : 'danger' }}">
                                                    {{ $warehouse->status ? 'Aktif' : 'Non-Aktif' }}
                                                </a>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('warehouse.destroy', $warehouse->id) }}">
                                                    <a href="{{ route('warehouse.edit', $warehouse->id) }}" type="button" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center">Product Not found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-js')
<script type="text/javascript">
    function add(){
        $('$satuan-modal').modal('show');
    }
</script>
@endsection