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
                <h3>Satuan</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('satuan.create') }}" onclick="add()" class="btn btn-success btn-sm my-2"></i>Add New</a>
                <div class="card">
                    <div class="card-datatable text-nowrap">
                        <table class="datatables-ajax table table-bordered" id="dt"> 
                            <thead>
                              <tr>
                                <th scope="col">Nama Satuan</th>
                                <th scope="col">Status</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                @if ($satuan->count() > 0)
                                    @foreach ($satuan as $satuan)
                                        <tr>
                                            
                                            <td>{{ $satuan->nama_satuan }}</td>
                                            {{-- <td>{{ $satuan->status }}</td> --}}
                                            <td>
                                                <a href="satuan/{{ $satuan->id }}/status" class="btn btn-sm btn-{{ $satuan->status ? 'success' : 'danger' }}">
                                                  {{ $satuan->status ? 'Aktif' : 'Non-Aktif' }}
                                                </a>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('satuan.destroy', $satuan->id) }}">
                                                    <a href="{{ route('satuan.edit', $satuan->id) }}" type="button" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   
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