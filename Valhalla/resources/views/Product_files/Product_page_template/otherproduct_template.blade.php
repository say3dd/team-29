<!-- _______________________________Created and designed the Standardized Product Page Template of the webiste by @AnthonyResuello (Anthony Resuello) ____________________________________________

    - @AnthonyResuello - Designed and implemented the Standardized Product Page using Figma (Link in Trello called Standardize Product Page Template)
    - @AnthonyResuello - Template was used for different products such as monitor, keyboard, headset, and mouse.
    - @AnthonyResuello - Styled the add to basket pop-up message when users click on "Add to basket" button.
     @KraeBM (Bilal Mohamed) - Worked on implementing the DB data of the products selected to show on the screen and within specifications
     @BM786 Basit Ali Mohammad - Worked Review System 
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valhalla</title>
    <link rel="stylesheet" href="{{ asset('assets/css/standardized_product_page.css') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

</head>

<body>
    <!--             Header                      -->

<header>
        @include('header')
</header>

@if (session('success'))
<div id="flash-success" class="bg-[#79c753] text-bold text-[1.1rem] ">
    {{ session('success') }}
    {{--                <p class=" text-amber-200">Hello, a message</p> --}}
</div>
@endif

    <section class=main>

 <!-- Monitor Section -->

        <div id="monitor-container">
            <div class="monitor-card">

                <div>
                    <img src="{{asset($product->images)}}" alt="">

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
                      'Battery Life'=> "/Battery-Life:\s*([^\n,]+)/",
                      'Colour' => "/Colour:\s*([^,\n]+)/"
                  ],
                'Keyboard' =>[
                    'Switches' =>  "/Switches:\s*([^\n,]+)/",
                    'Connectivity' => "/Connectivity:\s*([^\n,]+)/",
                    'Colour' => "/Colour:\s*([^,\n]+)/"
                ],
                  'Monitor' => [
                    'Screen Size' =>  "/Screen-Size:\s*([^\n,]+)/",
                    'Refresh Rate' => "/Refresh-Rate:\s*([^\n,]+)/",
                     'Response Time' => "/Response-Time\s*:\s*([^\n,]+)/",
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
                        <a class="@error('$product') @enderror add-btn"
                        href="{{ route('add_to_basket', $product->product_id) }}">
                        <button type="button" role="button" class="">
                            ADD TO BASKET
                        </button>
                        <a href="#" class="wishlist-btn" id="addToWishlist" data-id="{{ $product->product_id }}">ADD
                            TO WISHLIST</a>
                    </div>
                </div>
            </div>
        </div>

 <!-- Monitor  Section -->
        @if($product->category === 'Monitor')
            <div class = "monitor-feature">
                <div id="monitor-feature-container">
                    <div class="monitor-feature-card">
                        <img  src="{{ asset('assets/Monitor_images/Asus-Gaming-Monitors.png') }}" alt="""> {{--Here when you have the images tell me so i can do the if statements for each product type--}}
                        <div>
                        </div>
                    </div>
                    @endif

                    @if($product->category === 'Mouse')
                        <div class = "monitor-feature">
                            <div id="monitor-feature-container">
                                <div class="monitor-feature-card">
                                    <img  src="{{ asset('assets/Monitor_images/mouse-imagebanner.jpg') }}" alt=""">
                                </div>
                            </div>
                            @endif

                            @if($product->category === 'Keyboard')
                                <div class = "monitor-feature">
                                    <div id="monitor-feature-container">
                                        <div class="monitor-feature-card">
                                            <img  src="{{ asset('assets/Monitor_images/PURIMINI-RGB-product-section_10-1536x591.jpg') }}" alt=""">
                                            <div>
                                            </div>
                                        </div>
                                        @endif

                                        @if($product->category === 'Headset')
                                            <div class = "monitor-feature">
                                                <div id="monitor-feature-container">
                                                    <div class="monitor-feature-card">
                                                        <img  src="{{ asset('assets/Monitor_images/1_EnzVLCIeYh6BRElPs11WQg.png') }}" alt=""">

                                                    </div>
                                                </div>
                                                @endif



                                                <!-- Monitor Features -->
{{-- @KraeMo backend side - I made it so from the specific feautres the selected product has, it will display something diferent , e.g. wired and wireless will have sightly different title features--}}
      <section id="monitor-features">
        <div id="container-feature">
            @if($product->category === 'Monitor')
          <div class="features">
            <div class="top-card">

                <img  src="{{ asset('assets/Monitor_images/71978ixVUsL._AC_SL1500_.jpg') }}" alt=""">

            </div>
            <div class="bottom-card">
              <h2 class="title-feature">Smooth Experience</h2>
              <p class="info-feature">Enhance your gaming experience with cutting-edge technology,
                ensuring smooth gameplay and seamless performance.
                Immerse yourself in every moment with fluid animations, ultra-realistic visuals, and precise.</p>

            </div>

          </div>

{{--Displays product feature text for user to see--}}
            <div class="features">
                <div class="top-card">

                    <img src="{{ asset('assets/Monitor_images/71DIQKo4OZL._AC_SL1500_.jpg') }}" alt=""">
                </div>
                <div class="bottom-card">
                    <h2 class="title-feature">Fast Response Time</h2>
                    <p class="info-feature">
                    Experience unparalleled, lightning-fast performance with a high refresh rate,
                        ensuring a supremely smooth and immersive PC gaming experience.
                        Perfect for demanding gamers seeking  gameplay without any compromise.
                      </p>
                </div>
            </div>

            <div class="features">
                <div class="top-card">
                    <img src="{{ asset('assets/Monitor_images/71dsXYpPL5L._AC_SL1500_.jpg') }}" alt=""">

                </div>
                <div class="bottom-card">
                    <h2 class="title-feature">High Refresh Rate</h2>
                    <p class="info-feature">
                    Experience the pinnacle of gaming with a lightning-fast 240 Hz refresh rate
                        and ultra-quick response time for an exceptionally smooth PC gaming experience.
                        Fully compatible with PS5 at 120 Hz.Whether you're battling foes.</p>

                </div>

            </div>
            <div class="features">
                <div class="top-card">
                    <img src="{{ asset('assets/Monitor_images/61ZG1gImaeL._AC_SL1500_.jpg') }}" alt=""">

                </div>
                <div class="bottom-card">
                    <h2 class="title-feature">Flexible Adjustment</h2>
                    <p class="info-feature">Unlock the full potential of your gaming setup with versatile and customizable adjustments,
                    allowing you to tailor every aspect to your preferences for optimal comfort and precision.
                    Whether you're fine-tuning your monitor's height, angle.
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

                  <img  src="{{ asset('assets/Monitor_images/image_file__97427.jpg') }}" alt=""">

              </div>
              <div class="bottom-card">
                  <h2 class="title-feature">Ergonomic Design </h2>
                  <p class="info-feature">Enjoy extended gaming sessions in comfort with an ergonomically
                      designed gaming mouse. Its shape are optimized to reduce
                      strain on your hand and wrist.Designed with your comfort in mind.
                     </p>

              </div>

          </div>


          <div class="features">
              <div class="top-card">

                  <img src="{{ asset('assets/Monitor_images/razer_deathadder_v3_wired_30kdpi_optical_sensor.jpg') }}" alt=""">
              </div>
              <div class="bottom-card">
                  <h2 class="title-feature">Precision Sensors</h2>
                  <p class="info-feature">
                      Elevate your gameplay with ultra-responsive high precision sensors,
                      offering unparalleled accuracy and tracking speed.
                      Perfect for competitive gaming where every millisecond counts.
                  </p>
              </div>
          </div>

          <div class="features">
              <div class="top-card">
                  <img src="{{ asset('assets/Monitor_images/button_image.jpg') }}" alt=""">

              </div>
              <div class="bottom-card">
                  <h2 class="title-feature">Customize buttons</h2>
                  <p class="info-feature">
                  Transform your gaming experience with customizable buttons that empower you
                   to personalize your gameplay. Dominate the competition with tailored controls,
                    ensuring precise actions.</p>

              </div>
          </div>
          @if(strtolower($mouseType) ==='wired')
                        <div class="features">
                            <div class="top-card">
                                <img src="{{ asset('assets/Monitor_images/816c3NWn39L._AC_UF1000,1000_QL80_.jpg') }}" alt=""">
                            </div>
                            <div class="bottom-card">
                                <h2 class="title-feature">Tangle-free wires</h2>
                                <p class="info-feature">
                                    Experience the ultimate convenience with tangle-free wires,
                                    designed to keep your gaming setup clean and efficient.
                                    Enjoy uninterrupted play and superior durability without the hassle.
                                   </p>
                            </div>
                        </div>
                    @else
                    {{-- Assumes if the choice is wireless --}}
                    <div class="features">
                        <div class="top-card">
                            <img src="{{ asset('assets/Monitor_images/logitech-g703-LIGHTSPEED-Wireless-Mouse-2.jpg') }}" alt=""">
                        </div>
                        <div class="bottom-card">
                            <h2 class="title-feature">Wireless Technology </h2>
                            <p class="info-feature"> Unleash true freedom with our wireless mouse,
                                offering precision and speed without the clutter.
                                Enjoy the flexibility of movement and immersed for an unparalleled gaming experience.
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

                            <img  src="{{ asset('assets/Monitor_images/645aa5a8910e9d2f697d11df-dierya-dk61e-wired-60-mechanical-gaming.jpg') }}" alt=""">

                        </div>
                        <div class="bottom-card">
                            <h2 class="title-feature">Egonomics design</h2>
                            <p class="info-feature">Our keyboard is built to last, featuring robust construction and high-quality materials.
                                It withstands intense gaming sessions,
                                ensuring reliability and longevity in every click. Crafted for enduring durability and built to perfrom.</p>
                        </div>

                    </div>


                    <div class="features">
                        <div class="top-card">

                            <img src="{{ asset('assets/Monitor_images/634ee60305bfdf097677f7c8-havit-60-mechanical-keyboard-mouse.jpg') }}" alt=""">
                        </div>
                        <div class="bottom-card">
                            <h2 class="title-feature">Wired/Wireless</h2>
                            <p class="info-feature">Experience unparalleled stability and zero latency with our wired keyboards,
                                or  Embrace the ultimate gaming freedom with our wireless keyboards.
                                Improving gaming from indoors. Improves your performance in game.
                            </p>
                        </div>
                    </div>

                    <div class="features">
                        <div class="top-card">
                            <img src="{{ asset('assets/Monitor_images/8.jpg') }}" alt=""">

                        </div>
                        <div class="bottom-card">
                            <h2 class="title-feature">Durability</h2>
                            <p class="info-feature">
                            Elevate your typing experience with our ergonomically designed mechanical keyboard, meticulously crafted for tactile
                            feedback, durability as well as reliability. Experience accurate keystrokes in real time imrpoving performance.
                               </p>

                        </div>
                    </div>
                    @if(strtolower($SwitchType) === "red") {{--Add image for red switches--}}
                        <div class="features">
                            <div class="top-card">
                                <img src="{{ asset('assets/Monitor_images/71T2t9o0X2L._AC_UF1000,1000_QL80_.jpg') }}" alt=""">

                            </div>
                            <div class="bottom-card">
                                <h2 class="title-feature">Red Switches</h2>
                                <p class="info-feature">Unlock your gaming potential with red switches,
                                    known for their smooth, fast keystrokes.
                                    Benefit from quick reactions and minimal resistance, boosting your gaming prowess.
                                    Quick and smooth keystrokes imrpoves gameplay.
                                </p>

                            </div>
                        </div>
                    @else
                        {{-- Assumes if the choice is blue switches--}}
                        <div class="features">
                            <div class="top-card">

                                <img src="{{ asset('assets/Monitor_images\4-CH-9109411-NA-Gallery-K70-RGB-PRO-PBT-05.jpg') }}" alt=""">
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

                            <img  src="{{ asset('assets/Monitor_images/71r7e-GFSkL._AC_SL1500_.jpg') }}" alt=""">

                        </div>
                        <div class="bottom-card">
                            <h2 class="title-feature">Surround Sound</h2>
                            <p class="info-feature">Immerse yourself in superior sound with our gaming headset, meticulously engineered for
                             durability and comfort, ensuring you stay focused
                              and immersed in your gaming adventures for hours on end.</p>

                        </div>
                    </div>
                        <div class="features">
                            <div class="top-card">

                                <img src="{{ asset('assets/Monitor_images/ergonomics_headset.jpg') }}" alt=""">
                            </div>
                            <div class="bottom-card">
                                <h2 class="title-feature">Microphone Quality</h2>
                                <p class="info-feature">Our gaming headset boasts a high-quality microphone,
                                ensuring your voice is heard with clarity and precision.
                                Communicate effortlessly, making teamwork seamless and impactful in every game.
                                </p>
                            </div>
                        </div>

                    <div class="features">
                        <div class="top-card">

                            <img src="{{ asset('assets/Monitor_images/mic_headset.jpg') }}" alt=""">
                        </div>
                        <div class="bottom-card">
                            <h2 class="title-feature">Egonomic Design</h2>
                            <p class="info-feature">Crafted with ergonomic design principles in mind, our gaming headset
                                offers unparalleled comfort for extended gaming sessions.
                                Experience crystal-clear audio and deep bass.
                            </p>
                        </div>
                    </div>
                    @if(strtolower($mouseType) ==='wired')
                        <div class="features">
                            <div class="top-card">
                                <img src="{{ asset('assets/Monitor_images/81YKfMGxIBL._AC_SL1500_.jpg') }}" alt=""">

                            </div>
                            <div class="bottom-card">
                                <h2 class="title-feature">Our Headsets</h2>
                                <p class="info-feature"> Experience unparalleled audio fidelity with our wired headphones, meticulously
                         engineered for uncompromising sound quality and reliability.
                         Immerse yourself in crystal-clear audio and deep bass.
                                </p>
                            </div>
                        </div>

                    @else
                        {{-- Assumes if the choice is wireless headphones--}}
                        <div class="features">
                            <div class="top-card">
                                <img src="{{ asset('assets/Monitor_images/81RjUDCOh9L._AC_SL1500_.jpg') }}" alt=""">

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

          {{-- Product-rating --}}
          <div class="rating-system">
              <link rel="stylesheet" href="{{asset('assets/css/rating.css')}}">
              <div class="container">
                  <h4 style="font-size: 28px;">Rate this product</h4>
                  <form method="POST" action="{{ route('ratings.store', $product->product_id)}}">
                      @csrf
                      {{--            <input type="hidden" name="product_id" value="{{ $product->product_id }}">--}}
                      <div class="">
                          <label for="star1" style="font-size:25px; margin-right:17px;">1</label>
                          <label for="star2" style="font-size:25px; margin-right:17px;">2</label>
                          <label for="star3" style="font-size:25px; margin-right:17px;">3</label>
                          <label for="star4" style="font-size:25px; margin-right:17px;">4</label>
                          <label for="star5" style="font-size:25px; margin-right:17px;">5</label>
                      </div>
                      <div class="rating">
                          <input type="radio" id="star1" name="rating" value="1" style="margin-right: 13px;" required />
                          <input type="radio" id="star2" name="rating" value="2" style="margin-right: 13px;" required />
                          <input type="radio" id="star3" name="rating" value="3" style="margin-right: 13px;" required />
                          <input type="radio" id="star4" name="rating" value="4" style="margin-right: 13px;" required />
                          <input type="radio" id="star5" name="rating" value="5" style="margin-right: 13px;" required />
                      </div>
                      <div class="form-group">
                          <p class="font-bold">Write review here: </p>
                          <textarea class="form-control" required name="review" rows="3"></textarea>
                      </div>
                      <x-primary-button type="submit" class="btn btn-primary mt-3">Submit Rating</x-primary-button>
                  </form>
              </div>
          </div>

{{--@KraeBM (Bilal Mohamed) worked on this part on 'related products'--}}
{{-- Displays the related products, all depending on their category  --}}

          <h1 class="related-heading">Related Products</h1>
          <div class="related-title-line"></div>
          <section id="monitor-products">
              <div id="container-product">
                  @foreach($relatedProducts as $relatedProduct)
                      <div class="products">
                          <div class="top-card">
                              <img src="{{ asset($relatedProduct->images) }}">
                          </div>
                          <div class="bottom-card">
                              <h2 class="monitor-title"><a
                                      style="color: inherit; font-weight: bold; font-size: 1.05rem;"
                                      href="{{ $product->category === 'Laptop' ? route('product.laptopInfo', ['id' =>$product->product_id]) : route('product.otherInfo', ['id' =>$product->product_id]) }}">
                                      {{$relatedProduct->product_name}} </a></h2>
                              @foreach($relatedProduct->features as $featureName => $featureValue)
                                  <p><strong>{{ $featureName }}</strong>: {{ $featureValue }}</p>
                              @endforeach
                              <a class=" add-product-btn @error('$randomproduct') @enderror"
                                 href="{{route('add_to_basket', $relatedProduct->product_id)}}">
                                  <button type="button" role="button" class=""> Add to Basket
                                  </button>
                              </a>
                          </div>
                      </div>

                  @endforeach
              </div>
          </section>


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
                    }),
                    redirect: 'manual'  // Prevent automatic redirect
                }).then(response => {
                    if (response.type === 'opaqueredirect') {
                        window.location.href = '/login';
                    } else if (response.ok) {
                        alert('Item added to wishlist successfully');
                        return response.json();
                    } else {
                        throw new Error('Error adding item to wishlist');
                    }
                })
                .then(data => console.log(data))
                .catch((error) => {
                    console.error('Error:', error);
                });
            });
            </script>


    <!--            Footer                      -->
      <footer>
        @include('footer')
      </footer>

</body>

</html>
