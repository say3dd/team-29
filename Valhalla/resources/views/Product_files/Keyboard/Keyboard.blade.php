<!-- 


   ______________________________ Created and designed the Keyboard Product Page of the webiste by @AnthonyResuello (Anthony Resuello) ____________________________________________
   
    - Author @AnthonyResuello designed the Monitor Product Page of the webiste using Figma 
    - Author @AnthonyResuello created and designed the Monitor and Keyboard Page 

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
        
            <img  src="{{ asset('assets/Keyboard_images/81yOuAUQAiL_SL1500_1563899022178 1.png') }}" alt=""">

          </div>
          <div class="monitor-info">
            <h1 class="monitor-heading">Steelseries Apex Pro TKL</h1>
            <div class="monitor-title-line"></div> 
            <p>OmniPoint 2.0 Adjustable HyperMagnetic switches</p>
            <p>OLED Smart Display</p>
            <p>Ultimate Adjustability</p>
            <p>Rapid Trigger</p>
            <p>0.5 Response Time</p>
            <div class="monitors-title-line"></div> 
            <h2 class="price">Price: £160</h2>
            <div class="buttons-container">
                <a href="{{url('contactUs')}}" class="add-btn">Add to basket</a>
                <a href="{{url('contactUs')}}" class="wishlist-btn">Add to wishlist</a>
            </div>
        </div>
      </div>
      </div>


 <!-- Monitor  Section -->


      <div class = "monitor-feature">
      <div id="monitor-feature-container">
        <div class="monitor-feature-card">
         <img  src="{{ asset('assets/Keyboard_images/keyboard-features 1.png') }}" alt=""">
          <div>
     
      </div>
      </div>

  <!-- Monitor Features -->
 
      <section id="monitor-features">
        <div id="container-feature">
          <div class="features">
            <div class="top-card">
         
                <img  src="{{ asset('assets/Keyboard_Images/feature1-keyboard 1.png') }}" alt=""">

            </div>
            <div class="bottom-card">
              <h2 class="person-title">Rapid Trigger</h2>
              <p class="person-info">DyAc+ makes vigorous in-game
                 actions such as spraying less blur. 
                This allows gamers to see the position of crosshair and 
                impact points more clearly.</p>

            </div>

          </div>
        
        
          <div class="features">
            <div class="top-card">
        
            <img  src="{{ asset('assets/Keyboard_Images/feature2-keyboard 1.png') }}" alt=""">
            </div>
            <div class="bottom-card">
              <h2 class="person-title">Adjustability</h2>
              <p class="person-info">Lightning-fast 240 Hz high refresh rate performance 
                and 0.5~1ms response rate for a smooth PC gaming experience. 120 Hz
                 Compatible for PS5</p>

            </div>
        
          </div>
        
          <div class="features">
            <div class="top-card">
                <img  src="{{ asset('assets/Keyboard_Images\feature3-keyboard 1.png') }}" alt=""">

            </div>
            <div class="bottom-card">
              <h2 class="person-title">2-in-1 Action Keys</h2>
              <p class="person-info">Lightning-fast 240 Hz high refresh rate performance 
                and 0.5~1ms response rate for a smooth PC gaming experience. 120 Hz
                 Compatible for PS5.</p>

            </div>
   
          </div>
          <div class="features">
            <div class="top-card">
                <img  src="{{ asset('assets/Keyboard_Images\feature4-keyboard 1.png') }}" alt=""">
       
            </div>
            <div class="bottom-card">
              <h2 class="person-title">OLED Smart Display</h2>
              <p class="person-info">Player diversity drives unique monitor height and angle combos, recognizing individual
                 preferences for an optimized gaming setup. Flexible Adjustment
            </p>

            </div>
            
          </div>
          
        </div>
        </div>



        <h1 class="monitor-heading">Related Products</h1>
     <div class="related-title-line"></div> 
        
 

     <section id="monitor-products">
        <div id="container-product">
          <div class="products">
            <div class="top-card">
          
                <img  src="{{ asset('assets/monitor_images/monitors_image1.jpg') }}" alt=""">

            </div>
            <div class="bottom-card">
            <h2 class="monitor-title">MSI Optix 32G27C5</h2>
              <p class="person-info">Display Resolution 2560x1440</p>
              <p class="person-info">Display Size 27"</p>
              <p class="person-info"> Refresh Rate 240Hz</p>
              <p class="person-info"> 0.03 Response Time</p>
              <a href="{{url('contactUs')}}" class="add-product-btn">Add to basket</a>
            </div>

          </div>
    
        
          <div class="products">
            <div class="top-card">
         
            <img  src="{{ asset('assets/monitor_images/GAME-AW2523HF-3.jpg') }}" alt=""">
            </div>
            <div class="bottom-card">
            <h2 class="monitor-title">MSI Optix 32G27C5</h2>
              <p class="person-info">Display Resolution 2560x1440</p>
              <p class="person-info">Display Size 27"</p>
              <p class="person-info"> Refresh Rate 280Hz</p>
              <p class="person-info"> 1ms Response Time</p>
              <a href="{{url('contactUs')}}" class="add-product-btn">Add to basket</a>
            </div>
        
          </div>
          
          <div class="products">
            <div class="top-card">
                <img  src="{{ asset('assets/monitor_images/msi_g27c5_1.jpg') }}" alt=""">

            </div>
            <div class="bottom-card">
            <h2 class="monitor-title">MSI Optix 32G27C5</h2>
    
              <p class="person-info">Display Resolution 2560x1440</p>
              <p class="person-info">Display Size 27"</p>
              <p class="person-info"> Refresh Rate 165z</p>
              <p class="person-info"> 0.5 Response Time</p>
              <a href="{{url('contactUs')}}" class="add-product-btn">Add to basket</a>
            </div>
          
          </div>
          <div class="products">
            <div class="top-card">
                <img  src="{{ asset('assets/monitor_images/3219921_JK2Y.jpg') }}" alt=""">
       
            </div>
            <div class="bottom-card">
            <h2 class="monitor-title">BenQ Mobiuz EX240N</h2>
              <p class="person-info">Display Resolution 1920x1080</p>
              <p class="person-info">Display Size 24"</p>
              <p class="person-info"> Refresh Rate 240Hz</p>
              <p class="person-info"> 0.03 Response Time</p>
              <a href="{{url('contactUs')}}" class="add-product-btn">Add to basket</a>
            </div>
            
          </div>
          
        </div>
        </div>













      </section>
     





     



    <!--            Footer                      -->
      <footer>
        @include('footer')
      </footer>
    
       
   
        
</body>

</html>