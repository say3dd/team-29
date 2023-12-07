<div>
    <h1>This is the basket page</h1>
    <h2>Front-end can make it pretty once functionality is sorted</h2>
    <h2>Below here should be the user ID:</h2>
    @if(isset($del))
    <h1>{{$del}}</h1>
    @endif
    @foreach($userBasket as $b)
        <h1>{{$b->product_name}}, {{$b->product_price}}</h1>
        <form action='{{route('basket.remove')}}' method='post'>
            @csrf
            <input type="hidden" name="basketToDelete" value={{$b->id}}>
            <button class="button_cart_laptop"> Remove from basket </button>
        </form>
    @endforeach
</div>
