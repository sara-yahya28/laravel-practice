{{-- Custom PHP variables declared in the component that handle data logic internally. --}}
@props([
    // All props page require
    'title'=>'laracasts'
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    {{-- gets its value from pages --}}
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
       nav>a{
        background-color: #550511;
        padding: 15px;
        margin-top: 15px;
        color: white;
        border-radius: 15px;
        text-decoration: none;
       } 
       .max-w-400{
        max-width: 400px;
       }
       .card{
        background-color:#e3e3e3;
         padding:1rem;
         text-align:center;
         border-radius:15px;
         margin: auto;
       }
    </style>
</head>
<body class="bg-gray-700 p-6 max-w-xl mx-auto">
    <nav>
        <a href="/">Home</a>
        <a href="{{route('request')}}">Contact Us</a>
        {{-- <a href={{route('request')}}>Contact Us</a> --}}
    </nav>

    <main>
        {{-- marks the spot where the page's custom HTML content gets inserted. --}}
    {{$slot}}
    </main>
</body>
</html>