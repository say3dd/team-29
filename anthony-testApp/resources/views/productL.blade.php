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
        <div id="filter-container" class="filters">
            <ul class="filters__list">
                <li>
                    <p style = "text-decoration: underline; font-size: 1.2rem;">Filters </p>
                </li>
                <div class = "filtering_background">
                <li>
                    <p style = "text-decoration: underline"> Graphics: </p><br>
                </li>
                <li>
            <input id="GeForce_RTX_4060" type="checkbox" />
                <label for="GeForce_RTX_4060">NVIDIA GeForce RTX 4060</label>
                </li>
                    <li>
            <input id="GeForce_RTX_4070" type="checkbox" />
                <label for="GeForce_RTX_4070">NVIDIA GeForce RTX 4070</label>
                </li>
                    <li>
            <input id="GeForce_RTX_4080" type="checkbox" />
                <label for="GeForce_RTX_4080">NVIDIA GeForce RTX 4080</label>
                </li>
                    <li>
            <input id="GeForce_RTX_4090" type="checkbox" />
                <label for="GeForce_RTX_4090">NVIDIA GeForce RTX 4090</label>
                </li>
                </div>
                <li>
                    <p></p>
                </li>
                <div class = "filtering_background">
                <li>
                    <p style = "text-decoration: underline"> Processor: </p><br>
                </li>
                    <li>
            <input id="i9-13980HX" type="checkbox" />
                <label for="i9-13980HX">13th Gen Intel® Core™ i9-13980HX </label>
                </li>
                    <li>
            <input id="i9 13900HX" type="checkbox" />
                <label for="i9 13900HX">13th Intel® Core™ i9 13900HX</label>
                </li>
                    <li>
            <input id="i9-12900H" type="checkbox" />
                <label for="i9-12900H">Intel® Core™ i9-12900H</label>
                </li>
                    <li>
            <input id="i7-13700HX" type="checkbox" />
                <label for="i7-13700HX">13th Gen Intel® Core™ i7-13700HX</label>
                </li>
                    <li>
            <input id="ryzen_7_7840HS" type="checkbox" />
                <label for="ryzen_7_7840HS">AMD Ryzen 7 7840HS</label>
                </li>
                    <li>
            <input id="ryzen_9_7940HS" type="checkbox" />
                <label for="ryzen_9_7940HS">AMD Ryzen 9 7940HS</label>
                </li>
                    <li>
            <input id="ryzen_9_7945HX" type="checkbox" />
                <label for="ryzen_9_7945HX">AMD Ryzen 9 7945HX</label>
                </li>
                </div>
                <li>
                    <p></p>
                </li>
                <div class = "filtering_background">
                    <li>
                        <p style = "text-decoration: underline"> Memory (RAM): </p><br>
                </li>
                    <li>
            <input id="RAM_64GB" type="checkbox" />
                <label for="RAM_64GB">64 GB</label>
                </li>
                    <li>
            <input id="RAM_32GB" type="checkbox" />
                <label for="RAM_32GB">32 GB</label>
                </li>
                    <li>
            <input id="RAM_16GB" type="checkbox" />
                <label for="RAM_16GB"> 16 GB</label>
                </li>
            </div>
                <li>
                    <p></p>
                </li>
                <div class = "filtering_background">
             <li>
                <p style = "text-decoration: underline">By Brand: </p><br>
                </li>
                    <li>
            <input id="f5" type="checkbox" />
                <label for="asus">Asus</label>
                </li>
                    <li>
            <input id="acer" type="checkbox" />
                <label for="acer">Acer</label>
                </li>
                    <li>
            <input id="lenovo" type="checkbox" />
                <label for="lenovo"> Lenovo Legion</label>
                </li>
                    <li>
            <input id="alienware" type="checkbox" />
                <label for="alienware"> Dell Alienware</label>
                </li>
                    <li>
            <input id="msi" type="checkbox" />
                <label for="msi"> MSI</label>
                </li>
                    <li>
            <input id="razer" type="checkbox" />
                <label for="razer"> Razer </label>
                </li>
                </div>
                <li>
                    <button class = "button_apply" > Apply Changes </button>
                    <button class = "button_reset" > Reset </button>
                </li>
            </ul>
        </div>
<script>
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
