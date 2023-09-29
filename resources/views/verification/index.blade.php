@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Permintaan Peminjaman</h2>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Pengajuan</th>
                <th class="text-center">Jenis Kendaraan</th>
                <th class="text-center">Identitas Kendaraan</th>
                <th class="text-center">Nama Pengemudi</th>
                <th class="text-center">Mulai Peminjaman</th>
                <th class="text-center">Selesai Peminjaman</th>
                <th class="text-center">Status</th>
                <th width="280px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ $transaction->nama_admin_peminjaman }}</td>
                    <td>{{ $transaction->car->jenis_kendaraan }}</td>
                    <td>{{ $transaction->car->identitas_kendaraan }}</td>
                    <td>{{ $transaction->driver->nama }}</td>
                    <td>{{ $transaction->mulai_peminjaman }}</td>
                    <td>{{ $transaction->selesai_peminjaman }}</td>
                    <td>
                    @if($transaction->status_peminjaman == 0)
                        <a class="btn btn-danger" disabled>Waiting</a>    
                    @elseif($transaction->status_peminjaman == 1)
                        <a class="btn btn-warning">Process</a>
                    @elseif($transaction->status_peminjaman == 2)
                        <a class="btn btn-primary">Finish</a>
                    @endif
                    </td>
                    <td>
                        <form action="{{ route('verification.update',$transaction->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status_peminjaman" value="1">
                            <button type="submit" class="btn btn-warning">Approve</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    {!! $transactions->links() !!}
</div>
@endsection
    