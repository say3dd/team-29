<!DOCTYPE html>
<html> 
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="{{asset('assets/css/style_sheet.css')}}">


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
    @include ('header')
</header>
<body>
    <h1>
        <div class="title_shape">
            <img src=" {{asset('assets/images_product/gaming_laptops.jpg')}}" style=" position: absolute;border-radius: 2rem; width:99.5%; height: 380px;">
            <div class="title_shape_text"></div>
            <p style="position: absolute; top: 34%; color: white; text-align: center; font-size: 1.8em; left: 5%; ">
                GAMING LAPTOPS
            </p>
            <p style="position: absolute; top: 44%; color: white; text-align: left; font-size: 1.6em; left: 5%; ">
                The most portable and powerful laptops for gamers,<br>
                creators, and professionals
            </p>
        </div>
        </div>

    </h1>
    <h2>
        <div class="background_shape6">
            <p
            style="position: absolute; top: 64%; left: 13%; font-size: 0.9rem; font-weight: lighter; text-decoration: underline; opacity: 0.7;">
            >> Home >>
            Products >> Gaming
            Laptops
        </p>
        <button class="button_sort">
            <img src="{{asset('assets/images_product/sort.png')}}" alt="" width="20" height="25">
        </button>
        <button class="button_filter">
            <img src="{{asset('assets/images_product/filter.png')}}" alt="" width="20" height="25">
        </button>
      
                @yield('productP')

                <div class="button_container">
                 <a href="{{route('productspage.id' ,['id' =>1]) }}">
                       <button class="button_to_switch_page" style="margin-top: 19px;"> 1 </button> 
                    </a>
                  <a href="{{route('productspage.id', ['id' =>2]) }}" >
                     <button class="button_to_switch_page" style="margin-top: 200px;"> 2 </button>
                  </a>
                   <a href="{{route('productspage.id', ['id'=> 3]) }}" >
                    <button class="button_to_switch_page" style="margin-top: 19px;"> 3 </button>
                   </a>
                </div>
               
            </div>
    </h2>
</body>
<footer>
    @include ('footer')
</footer>
</html>
