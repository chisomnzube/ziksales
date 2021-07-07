<?php

namespace App\Console\Commands;

//use Storage;
use App\CategoryProduct;
use App\CategorySubProduct;
use App\Product;
use App\Robotproduct;
use App\Roboturl;
use Illuminate\Console\Command;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProductUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will update all the products gotten from Jumia';

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
        //to grab the products
        $products = Roboturl::where('updated', 0)->get();
        // here is the code for simple html dom
        // include('../simple_html_dom.php');
        include __DIR__ . '/../simple_html_dom.php';

        foreach ($products as $product) 
            {               

                //product url
                $product_url = $product->theUrl;
                $product_html = file_get_html($product_url);
                
                //to get the prices
                $product_price = $product_html->find('span[data-price]');
                
                //this will check it the product is still available on the website
                try {
                        
                        $get_price = $product_price[0];
                        $hey = preg_replace('/[^0-9]/', '', $get_price);
                        $thePrice = substr($hey, 2,100);

                        //to get the profit
                        $profit = 0.1 * $thePrice;
                        $price = $thePrice - $profit;

                        //to check if there is a change in price
                        $check = Product::find($product->product_id);
                        if ($price != $check->price) 
                            {                                
                                Product::where('id', $product->product_id)->update([
                                    'price' => $price,
                                    'profit' => $profit
                                ]);
                            }

                     $product->increment('updated');   

                    } catch (\Exception $e) {
                        //dd("NOT Available");
                        $id = $product->product_id;

                        //delete from Robot url
                        Roboturl::where('product_id', $id)->delete();

                        //delete from category and sub category
                        CategoryProduct::where('product_id', $id)->delete();
                        CategorySubProduct::where('product_id', $id)->delete();

                        // delete from main product
                        
                        $mainproduct = Product::find($id);
                        $mainproduct->update([
                            'featured' => 0,
                            'quantity' => 0,
                        ]);
                        // dd($mainproduct);
                        // Storage::delete('public/'.$mainproduct->image);
                        // $mainproduct->delete();

                    }              


            }
        echo 'product Updated Successfully!';   
    }
}
