<!--

    _______________________________________   Created and designed the Homepage of the webiste by @AnthonyResuello (Anthony Resuello) _______________________________________________

    - Homepage served as the main template of the overall design of the website (colors and styling).
    - Designed Using Fimga (Link in the Team doucmentation called (website prototype).


    @noramknarf (Francis Moran) - various minor bugfixes
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'Master layout')
    </title>
    <link rel="stylesheet" href="{{ asset('assets/css/home_style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />--}}
</head>

<body>
<!--             Header                      -->

<header>

    <section class="nav-header">


        <a href="" class="logo"> <img
                src="{{ asset('assets/images/Screenshot_2023-11-16_030651.png') }}" alt=""></a>
        <input type="checkbox" id="check">
        <label for="check" class="menu-icon">
            <i class="bx bx-menu" id="menu"></i>
            <i class="bx bx-x" id="close"></i>
        </label>
        <nav class="navbar">
            <a href="{{ route('index') }}">Home</a>
            <a href="{{route('categories') }}">Products</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('contactUs') }}">Contact Us</a>


            <!--        Fixed the heading so that the login and register is included in the header           -->


            {{--
                /*
                Login, register and dashboard
                mady by @AbuIsNotHer3 @BravoBoy2 == Abubakarsiddik Mohammed.

                Desgined by @AnthonyResuello
                */

                --}}
            @if (Route::has('login'))

                @auth
                    <a href="{{ url('home') }}"
                       class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                       class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><i
                            class="bx bx-user"></i> Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            @endif

            <!--<a href="#" class="login-text"><i class="bx bx-user"></i> Log in</a>  !-->
            <div id="basket-overlap" class="float-right pr-[30px] w-[30vw] left-[-50px] shadow-[0px_5px_10px_black] p-5 top-[30px]">
                <button type="button" id="btn btn-primary" class="shadow-none mx-0 my-2.5 border-0" data-toggle="basket-overlap">
            <a href="{{route('basket')}}" class="basket-icon">
                <i class="bx bx-shopping-bag" aria-hidden="true"></i>
                <span class="badge badge-pill badge-danger"> Basket {{ count((array) session('basket')) }}</span></a>
                </button>
                <div id="basket-menu" class="w-[30vw] left-[-50px] shadow-[0px_5px_10px_black] p-5 top-[30px]">
                    <div id="total-header-section" class="border-b-[#d2d2d2] border-b border-solid">
                        @php $total = 0 @endphp
                        @foreach((array) session('basket') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div id="total-section" class="col-lg-12 col-sm-12 col-12 text-right ">
                            <p class="mb-5">Total: <span class="text-info">£ {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('basket'))
                        @foreach(session('basket') as $id => $details)
                            <div id="basket-detail" class="px-0 py-[15px] text-xs font-[50] mr-2.5 bg-black">
                                <div id="basket-detail-img" class="col-lg-4 col-sm-4 col-4">
                                    <img class="w-full h-full pl-[15px]" src="{{ asset('img') }}/{{ $details['image'] }}" alt="" />
                                </div>
                                <div id="basket-detail-product" class="col-lg-8 col-sm-8 col-8" >
                                    <p class="text-black font-medium m-0"> {{ $details['product_name'] }}</p>
                                    <span id="price" class="text-xs font-[50] mr-2.5 text-info"> ${{ $details['price'] }}</span>
                                    <span id="count" class="bg-black"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="row">
                        <div id="checkout" class="col-lg-12 col-sm-12 col-12 text-center pt-[15px] border-t-[#d2d2d2] border-t border-solid">
                            <a href="{{ route('basket') }}" class="btn btn-primary btn-block rounded-full"> View All</a>
                        </div>
                    </div>
            </div>
            </div>
        </nav>
        <!--- End of Section  --> </section>

    <!--         Hero Section         -->
    <section id="hero">
        <div class="container">
            @yield('content')
            <div class="hero-info">

                <h1>Explore Top-Quality Gaming Gear</h1>
                <p class="hero-text">
                    Immerse yourself in the world of gaming with Valhalla's collection of top-notch gaming
                    laptops.
                    Unleash the power, speed, and precision you need for an unparalleled gaming experience.
                    Explore our curated selection and elevate your gaming journey to new heights.
                </p>
                </p>
                <a href="{{route('categories')}}" class="view-laptops-btn">View Products</a>
            </div>
        </div>


        <!-- Brands Section -->
        <div class="brands-section">
            <div class="brand-images">
                <img src="{{ asset('assets/images/AMD-Logo.png') }}" alt="Brand 1">
                <img src="{{ asset('assets/images/MSI-Logo-2019.png') }}" alt="Brand 2">
                <img src="{{ asset('assets/images/nvidia logo.png') }}" alt="Brand 3">
                <img src="{{ asset('assets/images/Razer-Logo (1).png') }}" alt="Brand 4">
            </div>
        </div>
    </section>
</header>

<!-- Best seller prodcuts-->
<section class= "main">

    <!-- Services Section -->
    <section class="our-product-section">
        <div id="product-container">
            <div class="box-card">
                <div class = "info">
                    <h1 class="section-heading">High-Performance Gaming Laptops</h1>
                    <p>Explore a world of immersive gaming with our high-performance laptops.
                        Powered by cutting-edge technology, these gaming laptops redefine the gaming experience.
                        The combination of lightning-fast processors, dedicated graphics, and high-refresh-rate displays ensures smooth gameplay,
                        whether you're into intense action games or immersive simulations.
                    </p>
                    <p>They can handle even the most demanding games with ease, and they're also great for other
                        graphics-intensive tasks
                        like video editing, 3D modelling and game development.</p>
                    <a href="{{route('productspage.id' ,['id' =>1]) }}" class="view-laptops-btn">View Products</a>
                </div>
                <div>
                    <img src="{{ asset('assets/images/asus-rog-launched-two-new-high-end.jpg') }}"
                         alt="laptop 3">
                </div>
            </div>
        </div>

    </section>





    <section id="best-seller-section">

        <h1 class = "title-categories">Product Categories</h1>
        <div class="title-line-categories"></div>
        <div id="category-container">

            <div class="Category-1">

                <img src="{{ asset('assets/images/AOC_27G2_PV_-FRONT-large.png') }}" alt="laptop1">

                <div class = "Category-1-bottom">

                    <a href="{{route('productspage.id' ,['id' =>1]) }}" class="monitor-btn">
                        <h1>Laptop</h1>
                    </a>
                </div>

            </div>

            <div class="Category-1">
                <img src="{{ asset('assets/images/webprim_apexpro_tkl.png__1200x627_crop-fit_optimize_subsampling-2.png') }}" alt="laptop1">
                <div class = "Category-1-bottom">
                    <a href="{{route('productspage.id' ,['id' =>1]) }}" class="monitor-btn">
                        <h1>Keyboard</h1></a>
                </div>

            </div>

            <div class="Category-1">
                <img src="{{ asset('assets/images/pro-headset-gallery-1.png') }}" alt="laptop1">
                <div class = "Category-1-bottom">
                    <a href="{{route('productspage.id' ,['id' =>1]) }}" class="monitor-btn">
                        <h1>Headset</h1></a>
                </div>

            </div>

            <div class="Category-1">
                <img src="{{ asset('assets/images/a60b39dbd9168b865d64254d7d860d20.png') }}" alt="laptop1">
                <div class = "Category-1-bottom">
                    <a href="{{route('productspage.id' ,['id' =>1]) }}" class="monitor-btn">
                        <h1>Mouse</h1></a>

                </div>

            </div>

            <div class="Category-1">
                <img src="{{ asset('assets/images/h732.png') }}" alt="laptop1">
                <div class = "Category-1-bottom">
                    <a href="{{route('productspage.id' ,['id' =>1]) }}" class="monitor-btn">
                        <h1>Laptop</h1></a>
                </div>



            </div>
            </div>
    </section>



    <!-- Our Product Section-->
    <section class= "main">


        <section id="best-seller-section">
            <div class="big-card">
                <h1 class="title-products">Best Sellers</h1>
                <div class="title-line-products"></div> <!-- Add this line -->
                <div id="laptop-container">
                    <!-- @say3dd - Code for displaying "Our Laptops" section -->
                    @foreach ($products as $product)
                        <div class="laptop">
                            <div>
                                <img src="{{ asset($product->images) }}" alt="{{$product->product_name}}">
                            </div>
                            <div class="laptop-specs">
                                <h1>{{ $product->product_name }}</h1>
                                <p> {{ $product->product_description }}</p>
{{--                                <p>RAM: {{ $product->RAM }}GB</p>--}}
{{--                                <p>Graphics: {{ $product->GPU }}</p>--}}
                                <h3>£{{ $product->price }}</h3>


                                <!-- @KraeBM (prodcut Mohamed) Saves the users scroll position - if pages refreshed it goes back to it  -->
                                <script>
                                    function saveScrollPosition(form) {
                                        var scrollY = window.scrollY || document.documentElement.scrollTop;
                                        form.scrollPosition.value = scrollY;
                                    }
                                </script>
                                <form action='{{route('product.getInfo')}}' method='post'onsubmit='saveScrollPosition(this)'>
                                    @csrf
                                    <input type="hidden" name="laptopData" value={{$product->product_id}}>
                                    <input type="hidden" name="scrollPosition" id="scrollPosition" value="">
                                    <button class="buy-product"> <a href="{{route('add_to_basket', $product->product_id)}}"> Add to Basket </a><span class="badge badge-pill badge-danger"></span> </button>

                                </form>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </section>
        <footer>
            @include('footer')
        </footer>
    </section>
    <!-- @KraeBM (Bilal Mohamed)  Improves the position where the user last pressed the "add to basket":
        button so no need to wait for page to load before moving to original position
    It also makes sure when a user presses the home button/product button, it takes you to the top and not hwere the previous saved position is - this would be frustrating
to constantly scroll up after pressing the navbar buttons -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('restoreScroll'))
            var savedScrollPosition = {{ session('scrollPosition', '0') }};

            if (savedScrollPosition) {
                window.scrollTo(0, savedScrollPosition);
                @php session()->forget('restoreScroll'); session()->forget('scrollPosition'); @endphp
            }
            @endif
        });

    </script>
</body>

</html>
