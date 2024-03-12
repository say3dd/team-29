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
         
            <img  src="{{ asset('assets/monitor_images/monitor.png') }}" alt=""">

          </div>
          <div class="monitor-info">
            <h1 class="monitor-heading">BenQ ZOWIE XL2546K</h1>
            <div class="monitor-title-line"></div> 
            <p>240Hz Refresh Rate; TN pANEL</p>
            <p>DyAc Technology </p>
            <p>Black eQualizer; Color Vibrance</p>
            <p>S Switch & Sheilding Hood</p>
            <p>Quick menu with customizable access</p>
            <div class="monitors-title-line"></div> 
            <h2 class="price">Price: £299</h2>
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
         <img  src="{{ asset('assets/monitor_images/monitor-image.png') }}" alt=""">
          <div>
     
      </div>
      </div>

  <!-- Monitor Features -->
 
      <section id="monitor-features">
        <div id="container-feature">
          <div class="features">
            <div class="top-card">
           
                <img  src="{{ asset('assets/monitor_images/1327d96220d45afcf0033605711984ea.png') }}" alt=""">

            </div>
            <div class="bottom-card">
              <h2 class="person-title">DyAc+ Technology</h2>
              <p class="person-info">DyAc+ makes vigorous in-game
                 actions such as spraying less blur. 
                This allows gamers to see the position of crosshair and 
                impact points more clearly.</p>

            </div>

          </div>
        
        
          <div class="features">
            <div class="top-card">
            
            <img  src="{{ asset('assets/monitor_images/my-11134207-7r98v-lnv22dn162rhda.jpg') }}" alt=""">
            </div>
            <div class="bottom-card">
              <h2 class="person-title">0.5 Response Time</h2>
              <p class="person-info">Lightning-fast 240 Hz high refresh rate performance 
                and 0.5~1ms response rate for a smooth PC gaming experience. 120 Hz
                 Compatible for PS5</p>

            </div>
        
          </div>

          <div class="features">
            <div class="top-card">
                <img  src="{{ asset('assets/monitor_images/maxresdefault 1.png') }}" alt=""">

            </div>
            <div class="bottom-card">
              <h2 class="person-title">0.5 Response Time</h2>
              <p class="person-info">Lightning-fast 240 Hz high refresh rate performance 
                and 0.5~1ms response rate for a smooth PC gaming experience. 120 Hz
                 Compatible for PS5.</p>

            </div>

          </div>
          <div class="features">
            <div class="top-card">
                <img  src="{{ asset('assets/monitor_images/image_features.png') }}" alt=""">
       
            </div>
            <div class="bottom-card">
              <h2 class="person-title">Flexible Adjustment</h2>
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