<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    public function index() {
        $drivers = Driver::orderBy('id', 'asc')->paginate(10);
        return view('driver.index', compact('drivers'));
    }

    public function create() {
        return view('driver.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nama' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',            
        ]);
        
        Driver::create($data);
        return redirect()->route('driver.index')->with('success','Berhasil menambahkan driver.');
    }

    public function show(Driver $driver) {
        return view('driver.show',compact('driver'));
    }

    public function edit(Driver $driver) {
        return view('driver.edit',compact('driver'));
    }

    public function update(Request $request, Driver $driver) {
        $request->validate([
            'nama' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $driver->update($request->post());
        return redirect()->route('driver.index')->with('success','Berhasil mengubah data driver.');
    }

    public function destroy(Driver $driver) {
        $driver->delete();
        return redirect()->route('driver.index')->with('success','Berhasil menghapus data driver.');
    }
}
