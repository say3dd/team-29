<!-- @ElizavetaMikheeva (Elizaveta Mikheeva) - implemented the front-end (design) of the Categories webpage using CSS.  -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="{{asset('assets/css/style_sheet_categories.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">


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

<!-- Developed and designed the header for this page @AnthonyResuello (Anthony Resuello) -->
<section class="navbar-section">
    @include ('header')
</section>

<body>
    <div class="background_shape6">
        <div class="topnavigation">
            <form action="{{route('categories.search')}}" class="search-container" method="GET">
                <input type="text" class="form-control" placeholder="Search Valhalla" name="search">
                <button type="submit"> <img src="{{asset('assets/images_categories/search_icon.png')}}"
                        style="height:50px;" class="search_button"> </button>
            </form>
        </div>
        <p class="title_of_category"> SHOP BY CATEGORY </p>

        <div class="categories_all">
            <a href="{{ route('products.index' ,['category' => 'Laptop']) }}">
                <img class="image_categories_laptop" src="{{asset('assets/images_categories/laptops_category2.jpg')}}"
                    style="width:100%">
                <div class="category_text"> Laptops</div>
                <div class="middle">
                    <div class="text">Laptops</div>
                </div>
            </a>
        </div>
        <div class="categories_all">
            <a href="{{ route('products.index' ,['category' => 'Mouse']) }}">
                <img class="image_categories_laptop" src="{{asset('assets/images_categories/mouse.jpg')}}"
                    style="width:100%">
                <div class="category_text"> Mouse</div>
                <div class="middle">
                    <div class="text">Mouse</div>
                </div>
            </a>
        </div>
        <div class="categories_all">
            <a href="{{ route('products.index' ,['category' => 'Keyboard']) }}">
                <img class="image_categories_laptop" src="{{asset('assets/images_categories/keyboard2.jpg')}}"
                    style="width:100%">
                <div class="category_text"> Keyboards</div>
                <div class="middle">
                    <div class="text">Keyboards</div>
                </div>
            </a>
        </div>
        <div class="categories_all">
            <a href="{{ route('products.index' ,['category' => ' Monitor']) }}">
                <img class="image_categories_laptop" src="{{asset('assets/images_categories/monitors.jpg')}}"
                    style="width:100%">
                <div class="category_text"> Monitors</div>
                <div class="middle">
                    <div class="text">Monitors</div>
                </div>
            </a>
        </div>
        <div class="categories_all">
            <a href="{{ route('products.index' ,['category' => 'Headset']) }}">
                <img class="image_categories_laptop" src="{{asset('assets/images_categories/headset.jpg')}}"
                    style="width:100%">
                <div class="category_text"> Headsets</div>
                <div class="middle">
                    <div class="text">Headsets</div>
                </div>
            </a>
        </div>
    </div>


</body>
<!-- Developed and designed the footer for this page @AnthonyResuello (Anthony Resuello) -->
@include('footer')
<script>
    const dropdown = document.getElementById("cartDropdown");
    const basketButton = document.getElementById("basket-button");

    basketButton.addEventListener('click', function(e) {
        e.stopPropagation(); // Prevent event from propagating to other elements
        dropdown.classList.toggle("dropdown--active"); // Correctly toggle the active class to show/hide the dropdown
    });

</script>

