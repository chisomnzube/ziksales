<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategorySub;
use Illuminate\Http\Request;
use App\Seller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $categories = Category::all();
        $allSubCategories = CategorySub::all();
        $seller = optional(Seller::where('email', auth()->user()->email)->first());

        return view('account-profile')->with([
            'user' => auth()->user(),
            'categories' => $categories,
            'allSubCategories' => $allSubCategories,
            'seller' => $seller,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $allSubCategories = CategorySub::all();

         $request->validate([
            'name' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'phone' => 'required|string|min:11|max:14',
            'address' => 'required',
            'password' => 'sometimes|nullable|string|min:6|confirmed',
        ]);

         $user = auth()->user();
         $input = $request->except('password', 'password_confirmation');

         if (! $request->filled('password')) 
             {
                $user->fill($input)->save();

                return back()->with('success_message', 'Profile Updated Successfuly!');
             }

        $user->password = bcrypt($request->password);
        $user->fill($input)->save();      

        return back()->with([
            'success_message' => 'Profile (and Password) Updated Successfuly!',
            'allSubCategories' => $allSubCategories,
        ]);
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
