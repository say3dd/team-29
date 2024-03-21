{{-- Author @BM786 = Basit Ali Mohammad --}}
<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #1E1B4B;
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .card {
            @apply relative flex flex-col min-w-0 break-words bg-clip-border border border-solid rounded-sm;
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
            @apply py-3 px-5 mb-0 border-b border-solid;
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #1E1B4B;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .track {
            @apply relative h-7 flex mb-60 mt-50;
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
            background: #1E1B4B;
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
            background: #1E1B4B;
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

        ul.row,
        ul.row-sm {
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
            @apply block mb-5 text-white;
            display: block;
            margin-bottom: 5px;
            color: #FFFFFF;
        }

        p {
            @apply mt-0 mb-4;
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .btn-warning {
            @apply text-white border rounded;
            color: #ffffff;
            background-color: #5B21B6;
            border-color: #5B21B6;
            border-radius: 1px;
        }

        .btn-warning:hover {
            @apply text-white rounded;
            color: #ffffff;
            background-color: #4713A2;
            border-color: #ff2b00;
            border-radius: 1px;
        }

        .page-wrapper {
            background-color: #1E1B4B;
        }
    </style>

    <body>
        <div class="page-wrapper overflow-hidden">
            <div class="container mx-auto p-12 my-5 bg-purple-900 rounded-xl text-white">
                <article class="card text-white">
                    <header class="card-header pl-2 font-bold text-white"> My Orders / Tracking </header>
                    <!-- Get the order details of a specific order -->
                    <div class="card-body mt-6 text-white">
                        <h6> Order ID: {{ $product->id }}</h6>
                        <article class="card mt-2">
                            <div class="card-body flex flex-row">
                                <div class="flex-1"> <strong>Estimated Delivery time:</strong> <br>
                                    {{ $product->created_at->addWeeks(2)->format('d M Y') }} </div>
                                <div class="flex-1"> <strong>Shipping BY:</strong> <br> Royal Mail </div>
                                <div class="flex-1"> <strong>Status:</strong> <br> {{ $product->status }} </div>
                                <div class="flex-1"> <strong>Tracking Number:</strong> <br>
                                    {{ $product->tracking_number }} </div>
                            </div>
                        </article>
                        <div class="track mt-11">
                            <!-- PHP for the tracking status -->
                            @php
                                $steps = ['Order placed', 'Picked up by Courier', 'In Transit', 'Delivered'];
                                $currentStatusIndex = array_search($product->status, $steps);
                            @endphp

                            @foreach ($steps as $index => $step)
                                <div class="step {{ $index <= $currentStatusIndex ? 'active' : '' }}">
                                    <span class="icon">
                                        <i
                                            class="fas fa-{{ $index == 0 ? 'check' : ($index == 1 ? 'user' : ($index == 2 ? 'truck' : 'box')) }}"></i>
                                    </span>
                                    <span class="text">{{ $step }}</span>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <ul class="flex flex-row">
                            <!-- Display the order -->
                            <li class="w-1/4">
                                <figure class="itemside mb-3">
                                    <div class="aside"><img src="{{ asset($product_image->images) }}"
                                            class="w-16 h-16 border"></div>
                                    <figcaption class="info align-self-center">
                                        <p class="title"> {{ $product->product_name }} <br> <br> <span
                                                class="text-muted"> £ {{ $product->price }} </span>
                                    </figcaption>
                                </figure>
                            </li>
                        </ul>
                        <hr>
                        <div class="items-center justify-start mt-8">
                            <a href="{{ route('dashboard') }}">
                                <x-primary-button>
                                    {{ __('Back To Orders') }}
                                </x-primary-button>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </body>
</x-app-layout>
