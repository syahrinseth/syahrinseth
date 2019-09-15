<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datetime = Carbon\Carbon::now();
        DB::table('users')->insert([
            'name' => "Syahrin Seth",
            'email' => "syah@syahrinseth.com",
            'user_type' => "admin",
            'is_admin' => 1,
            'password' => bcrypt("Syahrin221166")
        ]);
    }
}
