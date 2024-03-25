{{-- @ElizavetaMikheeva (Elizaveta Mikheeva) - implemented the front-end (design) of the Product page using CSS. Also used JavaScript to make "View all specification"--}}
{{--     button work, so the user could see all of the specifications about a praticular product  -->--}}
{{-- @noramknarf (Francis Moran) - Implemented dynamic images -->--}}
{{--@BM786 (Basit Ali Mohammad) - implemented rating & review-->--}}
{{-- @KraeBM (Bilal Mohamed) - Worked on implementing the DB data of the products selected to show on the screen and within specifications--}}


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style_sheet_product_webpage_template.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
</head>
{{-- Developed and designed the header for this page @AnthonyResuello (Anthony Resuello)--}}
<section class = "navbar-section">
    @include ('header')
</section>

<body>
    @includeWhen($errors->any(), '_errors')
    @if (session('success'))
        <div id="flash-success" class="bg-[#79c753] text-bold text-[1.1rem] ">
            {{ session('success') }}
            {{--                <p class=" text-amber-200">Hello, a message</p> --}}
        </div>
    @endif
    @if (session('error'))
        <div id="flash-error" class="p-5 bg-red-700 text-bold text-[1.1rem]">
            {{ session('error') }}
            <!--I have no idea if this is alright, I was just copying from the success popup-->
        </div>
    @endif
    <div class="main">
        {{-- Section 1 starts here --}}

        <div class="background_shape1">
            <div class="background_shape_1_2">
                <div class="slideshow-container">
                    <div class="slide">
                        <!--Loops through all the images passed to the route and adds a slide using the relevant path in the DB
                        NOTE: Only ROG Strix G16 G614 has any images in the table so far because it will take ages to manually add all those images to the seeder-->
                        @if ($images->count() > 0)
                            @foreach ($images as $image)
                                <div class="mySlides">
                                    <img class="slide_image" src="{{ asset($image->path) }}" alt="">
                                </div>
                            @endforeach
                        @else
                            <div class="mySlides">
                                <img class="slide_image" src="{{ asset('assets/images_product/laptop1.jpg') }}"
                                    alt="">
                            </div>
                            <div class="mySlides">
                                <img class="slide_image" src="{{ asset('assets/images_product/laptop2.jpg') }}"
                                    alt="">
                            </div>
                            <div class="mySlides">
                                <img class="slide_image" src="{{ asset('assets/images_product/laptop3.jpg') }}"
                                    alt="">
                            </div>
                            <div class="mySlides">
                                <img class="slide_image" src="{{ asset('assets/images_product/laptop1.jpg') }}"
                                    alt="">
                            </div>
                            <div class="mySlides">
                                <img class="slide_image" src="{{ asset('assets/images_product/laptop5.jpg') }}"
                                    alt="">
                            </div>
                        @endif
                        <a class="previousSlide" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="nextSlide" onclick="plusSlides(1)">&#10095;</a>
                        <div style="text-align:center">
                            <!-- Adds one dot for each image that sends the slideshow to the relevant image
                            I would've put this in the loop above, but I felt this was much more readable for anyone else -->
                            @if ($images->count() > 0)
                                @for ($i = 1; $i <= count($images); $i++)
                                    <span class="dot" onclick="currentSlide({{ $i }})"></span>
                                @endfor
                            @else
                                <span class="dot" onclick="currentSlide(1)"></span>
                                <span class="dot" onclick="currentSlide(2)"></span>
                                <span class="dot" onclick="currentSlide(3)"></span>
                                <span class="dot" onclick="currentSlide(4)"></span>
                                <span class="dot" onclick="currentSlide(5)"></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_information">
                <p class="product_name">
                    {{ $product->product_name }}</p>
                <hr><br>
                <div class = "product_main_features">
                    {{-- Uses regex to find the specific pattern to find the exact data needed to be shown : here its the laptop detials --}}
                    @php
                        $description = $product->product_description;

                        // Regular expressions to find Processor, RAM, and GPU
                        $patterns = [
                            'Processor' => '/Processor: ([^,\n]+)/',
                            'RAM' => '/RAM:\s*([^\n]+)/',
                            'GPU' => '/GPU: ([^,\n]+)/',
                            'Display' => '/Display: ([^,\n]+)/',
                            'Memory' => '/Memory: ([^,\n]+)/',
                            'Storage' => '/Storage: ([^,\n]+)/',
                            'Colour' => '/Colour: ([^,\n]+)/',
                        ];
                        // key refers to the descriptive names (processor,gpu etc), $pattern is the regular expressions, details is what stores the data found
                        $details = [];
                        foreach ($patterns as $key => $pattern) {
                            if (preg_match($pattern, $description, $matches)) {
                                //$matches[1] used for only the specified details matching the regex
                                $details[$key] = $matches[1];
                            }
                        }
                    @endphp
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;{{ $details['Processor'] }}<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;OS: Windows 11<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;GPU: {{ $details['GPU'] }}<br>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;Colour:{{ $details['Colour'] }}<br>
                </div>
                <div class="button_view_specification">
                    <button class="button_view_specification" onclick="openMessageBox()">
                        View all specifications </button>
                </div><br>
                <hr><br>
                <div class = "product_price">
                    £{{ $product->price }}
                </div>
                <br>
                <hr>
                <div class="buttons">
                    {{--                        <button class=""> ADD TO BASKET</button> --}}
                    <a class="@error('$product') @enderror button_cart"
                        href="{{ route('add_to_basket', $product->product_id) }}">
                        <button type="button" role="button" class="">
                            ADD TO BASKET
                        </button>
                    </a>
                    <a href="#" class="button_wish" id="addToWishlist" data-id="{{ $product->product_id }}">ADD
                        TO WISHLIST</a>
                </div>
                {{-- Part of Section 1, for showcasing all of the specification of the product --}}
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="closeMessageBox()">&times;</span>
                        <p>
                        <p class = "specification_title1">
                            Product Features</p>
                        <div class = "columns_container">
                            <div class="column1">
                                <div class = "all_specification_contents">
                                    <hr>
                                    Processor: <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ $details['Processor'] }} <br>
                                    <hr>

                                    Operating System: <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- Windows 11 Home, English, Dutch, French, German, Italian
                                    <br>
                                    <hr>

                                    Graphics Card: <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp; -{{ $details['GPU'] }} <br>

                                    <hr>
                                    Display:<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;-{{ $details['Display'] }} <br>
                                    <hr>

                                    Memory: <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;-{{ $details['Memory'] }}<br>
                                    <hr>

                                    Storage:<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;-{{ $details['Storage'] }}<br>
                                    <hr>

                                    Colour: <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;-{{ $details['Colour'] }}<br>
                                    <hr>

                                    Camera: <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- 1080p at 30 fps FHD IR camera with Windows Hello
                                    support<br>
                                    <hr>

                                    Audio and Speakers: <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- Stereo speakers, 2 W x 2 = 4 W total<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- Realtek ALC3254<br>
                                    <hr>

                                    Slots: <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;-1 SD-card slot<br>
                                    <hr>

                                </div>
                            </div>

                            <div class="column2">
                                <div class = "all_specification_contents">
                                    <hr>

                                    Dimensions & Weight:<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- Height (rear): 25.10 mm (0.99 in.)<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- Height (peak): 26.70 mm (1.05 in.)<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- Height (front): 24.10 mm (0.95 in.)<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- Width: 410.30 mm (16.15 in.)<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- Depth: 319.90 mm (12.59 in.)<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- Weight (maximum): 4.04 kg (8.90 lb)<br>
                                    <hr>


                                    Keyboard: <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- Alienware mSeries keyboard with per-key RGB LED AlienFX
                                    lighting,
                                    includes
                                    N-key
                                    rollover
                                    technology<br>
                                    <hr>

                                    Touchpad: <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- Multi-touch gesture touchpad with integrated scrolling<br>
                                    <hr>

                                    Wireless: <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- Intel® Killer™ Wi-Fi 6E AX1690i, 2x2, 802.11ax, MU-MIMO,
                                    Bluetooth®
                                    wireless
                                    card<br>
                                    <hr>

                                    Primary Battery: <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- 6 Cell, 97 Wh, integrated<br>
                                    <hr>

                                    Battery Life: <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- Up to 5 hours, 47 minutes<br>
                                    <hr>

                                    Power: <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;- 30W Small Form Factor adapter<br>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    {{-- Section 1 ends here --}}

    {{-- Section 2 begins here --}}
    <div class="container_section2">
        <div class = "text_container">
            <p class="unique_feature_title_title">
                Total Command </p>
            <p class="unique_feature_content">
                Take control like never before with the all-new command center.</p>
            <p class="unique_feature_title">
                Presets and overclocking</p>
            <p class="unique_feature_content">
                Maximise your gameplay with performance presets while overclocking capabilities give you the speed you
                need.
            </p>

            <p class="unique_feature_title">
                Performance overlay</p>
            <p class="unique_feature_content">
                Manage and see CPU, GPU, memory and thermals stats without exiting the game.
            </p>
            <p class="unique_feature_title">
                Customize the illumination configurations.</p>
            <p class="unique_feature_content">
                Customize your setup with lighting settings that extend to all your accessories, along with keybinds and
                calibration options.
            </p>
            <p class="unique_feature_title">
                Monitor Overlay Toggle: Focus Control</p>
            <p class="unique_feature_content">
                Toggle monitor-based overlays on/off to help you focus on the targets at hand.
            </p>
        </div>
        <img class="unique_feature4_5_6_7_8_image"
            src="{{ asset('assets/images_product/laptop_specification5.jpg') }}">
    </div>
    {{-- Section 2 ends here --}}
    {{-- Section 3 begins here --}}
    <div class="container_section3">
        <img class="unique_feature9_image" src="{{ asset('assets/images_product/laptop_specification4.jpg') }}">
        <p class="unique_feature9">
            Seamless Gaming
        </p>
        <p class="unique_feature9_content">
            "Crafted to elevate your gaming experience, whether you're on the move or at home, by offering impressive
            refresh rates,
            Cherry mechanical keys, and Dolby Atmos® sound, ensuring enjoyment regardless of your gaming setup."
        </p>
    </div>
    {{-- Section 3 ends here --}}
    {{-- Product-rating --}}
    <div class="rating-system">
        <link rel="stylesheet" href="{{asset('assets/css/rating.css')}}">--
        <h4>Rate this product:</h4>
        <form method="POST" action="{{ route('ratings.store', $product->product_id)}}">
            @csrf
{{--            <input type="hidden" name="product_id" value="{{ $product->product_id }}">--}}
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Very good">5 stars</label>
                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Ok">3 stars</label>
                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Pretty bad">2 stars</label>
                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Very bad">1 star</label>
            </div>
            <div class="form-group">
                <label for="review">Review:</label>
                <textarea class="form-control" name="review" rows="3"></textarea>
            </div>
            <x-primary-button type="submit" class="btn btn-primary">Submit Rating</x-primary-button>
        </form>
    </div>

    {{--   @Bilal Mo  added a randomizer which chooses 4 products from the specific category it is and randomizes it after every refresh --}}
