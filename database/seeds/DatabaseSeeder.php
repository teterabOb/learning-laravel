<?php

use App\Image;
use App\Product;
use App\Order;
use App\User;
use App\Payment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $count = 50;
        $products = factory(Product::class, $count)->create();

        $users = factory(User::class, 20)
                    ->create();
                    

        $orders = factory(Order::class, 10)
                    ->make() 
                    ->each(function($order) use ($users){        
                        $order->customer_id = $users->random()->id;
                        $order->save();

                        $payment = factory(Payment::class)->make();
                        $order->payment()->save($payment);
                    });


        /*$users = factory(User::class, $count)
                    ->create()
                    ->each(function($user ){
                        $image = factory(Image::class)
                            ->user()
                            ->make();

                        $user->image()->save($image);
                    });
        */
          
    }
}
