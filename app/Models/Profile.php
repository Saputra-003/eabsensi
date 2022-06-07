<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    // ];

    protected $fillable = ['user_id', 'address', 'avatar', 'date_of_birth', 'gender', 'phone_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPhoto()
    {
        if (!$this->avatar) {
            return asset('global_assets/images/placeholders/user.png');
        }

        return asset('profile_images/' . $this->avatar);
    }
}
