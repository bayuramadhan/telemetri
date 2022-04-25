<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i=0; $i < 100; $i++) {
            DB::table('posts')->insert([
                'inverter_current' => random_int(10, 50),
                'inverter_voltage' => random_int(10, 50),
                'solar_current' => random_int(10, 50),
                'solar_voltage' => random_int(10, 50),
                'solar_intensity' => random_int(10, 50),
                'battery_current' => random_int(10, 50),
                'battery_voltage' => random_int(10, 50),
                'inverter_power' => random_int(10, 50),
                'solar_power' => random_int(10, 50),
                'battery_power' => random_int(10, 50),
                'battery_percentage' => random_int(10, 50)
            ]);

            // php artisan db:seed --class=UsersTableSeeder

        // }
    }
}
