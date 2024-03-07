<!--
         ______________________________   Created and designed the Header of the webiste by @AnthonyResuello (Anthony Resuello)     ____________________________________________

    - Created and desgined the header to make it consistent for all pages of the website

-->
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/home_style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<header>

    <section class="nav-header">

        <a href="{{route('index')}}" class="logo"> <img src="{{asset('assets/images/Screenshot_2023-11-16_030651.png')}}" alt=""></a>

        <input type="checkbox" id="check">
        <label for="check" class="menu-icon">
            <i class="bx bx-menu" id="menu"></i>
            <i class="bx bx-x" id="close"></i>
        </label>
        <nav class="navbar">
            <a href="{{route('index')}}">Home</a>
            <a href="{{route('categories')}}">Products</a>
            <a href="{{route('about')}}">About</a>
            <a href="{{route('contactUs')}}">Contact Us</a>


            <!--        Fixed the heading so that the login and register is included in the header           -->

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

            <div class="dropdown ml-3.5 align-middle mb-1 p-1.5 text-center rounded-md">
                <button id="basket-button" class="btn btn-primary" type="button">
                    <i class="bx bx-shopping-bag align-middle mt-0.5" aria-hidden="true"></i>

                    <span class="text-[0.5em] mb-2 align-middle text-center"> Basket </span>

                    <div class="badge badge-pill badge-danger text-[0.7em] bg-red-700 rounded-full w-7 h-7 inline-block">
                        <strong> {{ count((array) session('basket')) }} </strong>  {{-- keep tracks of number of items has been added to the basket --}}
                    </div>
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
    </section>
    <!--         Hero Section         -->

</header>
