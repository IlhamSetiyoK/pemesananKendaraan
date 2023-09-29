<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'usia',
        'alamat',
        'no_hp',
    ];
    public function transaction() {
        return $this->hasMany(Transaction::class);
    }
}
