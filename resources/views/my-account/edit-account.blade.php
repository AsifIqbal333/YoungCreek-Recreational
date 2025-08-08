@extends('layouts.account')

@section('title', 'My Account')
@section('style')
    <style>
        .zf-errorMessage,
        .required {
            color: red;
        }
    </style>
@endsection

@section('content')
    <header class="masthead masthead--innerpage" id="masthead">
        <div class="container container-fluid">
            <div class="masthead-content">
                <h1 class="page-title">
                    My Account </h1>

                <div class="breadcrumbs" id="breadcrumbs"><span><span><a
                                href="{{ str_replace('/public', '', url('/')) }}">Homes</a></span> <span
                            class="separator">|</span>
                        <span class="breadcrumb_last" aria-current="page">My Account</span></span></div>
            </div>
        </div>
    </header>

    <section class="section section--highlight container container--fluid contact">
        <div class="row">

            <article class="page-article col-xxs-12">
                <x-alert />
                <div class="woocommerce">
                    @include('layouts.website.auth-navigation')


                    <div class="woocommerce-MyAccount-content">
                        <div class="woocommerce-notices-wrapper"></div>
                        <form class="woocommerce-EditAccountForm edit-account"
                            action="{{ route('my-account.edit-account.update') }}" method="post" siq_id="autopick_4950">
                            @csrf
                            @php
                                $user = auth()->user();
                            @endphp

                            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                <label for="first_name">First name&nbsp;<span class="required">*</span></label>
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                    name="first_name" id="first_name" autocomplete="given-name"
                                    value="{{ old('first_name', $user->first_name) }}">
                            </p>
                            @error('first_name')
                                <p class="zf-errorMessage">{{ $message }}</p>
                            @enderror

                            <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                <label for="last_name">Last name&nbsp;<span class="required">*</span></label>
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                    name="last_name" id="last_name" autocomplete="family-name"
                                    value="{{ old('last_name', $user->last_name) }}">
                            </p>
                            @error('last_name')
                                <p class="zf-errorMessage">{{ $message }}</p>
                            @enderror
                            <div class="clear"></div>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="display_name">Display name&nbsp;<span class="required">*</span></label>
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                    name="name" id="display_name" value="{{ old('name', $user->name) }}">
                                <span><em>This will be how your name will be displayed in the account section and in
                                        reviews</em></span>
                            </p>
                            @error('name')
                                <p class="zf-errorMessage">{{ $message }}</p>
                            @enderror
                            <div class="clear"></div>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="email">Email address&nbsp;<span class="required">*</span></label>
                                <input type="email" class="woocommerce-Input woocommerce-Input--email input-text"
                                    name="email" id="email" autocomplete="email"
                                    value="{{ old('email', $user->email) }}">
                            </p>
                            @error('email')
                                <p class="zf-errorMessage">{{ $message }}</p>
                            @enderror

                            <fieldset>
                                <legend>Password change </legend>

                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password_current">Current password (leave blank to leave unchanged)</label>
                                    <span class="password-input"><input type="password"
                                            class="woocommerce-Input woocommerce-Input--password input-text"
                                            name="current_password" id="password_current" autocomplete="off"><span
                                            class="show-password-input"></span></span>
                                </p>
                                @error('current_password')
                                    <p class="zf-errorMessage">{{ $message }}</p>
                                @enderror
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password_1">New password (leave blank to leave unchanged)</label>
                                    <span class="password-input"><input type="password"
                                            class="woocommerce-Input woocommerce-Input--password input-text" name="password"
                                            id="password_1" autocomplete="off"><span
                                            class="show-password-input"></span></span>
                                </p>
                                @error('password')
                                    <p class="zf-errorMessage">{{ $message }}</p>
                                @enderror
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password_2">Confirm new password</label>
                                    <span class="password-input"><input type="password"
                                            class="woocommerce-Input woocommerce-Input--password input-text"
                                            name="password_confirmation" id="password_2" autocomplete="off"><span
                                            class="show-password-input"></span></span>
                                </p>
                            </fieldset>
                            <div class="clear"></div>
                            <p><button type="submit" class="woocommerce-Button button" name="save_account_details"
                                    value="Save changes">Save
                                    changes</button>
                            </p>

                        </form>

                    </div>
                </div>

            </article>
        </div>
    </section>

@endsection
