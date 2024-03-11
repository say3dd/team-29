{{--Authors: Basit Ali Mohammad = @BM786 --}}

<x-app-layout>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
    .bg-indigo-950 {
      width: 100%;
      height: 100vh;
    }
    #sortable { 
      list-style-type: none; 
      margin: 0; 
    }
    .sortable-placeholder { height: 120px; }
    .custom-container {
    width: 80%;
    margin: auto;
    position: absolute;
    top: 186px; 
    left: 155px;
  }

  #home {
      position: absolute;
      top: 290px; 
      left: 155px; 
    }
 
    #save-wishlist {
      position: absolute;
      bottom: -20px; 
      right: 148px; 
    }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <div class="py-6 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class= "overflow-hidden shadow-sm sm:rounded-lg">
            </div>
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Wishlist') }}
</h2>
        </div>
    </div>

<div class=" bg-indigo-950">
  @if($wishlistItems->isEmpty())
    <div class="p-6 text-white bg-purple-700 overflow-hidden shadow-sm sm:rounded-lg custom-container">
        {{ __("Your wishlist is empty. Return home here:") }}
    </div>
  <x-primary-button class=" border-white" id="home"> <a href="{{ route('index') }}">Home</a> </x-primary-button>
  @else
  <div id="sortable">
    @foreach($wishlistItems as $product)
        {{ $product->product_name }}
      </div>
    @endforeach
    @endif
  <x-primary-button class="border-white" id="save-wishlist">Save Wishlist</x-primary-button>
                        </div>
                      </div>
                    </div>
</x-app-layout>