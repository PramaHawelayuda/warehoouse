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
                    Edit Lokasi Gudang
                </div>
                <div class="float-end">
                    <a href="{{ route('lokasigudang.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('lokasigudang.update', $lokasi_gudang->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="provinsi" class="col-md-4 col-form-label text-md-end text-start">Provinsi</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" value="{{ old('provinsi', $lokasi_gudang->provinsi) }}">
                            @if ($errors->has('provinsi'))
                                <span class="text-danger">{{ $errors->first('provinsi') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="kota" class="col-md-4 col-form-label text-md-end text-start">Nama Satuan</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{ old('kota', $lokasi_gudang->kota) }}">
                            @if ($errors->has('kota'))
                                <span class="text-danger">{{ $errors->first('kota') }}</span>
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