@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Kendaraan</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('car.create') }}"> Tambah Kendaraan </a>
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
                <th class="text-center">Identitas Kendaraan</th>
                <th class="text-center">Jenis Kendaraaan</th>
                <th class="text-center">Jadwal Service</th>
                <th class="text-center">Status Kendaraan</th>
                <th width="280px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->identitas_kendaraan }}</td>
                    <td>{{ $car->jenis_kendaraan }}</td>
                    <td>{{ $car->jadwal_service_kendaraan }}</td>
                    <td>
                    @if($car->status_kendaraan == 0)
                        <a class="btn btn-primary" disabled>Available</a>
                    @elseif($car->status_kendaraan == 1)
                        <a class="btn btn-warning" disabled>Maintenance</a>
                    @endif
                    </td>
                    <td>
                        <form action="{{ route('car.destroy',$car->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('car.edit',$car->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    {!! $cars->links() !!}
</div>
@endsection
    