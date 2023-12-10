
<!DOCTYPE html>
<html>

<!--@noramknarf (Francis Moran) - implemented functionality to display each item in the user's basket with details + total cost & delete items from baskets (see basketController)-->
<!-- @ElizavetaMikheeva (Elizaveta Mikheeva) - implemented the front-end (design) of the basket using Tailwind  -->

<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="{{asset('assets/css/style_sheet.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
</head>

<section class = "navbar-section">
    @include ('header')
</section>


<body>
  <div class="container">
<div class="h-screen w-screen bg-dark-blue flex  justify-center">
  <div class="pt-5 mt-16 md:w-5/6">
    <div class="rounded-lg border p-6 shadow-md h-auto flex flex-col items-center justify-center bg-violet-950">
      <!-- Cart Items text -->
      <h1 class="mb-10 text-3xl font-bold fon text-white"> Shopping Cart</h1>
            <div class="mx-auto w-3/4 h-3/5 justify-center px-6 md:flex md:space-x-6 xl:px-0">
              <div class="rounded-lg md:w-2/3">
                <!-- Products display -->
                @foreach ($userBasket as $item)
                <!-- Product item -->
                <div class="justify-between mb-6 rounded-lg p-6 shadow-md  bg-violet-800 sm:flex sm:justify-start">
                  <!-- Image of the product -->
                  <img src='{{$item->image_path}}' alt="product-image" class="h-32 w-40 rounded-lg object-cover " />
                  <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                    <div class="mt-5 sm:mt-0">
                      <!-- Name of the product -->
                      <h2 class="text-xl underline font-bold text-white">{{$item->product_name}}</h2>
                      <!-- RAM of the product the product -->
                      <p class=" pl-6 pt-1 text-sm text-white ">RAM: {{$item->RAM}} GB</p>
                      <!-- Video Card of the product -->
                      <p class=" pl-6 pt-1 text-sm text-white ">GPU: {{$item->GPU}}</p>
                      <!-- Processor of the product -->
                      <p class=" pl-6 pt-1 text-sm text-white ">Processor: {{$item->processor}}</p>
                      <!-- Price of the product -->
                      <p class=" pl-6 pt-1 text-sm text-white font-semibold ">Price: £{{$item->product_price}}</p>
                    </div>
                    <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                      <div class="flex items-center space-x-4">

                        <!-- Button to delete the product -->
                        <form action='{{route('basket.remove')}}' method='post'>
                          @csrf
                          <input type="hidden" name="basketToDelete" value={{$item->id}}>
                          <div class = "text-white text-lg bg-transparent">
                          <button class  = "hover:text-blue-600"> x </button>
                          </div>
                        </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <!-- End of product container -->
        </div>

        <!-- Subtotal -->
        <div class="mt-6 md:mt-0 md:w-1/3">
          <div class=" rounded-lg border  bg-violet-800 p-6 shadow-md">
            <h2 class= "text-white text-2xl font-semibold underline decoration-solid pt-2 pb-8"> Order Summary</h2>
            <div class="mb-2 flex justify-between">
              <p class="text-white">Subtotal</p>
              <!-- Subtotal price (do sum of all products) -->
              <p class="text-white">£{{$total}}</p>
            </div>
            <!-- Shipping price (by default £4.99) -->
            <div class="flex justify-between">
              <p class="text-white">Shipping</p>
              <p class="text-white">£4.99</p>
            </div>
            <hr class="my-4" />
            <div class="flex justify-between">
              <p class="text-lg text-white font-bold">Total</p>
              <div>
                <!-- Total (sum + shipping price) -->
                <p class="mb-1 text-white text-lg font-bold">£{{$total += 4.99}}</p>
                <p class="text-sm text-white">including VAT</p>
              </div>
            </div>
            <form action="{{ route('checkout.summary') }}" method="GET">
              <button type="submit" class="mt-6 w-full rounded-md bg-violet-600 py-1.5 font-medium text-blue-50 hover:bg-blue-600">
                  Check out
              </button>
          </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  </div>
      @include('footer')
</body>

</html>