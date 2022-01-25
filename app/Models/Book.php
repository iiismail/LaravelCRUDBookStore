<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books'; 

    protected $primaryKey = 'id'; 

    protected $fillable = ['title', 'author', 'description', 'publisher', 'published', 'user_id'];

    public function bookPublisher()
    {
        return $this->hasOne(
            BookPublisher::class
        );
    }

    public function publisherDate()
    {
        return $this->hasOne(
            PublisherDate::class
        );
    }

    public function categories()
    {
        return $this->belongsToMany(
            Categories::class, 'book_categories', 'book_id', 'category_id'
            
        );
    }

   
}
