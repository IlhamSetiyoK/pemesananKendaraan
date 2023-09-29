<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_kendaraan',
        'identitas_kendaraan',
        'status_kendaraan',
        'jadwal_service_kendaraan',
        'sisa_bbm_kendaraan',
    ];
    
    public function transaction() {
        return $this->hasMany(Transaction::class);
    }
}
