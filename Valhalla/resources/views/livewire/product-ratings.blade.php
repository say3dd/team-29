<div>
    <section class="w-full px-8 pt-4 pb-10 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <div class="w-full mt-16 md:mt-0">
                    <div class="relative z-10 h-auto p-4 py-10 overflow-hidden bg-violet-900 rounded-lg shadow-2xl px-7">
                        @auth
                            <div class=" space-y-5">
                                <p class="font-bold text-white uppercase flex justify-center">
                                    Rate this product
                                </p>
                            </div>
                            @if (session()->has('message'))
                                <p class="text-xl text-white md:pr-16">
                                    {{ session('message') }}
                                </p>
                            @endif
                            @if($hideForm != true)
                                <form wire:submit.prevent="rate()">
                                    <div class="block max-w-3xl px-1 py-2 mx-auto">
                                        <div class="flex space-x-1 rating">
                                            <label for="star1" wire:click="$set('rating', 1)">
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 1 ) text-indigo-500 @else text-grey @endif" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star2" wire:click="$set('rating', 2)">
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 2 ) text-indigo-500 @else text-grey @endif" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star3" wire:click="$set('rating', 3)">
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 3 ) text-indigo-500 @else text-grey @endif" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star4" wire:click="$set('rating', 4)">
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 4 ) text-indigo-500 @else text-grey @endif" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star5" wire:click="$set('rating', 5)">
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 5 ) text-indigo-500 @else text-grey @endif" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                        </div>
                                        <div class="my-5">
                                            @error('comment')
                                                <p class="mt-1 text-red-500">{{ $message }}</p>
                                            @enderror
                                            <textarea wire:model.lazy="comment" name="description" class="block w-full px-4 py-3 border border-2 rounded-lg text-gray-800 focus:border-blue-500 focus:outline-none" placeholder="Comment.."></textarea>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <x-primary-button type="submit" class=" text-white">Rate</x-primary-button>
                                        @auth
                                            @if($currentId)
                                                <button type="submit" class="w-full px-3 py-4 mt-4 font-medium text-white bg-red-400 rounded-lg" wire:click.prevent="delete({{ $currentId }})" class="text-sm cursor-pointer">Delete</button>
                                            @endif
                                        @endauth
                                    </div>
                                </form>
                            @endif
                        @else
                            <div>
                                <div class="mb-8 text-center text-white">
                                    How did you find the product? You need to login to be able to rate it!
                                </div>
                                <x-primary-button class="block">
                                <a href="{{ route('login') }}"
                                    class="font-medium text-center text-white"
                                >Login</a>
                                </x-primary-button>
                            </div>
                        @endauth
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class=" block pt-20 pb-24 text-left bg-indigo-950">
        <div class="w-full px-20 mx-auto text-left md:px-10 max-w-7xl xl:px-16">
            <div class="box-border flex flex-col flex-wrap justify-center -mx-4 text-indigo-900">
                <div class="relative w-full mb-12 leading-6 text-left xl:flex-grow-0 xl:flex-shrink-0">
                    <h2 class="box-border mx-0 mt-0 font-sans text-4xl font-bold text-center text-white">
                        Ratings
                    </h2>
                </div>
            </div>
            <div class="box-border flex grid flex-wrap justify-center gap-10 -mx-4 text-center text-white lg:gap-16 lg:justify-start lg:text-left">
                @forelse ($comments as $comment)
                    <div class="flex col-span-1">
                        <div class="relative flex-shrink-0 w-20 h-20 text-left">
                            <a href="{{ '@' . $comment->user->name }}">
                            </a>
                        </div>
                        <div class="relative px-4 mb-16 leading-6 text-left">
                            <div class="box-border text-lg font-medium text-gray-600">
                                {{ $comment->comment }}
                            </div>
                            <div class="box-border mt-5 text-lg font-semibold text-indigo-900 uppercase">
                                Rating: <strong>{{ $comment->rating }}</strong> ⭐
                                @auth
                                    @if(auth()->user()->id == $comment->user_id || auth()->user()->role->name == 'admin' ))
                                        - <a wire:click.prevent="delete({{ $comment->id }})" class="text-sm cursor-pointer">Delete</a>
                                    @endif
                                @endauth
                            </div>
                            <div class="box-border text-left text-white" style="quotes: auto;">
                                <a href="{{ '@' . $comment->user->username }}">
                                    {{  $comment->user->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="flex col-span-1">
                    <div class="relative px-4 mb-16 leading-6 text-left">
                        <div class="box-border text-lg font-medium text-white">
                            No ratings
                        </div>
                    </div>
                </div>
                @endforelse

            </div>
    </section>

</div>
