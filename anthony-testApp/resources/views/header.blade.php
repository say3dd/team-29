<header>
            
    <section class="nav-header">
    
        <a href="" class="logo"> <img src="{{asset('assets/images/Screenshot_2023-11-16_030651.png')}}" alt=""></a>
        
        <input type="checkbox" id="check">
        <label for="check" class="menu-icon">
            <i class="bx bx-menu" id="menu"></i>
            <i class="bx bx-x" id="close"></i>
        </label>
        <nav class="navbar">
            <a href="{{url('master')}}">Home</a>
            <a href="{{url('test')}}">Products</a>
            <a href="#">Contact Us</a>

            <!--        Fixed the heading so that the login and register is included in the header           -->

            @if (Route::has('login'))

                @auth
                    <a href="{{ url('/dashboard') }}"
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
            <a href="#" class="cart-icon"><i class="bx bx-shopping-bag"></i> Basket</a>
        </nav>
    </section>
    <!--         Hero Section         -->
   
</header>