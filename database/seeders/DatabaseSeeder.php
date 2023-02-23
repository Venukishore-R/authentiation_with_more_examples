<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use admins;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            
        DB::table('admins')->insert([
            'name' => 'Admin',
            'phone' => '8428960240',
            'email' => 'admin@admin.in',
            'password' => bcrypt('123456'),
        ]);
    }
}
