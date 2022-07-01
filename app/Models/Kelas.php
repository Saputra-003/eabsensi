<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'kelas', 'jenis_kelas'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
