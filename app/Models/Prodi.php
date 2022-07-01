<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'prodi',
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
        // note: we can also inlcude Mobile model like: 'App\Mobile'
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
