<!--
    _______________________________________   Created and designed the Homepage of the webiste by @AnthonyResuello (Anthony Resuello) _______________________________________________

    - @AnthonyResuello - Homepage served as the main template of the overall design of the website (colors and styling).
    - @AnthonyResuello - Designed Using Fimga (Link in the Team doucmentation called (website prototype).
    - @AnthonyResuello - In TP2 I improved the homepage styling and layout. Also, added a category section to display different products.
    - @AnthonyResuello - Styled the add to basket pop-up message when users click on "Add to basket" button and made it responsive on different screens sizes.
    
    - @noramknarf (Francis Moran) - various minor bugfixes
    - @KraeBM (Bilal Mohamed) - Fixed routing for the categories and anything leading to the products side,also did some parts in the Best Sellers side.
-->


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

        <!--  @AnthonyResuello  Added styling for the messages and made it repsonsive   -->
    @includeWhen($errors->any(), '_errors')
    @if(session('success'))
        <div id="flash-success" class="bg-[#79c753] text-bold text-[1.1rem] ">
            {{session('success')}}
            {{--                <p class=" text-amber-200">Hello, a message</p>--}}
        </div>
    @endif
    @if(session('error'))
        <div id="flash-error" class="p-5 bg-red-700 text-bold text-[1.1rem]">
            {{session('error')}}
            <!--I have no idea if this is alright, I was just copying from the success popup-->
        </div>
    @endif


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

                    <a href="{{ route('products.index' ,['category' => 'Monitor']) }}" class="monitor-btn">
                        <h1>Monitors</h1>
                    </a>
                </div>

            </div>

            <div class="Category-1">
                <img src="{{ asset('assets/images/webprim_apexpro_tkl.png__1200x627_crop-fit_optimize_subsampling-2.png') }}" alt="laptop1">
                <div class = "Category-1-bottom">
                    <a href="{{ route('products.index' ,['category' => 'Keyboard']) }}" class="monitor-btn">
                        <h1>Keyboards</h1></a>
                </div>

            </div>

            <div class="Category-1">
                <img src="{{ asset('assets/images/pro-headset-gallery-1.png') }}" alt="laptop1">
                <div class = "Category-1-bottom">
                    <a href="{{ route('products.index' ,['category' => 'Headset']) }}" class="monitor-btn">
                        <h1>Headsets</h1></a>
                </div>

            </div>

            <div class="Category-1">
                <img src="{{ asset('assets/images/a60b39dbd9168b865d64254d7d860d20.png') }}" alt="laptop1">
                <div class = "Category-1-bottom">
                    <a href="{{ route('products.index' ,['category' => 'Mouse']) }}" class="monitor-btn">
                        <h1>Mice</h1></a>

                </div>

            </div>

            <div class="Category-1">
                <img src="{{ asset('assets/images/h732.png') }}" alt="laptop1">
                <div class = "Category-1-bottom">
                    <a href="{{ route('products.index' ,['category' => 'Laptop']) }}" class="monitor-btn">
                        <h1>Laptops</h1></a>
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
{{--                   modified the loop to use forlese instead of foreach, it will give you message if there are no products avaiable --}}
                    @forelse ($randomProducts as $randomproduct)
                        <div class="laptop">
                            <div class = "top-card">
                            <div>
                                <img src="{{ asset($randomproduct->images) }}">
                            </div>
                            </div>

                            <div class="laptop-specs">
                                <a class = "product-info" style= "color: inherit; font-weight: bold; font-size: 1.2rem;" href="{{ $randomproduct->category === 'Laptop' ? route('product.laptopInfo', ['id' =>$randomproduct->product_id]) : route('product.otherInfo', ['id' =>$randomproduct->product_id]) }}">
                                    {{$randomproduct->product_name}}</a>
{{--                                @KraeMo This is used to show the product desc from the DB--}}
                                @foreach($randomproduct->features as $featureName => $featureValue)
                                        <p> {{ $featureName }}:{{ $featureValue }}</p>
                                    @endforeach
                                <h3> £{{ $randomproduct->price }}</h3>
                                <div class = "button-container">
                                 <form action="{{ route('product.getInfo') }}" method="post" onsubmit="saveScrollPosition(this)">
                                    @csrf
                                    <input class="@error('productData')" error-border @enderror" type="hidden" name="productData" value={{$randomproduct->product_id}}>
                                    <input type="hidden" name="scrollPosition" id="scrollPosition">
{{--                                    @error('productData')--}}
{{--                                     <div class="error">--}}
{{--                                         {{ $message }}--}}
{{--                                     </div>--}}
{{--                                     @enderror--}}

                                     <a class="@error('$randomproduct') @enderror" href="{{route('add_to_basket', $randomproduct->product_id)}}">
                                    <button type="button" role="button" class="buy-product">
                                     Add to Basket
                                    </button>
                                     </a>
                                     @error('$randomproduct')
                                     <div class="error">
                                         {{ $message }}
                                     </div>
                                     @enderror

                                     <br>
                                </form>
                                <form method="POST" action="{{ route('wishlist.add') }}">
                                    @csrf
                                    <input class="@error('product_id') error-border @enderror" type="hidden" name="product_id" value="{{ $randomproduct->product_id }}">
                                    <button class="add-wishlist" type="submit"><i class='bx bxs-heart'></i></button>
                                </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h2 class="text-lg">There are no products available yet.</h2>
                    @endforelse
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
<!-- @KraeBM (productMohamed) Saves the users scroll position - if pages refreshed it goes back to it  -->
    <script>

        function saveScrollPosition(form) {
            var scrollY = window.scrollY || document.documentElement.scrollTop;
            form.scrollPosition.value = scrollY;
        }

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
<script>
    const dropdown = document.getElementById("cartDropdown");
    const basketButton = document.getElementById("basket-button");

    basketButton.addEventListener('click', function(e) {
        e.stopPropagation(); // Prevent event from propagating to other elements
        dropdown.classList.toggle("dropdown--active"); // Correctly toggle the active class to show/hide the dropdown
    });

</script>

