@extends('layouts.layout')
@section('title','| Contact')
@section('content')
    <div class="container " style="background-color: #5a6268">
        <div class="row">
            <div class="col-md-8 mt-4 offset-md-2">
                <h1>Contact Me</h1>
                <hr>
                <form action="{{route('about')}}">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="enter email">
                    </div>


                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea class="form-control" id="body" rows="3"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success">
                </form>



            </div>
        </div>
    </div>


@endsection
@section('script')

@stop()
