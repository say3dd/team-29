@extends('productL')

@section('productP')

@foreach($laptops as $laptop)
<div class="laptop_all">
    <img class="image_all_laptop" src="{{ asset($laptop->image_path) }}">
    <div class="laptop_all_text">
        <a style = "font-weight: bold; color: white;" href="{{route('product')}}"> {{$laptop ->laptop_name}} </a>
        <p>{{ $laptop->processor }}</p>
        <p>{{ $laptop->GPU }}</p>
    </div>
    <p style="margin-bottom: 42px;">RAM: {{$laptop->RAM}} GB </p>
    <p class="price" style=" font-weight: bold; margin-bottom: 0px; text-decoration: underline;
    text-decoration:underline; text-decoration-color:aquamarine ">Price: £{{ $laptop->price }}</p>
    <br>
    
    <button class="button_cart_laptop"> Add to Basket </button>

    <!-- Here i will add the update/ delete functions if the user is of type admin
        Users will be of tyype 0 
        Admin of type 1 
        If user type=1 and ::auth then these buttons should show
        Delete buttons deletes said database with a popup saying do you want to delete this product
        Edit shows a pop up page that shows what can be deleted or not 
    --> 


</div>
@endforeach

@endsection
