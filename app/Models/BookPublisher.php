<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookPublisher extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function publisherDate()
    {
        return $this->hasManyThrough(
            PublisherDate::class,
            Book::class,
            

        );
    }
}


