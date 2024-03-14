
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
      @if(session('success'))
          <div id="flash-success" class="p-5 bg-[#79c753] mx-0 my-5 rounded-[5px]">
              {{session('success')}}
              {{--                <p class=" text-amber-200">Hello, a message</p>--}}
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
            @if(session('basket'))
                @foreach(session('basket') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}" class="border-b" >
                        <td data-th="Product">
                            <div class="row flex flex-row p-2 text-center align-middle ">
                                <div class="col-sm-3 hidden-xs"><img src="{{ $details['images'] }}" width="100" height="100" class="img-responsive rounded-md mr-2"/></div>

                                <div class="col-sm-9 p-2 inline-block pt-2 mr-2.5">
                                    <h4 class="text-center align-middle pt-5 ml-2">{{ $details['product_name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">£ {{ $details['price'] }}</td>

                        <td data-th="Quantity">
                                <input type="number" value="{{ $details['quantity'] }}" class="basket_update form-control quantity  text-black w-1/2 rounded-md" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">£ {{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions p-1.5" data-th="">
                            <button id="basket_remove" class="basket_remove  bg-red-700 inline-flex m-1.5 text-center align-middle justify-center p-1.5 rounded-md"><i class='bx bx-trash-alt inline-flex mt-1 mr-1' ></i> Delete</button>
{{--                            <form action="{{ route('remove_from_basket') }}" method="POST">--}}
{{--                                @csrf --}}{{-- Include CSRF token --}}
{{--                                <input type="hidden" name="id" value="{{ $id }}"> --}}{{-- Hidden input for item ID --}}
{{--                                <button class="basket_remove bg-red-700 inline-flex m-1.5 text-center align-middle justify-center p-1.5 rounded-md" type="submit" onclick="return confirm('Do you really want to remove the item?')">--}}
{{--                                    <i class='bx bx-trash-alt inline-flex mt-1 mr-1' ></i>--}}
{{--                                    Remove</button>--}}
{{--                            </form>--}}


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
                    <a href="{{ url('/') }}" class="btn btn-danger bg-red-700 inline-block p-2 align-middle text-center"> <i class='bx bx-arrow-back' ></i> Continue Shopping</a>
                    <a href="{{ route('checkout.summary') }}" class="btn btn-primary bg-violet-900 inline-block p-2 align-middle text-center"> <i class='bx bx-shopping-bag' ></i> Proceed to Checkout</a>
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

  <script>

      $(".basket_update").change(function (e) {
          e.preventDefault();

          var ele = $(this);

          $.ajax({
              url: '{{ route('update_basket') }}',
              method: "patch",
              data: {
                  _token: '{{ csrf_token() }}',
                  id: ele.parents("tr").attr("data-id"),
                  quantity: ele.parents("tr").find(".quantity").val()
              },
              success: function (response) {
                  window.location.reload();
              }
          });
      });

      $(".basket_remove").click(function (e) {
          e.preventDefault();

          var element = $(this);

          if(confirm("Do you really want to remove the item?")) {
              $.ajax({
                  url: '{{ route('remove_from_basket') }}',
                  method: "DELETE",
                  data: {
                      _token: '{{ csrf_token() }}',
                      id: element.parents("tr").attr("data-id")
                  },
                  success: function (response) {
                      window.location.reload();
                  }
              });
          }
      });

  </script>
</body>

</html>
