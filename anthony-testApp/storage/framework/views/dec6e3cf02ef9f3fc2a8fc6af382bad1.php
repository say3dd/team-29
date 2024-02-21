<!-- @KraeBM (Bilal Mohamed) worked on the blade templating of this website  -->
<!-- @ElizavetaMikheeva (Elizaveta Mikheeva) - implemented the front-end (design) of the Products webpage using CSS  -->


<?php $__env->startSection('productP'); ?>
<!--@noramknarf (Francis Moran) - added functionality to "add to basket" buttons (see ProductController->getInfo()) -->
<!--@say3dd (Mohammed Miah) - Displayed the products from the database -->
<?php $__currentLoopData = $laptops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laptop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="laptop_all">
    <img class="image_all_laptop" src="<?php echo e(asset($laptop->image_path)); ?>" style="transition: 0.3s ease">
    <div class="laptop_all_text">
        <!--@say3dd (Mohammed Miah) Routing to make the user go to the details of an individual product by clicking on the name -->
        <a style= "color: inherit" href="<?php echo e(route('laptops.show', $laptop->product_id)); ?>"> <?php echo e($laptop->laptop_name); ?> </a>
        <p><?php echo e($laptop->processor); ?></p>
        <p><?php echo e($laptop->GPU); ?></p>
    </div>
    <p style="margin-bottom: 42px;">RAM: <?php echo e($laptop->RAM); ?> GB </p>
    <p class="price" style=" font-weight: bold; margin-bottom: 0px; text-decoration: underline;
    text-decoration:underline; text-decoration-color:aquamarine ">Price: £<?php echo e($laptop->price); ?></p>
    <br>

    <form action='<?php echo e(route('product.getInfo')); ?>' method='post'>
        <?php echo csrf_field(); ?>
        <input type="hidden" name="laptopData" value=<?php echo e($laptop->product_id); ?>>
        <button class="button_cart_laptop"> Add to Basket </button>
    </form>
    <!--It took me 8 hours of work just to get this thing to get this data and of course it comes out as a string I can't separate... -->
    <!--productToAdd is the string of data that the function returns, what I need to do is get the id from this and use that to update the basket DB -->


</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('productL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xampp\team-29\anthony-testApp\resources\views/Product_files/products.blade.php ENDPATH**/ ?>