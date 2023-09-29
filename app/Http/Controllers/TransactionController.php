<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Car;
use App\Models\Driver;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionExport;

class TransactionController extends Controller
{
    public function index() {
        $transactions = Transaction::orderBy('id', 'asc')->paginate(10);
        return view('transaction.index', compact('transactions'));
    }

    public function create() {
        $cars = Car::where('status_kendaraan', '0')->get();
        $drivers = Driver::all();
        $users = User::all();
        return view('transaction.create', compact('cars', 'drivers', 'users'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nama_admin_peminjaman' => 'required',
            'id_kendaraan' => 'required',
            'id_driver' => 'required',
            'id_user' => 'required',
            'mulai_peminjaman' => 'required',
            'selesai_peminjaman' => 'required',
            'alasan_peminjaman' => 'required',
            'status_peminjaman' => 'required',
        ]);
        
        Transaction::create($data);
        return redirect()->route('transaction.index')->with('success','Berhasil menambahkan transaction.');
    }

    public function show(Transaction $transaction) {
        return view('transaction.show',compact('transaction'));
    }

    public function edit(Transaction $transaction) {
        $cars = Car::where('status_kendaraan', '0')->get();
        $drivers = Driver::all();
        $users = User::all();
        return view('transaction.edit',compact('transaction', 'cars', 'drivers', 'users'));
    }

    public function update(Request $request, Transaction $transaction) {
        $request->validate([
            'nama_admin_peminjaman' => 'required',
            'id_kendaraan' => 'required',
            'id_driver' => 'required',
            'id_user' => 'required',
            'mulai_peminjaman' => 'required',
            'selesai_peminjaman' => 'required',
            'alasan_peminjaman' => 'required',
            'status_peminjaman' => 'required',
        ]);

        $transaction->update($request->post());
        return redirect()->route('transaction.index')->with('success','Berhasil mengubah data transaction.');
    }

    public function destroy(Transaction $transaction) {
        $transaction->delete();
        return redirect()->route('transaction.index')->with('success','Berhasil menghapus data transaction.');
    }

    public function export() {
        return Excel::download(new TransactionExport, 'transaction.xlsx');
    }
}
