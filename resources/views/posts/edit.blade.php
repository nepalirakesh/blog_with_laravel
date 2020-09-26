@extends('layouts.layout')
@section('title','| Edit Blog Post')
@section('stylesheet')
    <link rel="stylesheet" href="{{asset('assests/select2/select2.min.css')}}">
@endsection
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
    <div class="container">
        <div class="row">
            <div class="col-10">
                <form action="{{route('posts.update',$post->id)}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}" >
                        @error('title')
                        <span class="text-danger">{{$errors->first('title')}}</span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="slug">Slug:</label>
                            <input  id="slug" type="text" class="form-control" name="slug" value="{{$post->slug}}">
                        </div>
                        <div class="form-group col">
                            <label for="categories">Categories</label>
                            <select class="form-control" name="categories" id="categories">

                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$post->category->id==$category->id?'selected':''}}>{{$category->type}}</option>
                                @endforeach

                            </select>
                        </div>



                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <select name="tags[]" id="tags" class="form-control" multiple="multiple" >
                            @foreach($tags as $tag) <option value="{{$tag->id}}">{{$tag->name}}</option> @endforeach
                        </select>


                    </div>

                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea class="form-control" id="body"  name="body">{{$post->body}}</textarea>
                        @error('title')
                        <span class="text-danger">{{$errors->first('title')}}</span>
                        @enderror
                    </div>

                    <a href="{{route('blog')}}" class="btn btn-primary" >Back</a>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{asset('assests/select2/select2.full.min.js')}}" ></script>


    <script>
        $(document).ready(function() {
            $('#tags').select2().val({{json_encode($post->tags()->allRelatedIds() )}}).trigger('change');

        });
    </script>

@endsection

