@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Data Kendaraan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('car.index') }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('car.update',$car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Identitas Kendaraan:</strong>
                    <input type="text" name="identitas_kendaraan" value="{{ $car->identitas_kendaraan }}" class="form-control" placeholder="A0XXX / B0XXX">
                    @error('identitas_kendaraan')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Kendaraan:</strong>
                    <select name="jenis_kendaraan" value="{{ $car->jenis_kendaraan }}" class="form-control">
                        <option value="angkutan orang">angkutan orang</option>
                        <option value="angkutan barang">angkutan barang</option>    
                    </select>
                    @error('jenis_kendaraan')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jadwal Service:</strong>
                    <input type="date" name="jadwal_service_kendaraan" value="{{ $car->jadwal_service_kendaraan }}" class="form-control" placeholder="YYYY-MM-DD">
                    @error('jadwal_service_kendaraan')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sisa BBM:</strong>
                    <input type="text" name="sisa_bbm_kendaraan" value="{{ $car->sisa_bbm_kendaraan }}" class="form-control" placeholder="60 (Liter)">
                    @error('sisa_bbm_kendaraan')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status Kendaraan:</strong>
                    <select name="status_kendaraan" value="{{ $car->status_kendaraan }}" class="form-control">
                        <option value=0>Available</option>
                        <option value=1>Maintenance</option>    
                    </select>
                    @error('status_kendaraan')
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