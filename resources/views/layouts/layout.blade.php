<!doctype html>
<html lang="en">
<head>

    @include('partials._head')
    @yield('stylesheet')

</head>

<body onload="startTime()">
@include('partials._nav')

<div class="container pt-5">
    @include('partials._messages')

    @yield('content')

    @include('partials._footer')

    @include('partials._javascript')
    @yield('script')
</div>



</body>
</html>
