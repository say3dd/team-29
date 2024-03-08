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
<section class ="headers-image">
<header>
{{--    redundant code has been removed --}}
        @include('header')
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
</section>

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
                                <p>{{ $product->product_description }}</p>
                                <h3> £{{ $product->price }}</h3>


                                <!-- @KraeBM (productMohamed) Saves the users scroll position - if pages refreshed it goes back to it  -->
                                <script>
                                    function saveScrollPosition(form) {
                                        var scrollY = window.scrollY || document.documentElement.scrollTop;
                                        form.scrollPosition.value = scrollY;
                                    }
                                </script>
                                <div class = "button-container">
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
                                    <button class="buy-product" type="submit">Add to Wishlist</button>
                                </form>
                                </div>
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
