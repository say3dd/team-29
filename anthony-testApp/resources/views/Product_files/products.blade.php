<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="{{asset('assets/css/style_sheet.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
   

    <style>
        h1 {
            font-family: "Noto Sans", sans-serif;
            font-size: small;
        }

        h2 {
            font-family: "Noto Sans", sans-serif;
            font-size: small;
        }
    </style>
</head>

<header>
  <section class = "navbar-section">
    @include ('header')
  </section>
 
</header>



<body>
    <h1>
        <div class="title_shape">
            <img class = "title_image" style="im" src=" {{asset('assets/images_product/gaming_laptops.jpg')}}" >
            <p class = "laptop_title1" style="position: absolute; top: 33%; color: white; text-align: center; left: 5%; ">
                GAMING LAPTOPS
            </p>
            <p class = "title_content" style="position: absolute; top: 43%; color: white; text-align: left; left: 5%; ">
                The most portable and powerful laptops for gamers,<br>
                creators, and professionals
            </p>
        </div>
        </div>

    </h1>
    <h2>
        <div class="background_shape6">
            <p class = "path">
                >> Home >>
                Products >> Gaming
                Laptops
            </p>
            <button class="button_sort">
                <img  class = "image_sort" src="{{asset('assets/images_product/sort.png')}}" alt="" >
            </button>
            <button class="button_filter">
                <img class = "image_filter" src="{{asset('assets/images_product/filter.png')}}" alt="">
            </button>

            {{-- code for showing the product --}}
            @foreach($laptops as $laptop)
            <div class="laptop_all">
                <img class="image_all_laptop" src="{{ asset($laptop->image_path) }}">
                <div class="laptop_all_text">
                    <a style= "color: inherit" href="{{ route('laptops.show', $laptop->product_id) }}"> {{$laptop->laptop_name}} </a>                    <p>{{ $laptop->processor }}</p>
                    <p>{{ $laptop->GPU }}</p>
                </div>
                <p style="margin-bottom: 42px;">RAM: {{$laptop->RAM}} GB </p>
                <p class="price" style=" font-weight: bold; margin-bottom: 0px; text-decoration: underline;
                text-decoration:underline; text-decoration-color:aquamarine ">Price: £{{ $laptop->price }}</p>
                <br>
                
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>
            @endforeach

            <div class="button_container">
                <button class="button_to_switch_page" style="margin-top: 19px;"> 1 </button>
                <button class="button_to_switch_page" style="margin-top: 200px;"> 2 </button>
                <button class="button_to_switch_page" style="margin-top: 19px;"> 3 </button>
                <button class="button_to_switch_page" style="margin-top: 19px;"> 4 </button>
                <button class="button_to_switch_page" style="margin-top: 19px;"> 5 </button>
                <button class="button_to_switch_page" style="margin-top: 19px;"> 6 </button>
                <button class="button_to_switch_page" style="margin-top: 19px;"> 7 </button>
                <button class="button_to_switch_page" style="margin-top: 19px;"> 8 </button>
            </div>
        </div>
    </h2>
</body>
        @include('footer')

</html>