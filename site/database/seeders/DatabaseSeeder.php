<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(3)->create();
         \App\Models\Package::factory(4)->create();
         $this->call(CompanyPacketSeeder::class);
    }
}
