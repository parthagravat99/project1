<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as faker;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=faker::create();
        for($count=0;$count<100;$count++){
        DB::table('users')->insert([
            'name' => $faker->firstname(),
            'email' => $faker->email(),
            'password' => $faker->password(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
    }
}
