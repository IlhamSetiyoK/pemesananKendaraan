@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Data Transaction</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('transaction.index') }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('transaction.update',$transaction->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <input type="hidden" name="nama_admin_peminjaman" value="{{ $transaction->nama_admin_peminjaman }}">
            <input type="hidden" name="status_peminjaman" value="{{ $transaction->status_peminjaman }}">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mulai Peminjaman:</strong>
                    <input type="date" name="mulai_peminjaman" value="{{ $transaction->mulai_peminjaman }}" class="form-control" placeholder="YYYY-MM-DD">
                    @error('mulai_peminjaman')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Selesai Peminjaman:</strong>
                    <input type="date" name="selesai_peminjaman" value="{{ $transaction->selesai_peminjaman }}" class="form-control" placeholder="YYYY-MM-DD">
                    @error('selesai_peminjaman')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alasan Peminjaman:</strong>
                    <input type="text" name="alasan_peminjaman" value="{{ $transaction->alasan_peminjaman }}" class="form-control" placeholder="Masukkan Alasan Peminjaman">
                    @error('alasan_peminjaman')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pilih Kendaraan:</strong>
                    <select name="id_kendaraan" class="form-control">
                        <option value="" disabled selected>Pilih Kendaraan</option>
                        @foreach ($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->identitas_kendaraan }}</option>
                        @endforeach
                    </select>
                    @error('id_kendaraan')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pilih Driver:</strong>
                    <select name="id_driver" class="form-control">
                        <option value="" disabled selected>Pilih Driver</option>
                        @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}">{{ $driver->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_driver')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pilih Verifikator:</strong>
                    <select name="id_user" class="form-control">
                        <option value="" disabled selected>Pilih Verifikator</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('id_user')
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