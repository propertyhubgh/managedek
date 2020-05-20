<?php

use App\Customer;
use App\Order;
use App\OrderStatus;
use App\OrderType;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        private $truncate = ['customers','order_statuses','order_types'];
    /**
     * Run the database seeds.
     *
     * @return void
     */

        $faker = Factory::create();
        $customer = new Customer();
        $order_type = new OrderType();
        $order_status = new OrderStatus();

        $customer->truncate();
        $order_status->truncate();
        $order_type->truncate();
//        foreach($this->truncate as $table){
//            DB::table($table)->truncate();
//        }

        OrderStatus::create([
           'status' => 'pending'
        ]);
        OrderStatus::create([
            'status' => 'halfway'
        ]);
        OrderStatus::create([
            'status' => 'completed'
        ]);

        foreach(range(1,5) as $i)
        {
            OrderType::create([
                'type' => $faker->word
            ]);
        }
        foreach (range(1,20) as $i) {
            Customer::create([
                'id' => $i,
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'telephone' => $faker->phoneNumber,
                'location' => $faker->address
            ]);

        }
        foreach (range(1,10) as $i) {
            Order::create([
                'id' => $i,
                'order_name' => 'DO-'.mt_rand(1000,5000),
                'quantity' => mt_rand(2,50),
                'description' => $faker->paragraph(), // '1979-06-09'
                'order_date' => $faker->time($format = 'Y-m-d', $max = 'now'),
                'customer_id'=> mt_rand(1,20),
                'order_status_id' => mt_rand(1,3),
                'order_type_id' => mt_rand(1,5)
            ]);
//            $task->users()->attach(mt_rand(1,4));
//            $user->tasks()->attach($i);

        }
    }

}
