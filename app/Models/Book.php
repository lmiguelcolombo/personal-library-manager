<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'subject',
        'authors',
        'edition',
        'publish_year',
        'publisher',
    ];

    public function collection()
    {
        $collection = $this->belongsToMany(Collection::class, 'user_book_collection', 'book_id', 'collection_id');

        return $collection;
    }

    // public function user()
    // {
    //     $this->belongsTo(User::class);
    // }
}
