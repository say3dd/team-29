{{-- Author @BravoBoy2 @AbuIsNotHer3 = Abubakarsiddik Mohammed --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
        body {
          @apply bg-gray-200 font-sans;
          font-family: 'Open Sans', sans-serif;
        }
      
        .container {
          @apply mt-12 mb-12;
        }
      
        .card {
          @apply relative flex flex-col min-w-0 break-words bg-white bg-clip-border border border-gray-300 rounded-md;
        }
      
        .card-header:first-child {
          @apply rounded-t-md;
        }
      
        .card-header {
          @apply py-3 px-5 mb-0 bg-white border-b border-gray-300;
        }
      
        .track {
          @apply relative bg-gray-300 h-7 flex mb-16 mt-12;
        }
      
        .track .step {
          @apply flex-1 w-1/4 mt-px text-center relative;
        }
      
        .track .step.active:before {
          @apply bg-red-500;
        }
      
        .track .step::before {
          @apply h-7 absolute block w-full left-0 top-3px;
          content: '';
        }
      
        .track .step.active .icon {
          @apply bg-red-500 text-white;
        }
      
        .track .icon {
          @apply inline-block w-10 h-10 leading-10 rounded-full relative bg-gray-300;
        }
      
        .track .step.active .text {
          @apply font-normal text-black;
        }
      
        .track .text {
          @apply block mt-2;
        }
      
        .itemside {
          @apply relative flex w-full;
        }
      
        .itemside .aside {
          @apply relative flex-none;
        }
      
        .img-sm {
          @apply w-20 h-20 p-1;
        }
      
        ul.row,
        ul.row-sm {
          @apply list-none p-0;
        }
      
        .itemside .info {
          @apply pl-4 pr-1;
        }
      
        .itemside .title {
          @apply block mb-2 text-gray-900;
        }
      
        p {
          @apply mt-0 mb-4;
        }
      
        .btn-warning {
          @apply text-white bg-orange-500 border border-orange-500 rounded-md;
        }
      
        .btn-warning:hover {
          @apply bg-red-500 border-red-500;
        }
      </style>
      <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
        body {
          background-color: #eeeeee;
          font-family: 'Open Sans', sans-serif;
        }
        .container {
          margin-top: 50px;
          margin-bottom: 50px;
        }
        .card {
          @apply relative flex flex-col min-w-0 break-words bg-white bg-clip-border border border-solid border-gray-300 rounded-sm;
          display: flex;
          flex-direction: column;
          min-width: 0;
          word-wrap: break-word;
          border: 1px solid rgba(0, 0, 0, 0.1);
          border-radius: 0.1rem;
        }
        .card-header:first-child {
          border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0;
        }
        .card-header {
          @apply py-3 px-5 mb-0 bg-white border-b border-solid border-gray-300;
          padding: 0.75rem 1.25rem;
          margin-bottom: 0;
          background-color: #fff;
          border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        .track {
          @apply relative bg-gray-400 h-7 flex mb-60 mt-50;
          position: relative;
          background-color: #ddd;
          height: 7px;
          display: flex;
          margin-bottom: 60px;
          margin-top: 50px;
        }
        .track .step {
          @apply flex-grow-1 w-1/4 mt-18 text-center relative;
          position: relative;
          width: 25%;
          margin-top: -18px;
          text-align: center;
        }
        .track .step.active:before {
          background: #FF5722;
        }
        .track .step::before {
          height: 7px;
          position: absolute;
          content: "";
          width: 100%;
          left: 0;
          top: 18px;
        }
        .track .step.active .icon {
          background: #ee5435;
          color: #fff;
        }
        .track .icon {
          @apply inline-block w-10 h-10;
          display: inline-block;
          width: 40px;
          height: 40px;
          line-height: 40px;
          position: relative;
          border-radius: 100%;
          background: #ddd;
        }
        .track .step.active .text {
          @apply font-normal;
          font-weight: 400;
          color: #000;
        }
        .track .text {
          @apply block mt-7;
          display: block;
          margin-top: 7px;
        }
        .itemside {
          @apply relative flex;
          position: relative;
          display: flex;
          width: 100%;
        }
        .itemside .aside {
          @apply relative flex-shrink-0;
          position: relative;
          flex-shrink: 0;
        }
        .img-sm {
          @apply w-20 h-20 p-2;
          width: 80px;
          height: 80px;
          padding: 7px;
        }
        ul.row, ul.row-sm {
          @apply list-none p-0;
          list-style: none;
          padding: 0;
        }
        .itemside .info {
          @apply pl-4 pr-2;
          padding-left: 15px;
          padding-right: 7px;
        }
        .itemside .title {
          @apply block mb-5 text-gray-800;
          display: block;
          margin-bottom: 5px;
          color: #212529;
        }
        p {
          @apply mt-0 mb-4;
          margin-top: 0;
          margin-bottom: 1rem;
        }
        .btn-warning {
          @apply text-white bg-orange-500 border border-orange-500 rounded;
          color: #ffffff;
          background-color: #ee5435;
          border-color: #ee5435;
          border-radius: 1px;
        }
        .btn-warning:hover {
          @apply text-white bg-red-500 border border-red-500 rounded;
          color: #ffffff;
          background-color: #ff2b00;
          border-color: #ff2b00;
          border-radius: 1px;
        }
      </style>
      
<class
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    {{-- code for to go home page --}}
                    <div class="home_buton" style="padding: 5px; margin: 5px;">
                        <div class="p-2 m-2 w-16 rounded bg-blue-600 hover:active:transition-colors ">
                        <a class= "text-center align-middle text-white" href="{{route('index')}}">Home</a>
                        </div>
                    </div>
                </div>
            </div>
             {{-- code for to go home page --}}
                    <div class="home_buton">
                        <div class="p-2 m-2 w-16 rounded bg-blue-600 hover:active:transition-colors ">
                        <a class= "text-center align-middle text-white" href="{{route('index')}}">Home</a>
                        </div>

                        <div class="padding: 5px, marging: 5px">
                          
                          
                          <?php                                        // Orders

//include('functions/userfunctions.php');
//include('includes/header.php');
//include('auth.php');
?>

<div class="py-3 bg-primary">
  <div class="container">
    <h6 class="text-white">
      <a href="#" class="text-white">Home</a> / 
      <a href="#" class="text-white">My Orders</a>
    </h6>
  </div>
</div>

<div class="py-5">
  <div class="container mx-auto">
    <div class="flex">
      <div class="w-full">
        <table class="table-auto w-full border-collapse border border-gray-800">
          <thead>
            <tr>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Product</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">ID</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Tracking Number</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Price</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Order Date</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">View</th>
            </tr>
          </thead>
          <tbody>
            <?php
            //$orders = getOrders();

            //if(mysqli_num_rows($orders) > 0)
            //{
            //foreach($orders as $item)
            if (!empty($orders)) {
              foreach ($orders as $item) {
            ?>
            <tr>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200"><?= $item['id']; ?></td>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200"><?= $item['tracking_number']; ?></td>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200"><?= $item['total_price']; ?></td>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200"><?= $item['created_at']; ?></td>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200">
                <a href="#" class="btn btn-primary">View</a>
                <button class="btn btn-primary">Track</button>
              </td>
            </tr>
            <?php
              }
            } else {
            ?>
            <tr>
              <td colspan="5" class="px-4 py-2">No orders yet</td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>










<div class="container mx-auto p-5 my-5">
  <article class="card">
      <header class="card-header"> My Orders / Tracking </header>
      <div class="card-body">
          <h6>Order ID: </h6>
          <article class="card">
              <div class="card-body flex flex-row">
                  <div class="flex-1"> <strong>Estimated Delivery time:</strong> <br>25 Mar 2024 </div>
                  <div class="flex-1"> <strong>Shipping BY:</strong> <br> Royal Mail, | <i class="fa fa-phone"></i> Phone Number </div>
                  <div class="flex-1"> <strong>Status:</strong> <br> Picked by the courier </div>
                  <div class="flex-1"> <strong>Tracking #:</strong> <br> Tracking Number </div>
              </div>
          </article>
          <div class="track">
              <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
              <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
              <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
              <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
          </div>
          <hr>
          <ul class="flex flex-row">
              <li class="w-1/4">
                  <figure class="itemside mb-3">
                      <div class="aside"><img src="IMAGE" class="w-16 h-16 border"></div>
                      <figcaption class="info align-self-center">
                          <p class="title">PRODUCT NAME <br> RAM</p> <span class="text-muted"> PRICE </span>
                      </figcaption>
                  </figure>
              </li>
              <li class="w-1/4">
                  <figure class="itemside mb-3">
                      <div class="aside"><img src="IMAGE" class="w-16 h-16 border"></div>
                      <figcaption class="info align-self-center">
                          <p class="title"> PRODUCT NAME <br> RAM</p> <span class="text-muted">PRICE </span>
                      </figcaption>
                  </figure>
              </li>
              <li class="w-1/4">
                  <figure class="itemside mb-3">
                      <div class="aside"><img src="IMAGE" class="w-16 h-16 border"></div>
                      <figcaption class="info align-self-center">
                          <p class="title"> PRODUCT NAME <br> RAM</p> <span class="text-muted"> PRICE </span>
                      </figcaption>
                  </figure>
              </li>
          </ul>
          <hr>
          <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
      </div>
  </article>
</div>
</x-app-layout>


