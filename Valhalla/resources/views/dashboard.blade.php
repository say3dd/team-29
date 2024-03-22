{{-- Authors @BravoBoy2 @AbuIsNotHer3 = Abubakarsiddik Mohammed
              @BM786 = Basit Ali Mohammad          --}}

<x-app-layout>
    <x-slot name="header">
        <header>
{{--            Css file linked. Located in public/assets--}}
            <link rel="stylesheet" href="{{asset('assets/css/Dashboard.css')}}">
        </header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<class>
    <div class="py-12 bg-indigo-950">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    {{ __("You're logged in!") }}
                </div>
            </div>
             {{-- code for to go home page --}}
             <div class="items-center justify-start mt-8">
              <a href="{{route('index')}}">
              <x-primary-button class="border-white">
                  {{ __('Home') }}
              </x-primary-button>
          </a>
          </div>

                        <div class="padding: 5px, marging: 5px">


                          <?php                                        // Orders

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
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Order Number</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Tracking Number</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Price</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Order Date</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Actions</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($order_history))
              @foreach ($order_history as $item)
            <tr>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200"> {{$item->product_name}} </td>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200"> {{$item->id }}</td>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200"> {{$item->tracking_number}} </td>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200"> {{$item->price}} </td>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200"> {{$item->created_at}} </td>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200"><a href="{{route('tracking')}}">
                <x-primary-button>
                    {{ __('Track') }}
                </x-primary-button>
            </a>
          </td>
            </tr>
              @endforeach
              @else
            <tr>
              <td colspan="5" class="px-4 py-2 bg-white">No orders yet</td>
              <td class="px-4 py-2 border-gray-800 bg-white flex justify-center">
                @endif
                  <div>
                      <a href="{{route('return.request')}}">
                        <x-primary-button>
                            {{ __('Return') }}
                        </x-primary-button>
                    </a>
                  </div>
              </td>
          </tr>
      </tbody>

  </table>

</div>
</div>
</div>
</div>

</x-app-layout>


