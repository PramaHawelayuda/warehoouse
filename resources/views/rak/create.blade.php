@extends('layouts.index')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Lokasi Gudang
                </div>
                <div class="float-end">
                    <a href="{{ route('rak.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('rak.store') }}" method="POST">
                    @csrf

                    {{-- <div class="mb-3 row">
                        <label for="id_area" class="col-md-4 col-form-label text-md-end text-start">Nama Area</label>
                        <div class="col-md-6">
                            <select name="id_area" id="" class="form-control">
                                <option value="">- Pilih -</option>
                                @foreach ($area_gudang as $item => $nama_area)
                                    <option value="{{ $nama_area->id }}">{{ $nama_area->nama_area }}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    <div class="mb-3 row">
                        <label for="id_area" class="col-md-4 col-form-label text-md-end text-start">Nama Area</label>
                        <div class="col-md-6">
                            <select name="id_area" id="" class="form-control">
                                <option value="">- Pilih -</option>
                                @foreach ($area_gudang as $item => $nama_area)
                                    <option value="{{ $nama_area->id }}">{{ $nama_area->nama_area }}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_rak" class="col-md-4 col-form-label text-md-end text-start">Nama Rak</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('nama_rak') is-invalid @enderror" id="nama_rak" name="nama_rak" value="{{ old('nama_rak') }}">
                            @if ($errors->has('nama_rak'))
                                <span class="text-danger">{{ $errors->first('nama_rak') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Product">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection