@extends('layouts.layout')
@section('title','| Home')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">

                    <h3 class="d-sm-inline-block font-weight-bold" >latest post</h3>
                    <p class="font-weight-bold">{{$latest_post->title}}</p>
                    <p class="mb-0">{{Str::limit(strip_tags(html_entity_decode($latest_post->body)),30)}}</p>
                    <small> Written by {{$latest_post->user->name}} at {{date('M j, Y H:m',strtotime($latest_post->created_at))}}</small>
                    <hr class="my-4">
                    <a  href="{{route('show.blog.by.slug',$latest_post->slug)}}"
                       role="button">Read More</a>

            </div>
            <div class="col-md-4 bg-danger">

            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mt-lg-5">
                @foreach($posts_home  as $post)
                    @if($post->id!==$latest_post->id)
                    <div class="post">
                        <h5><b>{{$post->title}}</b></h5>
                        <p style="margin-bottom:0px;">{{Str::limit(strip_tags(html_entity_decode($post->body)),30)}}

                        <p style="margin:3px 0px;"><i>Written by {{$post->user->name}} at : {{date('M j, Y g:m a',strtotime($post->created_at))}}</i>
                        </p>

                        <a href="{{route('show.blog.by.slug',$post->slug)}}">Read More</a>
                        <hr>

                    </div>
                    @endif
                @endforeach
                <hr>
            </div>

        </div>
        {{$posts_home->links()}}
    </div>
@endsection

