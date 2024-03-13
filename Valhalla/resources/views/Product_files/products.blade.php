<!-- @KraeBM (Bilal Mohamed) worked on the blade templating of this website  -->
<!-- @ElizavetaMikheeva (Elizaveta Mikheeva) - implemented the front-end (design) of the Products webpage using CSS  -->
@extends('Product_files.productL')

@section('productP')
<!--@noramknarf (Francis Moran) - added functionality to "add to basket" buttons (see ProductController->getInfo()) -->
<!--@say3dd (Mohammed Miah) - Displayed the products from the database -->
@foreach($products as $product)
<div class="laptop_all">
    <img class="image_all_laptop" src="{{ asset($product->images) }}" style="transition: 0.3s ease">
    <div class="laptop_all_text">
        <!--@say3dd (Mohammed Miah) && @BilalMO (Bilal Mohamed) Routing to make the user go to the details of an individual product by clicking on the name -->
        <a style= "color: inherit; font-weight: bold; font-size: 1.05rem;" href="{{ $product->category === 'Laptop' ? route('product.laptopInfo', ['id' =>$product->product_id]) : route('product.otherInfo', ['id' =>$product->product_id]) }}">
            {{$product->product_name}} </a>
        {{-- Uses regex to find the specific pattern to find the exact data needed to be shown : here its the processor, gpu and ram--}}
        @php
        $description = $product->product_description;

        // Regular expressions to find Processor, RAM, and GPU
        $patterns = [
            'Processor' => '/Processor:\s*([^\n]+)/',
            'RAM' => '/RAM:\s*([^\n]+)/',
            'GPU' => '/GPU:\s*([^\n]+)/',
        ];
// key refers to the descriptive names (processor,gpu etc), $pattern is the regular expressions, details is what stores the data found
        $details = [];
        foreach ($patterns as $key => $pattern) {
            if (preg_match($pattern, $description, $matches)) {
                //$matches[1] used for only the specified details matching the regex
                $details[$key] = $matches[1];
            }
        }
        @endphp
        {{--If the details array contains the same string as 'whats needed to be found', then its displays it using <p></p>--}}
        @if(isset($details['Processor']))
            <p> {{ $details['Processor'] }}</p>
        @endif
        @if(isset($details['GPU']))
            <p> {{ $details['GPU'] }}</p>
        @endif

    @if(isset($details['RAM']))
        <p>{{ $details['RAM'] }}</p>
    @endif
    </div>
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
@endforeach
@endsection
