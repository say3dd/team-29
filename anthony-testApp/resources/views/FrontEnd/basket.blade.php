<div>
    <h1>This is the basket page</h1>
    <h2>Front-end can make it pretty once functionality is sorted</h2>
    <h2>Below here should be the user ID:</h2>
    <h1>{{$userID}}</h1>
    @foreach($userBasket as $b)
        <h1>{{$b->id}}, {{$b->created_at}}</h1>
        <h1>test</h1>
    @endforeach
</div>
