<?php

use Illuminate\Database\Seeder;

class MessageStateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('messagestates')->insert([
            'name' => "Read",
        ]);
          DB::table('messagestates')->insert([
            'name' => "UnRead",
        ]);
    }
}
