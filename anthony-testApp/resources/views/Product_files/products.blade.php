<!-- @KraeBM (Bilal Mohamed) worked on the blade templating of this website  -->
@extends('productL')

@section('productP')
<!--@noramknarf (Francis Moran) - added functionality to "add to basket" buttons (see ProductController->getInfo()) -->
<!--@say3dd (Mohammed Miah) - Displayed the products from the database -->
@foreach($laptops as $laptop)
<div class="laptop_all">
    <img class="image_all_laptop" src="{{ asset($laptop->image_path) }}">
    <div class="laptop_all_text">
        <!--@say3dd (Mohammed Miah) Routing to make the user go to the details of an individual product by clicking on the name -->
        <a style= "color: inherit" href="{{ route('laptops.show', $laptop->product_id) }}"> {{$laptop->laptop_name}} </a>
        <p>{{ $laptop->processor }}</p>
        <p>{{ $laptop->GPU }}</p>
    </div>
    <p style="margin-bottom: 42px;">RAM: {{$laptop->RAM}} GB </p>
    <p class="price" style=" font-weight: bold; margin-bottom: 0px; text-decoration: underline;
    text-decoration:underline; text-decoration-color:aquamarine ">Price: £{{ $laptop->price }}</p>
    <br>
    
    <form action='{{route('product.getInfo')}}' method='post'>
        @csrf
        <input type="hidden" name="laptopData" value={{$laptop->product_id}}>
        <button class="button_cart_laptop"> Add to Basket </button>
    </form>
    <!--It took me 8 hours of work just to get this thing to get this data and of course it comes out as a string I can't separate... -->
    <!--productToAdd is the string of data that the function returns, what I need to do is get the id from this and use that to update the basket DB -->
    

</div>
@endforeach
@endsection