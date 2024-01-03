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
                    Edit Data User
                </div>
                <div class="float-end">
                    <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email',$user->email) }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Nama User</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$user->name) }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nomor_hp" class="col-md-4 col-form-label text-md-end text-start">Nomor HP</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp',$user->nomor_hp) }}">
                            @if ($errors->has('nomor_hp'))
                                <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="id_role" class="col-md-4 col-form-label text-md-end text-start">Role</label>
                        <div class="col-md-6">
                            <select name="id_role" id="" class="form-control">
                                <option value="">- Pilih -</option>
                                @foreach ($role as $item => $name)
                                    <option value="{{ $name->id }}" {{ old('id_role',$user->id_role == $name->id ? 'selected' : '') }}>{{ $name->name }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>

                    <div class="mb-3 row">
                        <label for="nama_warehouse" class="col-md-4 col-form-label text-md-end text-start">Nama Warehouse</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('nama_warehouse') is-invalid @enderror" id="nama_warehouse" name="nama_warehouse" value="{{ old('nama_warehouse', $user->nama_warehouse) }}">
                            @if ($errors->has('nama_warehouse'))
                                <span class="text-danger">{{ $errors->first('nama_warehouse') }}</span>
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