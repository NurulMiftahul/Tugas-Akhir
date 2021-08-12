<?php

use Illuminate\Database\Seeder;
use App\Courier;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => 'jne', 'title' => 'JNE'],
            ['code' => 'pos', 'title' => 'POS'],
            ['code' => 'tiki', 'title' => 'TIKI',]
        ];
        //memanggil class model Courier menggunakan method insert
        Courier::insert($data);
    }
}
