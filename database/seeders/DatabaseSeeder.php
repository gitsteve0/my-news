<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $this->call([
            AdminSeeder::class,
        ]);

        News::factory()->count(12)->create();
        User::factory()->count(3)->create();
    }
}
