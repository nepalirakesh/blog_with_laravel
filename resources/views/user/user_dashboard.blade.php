@extends('layouts.layout')
@section('title','user_dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                @if(count($posts)>0)
                <div class="post">
                    @foreach($posts as $post)
                        <h4>{{$post->title}}</h4>
                        <p>{{Str::limit(strip_tags(html_entity_decode($post->body)),10)}}</p>
                        <p>{{date('M j,Y g:m a ',strtotime($post->created_at))}}</p>
                        <a href="{{route('show.blog.by.slug',$post->slug)}}" class="btn btn-sm btn-outline-secondary">Read
                            More</a>
                            <hr>

                    @endforeach
                    @else
                        <h5 class="text-md-center">You haven't created any Blogs yet</h5>
                        <div class="text-center"><a href="{{route('posts.create')}}" class="btn btn-sm btn-primary"" >Create Blog</a>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

