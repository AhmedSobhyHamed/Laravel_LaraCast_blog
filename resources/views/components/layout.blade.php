@props(['title'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    {{$slot}}
    <x-page-footer/>

    @if (session()->has('popup message'))
        <div class="alert alert-success flash-message-box" role="alert">
            {{session('popup message')}}
        </div>      
    @endif
    <script src="/js/script.js"></script>
    <script src="/js/jquery-3.7.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>