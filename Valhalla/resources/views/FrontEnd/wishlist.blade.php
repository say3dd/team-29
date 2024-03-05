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
    forcePlaceholderSize: true,
    update: function(event, ui) {
      var productOrder = $(this).sortable('toArray').toString();
      $.ajax({
        url: '/saveWishlistOrder',
        method: 'POST',
        data: {
          order: productOrder,
          _token: '{{ csrf_token() }}'
        }
      });
    }
  });
  $( "#sortable" ).disableSelection();
} );
  </script>
</head>
<body>
  <div id="sortable">
    @foreach($products as $product)
      <div id="product-{{ $product->id }}" class="ui-state-default">
        <img src="{{ asset($product->images) }}" alt="{{ $product->product_name }}" style="max-width: 100px; max-height: 100px;">
        {{ $product->product_name }}
      </div>
    @endforeach
  </div>
 
</body>
</html>