{{--
Author @BM786 Basit Ali Mohammad == worked on this page.

--}}

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!--@noramknarf (Francis Moran) - added functionality to display items in the cart, total cost & added links into and out of the page (connected to routes by Basit)-->

<body class="flex items-center justify-center min-h-screen bg-dark-blue ">
    <div class="container">
        <div class="py-16 px-4 md:px-6 2xl:px-0 flex justify-center items-center 2xl:mx-auto 2xl:container">
            <div class="flex flex-col justify-start items-start w-full space-y-9">
                <div class="flex justify-start flex-col items-start space-y-2">
                    <form action='{{ route('basket') }}' method="GET">
                        <button class="flex flex-row items-center text-white dark:text-white hover:text-white space-x-1">
                            <svg class="fill-stroke" width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.91681 7H11.0835" stroke="currentColor" stroke-width="0.666667"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2.91681 7L5.25014 9.33333" stroke="currentColor" stroke-width="0.666667"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2.91681 7.00002L5.25014 4.66669" stroke="currentColor" stroke-width="0.666667"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="text-sm text-white leading-none">Back</p>
                        </button>
                    </form>
                    <p class="text-3xl lg:text-4xl font-semibold leading-7 lg:leading-9 text-white dark:text-gray-50">
                        Checkout</p>
                    <p class="text-base leading-normal sm:leading-4 text-white dark:text-white">Home > Basket > Checkout
                    </p>
                </div>

                @if ($userBasket = Auth::user()->basketItems()->with('product')->get())
                    <div
                        class="flex flex-col xl:flex-row justify-center xl:justify-between space-y-6 xl:space-y-0 xl:space-x-6 w-full">
                        <div
                            class="xl:w-3/5 flex flex-col sm:flex-row xl:flex-col justify-center items-center bg-gray-100 dark:bg-gray-800 py-7 sm:py-0 xl:py-10 px-10{{-- xl:w-full --}}">
                            @foreach ($userBasket as $details)
                                <div class="flex flex-col justify-start items-start w-full space-y-4">
                                    <p class="text-xl md:text-2xl leading-normal text-gray-800 dark:text-gray-50">
                                        {{ $details['product_name'] }} <br>
                                        x{{ $details['quantity'] }}</p>
                                    <p class="text-base font-semibold leading-none text-gray-600 dark:text-white">
                                        £{{ $details['price'] * $details['quantity'] }}</p>
                                </div>
                                <div class="mt-6 sm:mt-0 xl:my-10 xl:px-20 w-52 sm:w-96 xl:w-auto">
                                    <img src="{{ asset($details['product_images']) }}" alt="item-image" width="300"
                                        height="300" class="img-responsive rounded-md mr-2" />
                                </div>
                            @endforeach
                            <!--The section below is just so the user knows where the extra £5 comes from. I just copy + pasted from above but I'll leave it up to frontend to determine what to do from here -F -->
                            <div class="flex flex-col justify-start items-start w-full space-y-4">
                                <p class="text-xl md:text-2xl leading-normal text-gray-800 dark:text-gray-50">Shipping
                                </p>
                                <p class="text-base font-semibold leading-none text-gray-600 dark:text-white">£5.00</p>
                            </div>
                            <div class="mt-6 sm:mt-0 xl:my-10 xl:px-20 w-52 sm:w-96 xl:w-auto">
                            </div>
                        </div>
                @endif

                <div class="p-8 bg-gray-100 dark:bg-gray-800 flex flex-col lg:w-full xl:w-3/5">


                    <form onsubmit="return validateForm()" action='{{ route('checkout.placeOrder') }}' method="POST">
                        <label class="mt-8 text-base leading-4 text-gray-800 dark:text-gray-50">Contact details</label>
                        <div class="mt-2 flex-col">
                            <input
                                class="border border-gray-300 p-4 rounded w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600"
                                type="text" name="first_name" id="first_name" minlength = "4" maxlength = "20"
                                placeholder="First Name" required />
                            <input
                                class="border border-gray-300 p-4 rounded w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600"
                                type="text" name="surname" id="surname" minlength = "2" maxlength = "20"
                                placeholder="Surname" required />
                            <input
                                class="border border-gray-300 p-4 rounded w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600"
                                type="tel" name="phone_number" id="phone_number" minlength="7" maxlength="15"
                                placeholder="Phone Number" required />
                            <input
                                class="border border-gray-300 p-4 rounded w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600"
                                type="email" name="email" id="email" minlength = "7" maxlength = "30"
                                placeholder ="Email" required />
                        </div>

                        <label class="mt-8 text-base leading-4 text-gray-800 dark:text-gray-50">Shipping Address</label>

                        <div class="mt-2 flex-col">
                            <input
                                class="border rounded-bl rounded-br border-gray-300 p-4 m-1 w-full text-base leading-4 placeholder-gray-600 text-gray-600"
                                type="text" name="address_line1" id="address_line1" placeholder="Address (Line 1)"
                                required />
                            <input
                                class="border rounded-bl rounded-br border-gray-300 p-4 m-1 w-full text-base leading-4 placeholder-gray-600 text-gray-600"
                                type="text" name="address_line2" id="address_line2" placeholder="Address (Line 2)" />
                            <input
                                class="border rounded-bl rounded-br border-gray-300 p-4 m-1 w-full text-base leading-4 placeholder-gray-600 text-gray-600"
                                type="text" name="postcode" id="postcode" placeholder="Postcode" required />
                            <input
                                class="border rounded-bl rounded-br border-gray-300 p-4 m-1 w-full text-base leading-4 placeholder-gray-600 text-gray-600"
                                type="text" name="city_town" id="city_town" placeholder="City or Town" required />
                        </div>
                        <div class="mt-2 flex-col">
                            <div class="relative ">
                                <button id="changetext"
                                    class="text-left border rounded-tr m-1 rounded-tl border-gray-300 p-4 w-full text-base leading-4 placeholder-gray-600 text-gray-600 bg-white"
                                    type="email" name="" id="">United Kingdom</button>

                                <img onclick="showMenu(true)" id="closeIcon"
                                    class="cursor-pointer absolute top-4 right-4 dark:hidden"
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/checkouts-1-svg1.svg"
                                    alt="Dropdown">
                                <img onclick="showMenu(true)" id="openIcon"
                                    class="cursor-pointer absolute top-4 right-4 hidden transform rotate-180 dark:hidden"
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/checkouts-1-svg1.svg"
                                    alt="Dropdown">
                                <img onclick="showMenu(true)" id="closeIcon"
                                    class="cursor-pointer absolute top-4 right-4 hidden dark:block"
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/checkouts-1-svg1dark.svg"
                                    alt="Dropdown">
                                <img onclick="showMenu(true)" id="openIcon"
                                    class="cursor-pointer hidden transform rotate-180 absolute top-4 right-4 dark:block"
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/checkouts-1-svg1dark.svg"
                                    alt="Dropdown">
                                <div id="dropdown"
                                    class=" hidden  z-10 w-full {{-- flex --}} bg-gray-50 justify-start flex-col text-gray-600">
                                    <div onclick="changeText('China')"
                                        class="cursor-pointer hover:bg-gray-800 hover:text-white px-4 py-2">England
                                    </div>
                                    <div onclick="changeText('Russia')"
                                        class="cursor-pointer hover:bg-gray-800 hover:text-white px-4 py-2">Wales</div>
                                    <div onclick="changeText('UK')"
                                        class="cursor-pointer hover:bg-gray-800 hover:text-white px-4 py-2">Scotland
                                    </div>
                                    <div onclick="changeText('UK')"
                                        class="cursor-pointer hover:bg-gray-800 hover:text-white px-4 py-2">Northern
                                        Ireland</div>
                                </div>
                            </div>
                        </div>

                        <label class="mt-8 text-base leading-4 text-gray-800 dark:text-gray-50">Card details</label>
                        <div class="mt-2 flex-col">
                            <div>
                                <input
                                    class="border rounded border-gray-300 p-4 w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600"
                                    type="text" name="" id="card_HolderName"
                                    placeholder="Card Holder Name" required />
                                <input
                                    class="border rounded-tl rounded-tr border-gray-300 p-4 w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600"
                                    type="text" name="" id="card_number" required minlength="16"
                                    maxlength="16" placeholder="0000 1234 6549 15151" />
                            </div>
                            <div class="flex-row flex">
                                <input
                                    class="border rounded-bl border-gray-300 p-4 w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600"
                                    type="text" name="expiry_date" id="expiry_date" placeholder="MM/YY"
                                    onkeyup="formatString(event);" required />
                                <input
                                    class="border rounded-br border-gray-300 p-4 w-full m-1 text-base leading-4 placeholder-gray-600 text-gray-600"
                                    minlength="3" maxlength="3" type="text" name="" id="cvc"
                                    placeholder="CVC" required />
                            </div>
                        </div>
                        @csrf
                        <button type = "submit"
                            class="mt-8 border border-transparent hover:border-gray-300 dark:bg-white dark:hover:bg-gray-900 dark:text-gray-900 dark:hover:text-white dark:border-transparent bg-gray-900 hover:bg-white text-white hover:text-gray-900 flex justify-center items-center py-4 rounded w-full">
                            <div>
                                @php
                                    // Shipping cost
                                    $total = 5;
                                    foreach($userBasket as $details){
                                        $total +=  $details['price'] * $details['quantity'] ;
                                    }
                                @endphp
                                <p class="text-base leading-4">Pay £{{ number_format($total, 2) }}</p>
                            </div>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setupEventListeners();
        });

        /* Function to set an Event Listener */
        function setupEventListeners() {
            var firstNameInput = document.getElementById("first_name");
            var surnameInput = document.getElementById("surname");
            var cardHolderNameInput = document.getElementById("card_HolderName");
            var cardNumberInput = document.getElementById("card_number");
            var cardCVCInput = document.getElementById("cvc");

            // Add Event Listener for First Name input
            firstNameInput.addEventListener('input', function() {
                validateInputAlphabet(firstNameInput);
            });

            // Add Event Listener for Surname input
            surnameInput.addEventListener('input', function() {
                validateInputAlphabet(surnameInput);
            });

            // Add Event Listener for Card Holder Name input
            cardHolderNameInput.addEventListener('input', function() {
                validateInputAlphabet(cardHolderNameInput);
            });
            // Add Event Listener for Card Number input
            cardNumberInput.addEventListener('input', function() {
                validateInputInteger(cardNumberInput);
            });
            // Add Event Listener for CVC input
            cardCVCInput.addEventListener('input', function() {
                validateInputInteger(cardCVCInput);
            });
        }

        /* The following function checks that the input contains only alphabetical characters */
        function validateInputAlphabet(inputElement) {
            var inputValue = inputElement.value.trim();
            var isValid = true;

            if (!allLetters(inputValue)) {
                inputElement.setCustomValidity("Please enter only alphabetical characters");
                isValid = false;
            } else {
                inputElement.setCustomValidity(""); // Clear custom validity message if input is valid
            }

            return isValid;
        }

        /* The following function checks that the input contains only numbers */
        function validateInputInteger(inputElement) {
            var inputValue = inputElement.value.trim();
            var isValid = true;

            if (!allIntegers(inputValue)) {
                inputElement.setCustomValidity("Please use integers only");
                isValid = false;
            } else {
                inputElement.setCustomValidity(""); // Clear custom validity message if input is valid
            }

            return isValid;
        }

        /* The following function check that the user entered the infromation and the input fields are not left empty*/
        function validateForm() {
            var firstName = document.getElementById("first_name").value;
            var surname = document.getElementById("surname").value;
            var phoneNumber = document.getElementById("phone_number").value;
            var email = document.getElementById("email").value;
            var address_line1 = document.getElementById("address_line1").value;
            var postcode = document.getElementById("postcode").value;
            var city_town = document.getElementById("city_town").value;
            var card_HolderName = document.getElementById("card_HolderName").value;
            var card_number = document.getElementById("card_number").value;
            var expiry_date = document.getElementById("expiry_date").value;
            var cvc = document.getElementById("cvc").value;
            var isValid = true;

            /* Checks that the Firsrt Name field is not left empty */
            if (firstName.trim() === "") {
                isValid = false;
            }
            /* Checks that the Surname field is not left empty */
            if (surname.trim() === "") {
                isValid = false;
            }
            /* Checks that the Phone Number field is not left empty */
            if (phoneNumber.trim() === "") {
                isValid = false;
            }
            /* Checks that the Email field is not left empty */
            if (email.trim() === "") {
                isValid = false;
            }
            /* Checks that the Address Line1 field is not left empty */
            if (address_line1.trim() === "") {
                isValid = false;
            }
            /* Checks that the Postcode field is not left empty */
            if (postcode.trim() === "") {
                isValid = false;
            }
            /* Checks that the City field is not left empty */
            if (city_town.trim() === "") {
                isValid = false;
            }
            /* Checks that the Card Holder Name field is not left empty */
            if (card_HolderName.trim() === "") {
                isValid = false;
            }
            /* Checks that the Card Number field is not left empty */
            if (card_number.trim() === "") {
                isValid = false;
            }
            /* Checks that the Expiry Date field is not left empty */
            if (expiry_date.trim() === "") {
                isValid = false;
            }
            /* Checks that the CVC field is not left empty */
            if (cvc.trim() === "") {
                isValid = false;
            }

            return isValid;
        }

        /* The following functions checks that only alphabertical characters are entered */
        /* Regular expressions are used in order to check whether the user input consists of alphabetical characters only*/
        function allLetters(input) { // Receive the input field as a parameter
            var letters = /^[A-Za-z]+$/;
            if (input.match(letters)) { // Use the match() method directly on the input value
                return true;
            } else {
                return false;
            }
        }

        /* The following functions checks that only numbers are entered */
        /* Regular expressions are used in order to check whether the user input consists of numbers only*/
        function allIntegers(input) { // Receive the input field as a parameter
            var integers = /^[0-9]+$/;
            if (input.match(integers)) { // Use the match() method directly on the input value
                return true;
            } else {
                return false;
            }
        }

        /* Function for validating Epitry Date of the Card input*/
        function formatString(e) {
            var inputChar = String.fromCharCode(event.keyCode);
            var code = event.keyCode;
            var allowedKeys = [8]; // represent the key code of a "Backspace"
            if (allowedKeys.indexOf(code) !== -1) {
                return;
            }
            // regular expressions that allows to format the input received from the user
            event.target.value = event.target.value.replace(
                /[^\d\/]|/, '' // regualar expression that allows only digit to be entered
            ).replace(
                /^(0[1-9]|1[0-2])$/g,
                '$1/' // this regular expression adds a / after the tow-digit number that represetn month,
                // e.g. 12 is going to turn into 12/
            ).replace(
                /^(0?[1-9]|1[0-2])([0-9]{2})$/g,
                '$1/$2' // if three digits are enterd such as 229, then this regular expression changes it,assumes
                // that the first number if the month and the other two is the year, so, hence 229, will turn into 02/29, in other words: February 2028.
            ).replace(
                /^([1-9]\/|[2-9])$/g,
                '0$1/' // 3 > 03/ this regular expression intends to formal a single digit e.g. 2 into a two-digit number e.g. 02
                // so it matches the format of "MM/YY"
            );
            /*Validation for Epitry Date of the Card finishes here*/

        }


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
