@extends('layouts.website')

@section('title', 'My Account')

@section('content')
    <header class="woocommerce-products-header masthead masthead--innerpage" id="masthead">
        <h1 class="woocommerce-products-header__title page-title">My Account
        </h1>

        <div class="breadcrumbs" id="breadcrumbs"><a href="{{ route('homepage') }}">Home</a> | <span>My Account</span></div>
    </header>

    <section class="section section--highlight container container--fluid contact">
        <div class="row">

            <article class="page-article col-xxs-12">
                <div class="woocommerce">
                    <div class="woocommerce-notices-wrapper"></div>
                    <form method="post" class="woocommerce-ResetPassword lost_reset_password">

                        <p>Lost your password? Please enter your username or email address. You will receive a link to
                            create a new password via email.</p>
                        <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                            <label for="user_login">Username or email&nbsp;<span class="required">*</span></label>
                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="text"
                                name="user_login" id="user_login" autocomplete="username" aria-required="true" />
                        </p>

                        <div class="clear"></div>


                        <p class="woocommerce-form-row form-row">
                            <input type="hidden" name="wc_reset_password" value="true" />
                            <button type="submit" class="woocommerce-Button button" value="Reset password">Reset
                                password</button>
                        </p>

                        <input type="hidden" id="woocommerce-lost-password-nonce" name="woocommerce-lost-password-nonce"
                            value="4c9d65fb74" /><input type="hidden" name="_wp_http_referer"
                            value="/my-account/lost-password/" />
                    </form>
                </div>

            </article>
        </div>
    </section>
@endsection
