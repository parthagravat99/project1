<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as faker;


class studentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=faker::create();
        for($count=0;$count<100;$count++){
            DB::table('students')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'phone'  => $faker->phoneNumber(),
            ]);
                
    }
}
}