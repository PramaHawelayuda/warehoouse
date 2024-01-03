@extends('layouts.index')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Satuan
                </div>
                <div class="float-end">
                    <a href="{{ route('satuan.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('satuan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 row">
                      <label for="nama_satuan" class="col-md-4 col-form-label text-md-end text-start">Nama Satuan</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control @error('nama_satuan') is-invalid @enderror" id="nama_satuan" name="nama_satuan" value="{{ old('nama_satuan') }}">
                          @if ($errors->has('nama_satuan'))
                              <span class="text-danger">{{ $errors->first('nama_satuan') }}</span>
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