<h1 class="laptop-heading">Related Products</h1>
<div class="related-title-line"></div>
<section id="laptop-products">
    <div id="container-product">
        @foreach ($relatedProducts as $relatedProduct)
            <div class="products">
                <div class="top-card">
                    <img src="{{ asset($relatedProduct->images) }}">
                </div>
                <div class="bottom-card">
                    <h2 class="laptop-title"><a style="color: inherit; font-weight: bold; font-size: 1.05rem;"
                            href="{{ $product->category === 'Laptop' ? route('product.laptopInfo', ['id' => $product->product_id]) : route('product.otherInfo', ['id' => $product->product_id]) }}">
                            {{ $relatedProduct->product_name }} </a></h2>
                    @foreach ($relatedProduct->features as $featureName => $featureValue)
                        <p><strong>{{ $featureName }}</strong>: {{ $featureValue }}</p>
                    @endforeach
                   <a class=" add-product-btn @error('$randomproduct') @enderror" href="{{route('add_to_basket', $relatedProduct->product_id)}}">
                        <button type="button" role="button" class="">   Add to Basket
                        </button>
                    </a>

                </div>
            </div>
        @endforeach
    </div>
</section>
{{-- Section 4 ends here --}}
{{-- Script code --}}
<script>
    // JavaScript functions to show/hide the modal
    function openMessageBox() {
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
    }

    function closeMessageBox() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>
<script>
        document.getElementById('addToWishlist').addEventListener('click', function(event) {
            event.preventDefault();

            var productId = this.getAttribute('data-id');

            fetch('{{ route('wishlist.add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id: productId
                })
            }).then(response => {
                if (response.ok) {
                    alert('Item added to wishlist successfully');
                    return response.json();
                } else {
                    throw new Error('Error: ' + response.statusText);
                }
            })
            .then(data => console.log(data))
            .catch((error) => {
                console.error('Error:', error);
            });
        });
        </script>
</body>
<!--            Footer                      -->
<footer>
    @include('footer')
</footer>

<script>
    const dropdown = document.getElementById("cartDropdown");
    const basketButton = document.getElementById("basket-button");

    basketButton.addEventListener('click', function(e) {
        e.stopPropagation(); // Prevent event from propagating to other elements
        dropdown.classList.toggle(
        "dropdown--active"); // Correctly toggle the active class to show/hide the dropdown
    });
</script>
