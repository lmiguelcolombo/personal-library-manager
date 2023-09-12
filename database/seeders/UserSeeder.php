<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = User::factory()->create([
            'name' => 'Cliente Teste',
            'email' => 'client@client.com',
            'password' => bcrypt('321321321'),
        ]);

        User::factory()->count(5)->create();
    }
}
