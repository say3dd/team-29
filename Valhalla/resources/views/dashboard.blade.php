{{-- Authors @BravoBoy2 @AbuIsNotHer3 = Abubakarsiddik Mohammed 
              @BM786 = Basit Ali Mohammad          --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

      <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
        body {
          background-color: #5B21B6;
          font-family: 'Open Sans', sans-serif;
        }
        .container {
          margin-top: 50px;
          margin-bottom: 50px;
        }
        .card {
          @apply relative flex flex-col min-w-0 break-words bg-blue-800 bg-clip-border border border-solid border-gray-300 rounded-sm;
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
          @apply py-3 px-5 mb-0 bg-blue-800 border-b border-solid border-gray-300;
          padding: 0.75rem 1.25rem;
          margin-bottom: 0;
          background-color: #1E3A8A;
          border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        .track {
          @apply relative bg-violet-700 h-7 flex mb-60 mt-50;
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
          background: #1E3A8A;
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
          background: #1E3A8A;
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
          color: #fbf6f6;
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
          @apply text-white bg-violet-700 border border-violet-700 rounded;
          color: #ffffff;
          background-color: #5B21B6;
          border-color: #5B21B6;
          border-radius: 1px;
        }
        .btn-warning:hover {
          @apply text-white bg-blue-700 border border-blue-700 rounded;
          color: #ffffff;
          background-color: #4713A2;
          border-color: #ff2b00;
          border-radius: 1px;
        }
      </style>
      
<class>
    <div class="py-12 bg-blue-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-violet-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    {{ __("You're logged in!") }}
                </div>
            </div>
             {{-- code for to go home page --}}
             <div class="items-center justify-start mt-8">
              <a href="{{route('index')}}">
              <x-primary-button>
                  {{ __('Home') }}
              </x-primary-button>
          </a>
          </div>

                        <div class="padding: 5px, marging: 5px">
                          
                          
                          <?php                                        // Orders

//include('functions/userfunctions.php');
//include('includes/header.php');
//include('auth.php');
?>

<div class="py-3 bg-primary">
  <div class="container -mt-10">
    <h6 class="text-white"> 
      <a href="#" class="text-white underline font-bold">My Orders</a>
    </h6>
  </div>
</div>

<div class="py-1 -mt-9">
  <div class="container mx-auto -mt-10">
    <div class="flex">
      <div class="w-full">
        <table class="table-auto w-full border-solid border-gray-800">
          <thead>
            <tr>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Product</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">ID</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Tracking Number</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Price</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Order Date</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Actions</th>
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
              </td>
            </tr>
            <?php
              }
            } else {
            ?>
            <tr>
              <td colspan="5" class="px-4 py-2 bg-white">No orders yet</td>
              <td class="px-4 py-2 border-gray-800 bg-white flex justify-center">
                  <div>
                      <a href="{{route('tracking')}}">
                          <x-primary-button>
                              {{ __('Track') }}
                          </x-primary-button>
                      </a>
                  </div>
              </td>
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

</x-app-layout>


