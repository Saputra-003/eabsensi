<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['course_code', 'course'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class);
    }
}
