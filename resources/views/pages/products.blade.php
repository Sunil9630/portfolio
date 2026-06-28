@extends('layouts.app')

@section('title','Products')

@section('content')

<div class="container">

@foreach($products as $product)

@include('partials.product-card')

@endforeach

</div>

@endsection