@extends('layouts.index')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New User
                </div>
                <div class="float-end">
                    <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 row">
                      <label for="name" class="col-md-4 col-form-label text-md-end text-start">Nama</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                          @if ($errors->has('name'))
                              <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                          @if ($errors->has('email'))
                              <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                      <div class="col-md-6">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                          @if ($errors->has('password'))
                              <span class="text-danger">{{ $errors->first('password') }}</span>
                          @endif
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="nomor_hp" class="col-md-4 col-form-label text-md-end text-start">Nomor HP</label>
                      <div class="col-md-6">
                        <input type="string" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}">
                          @if ($errors->has('nomor_hp'))
                              <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                          @endif
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="role" class="col-md-4 col-form-label text-md-end text-start">Role</label>
                      <div class="col-md-6">
                          <select name="id_role" id="" class="form-control">
                              <option value="">- Pilih -</option>
                              @foreach ($role as $item => $name)
                                  <option value="{{ $name->id }}">{{ $name->name }}</option>
                              @endforeach
                          </select>
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
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Product">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection