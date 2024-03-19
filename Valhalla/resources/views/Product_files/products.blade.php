<!-- @KraeBM (Bilal Mohamed) worked on the blade templating of this website  -->
<!-- @ElizavetaMikheeva (Elizaveta Mikheeva) - implemented the front-end (design) of the Products webpage using CSS  -->
@extends('Product_files.productL')

@section('productP')
<!--@noramknarf (Francis Moran) - added functionality to "add to basket" buttons (see ProductController->getInfo()) -->
<!--@say3dd (Mohammed Miah) - Displayed the products from the database -->
@forelse($products as $product)
<div class="laptop_all">
    <img class="image_all_laptop" src="{{ asset($product->images) }}" style="transition: 0.3s ease">
    <div class="laptop_all_text">
        <!--@say3dd (Mohammed Miah) && @BilalMO (Bilal Mohamed) Routing to make the user go to the details of an individual product by clicking on the name -->
        <a style= "color: inherit; font-weight: bold; font-size: 1.05rem;" href="{{ $product->category === 'Laptop' ? route('product.laptopInfo', ['id' =>$product->product_id]) : route('product.otherInfo', ['id' =>$product->product_id]) }}">
            {{$product->product_name}} </a>
        <ul>
            @foreach($product->features as $featureName => $featureValue)
        {{--            This skips the feature that we dont want to show     --}}
        @if(
    ($product->category === 'Mouse' && in_array($featureName, ['Battery Life'])) ||
    ($product->category === 'Monitor' && $featureName === 'Response Time') ||
    ($product->category === 'Keyboard' && $featureName === 'Connectivity') ||
     ($product->category === 'Keyboard' && $featureName === 'KeyBoard Type')
        )
                    @continue
                @endif
                <li><strong>{{ $featureName }}:</strong> {{ $featureValue }}</li>
            @endforeach
        </ul>
    </div>
    <div class = "price_button_container" >
    <div class="price" style=" font-weight: bold; margin-bottom: 0px; text-decoration: underline;
    text-decoration:underline; text-decoration-color:aquamarine ">Price: £{{ $product->price }}</div>
    <br>
    <form action="{{route('products.index')}}" method='post' onsubmit='saveScrollPosition(this)'>
        @csrf
        <input type="hidden" name="laptopData" value={{$product->product_id}}>
        <input type="hidden" name="scrollPosition" id="scrollPosition" value="">
        <button class="button_cart_laptop"> Add to Basket </button>
    </form>
</div>
</div>
@empty
    <h1 class="text-2xl">There are no products available yet.</h1>
@endforelse
@endsection

<script>
    const dropdown = document.getElementById("cartDropdown");
    const basketButton = document.getElementById("basket-button");

    basketButton.addEventListener('click', function(e) {
        e.stopPropagation(); // Prevent event from propagating to other elements
        dropdown.classList.toggle("dropdown--active"); // Correctly toggle the active class to show/hide the dropdown
    });

</script>
