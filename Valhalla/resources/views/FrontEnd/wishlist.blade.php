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
      padding: 0; 
      width: 60%; 
      display: flex; 
      flex-direction: column; 
    }
    #sortable div { 
      margin: 0 3px 3px 3px; 
      padding: 0.4em; 
      padding-left: 1.5em; 
      font-size: 1.4em; 
      display: flex; 
      align-items: center; 
    }
    #sortable div img {
      width: 100px; 
      height: 100px;
    }
    .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default { 
      border: 1px solid #d3d3d3; 
      background: #e6e6e6; 
      color: #555555; 
    }
    .sortable-placeholder { height: 120px; }

    .custom-container {
    width: 80%;
    margin: auto;
    position: absolute;
    top: 185px; 
    left: 148px;
  }

    #home {
      position: absolute;
      top: 290px; 
      left: 148px; 
    }
   
    #save-wishlist {
      position: absolute;
      bottom: -20px; 
      right: 148px; 
    }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
$( function() {
  $( "#sortable" ).sortable({
    placeholder: "sortable-placeholder",
    forcePlaceholderSize: true
  });
  $( "#sortable" ).disableSelection();
});

$(document).ready(function() {
    $('#save-wishlist').on('click', function() {
        var productOrder = $('#sortable').sortable('toArray');
        $.ajax({
            url: '/saveWishlistOrder',
            method: 'POST',
            data: {
                order: JSON.stringify(productOrder),
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if(response.status === 'success') {
                    alert('Wishlist order saved successfully');
                    console.log(productOrder)
                } else {
                    alert('There was an error saving the wishlist order');
                }
            }
        });
    });
});
  </script>
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
      <div id="product_{{ $product->product_id }}" class="ui-state-default">
        <img src="{{ asset($product->images) }}" alt="{{ $product->product_name }}" style="max-width: 100px; max-height: 100px;">
        {{ $product->product_name }}
      </div>
    @endforeach
    @endif
  <x-primary-button class="border-white" id="save-wishlist">Save Wishlist</x-primary-button>
                        </div>
                      </div>
                    </div>
</x-app-layout>