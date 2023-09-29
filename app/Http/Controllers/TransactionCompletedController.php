<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionCompletedController extends Controller
{
    public function index() {
        $transactions = Transaction::where('status_peminjaman', '1')->orderBy('id', 'asc')->paginate(10);
        return view('completedtransaction.index', compact('transactions'));
    }

    public function update(Request $request, $transactionId) {
        $newStatus = $request->input('status_peminjaman');
        Transaction::where('id', $transactionId)->update(['status_peminjaman' => $newStatus]);

        return redirect()->route('transaction-completed.index')->with('success','Berhasil menyelesaikan peminjaman.');
    }
}
