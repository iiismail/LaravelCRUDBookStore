<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{ //represents single category
    use HasFactory;

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
