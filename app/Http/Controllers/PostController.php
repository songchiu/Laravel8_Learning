<?php
//create this file by giving parameter "--resource"

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $posts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel',
            'is_true' => true,
            'isset_test' => true
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP',
            'is_true' => false
        ]
    ];
    

    public function index()
    {
        // URL "/crud" refers to index() method
        // "take()" means "limit" in SQL
        return view('posts.for', ['posts' => User::orderBy('created_at', 'desc')->take(3)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /* without using additional class to validate input data

    public function store(Request $request)
    {
        // dd($request); show the whole detail of $request

        $request->validate([
            'title' => 'bail|required|min:5|max:50',
            'content' => 'required|min:5'
        ]);
        //bail means if an error occurs, it will doing validation
        //we can use "validate" to check input data

        $post = new BlogPost();

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('crud.show', ['crud' =>$post->id]);
        //array parameter must be the SAME as route's name 
        //e.g. "crud"
    }
    */

    //Using additional class "StorePost" to validate data
    public function store(StorePost $request)
    {
        $validated = $request->validated();

        /* This way is not convenient for adding mass data
        $post = new BlogPost();

        $post->title = $validated['title'];//use "$validated" to retrieve post value
        $post->content = $validated['content'];//use "$validated" to retrieve post value
        $post->save();
        */

        //We can use another way to add mass data
        $post = BlogPost::create($validated);

        $request->session()->flash('status', 'The blog post was created');
        //create session flash message
        //at once been showed, it will be delete automatically

        return redirect()->route('crud.show', ['crud' =>$post->id]);
        //array parameter must be the SAME as route's name 
        //e.g. "crud"
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //abort_if(!isset($this->posts[$id]), 404);

        //return view('posts.show', ['post' => $this->posts[$id]]);

        //view can also be present as below
        return view('posts.show', ['post' => BlogPost::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit', ['post' => BlogPost::findOrFail($id)]);
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
