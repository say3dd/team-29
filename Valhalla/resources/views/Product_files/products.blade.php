<!-- @KraeBM (Bilal Mohamed) worked on the blade templating of this website  -->
<!-- @ElizavetaMikheeva (Elizaveta Mikheeva) - implemented the front-end (design) of the Products webpage using CSS  -->
@extends('Product_files.productL')



@section('productP')
    <!--@noramknarf (Francis Moran) - added functionality to "add to basket" buttons (see ProductController->getInfo()) -->
    <!--@say3dd (Mohammed Miah) - Displayed the products from the database -->


    @foreach($products as $product)
        <div class="laptop_all">
            <img class="image_all_laptop" src="{{ asset($product->image_path) }}" style="transition: 0.3s ease">
            <div class="laptop_all_text">
                <!--@say3dd (Mohammed Miah) Routing to make the user go to the details of an individual product by clicking on the name -->
                <a style="color: inherit"
                   href="{{ route('laptops.show', $product->product_id) }}"> {{$product->laptop_name}} </a>
                <p>{{ $product->processor }}</p>
                <p>{{ $product->GPU }}</p>
            </div>
            <p style="margin-bottom: 42px;">RAM: {{$product->RAM}} GB </p>
            <p class="price" style=" font-weight: bold; margin-bottom: 0px; text-decoration: underline;
    text-decoration:underline; text-decoration-color:aquamarine ">Price: £{{ $product->price }}</p>
            <br>

            <form action='{{route('product.getInfo')}}' method='post' onsubmit='saveScrollPosition(this)'>
                @csrf
                <input type="hidden" name="laptopData" value={{$product->product_id}}>
                <input type="hidden" name="scrollPosition" id="scrollPosition" value="">
                <button class="button_cart_laptop"><a href="{{route('add_to_basket', $product->product_id)}}">Add to
                        Basket</a></button>
            </form>

        </div>
    @endforeach
@endsection
