<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','موقعي')</title>
    <style>
        .index{
            text-align: center;
            border: none;
            width: 500px;
            height: 250px;
            margin: auto;
            margin-top:50px; 
            background-color:#dbd8d8 ;
            border-radius: 15px;
            padding: 5px;
        }
    </style>
</head>
<body>
@include('partials.navbar')

<main class="container">
    @yield('content')
</main>

</body>
</html>