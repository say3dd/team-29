<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valhalla</title>
    <link rel="stylesheet" href="{{ asset('assets/css/about_style.css') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
</head>

<body>
    <!--             Header                      -->

    <header>
        @include('header')
   

               <!-- About Section-->

    <div class="about-section">

      <div class="about-container">
        <div id="image">
      
            <img class = "logo-icon" src="{{ asset('assets/images/logo-img.png') }}" alt=""">
        </div>
        <div class="about-contents">
          <div class="about-text">
            <h1>About <span>Valhalla</span></h1>

            <p>Welcome to Vallhala, where gaming reaches new heights! Immerse
              yourself in the extraordinary world of high-performance gaming
              laptops. Our cutting-edge devices are meticulously crafted with
              the latest hardware, boasting powerful processors, dedicated
              graphics cards, and high-refresh-rate displays.</p>
            <a href="#" class="find-more-btn">Find More Info</a>
          </div>
        </div>
      </div>

    </div>
</header>
    <!--            Footer                      -->
 
        @include('footer')
    
       
   
        
</body>

</html>
