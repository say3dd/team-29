<!--

   _____________________________________ Created and designed the Monitor Product Page of the webiste by @AnthonyResuello (Anthony Resuello) ____________________________________________

    - I designed the Monitor Product Page of the webiste using Figma @AnthonyResuello

   Page Includes :
   - Monitor Product Page of the webiste
   - Monitor Features
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valhalla</title>
    <link rel="stylesheet" href="{{ asset('assets/css/monitor_product.css') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
</head>

<body>
    <!--             Header                      -->

<header>
        @include('header')
</header>


    <section class=main>

 <!-- Monitor Section -->

        <div id="monitor-container">
            <div class="monitor-card">

                <div>
                    <img src="{{$product->image}}" alt=""">

                </div>
                <div class="monitor-info">
                    {{--@BilalMo backend part to show each product type for the individual product page - extract data from DB to product page              --}}
                    <h1 class="monitor-heading">{{$product->product_name}}</h1>
                    <div class="monitor-title-line"></div>
                    @php
                        $description = $product->product_description;

                        // Regular expressions to find Processor, RAM, and GPU
                        $categoryPatterns = [
                  'Mouse' => [
                      'DPI' =>  "/DPI:\s*(\d+)/",
                      'Connectivity' => "/Connectivity:\s*([^\n,]+)/",
                      'Battery Life'=> "/Battery Life:\s*([^\n,]+)/",
                      'Colour' => "/Colour:\s*([^,\n]+)/"
                  ],
                'Keyboard' =>[
                    'Switches' =>  "/Switches:\s*([^\n,]+)/",
                    'Connectivity' => "/Connectivity:\s*([^\n,]+)/",
                    'Colour' => "/Colour:\s*([^,\n]+)/"
                ],
                  'Monitor' => [
                    'Screen Size' =>  "/Screen Size:\s*([^\n,]+)/",
                    'Refresh Rate' => "/Refresh rate:\s*([^\n,]+)/",
                     'Response Time' => "/Response Time\s*:\s*([^\n,]+)/",
                      'Colour' => "/Colour:\s*([^,\n]+)/"

                ],
                  'Headset' => [
                      'Connectivity' => "/Connectivity:\s*([^,\n]+)/",
                      'Colour' => "/Colour:\s*([^,\n]+)/"
                      ]
              ];
                // Get the patterns for the current product category
                      $patterns = $categoryPatterns[$product->category] ?? [];
                      //
                        // key refers to the descriptive names (screen size etc), $patterns is the regular expressions related to the category type, details is what stores the data found
                        $details = [];
                        foreach ($patterns as $key => $pattern) {
                            if (preg_match($pattern, $description, $matches)) {
                                //$matches[1] used for only the specified details matching the regex
                                $details[$key] = $matches[1];
                            }
                        }
                    @endphp

                    {{-- Details for the Mouse individual Product   --}}
                    @if($product->category === 'Mouse')
                        <p>Connectivity: {{$details['Connectivity']}}</p>
                        <p>DPI: {{$details['DPI']}}</p>
                        <p>Battery Life: {{$details['Battery Life'] ?? 'N/A'}}</p>
                        <p>Colour: {{$details['Colour']}}</p>
                    @endif
                    {{--   Details for the Keyboards, individual Product           --}}


                    @if($product->category === 'Keyboard')
                        <p>Switches: {{$details['Switches']}}</p>
                    <p>Connectivity : {{$details['Connectivity']}}</p>
                        <p>Colour: {{$details['Colour']}}</p>
                    @endif
                    {{--   Details for the Monitors, individual Product           --}}

                    @if($product->category === 'Monitor')
                        <p>Screen Size: {{$details['Screen Size']}}</p>
                        <p>Refresh Rate: {{$details['Refresh Rate']}}</p>
                        <p>Response Time: {{$details['Response Time']}}</p>
                        <p>Colour: {{$details['Colour']}}</p>
                    @endif
                    {{--   Details for the Headsets, individual Product           --}}

                    @if($product->category === 'Headset')
                        <p>Connectivity: {{$details['Connectivity']}}</p>
                        <p>Colour: {{$details['Colour']}}</p>
                    @endif
                    <div class="monitors-title-line"></div>
                    <h2 class="price">£{{$product->price}}</h2>
                    <div class="buttons-container">
                        <a href="{{url('contactUs')}}" class="add-btn">ADD TO BASKET</a>
                        <a href="{{url('contactUs')}}" class="wishlist-btn">ADD TO WISHLIST</a>
                    </div>
                </div>
            </div>
        </div>


 <!-- Monitor  Section -->


      <div class = "monitor-feature">
      <div id="monitor-feature-container">
        <div class="monitor-feature-card">
         <img  src="{{ asset('assets/monitor_images/monitor-image.png') }}" alt="""> {{--Here when you have the images tell me so i can do the if statements for each product type--}}
          <div>
      </div>
      </div>

  <!-- Monitor Features -->

      <section id="monitor-features">
        <div id="container-feature">
            @if($product->category === 'Monitor')
          <div class="features">
            <div class="top-card">

                <img  src="{{ asset('assets/monitor_images/1327d96220d45afcf0033605711984ea.png') }}" alt=""">

            </div>
            <div class="bottom-card">
              <h2 class="title-feature">High-grade Technology</h2>
              <p class="info-feature">Our high grade technology makes vigorous in-game
                 actions such as spraying less blurry.
                This allows gamers to see the position of crosshair and
                impact points more clearly.</p>

            </div>

          </div>

{{--Displays product feature text for user to see--}}
            <div class="features">
                <div class="top-card">

                    <img src="{{ asset('assets/monitor_images/my-11134207-7r98v-lnv22dn162rhda.jpg') }}" alt=""">
                </div>
                <div class="bottom-card">
                    <h2 class="title-feature">Fast Response Time</h2>
                    <p class="info-feature">
                        Experience unparalleled, lightning-fast performance with a high refresh rate,
                        ensuring a supremely smooth and immersive PC gaming experience.
                        Perfect for demanding gamers seeking fluid gameplay without any compromise.
                      </p>
                </div>
            </div>

            <div class="features">
                <div class="top-card">
                    <img src="{{ asset('assets/monitor_images/maxresdefault 1.png') }}" alt=""">

                </div>
                <div class="bottom-card">
                    <h2 class="title-feature">High Refresh Rate</h2>
                    <p class="info-feature">
                        Experience the pinnacle of gaming with a lightning-fast 240 Hz refresh rate
                        and ultra-quick response time for an exceptionally smooth PC gaming experience.
                        Fully compatible with PS5 at 120 Hz.</p>

                </div>

            </div>
            <div class="features">
                <div class="top-card">
                    <img src="{{ asset('assets/monitor_images/image_features.png') }}" alt=""">

                </div>
                <div class="bottom-card">
                    <h2 class="title-feature">Flexible Adjustment</h2>
                    <p class="info-feature">Player diversity drives unique monitor height and angle combos, recognizing
                        individual
                        preferences for an optimized gaming setup. Flexible Adjustment
                    </p>

                </div>

            </div>


          @endif
          @php
              $mouseType = $details['Connectivity'] ?? 'Wired';
          @endphp
                {{-- Addng the feature container data for Mouses  --}}
          @if($product->category === 'Mouse')
          <div class="features">
              <div class="top-card">

                  <img  src="{{ asset('assets/monitor_images/1327d96220d45afcf0033605711984ea.png') }}" alt=""">

              </div>
              <div class="bottom-card">
                  <h2 class="title-feature">Ergonomic Design </h2>
                  <p class="info-feature">Enjoy extended gaming sessions in comfort with an ergonomically
                      designed gaming mouse. Its shape and size are optimized to reduce
                      strain on your hand and wrist.</p>

              </div>

          </div>


          <div class="features">
              <div class="top-card">

                  <img src="{{ asset('assets/monitor_images/my-11134207-7r98v-lnv22dn162rhda.jpg') }}" alt=""">
              </div>
              <div class="bottom-card">
                  <h2 class="title-feature">High Precision Sensors</h2>
                  <p class="info-feature">
                      Elevate your gameplay with ultra-responsive high precision sensors,
                      offering unparalleled accuracy and tracking speed.
                      Perfect for competitive gaming where every millisecond counts.
                  </p>
              </div>
          </div>

          <div class="features">
              <div class="top-card">
                  <img src="{{ asset('assets/monitor_images/maxresdefault 1.png') }}" alt=""">

              </div>
              <div class="bottom-card">
                  <h2 class="title-feature">Customizable buttons</h2>
                  <p class="info-feature">
                      Tailor your gaming mouse to fit your playstyle with customizable buttons.
                      Assign complex macro functions effortlessly,
                      enabling quick actions and reactions in game.</p>

              </div>
          </div>
          @if(strtolower($mouseType) ==='wired')
                        <div class="features">
                            <div class="top-card">
                                <img src="{{ asset('assets/monitor_images/maault 1.png') }}" alt=""">
                            </div>
                            <div class="bottom-card">
                                <h2 class="title-feature">Tangle-free wires</h2>
                                <p class="info-feature">
                                    Experience the ultimate convenience with tangle-free wires,
                                    designed to keep your gaming setup neat and efficient.
                                    Enjoy uninterrupted play and superior durability without the hassle.
                                   </p>
                            </div>
                        </div>
                    @else
                    {{-- Assumes if the choice is wireless --}}
                    <div class="features">
                        <div class="top-card">
                            <img src="{{ asset('assets/monitor_images/maxresdefault 1.png') }}" alt=""">
                        </div>
                        <div class="bottom-card">
                            <h2 class="title-feature">Wireless Technology </h2>
                            <p class="info-feature"> Unleash true freedom with our wireless mouse,
                                offering precision and speed without the clutter.
                                Enjoy the flexibility of movement for an unparalleled gaming experience.
                            </p>
                        </div>
                    </div>
                    @endif
                @endif
{{-- Addng the feature container data for keyboards  --}}
                @php
                    $SwitchType = $details['Switches'] ?? 'Red';
                @endphp
                @if($product->category === 'Keyboard')
                    <div class="features">
                        <div class="top-card">

                            <img  src="{{ asset('assets/monitor_images/1327d96220d45afcf0033605711984ea.png') }}" alt=""">

                        </div>
                        <div class="bottom-card">
                            <h2 class="title-feature"> The Best Mechanical Keyboards </h2>
                            <p class="info-feature">Elevate your typing experience with our mechanical keyboard,
                                designed for tactile feedback and durability.
                                Experience accurate keystrokes and unmatched responsiveness in every gaming battle.</p>
                        </div>

                    </div>


                    <div class="features">
                        <div class="top-card">

                            <img src="{{ asset('assets/monitor_images/my-11134207-7r98v-lnv22dn162rhda.jpg') }}" alt=""">
                        </div>
                        <div class="bottom-card">
                            <h2 class="title-feature">Wired/Wireless Keyboards</h2>
                            <p class="info-feature">  Experience unparalleled stability and zero latency with our wired keyboards,
                                or  Embrace the ultimate gaming freedom with our wireless keyboards.
                                Improving gaming from indoors or in any atmosphere.
                            </p>
                        </div>
                    </div>

                    <div class="features">
                        <div class="top-card">
                            <img src="{{ asset('assets/monitor_images/maxresdefault 1.png') }}" alt=""">

                        </div>
                        <div class="bottom-card">
                            <h2 class="title-feature">Tested Durability</h2>
                            <p class="info-feature">
                                Our keyboard is built to last, featuring robust construction and high-quality materials.
                                It withstands intense gaming sessions,
                                ensuring reliability and longevity in every click.
                               </p>

                        </div>
                    </div>
                    @if(strtolower($SwitchType) === "red") {{--Add image for red switches--}}
                        <div class="features">
                            <div class="top-card">
                                <img src="{{ asset('assets/monitor_images/maxresdefault 1.png') }}" alt=""">

                            </div>
                            <div class="bottom-card">
                                <h2 class="title-feature">Red Switches</h2>
                                <p class="info-feature">Unlock your gaming potential with red switches,
                                    known for their smooth, fast keystrokes.
                                    Benefit from quick reactions and minimal resistance, boosting your gaming prowess.
                                </p>

                            </div>
                        </div>
                    @else
                        {{-- Assumes if the choice is blue switches--}}
                        <div class="features">
                            <div class="top-card">

                                <img src="{{ asset('assets/monitor_images/my-11134207-7r98v-lnv22dn162rhda.jpg') }}" alt=""">
                            </div>
                            <div class="bottom-card">
                                <h2 class="title-feature">The Blue Switches </h2>
                                <p class="info-feature">
                                    Enhance your gaming with blue switches,
                                    celebrated for their tactile feedback and audible click.
                                    Experience precise control and satisfying keystrokes,
                                    elevating your gameplay and typing.
                                </p>
                            </div>
                        </div>

                    @endif
                @endif
                {{-- Addng the feature container data for Headsets --}}
                @php
                    $SwitchType = $details['Connectivity'] ?? 'Wired';
                @endphp
                @if($product->category === 'Headset')
                    <div class="features">
                        <div class="top-card">

                            <img  src="{{ asset('assets/monitor_images/1327d96220d45afcf0033605711984ea.png') }}" alt=""">

                        </div>
                        <div class="bottom-card">
                            <h2 class="title-feature"> High-Quality Audio</h2>
                            <p class="info-feature"> Immerse yourself in superior sound with our gaming headset.
                                Experience crystal-clear audio and deep bass,
                                enhancing every in-game detail for a truly immersive experience.</p>

                        </div>

                    </div>


                    <div class="features">
                        <div class="top-card">

                            <img src="{{ asset('assets/monitor_images/my-11134207-7r98v-lnv22dn162rhda.jpg') }}" alt=""">
                        </div>
                        <div class="bottom-card">
                            <h2 class="title-feature">The best Mics</h2>
                            <p class="info-feature">Our gaming headset boasts a high-quality microphone,
                                ensuring your voice is heard with clarity and precision.
                                Communicate effortlessly, making teamwork seamless and impactful in every game.
                            </p>
                        </div>
                    </div>
                    @if(strtolower($mouseType) ==='wired')
                        <div class="features">
                            <div class="top-card">
                                <img src="{{ asset('assets/monitor_images/maxresdefault 1.png') }}" alt=""">

                            </div>
                            <div class="bottom-card">
                                <h2 class="title-feature">Our Headsets</h2>
                                <p class="info-feature"> Experience unmatched audio fidelity and zero latency with our wired headset,
                                    designed for gamers seeking a direct, stable connection for uninterrupted,
                                    high-quality sound.
                                </p>
                            </div>
                        </div>

                    @else
                        {{-- Assumes if the choice is wireless headphones--}}
                        <div class="features">
                            <div class="top-card">
                                <img src="{{ asset('assets/monitor_images/maxresdefault 1.png') }}" alt=""">

                            </div>
                            <div class="bottom-card">
                                <h2 class="title-feature">Our Wireless Headsets</h2>
                                <p class="info-feature">
                                    Embrace unparalleled freedom and exceptional sound quality with our wireless gaming headset.
                                    Enjoy the convenience of cord-free movement,
                                    keeping you immersed and agile in every game.
                                </p>
                            </div>
                        </div>
                    @endif
                    @endif
        </div>

