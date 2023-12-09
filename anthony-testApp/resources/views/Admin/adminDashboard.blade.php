{{-- Author @BravoBoy2 @AbuIsNotHer3 = Abubakarsiddik Mohammed (two accounts but the same person) --}}

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
                    {{ __("You're logged in as Admin!") }}
                </div>
            </div>

             {{-- admin navigation to product Lists --}}
                    <div class="admin-dashboard-nav" style="padding: 5px; margin: 5px;">
                        <div class="p-5 m-5 mx-w-100% w-100% bg-cyan-200 rounded flex flex-row sm:mx-w-50% antialiased">
                        <span class=" p-5 m-5 text-center rounded bg-purple-300 sm:p-2 max-w-1">
                        <a class= "text-center align-middle text-white" href="{{route('index')}}">Home</a>
                         </span>

                         <span class=" p-5 m-5 text-center rounded bg-purple-300">
                        <a class= "text-center align-middle text-white" href="{{route('plist')}}">Product List</a>
                            </span>

                        </div>
                    </div>
        </div>
    </div>
</x-app-layout>
