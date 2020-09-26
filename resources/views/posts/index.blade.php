@extends('layouts.layout')
@section('title','| All Posts')
@section('content')

    @if(count($all_post)>0)


        <div class="container container-fluid">
            <div class="row mt-3">
                <div class="col-auto">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th>SN</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Created At</th>
                            <th>Slug</th>
                            <th>Category</th>
                            <th colspan="3">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_post as $post)
                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{Str::limit(strip_tags(html_entity_decode($post->body)),25)}}</td>
                                <td>{{date('M j, Y H:m',strtotime($post->created_at))}}</td>
                                <td>{{$post->slug}}</td>
                                <td>{{$post->category->type}}</td>
                                <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                    <td>
                                        <a href="{{route('posts.show',$post->id)}}"  data-toggle="tooltip" data-placement="top" title="Open Post"><span class="fa fa-file"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('posts.edit',$post->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Post">
                                            <span class=" fa fa-edit"></span>
                                        </a>
                                    </td>
                                    @csrf
                                    @method('DELETE')
                                    <td>
                                        <button type="submit" class="alert-danger "  style="border: none"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete Post" ></i></button>
                                    </td>
                                </form>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <h5 class="text-md-center">You haven't created any Blogs yet</h5>
        <div class="text-center"><a href="{{route('posts.create')}}" class="btn btn-sm btn-primary"" >Create Blog</a>
        </div>

    @endif

@endsection

