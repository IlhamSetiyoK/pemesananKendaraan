<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index() {
        $cars = Car::orderBy('id', 'asc')->paginate(10);
        return view('car.index', compact('cars'));
    }

    public function create() {
        return view('car.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'jenis_kendaraan' => 'required',
            'identitas_kendaraan' => 'required',
            'status_kendaraan' => 'required',
            'jadwal_service_kendaraan' => 'required',
            'sisa_bbm_kendaraan' => 'required',
        ]);
        
        Car::create($data);
        return redirect()->route('car.index')->with('success','Berhasil menambahkan kendaraan.');
    }

    public function show(Car $car) {
        return view('car.show',compact('car'));
    }

    public function edit(Car $car) {
        return view('car.edit',compact('car'));
    }

    public function update(Request $request, Car $car) {
        $request->validate([
            'jenis_kendaraan' => 'required',
            'identitas_kendaraan' => 'required',
            'status_kendaraan' => 'required',
            'jadwal_service_kendaraan' => 'required',
            'sisa_bbm_kendaraan' => 'required',
        ]);

        $car->update($request->post());
        return redirect()->route('car.index')->with('success','Berhasil mengubah kendaraan.');
    }

    public function destroy(Car $car) {
        $car->delete();
        return redirect()->route('car.index')->with('success','Berhasil menghapus kendaraan.');
    }
}
