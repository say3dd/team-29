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
            <img class = "title_image" src=" {{asset('assets/images_product/gaming_laptops.jpg')}}" >
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
            <div class="laptop_all">
                <img class="image_all_laptop" src="{{asset('assets/images_product/msi_Titan_GT77_HX_13V.jpg')}}">
                <div class = "laptop_all_text">
                <a href="{{ url('page') }}">MSI Titan GT77 HX 13V </a>
                <p> - 13th Gen Intel® Core™ i9-13980HX Processor</p>
                <p> - GeForce RTX™ 4090</p>
                </div>
                <p style="margin-bottom: 42px;"> - 128GB RAM</p>
                
                <p class = "price"
                    style="font-weight: bold; margin-bottom: 0px; text-decoration: underline; text-decoration:underline; text-decoration-color:aquamarine ">
                    Price: £3,362.99
                </p><br>

                <button class="button_cart_laptop"> Add to Basket </button>
            </div>

            <div class="laptop_all">
                <img class="image_all_laptop" src="{{asset('assets/images_product/alienware_m16.png')}}" style=" background-color: white;">
                <div class = "laptop_all_text">
                <a href="{{ url('page') }}">Alienware m16</a>
                <p> - 13th Gen Intel® Core™ i7-13700HX Processor</p>
                <p> - GeForce RTX™ 4070</p>
                </div>
                <p style="margin-bottom: 42px;"> - 32GB RAM</p>
                <p class = "price"
                    style="font-weight: bold; margin-bottom: 0px; text-decoration: underline; text-decoration:underline; text-decoration-color:aquamarine ">
                    Price: £3,362.99
                </p><br>
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>

            <div class="laptop_all">
                <img class="image_all_laptop" src=" {{asset('assets/images_product/medion_erazer_X20.webp')}}">
                <div class = "laptop_all_text">
                <a href="{{ url('page') }}">Medion Erazer X20</a>
                <p> - 13th Intel® Core™ i9 13900HX Processor</p>
                <p> - GeForce RTX 4070 8GB</p>
                </div>
                <p style="margin-bottom: 42px;"> - 32GB RAM</p>
                <p class = "price"
                    style="font-weight: bold; margin-bottom: 0px; text-decoration: underline; text-decoration:underline; text-decoration-color:aquamarine ">
                    Price: £3,362.99
                </p><br>
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>

            <div class="laptop_all">
                <img class="image_all_laptop" src="{{asset('assets/images_product/asus_ROG_Strix_G16_G614.png')}}" style=" background-color: white;">
                <div class = "laptop_all_text">
                    <a href="{{ url('page') }}">Asus ROG Strix G16 G614</a>
                <p> - 13th Gen Intel® Core™ i9-13980HX Processor</p>
                <p> - GeForce RTX™ 4090</p>
                </div>
                <p> - 128GB RAM</p>
                <p class = "price"
                    style="font-weight: bold; margin-bottom: 0px; text-decoration: underline; text-decoration:underline; text-decoration-color:aquamarine ">
                    Price: £3,362.99
                </p><br>
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>

            <div class="laptop_all">
                <img class="image_all_laptop" src="{{asset('assets/images_product/alienware_m18.avif')}} ">
                <div class = "laptop_all_text">
                    <a href="{{ url('page') }}">Alienware m18</a>
                <p> - 13th Gen Intel® Core™ i7-13700HX Processor</p>
                <p> - GeForce RTX™ 4080</p>
                </div>
                <p style="margin-bottom: 42px;"> - 32GB RAM</p>
                <p class = "price" style=" font-weight: bold; margin-bottom: 0px; text-decoration: underline;
                    text-decoration:underline; text-decoration-color:aquamarine ">
                    Price: £3,362.99
                </p><br>
                <button class=" button_cart_laptop"> Add to Basket </button>
            </div>
            <div class="laptop_all">
                <img class="image_all_laptop" src="{{asset('assets/images_product/msi_Titan_GT77_HX_13V.jpg')}}">
                <div class = "laptop_all_text">
                     <a href="{{ url('page') }}">MSI Titan GT77 HX 13V</a>
                <p> - 13th Gen Intel® Core™ i9-13980HX Processor</p>
                <p> - GeForce RTX™ 4090</p>
                </div>
                <p style="margin-bottom: 42px;"> - 128GB RAM</p>
                <p class = "price"
                    style="font-weight: bold; margin-bottom: 0px; text-decoration: underline; text-decoration:underline; text-decoration-color:aquamarine ">
                    Price: £3,362.99
                </p><br>
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>

            <div class="laptop_all">
                <img class="image_all_laptop" src="{{asset('assets/images_product/alienware_m16.png')}}" style=" background-color: white;">
                <div class = "laptop_all_text">
                     <a href="{{ url('page') }}">Alienware m18</a>
                <p> - 13th Gen Intel® Core™ i7-13700HX Processor</p>
                <p> - GeForce RTX™ 4070</p>
                </div>
                <p style="margin-bottom: 42px;"> - 32GB RAM</p>
                <p class = "price"
                    style="font-weight: bold; margin-bottom: 0px; text-decoration: underline; text-decoration:underline; text-decoration-color:aquamarine ">
                    Price: £3,362.99
                </p><br>
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>

            <div class="laptop_all">
                <img class="image_all_laptop" src=" {{asset('assets/images_product/medion_erazer_X20.webp')}}">
                <div class = "laptop_all_text">
                     <a href="{{ url('page') }}">Medion Erazer X20</a>
                <p> - 13th Intel® Core™ i9 13900HX Processor</p>
                <p> - GeForce RTX 4070 8GB</p>
                </div>
                <p style="margin-bottom: 42px;"> - 32GB RAM</p>
                <p class = "price"
                    style="font-weight: bold; margin-bottom: 0px; text-decoration: underline; text-decoration:underline; text-decoration-color:aquamarine ">
                    Price: £3,362.99
                </p><br>
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>

            <div class="laptop_all">
                <img class="image_all_laptop" src="{{asset('assets/images_product/asus_ROG_Strix_G16_G614.png')}}" style=" background-color: white;">
                <div class = "laptop_all_text">
                    <a href="{{ url('page') }}">Asus ROG Strix G16 G614</a>
                <p> - 13th Gen Intel® Core™ i9-13980HX Processor</p>
                <p> - GeForce RTX™ 4090</p>
                </div>
                <p> - 128GB RAM</p>
                <p class = "price"
                    style="font-weight: bold; margin-bottom: 0px; text-decoration: underline; text-decoration:underline; text-decoration-color:aquamarine ">
                    Price: £3,362.99
                </p><br>
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>

            <div class="laptop_all">
                <img class="image_all_laptop" src="{{asset('assets/images_product/alienware_m18.avif')}} ">
                <div class = "laptop_all_text">
                    <a href="{{ url('page') }}">Alienware m18</a>
                <p> - 13th Gen Intel® Core™ i7-13700HX Processor</p>
                <p> - GeForce RTX™ 4080</p>
                </div>
                <p style="margin-bottom: 42px;"> - 32GB RAM</p>
                <p class = "price"
                style=" font-weight: bold; margin-bottom: 0px; text-decoration: underline;
                                        text-decoration:underline; text-decoration-color:aquamarine ">
                    Price: £3,362.99
                </p><br>
                <button class=" button_cart_laptop"> Add to Basket </button>
            </div>
             <div class="laptop_all">
                <img class="image_all_laptop" src="{{asset('assets/images_product/msi_Titan_GT77_HX_13V.jpg')}}">
                <div class = "laptop_all_text">
                <a href="{{ url('page') }}">MSI Titan GT77 HX 13V </a>
                <p> - 13th Gen Intel® Core™ i9-13980HX Processor</p>
                <p> - GeForce RTX™ 4090</p>
                </div>
                <p style="margin-bottom: 42px;"> - 128GB RAM</p>
                
                <p class = "price"
                    style="font-weight: bold; margin-bottom: 0px; text-decoration: underline; text-decoration:underline; text-decoration-color:aquamarine ">
                    Price: £3,362.99
                </p><br>

                <button class="button_cart_laptop"> Add to Basket </button>
            </div>

            <div class="laptop_all">
                <img class="image_all_laptop" src="{{asset('assets/images_product/alienware_m16.png')}}" style=" background-color: white;">
                <div class = "laptop_all_text">
                <a href="{{ url('page') }}">Alienware m16</a>
                <p> - 13th Gen Intel® Core™ i7-13700HX Processor</p>
                <p> - GeForce RTX™ 4070</p>
                </div>
                <p style="margin-bottom: 42px;"> - 32GB RAM</p>
                <p class = "price"
                    style="font-weight: bold; margin-bottom: 0px; text-decoration: underline; text-decoration:underline; text-decoration-color:aquamarine ">
                    Price: £3,362.99
                </p><br>
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>

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