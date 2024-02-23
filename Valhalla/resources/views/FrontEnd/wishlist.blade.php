<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <a href="{{ route('index') }}"> home </a>
    <title></title>

    
</head>

<body>
    <ul id="sortable-list">
        <li data-item="test">list item</li>
        <li data-item="test">list item2</li>
        <li data-item="test">list item3</li>
        <li data-item="test">list item4</li>
        <li data-item="test">list item5</li>
        
      </ul>
    </body>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.2/Sortable.min.js></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Sortable(document.getElementById('sortable-list'), {
                animation:7150,
                onEnd: function (evt) {
                    updateWishlistOrder(evt.newIndex, evt.oldIndex);
                }
            });
    
            function updateWishlistOrder(newIndex, oldIndex) {
                var wishlistItems = [];
                $('#sortable-list div').each(function () {
                    wishlistItems.push($(this).data('item-id'));
                });
            }
        });
    </script>
</html>