<head>
        @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
<div class = "container">
  <div class="h-screen bg-gray-100 pt-20">
    <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
      <div class="rounded-lg md:w-2/3">
        {{--start of product containter (I think) --}}

        @foreach ($userBasket as $item)
        <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
          {{-- image of the product --}}
          <img src='{{$item->image_path}}' alt="product-image" class="w-full rounded-lg sm:w-40" />
          <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
            <div class="mt-5 sm:mt-0">
              {{-- name of the product --}}
              <h2 class="text-lg font-bold text-gray-900">{{$item->product_name}}</h2>
            </div>
            <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
              <div class="flex items-center space-x-4">
                {{-- price of the product --}}
                <p class="text-sm">£{{$item->product_price}}</p>
                {{-- button to delete the product --}}
                <form action='{{route('basket.remove')}}' method='post'>
                  @csrf
                  <input type="hidden" name="basketToDelete" value={{$item->id}}>
                  <button class="button_cart_laptop"> Remove from basket </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      <!-- Sub total -->
      
      <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
        <div class="mb-2 flex justify-between">
          <p class="text-gray-700">Subtotal</p>
          {{-- subtotal price (do sum of all products)--}}
          <p class="text-gray-700">£{{$total}}</p>
        </div>
        {{-- shipping price (by default £4.99)--}}
        <div class="flex justify-between">
          <p class="text-gray-700">Shipping</p>
          {{-- shipping price (by default £4.99)--}}
          <p class="text-gray-700">£4.99</p>
        </div>
        <hr class="my-4" />
        <div class="flex justify-between">
          <p class="text-lg font-bold">Total</p>
          <div class="">
            {{-- total (sum + shipping price)--}}
            <p class="mb-1 text-lg font-bold">£{{$total += 4.99}}</p>
            <p class="text-sm text-gray-700">including VAT</p>
          </div>
        </div>
        <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button>
      </div>
    </div>
  </div>
</div>
</body>