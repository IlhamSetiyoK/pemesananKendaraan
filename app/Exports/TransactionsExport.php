<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaction::join('users', 'transactions.id_user', '=', 'users.id')
                            ->join('cars', 'transactions.id_kendaraan', '=', 'cars.id')
                            ->join('drivers', 'transactions.id_driver', '=', 'drivers.id')
                            ->select([ 'transactions.id as id', 
                                    'transactions.nama_admin_peminjaman as nama_admin_peminjaman', 
                                    'transactions.mulai_peminjaman as mulai_peminjaman', 
                                    'transactions.selesai_peminjaman as selesai_peminjaman', 
                                    'transactions.alasan_peminjaman as alasan_peminjaman', 
                                    'transactions.status_peminjaman as status_peminjaman',
                                    'cars.jenis_kendaraan as jenis_kendaraan',
                                    'cars.identitas_kendaraan as identitas_kendaraan',
                                    'drivers.nama as nama_driver',
                                    'users.name as nama_user',
                                    DB::raw('CASE 
                                    WHEN transactions.status_peminjaman = 0 THEN "Waiting"
                                    WHEN transactions.status_peminjaman = 1 THEN "Process"
                                    WHEN transactions.status_peminjaman = 2 THEN "Finish"
                                    ELSE "Unknown" END AS status_peminjaman')
                            ])->get();
    }

    public function headings(): array
    {
        return ["ID", "Admin Peminjaman", "Mulai", "Selesai", "Alasan", "Status", "Jenis Kendaraan", "Identitas Kendaraan", "Driver", "Verifikator"];
    }
}
