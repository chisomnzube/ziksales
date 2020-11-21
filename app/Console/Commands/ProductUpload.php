<?php

namespace App\Console\Commands;

use App\CategoryProduct;
use App\CategorySubProduct;
use App\Product;
use App\Robotproduct;
use App\Roboturl;
use App\SellerProduct;
use Illuminate\Console\Command;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;

class ProductUpload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:upload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command will upload products from jumia';

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
        $robots = Robotproduct::all()->sortByDesc('id');

        foreach ($robots as $robot) 
        {            
        
        // here is the code for simple html dom
        //include('simple_html_dom.php');

        //category url
        $category_url = $robot->link;
        $category_html = file_get_html($category_url);

        // find all link
        //foreach(array_slice($category_html->find('a[href$=".html"]'),0,10) as $e)
        foreach($category_html->find('a[href$=".html"]') as $e) 
            {
                //the link of each product
                $product_url = 'https://www.jumia.com.ng'.$e->href;

                $product_html = file_get_html($product_url);

                //to get the name
                $product_name =  $product_html->find('h1')[0];
                $name = strip_tags($product_name);

                //to get the prices
                $product_price = $product_html->find('span[data-price]');
                $get_price = $product_price[0];
                $hey = preg_replace('/[^0-9]/', '', $get_price);
                $thePrice = substr($hey, 2,100);

                //to get the profit
                $profit = 0.1 * $thePrice;
                $economic = 0.03 * $thePrice;
                $price = $thePrice - $profit - $economic;

                //to get the delivery fee
                if ($thePrice < 2000) 
                {
                    $delivery_fee = 0;
                }elseif($thePrice >= 2000 && $thePrice < 10000)
                    {
                        $delivery_fee = 100;
                    }elseif($thePrice >=10000 && $thePrice < 20000)
                        {
                            $delivery_fee = 200;
                        }elseif($thePrice >=20000 && $thePrice < 30000)
                            {
                                $delivery_fee = 300;
                            }elseif($thePrice >=30000 && $thePrice < 40000)
                                {
                                    $delivery_fee = 400;
                                }elseif($thePrice >=40000 && $thePrice < 50000)
                                    {
                                        $delivery_fee = 500;
                                    }else
                                        {
                                            $delivery_fee = 500;
                                        }

                //to get the description/bpdy
                $product_body = $product_html->find('div.markup');
                $body = strip_tags($product_body[1]); //this can be empty 

                //to get the image url
                foreach($product_html->find('a[data-selected=1]') as $product_image)
                $image = $product_image->href;

                //the slug
                $oldslug = str_replace(" ", "_", $name);
                $slug = str_replace("/","-",$oldslug);

                //the keyword
                $keywords = "buy ".$name." online";

                //to get the details
                //foreach(array_slice($product_html->find('li[style*=box-sizing]'),0,10) as $product_detail)
                //$product_detail;
                $predetails = implode(array_slice($product_html->find('li[style*=box-sizing]'),0,10)); //this can be empty
                $details = str_limit(strip_tags($predetails), 250);
                            

                 $check = Roboturl::where('theUrl', $product_url)->get();

                 if ($check->count() == 0)                  
                        {
                            //to upload the image
                            //$image_url= $image;
                            $url = $image;
                            $contents = file_get_contents($url);
                            //$name = substr($url, strrpos($url, '/') + 1);
                            $imageName = 'image'.time().'.jpg';
                            Storage::put('public/robot/'.$imageName, $contents);

                             $productData = Product::create([
                                'name' => $name,
                                'quantity' => 10,
                                'delivery_fee' => $delivery_fee,
                                'profit' => $profit,
                                'keywords' => $keywords,
                                'slug' => $slug,
                                'price' => $price,
                                'details' => $details,
                                'description' => $body,
                                'featured' => 1,
                                'image' => 'robot/'.$imageName,
                             ]);

                             //insert the url
                             Roboturl::create([
                                'product_id' => $productData->id,
                                'theUrl' => $product_url,
                             ]);

                             //insert the category id
                             CategoryProduct::create([
                                'product_id' => $productData->id,
                                'category_id' => $robot->category_id,
                                'categorySub_id' => $robot->subcategory_id,
                            ]);

                            CategorySubProduct::create([
                                'category_sub_id' => $robot->subcategory_id,
                                'product_id' => $productData->id,
                            ]);
                            
                            SellerProduct::create([
                                'seller_id' => 13,
                                'product_id' => $productData->id,
                            ]);


                        }

                

               
            }
        }

        echo 'Job Completed';
    }
}
