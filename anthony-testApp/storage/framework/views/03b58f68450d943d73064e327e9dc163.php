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
                <?php echo $__env->yieldContent('title', 'Master layout'); ?>
                </title>
            <link rel="stylesheet" href="<?php echo e(asset('assets/css/home_style.css')); ?>">


            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        </head>

        <body>
            <!--             Header                      -->

            <header>

                <section class="nav-header">


                    <a href="" class="logo"> <img
                            src="<?php echo e(asset('assets/images/Screenshot_2023-11-16_030651.png')); ?>" alt=""></a>
                    <input type="checkbox" id="check">
                    <label for="check" class="menu-icon">
                        <i class="bx bx-menu" id="menu"></i>
                        <i class="bx bx-x" id="close"></i>
                    </label>
                    <nav class="navbar">
                        <a href="<?php echo e(route('index')); ?>">Home</a>
                        <a href="<?php echo e(route('productspage.id', ['id' => 1])); ?>">Products</a>
                        <a href="<?php echo e(route('about')); ?>">About</a>
                        <a href="<?php echo e(route('contactUs')); ?>">Contact Us</a>
                        

                        <!--        Fixed the heading so that the login and register is included in the header           -->


                        
                        <?php if(Route::has('login')): ?>

                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(url('home')); ?>"
                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>"
                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><i
                                        class="bx bx-user"></i> Log in</a>

                                <?php if(Route::has('register')): ?>
                                    <a href="<?php echo e(route('register')); ?>"
                                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>

                        <!--<a href="#" class="login-text"><i class="bx bx-user"></i> Log in</a>  !-->
                        <a href="<?php echo e(route('basket')); ?>" class="cart-icon"><i class="bx bx-shopping-bag"></i> Basket</a>
                        <!--Just for the record, idk what I'm doing with this ^ so feel free to clean it up -->
                    </nav>
                <!--- End of Section  --> </section>
                
            <!--         Hero Section         -->
            <section id="hero">
                <div class="container">
                    <?php echo $__env->yieldContent('content'); ?>
                    <div class="hero-info">

                        <h1>Explore Top-Quality Gaming Gear</h1>
                        <p class="hero-text">
                            Immerse yourself in the world of gaming with Valhalla's collection of top-notch gaming
                            laptops.
                            Unleash the power, speed, and precision you need for an unparalleled gaming experience.
                            Explore our curated selection and elevate your gaming journey to new heights.
                        </p>
                        </p>
                        <a href="<?php echo e(route('productspage.id', ['id' => 1])); ?>" class="view-laptops-btn">View Products</a>
                    </div>
                </div>


                <!-- Brands Section -->
                <div class="brands-section">
                    <div class="brand-images">
                        <img src="<?php echo e(asset('assets/images/AMD-Logo.png')); ?>" alt="Brand 1">
                        <img src="<?php echo e(asset('assets/images/MSI-Logo-2019.png')); ?>" alt="Brand 2">
                        <img src="<?php echo e(asset('assets/images/nvidia logo.png')); ?>" alt="Brand 3">
                        <img src="<?php echo e(asset('assets/images/Razer-Logo (1).png')); ?>" alt="Brand 4">
                    </div>
                </div>
        </header>
                

          <!-- Best seller prodcuts-->
          <section class= "main">

      <!-- Services Section -->
     <section class="our-product-section">
                  <div id="product-container">
                    <div class="box-card">
                        <div class = "info">
                            <h1 class="section-heading">High-Performance Gaming Laptops</h1>
                            <p>Our high-performance gaming laptops are packed with the latest hardware,
                                including powerful processors, dedicated graphics cards, and high-refresh-rate displays.
                            </p>
                            <p>They can handle even the most demanding games with ease, and they're also great for other
                                graphics-intensive tasks
                                like video editing, 3D modelling and game development.</p>
                            <a href="<?php echo e(route('productspage.id' ,['id' =>1])); ?>" class="view-laptops-btn">View Products</a>
                        </div>
                        <div>
                            <img src="<?php echo e(asset('assets/images/asus-rog-launched-two-new-high-end.jpg')); ?>"
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
                          
                                <img src="<?php echo e(asset('assets/images/AOC_27G2_PV_-FRONT-large.png')); ?>" alt="laptop1"> 
                                
                                <div class = "Category-1-bottom">
                         
                                 <a href="<?php echo e(route('productspage.id' ,['id' =>1])); ?>" class="monitor-btn">
                                    <h1>Laptop</h1>
                                 </a>
                                </div>  
                         
                            </div>
                          
                            <div class="Category-1">
                                <img src="<?php echo e(asset('assets/images/webprim_apexpro_tkl.png__1200x627_crop-fit_optimize_subsampling-2.png')); ?>" alt="laptop1"> 
                                <div class = "Category-1-bottom">
                                <a href="<?php echo e(route('productspage.id' ,['id' =>1])); ?>" class="monitor-btn">
                                    <h1>Keyboard</h1></a>
                                </div>  
                         
                            </div>
                       
                            <div class="Category-1">
                                <img src="<?php echo e(asset('assets/images/pro-headset-gallery-1.png')); ?>" alt="laptop1"> 
                                <div class = "Category-1-bottom">
                                <a href="<?php echo e(route('productspage.id' ,['id' =>1])); ?>" class="monitor-btn">
                                    <h1>Headset</h1></a>
                                </div>  
                         
                            </div>
                       
                            <div class="Category-1">
                                <img src="<?php echo e(asset('assets/images/a60b39dbd9168b865d64254d7d860d20.png')); ?>" alt="laptop1"> 
                                <div class = "Category-1-bottom">
                                <a href="<?php echo e(route('productspage.id' ,['id' =>1])); ?>" class="monitor-btn">
                                    <h1>Mouse</h1></a>
                                
                                </div>  
                         
                            </div>
                       
                            <div class="Category-1">
                                <img src="<?php echo e(asset('assets/images/h732.png')); ?>" alt="laptop1"> 
                                <div class = "Category-1-bottom">
                                <a href="<?php echo e(route('productspage.id' ,['id' =>1])); ?>" class="monitor-btn">
                                    <h1>Laptop</h1></a>
                                </div>  
                         
                        
                       
                     
                    </div>
            </section>



                <!-- Our Product Section-->
            <section class= "main">

                <section id="best-seller-sction">
                    <div class="big-card">
                        <h1 class = "title-products">Best Sellers</h1>
                        <div class="title-line-products"></div> <!-- Add this line -->
                        <div id="laptop-container">
                            <!-- @say3dd - Code for displaying "Our Laptops" section -->
                            <?php $__currentLoopData = $laptops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laptop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="laptop">
                                    <div class="specs-container">
                                        <img src="<?php echo e(asset($laptop->image_path)); ?>" alt="laptop">
                                        <h1><?php echo e($laptop->laptop_name); ?></h1>
                                        <p>Processor: <?php echo e($laptop->processor); ?></p>
                                        <p>RAM: <?php echo e($laptop->RAM); ?>GB</p>
                                        <p>Graphics: <?php echo e($laptop->GPU); ?></p>
                                        <h3>£<?php echo e($laptop->price); ?></h3>
                                    </div>
                                    <form action='<?php echo e(route('product.getInfo')); ?>' method='post'>
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="laptopData" value=<?php echo e($laptop->product_id); ?>>
                                        <button class="buy-product"> Add to Basket </button>
                                    </form>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>
                    <footer>
                        <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </footer>
                    </section>
        </body>
        </html>   
<?php /**PATH C:\Users\aliba\Documents\Git\team-29\anthony-testApp\resources\views/FrontEnd/master.blade.php ENDPATH**/ ?>