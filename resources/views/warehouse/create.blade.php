@extends('layouts.index')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Warehouse
                </div>
                <div class="float-end">
                    <a href="{{ route('warehouse.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('warehouse.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 row">
                      <label for="kota" class="col-md-4 col-form-label text-md-end text-start">kota</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{ old('kota') }}">
                          @if ($errors->has('kota'))
                              <span class="text-danger">{{ $errors->first('kota') }}</span>
                          @endif
                      </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_warehouse" class="col-md-4 col-form-label text-md-end text-start">Nama Warehouse</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('nama_warehouse') is-invalid @enderror" id="nama_warehouse" name="nama_warehouse" value="{{ old('nama_warehouse') }}">
                            @if ($errors->has('nama_warehouse'))
                                <span class="text-danger">{{ $errors->first('nama_warehouse') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="alamat" class="col-md-4 col-form-label text-md-end text-start">Alamat</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}">
                            @if ($errors->has('alamat'))
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="pic" class="col-md-4 col-form-label text-md-end text-start">PIC</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('pic') is-invalid @enderror" id="pic" name="pic" value="{{ old('pic') }}">
                            @if ($errors->has('pic'))
                                <span class="text-danger">{{ $errors->first('pic') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nomor_hp_pic" class="col-md-4 col-form-label text-md-end text-start">Nomor HP PIC</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('nomor_hp_pic') is-invalid @enderror" id="nomor_hp_pic" name="nomor_hp_pic" value="{{ old('nomor_hp_pic') }}">
                            @if ($errors->has('nomor_hp_pic'))
                                <span class="text-danger">{{ $errors->first('nomor_hp_pic') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="owner" class="col-md-4 col-form-label text-md-end text-start">Owner</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('owner') is-invalid @enderror" id="owner" name="owner" value="{{ old('owner') }}">
                            @if ($errors->has('owner'))
                                <span class="text-danger">{{ $errors->first('owner') }}</span>
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