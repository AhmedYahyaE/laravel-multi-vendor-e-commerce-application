<!-- Footer -->
<footer class="footer">
    <div class="container">
        <!-- Outer-Footer -->
        <div class="outer-footer-wrapper u-s-p-y-80">
            <h6>
                For special offers and other discount information
            </h6>
            <h1>
                Subscribe to our Newsletter
            </h1>
            <p>
                Subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.
            </p>



            
            <form class="newsletter-form">
                <label class="sr-only" for="subscriber_email">Enter your Email</label>
                <input type="text" placeholder="Your Email Address" id="subscriber_email" name="subscriber_email" required> {{-- We'll use the HTML id Global Attribute in jQuery in front/js/custom.js --}} 
                <button type="button" class="button" onclick="addSubscriber()">SUBMIT</button> {{-- Check the addSubscriber() function in front/js/custom.js. We'll use it in conjunction with the    id="subscriber_email"    of the <input> field --}}
            </form>



        </div>
        <!-- Outer-Footer /- -->
        <!-- Mid-Footer -->
        <div class="mid-footer-wrapper u-s-p-b-80">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>COMPANY</h6>
                        <ul>
                            <li>
                                <a href="{{ url('about-us') }}">About Us</a>
                            </li>
                            <li>
                                <a href="{{ url('contact') }}">Contact Us</a>
                            </li>
                            <li>
                                <a href="{{ url('faq') }}">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>COLLECTION</h6>
                        <ul>
                            <li>
                                <a href="{{ url('men') }}">Men Clothing</a>
                            </li>
                            <li>
                                <a href="{{ url('women') }}">Women Clothing</a>
                            </li>
                            <li>
                                <a href="{{ url('kids') }}">Kids Clothing</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>ACCOUNT</h6>
                        <ul>
                            <li>
                                <a href="{{ url('user/account') }}">My Account</a>
                            </li>
                            <li>
                                <a href="{{ url('user/orders') }}">My Orders</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>Contact</h6>
                        <ul>
                            <li>
                                <i class="fas fa-location-arrow u-s-m-r-9"></i>
                                <span>Multi-vendor E-commerce Application</span>
                            </li>
                            <li>
                                <a href="tel:+201255845857">
                                <i class="fas fa-phone u-s-m-r-9"></i>
                                <span>+01255845857</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@multi-vendore-commerce.com">
                                <i class="fas fa-envelope u-s-m-r-9"></i>
                                <span>
                                info@multi-vendore-commerce.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mid-Footer /- -->
        <!-- Bottom-Footer -->
        <div class="bottom-footer-wrapper">
            <div class="social-media-wrapper">
                <ul class="social-media-list">
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fas fa-rss"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p class="copyright-text">Copyright &copy; 2022
                <a target="_blank" rel="nofollow" href="#">Multi-vendor E-commerce Application</a> | All Right Reserved
            </p>
        </div>
    </div>
    <!-- Bottom-Footer /- -->
</footer>
<!-- Footer /- -->