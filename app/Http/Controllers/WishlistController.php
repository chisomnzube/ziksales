<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategorySub;
use App\Product;
use App\Seller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishlistController extends Controller
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

        return view('account-wishlist')->with([
            'user' => auth()->user(),
            'categories' => $categories,
            'allSubCategories' => $allSubCategories,
            'seller' => $seller,
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
        Cart::instance('wishlist')->remove($id);

        return back()->with('success_message', 'Item has been removed from your wishlist!');
    }

    /**
     * Switch item from wishlist to Cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToCart($id)
    {
        $item = Cart::instance('wishlist')->get($id);

        Cart::instance('wishlist')->remove($id);

        $duplicates = Cart::instance('default')->search(function($cartItem, $rowId) use($id){
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) 
            {
                return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
            }

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)
                ->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', 'Item has been moved to your Cart!');
    }
}
