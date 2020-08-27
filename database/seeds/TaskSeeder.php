<?php

use App\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::insert([
            [
            'user_id'=>1,
            'task'=>'Woke up at 6am',
            ],
            [
                'user_id'=>1,
                'task'=>'Take Breakfast at 7am',
            ],
            [
                'user_id'=>1,
                'task'=>'Meet With Mr.Client at 10am',
            ]
        ]);
    }
}
