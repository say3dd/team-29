<!--
         ______________________________   Created and designed the Header of the webiste by @AnthonyResuello (Anthony Resuello)     ____________________________________________

    - @Anthony Resuello - Created and desgined the header to make it consistent for all pages of the website
    - @Anthony Resuello - Made it responsive for different screen sizes
-->
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/home_style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <script src="{{ asset('assets/JavaScript/jquery.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('favicon.ico') }}">
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
            <a href="{{route('wishlist')}}">Wishlist</a>


            <!--        Fixed the heading so that the login and register is included in the header           -->

            @if (Route::has('login'))

                @auth
                    <a href="{{ route('dashboard') }}"
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
                        <h6> {{ Auth::check() ? count(Auth::user()->basketItems()->get()) ?? 0 : 0 }} </h6> {{-- Keep tracks of number items added to the basket (not quantity)--}}

                </span>
                    </div>


                </button>



                <div class="dropdown-menu mt-6 p-3 rounded-md" id="cartDropdown">
                    <div class="row total-header-section">

                        @php $total = 0.00; @endphp
                        @if (Auth::check())  {{-- Check if user is authenticated --}}
                        @php $basketItems = Auth::user()->basketItems()->with('product')->get();
                        @endphp
                        @foreach ( $basketItems as $item)
                                @php $total += $item->price * $item->quantity; @endphp
                            {{-- Calculate total based on database data --}}
                        @endforeach
                        @endif
                        <div class="total-section text-left rounded-md">
                            <p>Total: <span class="text-info text-cyan-400 font-bold">£ {{ $total }}</span></p>
                        </div>
                        <div class="w-full h-0.5 bg-gray-200"></div>
                    </div>

                    @if (Auth::check() && count($basketItems) > 0)  {{-- Check for user and items --}}
                    @foreach ($basketItems as $item)
                        <div class="row flex flex-row pb-2 mb-1">

                            <div class="cart-detail-img">
                                <img class="mt-1.5 p-1 mr-2.5 h-auto w-[2em] img-thumbnail rounded-md" src=" {{ $item->product_images }}" alt="Product Image" />
                            </div>
                            <div class="flex flex-col">
                                <p class="text-[1rem]">{{ $item->product_name }}</p>
                                <span class="text-[0.5em] price text-info text-amber-500 inline-flex"> £ {{ $item->price }}</span>
                                <span class="text-[0.5em] count inline-flex"> Quantity: {{ $item->quantity }} </span>
                            </div>
                            <div class="inline-flex m-2">
                                <form action="{{ route('basket.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="basket_remove  bg-red-700 inline-block rounded-md"> <i class='bx bx-trash-alt icon-text-width' ></i> </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    @else
                        <p id= "empty" class="empty text-center text-white mt-2">Your basket is currently empty.</p>
                    @endif

                    <div class="row">
                        <div class="text-center checkout inline-block bg-violet-900 w-full mt-2 rounded-md mr-2 align-middle pr-1">
                            <a href="{{ route('basket') }}" class="text-1xl" >View all</a>
                        </div>
                    </div>
                </div>



                {{--                <div class="dropdown-menu mt-6 p-3 rounded-md" id="cartDropdown">--}}
{{--                    <div class="row total-header-section">--}}

{{--                        @php $total = 0.00; @endphp--}}
{{--                        @foreach ((array) session('basket') as $id => $details)--}}
{{--                        @php $total += $details['price'] * $details['quantity'];--}}
{{--                        @endphp  --}}{{-- calculates the total based on the quantity --}}
{{--                        @endforeach--}}
{{--                        <div class="total-section text-left rounded-md">--}}
{{--                            <p>Total: <span class="text-info text-cyan-400 font-bold">£ {{ $total }}</span></p>--}}
{{--                        </div>--}}
{{--                        <div class="w-full h-0.5 bg-gray-200"></div>--}}
{{--                    </div>--}}
{{--                    @if(session('basket'))--}}
{{--                        @foreach(session('basket') as $id => $details)--}}
{{--                            <div class="row cart-detail flex flex-row pb-2 mb-1">--}}
{{--                                <div class=" cart-detail-img">--}}
{{--                                    <img class="mt-1.5 p-1 mr-2.5 h-auto w-[2em] rounded-md" src="{{ $details['images'] }}" alt="Product Image" />--}}
{{--                                </div>--}}
{{--                                <div class=" cart-detail-product flex flex-col">--}}
{{--                                    <p class="text-[0.6em]">{{ $details['product_name'] }}</p>--}}
{{--                                    <span class="text-[0.5em] price text-info text-amber-500 inline-flex"> £ {{ $details['price'] }}</span>--}}
{{--                                    <span class="text-[0.5em] count inline-flex"> Quantity: {{ $details['quantity'] }}</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

{{--                    @endif--}}
{{--                    <div class="row">--}}
{{--                        <div class="text-center checkout inline-block bg-violet-900 w-full mt-2 rounded-md mr-2 align-middle pr-1">--}}
{{--                            <a href="{{ route('basket') }}" class="text-2xl" >View all</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

        </nav>
    </section>

    <!--         Hero Section         -->

</header>
