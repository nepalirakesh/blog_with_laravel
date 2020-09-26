@extends('layouts.layout')
@section('title','|Categories')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-4">
                <table class=" table table-bordered">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $category)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->type}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
{{--                <div class="col offset-3">--}}
{{--                    <div class="well">--}}

{{--                    <form action="{{route('category.store')}}" method="POST">--}}
{{--                        @csrf--}}
{{--                        <label for="type">Add Category:</label>--}}
{{--                        <br>--}}
{{--                        <input type="text" name="type">--}}
{{--                        <input type="submit" class="btn btn-primary">--}}
{{--                    </form>--}}
{{--                    @error('type')--}}
{{--                    <span class="text text-danger">{{$errors->first('type')}}</span>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="card text-black-50 bg-light offset-md-4" style="height:200px">
                <div class="card-header">Add Catehory</div>
                <div class="card-body">
                    <form  class=form-group action="{{route('category.store')}}" method="POST" >
                        @csrf
                        <label for="type"></label>
                        <input class=form-control name="type" type="text">
                        <input class='btn btn-primary mt-4 align-content-center' type="submit" value="Add">
                    </form>

                </div>
        </div>
    </div>
@endsection
