<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chapter extends Model
{
    protected $fillable = ['title', 'content', 'book_id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
