<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
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

  @if($wishlistItems->isEmpty())
  <p>Your wishlist is empty. Return home here: </p> <a href="{{ route('index') }}"> >Home</a>
  @else
  <div id="sortable">
    @foreach($wishlistItems as $product)
      <div id="product_{{ $product->product_id }}" class="ui-state-default">
        <img src="{{ asset($product->images) }}" alt="{{ $product->product_name }}" style="max-width: 100px; max-height: 100px;">
        {{ $product->product_name }}
        <form method="POST" action="{{ route('wishlist.remove', $product->product_id) }}">
          @csrf
          @method('DELETE')
          <button type="submit">Remove from Wishlist</button>
      </form>

      <a href="{{route('add_to_basket', $product->product_id)}}">
        <button type="button" role="button" class="buy-product">
         Add to Basket
        </button>
         </a>
      </div>


    @endforeach
  </div>
  @endif
  <button id="save-wishlist">Save Wishlist</button>

  
 
</body>
</html>