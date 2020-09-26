@extends('layouts.layout')
@section('title',"| Tag-$tag->name" )
@section('content')
    <div class="container">
        <h2 class="text-capitalize text-center">{{$tag->name}} <span class="h4 font-weight-light">{{$tag->posts->count()}}posts</span>
        </h2>
    </div>
    <div class="container">

                      <table class="table-bordered text-center">
                    <thead>
                    <tr>
                        <th> SN</th>
                        <th>Post</th>
                        <th>Title</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tag->posts as $post)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{strip_tags(html_entity_decode($post->body))}}</td>
                            <td>@foreach($post->tags as $post_tag) <badge class="badge badge-dark">{{$post_tag->name}}</badge>@endforeach </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


    </div>

@endsection

