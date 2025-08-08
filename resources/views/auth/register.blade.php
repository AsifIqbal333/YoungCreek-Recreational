@extends('layouts.website')

@php
    $title = 'Regsiter';
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
                        <h4>Register</h4>
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="form-login form-has-password">
                        @csrf

                        <div class="wrap">
                            <fieldset class="">
                                <input class="@error('first_name') is-invalid @enderror" type="text"
                                    placeholder="First Name*" name="first_name" tabindex="2" aria-required="true"
                                    value="{{ old('first_name') }}" required>
                                @error('first_name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <fieldset class="">
                                <input class="@error('last_name') is-invalid @enderror" type="text"
                                    placeholder="Last Name*" name="last_name" value="{{ old('last_name') }}" tabindex="3"
                                    aria-required="true" required>
                                @error('last_name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <fieldset class="">
                                <input class="@error('email') is-invalid @enderror" type="email"
                                    placeholder="Email address*" name="email" value="{{ old('email') }}" tabindex="4"
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
                            <fieldset class="position-relative password-item">
                                <input class="input-password" type="password" placeholder="Confirm Password*"
                                    name="password_confirmation" tabindex="2" aria-required="true" required>
                                <span class="toggle-password unshow">
                                    <i class="icon-eye-hide"></i>
                                </span>
                            </fieldset>
                        </div>
                        <div class="button-submit">
                            <button class="tf-btn btn-onsurface" type="submit">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
                <div class="right">
                    <h4 class="mb_8">Already have an account?</h4>
                    <p class="text-secondary text-body-default">Welcome back. Sign in to access your
                        personalized experience,
                        saved preferences, and more. We're thrilled to have you with us again!</p>
                    <a href="{{ route('login') }}" class="tf-btn btn-onsurface">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
