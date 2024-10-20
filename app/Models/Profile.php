<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'bio',
        'age',
        'user_id'
    ];

    // relasi dengan tabel users field id
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
