<?php

namespace Database\Seeders;

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

            $booksId = rand(1, 10);
            $collectionsId = rand(1, 5);

            UserBookCollection::create([
                'user_id' => $user->id,
                'book_id' => $booksId,
                'library_id' => $collectionsId,
            ]);

            $booksId = rand(1, 10);
            $collectionsId = rand(1, 5);

            UserBookCollection::create([
                'user_id' => $user->id,
                'book_id' => $booksId,
                'library_id' => $collectionsId,
            ]);
        }
    }
}
