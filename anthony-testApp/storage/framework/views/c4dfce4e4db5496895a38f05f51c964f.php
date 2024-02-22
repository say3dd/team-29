<!-- @KraeBM (Bilal Mohamed) worked on all the backend, JS and blade templating of this page -->
<!-- @ElizavetaMikheeva (Elizaveta Mikheeva) - implemented the front-end (design) of the Products webpage using CSS.  -->
<!DOCTYPE html>
<html> 
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style_sheet.css')); ?>" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >


    <style>
        h1 {
            font-family: "Noto Sans", sans-serif;
            font-size: small;
        }

        h2 {
            font-family: "Noto Sans", sans-serif;
            font-size: small;
        }
    </style>
</head>

<header>
     <!-- Developed and designed the header for this page @AnthonyResuello (Anthony Resuello) -->
  <section class = "navbar-section">
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </section>
 
</header>
<body>
    <h1>
        <div class="title_shape">
            <img class = "title_image" style="im" src=" <?php echo e(asset('assets/images_product/gaming_laptops.jpg')); ?>" >
            <p class = "laptop_title1" style="position: absolute; top: 33%; color: white; text-align: center; left: 5%; ">
                GAMING LAPTOPS
            </p>
            <p class = "title_content" style="position: absolute; top: 43%; color: white; text-align: left; left: 5%; ">
                The most portable and powerful laptops for gamers,<br>
                creators, and professionals
            </p>
        </div>
        </div>

    </h1>
    <h2>
        <!-- This is the code for the layout of product container - where all the product will be shown -->
<div class="background_shape6">
    <section class = "container_for_path_buttons">
        <p class = "path" >
            >> Home >>
            Products >> Gaming
            Laptops
        </p>
        <button class="button_sort">
            <img class = "image_sort" src="<?php echo e(asset('assets/images_product/sort.png')); ?>" alt="" >
        </button>
        <button class="button_filter" id = "filter-button">
            <img class = "image_filter" src="<?php echo e(asset('assets/images_product/filter.png')); ?>" alt="" >
        </button>
    </section>
        <!-- This is the code for the filter of products , linked to the database one is for the brands other is for graphics-->
    <div id="filter-container" class="filters">
        <ul class="filters__list">
            <form action="<?php echo e(URL::current()); ?>" method="GET">
                <li>
                    <p style = "text-decoration: underline"> Brand: </p><br>
                    </li>
                    <!-- for each brand/graphics, it assigns the checked area as empty, once filled with the brands/graphics
                         it selects the item and shows which is needed by its id, name and value. Also has an if statement on whether brand/graphics  is there and checkbrands is checked -->
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                <?php 
                $checkedbrands = [];
                if(isset($_GET['brands']))
                {
                    $checkedbrands=$_GET['brands'];
                }
                ?>
                <li>
            <input id="<?php echo e($brand->brand); ?>" name="brands[]" value="<?php echo e($brand->brand); ?>" type="checkbox"
            <?php if(in_array($brand -> brand, $checkedbrands)): ?>checked="checked" <?php endif; ?>/>
            <label><?php echo e($brand->brand); ?></label>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li>
                <p style = "text-decoration: underline">GPU: </p><br>
                </li>
            <?php $__currentLoopData = $graphics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
            <?php 
            $checkedGPU = [];
            if(isset($_GET['graphics']))
            {
                $checkedGPU=$_GET['graphics'];
            }
            ?>
            <li>

        <input id="<?php echo e($graphic->GPU); ?>" name="graphics[]" value="<?php echo e($graphic->GPU); ?>" type="checkbox" 
        <?php if(in_array($graphic -> GPU, $checkedGPU)): ?> checked="checked" <?php endif; ?>/>
        <label><?php echo e($graphic->GPU); ?></label>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li>
                <button class = "button_apply" > Apply Changes </button>
                <button class = "button_reset" onclick="resetFilters()" > Reset </button>
            </li>

        </ul>

    </form>
    </div>
    <!--Form for hidden fields so the filter request gets sent without a need for a submit button, more smoother functionality -->


<script>
/*Code for the submit button - works by assaigning variables with the id
 and making it so if the filter is active, 
add those selected and when filled and enter is pressed run the funtion */
var button_filter = document.getElementById("filter-button");
var container = document.getElementById("filter-container");
var input = document.querySelectorAll("input");
/* to make the apply button functionable **/
button_filter.onclick = function (e) {
  e.stopPropagation();
  if (container.classList.contains("filters--active")) {
    container.classList.remove("filters--active");
  } else {
    container.classList.add("filters--active");
  }
};

container.onclick = function (e) {
  e.stopPropagation();
};

window.onclick = function () {
  container.classList.remove("filters--active");
};


console.log(input);
/* Here is the code for resetting the filter section - gathers all the data input in checkbox and for each checbox, it removes them all by assinging it false.**/
function resetFilters() {
    var checkboxes = document.querySelectorAll("#filter-container input[type='checkbox']");
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
    });
}
/* Where the area in products will go, and the functionality of the buttons to change pages **/
</script>

<?php echo $__env->yieldContent('productP'); ?>
<!-- Each button assigned an ID which presents a cetain page, leads to user interaction and less clunkiness in code. Also more fluid to use. -->
            <section class = "laptops_container">
                <div class="button_container">
                 <a href="<?php echo e(route('productspage.id' ,['id' =>1])); ?>">
                       <button class="button_to_switch_page" style="margin-top: 25px;"> 1 </button> 
                    </a>
                  <a href="<?php echo e(route('productspage.id', ['id' =>2])); ?>" >
                     <button class="button_to_switch_page" style="margin-top: 25px;"> 2 </button>
                  </a>
                   <a href="<?php echo e(route('productspage.id', ['id'=> 3])); ?>" >
                    <button class="button_to_switch_page" style="margin-top: 25px;"> 3 </button>
                   </a>
                </div>
            </section>    
    </h2>
</div>
</body>
<footer>
     <!-- Developed and designed the footer for this page @AnthonyResuello (Anthony Resuello) -->
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</footer>
</html>
<?php /**PATH C:\Users\aliba\Documents\Git\team-29\anthony-testApp\resources\views/productL.blade.php ENDPATH**/ ?>