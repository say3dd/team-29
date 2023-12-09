<div>
    <h1>This is the basket page</h1>
    <h2>Front-end can make it pretty once functionality is sorted</h2>

    @foreach($userBasket as $b)
        <h1>{{$b->product_name}}, {{$b->product_price}}</h1>
        <form action='{{route('basket.remove')}}' method='post'>
            @csrf
            <input type="hidden" name="basketToDelete" value={{$b->id}}>
            <button class="button_cart_laptop"> Remove from basket </button>
        </form>
    @endforeach
</div>
