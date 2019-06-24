<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //To bring in Post Model (App is the namespace of Posts Model)

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index')->with('posts', $posts);
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
    public function store(Request $request)
    {
        //Form input validation
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'cover_img' => 'image|nullable|max:1999'
        ]);

        //Handel Cover Image File
        if($request->hasFile('cover_img')){
            //Get file name with extension
            $fileNameWithExtn = $request->file('cover_img')->getClientOriginalName();
            //Get just file name
            $fileName = pathinfo($fileNameWithExtn, PATHINFO_FILENAME);
            //Get just file extenstion
            $fileExtn = $request->file('cover_img')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtn;
            //Upload Image
            $path = $request->file('cover_img')->storeAs('public/cover_imgs', $fileNameToStore);
        }else{
            $fileNameToStore = 'default_cover.jpg';
        }

        //Creating the new post
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_img = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id == $post->user_id) //Disable editing for users other than the author
            return view('posts.edit')->with('post', $post);
        else
            return redirect('/posts')->with('error', 'Unauthorized atempt to edit!');
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
        //Form input validation
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        //Creating the new post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect("/posts/{$post->id}")->with('success', 'Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        
        if(auth()->user()->id == $post->user_id) //Disable deleting for users other than the author
            return redirect('/posts')->with('success', 'Post Deleted!');
        else
            return redirect('/posts')->with('error', 'Unauthorized atempt to delete!');
    }
}
