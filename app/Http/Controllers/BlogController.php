<?php

namespace App\Http\Controllers;

use App\Blogcomment;
use App\Category;
use App\CategorySub;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class BlogController extends Controller
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
        $posts = Post::orderBy('id', 'desc')->paginate(6);

        $populars = Post::where('featured', '1')->orderBy('id', 'desc')->take(3)->get();

        return view('blog-list')->with([
                'categories' => $categories,
                'allSubCategories' => $allSubCategories,
                'posts' => $posts,
                'populars' => $populars,
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
        $request->validate([
            'body' => 'required',
            'post_id' => 'required|integer',
        ]);

        Blogcomment::create([
            'user_id' => auth()->user()->id,  
            'post_id' => $request->input('post_id'),  
            'name' => auth()->user()->name.' '.auth()->user()->lname,  
            'body' => $request->input('body'),    
        ]);

        return back()->with([
            'success_message' => 'Your Comment have been submitted successfully!',
        ]);
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
        
        $post = Post::where('slug', $slug)->firstOrFail();

        $this->post_id = Post::where('slug', $slug)->firstOrFail()->id;
        $comments = Blogcomment::where('post_id', $this->post_id)->take(7)->get();

        $populars = Post::where('featured', '1')->orderBy('id', 'desc')->take(3)->get();

        return view('blog-single')->with([
                'categories' => $categories,
                'allSubCategories' => $allSubCategories,
                'post' => $post,
                'comments' => $comments,
                'populars' => $populars,
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
