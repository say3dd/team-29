<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@section('title', 'test land')</title>
    <meta name="description" content="Get started with a free landing page built with Tailwind CSS and the Flowbite Blocks system.">
    <link href="./output.css" rel="stylesheet">
    <title>
        @yield('title', 'welcome')
    </title>
</head>
<body>

    <h1>Hello test</h1>
    <h1>adasdsa</h1>

    <div class="link">
        <span>
            <a href="{{route('index')}}">Full site</a>
        </span>
    </div>
</body>
</html>