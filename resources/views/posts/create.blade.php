@extends('layouts.layout')
@section('title','| Create New Post')

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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Create New Post</h1>
                <hr>
                <form action="{{route('posts.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Title">Title:</label>
                        <input type="text" class="form-control" id="Title"
                               placeholder="title" name="title" value="{{old('title')}}">
                        @error('title')
                        <span class="text-danger">{{$errors->first('title')}}</span>
                        @enderror
                    </div>
                    <div class="form-row justify-content-center ">
                        <div class="form-group col">
                            <label for="slug">
                                Slug:
                            </label>
                            <input type="text" class='form-control' name="slug" id="slug">
                            @error('slug')
                            <span class="text-danger">{{$errors->first('slug')}} </span>
                            @enderror
                        </div>


                        <div class="form-group col">
                            <label for="categories">Categories:</label>
                            <select class="form-control" name="categories" id="categories" >
                                @foreach($categories as $category)
                                    <option value='{{$category->id}}'>{{$category->type}}</option>
                                @endforeach
                            </select>
                            @error('categories')
                            <span class="text-danger">{{$errors->first('categories')}}</span>
                            @enderror
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="tags">Tag:</label>
                            <select name="tags[]" class="form-control" id="tags" multiple="multiple">
                                @foreach($tags as $tag)
                                    <option value={{$tag->id}}>{{$tag->name}}</option>
                                    @endforeach
                            </select>
                        </div>




                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea class="form-control" id="body" rows="3" name="body">{{old('body')}}</textarea>
                        @error('body')
                        <span class="text-danger">{{$errors->first('body')}}</span>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-success">
                </form>


            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('assests/select2/select2.full.min.js')}}" ></script>


    <script>
        $(document).ready(function() {
            $('#tags').select2();
        });
    </script>

@endsection
