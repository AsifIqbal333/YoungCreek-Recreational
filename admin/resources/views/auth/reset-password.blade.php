@extends('admin.auth.layouts.app')

@php
    $title = 'Reset Password';
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
                    <form method="POST" action="{{ route('password.store') }}" class="form-login form-has-password">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="wrap">
                            <fieldset class="">
                                <input class="@error('email') is-invalid @enderror" type="email"
                                    placeholder="Email address*" name="email" value="{{ old('email', $request->email) }}"
                                    tabindex="4" aria-required="true" required>
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
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
                <div class="right">
                    <h4 class="mb_8">Don't need to update password?</h4>
                    <p class="text-secondary text-body-default">Sign in back to access your
                        personalized experience, saved preferences, and more. We're thrilled to have you with us again!</p>
                    <a href="{{ route('login') }}" class="tf-btn btn-onsurface">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
