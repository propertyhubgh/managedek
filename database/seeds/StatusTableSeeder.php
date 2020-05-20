<?php

use App\Status;
use App\User;
use App\Task;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StatusTableSeeder extends Seeder
{
    protected $truncate = ['users','statuses','tasks'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $user = new User;
        $task = new Task;
//        foreach($this->truncate as $table){
//            DB::table($table)->truncate();
//        }

        Status::create([
           'type' => 'pending'
        ]);
        Status::create([
            'type' => 'halfway'
        ]);
        Status::create([
            'type' => 'completed'
        ]);
        foreach (range(1,4) as $i) {
            User::create([
                'id' => $i,
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'avatar' => $faker->imageUrl($width=200, $height=200, 'cats'),
                'password' => Hash::make('password')
            ]);

        }
        foreach (range(1,10) as $i) {
            Task::create([
                'id' => $i,
                'title' => $faker->word(rand(3,10)),
                'description' => $faker->paragraph(rand(2,7),true),
                //'date_assigned' => $faker->date($format = 'Y-m-d', now()), // '1979-06-09'
                'start_time' => $faker->time($format = 'H:i:s', $max = 'now'),
                'end_time'=> $faker->time($format = 'H:i:s', $max = 'now'),
                'created_at' => date('Y-m-d H:i:s',strtotime('now')),
                'status_id' => mt_rand(1,3)
            ]);
//            $task->users()->attach(mt_rand(1,4));
//            $user->tasks()->attach($i);

        }
    }
}
