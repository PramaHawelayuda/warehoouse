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
                    Edit Rak
                </div>
                <div class="float-end">
                    <a href="{{ route('rak.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('rak.update', $rak->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="id_area" class="col-md-4 col-form-label text-md-end text-start">Nama Area</label>
                        <div class="col-md-6">
                            <select name="id_area" id="" class="form-control">
                                <option value="">- Pilih -</option>
                                @foreach ($area_gudang as $item => $nama_area)
                                    <option value="{{ $nama_area->id }}" {{ old('id_area',$rak->id_area == $nama_area->id ? 'selected' : '') }}>{{ $nama_area->nama_area }}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_rak" class="col-md-4 col-form-label text-md-end text-start">Nama Rak</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('nama_rak') is-invalid @enderror" id="nama_rak" name="nama_rak" value="{{ old('nama_rak', $rak->nama_rak) }}">
                            @if ($errors->has('nama_rak'))
                                <span class="text-danger">{{ $errors->first('nama_rak') }}</span>
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