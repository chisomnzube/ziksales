<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryProduct;
use App\CategorySub;
use App\CategorySubProduct;
use App\Product;
use App\Seller;
use App\Brand;
use App\SellerProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class SellersController extends Controller
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
        $seller = optional(Seller::where('email', auth()->user()->email)->first());
        

        $seller_id = optional(Seller::where('email', auth()->user()->email)->first())->id;
        $this->seller = $seller_id;
        $trueSeller = SellerProduct::where('seller_id', $this->seller)->get();
        
        $seller = Seller::find($seller_id);

        if ($trueSeller->count() > 0)
            {
                $products = $seller->oops()->orderBy('id', 'desc')->paginate(10); 
            } else
                {
                    $products = 0;
                }         



        return view('my-portal')->with([
            'categories' => $categories,
            'allSubCategories' => $allSubCategories,
            'products' => $products,
            'trueSeller' => $trueSeller,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
        {
            $seller = optional(Seller::where('email', auth()->user()->email)->first())->id;            

            if ($seller)
                {
                    return redirect()->route('seller.index');
                }
                
            $categories = Category::all();
            $allSubCategories = CategorySub::all();

            return view('seller-register')->with([
                'categories' => $categories,
                'allSubCategories' => $allSubCategories,
            ]);
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registered(Request $request)
        {
            $request->validate([
                'address' => 'required',
                'specialize' => 'required',
            ]);

            $address = str_replace("/", "_", $request->input('address'));
            $specialize = str_replace("/", "_", $request->input('specialize'));

            Seller::create([
                'name' => auth()->user()->name,
                'phone' => auth()->user()->phone,
                'email' => auth()->user()->email,
                'address' => $address,
                'specialize' =>  $specialize,
                'featured' => 1,
            ]); 

            return redirect()->route('seller.index')->with('success_message', 'Registration successfully, You can Now upload Your Products');
        }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $allSubCategories = CategorySub::all();


        return view('sell')->with([
            'categories' => $categories,
            'allSubCategories' => $allSubCategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function branding()
    {
        $checkSeller = Seller::where('email', auth()->user()->email)->get()->count();

        if ($checkSeller < 1) 
            {
                return redirect()->route('seller.register')->with('success_message', 'Please register as a Seller.');
            }

        $categories = Category::all();
        $allSubCategories = CategorySub::all();


        return view('seller-brand')->with([
            'categories' => $categories,
            'allSubCategories' => $allSubCategories,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function brand($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $allSubCategories = CategorySub::all();
        $categoryName = $brand->name; 

        $sellerProducts = SellerProduct::where('seller_id', $brand->seller_id)->get();
        
        if ($sellerProducts->count() < 1) 
        {
            return redirect()->route('landing-page')->with('success_message', 'No product in that store yet');
        }

        foreach ($sellerProducts as $sellerProduct) 
            {
                $product_id[] = array($sellerProduct->product_id);
            }
        $arraySingle = call_user_func_array('array_merge', $product_id); 

        $products = Product::whereIn('id', $arraySingle)->where('featured', 1)->where('quantity', '>', 0)->orderBy('id', 'desc')->paginate(12);

        return view('shop')->with([
                'products' => $products,
                'categories' => $categories,
                'categoryName' => $categoryName,
                'allSubCategories' => $allSubCategories,
            ]);
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function brandingStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $oldslug = str_replace(" ", "_", $request->input('name'));
        $slug = str_replace("/","-",$oldslug);

        $checkSlug = Brand::where('slug', $slug)->get()->count();

        if ($checkSlug > 0) 
            {
                return back()->with('success_message', 'Brand Name already taken');
            }
        $seller = Seller::where('email', auth()->user()->email)->first();
        $categories = Category::all();
        $allSubCategories = CategorySub::all();

        Brand::create([
            'seller_id' => $seller->id,
            'name' => $request->input('name'),
            'slug' => $slug,
        ]);

        return view('seller-brand')->with([
                    'categories' => $categories,
                    'allSubCategories' => $allSubCategories,
                    'success_message' => 'You have successfully customized your brand name',
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function brandingUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $oldslug = str_replace(" ", "_", $request->input('name'));
        $slug = str_replace("/","-",$oldslug);

        $checkSlug = Brand::where('slug', $slug)->get()->count();

        if ($checkSlug > 0) 
            {
                return back()->with('success_message', 'Brand Name already taken');
            }
        $seller = Seller::where('email', auth()->user()->email)->first();
        $categories = Category::all();
        $allSubCategories = CategorySub::all();

        Brand::where('seller_id', $seller->id)->update([            
            'name' => $request->input('name'),
            'slug' => $slug,
        ]);

        return view('seller-brand')->with([
                    'categories' => $categories,
                    'allSubCategories' => $allSubCategories,
                    'success_message' => 'You have successfully Updated your brand name',
                ]);
    }

    function fetch(Request $request)
        {
            $select = $request->get('select');
            $value = $request->get('value');
            $dependent = $request->get('dependent');
            $data = CategorySub::where($select, $value)->orderBy('id')->get();

            $output = '<option value="">select Sub-category</option>';
            foreach ($data as $row) 
                {
                   $output .= '<option value="'.$row->id.'">'.$row->$dependent.'</option>';
                }
            echo $output;    
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'category' => 'required|max:255',
            'subcategory' => 'required|max:255',
            'details' => 'required|max:255',
            'price' => 'required|integer',
            'description' => 'required',
            'quantity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
        

        $oldslug = str_replace(" ", "_", $request->input('name')).'_'.auth()->user()->name.'_'.date('h_m_s');
        $slug = str_replace("/","-",$oldslug);
        $keywords = "buy ".$request->input('name')." online";
        $price = $request->input('price');
        $profit = 0.09 * $price;
        $seller_id = optional(Seller::where('email', auth()->user()->email)->first())->id;
        $this->seller = $seller_id;
        
        if($profit > 2000)
            {
                $profit = 2000;
            }

        if ($price < 2000) 
            {
                $delivery_fee = 0;
            }elseif($price >= 2000 && $price < 10000)
                {
                    $delivery_fee = 100;
                }elseif($price >=10000 && $price < 20000)
                    {
                        $delivery_fee = 200;
                    }elseif($price >=20000 && $price < 30000)
                        {
                            $delivery_fee = 300;
                        }elseif($price >=30000 && $price < 40000)
                            {
                                $delivery_fee = 400;
                            }elseif($price >=40000 && $price < 50000)
                                {
                                    $delivery_fee = 500;
                                }elseif($price >= 50000)
                                    {
                                        $delivery_fee = 500;
                                    }else
                                        {
                                            return back()->with('success_message', 'Invalid Price!');
                                        }
        
        

        if($request->hasFile('image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            //$path = $request->file('image')->storeAs('public/seller', $fileNameToStore); 
            // resizing an uploaded file            
            Image::make(Input::file('image'))->resize(300, 300)->save('storage/seller/' . $fileNameToStore); 

        }else{
            return back()->with('success_message', 'Please insert image!');
        }

        
        if($request->hasFile('images')){
            // Get filename with the extension
            $filenameWithExt2 = $request->file('images')->getClientOriginalName();
            // Get just filename
            $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            // Get just ext
            $extension2 = $request->file('images')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2= $filename2.'_'.time().'.'.$extension2;
            // Upload Image
            //$path2 = $request->file('images')->storeAs('public/seller', $fileNameToStore2);
            // resizing an uploaded file
            Image::make(Input::file('images'))->resize(300, 200)->save('storage/seller/' . $fileNameToStore2);  

            $file2 = '["seller/'.$fileNameToStore2.'"]';           

        } else {
            $file2 = NUll;
        }

        Product::create([
            'name' => $request->input('name'),
            'slug' => $slug,
            'details' => $request->input('details'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'keywords' => $keywords,
            'quantity' => $request->input('quantity'),
            'featured' => 0,
            'delivery_fee' => $delivery_fee,
            'profit' => $profit,
            'image' => 'seller/'.$fileNameToStore,
            'images' => $file2,
        ]);

        $product_id = optional(Product::where('slug', $slug)->first())->id;

        SellerProduct::create([
            'seller_id' => $seller_id,
            'product_id' => $product_id,
        ]);

        CategoryProduct::create([
            'product_id' => $product_id,
            'category_id' => $request->input('category'),
            'categorySub_id' => $request->input('subcategory'),
        ]);

        CategorySubProduct::create([
            'category_sub_id' => $request->input('subcategory'),
            'product_id' => $product_id,
        ]);

        return redirect()->route('seller.index')->with('success_message', 'Your Product Has been Uploaded successfully, Awaiting Approval!');

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $categories = Category::all();
        $allSubCategories = CategorySub::all();
        $product = Product::where('slug', $slug)->firstOrFail();


        $seller_id = optional(Seller::where('email', auth()->user()->email)->first())->id;
        $this->seller = $seller_id;
        $trueSeller = SellerProduct::where('seller_id', $this->seller)->where('product_id', $product->id)->get();

        if ($trueSeller->count() > 0)
            {
                $product = Product::where('slug', $slug)->firstOrFail();
            } else
                {
                     return redirect()->route('seller.index')->with('success_message', 'Unauthorized Access!');
                }

            return view('view-product')->with([
                'categories' => $categories,
                'allSubCategories' => $allSubCategories,
                'product' => $product,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categories = Category::all();
        $allSubCategories = CategorySub::all();
        $product = Product::where('slug', $slug)->firstOrFail();



        $seller_id = optional(Seller::where('email', auth()->user()->email)->first())->id;
        $this->seller = $seller_id;
        $trueSeller = SellerProduct::where('seller_id', $this->seller)->where('product_id', $product->id)->get();

        if ($trueSeller->count() > 0)
            {
                $product = Product::where('slug', $slug)->firstOrFail();
                $productCat = CategoryProduct::where('product_id', $product->id)->firstOrFail();
                $subcategories = CategorySub::where('category_id', $productCat->category_id)->get();
            } else
                {
                     return redirect()->route('seller.index')->with('success_message', 'Unauthorized Access!');
                }

            return view('update-product')->with([
                'categories' => $categories,
                'allSubCategories' => $allSubCategories,
                'product' => $product,
                'productCat' =>$productCat,
                'subcategories' => $subcategories,
            ]);
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
        $seller_id = optional(Seller::where('email', auth()->user()->email)->first())->id;
        $this->seller = $seller_id;
        $trueSeller = SellerProduct::where('seller_id', $this->seller)->where('product_id', $id)->get();

        if ($trueSeller->count() > 0)
            {
                $trueSeller = "yes";
            } else
                {
                     return redirect()->route('seller.index')->with('success_message', 'Unauthorized Access!');
                }

        $this->validate($request, [
            'name' => 'required|max:255',
            'category' => 'required|max:255',
            'subcategory' => 'required|max:255',
            'details' => 'required|max:255',
            'price' => 'required|integer',
            'description' => 'required',
            'quantity' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
        

        $oldslug = str_replace(" ", "_", $request->input('name')).'_'.auth()->user()->name.'_'.date('h_m_s');
        $slug = str_replace("/","-",$oldslug);
        $keywords = "buy ".$request->input('name')." online";
        $price = $request->input('price');
        $profit = 0.09 * $price;

        if ($price < 2000) 
            {
                $delivery_fee = 0;
            }elseif($price >= 2000 && $price < 10000)
                {
                    $delivery_fee = 100;
                }elseif($price >=10000 && $price < 20000)
                    {
                        $delivery_fee = 200;
                    }elseif($price >=20000 && $price < 30000)
                        {
                            $delivery_fee = 300;
                        }elseif($price >=30000 && $price < 40000)
                            {
                                $delivery_fee = 400;
                            }elseif($price >=40000 && $price < 50000)
                                {
                                    $delivery_fee = 500;
                                }elseif($price >= 50000)
                                    {
                                        $delivery_fee = 500;
                                    }else
                                        {
                                            return back()->with('success_message', 'Invalid Price!');
                                        }
        
        

        if($request->hasFile('image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            //$path = $request->file('image')->storeAs('public/seller', $fileNameToStore); 
            // resizing an uploaded file            
            Image::make(Input::file('image'))->resize(300, 300)->save('storage/seller/' . $fileNameToStore); 

            Product::where('id', $id)->update(['image' => 'seller/'.$fileNameToStore]);                 

        }

        
        if($request->hasFile('images')){
            // Get filename with the extension
            $filenameWithExt2 = $request->file('images')->getClientOriginalName();
            // Get just filename
            $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            // Get just ext
            $extension2 = $request->file('images')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2= $filename2.'_'.time().'.'.$extension2;
            // Upload Image
            //$path2 = $request->file('images')->storeAs('public/seller', $fileNameToStore2);
            // resizing an uploaded file
            Image::make(Input::file('images'))->resize(300, 200)->save('storage/seller/' . $fileNameToStore2);  

            $file2 = '["seller/'.$fileNameToStore2.'"]';  

            Product::where('id', $id)->update(['images' => $file2]);         

        }

        Product::where('id', $id)->update([
            'name' => $request->input('name'),
            'slug' => $slug,
            'details' => $request->input('details'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'keywords' => $keywords,
            'quantity' => $request->input('quantity'),
            'delivery_fee' => $delivery_fee,
            'profit' => $profit,
        ]);


        CategoryProduct::where('product_id', $id)->update([
            'category_id' => $request->input('category'),
            'categorySub_id' => $request->input('subcategory'),
        ]);

        CategorySubProduct::where('product_id', $id)->update([
            'category_sub_id' => $request->input('subcategory'),
        ]);

        return redirect()->route('seller.index')->with('success_message', 'Your Product Has been Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $seller = Seller::where('email', auth()->user()->email)->first();
        $check = SellerProduct::where('product_id', $id)->where('seller_id', $seller->id)->get();

        if ($check->count() > 0) 
            {
               Storage::delete('public/'.$product->image);
               if ($product->images != NUll) 
                   {
                      $one = str_replace('"', '', $product->images);
                      $two = str_replace('[', '', $one);
                      $three = str_replace(']', '', $two);
                      Storage::delete('public/'.$three);
                   }
               $product->delete();
               return back()->with('success_message', 'Product has been deleted successfully');
            }else
                {
                    return back()->with('success_message', 'Unauthorized access!');
                }
    }
}
