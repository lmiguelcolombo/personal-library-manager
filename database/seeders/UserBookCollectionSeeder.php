<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Collection;
use App\Models\User;
use App\Models\UserBookCollection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserBookCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $collections = Collection::all()->where('user_id', '=', $user->id);
            foreach ($collections as $collection) {
                $books = Book::all()->where('collection_id', '=', $collection->id);
                foreach ($books as $book) {
                    UserBookCollection::create([
                        'user_id' => $user->id,
                        'book_id' => $book->id,
                        'collection_id' => $collection->id,
                    ]);
                }
            }
        }
    }
}
