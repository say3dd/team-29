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

            <p>Welcome to Valhalla, where gaming reaches new heights! Immerse
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

    <!-- Why Choose Us?  Section -->
    <section class="Choose_Us_Section">
      <h2 id="choose_us_title">Why Choose Us ?</h2>

      <div class="choose-row">
        <div class="about-image">
          <img class="about-icons"
            src
            alt>
        </div>
        <div class="about-info">
          <h2 class = "choose-title">Peak Performance</h2>
          <p>
            Dive into the world of gaming excellence on our e-commerce platform.
            Explore our exclusive collection of high-performance laptops,
            made to elevate your gaming experiences. Immerse in gaming
            excellence with powerful laptops.
          </p>
        </div>

     

        <div class="about-info">
          <h2 class = "choose-title">Versatility</h2>
          <p>
            Whether it's daily tasks, personal use, or work-related duties, our
            versatile laptops are your perfect companions. Experience
            reliability in every click, ensuring seamless computing for your
            everyday needs and purposes.
          </p>
        </div>

     

        <div class="about-info">
          <h2 class = "choose-title">Innovation</h2>

          <p>
            Our comprehensive range of laptops is curated to cater to the
            diverse needs of professionals in the corporate world. Find the
            perfect balance of power and portability to elevate your
            professional endeavors.

          </p>
        </div>
      </div>
    </section>

    <section class=main>

      <!-- Our Value Section -->

      <div id="about2-container">
        <div class="about-card">
          <div class="about-info-value">
            <h1 class="section-heading">Our Values</h1>
            <div class="about-title-line"></div> <!-- Add this line -->
            <p><strong>Gaming Passion:</strong> Fueled by our shared love for
              gaming, we innovate to enhance your gaming experience with
              cutting-edge solutions.</p>
            <p><strong>Integrity and Transparency:</strong> Trust is fundamental
              at Vallhala. We operate with unwavering integrity, ensuring
              transparency in all our interactions for a trustworthy
              environment.</p>
            <p><strong>Innovative Spirit:</strong> Vallhala thrives on
              innovation, exploring new horizons to introduce groundbreaking
              features and technologies.</p>
          </div>
          <div>
         
            <img  src="{{ asset('assets/images/GrtSb9NjcYRJcojjhgEJf9.jpg') }}" alt=""">

          </div>

        </div>
      </div>

      <!-- What other people say? -->
      <h1 class="title-sellers">What our customers say ?</h1>
      <div class="title-line"></div> <!-- Add this line -->
      <section id="testimonials">
        <div id="testimonials-container">
          <div class="testimonial">
            <div class="top-card">
         
                <img  src="{{ asset('assets/images/person1.jpg') }}" alt=""">

            </div>
            <div class="bottom-card">
              <h2 class="person-title">Ethan Davis</h2>
              <blockquote class="person-info">"Vallhala redefined my gaming
                experience.
                The cutting-edge technology and powerful processors in their
                gaming laptops elevate gameplay to new heights.Vallhala has
                redefined my seamless gaming experience."</blockquote>

            </div>

          </div>
          <div class="testimonial">
            <div class="top-card">
            
                
                <img  src="{{ asset('assets/images/ptreview16.jpg') }}" alt=""">

            </div>

            <div class="bottom-card">
              <h2 class="person-title">Olivia Smith</h2>
              <blockquote class="person-info">"Vallhala redefined my gaming
                experience.
                The cutting-edge technology and powerful processors in their
                gaming laptops elevate gameplay to new heights.Vallhala has
                redefined my seamless gaming experience.
                "</blockquote>
            </div>
          </div>
          <div class="testimonial">
            <div class="top-card">
                <img  src="{{ asset('assets/images/image-person.jpg') }}" alt=""">

            </div>
            <div class="bottom-card">
              <h2 class="person-title">John Smith</h2>
              <blockquote class="person-info">"Vallhala has truly transformed
                the laptop experience.
                The laptops are reliable for everyday use, striking the
                perfect
                balance of power and portability. Vallhala has truly
                transformed my 
                 gaming experience and productivity."</blockquote>

            </div>
          </div>
        </div>
      </section>

    <!--            Footer                      -->
 
        @include('footer')
    
       
   
        
</body>

</html>
