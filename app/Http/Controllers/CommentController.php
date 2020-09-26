<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request, $post_id)

    {
        $request->validate([
//            'name' => 'required|max:255',
//            'email' => 'required|max:255',
            'comment' => 'required'

        ]);
        $post = Post::find($post_id);
        $comment = new Comment;
        $comment->name = auth()->user()->name;
        $comment->email = auth()->user()->email;
        $comment->comment = clean($request->get('comment'));

//        $comment->comment = $request->get('comment');
        $comment->approved = true;

        $comment->post()->associate($post);
        $comment->save();
        return redirect()->route('show.blog.by.slug', $post->slug)->with('success', 'comment added successfully');


//        $comment->name     = $request->get('name');
//        $comment->email    = $request->get('email');
//   without using assciate()
//        $comment->post_id  = Post::find($post_id)->id;
//        return redirect()->route('show.blog.by.slug',$post->slug)->with('success','comment added successfully');


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post_id;


        $comment->delete();
        return redirect()->route('posts.show', $post_id)->with('success', 'comment deleted successfully');
    }
}
