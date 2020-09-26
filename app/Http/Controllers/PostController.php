<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

use App\Models\Tag;
use Illuminate\Http\Request;


class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('show');
    }

    public function index(){

        $user_id = auth()->id();

        $all_post= Post::where('user_id','=',$user_id)->get();

        return view('posts.index',compact('all_post'));




    }


    public function create()
    {
        $categories=Category::all();
        $tags = Tag::all();
        return view('posts.create',compact('categories','tags'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'categories'=>'required|integer',

            'body'  => 'required'
            ]);

        //Post::create($request->all());

        $post              = new Post;
        $post->title       = $request->get('title');
        $post->slug        = $request->get('slug');
        $post->category_id = $request->get('categories');

        $post->body        = clean($request->get('body'));
        $post->user_id     = auth()->user()->id;

        $post->save();
        $post->tags()->sync($request->get('tags'),false);

        //        $post->body        = $request->get('body');
        //using purifier to clean risky content of body

//        $post->tags()->sync($request->tags,false);



        return redirect()->route('blog')->with('success','successfully created');
    }



    public function show($id)
    {
        $post = Post::find($id);
        if (auth()->user() -> id !== $post->user_id) {
            return redirect()->route('blog')->with('error','unauthorize route');
        }


        return view('posts.show', compact('post'));
    }


    public function edit($id)
    {

       $post = Post::find($id);

       if(auth()->user()->id!==$post->user_id){
            return redirect()->route('blog')->with('error','unauthorize route');
       }

       $categories = Category::all();
       $tags       = Tag::all();

        return view('posts.edit',compact('post','categories','tags'));



    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'title'=>'required',
            'categories'=>'required|integer',
            'body'=>'required'
        ]);
        $post              = Post::find($id);
        $post->title       = $request->get('title');
        $post->slug        = $request->get('slug');
        $post->category_id = $request->get('categories');
        $post->body        = clean($request->get('body'));

        $post->save();

        $post->tags()->sync($request->get('tags'),true);
        return redirect()->route('posts.show',$post->id)->with('success','post successfully updated');
    }



    public function destroy($id)
    {
        $post=Post::find($id);

        if(auth()->user()->id!==$post->user_id){


            return redirect()->route('blog')->with('error','unauthorized access');
        }
        $post->delete();
        //return "deleted";
        return redirect()->route('posts.index')->with('success','post deleted successfully');



    }

}
