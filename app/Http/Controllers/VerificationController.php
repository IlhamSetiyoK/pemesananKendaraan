<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class VerificationController extends Controller
{
    public function index() {
        $transactions = Transaction::where('status_peminjaman', '0')->orderBy('id', 'asc')->paginate(10);
        return view('verification.index', compact('transactions'));
    }

    public function update(Request $request, $transactionId) {
        $newStatus = $request->input('status_peminjaman');
        Transaction::where('id', $transactionId)->update(['status_peminjaman' => $newStatus]);

        return redirect()->route('verification.index')->with('success','Berhasil approve permintaan.');
    }
}
