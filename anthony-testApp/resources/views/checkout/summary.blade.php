
{{--
Author @BM786 Basit Ali Mohammad == worked on this page.

--}}

<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<!--@noramknarf (Francis Moran) - added functionality to display items in the cart, total cost & added links into and out of the page (connected to routes by Basit)-->
<body class="flex items-center justify-center min-h-screen bg-dark-blue ">
<div class="container">   
<div class="py-16 px-4 md:px-6 2xl:px-0 flex justify-center items-center 2xl:mx-auto 2xl:container">
    <div class="flex flex-col justify-start items-start w-full space-y-9">
        <div class="flex justify-start flex-col items-start space-y-2">
        <form action='{{route('basket')}}' method="GET">
            <button class="flex flex-row items-center text-white dark:text-white hover:text-white space-x-1">
                <svg class="fill-stroke" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.91681 7H11.0835" stroke="currentColor" stroke-width="0.666667" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2.91681 7L5.25014 9.33333" stroke="currentColor" stroke-width="0.666667" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2.91681 7.00002L5.25014 4.66669" stroke="currentColor" stroke-width="0.666667" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p class="text-sm text-white leading-none">Back</p>
            </button>
        </form>
            <p class="text-3xl lg:text-4xl font-semibold leading-7 lg:leading-9 text-white dark:text-gray-50">Checkout</p>
            <p class="text-base leading-normal sm:leading-4 text-white dark:text-white">Home > Basket > Checkout</p>
        </div>

        <div class="flex flex-col xl:flex-row justify-center xl:justify-between space-y-6 xl:space-y-0 xl:space-x-6 w-full">
            <div class="xl:w-3/5 flex flex-col sm:flex-row xl:flex-col justify-center items-center bg-gray-100 dark:bg-gray-800 py-7 sm:py-0 xl:py-10 px-10{{--xl:w-full--}}">
                @foreach ($userBasket as $item)
                <div class="flex flex-col justify-start items-start w-full space-y-4">
                    <p class="text-xl md:text-2xl leading-normal text-gray-800 dark:text-gray-50">{{$item->product_name}}</p>
                    <p class="text-base font-semibold leading-none text-gray-600 dark:text-white">£{{$item->product_price}}</p>
                </div>
                <div class="mt-6 sm:mt-0 xl:my-10 xl:px-20 w-52 sm:w-96 xl:w-auto">
                    {{-- <img src="{{$item->image_path}}" alt="item image" /> --}}
                </div>
                @endforeach
            </div>

            <div class="p-8 bg-gray-100 dark:bg-gray-800 flex flex-col lg:w-full xl:w-3/5">
                

                
                
                <label class="mt-8 text-base leading-4 text-gray-800 dark:text-gray-50">Contact details</label>
                <div class="mt-2 flex-col">
                    <input class="border border-gray-300 p-4 rounded w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600" type="text" name="first_name" id="first_name" placeholder="First Name" />
                    <input class="border border-gray-300 p-4 rounded w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600" type="text" name="surname" id="surname" placeholder="Surname" />
                    <input class="border border-gray-300 p-4 rounded w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600" type="tel" name="phone_number" id="phone_number" placeholder="Phone Number" />
                    <input class="border border-gray-300 p-4 rounded w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600" type="email" name="" id="" placeholder="Email" />
                </div>

                <label class="mt-8 text-base leading-4 text-gray-800 dark:text-gray-50">Shipping Address</label>
                
                <div class="mt-2 flex-col">
                <input class="border rounded-bl rounded-br border-gray-300 p-4 m-1 w-full text-base leading-4 placeholder-gray-600 text-gray-600" type="text" name="address_line1" id="address_line1" placeholder="Address (Line 1)" />
                <input class="border rounded-bl rounded-br border-gray-300 p-4 m-1 w-full text-base leading-4 placeholder-gray-600 text-gray-600" type="text" name="address_line2" id="address_line2" placeholder="Address (Line 2)" />
                <input class="border rounded-bl rounded-br border-gray-300 p-4 m-1 w-full text-base leading-4 placeholder-gray-600 text-gray-600" type="text" name="postcode" id="postcode" placeholder="Postcode" />
                <input class="border rounded-bl rounded-br border-gray-300 p-4 m-1 w-full text-base leading-4 placeholder-gray-600 text-gray-600" type="text" name="city_town" id="city_town" placeholder="City or Town" />
                </div>
                <div class="mt-2 flex-col">
                    <div class="relative ">
                        <button id="changetext" class="text-left border rounded-tr m-1 rounded-tl border-gray-300 p-4 w-full text-base leading-4 placeholder-gray-600 text-gray-600 bg-white" type="email" name="" id="">United Kingdom</button>
                       
                           <img onclick="showMenu(true)" id="closeIcon" class="cursor-pointer absolute top-4 right-4 dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/checkouts-1-svg1.svg" alt="Dropdown">
                            <img onclick="showMenu(true)" id="openIcon" class="cursor-pointer absolute top-4 right-4 hidden transform rotate-180 dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/checkouts-1-svg1.svg" alt="Dropdown">
                            <img onclick="showMenu(true)" id="closeIcon" class="cursor-pointer absolute top-4 right-4 hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/checkouts-1-svg1dark.svg" alt="Dropdown">
                            <img onclick="showMenu(true)" id="openIcon" class="cursor-pointer hidden transform rotate-180 absolute top-4 right-4 dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/checkouts-1-svg1dark.svg" alt="Dropdown">
                        <div id="dropdown" class=" hidden  z-10 w-full {{--flex--}} bg-gray-50 justify-start flex-col text-gray-600">
                            <div onclick="changeText('China')" class="cursor-pointer hover:bg-gray-800 hover:text-white px-4 py-2">England</div>
                            <div onclick="changeText('Russia')" class="cursor-pointer hover:bg-gray-800 hover:text-white px-4 py-2">Wales</div>
                            <div onclick="changeText('UK')" class="cursor-pointer hover:bg-gray-800 hover:text-white px-4 py-2">Scotland</div>
                            <div onclick="changeText('UK')" class="cursor-pointer hover:bg-gray-800 hover:text-white px-4 py-2">Northern Ireland</div>
                        </div>
                    </div>
                </div>

                <label class="mt-8 text-base leading-4 text-gray-800 dark:text-gray-50">Card details</label>
                <div class="mt-2 flex-col">
                    <div>
                        <input class="border rounded border-gray-300 p-4 w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600" type="text" name="" id="" placeholder="Card Holder Name" />
                        <input class="border rounded-tl rounded-tr border-gray-300 p-4 w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600" type="email" name="" id="" placeholder="0000 1234 6549 15151" />
                    </div>
                    <div class="flex-row flex">
                        <input class="border rounded-bl border-gray-300 p-4 w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600" type="email" name="" id="" placeholder="MM/YY" />
                        <input class="border rounded-br border-gray-300 p-4 w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600" type="email" name="" id="" placeholder="CVC" />
                    </div>
                </div>
                <form action='{{route('checkout.placeOrder')}}' method="POST">
                    @csrf
                    <button class="mt-8 border border-transparent hover:border-gray-300 dark:bg-white dark:hover:bg-gray-900 dark:text-gray-900 dark:hover:text-white dark:border-transparent bg-gray-900 hover:bg-white text-white hover:text-gray-900 flex justify-center items-center py-4 rounded w-full">
                        <div>
                            <p class="text-base leading-4">Pay £{{$total}}</p>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
    </div>

<script>
    let closeIcon = document.getElementById("closeIcon");
    let openIcon = document.getElementById("openIcon");
    let dropdown = document.getElementById("dropdown");
    let text = document.getElementById("changetext");

    const showMenu = (flag) => {
        if (flag) {
            closeIcon.classList.toggle("hidden");
            openIcon.classList.toggle("hidden");
            dropdown.classList.toggle("hidden");
        } else {
            closeIcon.classList.toggle("hidden");
            openIcon.classList.toggle("hidden");
            dropdown.classList.toggle("hidden");
        }
    };

    const changeText = (country) => {
        text.innerHTML = country;
        closeIcon.classList.toggle("hidden");
        openIcon.classList.toggle("hidden");
        dropdown.classList.toggle("hidden");
    };
</script>
</div> 
