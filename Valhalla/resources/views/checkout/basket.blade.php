
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
</head>
<!-- Developed and designed the header for this page @AnthonyResuello (Anthony Resuello) -->
<header class = "navbar-section">
    @include ('header')
</header>


<body>
  <div class="container">
<div class="h-screen w-screen bg-dark-blue flex  justify-center">
  <div class="pt-5 mt-16 md:w-5/6">
    <div class="rounded-lg border-b border-violet-700 p-6 shadow-md h-auto flex flex-col items-center justify-center bg-purple-980">
      <!-- Cart Items text -->
        <table id="basket" class="table table-hover text-center w-full">
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
            @if(session('basket'))
                @foreach(session('basket') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ $details['images'] }}" width="100" height="100" class="img-responsive rounded-md"/></div>
                                <div class="col-sm-9 p-2 inline-block">
                                    <h4 class="">{{ $details['product_name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">£{{ $details['price'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">£{{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm cart_remove p-5 bg-red-700"><i class='bx bx-trash-alt' ></i> Delete</button>

                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
            <!-- End of product container -->
          </div>
  </div>
  </div>
  </div>
  <!-- Developed and desgined the footer for this page @AnthonyResuello (Anthony Resuello) -->
      @include('footer')
</body>

</html>
