<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    public function books()
    {
        $books = $this->belongsToMany(Book::class, 'user_book_collection', 'collection_id', 'book_id');

        return $books;
    }

    public function user()
    {
        $this->belongsTo(User::class, 'user_id', 'collection_id');
    }
}
