<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valhalla</title>
    <link rel="stylesheet" href="{{asset ('assets/css/style.css')}}">

    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
</head>
<body>
    <!--             Header                     -->
    @yield ('header')
    <header>
        
    <section class="nav-header">
    
        <a href="" class="logo"> <img src="{{asset('assets/images/Screenshot_2023-11-16_030651.png')}}" alt=""></a>
        

        <input type="checkbox" id="check">
        <label for="check" class="menu-icon">
        <i class="bx bx-menu" id="menu"></i>
        <i class="bx bx-x" id="close"></i>>
        </label>

        <nav class="navbar">
        <a href="#">Home</a>
        <a href="#">Products</a>
        <a href="#">Contact Us</a>
        <a href="#" class="login-text"><i class="bx bx-user"></i> Log in</a>
        <a href="#" class="cart-icon"
            ><i class="bx bx-shopping-bag"></i> Basket</a >
        </nav>
    </section>

</header>






<section class="footer-section">
    <footer>
      <div class="footer-content">
        <p> Made By Valhalla &copy; </p>
        <div class="social-icons">
          </div>
      </div>
    </footer>
  </section>

   




</body>
</html>
