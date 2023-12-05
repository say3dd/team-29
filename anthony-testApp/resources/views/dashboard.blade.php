<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    {{-- code for to go home page --}}
                    <div class="home_buton" style="padding: 5px; margin: 5px;">
                        <div class="p-2 m-2 w-16 rounded bg-blue-600 hover:active:transition-colors ">
                        <a class= "text-center align-middle text-white" href="{{route('index')}}">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
