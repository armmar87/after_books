<!DOCTYPE html>
<html>
<head>
    <title>After Books</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
{{--    <link rel="stylesheet" href="{{asset('css/autocomplete.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/fastselect.min.css')}}">

</head>
<body>
<div class="links">
    <a href="{{url('/')}}">Home</a>
</div>

<div class="container">
    @yield('content')
</div>


<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
{{--<script src="{{asset('js/fastselect.min.js')}}"></script>--}}
<script src="{{asset('js/fastselect.standalone.min.js')}}"></script>

{{--<script type="text/javascript" src="{{asset('js/autocomplete.js')}}"></script>--}}

@yield('scripts')

</body>
</html>