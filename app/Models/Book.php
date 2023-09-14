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
        'collection_id',
    ];

    public function collection()
    {
        $collection = $this->belongsTo(Collection::class, 'collection_id', 'book_id');

        return $collection;
    }
}
