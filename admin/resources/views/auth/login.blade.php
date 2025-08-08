@extends('admin.auth.layouts.app')

@php
    $title = 'Login';
@endphp
@section('title', $title)

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [];

    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <section class="flat-spacing">
        <div class="container">
            <div class="login-wrap">
                <div class="left">
                    <div class="heading">
                        <h4>{{ $title }}</h4>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="form-login form-has-password">
                        @csrf

                        <div class="wrap">
                            <fieldset class="">
                                <input class="@error('email') is-invalid @enderror" type="email"
                                    placeholder="Email address*" name="email" value="{{ old('email') }}" tabindex="2"
                                    aria-required="true" required>
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <fieldset class="position-relative password-item">
                                <input class="input-password @error('password') is-invalid @enderror" type="password"
                                    placeholder="Password*" name="password" tabindex="2" aria-required="true" required>
                                <span class="toggle-password unshow">
                                    <i class="icon-eye-hide"></i>
                                </span>
                                @error('password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="tf-cart-checkbox">
                                    <div class="tf-checkbox-wrapp">
                                        <input class="" type="checkbox" id="login-form_agree" name="remember">
                                        <div>
                                            <i class="icon-check"></i>
                                        </div>
                                    </div>
                                    <label for="login-form_agree">Remember me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" class=" text-button forget-password link">Forgot
                                    Your Password?</a>
                            </div>
                        </div>
                        <div class="button-submit">
                            <button class="tf-btn btn-onsurface" type="submit">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
                <div class="right">
                    <h4 class="mb_8">New Customer</h4>
                    <p class="text-secondary text-body-default">Be part of our growing family of new customers!
                        Join us today and unlock a world of exclusive benefits, offers, and personalized
                        experiences.</p>
                    <a href="{{ route('register') }}" class="tf-btn btn-onsurface">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
