<footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-body">
                    <div class="footer-left">
                        <div class="footer-infor flex-grow-1">
                            <div class="footer-menu">
                                <div class="footer-col-block">
                                    <h5 class="footer-heading text_white footer-heading-mobile">
                                        Infomation
                                    </h5>
                                    <div class="tf-collapse-content">
                                        <ul class="footer-menu-list">
                                            <li class="text-body-default">
                                                <a href="about.html" class="link footer-menu_item">About Us</a>
                                            </li>
                                            <li class="text-body-default">
                                                <a href="store-list.html" class="link footer-menu_item">Our Stories</a>
                                            </li>
                                            <li class="text-body-default">
                                                <a href="#" class="link footer-menu_item">Size Guide</a>
                                            </li>
                                            <li class="text-body-default">
                                                <a href="contact.html" class="link footer-menu_item">Contact us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="footer-col-block">
                                    <h5 class="footer-heading text_white footer-heading-mobile">
                                        Customer Services
                                    </h5>
                                    <div class="tf-collapse-content">
                                        <ul class="footer-menu-list">
                                            <li class="text-body-default">
                                                <a href="#" class="link footer-menu_item">Shipping</a>
                                            </li>
                                            <li class="text-body-default">
                                                <a href="#" class="link footer-menu_item">Return &amp; Refund</a>
                                            </li>
                                            <li class="text-body-default">
                                                <a href="#" class="link footer-menu_item">Privacy Policy</a>
                                            </li>
                                            <li class="text-body-default">
                                                <a href="term-of-use.html" class="link footer-menu_item">Terms &amp;
                                                    Conditions</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-phone-number">
                                <h4 class="text_white number">+61 (9) 567 8765 43</h4>
                                <h4 class="text_white mail">hello@yourname.com</h4>
                            </div>
                        </div>
                    </div>
                    <div class="footer-col-block footer-newsletter">
                        <h3 class="footer-heading footer-heading-mobile text_white">
                            Stay in the loop with Weekly newsletters
                        </h3>
                        <div class="tf-collapse-content">
                            <form id="subscribe-form" action="#" class="form-newsletter subscribe-form"
                                method="post" accept-charset="utf-8" data-mailchimp="true">
                                <div id="subscribe-content" class="subscribe-content">
                                    <fieldset class="email">
                                        <input id="subscribe-email" type="email" name="email-form"
                                            class="subscribe-email" placeholder="Enter your e-mail" tabindex="0"
                                            aria-required="true">
                                    </fieldset>
                                    <div class="button-submit">
                                        <button id="subscribe-button" class="subscribe-button text-body-default "
                                            type="button">Subscribe<i class="icon-arrow-up-right"></i></button>
                                    </div>
                                </div>
                                <div id="subscribe-msg" class="subscribe-msg"></div>
                            </form>
                            <ul class="tf-social-icon type-2">
                                <li><a href="#" class="social-facebook"><i class="icon icon-facebook"></i></a>
                                </li>
                                <li><a href="#" class="social-twiter"><i class="icon icon-x"></i></a></li>
                                <li><a href="#" class="social-instagram"><i class="icon icon-instagram"></i></a>
                                </li>

                                <li><a href="#" class="social-amazon"><i class="icon icon-telegram"></i></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom-wrap">
                        <div class="left">
                            <p class="text-body-default text_white">Copyright ©2025 GearO. All Rights Reserved.</p>
                        </div>
                        <div class="center">
                            <div class="tf-currencies">
                                <select class="image-select center style-default style-box  type-currencies">
                                    <option selected data-thumbnail="{{ asset('theme/images/country/us.svg') }}">English
                                        (USD)
                                    </option>
                                    {{-- <option data-thumbnail="{{ asset('theme/images/country/vn.svg') }}">Vietnam (VND)</option> --}}
                                </select>
                            </div>
                        </div>
                        @include('partials.payment-methods')
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
