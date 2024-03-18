{{-- Authors: Basit Ali Mohammad = @BM786 --}}

<x-app-layout>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
            .bg-indigo-950 {
                width: 100%;
                height: 100%;
                }
                    #sortable {
                        list-style-type: none;
                        margin: 0;
                        padding: 200px;
                        width: 100%;
                        display: inline-block;
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
                    .ui-state-default,
                    .ui-widget-content .ui-state-default,
                    .ui-widget-header .ui-state-default {
                        border: 1px solid #d3d3d3;
                        background: #5B21B6;
                        color: #f9FFFF;
                        position: static;
                        top: 382px;
                        right: 1000px;
                        border-radius: 20px;
                        margin-top: 300px;
                    }

                    .sortable-placeholder {
                        height: 120px;
                    }

                    #save-wishlist {
                            position: relative;
                            bottom: 100px;
                    margin-top: -20px;
                    margin-left: 1200px;
                }
                #home {
                position: absolute;
                top: 335px;
                left: 148px;
                }

                #home-2 {
                position: relative;
                top: 120px;
                left: 200px;
                }

                #remove-wishlist{
                    position: relative;
                    left: 350px;
                }

                #add-to-basket{
                    position: relative;
                    left: -50px;
                }

                #img{
                    border-radius: 20px;
                    margin-right: 40px;
                    margin-left: 20px;
                    margin-top: 10px;
                    margin-bottom: 10px;
                }

                    p {
                        color: #020202;
                    }

                    .custom-container {
                       width: 80%;
                       margin: auto;
                       position: absolute;
                        top: 245px;
                       left: 148px;
                    }
            .custom-container2{
                width: 80%;
                margin: auto;
                position: absolute;
                top: 165px;
                left: 148px;
            }

    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#sortable").sortable({
                placeholder: "sortable-placeholder",
                forcePlaceholderSize: true
            });
            $("#sortable").disableSelection();
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
                        if (response.status === 'success') {
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
        @if (session('success'))
            <div id="flash-success" class="p-5 w-1/2 mt-5 inline-block text-center ml-10 bg-[#79c753] mx-0 my-5 rounded-[5px] custom-container2">
                {{ session('success') }}
            </div>
        @endif
{{--        @includeWhen($message->any(), 'components.input-label')--}}
        <class>
            <div class=" py-6 bg-white">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-purple-700 overflow-hidden shadow-sm sm:rounded-lg">
                    </div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Wishlist') }}
                    </h2>
                </div>
            </div>
        </class>

            <div class=" bg-indigo-950">
                @if ($wishlistItems->isEmpty())
                    <div class="p-6 text-white bg-purple-700 mt-5 text-center text-2xl overflow-hidden shadow-sm sm:rounded-lg custom-container">
                        {{ __('Your wishlist is empty. Return home here:') }}
                    </div>
                    <x-primary-button class=" border-white" id="home"> <a href="{{ route('index') }}">Home</a>
                    </x-primary-button>
                @else
                <x-primary-button class=" border-white" id="home-2"> <a href="{{ route('index') }}">Home</a>
                </x-primary-button>
                <div id="sortable">
                        @foreach ($wishlistItems as $product)
                            <div id="product_{{ $product->product_id }}" class="ui-state-default">
                                <img id="img" src="{{ asset($product->images) }}" alt="{{ $product->product_name }}"
                                    style="max-width: 100px; max-height: 100px;">
                                {{ $product->product_name }}
                                <form method="POST" action="{{ route('wishlist.remove', $product->product_id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('wishlist.remove', $product->product_id) }}">
                                        <x-secondary-button type="submit" id="remove-wishlist">Remove from Wishlist</x-secondary-button>
                                </form>

                                <a href="{{ route('add_to_basket', $product->product_id) }}">
                                    <x-primary-button type="button" role="button" id="add-to-basket" class="buy-product">
                                        Add to Basket
                                    </x-primary-button>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <x-primary-button class="border-white" id="save-wishlist">Save Wishlist</x-primary-button>
                @endif
            </div>
    </body>

</x-app-layout>
