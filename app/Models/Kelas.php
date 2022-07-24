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
        return $this->belongsToMany(Mahasiswa::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function course()
    {
        return $this->belongsToMany(Course::class);
    }
}
