<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Task_CategorySeeder extends Seeder
{

    public function run()
{
    DB::table('task_categories')->insert([
        'name' => $this->command->option('textbox'),
    ]);
}






    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     DB::table('task_categories')->insert([
    //         'id' => 2,
    //         'name' => ,

    //     ]);
    // }
}