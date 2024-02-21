<!-- @KraeBM (Bilal Mohamed) worked on all the backend, JS and blade templating of this page -->
<!-- @ElizavetaMikheeva (Elizaveta Mikheeva) - implemented the front-end (design) of the Products webpage using CSS.  -->
<!DOCTYPE html>
<html> 
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="{{asset('assets/css/style_sheet.css')}}" >
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
    @include ('header')
  </section>
 
</header>
<body>
    <h1>
        <div class="title_shape">
            <img class = "title_image" style="im" src=" {{asset('assets/images_product/gaming_laptops.jpg')}}" >
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
            <img class = "image_sort" src="{{asset('assets/images_product/sort.png')}}" alt="" >
        </button>
        <button class="button_filter" id = "filter-button">
            <img class = "image_filter" src="{{asset('assets/images_product/filter.png')}}" alt="" >
        </button>
    </section>
        <!-- This is the code for the filter of products , linked to the database one is for the brands other is for graphics-->
    <div id="filter-container" class="filters">
        <ul class="filters__list">
            <form action="{{URL::current()}}" method="GET">
                <li>
                    <p style = "text-decoration: underline"> Brand: </p><br>
                    </li>
                    <!-- for each brand/graphics, it assigns the checked area as empty, once filled with the brands/graphics
                         it selects the item and shows which is needed by its id, name and value. Also has an if statement on whether brand/graphics  is there and checkbrands is checked -->
                @foreach ($brands as $brand)  
                @php 
                $checkedbrands = [];
                if(isset($_GET['brands']))
                {
                    $checkedbrands=$_GET['brands'];
                }
                @endphp
                <li>
            <input id="{{$brand->brand}}" name="brands[]" value="{{$brand->brand}}" type="checkbox"
            @if(in_array($brand -> brand, $checkedbrands))checked="checked" @endif/>
            <label>{{$brand->brand}}</label>
            </li>
            @endforeach
            <li>
                <p style = "text-decoration: underline">GPU: </p><br>
                </li>
            @foreach ($graphics as $graphic)  
            @php 
            $checkedGPU = [];
            if(isset($_GET['graphics']))
            {
                $checkedGPU=$_GET['graphics'];
            }
            @endphp
            <li>

        <input id="{{$graphic->GPU}}" name="graphics[]" value="{{$graphic->GPU}}" type="checkbox" 
        @if(in_array($graphic -> GPU, $checkedGPU)) checked="checked" @endif/>
        <label>{{$graphic->GPU}}</label>
        </li>
        @endforeach
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

@yield('productP')
<!-- Each button assigned an ID which presents a cetain page, leads to user interaction and less clunkiness in code. Also more fluid to use. -->
            <section class = "laptops_container">
                <div class="button_container">
                 <a href="{{route('productspage.id' ,['id' =>1]) }}">
                       <button class="button_to_switch_page" style="margin-top: 25px;"> 1 </button> 
                    </a>
                  <a href="{{route('productspage.id', ['id' =>2]) }}" >
                     <button class="button_to_switch_page" style="margin-top: 25px;"> 2 </button>
                  </a>
                   <a href="{{route('productspage.id', ['id'=> 3]) }}" >
                    <button class="button_to_switch_page" style="margin-top: 25px;"> 3 </button>
                   </a>
                </div>
            </section>    
    </h2>
</div>
<script>
     /* Saves the users scroll position - if pages refreshed it goes back to it  --> */
     function saveScrollPosition(form) {
     var scrollY = window.scrollY || document.documentElement.scrollTop;
    form.scrollPosition.value = scrollY;
}
/* Improves the position where the user last pressed the "add to basket": button so no need to wait for page to load before moving 
to original position It also makes sure when a user presses the home button/product button, it takes you to the top and not where
 the previous saved position is - this would be frustrating to constantly scroll up after pressing the navbar buttons */

document.addEventListener('DOMContentLoaded', function() {
        @if(session('restoreScroll'))
        var savedScrollPosition = {{ session('scrollPosition', '0') }};
        
        if (savedScrollPosition) {
            window.scrollTo(0, savedScrollPosition);
            @php session()->forget('restoreScroll'); session()->forget('scrollPosition'); @endphp
        }
        @endif
    });   
</script>
</body>
<footer>
     <!-- Developed and designed the footer for this page @AnthonyResuello (Anthony Resuello) -->
    @include ('footer')
</footer>
</html>
