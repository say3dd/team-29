{{--@noramknarf (Francis Moran) - implemented functionality to display each item in the user's basket with details + total cost & delete items from baskets (see basketController)
Also added middleware to check if basket is empty--}}
<!-- @ElizavetaMikheeva (Elizaveta Mikheeva) - implemented the front-end (design) of the basket using Tailwind  -->

<head>
    <title>Products</title>
    <link rel="stylesheet" href="{{asset('assets/css/style_sheet.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<!-- Developed and designed the header for this page @AnthonyResuello (Anthony Resuello) -->
<header class = "navbar-section">
    @include ('header')
</header>


<body>
  <div class="container">
      @if(session('success'))
          <div id="flash-success" class="p-5 bg-[#79c753] mx-0 my-5 rounded-[5px]">
              {{session('success')}}
              {{--                <p class=" text-amber-200">Hello, a message</p>--}}
          </div>
      @endif
      @if(session('error'))
      <div id="flash-error" class="p-5 bg-red-700 mx-0 my-5 rounded-[5px]">
        {{session('error')}}
    </div>
      @endif

<div class="h-screen w-screen bg-dark-blue flex  justify-center">
  <div class="pt-5 mt-16 md:w-5/6">
    <div class="rounded-lg  p-6 shadow-md h-auto flex flex-col items-center justify-center bg-purple-980">
      <!-- Cart Items text -->
        <table id="basket" class="table table-hover text-center w-full border-b border-violet-700">
            <thead >
            <tr>
            <th class="w-1/2 border-r-[2px] p-1" > Product </th>
            <th class="w-[10%] border-r-[2px] p-1"> Price </th>
            <th class="w-[12%] border-r-[2px] p-1 m-1">Quantity</th>
            <th class="w-[22%] text-center p-1">Subtotal</th>
            <th class="w-[10]"></th>
            </tr>
            </thead>
            <tbody>
            @php $total = 0 @endphp
            @if($basketItems = Auth::user()->basketItems()->with('product')->get())
                @foreach($basketItems as $item)
                    @php $total += $item['price'] * $item['quantity'] @endphp
                    <tr data-id="{{ $item->id }}" class="border-b" >
                        <td data-th="Product">
                            <div class="row flex flex-row p-2 text-center align-middle ">
                                <div class="col-sm-3 hidden-xs"><img src="{{ $item['product_images'] }}" width="100" height="100" class="img-responsive rounded-md mr-2"/></div>

                                <div class="col-sm-9 p-2 inline-block pt-2 mr-2.5">
                                    <h4 class="text-center align-middle pt-5 ml-2">{{ $item['product_name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">£ {{ $item['price'] }}</td>

                        <td data-th="Quantity">

                            <form action="{{ route('update_basket', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" class="basket_update form-control quantity  text-black w-1/2 rounded-md" min="1">
                                <button type="submit" class="p-2 bg-blue-500 text-sm rounded">Update</button>
                            </form>

                        </td>
                        <td data-th="Subtotal" class="text-center">£ {{ $item['price'] * $item['quantity'] }}</td>
                        <td class="actions p-1.5" data-th="">
                            <form action="{{ route('basket.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="basket_remove  bg-red-700 font-bold text-sm inline-block rounded-md"> <i class='bx bx-trash-alt inline-flex mt-1 mr-1' ></i> Remove</button>
                            </form>


                        </td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="text-right text-amber-50 text-[1.2em] p-2"><h3><strong>Total £ {{ $total }}</strong></h3></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right p-5 m-1.5">
                    <a href="{{ url('/') }}" class="bg-red-700 inline-block p-2 align-middle text-center rounded-md"> <i class='bx bx-arrow-back' ></i> Continue Shopping</a>
                    <a href="{{ route('checkout.summary') }}" class="bg-green-500 inline-block p-2 align-middle text-center rounded-md"> <i class='bx bx-shopping-bag' ></i> Proceed to Checkout</a>
                </td>
            </tr>
            </tfoot>
        </table>

            <!-- End of product container -->
          </div>
  </div>
  </div>
  </div>

  <!-- Developed and desgined the footer for this page @AnthonyResuello (Anthony Resuello) -->
      @include('footer')



</body>
