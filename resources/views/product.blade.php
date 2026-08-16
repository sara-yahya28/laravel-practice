@extends('layout.template')
@section('title','Show Product')
@section('content')
<style>
    .container{
        font-size: 25px;
        margin: 10px;     
}
p{
    margin: 0;
}
.color{
color: #633bff;
}
</style>
<div class="container">
    <p>Product No. {{$the_id ?? "All Products"}}</p>
</div>
@endsection {{-- @stop = works instead of @endsection --}}

@section('sidebar')
@parent
This Is Sidebar From Product Page
@endsection