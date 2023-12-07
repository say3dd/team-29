{{--@extends('FrontEnd.master')

@section('title', 'ContactUs')  

@section('content')
<h1>ContactUs</h1>
  @if(session('success')) 
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.submit') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="4" required></textarea>

        <button type="submit">Submit</button>
    </form>  

@endsection --}}

<x-guest-layout>
    <div class="mb-4 text-white">
        <h2 style="font-size: 2em; padding: 10px; margin-top: -10px; font-weight: bold;">Contact Us</h2>
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('contact.submit') }}" style="max-width: 600px; padding: 10px;">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-white" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Message -->
        <div class="mt-4">
            <x-input-label for="message" :value="__('Message')" class="text-white" />
            <textarea id="message" name="message" rows="4" class="form-input rounded-md shadow-sm mt-1 block w-full" required>{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>