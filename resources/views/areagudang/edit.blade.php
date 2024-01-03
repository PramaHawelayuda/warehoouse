@extends('layouts.index')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Area Gudang
                </div>
                <div class="float-end">
                    <a href="{{ route('areagudang.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('areagudang.update', $area_gudang->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="id_warehouse" class="col-md-4 col-form-label text-md-end text-start">Nama Warehouse</label>
                        <div class="col-md-6">
                            <select name="id_warehouse" id="" class="form-control">
                                <option value="">- Pilih -</option>
                                @foreach ($warehouse as $item => $nama_warehouse)
                                    <option value="{{ $nama_warehouse->id }}" {{ old('id_warehouse', $area_gudang->id_warehouse == $nama_warehouse->id ? 'selected' : '') }}>{{ $nama_warehouse->nama_warehouse }}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_area" class="col-md-4 col-form-label text-md-end text-start">Nama Area</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('nama_area') is-invalid @enderror" id="nama_area" name="nama_area" value="{{ old('nama_area', $area_gudang->nama_area) }}">
                            @if ($errors->has('nama_area'))
                                <span class="text-danger">{{ $errors->first('nama_area') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
@endsection