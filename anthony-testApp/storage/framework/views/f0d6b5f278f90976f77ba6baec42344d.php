<!-- 
         ______________________________   Created and designed the Header of the webiste by @AnthonyResuello (Anthony Resuello)     ____________________________________________

    - Created and desgined the header to make it consistent for all pages of the website

-->


<header>
            
    <section class="nav-header">
    
        <a href="<?php echo e(route('index')); ?>" class="logo"> <img src="<?php echo e(asset('assets/images/Screenshot_2023-11-16_030651.png')); ?>" alt=""></a>
        
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
            
        </nav>
    </section>
    <!--         Hero Section         -->
   
</header><?php /**PATH C:\Users\aliba\Documents\Git\team-29\anthony-testApp\resources\views/header.blade.php ENDPATH**/ ?>