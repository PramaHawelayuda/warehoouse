@extends('layouts.index')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Kategori
                </div>
                <div class="float-end">
                    <a href="{{ route('kategori.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 row">
                      <label for="nama_kategori" class="col-md-4 col-form-label text-md-end text-start">Nama Kategori</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}">
                          @if ($errors->has('nama_kategori'))
                              <span class="text-danger">{{ $errors->first('nama_kategori') }}</span>
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