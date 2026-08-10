@extends('layout.app')
@section('title','موقعي')
@section('content')
<div class="index">
<h1>جميع المقالات</h1>
@forelse ($posts as $post )
    <p>{{$post->title}}</p>
@empty
    <p>لا يوجد مقالات للعرض</p></div>
@endforelse
@endsection