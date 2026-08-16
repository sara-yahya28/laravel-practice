{{-- Template page --}}
<!DOCTYPE html>
<html lang="eng" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','موقعي')</title>
    <style>
        body{
            margin: 0;
        }
    </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- @include('partials.navbar') --}}

    {{-- Start NavBar --}}
{{-- Constant. Same piece of code (like a header or footer) shows up on every single page exactly the same way. --}}
@include("partials.navbar2")

    <main class="container">
{{-- Variable. You leave an empty spot in the layout, and each child page decides what to put in that spot using extend()--}}
    @yield('body')
</main>

{{-- For Standared Sections in all pages --}}
@include('partials.sidebar')

</body>
</html>