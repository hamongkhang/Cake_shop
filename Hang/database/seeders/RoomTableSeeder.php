<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            ['nameroom' => 'Ha Noi',
              'image'=>'e.jpg',
              'typeroom' => '2',
              'price' => '2850000',
              'description' => 'còn phòng',
              'created_at' => '2021-6-7 3-25-24',
              'updated_at' => '2021-6-6 8-25-24',
        ],
    ]);
    }
}
