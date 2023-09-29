@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Driver</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('driver.create') }}"> Tambah Driver </a>
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
                <th class="text-center">Nama</th>
                <th class="text-center">Nomor Telepon</th>
                <th class="text-center">Usia</th>
                <th class="text-center">Alamat</th>
                <th width="280px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($drivers as $driver)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ $driver->nama }}</td>
                    <td>{{ $driver->no_hp }}</td>
                    <td>{{ $driver->usia }}</td>
                    <td>{{ $driver->alamat }}</td>
                    <td>
                        <form action="{{ route('driver.destroy',$driver->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('driver.edit',$driver->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    {!! $drivers->links() !!}
</div>
@endsection
    