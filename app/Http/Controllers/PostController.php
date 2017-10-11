<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Session;
use App\Post;



class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // getting all the posts showing in home page /indexpage
        $posts = Post::orderBy('id','desc')->paginate(1);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');                                      //for creating the post form page
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request,[
            'title' => 'required|max:255',
            'slug' =>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body'  => 'required'
        ]);
            //storing in the DB
        $post = new Post;                                                 // creating a brand new row in db with new instance
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->body = $request->body;

        $post->save();
        Session()->flash('success','The blog post was successfully saved!');   // success mesg pop up after validating
        //redirecting to another page

      return redirect()-> route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);                                                   //find method to find a specific post
        return view('posts.show')-> withPost ($post);                     // showing a specific post in post.show
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the DB & save it as var
        $post = Post::find($id);
        return view('posts.edit')->withPost($post);                                      //editing the post
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
        $post = post::find($id);
        if($request->input('slug')== $post->slug){
            $this->validate($request,array(
                'title' => 'required|max:255',
                'body'  => 'required'
            ));
    }else{
        //Validate the data
        $this->validate($request,array(
            'title' => 'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body'  => 'required'
        ));
        }
        $post = Post::find($id);                                     // same as store method instead of creating a new instance we use find method to specific post based on id and update in Database
                                                                     // does'nt create a new row it updates the content in existing row
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->save();
        Session()->flash('success','This post was successfully saved!');
        return redirect()->route('posts.show',$post->id);


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
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','The post was successfully deleted!');
        return redirect()->route('posts.index');

    }
}
