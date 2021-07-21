<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\CategorySub;
use App\Jobs\SendEmailJob;
use App\Mail\UsersMail;
use App\Mail\WeeklyProduct;
use App\OrderProduct;
use App\Product;
use App\Roboturl;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        

        $categories = Category::all();
        $allSubCategories = CategorySub::all();
        $banners = Banner::orderBy('id', 'desc')->take(8)->get();

        //boosted ads
        $fasbeas = Product::with('categories')->whereHas('categories', function($query){
                    $query->where('slug', 'women-s-fashion')->orWhere('slug', 'men-s-fashion')->orWhere('slug', 'health-and-beauty');   })->where('quantity', '>', 0)->where('featured', 1)->inRandomOrder()->take(6)->get();;

        $comeles = Product::with('categories')->whereHas('categories', function($query){
                    $query->where('slug', 'electronics')->orWhere('slug', 'computer');   })->where('quantity', '>', 0)->where('featured', 1)->inRandomOrder()->take(6)->get();;


        $mobiles = Product::with('categorySubs')->whereHas('categorySubs', function($query){ $query->where('name', '=', 'Mobile Phones');   })->where('quantity', '>', 0)->where('featured', 1)->inRandomOrder()->take(6)->get();;

        $grocerys = Product::with('categories')->whereHas('categories', function($query){
                    $query->where('slug', 'grocery');   })->where('quantity', '>', 0)->where('featured', 1)->inRandomOrder()->take(6)->get();;

        $homebooks = Product::with('categories')->whereHas('categories', function($query){
                    $query->where('slug', 'home-and-office')->orWhere('slug', 'books-and-stationary');   })->where('quantity', '>', 0)->where('featured', 1)->inRandomOrder()->take(6)->get();;



        return view('landing-page')->with([
                'categories' => $categories,
                'allSubCategories' => $allSubCategories,
                'banners' => $banners,
                //for the category
                'fasbeas' => $fasbeas,
                'comeles' => $comeles,
                'mobiles' => $mobiles,
                'grocerys' => $grocerys,
                'homebooks' => $homebooks,
                ]);
    }

         public function test()
            {
                //this command will make all products gotten from jumia inaccessible
                // $products = Roboturl::all();
                // foreach ($products as $product) 
                //     {
                //         $prod = Product::find($product->product_id);
                //         if ($prod) 
                //             {
                //                 $prod->update([
                //                     'featured' => 0,
                //                 ]);
                //             }
                //     }
                // dd('work done successfully!');
                //ends here

                // $slug = SlugService::createSlug(Product::class, 'slug', 'My First Post');
                // dd($slug);

                //this code will make all the products that is 8 months older to disappear
                $Thedate = Carbon::now();
                $Thedate->addMonths(-4)->toArray();
                $expiry = $Thedate->format('Y-m-d').' 00:00:00';
                //dd($expiry);

                $products = Product::where('created_at', '<', $expiry)->update([
                    'quantity' => 0,
                    'featured' => 0,
                ]);
                
                dd('work done successfully');
                
                //$date = Carbon::now();
                //$date->addDays(2)->toArray();
                //dd($date->englishDayOfWeek.' '.$date->day.' '.$date->format('M'));
                
                 DB::table('products')->update(['delivery_info' => 2]);
                 dd('Work completed');


                // $users = User::all();
                // $newUsers = array();
                // foreach ($users as $user) 
                //     {
                //         $newUsers[] = array($user->email);
                //     }
                // $singleUsers = call_user_func_array('array_merge', $newUsers);  
                // //$emails = implode(', ', $singleUsers);  
                // dd($singleUsers); 


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
                // $arraySingle = call_user_func_array('array_merge', $potw); 
                // $productID =  array_slice($arraySingle, 0,6);
                // //dd();  
                // Mail::send(new WeeklyProduct($productID));
                
                // echo "Email sent";
            }

     public function about()
        {

            $categories = Category::all();
            $allSubCategories = CategorySub::all();

            return view('about')->with([
                    'categories' => $categories,
                    'allSubCategories' => $allSubCategories,
                    ]);
        }

     public function contact()
        {
            $categories = Category::all();
            $allSubCategories = CategorySub::all();

            return view('contact')->with([
                    'categories' => $categories,
                    'allSubCategories' => $allSubCategories,
                    ]);
        }

    public function faq()
        {
            $categories = Category::all();
            $allSubCategories = CategorySub::all();

            return view('faq')->with([
                    'categories' => $categories,
                    'allSubCategories' => $allSubCategories,
                    ]);
        } 
        
    public function policy()
        {
            $categories = Category::all();
            $allSubCategories = CategorySub::all();

            return view('privacy-policy')->with([
                    'categories' => $categories,
                    'allSubCategories' => $allSubCategories,
                    ]);
        }
        
    public function tandc()
        {
            $categories = Category::all();
            $allSubCategories = CategorySub::all();

            return view('terms-and-conditions')->with([
                    'categories' => $categories,
                    'allSubCategories' => $allSubCategories,
                    ]);
        }  


    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function generalMail($password)
    {
        if ($password != '$Chisomnzube$') 
            {
                return redirect()->route('landing-page')->with('success_message', 'Unauthorized Access!');
            }
        //Mail::send(new UsersMail());
        //SendEmailJob::dispatch();
        SendEmailJob::dispatch()->delay(now()->addSeconds(5));

        dd('General Email sent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function weekend()
    {
        $categories = Category::all();
        $allSubCategories = CategorySub::all();

        
        $products = Product::where('weekend', 1)->where('featured', 1);
          
        $categoryName = 'Weekend Sales'; 
                   
        if (request()->category && request()->sort == 'low_high') 
            {
                $products = $products->where('quantity', '>', 0)->orderBy('price')->paginate(12);
            }elseif (request()->category && request()->sort == 'high_low') 
                {
                    $products = $products->where('quantity', '>', 0)->orderBy('price', 'desc')->paginate(12);
                }elseif (request()->subCategory && request()->sort == 'low_high') 
                    {
                        $products = $products->where('quantity', '>', 0)->orderBy('price')->paginate(12);
                    }elseif (request()->subCategory && request()->sort == 'high_low') 
                        {
                           $products = $products->where('quantity', '>', 0)->orderBy('price', 'desc')->paginate(12); 
                        }else 
                            {
                                $products = $products->where('quantity', '>', 0)->orderBy('id', 'desc')->paginate(12);
                            }            
             

        return view('weekend')->with([
                'products' => $products,
                'categories' => $categories,
                'categoryName' => $categoryName,
                'allSubCategories' => $allSubCategories,
            ]);
    }

    public function howSeller()
    {
        return view('how-seller');
    }

    public function howAgent()
    {
        return view('how-agent');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
