@extends('layouts.layout')
@section('title',"| $post->title")
@section('content')

    @if(!Auth::guest())
        @if(Auth::user()->id ==$post->user_id)
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h5>{{$post->title}}</h5>

                        <p class="'lead">{!!$post->body !!} </p>
                      @foreach($post->tags as $tag)
                        <small class=" badge badge-dark">{{$tag->name}}</small>@endforeach





                    </div>


                    <div class="col-md-3 offset-sm-1" style="background-color: #ececf6">
                        <small>Author : {{$post->user->name}}</small><br>
                        <small>Category:{{$post->category->type}}</small><br>
                        <small>Created At: {{$post->created_at}}</small><br>
                        <small>Url:<a href="{{route('show.blog.by.slug',$post->slug)}}">{{url('blog/'.$post->slug)}}</a></small>
                        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success btn-sm" >Edit</a>
                            <a href="{{route('posts.index')}}" class="btn btn-sm btn-sm btn-success">Back</a>
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3>{{$post->comments->count()}} Comments</h3>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th >Comments</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($post->comments as $comment)
                                <tr>
                                    <td>{{$comment->name}}</td>
                                    <td>{{$comment->email}}</td>
                                    <td data-toggle="tooltip">{{Str::limit(strip_tags(html_entity_decode($comment->comment)),30)}}</td>
                                    <td class="text-center" data-toggle="tooltip" data-placement="top" title="delete comment"><a href="{{route('comment.delete',$comment->id)}}"><i
                                                class="fa fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    @endif

@endsection
