<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $table = 'borrows';
    
    protected $fillable = [
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'user_id',
        'book_id'
    ];

    //ambil dari model user dan field user id
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //ambil dari model book dan dan field book id
    public function books(){
        return $this->belongsTo(Book::class, 'book_id');
    }

}
