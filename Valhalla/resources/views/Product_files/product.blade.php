<!DOCTYPE html>
<html>
<!-- @ElizavetaMikheeva (Elizaveta Mikheeva) - implemented the front-end (design) of the Product page using CSS. Also used JavaScript to make "View all specification"
     button work, so the user could see all of the specifications about a praticular product  -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="{{asset('assets/css/style_sheet_product_webpage_template.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
</head>
<!-- Developed and designed the header for this page @AnthonyResuello (Anthony Resuello) -->
<section class = "navbar-section">
    @include ('header')
</section>

<body>
<div class="main">
    {{-- Section 1 starts here --}}
    <div class="background_shape1">
        <div class="background_shape_1_2">
            <div class="slideshow-container">
                <div class="slide">
                    <div class="mySlides">
                        <img class="slide_image" src="{{asset('assets/images_product/laptop4.jpg')}}" alt="">
                    </div>
                    <div class="mySlides">
                        <img class="slide_image" src="{{asset('assets/images_product/laptop2.jpg')}}" alt="">
                    </div>
                    <div class="mySlides">
                        <img class="slide_image" src="{{asset('assets/images_product/laptop3.jpg')}}" alt="">
                    </div>
                    <div class="mySlides">
                        <img class="slide_image" src="{{asset('assets/images_product/laptop1.jpg')}}" alt="">
                    </div>
                    <div class="mySlides">
                        <img class="slide_image" src="{{asset('assets/images_product/laptop5.jpg')}}" alt="">
                    </div>
                    <a class="previousSlide" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="nextSlide" onclick="plusSlides(1)">&#10095;</a>
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        <span class="dot" onclick="currentSlide(4)"></span>
                        <span class="dot" onclick="currentSlide(5)"></span>
                    </div>
                </div>
            </div>
        </div>
                <div class="product_information">
                    <p class="product_name">
                        Dell Alienware x16 Gaming Laptop</p>
                    <hr><br>
                    <div class = "product_main_features">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;13th Gen Intel Core i9-13900HK<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;Windows 11 Home<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;NVIDIA® GeForce RTX 4090<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;16", QHD+ 2560x1600, 240Hz<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;32 GB 6000 MT/s RAM, 1 TB SSD<br>
                    </div>
                    <div class="button_view_specification">
                        <button class="button_view_specification" onclick="openMessageBox()">
                            View all specifications </button>
                    </div><br>
                    <hr><br>
                    <div class = "product_price">
                        Price:£3,349.00
                    </div>
                    <br><hr>
                    <div class="buttons">
                        <button class="button_cart"> ADD TO BASKET</button>
                        <button class="button_wish">ADD TO WISHLIST </button>
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
                                    <div class = "all_specification_contents" >
                                        <hr>
                                        Processor: <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;- 13th Gen Intel® Core™ i9-13980HX (36 MB cache, 24 cores, 32 threads,
                                        up to
                                        5.60 GHz
                                        Turbo) <br>
                                        <hr>

                                        Operating System: <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;- Windows 11 Home, English, Dutch, French, German, Italian <br>
                                        <hr>

                                        Graphics Card: <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;- NVIDIA® GeForce RTX™ 4090, 16 GB GDDR6 <br>
                                        <hr>

                                        Display:<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;- 18" QHD+ (2560 x 1600) 165Hz, 3ms, ComfortView Plus, NVIDIA G-SYNC +
                                        DDS,
                                        100%
                                        DCI-P3 <br>
                                        <hr>

                                        Memory: <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;- 32 GB: 2 x 16 GB, DDR5, 4800 MT/s <br>
                                        <hr>

                                        Storage:<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;- 1 TB, M.2, PCIe NVMe, SSD <br>
                                        <hr>

                                        Colour: <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;- Dark Metallic Moon <br>
                                        <hr>

                                        Camera: <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;- 1080p at 30 fps FHD IR camera with Windows Hello support<br>
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
                                    <div class = "all_specification_contents" >
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
                                        &nbsp;&nbsp;&nbsp;&nbsp;- Alienware mSeries keyboard with per-key RGB LED AlienFX lighting,
                                        includes
                                        N-key
                                        rollover
                                        technology<br>
                                        <hr>

                                        Touchpad: <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;- Multi-touch gesture touchpad with integrated scrolling<br>
                                        <hr>

                                        Wireless: <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;- Intel® Killer™ Wi-Fi 6E AX1690i, 2x2, 802.11ax, MU-MIMO, Bluetooth®
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

        {{-- Section 3 begins here --}}
        <div class="container_section3">
            <div class = "text_container">
                <p class="unique_feature_title_title">
                    Total Command </p>
                <p class="unique_feature_content">
                    Control more than ever with the all-new Alienware Command Center.</p>
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
                    AlienFX</p>
                <p class="unique_feature_content">
                    Customise your set up with lighting settings that extend to all your Alienware accessories, as well as
                    keybinds and
                    calibration.
                </p>
                <p class="unique_feature_title">
                    AlienVision</p>
                <p class="unique_feature_content">
                    Toggle monitor-based overlays on/off to help you focus on the targets at hand.
                </p>
            </div>
            <img class="unique_feature4_5_6_7_8_image" src="{{asset('assets/images_product/laptop_specification5.jpg')}}">
        </div>
        {{-- Section 3 ends here --}}
        {{-- Section 4 begins here --}}
        <div class="container_section4">
            <img class="unique_feature9_image" src="{{asset('assets/images_product/laptop_specification4.jpg')}}">
            <p class="unique_feature9">
                Seamless Gaming
            </p>
            <p class="unique_feature9_content">
                The x16 is designed for a premium gaming experience on the go or at home with your Alienware ecosystem,
                so
                enjoy
                features like impressive refresh rates, Cherry mechanical keys and Dolby Atmos® sound no matter where
                you
                game.
            </p>
        </div>
        {{-- Section 4 ends here --}}

        {{-- Section 5 begins here --}}
        <div class="container_section5">
            <div class="title_related_products"> Related Products </div>
            <div class="laptop1">
                <img class="related_product_image" src="{{asset('assets/laptop_images/MSI Titan GT77 HX 13V/msi_Titan_GT77_HX_13V.jpg')}} ">
                <button class="related_product_content">MSI Titan GT77 HX 13V</button>
                <div class ="related_products_spec">
                    <ul>
                        <li> - 13th Gen Intel® Core™ i9-13980HX Processor </li>
                        <li> - GeForce RTX™ 4090 </li>
                        <li> - 128GB RAM </li>
                    </ul>
                </div>
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>
            <div class="laptop1">
                <img class="related_product_image" src="{{asset('assets/laptop_images/Alienware M16/alienware_m16.jpg')}}">
                <button class="related_product_content">Alienware m16</button>
                <div class ="related_products_spec">
                    <ul>
                        <li> - 13th Gen Intel® Core™ i7-13700HX Processor</li>
                        <li> - GeForce RTX™ 4070</li>
                        <li> - 32GB RAM</li>
                    </ul>
                </div>
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>
            <div class="laptop1">
                <img class="related_product_image" src="{{asset('assets/laptop_images/Asus ROG Strix G16 G614/asus_ROG_Strix_G16_G614.jpg')}}">
                <button class="related_product_content">Asus ROG Strix G16 G614</button>
                <div class ="related_products_spec">
                    <ul>
                        <li> - 13th Gen Intel® Core™ i9-13980HX Processor</li>
                        <li> - GeForce RTX™ 4090</li>
                        <li> - 128GB RAM</li>
                    </ul>
                </div>
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>
            <div class="laptop1">
                <img class="related_product_image" src="{{asset('assets/laptop_images/Alienware M18/alienware-m18.jpg ')}}">
                <button class="related_product_content">Alienware m18</button>
                <div class ="related_products_spec">
                    <ul>
                        <li> - 13th Gen Intel® Core™ i7-13700HX Processor</li>
                        <li> - GeForce RTX™ 4080</li>
                        <li> - 32GB RAM</li>
                    </ul>
                </div>
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>
        </div>
    </div>

    <script>



        /*Code for the submit button - works by assaigning variables with the id
 and making it so if the filter is active,
add those selected and when filled and enter is pressed run the function */
        var sortButton = document.getElementById("sort-button");
        var sortContainer = document.getElementById("sorting-container");
        var filterButton = document.getElementById("filter-button");
        var filterContainer = document.getElementById("filter-container");

        // Function to toggle filter container visibility
        filterButton.onclick = function(e) {
            e.stopPropagation();
            // If sort container is active, hide it
            if (sortContainer.classList.contains("sort--active")) {
                sortContainer.classList.remove("sort--active");
            }
            filterContainer.classList.toggle("filters--active");
        };

        // Function to toggle sort container visibility
        sortButton.onclick = function(e) {
            e.stopPropagation();
            if (filterContainer.classList.contains("filters--active")) {
                filterContainer.classList.remove("filters--active");
            }
            sortContainer.classList.toggle("sort--active");
        };

        // Hide containers when clicking outside of the containers
        window.onclick = function(e) {
            if (!filterContainer.contains(e.target) && !filterButton.contains(e.target)) {
                filterContainer.classList.remove("filters--active");
            }
            if (!sortContainer.contains(e.target) && !sortButton.contains(e.target)) {
                sortContainer.classList.remove("sort--active");
            }
        };

        // Reset filter selections
        function resetFilters() {
            var checkboxes = document.querySelectorAll("#filter-container input[type='checkbox']");
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        }

        // Reset sort selections
        function resetSort() {
            var radios = document.querySelectorAll("#sorting-container input[type='radio']");
            radios.forEach(function(radio) {
                radio.checked = false;
            });
        }

        /* Where the area in products will go, and the functionality of the buttons to change pages **/

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
</body>
<!-- Developed and designed the footer for this page @AnthonyResuello (Anthony Resuello) -->
@include('footer')

</html>
