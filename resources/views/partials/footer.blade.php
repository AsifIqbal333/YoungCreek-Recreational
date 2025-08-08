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
                                                <a href="{{ route('about-us') }}" class="link footer-menu_item">About
                                                    Us</a>
                                            </li>
                                            {{-- <li class="text-body-default">
                                                <a href="store-list.html" class="link footer-menu_item">Our Stories</a>
                                            </li>
                                            <li class="text-body-default">
                                                <a href="#" class="link footer-menu_item">Size Guide</a>
                                            </li> --}}
                                            <li class="text-body-default">
                                                <a href="{{ route('contacts.index') }}"
                                                    class="link footer-menu_item">Contact us</a>
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
                                                <a href="{{ route('privacy-policy') }}"
                                                    class="link footer-menu_item">Privacy Policy</a>
                                            </li>
                                            <li class="text-body-default">
                                                <a href="{{ route('terms-conditions') }}"
                                                    class="link footer-menu_item">Terms &amp;
                                                    Conditions</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-phone-number">
                                <h4 class="text_white number">1 706 975 6673</h4>
                                <h4 class="text_white mail">chris@youngcreekrec.com</h4>
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
                                <li><a href="https://www.facebook.com/youngcreekrec" class="social-facebook"><i
                                            class="icon icon-facebook"></i></a>
                                </li>
                                 
                                <li><a href="https://www.instagram.com/youngcreek_rec/" class="social-instagram"><i
                                            class="icon icon-instagram"></i></a>
                                </li>
                                
                                 {{--<li><a href="#" class="social-twiter"><i class="icon icon-x"></i></a></li>

                                <li><a href="#" class="social-amazon"><i class="icon icon-telegram"></i></a> </li> --}}
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
                            <p class="text-body-default text_white">Copyright ©{{ date('Y') }}
                                {{ config('app.name') }}. All Rights Reserved.</p>
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
