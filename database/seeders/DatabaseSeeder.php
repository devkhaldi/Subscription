<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Wesite;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Wesite::factory()
            ->count(5)
            ->hasPosts(5)
            ->hasSubscriers(5)
            ->create();
    }
}
