<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        DB::table("profiles")->insert([
            ["name" => "user"]
        ]);
    }
}
