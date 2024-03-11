<!--
         ______________________________   Created and designed the Header of the webiste by @AnthonyResuello (Anthony Resuello)     ____________________________________________

    - Created and desgined the header to make it consistent for all pages of the website

-->
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/home_style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <script src="{{ asset('assets/JavaScript/jquery.js') }}"></script>
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

            <div id="basket-container" class="dropdown ml-3.5 align-middle mb-1 p-1.5 text-center rounded-md inline-flex">
                <button id="basket-button" class="btn btn-primary align-middle inline-flex m-1.5" type="button">
                    <div class="inline-flex justify-between">
                    <i class="bx bx-shopping-bag align-middle inline-flex justify-between" aria-hidden="true"></i>
                    <div class="text-[0.6em] mt-1 ml-1 align-middle text-center inline-flex justify-between"> Basket </div>
                    <span class="badge badge-pill badge-danger text-[0.7em] ml-2 bg-red-700 rounded-full w-8 h-8 align-middle justify-center">
                    <h6> {{ count((array) session('basket')) }} </h6>  {{-- keep tracks of number of items has been added to the basket --}}
                </span>
                    </div>


                </button>




                <div class="dropdown-menu mt-6 p-3 rounded-md" id="cartDropdown">
                    <div class="row total-header-section">

                        @php $total = 0.0; @endphp
                        @foreach ((array) session('basket') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'];
                                number_format((float)$total, 2, '.', '' );
                        @endphp  {{-- calculates the total based on the quantity --}}
                        @endforeach
                        <div class="total-section text-left rounded-md">
                            <p>Total: <span class="text-info text-cyan-400 font-bold">£ {{ $total }}</span></p>
                        </div>
                        <div class="w-full h-0.5 bg-gray-200"></div>
                    </div>
                    @if(session('basket'))
                        @foreach(session('basket') as $id => $details)
                            <div class="row cart-detail flex flex-row pb-2 mb-1">
                                <div class=" cart-detail-img">
                                    <img class="mt-1.5 p-1 mr-2.5 h-auto w-[2em] rounded-md" src="{{ $details['images'] }}" alt="Product Image" />
                                </div>
                                <div class=" cart-detail-product flex flex-col">
                                    <p class="text-[0.6em]">{{ $details['product_name'] }}</p>
                                    <span class="text-[0.5em] price text-info text-amber-500 inline-flex"> £ {{ $details['price'] }}</span>
                                    <span class="text-[0.5em] count inline-flex"> Quantity: {{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="text-center checkout inline-block bg-violet-900 w-full mt-2 rounded-md mr-2 align-middle pr-1">
                            <a href="{{ route('basket') }}" class="text-2xl" >View all</a>
                        </div>
                    </div>
                </div>
            </div>

        </nav>
    </section>

    <!--         Hero Section         -->

</header>
