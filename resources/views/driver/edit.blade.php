@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Data Driver</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('driver.index') }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('driver.update',$driver->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Driver:</strong>
                    <input type="text" name="nama" value="{{ $driver->nama }}" class="form-control" placeholder="Masukkan Nama Lengkap">
                    @error('nama')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Usia:</strong>
                    <input type="text" name="usia" value="{{ $driver->usia }}" class="form-control" placeholder="Masukkan Usia Dalam Tahun">
                    @error('usia')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat:</strong>
                    <input type="text" name="alamat" value="{{ $driver->alamat }}" class="form-control" placeholder="Alamat Domisili">
                    @error('alamat')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nomor Telepon:</strong>
                    <input type="text" name="no_hp" value="{{ $driver->no_hp }}" class="form-control" placeholder="087XXXXXXXXX">
                    @error('no_hp')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection