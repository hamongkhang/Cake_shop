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
        Model::unguard();
        
        $this->call(RoomTableSeeder::class);
        Model::reguard();
        // \App\Models\User::factory(10)->create();
        //\App\Models\Book::factory(5)->create();
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(ProductsTableSeeder::class);
        // $this->call(NewsTableSeeder::class);
     
    }
}
