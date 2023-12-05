<!DOCTYPE html>
<html> 
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="{{asset('assets/css/style_sheet.css')}}" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >


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
            <img src=" {{asset('assets/images_product/gaming_laptops.jpg')}}" class = "title_image">
            <div class="title_shape_text"></div>
            <p class = "laptop_title1" style="position: absolute; top: 34%; color: white; text-align: center; left: 5%; ">
                GAMING LAPTOPS
            </p>
            <p class = "title_content" style="position: absolute; top: 44%; color: white; text-align: left; left: 5%; ">
                The most portable and powerful laptops for gamers,<br>
                creators, and professionals
            </p>
        </div>
        </div>

    </h1>
    <h2>
        <div class="background_shape6">
            <p class = "path" >
            >> Home >>
            Products >> Gaming
            Laptops
        </p>
        <button class="button_sort">
            <img class = "image_sort" src="{{asset('assets/images_product/sort.png')}}" alt="" >
        </button>
        <button class="button_filter">
            <img class = "image_filter" src="{{asset('assets/images_product/filter.png')}}" alt="" >
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
