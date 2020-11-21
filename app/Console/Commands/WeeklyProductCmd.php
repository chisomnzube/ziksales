<?php

namespace App\Console\Commands;

use App\Mail\WeeklyProduct;
use App\OrderProduct;
use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class WeeklyProductCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weekly:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command send weekly Products to registered users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //to get all the ordered product
        // $orders = OrderProduct::all()->sortByDesc('id')->unique('product_id');
        // $potw = array();

        // //to check their availability
        // foreach ($orders as $order) 
        //     {
        //         //echo 'the last product is: '.$order->product_id.'<br>';
        //         $product = Product::find($order->product_id);
        //         if ($product->quantity > 0) 
        //             {
        //                 $potw[] = array($product->id);
        //             }
        //     }
        //$productID =  array_slice($arraySingle, 0,6);

        $products = Product::where('featured', 1)->where('quantity', '>', 0)->inRandomOrder()->limit(6)->get();
        $potw = array();
        foreach ($products as $product) 
            {
                $potw[] = array($product->id);
            }
        $arraySingle = call_user_func_array('array_merge', $potw); 
        $productID =  $arraySingle;
        //dd();  
        Mail::send(new WeeklyProduct($productID));
        
        echo "Email sent";
    }
}
