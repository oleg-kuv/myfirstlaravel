<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
            ['name' => 'new'],
            ['name' => 'in_work'],
            ['name' => 'completed'],
            ['name' => 'canceled'],
            ['name' => 'postponed']
         ];
      //Model::insert($data);
       \DB::table('statuses')->insert($data);
    }
}
