<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategorySub;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recentlyViews = Product::where('quantity', '>', 0)->inRandomOrder()->take(4)->get();
        $categories = Category::all();
        $allSubCategories = CategorySub::all();

        return view('cart')->with([
                'recentlyViews' => $recentlyViews,
                'categories' => $categories,
                'newTotal' => $this->getNumbers()->get('newTotal'),
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
        $duplicates = Cart::search(function($cartItem, $rowId) use($request){
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) 
            {
                return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
            }

        Cart::add($request->id, $request->name, 1, $request->price)
                ->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart!');        
    }

    private function getNumbers()
        {
            $discount = session()->get('coupon')['discount'] ?? 0;
            $newSubtotal = (Cart::subtotal() - $discount);
            $newTotal = $newSubtotal;

            session()->put('newTotal', $newTotal);

            return collect([
                'discount' => $discount,
                'newSubtotal' => $newSubtotal,
                'newTotal' => $newTotal,
            ]);
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
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) 
            {
                session()->flash('errors', collect(['Quantity must be between 1 and 5.']));
                return response()->json(['success' => false], 400);
            }

        if ($request->quantity > $request->productQuantity) 
            {
               session()->flash('errors', collect(['We currently do not have enough item in stock.']));
                return response()->json(['success' => false], 400);
            }    

        Cart::update($id, $request->quantity);

        session()->flash('success_message', 'Quantity was updated successfully');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Item has been removed from cart!');
    }


    /**
     * Switch item from cart to wishlist.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function wishlist($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('wishlist')->search(function($cartItem, $rowId) use($id){
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) 
            {
                return redirect()->route('cart.index')->with('success_message', 'Item is already in your wishlist!');
            }

        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price)
                ->associate('App\Product');

        return redirect()->route('wishlist.index')->with('success_message', 'Item has been added to wishlist!');
    }
}
