<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->delete();

        $videos = [['videoName'=>'1first'],
            ['videoName'=>'2second'],
            ['videoName'=>'3third'],
            ['videoName'=>'4fourth'],
            ['videoName'=>'5fifth']];

        DB::table('videos')->insert($videos);
    }
}
