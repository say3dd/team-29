<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<div class="block p-2 w-1/2 bg-red-500 align-middle rounded-md">
    <b>There are some errors in your submission:</b>
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
