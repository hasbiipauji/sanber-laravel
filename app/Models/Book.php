<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'summary',
        'image',
        'stock',
        'category_id',
        'updated_at'
    ];

    // ini untuk relasi ke tabel kategori
    public function categories()
    {
        // Category disini adalah model
        return $this->belongsTo(Category::class, 'category_id');
    }
}
