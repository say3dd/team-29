<x-app-layout>

    @if (count($basketItems) > 0)
        <ul class="basket-items">
            @foreach ($basketItems as $item)
                <li>
                    <a href="{{ route('product.show', $item->product->slug) }}">
                        {{ $item->product->name }}
                    </a>
                    (x {{ $item->quantity }})
                    @if (isset($item->options))
                        - {{ $item->options }}
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>Your basket is currently empty.</p>
    @endif
</x-app-layout>
