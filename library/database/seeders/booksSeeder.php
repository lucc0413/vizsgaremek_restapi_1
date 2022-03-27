<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\SUpport\Facades\DB;

class booksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("library")->insert([
            "bookid" => "random_id",
            "author"=> "author",
            "title"=> "title",
            "quantity"=> "quantity",
        ]);
    }
}
