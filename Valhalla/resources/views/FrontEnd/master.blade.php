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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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


{{--       Interactive basket that allows user to tap on the basket
and it will demonstrate the list of items the user has added to their basket     --}}

            <div class="dropdown ml-3.5 align-middle mb-1 p-1.5 text-center rounded-md">
                <button id="basket-button" class="btn btn-primary" type="button">
                    <i class="bx bx-shopping-bag align-middle mt-0.5" aria-hidden="true"></i>

                   <span class="text-[0.5em] mb-2 align-middle text-center"> Basket </span>

                    <span class="badge badge-pill badge-danger text-2xl">
            {{ count((array) session('basket')) }}   {{-- keep tracks of number of items has been added to the basket --}}
        </span>
                </button>

                <div class="dropdown-menu mt-6 p-3 rounded-md" id="cartDropdown">
                    <div class="row total-header-section">
                        <?php
                        $total = 0;
                        foreach ((array) session('basket') as $id => $details) {
                            // $total += $details['price'] * $details['quantity'];   {{-- calculates the total based on the quantity --}}
                        }
                        ?>
                        <div class="total-section text-left rounded-md">
                            <p>Total: <span class="text-info text-cyan-400 font-bold">£ {{ $total }}</span></p>
                        </div>
                        <div class="w-full h-0.5 bg-gray-200"></div>
                    </div>
                     @if(session('basket'))
                    @foreach(session('basket') as $id => $details)
                    <div class="row cart-detail">
                        <div class=" cart-detail-img">
                            <img class="mt-1.5 ml-[0.3rem] w-[4rem] rounded" src="{{ $details['images'] }}" alt="Product Image" />
                        </div>
                        <div class=" cart-detail-product flex flex-col">
                            <p class="text-[0.6em] flex-shrink">{{ $details['product_name'] }}</p>
                            <span class="text-[0.5em] price text-info"> ${{ $details['price'] }}</span>
                            <span class="text-[0.5em] count"> Quantity: {{ $details['quantity'] }}</span>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="row">
                        <div class="text-center checkout">
                            <a href="{{ route('basket') }}" class="btn btn-primary btn-block w-full">View all</a>
                        </div>
                    </div>
                </div>
            </div>









        </nav>



{{--        <div class="dropdown-menu">--}}

        <!--- End of Section  --> </section>

    <!--         Hero Section         -->
    <section id="hero">
        <div class="hero-container">
            @yield('content')
            <div class="hero-info">
                <h1 class ="hero-title">Explore Top-Quality Gaming Gear</h1>
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


    @if(session('success'))
        <div id="flash-success" class="p-5 bg-[#79c753] mx-0 my-5 rounded-[5px]">
            {{session('success')}}
            {{--                <p class=" text-amber-200">Hello, a message</p>--}}
        </div>
    @endif
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
                    <a href="{{route('categories')}}" class="view-laptops-btn">View Products</a>
                </div>
                <div>
                    <img src="{{ asset('assets/images/asus-rog-launched-two-new-high-end.jpg') }}"
                         alt="laptop 3">
                </div>
            </div>
        </div>
        </div>
    </section>





    <section id="best-seller-sction">

        <h1 class = "title-categories">Product Categories</h1>
        <div class="title-line-categories"></div>
        <div id="category-container">

            <div class="Category-1">

                <img src="{{ asset('assets/images/AOC_27G2_PV_-FRONT-large.png') }}" alt="laptop1">

                <div class = "Category-1-bottom">

                    <a href="{{route('categories') }}" class="monitor-btn">
                        <h1>Laptop</h1>
                    </a>
                </div>

            </div>

            <div class="Category-1">
                <img src="{{ asset('assets/images/webprim_apexpro_tkl.png__1200x627_crop-fit_optimize_subsampling-2.png') }}" alt="laptop1">
                <div class = "Category-1-bottom">
                    <a href="{{route('categories' ) }}" class="monitor-btn">
                        <h1>Keyboard</h1></a>
                </div>

            </div>

            <div class="Category-1">
                <img src="{{ asset('assets/images/pro-headset-gallery-1.png') }}" alt="laptop1">
                <div class = "Category-1-bottom">
                    <a href="{{route('categories' ) }}" class="monitor-btn">
                        <h1>Headset</h1></a>
                </div>

            </div>

            <div class="Category-1">
                <img src="{{ asset('assets/images/a60b39dbd9168b865d64254d7d860d20.png') }}" alt="laptop1">
                <div class = "Category-1-bottom">
                    <a href="{{route('categories') }}" class="monitor-btn">
                        <h1>Mouse</h1></a>

                </div>

            </div>

            <div class="Category-1">
                <img src="{{ asset('assets/images/h732.png') }}" alt="laptop1">
                <div class = "Category-1-bottom">
                    <a href="{{route('categories') }}" class="monitor-btn">
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
                                <img src="{{ asset($product->images) }}" alt="{{ $product->product_name }}">
                            </div>
                            <div class="laptop-specs">
                                <h1>{{ $product->product_name }}</h1>
{{--                                <p> {{ $product->processor }}</p>--}}
{{--                                <p>RAM: {{ $product->RAM }}GB</p>--}}
                                <p>Description: {{ $product->product_description }}</p>
                                <h3> £{{ $product->price }}</h3>


                                <!-- @KraeBM (productMohamed) Saves the users scroll position - if pages refreshed it goes back to it  -->
                                <script>
                                    function saveScrollPosition(form) {
                                        var scrollY = window.scrollY || document.documentElement.scrollTop;
                                        form.scrollPosition.value = scrollY;
                                    }
                                </script>
                                 <form action="{{ route('product.getInfo') }}" method="post" onsubmit="saveScrollPosition(this)">
                                    @csrf
                                    <input type="hidden" name="laptopData" value={{$product->product_id}}>
                                    <input type="hidden" name="scrollPosition" id="scrollPosition" value="">

                                     <a href="{{route('add_to_basket', $product->product_id)}}">
                                    <button type="button" role="button" class="buy-product">
                                        Add to Basket
                                    </button>
                                     </a>

                                     <br>
                                </form>
                                <form method="POST" action="{{ route('wishlist.add') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    <button type="submit">Add to Wishlist</button>
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


        const dropdown = document.getElementById("cartDropdown");
        const basketButton = document.getElementById("basket-button");

        basketButton.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent event from propagating to other elements
            dropdown.classList.toggle("dropdown--active"); // Correctly toggle the active class to show/hide the dropdown
        });

    </script>

</body>

</html>
