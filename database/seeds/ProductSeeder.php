<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'Name' => 'Angel',
                'Stock' => '4',
                'Price'=> '15000',
                'Description' => 'Angell',
                'Image' => 'img/Book.jpg',
            ],

            [
                'Name' => 'Ruler',
                'Stock' => '5',
                'Price' => '20000',
                'Description' => 'Ruler Angel',
                'Image' => 'img/Ruler.jpg'
            ],
            [
                'Name' => 'Angel',
                'Stock' => '4',
                'Price'=> '15000',
                'Description' => 'Angell',
                'Image' => 'img/Book.jpg',
            ],
            [
                'Name' => 'Angel',
                'Stock' => '4',
                'Price'=> '15000',
                'Description' => 'Angell',
                'Image' => 'img/Book.jpg',
            ],
            [
                'Name' => 'Angel',
                'Stock' => '4',
                'Price'=> '15000',
                'Description' => 'Angell',
                'Image' => 'img/Book.jpg',
            ],
            [
                'Name' => 'Angel',
                'Stock' => '4',
                'Price'=> '15000',
                'Description' => 'Angell',
                'Image' => 'img/Book.jpg',
            ],
            [
                'Name' => 'Angel',
                'Stock' => '4',
                'Price'=> '15000',
                'Description' => 'Angell',
                'Image' => 'img/Book.jpg',
            ],

        ]);
    }
}
