<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stationarys')->insert([
            [
                'name' => 'Book',

            ],
            [
                'name' => 'Pencil',

            ],
            [
                'name' => 'Ruler',

            ],
            [
                'name' => 'Dictionary',

            ],
        ]);
    }

}

