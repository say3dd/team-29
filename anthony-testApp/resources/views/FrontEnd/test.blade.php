<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="{{asset('assets/css/style_sheet.css')}}">
</head>
<header>
    @include ('header')
</header>
<body>
    <h1>
        <div class="background_shape1"></div>
        <div class="background_shape_1_2"></div>
        <p style="position: absolute; top: 18%; margin-left: 960px; padding: 15px; color: white; font-size: 2.5vm;">
            Dell Alienware x16 Gaming Laptop</p>
        <p
            style="position: absolute; top: 19%; margin-left: 944px; padding: 15px; color: white; font-size: 38px; font-weight: lighter;">
            ____________________________</p>
        <p
            style="position: absolute; top: 28%; margin-left: 960px; padding: 15px; color: white; font-size: 0.6em; font-weight: lighter;">
            &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;13th Gen Intel Core i9-13900HK<br>
            &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;Windows 11 Home<br>
            &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;NVIDIA® GeForce RTX 4090<br>
            &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;16", QHD+ 2560x1600, 240Hz<br>
            &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;32 GB 6000 MT/s RAM, 1 TB SSD<br><br>
        </p>
        <p
            style="position: absolute; top: 40%; margin-left: 944px; padding: 15px; color: white; font-size: 38px; font-weight: lighter;">
            ____________________________
        </p>
        <p
            style="position: absolute; top: 47%; margin-left: 960px; padding: 15px; color: white; font-size: 34px; font-weight: lighter;">
            Price:
            £3,349.00
        </p>
        <p
            style="position: absolute; top: 53%; margin-left: 980px; padding: 15px; color: white; font-size: 20px;  font-weight: lighter;">
            £2,857.50
            excluding VAT @20%
        </p>
        <p
            style="position: absolute; top: 53%; margin-left: 944px; padding: 15px; color: white; font-size: 38px; font-weight: lighter;">
            ____________________________
        </p>
        <button class="button_cart">
            <img src=" {{asset('assets/images_product/icon_basket.png')}}" alt="" width="20" height="25">
            Add to Basket
        </button>
        <button class="button_wish">
            <img src=" {{asset('assets/images_product/love1.png')}}" alt="" width="25" height="23">
            Add to Wish List
        </button>
        </div>
        <div class="background_shape_image"></div>

        <div class="button_view_specification">
            <button class="button_view_specification" onclick="openMessageBox()"> View
                all specifications </button>
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeMessageBox()">&times;</span>
                <p>
                <p
                    style="font-size: 2.1vw; margin-left: 35px; text-align: left; color: white; line-height: 26px; margin-bottom: 0px;">
                    Product Features</p>
                <div class="columns">
                    <p style="font-size: 0.44em; text-align: left; color: white; line-height: 26px;">
                        __________________________________________________________________ <br>
                        Processor: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- 13th Gen Intel® Core™ i9-13980HX (36 MB cache, 24 cores, 32 threads,
                        up to
                        5.60 GHz
                        Turbo) <br>
                        __________________________________________________________________ <br>

                        Operating System: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Windows 11 Home, English, Dutch, French, German, Italian <br>
                        __________________________________________________________________ <br>

                        Graphics Card: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- NVIDIA® GeForce RTX™ 4090, 16 GB GDDR6 <br>
                        __________________________________________________________________ <br>

                        Display:<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- 18" QHD+ (2560 x 1600) 165Hz, 3ms, ComfortView Plus, NVIDIA G-SYNC +
                        DDS,
                        100%
                        DCI-P3 <br>
                        __________________________________________________________________ <br>

                        Memory: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- 32 GB: 2 x 16 GB, DDR5, 4800 MT/s <br>
                        __________________________________________________________________ <br>

                        Storage:<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- 1 TB, M.2, PCIe NVMe, SSD <br>
                        __________________________________________________________________ <br>

                        __________________________________________________________________ <br>
                        Colour: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Dark Metallic Moon <br>
                        __________________________________________________________________ <br>
                        Ports:<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Left<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1x) RJ-45<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1x) Global headset jack<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1x) Type-A USB 3.2 Gen 1 Port<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1x) Type A USB 3.2 Gen 1 Port w/ PowerShare<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Right<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1x) Type C USB 3.2 Gen 1 Port<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Back<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1x) Power/DC-in Port<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(2x) Type C (Thunderbolt 4.0 , USB 4 Gen 2, 15W
                        (3A/5V)
                        Power
                        Delivery and DisplayPort 1.4)<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1x) Type-A USB 3.2 Gen 1 Port<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1x) HDMI 2.1 Output Port<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1x) mini-DisplayPort<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1x) SD Card slot<br>
                        __________________________________________________________________ <br>
                    </p>
                </div>

                <div class="columns">
                    <p style="font-size: 0.44em; text-align: left; color: white; line-height: 26px; ">
                        Slots: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;-1 SD-card slot<br>
                        __________________________________________________________________ <br>

                        Dimensions & Weight:<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Height (rear): 25.10 mm (0.99 in.)<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Height (peak): 26.70 mm (1.05 in.)<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Height (front): 24.10 mm (0.95 in.)<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Width: 410.30 mm (16.15 in.)<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Depth: 319.90 mm (12.59 in.)<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Weight (maximum): 4.04 kg (8.90 lb)<br>
                        __________________________________________________________________ <br>

                        Camera: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- 1080p at 30 fps FHD IR camera with Windows Hello support<br>
                        __________________________________________________________________ <br>

                        Audio and Speakers: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Stereo speakers, 2 W x 2 = 4 W total<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Realtek ALC3254<br>
                        __________________________________________________________________ <br>

                        Keyboard: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Alienware mSeries keyboard with per-key RGB LED AlienFX lighting,
                        includes
                        N-key
                        rollover
                        technology<br>
                        __________________________________________________________________ <br>

                        Touchpad: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Multi-touch gesture touchpad with integrated scrolling<br>
                        __________________________________________________________________ <br>

                        Wireless: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Intel® Killer™ Wi-Fi 6E AX1690i, 2x2, 802.11ax, MU-MIMO, Bluetooth®
                        wireless
                        card<br>
                        __________________________________________________________________ <br>

                        Primary Battery: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- 6 Cell, 97 Wh, integrated<br>
                        __________________________________________________________________ <br>

                        Battery Life: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- Up to 5 hours, 47 minutes<br>
                        __________________________________________________________________ <br>

                        Power: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;- 30W Small Form Factor adapter<br>
                        __________________________________________________________________ <br>
                    </p>
                    </p>
                </div>
            </div>
        </div>

        <div class="slideshow-container">
            <div class="slide">
                <div class="mySlides">
                    <img src=" {{asset('assets/images_product/laptop4.jpg')}}" style="width: 680px; height: 460px; border-radius: 10px; " alt="">
                </div>
                <div class="mySlides">
                    <img src=" {{asset('assets/images_product/laptop2.jpg')}}" style="width: 680px; height: 460px; border-radius: 10px; " alt="">
                </div>
                <div class="mySlides">
                    <img src=" {{asset('assets/images_product/laptop3.jpg')}}" style="width: 680px; height: 460px; border-radius: 10px; " alt="">
                </div>
                <div class="mySlides">
                    <img src= "{{asset('assets/images_product/laptop1.jpg')}}" style="width: 680px; height: 460px; border-radius: 10px; " alt="">
                </div>
                <div class="mySlides">
                    <img src= " {{asset('assets/images_product/laptop5.jpg')}}" style="width: 680px; height: 460px; border-radius: 10px; " alt="">
                </div>
                <button class="previousSlide" onclick="plusDivs(-1)">&#10094;</button>
                <button class="nextSlide" onclick="plusDivs(1)">&#10095;</button>
            </div>
            <script>
                var slideIndex = 1;
                showDivs(slideIndex);

                function plusDivs(n) {
                    showDivs(slideIndex += n);
                }

                function showDivs(n) {
                    var i;
                    var x = document.getElementsByClassName("mySlides");
                    if (n > x.length) { slideIndex = 1 }
                    if (n < 1) { slideIndex = x.length }
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    x[slideIndex - 1].style.display = "block";
                }
            </script>
        </div>
        </div>
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
        </script>
    </h1>
    <h2>
        <div class="background_shape2"></div>
        <div class="laptop_image_spec">
            <img src=" {{asset('assets/images_product/laptop_specification1.avif')}}"
                style=" position: absolute; margin-left: 142px; margin-top: 43%; border-radius: 1rem;">
            <img src=" {{asset('assets/images_product/laptop_specification2.avif')}}"
                style=" position: absolute; margin-left: 642px; margin-top: 43%; border-radius: 1rem;">
            <img src=" {{asset('assets/images_product/laptop_specification3.avif')}}"
                style=" position: absolute; margin-left: 1132px; margin-top: 43%; border-radius: 1rem;">

            <p style=" position: absolute; margin-top: 55.7%;  margin-left:  76px; width: 350px; height: 155px; padding-right: 80px; padding-left: 80px; padding-top: 50px; padding-bottom: 50px; 
            color: white; text-align: left; font-size: 0.9em;">
                Micro-LED stadium lighting
            </p>
            <p style=" position: absolute; margin-top: 55.7%;  margin-left:  576px; width: 350px; height: 155px; padding-right: 80px; padding-left: 80px; padding-top: 50px; padding-bottom: 50px; 
             color: white; text-align: left; font-size: 0.9em;">
                Per-key lighting
            </p>
            <p style=" position: absolute; margin-top: 55.7%;  margin-left:  1066px; width: 350px; height: 155px; padding-right: 80px; padding-left: 80px; padding-top: 50px; padding-bottom: 50px; 
            color: white; text-align: left; font-size: 0.9em;">

                AlienFX touchpad
            </p>

            <p style=" position: absolute; margin-top: 58.7%;  margin-left:  76px; width: 390px; height: 155px; padding-right: 80px; padding-left: 80px; padding-top: 50px; padding-bottom: 50px; 
         color: white; text-align: left; font-size: 0.9em; font-weight: lighter;">
                Express yourself with bold,
                iconic lightning featuring 100
                micro-LED lights for an
                instantly captivating, bright
                and fluid look.
            </p>
            <p style=" position: absolute; margin-top: 58.7%;  margin-left: 576px; width: 390px; height: 155px; padding-right: 80px; padding-left: 80px; padding-top: 50px; padding-bottom: 50px; 
            color: white; text-align: left; font-size: 0.9em; font-weight: lighter;">
                Customise your gaming
                experience with nearly infinite
                colour effects and
                combinations via the
                Alienware Command Center.
            </p>
            <p style=" position: absolute; margin-top: 58.7%; margin-left: 1066px; width: 390px; height: 155px; padding-right: 80px; padding-left: 80px; padding-top: 50px; padding-bottom: 50px; 
            color: white; text-align: left; font-size: 0.9em; font-weight: lighter;">
                Our multi-touch AlienFX
                touchpad with integrated
                scrolling and customisable
                lighting is back, and 15.5%
                larger in area than the x15’s
                touchpad.
            </p>
        </div>
    </h2>
    <h3>
        <div class="background_shape3">
            <p
                style="position: absolute; top: 3%; color: white; text-align: left; font-size: 1.75em; margin-left: 35px;">
                Total Command </p>
            <p
                style="position: absolute; top: 14%; color: white; text-align: left; font-weight: lighter; font-size: 1.2em; margin-left: 35px;">
                Control more than ever with the all-new Alienware Command Center.</p>
            <p
                style="position: absolute; top: 21.5%; color: white; text-align: left; font-size: 1.2em; margin-left: 35px; text-decoration: underline;">
                Presets and overclocking</p>
            <p
                style="position: absolute; top: 28%; color: white; text-align: left; font-weight:lighter ;font-size: 1.2em; margin-left: 35px; width: 700px;">
                Maximise your gameplay with performance presets while overclocking capabilities give you the speed you
                need.
            </p>
            <p
                style="position: absolute; top: 40%; color: white; text-align: left; font-size: 1.2em; margin-left: 35px; text-decoration: underline;">
                Performance overlay</p>
            <p
                style="position: absolute; top: 47%; color: white; text-align: left; font-weight:lighter ;font-size: 1.2em; margin-left: 35px; width: 700px;">
                Manage and see CPU, GPU, memory and thermals stats without exiting the game.
            </p>
            <p style="position: absolute; top: 59%; color: white; text-align: left; font-size: 1.2em; margin-left: 35px;
            text-decoration: underline;">
                AlienFX</p>
            <p style="position: absolute; top: 65%; color: white; text-align: left; font-weight:lighter ;font-size: 1.2em;
            margin-left: 35px; width: 700px;">
                Customise your set up with lighting settings that extend to all your Alienware accessories, as well as
                keybinds and
                calibration.
            </p>
            <p style="position: absolute; top: 77%; color: white; text-align: left; font-size: 1.2em; margin-left: 35px;
            text-decoration: underline;">
                AlienVision</p>
            <p
                style="position: absolute; top: 84%; color: white; text-align: left; font-weight:lighter ;font-size: 1.2em; margin-left: 35px; width: 700px;">
                Toggle monitor-based overlays on/off to help you focus on the targets at hand.
            </p>
            <img src=" {{asset('assets/images_product/laptop_specification5.avif')}}" style=" position: absolute; margin-left: 802px; margin-top: 8%; border-radius: 1rem;
            width: 43%;">
        </div>
        <div class="background_shape4">
            <img src=" {{asset('assets/images_product/laptop_specification4.avif')}} "
                style=" position: absolute;border-radius: 2rem; width:99.5%; height: 470px;">
            <p style="position: absolute; top: 70%; color: white; text-align: center; font-size: 1.75em; left: 43%; ">
                Seamless Gaming
            </p>
            <p
                style="position: absolute; top: 80%; color: white; text-align: center; font-size: 1.2em; left: 10%; font-weight: lighter; width: 1200px;">
                The x16 is designed for a premium gaming experience on the go or at home with your Alienware ecosystem,
                so
                enjoy
                features like impressive refresh rates, Cherry mechanical keys and Dolby Atmos® sound no matter where
                you
                game.
            </p>
        </div>
    </h3>
    <h4>
        <div class="background_shape5">

            <div class="laptop">
                <img src=" {{asset('assets/images_product/msi_Titan_GT77_HX_13V.jpg')}}"
                    style="width: 170px; height: 150px; border-radius: 2rem; margin: 0;">
                <p style="font-weight:bold; font-size: 1.1rem;">MSI Titan GT77 HX 13V</p>
                <p> - 13th Gen Intel® Core™ i9-13980HX Processor</p>
                <p> - GeForce RTX™ 4090</p>
                <p> - 128GB RAM</p>
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>

            <div class="laptop">
                <img src=" {{asset('assets/images_product/alienware_m16.png')}} "
                    style=" background-color: white;width: 170px; height: 150px; border-radius: 2rem; margin: 0;">
                <p style="font-weight:bold; font-size: 1.1rem;">Alienware m16</p>
                <p> - 13th Gen Intel® Core™ i7-13700HX Processor</p>
                <p> - GeForce RTX™ 4070</p>
                <p> - 32GB RAM</p>
                <button class="button_cart_laptop" style="margin-top: 18px;"> Add to Basket </button>
            </div>

            <div class="laptop">
                <img src=" {{asset('assets/images_product/medion_erazer_X20.webp')}}" style="width: 170px; height: 150px; border-radius: 2rem; margin: 0;">
                <p style="font-weight:bold; font-size: 1.1rem;">Medion Erazer X20</p>
                <p> - 13th Intel® Core™ i9 13900HX Processor</p>
                <p> - GeForce RTX 4070 8GB</p>
                <p> - 32GB RAM</p>
                <button class="button_cart_laptop" style="margin-top: 2px;"> Add to Basket </button>
            </div>

            <div class="laptop">
                <img src=" {{asset('assets/images_product/asus_ROG_Strix_G16_G614.png')}} "
                    style=" background-color: white; width: 170px; height: 150px; border-radius: 2rem; margin: 0;">
                <p style="font-weight:bold; font-size: 1.1rem;">Asus ROG Strix G16 G614</p>
                <p> - 13th Gen Intel® Core™ i9-13980HX Processor</p>
                <p> - GeForce RTX™ 4090</p>
                <p> - 128GB RAM</p>
                <button class="button_cart_laptop"> Add to Basket </button>
            </div>

            <div class="laptop">
                <img src=" {{asset('assets/images_product/alienware_m18.avif ')}} " style=" width: 170px; height: 150px; border-radius: 2rem; margin: 0;">
                <p style="font-weight:bold; font-size: 1.1rem;">Alienware m18</p>
                <p> - 13th Gen Intel® Core™ i7-13700HX Processor</p>
                <p> - GeForce RTX™ 4080</p>
                <p> - 32GB RAM</p>
                <button class="button_cart_laptop" style="margin-top: 19px;"> Add to Basket </button>
            </div>
        </div>
    </h4>
</body>
<footer>
    <div style = "margin-top: 180%;">
        @include('footer')
    </div>
</footer>
</html>