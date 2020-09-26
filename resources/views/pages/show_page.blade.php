@extends('layouts.layout')
@section('title',"| $post->title")

@section('text_editor')
    <script src="https://cdn.tiny.cloud/1/lfkihwszi2zmc4c5i2047u8p6t0vwzpun7pwsyrbyhf5p0ar/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins:'emoticons',

        });
    </script>
@endsection
@section('content')

    <div class="container mb-2">
        <div class="row">

            <div class="col-md-8">
                <h5>{{$post->title}}</h5>
                <p class="text-justify">{!! $post->body !!}</p>
                @foreach($post->tags as $tag)
                <small class="badge badge-dark">
                    {{$tag->name}}
                </small>
                    @endforeach
            </div>

            <div class="col-md-3 offset-sm-1" style="background-color:#ececf6; max-height:auto;" >
                <div class="label ">
                    <small>Author : {{$post->user->name}}</small><br>
                    <small>Category: {{$post->category->type}}</small><br>
                    <small>Url:<a href="{{route('show.blog.by.slug',$post->slug)}}">{{url('blog/'.$post->slug)}}</a></small><br>


                    <small> Created at : {{date('M j,Y  g:m a',strtotime($post->created_at))}}</small>
                    <a href="{{route('home')}}" class="btn btn-sm btn-primary align-bottom">Home</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4 " style="border-bottom: #0b2e13">
        <div class="row">
            <div class="col-md-8">
                <h3><i class="fa fa-comment-o"> {{$post->comments->count()}} Comments</i></h3>
                @foreach ($post->comments as $comment)
                    <p>{{$comment->name}}</p>
                    <p>{{$comment->email}}</p>
                    <p class="text-justify">{!! $comment->comment !!}</p>
                @endforeach

            </div>
        </div>
    </div>

@guest
    <p>Log in to comment</p>
    @endguest
    <div class="container mt-5">
        <div class="container-form">
            <div class="row">
                <div class="col-md-8">
                    <form class=form-group action="{{route('comments.store',$post->id)}}" method="post">
                        <div class="row">
                            @csrf
{{--                            <div class="col-md-6">--}}
{{--                                <label for="name">Name:</label>--}}
{{--                                <input class=form-control type="text" name="name" value={{old('name')}}>--}}
{{--                                @error('name')--}}
{{--                                <span class="text-danger">{{$errors->first('name')}}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <label for="email">Email:</label>--}}
{{--                                <input class="form-control" type="text" name="email" value={{old('email')}}>--}}
{{--                                @error('email')--}}
{{--                                <span class="text-danger">{{$errors->first('email')}}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

                            <div class="col-md-12">
                                <label for="comment">Comment:</label>

                                <textarea class=form-control name="comment" id="comment" cols="30" rows="3" ></textarea>
                                @error('comment')
                                <span class="text-danger">{{$errors->first('comment')}}</span>
                                @enderror

                            </div>

                        <div class="col-md-3 mt-2">

                        <input type="submit" class="form-control btn-success"    value="Add Comment">
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


