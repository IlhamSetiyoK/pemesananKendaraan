<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_admin_peminjaman',
        'id_kendaraan',
        'id_driver',
        'id_user',
        'mulai_peminjaman',
        'selesai_peminjaman',
        'alasan_peminjaman',
        'status_peminjaman',
    ];

    public function car() {
        return $this->belongsTo(Car::class, 'id_kendaraan', 'id');
    }

    public function driver() {
        return $this->belongsTo(Driver::class, 'id_driver', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
