<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(empty(User::where('email', 'demo@myexpenses.ovh')->first())) {
            $user = User::factory()->create();
            $user->createDefaultCategories();
            $this->call(ProductSeeder::class);
        }
    }
}
