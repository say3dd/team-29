<!-- @KraeBM (Bilal Mohamed) worked on all the backend, JS and blade templating of this page , HTML code and html formatting has been done by @ElizavetaMikheeva  -->
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
  <section class = "navbar-section">
    @include ('header')
  </section>
 
</header>
<body>
    <h1>
        <div class="title_shape">
            <img src=" {{asset('assets/images_product/gaming_laptops.jpg')}}" class = "title_image">
            <div class="title_shape_text"></div>
            <p class = "laptop_title1" style="position: absolute; top: 34%; color: white; text-align: center; left: 5%; ">
                GAMING LAPTOPS
            </p>
            <p class = "title_content" style="position: absolute; top: 44%; color: white; text-align: left; left: 5%; ">
                The most portable and powerful laptops for gamers,<br>
                creators, and professionals
            </p>
        </div>
        </div>

    </h1>
    <h2>
        <!-- This is the code for the layout of product container - where all the product will be shown -->
        <div class="background_shape6">
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
        <!-- This is the code for the filter of products , linked to the database-->
    <div id="filter-container" class="filters">
        <ul class="filters__list">
            <form action="{{URL::current()}}" method="GET">
                <li>
                    <p style = "text-decoration: underline"> Brand: </p><br>
                    </li>
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
/*Code for the submit button - works by assinging variabels with the id
 and making it so if the filter is active, 
add those selected and when filled and enter is pressed run the funtion */
var button_filter = document.getElementById("filter-button");
var container = document.getElementById("filter-container");
var input = document.querySelectorAll("input");

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
</script>
      
                @yield('productP')

                <div class="button_container">
                 <a href="{{route('productspage.id' ,['id' =>1]) }}">
                       <button class="button_to_switch_page" style="margin-top: 19px;"> 1 </button> 
                    </a>
                  <a href="{{route('productspage.id', ['id' =>2]) }}" >
                     <button class="button_to_switch_page" style="margin-top: 200px;"> 2 </button>
                  </a>
                   <a href="{{route('productspage.id', ['id'=> 3]) }}" >
                    <button class="button_to_switch_page" style="margin-top: 19px;"> 3 </button>
                   </a>
                </div>
               
            </div>
    </h2>
</body>
<footer>
    @include ('footer')
</footer>
</html>
