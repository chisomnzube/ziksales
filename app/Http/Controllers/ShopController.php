<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryProduct;
use App\CategorySub;
use App\CategorySubProduct;
use App\Product;
use App\Review;
use Illuminate\Http\Request;

class ShopController extends Controller
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

        if (request()->category) 
            {               

                $products = Product::with('categories')->whereHas('categories', function($query){
                    $query->where('slug', request()->category)->where('featured', 1);                     
                });
                
                $categoryName = optional($categories->where('slug', request()->category)->first())->name;
            }elseif(request()->subCategory)
                {
                    $products = Product::with('categorySubs')->whereHas('categorySubs', function($query){
                        $query->where('name', request()->subCategory)->where('featured', 1);                     
                    });
                    
                    $categoryName = optional($allSubCategories->where('name', request()->subCategory)->first())->name;
                }else
                    {
                        $products = Product::where('featured', 1)->take(4);
                          
                        $categoryName = 'Featured'; 
                    }
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
             

        return view('shop')->with([
                'products' => $products,
                'categories' => $categories,
                'categoryName' => $categoryName,
                'allSubCategories' => $allSubCategories,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        if (empty($request->refId) && empty(session()->get('refId')))
            {
                session()->put('refId', 'NoRef');
            }else
                {
                    session()->put('refId', $request->refId);
                }

        $categories = Category::all();
        $allSubCategories = CategorySub::all();
        $product = Product::where('slug', $slug)->where('featured', 1)->firstOrFail();
        $similarProducts = Product::where('slug', '!=', $slug)->where('featured', 1)->inRandomOrder()->take(3)->get();

        //this is to get other related items
        $product_id = optional(Product::where('slug', $slug)->first())->id;

        $ixx = optional(CategorySubProduct::where('product_id', $product_id)->first())->category_sub_id;

        $this->name = optional($allSubCategories->where('id', $ixx)->first())->name;

        //$this->name = 'Hp Laptops';

        $relaProducts = Product::with('categorySubs')->whereHas('categorySubs', function($query){ $query->where('name', '=', $this->name);        
                    });
         $relaProducts = $relaProducts->where('quantity', '>', 0)->where('featured', 1)->inRandomOrder()->take(6)->get();
        
        $stockLevel = getStockLevel($product->quantity);  

        $this->product_id = $product_id;
        $reviews = Review::where([
            'product_id'=> $this->product_id,
            // 'featured' => 1,
        ])->orderBy('id', 'desc')->take(4)->get();          

        return view('detail')->with([
                'categories' => $categories,
                'product' => $product,
                'stockLevel' => $stockLevel,
                'similarProducts' => $similarProducts,
                'allSubCategories' => $allSubCategories,
                'relaProducts' => $relaProducts,
                'subName' => $this->name,
                'reviews' => $reviews,
                ]);
    }

    public function search(Request $request)
        {
            $request->validate([
                'item' => 'required|min:3',
            ]);


            $categories = Category::all();
            $allSubCategories = CategorySub::all();
            $item = utf8_encode($request->input('item'));

            $products = Product::search($item, null, true);                     

            if (request()->sort == 'low_high') 
            {
                $products = $products->where('quantity', '>', 0)->where('featured', 1)->orderBy('price')->paginate(12);
            }elseif(request()->sort == 'high_low')
                {
                    $products = $products->where('quantity', '>', 0)->where('featured', 1)->orderBy('price', 'desc')->paginate(12);
                }else
                    {
                        $products = $products->where('quantity', '>', 0)->where('featured', 1)->paginate(12);
                    }

            return view('search-results')->with([
                    'categories' => $categories,
                    'products' => $products,
                    'allSubCategories' => $allSubCategories,
                ]);
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
