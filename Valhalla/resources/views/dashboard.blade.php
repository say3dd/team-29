{{-- Authors @BravoBoy2 @AbuIsNotHer3 = Abubakarsiddik Mohammed
              @BM786 = Basit Ali Mohammad
              @say3dd = Mohammed Miah          --}}

<x-app-layout>
    <x-slot name="header">
        <header>
            {{--            Css file linked. Located in public/assets --}}
            <link rel="stylesheet" href="{{ asset('assets/css/Dashboard.css') }}">

        </header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        @if (session('success'))
            <div id="flash-success" class="bg-[#79c753] text-bold text-[1.1rem] ">
                {{ session('success') }}
            </div>
        @endif
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
                    <a href="{{ route('index') }}">
                        <x-primary-button class="border-white">
                            {{ __('Home') }}
                        </x-primary-button>
                    </a>
                </div>

                <div class="items-center justify-start mt-8">
                    <a href="{{url('/admin')}}">
                        <x-primary-button class="border-white">
                           Admin
                        </x-primary-button>
                    </a>
                </div>

                <div class="padding: 5px, marging: 5px">


                    <?php // Orders
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
                                                <th class="px-4 py-2 border-gray-800 border bg-gray-200">Order ID</th>
                                                <th class="px-4 py-2 border-gray-800 border bg-gray-200">Tracking Number
                                                </th>
                                                <th class="px-4 py-2 border-gray-800 border bg-gray-200">Quantity</th>
                                                <th class="px-4 py-2 border-gray-800 border bg-gray-200">Price</th>
                                                <th class="px-4 py-2 border-gray-800 border bg-gray-200">Order Date</th>
                                                <th class="px-4 py-2 border-gray-800 border bg-gray-200">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          {{-- @say3dd - Made the logic for this part of the page, displaying user orders. --}}
                                            @if (isset($order_history))
                                                @foreach ($order_history as $item)
                                                    <tr>
                                                        <td class="px-4 py-2 border-gray-800 border bg-gray-200">
                                                            {{ $item->product_name }} </td>
                                                        <td class="px-4 py-2 border-gray-800 border bg-gray-200">
                                                            {{ $item->id }}</td>
                                                        <td class="px-4 py-2 border-gray-800 border bg-gray-200">
                                                            {{ $item->tracking_number }} </td>
                                                        <td class="px-4 py-2 border-gray-800 border bg-gray-200">
                                                            {{ $item->quantity }} </td>
                                                        <td class="px-4 py-2 border-gray-800 border bg-gray-200"> £
                                                            {{ $item->price }} </td>
                                                        <td class="px-4 py-2 border-gray-800 border bg-gray-200">
                                                            {{ $item->created_at->format('jS F Y') }} </td>
                                                        <td class="px-4 py-2 border-gray-800 border bg-gray-200 text-center""><a
                                                                href="{{ route('tracking', ['id' => $item->id]) }}">
                                                                <x-primary-button style="">
                                                                    {{ __('Track') }}
                                                                </x-primary-button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="7" class="px-4 py-2 bg-white">No orders yet</td>
                                            @endif

                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div style="display: flex ;justify-content: flex-end; ">
                                        <a href="{{ route('return.request') }}">
                                            <x-primary-button style="border-color: white">
                                                {{ __('Return') }}
                                            </x-primary-button>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

</x-app-layout>
