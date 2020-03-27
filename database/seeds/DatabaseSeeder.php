<?php

use Illuminate\Database\Seeder;
use App\Customer;
use App\Order;
use App\OrderLine;
use App\Product;
use App\User;
use App\Indian;

use League\Csv\Reader;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);

        $customers = factory(Customer::class, 1000)->create();
        $products = factory(Product::class, 100)->create();
        $users = factory(User::class, 100)->create();

        $users->each(function ($user) {
            $orders = factory(Order::class, random_int(2, 50))->make();
            $orders->each(function ($order) {
                $order->customer_id = random_int(1, 1000);
            });
            $user->orders()->saveMany($orders);
        });

        Order::all()->each(function ($order) {
            $orderLines = factory(OrderLine::class, random_int(1, 10))->make();
            $orderLines->each(function ($orderLine) {
                $orderLine->product_id = random_int(1, 100);
            });
            $order->orderLines()->saveMany($orderLines);
        });

        /* $reader = Reader::createFromPath('/Users/jkim/Development/test1/database/seeds/csv/unique_codes.csv', 'r');
        $reader->setHeaderOffset(0);    // column header
        $records = $reader->getRecords();
        foreach ($records as $offset => $record) {
            $indian = new Indian;
            $indian->fill($record)->save();
        } */
    }
}
