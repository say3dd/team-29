
{{--<!-- --}}
{{--     _______________________________   Created and designed the Homepage of the webiste by @AnthonyResuello (Anthony Resuello)     ____________________________________________--}}

{{--       - @Anthony Resuello- Created and desgined the footer to make it consistent for all pages of the website--}}
{{--       - @Anthony Resuello - Made it responsive for different screen sizes--}}
{{---->--}}
    <section class="footer-section">
        <footer>
            <div class="footer-content">
                <div class="footer-links">

                    <div class="footer-column">

                        <ul>
                        <li><div class = "footer-title">Categories</div></li>
                            <li><a href="{{ route('products.index' ,['category' => 'Monitor']) }}">Monitors</a></li>
                            <li><a href="{{ route('products.index' ,['category' => 'Keyboard']) }}">Keyboards</a></li>
                            <li><a href="{{ route('products.index' ,['category' => 'Headset']) }}">Headsets</a></li>
                            <li><a href="{{ route('products.index' ,['category' => 'Mouse']) }}">Mouse</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">

                        <ul>

                        <li><div class = "footer-title">About Valhalla</div></li>

                            <li><a href="{{ route('contactUs') }}">Contact</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">

                        <ul>
                        <li><div class = "footer-title">Shopping</div></li>
                            <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                            <li><a href="{{ route('basket') }}">Basket</a></li>
                            <li><a href="{{ route('categories') }}">Products</a></li>

                        </ul>
                    </div>
                </div>

            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 Valhalla</p>
            </div>
        </footer>
    </section>

