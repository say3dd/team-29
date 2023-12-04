@extends('productL')

@section('productP')

@foreach($laptops as $laptop)
<div class="laptop_all">
    <img class="image_all_laptop" src="{{ asset($laptop->image_path) }}">
    <div class="laptop_all_text">
        <a href="{{route('product')}}"> {{$laptop ->laptop_name}} </a>
        <p>{{ $laptop->processor }}</p>
        <p>{{ $laptop->GPU }}</p>
    </div>
    <p style="margin-bottom: 42px;">RAM: {{$laptop->RAM}} GB </p>
    <p class="price" style=" font-weight: bold; margin-bottom: 0px; text-decoration: underline;
    text-decoration:underline; text-decoration-color:aquamarine ">Price: £{{ $laptop->price }}</p>
    <br>
    
    <button class="button_cart_laptop"> Add to Basket </button>
</div>
@endforeach

@endsection
