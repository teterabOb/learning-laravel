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
        //$products = factory(Product::class, 50)->create();

        $users = factory(User::class, 20)
                    ->create()
                    ->each(function($user){
                        $image = factory(Image::class)
                            ->user()
                            ->make();

                        $user->image()->save($image);
                    });;
                    

        $orders = factory(Order::class, 10)
                    ->make() 
                    ->each(function($order) use ($users){        
                        $order->customer_id = $users->random()->id;
                        $order->save();

                        $payment = factory(Payment::class)->make();
                        $order->payment()->save($payment);
                    });

        $products = factory(Product::class, 50)->create();
        
          
    }
}
