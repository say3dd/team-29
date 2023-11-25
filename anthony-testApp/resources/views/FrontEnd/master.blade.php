    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Valhalla</title>
        <link rel="stylesheet" href="{{asset ('assets/css/style.css')}}">

        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
        />
    </head>
    <body>
        <!--             Header                      -->
        
        <header>
            
        <section class="nav-header" >
             <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 background-color:#120045">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
                
            @endif
            <a href="" class="logo"> <img src="{{asset('assets/images/Screenshot_2023-11-16_030651.png')}}" alt=""></a>
            <input type="checkbox" id="check">
            <label for="check" class="menu-icon">
            <i class="bx bx-menu" id="menu"></i>
            <i class="bx bx-x" id="close"></i>
            </label>
            <nav class="navbar">
            <a href="#">Home</a>
            <a href="#">Products</a>
            <a href="#">Contact Us</a>
            <a href="#" class="login-text"><i class="bx bx-user"></i> Log in</a>
            <a href="#" class="cart-icon"
                ><i class="bx bx-shopping-bag"></i> Basket</a>
            </nav>
        </section>

       
        <!--         Hero Section         -->
        <section id="hero">
            <div class="container">
            <div class="hero-info">
        
                <h1>Explore Top-Quality Gaming Gear</h1>
                <p class="hero-text">
                Immerse yourself in the world of gaming with Valhalla's collection of top-notch gaming laptops.
                Unleash the power, speed, and precision you need for an unparalleled gaming experience.
                Explore our curated selection and elevate your gaming journey to new heights.
            </p>
                </p>
                <a href="#" class="view-laptops-btn">View Products</a>
            </div>
            </div>


        <!-- Brands Section -->
        <div class="brands-section">
        <div class="brand-images">
        <img src="{{asset('assets/images/AMD-Logo.png')}}" alt="Brand 1">
        <img src="{{asset('assets/images/MSI-Logo-2019.png')}}" alt="Brand 2">
        <img src="{{asset('assets/images/nvidia logo.png')}}" alt="Brand 3">
        <img src="{{asset('assets/images/Razer-Logo (1).png')}}" alt="Brand 4">
        </div>
        </div>
    </header>
  
        <!-- Best seller prodcuts-->
        <section class= "main">
        <section id="best-seller-sction">
        <div class="big-card">
            <h1 class = "title-sellers">Best Sellers Of  The Week</h1>
            <div class="title-line"></div> <!-- Add this line -->
                <div id="best-seller-container">
                    <div class="laptop">
                        <img src="{{asset('assets/images/laptop1.jpg')}}" alt="laptop 1">
                            <h1>MSI Raider GE78HX</h1>
                            <p>Processor: Intel Core i7</p>
                            <p>RAM: 16GB</p>
                            <p>Storage: 512GB SSD</p>
                            <p>Graphics: NVIDIA RTX 3080</p>
                            <a href="#" class="buy-product">Add to Basket</a>
                    </div>
                    <div class="laptop">

                        <img src="{{asset('assets/images/GU603VI-N4015W_1_Supersize.jpg')}}"  alt="laptop 2">
                            <h1>MSI M100 32FS</h1>
                            <p>Processor: Intel Core i7</p>
                            <p>RAM: 16GB</p>
                            <p>Storage: 512GB SSD</p>
                            <p>Graphics: NVIDIA RTX 2060</p>
                            <a href="#" class="buy-product">Add to Basket</a>
                    </div>
                    <div class="laptop">
                        <img src="{{asset('assets/images/GU603VI-N4015W_1_Supersize.jpg')}}"   alt="laptop 3">
                            <h1>Asus TUF ZQ13X</h1>
                        
                            <p>AMD Ryzen 7</p>
                            <p>RAM: 32GB</p>
                            <p> 1TB SSD</p>
                            <p>Graphics: AMD Radeon RX 5700</p>
                            <a href="#" class="buy-product">Add to Basket</a>
                    </div>
                
                </div>
            </section>

                <!-- Services Section -->
    <section class="our-product-section">
    <div id="product-container">
        <div class="box-card">
        <div class = "info">
            <h1 class="section-heading">High-Performance Gaming Laptops</h1>
            <p>Our high-performance gaming laptops are packed with the latest hardware, 
            including powerful processors, dedicated graphics cards, and high-refresh-rate displays. </p>
            <p>They can handle even the most demanding games with ease, and they're also great for other graphics-intensive tasks
            like video editing, 3D modelling and game development.</p> 
            <a href="#" class="view-laptops-btn">View Products</a>
        </div>
        <div>
            <img src="{{asset('assets/images/asus-rog-launched-two-new-high-end.jpg')}}"
            alt="laptop 3">
        </div>
        </div>
    </div>
    </div>
    </section>
                                <!-- Our Product Section-->
    <section class= "main">
        
    <section id="best-seller-sction">
        <div class="big-card">
        <h1 class = "title-sellers">Our Laptops</h1>
        <div class="title-line"></div> <!-- Add this line -->
            <div id="best-seller-container">
                <div class="laptop">
                    <img src="{{asset('assets/images/laptop1.jpg')}}" alt="laptop 1">
                     
                        <h1>MSI Raider GE78HX</h1>
                        <p>Processor: Intel Core i7</p>
                        <p>RAM: 16GB</p>
                        <p>Storage: 512GB SSD</p>
                        <p>Graphics: NVIDIA RTX 3080</p>
                        <a href="#" class="buy-product">Add to Basket</a>
                </div>
                <div class="laptop">
                    <img src="{{asset('assets/images/GU603VI-N4015W_1_Supersize.jpg')}}"  alt="laptop 2">
                        <h1>MSI M100 32FS</h1>
                        <p>Processor: Intel Core i7</p>
                        <p>RAM: 16GB</p>
                        <p>Storage: 512GB SSD</p>
                        <p>Graphics: NVIDIA RTX 2060</p>
                            <a href="#" class="buy-product">Add to Basket</a>
                </div>
                <div class="laptop">
                    <img src="{{asset('assets/images/30035515_1_Supersize.png')}}"   alt="laptop 3">
                        <h1>Asus TUF ZQ13X</h1>
                    
                        <p>AMD Ryzen 7</p>
                        <p>RAM: 32GB</p>
                        <p> 1TB SSD</p>
                        <p>Graphics: AMD Radeon RX 5700</p>
                        <a href="#" class="buy-product">Add to Basket</a>
                </div>
                
                
            </div>
            <div class="big-card">
                
            <!-- Add this line -->
                    <div id="best-seller-container">
                        <div class="laptop">
                            <img src="{{asset('assets/images/laptop1.jpg')}}" alt="laptop 4">
                                <h1>MSI Raider GE78HX</h1>
                                <p>Processor: Intel Core i7</p>
                                <p>RAM: 16GB</p>
                                <p>Storage: 512GB SSD</p>
                                <p>Graphics: NVIDIA RTX 3080</p>
                                <a href="#" class="buy-product">Add to Basket</a>
                        </div>
                        <div class="laptop">
                            <img src="{{asset('assets/images/GU603VI-N4015W_1_Supersize.jpg')}}"  alt="laptop 5">
                                <h1>MSI M100 32FS</h1>
                                <p>Processor: Intel Core i7</p>
                                <p>RAM: 16GB</p>
                                <p>Storage: 512GB SSD</p>
                                <p>Graphics: NVIDIA RTX 2060</p>
                                <a href="#" class="buy-product">Add to Basket</a>
                        </div>
                        <div class="laptop">
                            <img src="{{asset('assets/images/30035515_1_Supersize.png')}}"   alt="laptop 6">
                                <h1>Asus TUF ZQ13X</h1>
                            
                                <p>AMD Ryzen 7</p>
                                <p>RAM: 32GB</p>
                                <p> 1TB SSD</p>
                                <p>Graphics: AMD Radeon RX 5700</p>
                                <a href="#" class="buy-product">Add to Basket</a>
                        </div>
                    
                        
                    </div>
        </section>


      @include('footer')
          
    </body>
    </html>