{{-- Displays the related products, all depending on their category  --}}

          <h1 class="monitor-heading">Related Products</h1>
     <div class="related-title-line"></div>
     <section id="monitor-products">
        <div id="container-product">
    @foreach($relatedProducts as $relatedProduct)
                <div class="products">
                    <div class="top-card">
                        <img src="{{ asset($relatedProduct->images) }}">
                    </div>
               <div class="bottom-card">
                 <h2 class="monitor-title"><a style="color: inherit; font-weight: bold; font-size: 1.05rem;"
                               href="{{ $product->category === 'Laptop' ? route('product.laptopInfo', ['id' =>$product->product_id]) : route('product.otherInfo', ['id' =>$product->product_id]) }}">
                           {{$relatedProduct->product_name}} </a></h2>
                   @foreach($relatedProduct->features as $featureName => $featureValue)
                       <p><strong>{{ $featureName }}</strong>: {{ $featureValue }}</p>
                   @endforeach

               </div>
                </div>






                        @endforeach





{{--          <div class="products">--}}
{{--            <div class="top-card">--}}

{{--                <img  src="{{ asset('assets/monitor_images/monitors_image1.jpg') }}" alt=""">--}}

{{--            </div>--}}
{{--            <div class="bottom-card">--}}
{{--            <h2 class="monitor-title">MSI Optix 32G27C5</h2>--}}
{{--              <p class="info-specs">Display Resolution 2560x1440</p>--}}
{{--              <p class="info-specs">Display Size 27"</p>--}}
{{--              <p class="info-specs">Refresh Rate 240Hz</p>--}}
{{--              <p class="info-specs">0.03 Response Time</p>--}}
{{--              <a href="{{url('contactUs')}}" class="add-product-btn">Add to basket</a>--}}
{{--            </div>--}}

{{--          </div>--}}


{{--          <div class="products">--}}
{{--            <div class="top-card">--}}

{{--            <img  src="{{ asset('assets/monitor_images/GAME-AW2523HF-3.jpg') }}" alt=""">--}}
{{--            </div>--}}
{{--            <div class="bottom-card">--}}
{{--            <h2 class="monitor-title">MSI Optix 32G27C5</h2>--}}
{{--              <p>Display Resolution 2560x1440</p>--}}
{{--              <p>Display Size 27"</p>--}}
{{--              <p>Refresh Rate 280Hz</p>--}}
{{--              <p>1ms Response Time</p>--}}
{{--              <a href="{{url('contactUs')}}" class="add-product-btn">Add to basket</a>--}}
{{--            </div>--}}

{{--          </div>--}}

{{--          <div class="products">--}}
{{--            <div class="top-card">--}}
{{--                <img  src="{{ asset('assets/monitor_images/msi_g27c5_1.jpg') }}" alt=""">--}}

{{--            </div>--}}
{{--            <div class="bottom-card">--}}
{{--            <h2 class="monitor-title">MSI Optix 32G27C5</h2>--}}

{{--              <p>Display Resolution 2560x1440</p>--}}
{{--              <p>Display Size 27"</p>--}}
{{--              <p>Refresh Rate 165z</p>--}}
{{--              <p>0.5 Response Time</p>--}}
{{--              <a href="{{url('contactUs')}}" class="add-product-btn">Add to basket</a>--}}
{{--            </div>--}}

{{--          </div>--}}
{{--          <div class="products">--}}
{{--            <div class="top-card">--}}
{{--                <img  src="{{ asset('assets/monitor_images/3219921_JK2Y.jpg') }}" alt=""">--}}

{{--            </div>--}}
{{--            <div class="bottom-card">--}}
{{--            <h2 class="monitor-title">BenQ EX240N</h2>--}}
{{--              <p>Display Resolution 1920x1080</p>--}}
{{--              <p>Display Size 24"</p>--}}
{{--              <p>Refresh Rate 240Hz</p>--}}
{{--              <p>0.03 Response Time</p>--}}
{{--              <a href="{{url('contactUs')}}" class="add-product-btn">Add to basket</a>--}}
{{--            </div>--}}

{{--          </div>--}}

{{--        </div>--}}
        </div>













      </section>










    <!--            Footer                      -->
      <footer>
        @include('footer')
      </footer>




</body>

</html>
