<?php

use Faker\Factory;
use App\{Account,Payment};
use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $payment = new Payment;
        $account = new Account;

        $payment->truncate();
        $account->truncate();
    }
}
