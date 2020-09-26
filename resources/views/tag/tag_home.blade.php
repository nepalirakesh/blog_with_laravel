@extends('layouts.layout')
@section('title','|Tag')

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

                    @foreach($tags as $tag)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><a href="{{route('tag.show',$tag->id)}}">{{$tag->name}}</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card text-black-50 bg-light offset-md-4" style="height:200px">
                <div class="card-header">Add Tag</div>
                <div class="card-body">
                    <form  class=form-group action="{{route('tag.store')}}" method="POST" >
                        @csrf
                        <label for="tag" style="display: none"> TAg</label>
                            <input id ="tag"  class=form-control name="name" type="text">

                        <input class='btn btn-primary mt-4 align-content-center' type="submit" value="Add">
                    </form>

                </div>
            </div>
        </div>
@endsection
