@extends('layouts.website')

@php
    $title = 'My Account';
@endphp
@section('title', 'My Account')

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [];

    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <!-- main-content -->
    <div class="main-content">

        <div class="btn-sidebar-account">
            <button data-bs-toggle="offcanvas" data-bs-target="#mbAccount">
                <i class="icon icon-squaresfour"></i>
            </button>
        </div>

        <!-- my-account -->
        <section class="flat-spacing">
            <div class="container">
                <x-alert />
                <div class="my-account-wrap">
                    @include('partials.auth-sidebar')
                    <div class="my-account-content">
                        <div class="account-details">
                            <form action="{{ route('my-account.update') }}" class="form-account-details form-has-password"
                                method="post">
                                @csrf

                                <div class="account-info">
                                    <h5 class="title">Information</h5>
                                    <div class="cols mb_20">
                                        <fieldset class="">
                                            <input class="@error('first_name') is-invalid @enderror" type="text"
                                                placeholder="First Name*" name="first_name" tabindex="2"
                                                value="{{ old('first_name', auth()->user()->first_name) }}"
                                                aria-required="true" required>
                                            @error('first_name')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="">
                                            <input class="@error('last_name') is-invalid @enderror" type="text"
                                                placeholder="Last Name*" name="last_name" tabindex="3"
                                                value="{{ old('last_name', auth()->user()->last_name) }}"
                                                aria-required="true" required>
                                            @error('last_name')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="cols mb_20">
                                        <fieldset class="">
                                            <input class="@error('name') is-invalid @enderror" type="text"
                                                placeholder="Name" name="name" tabindex="4"
                                                value="{{ old('name', auth()->user()->name) }}" aria-required="true"
                                                required>
                                            @error('name')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                            <small class="text-muted">This will be how your name will be displayed in
                                                the account section and in reviews.</small>
                                        </fieldset>
                                    </div>
                                    <div class="cols mb_20">
                                        <fieldset class="">
                                            <input class="@error('email') is-invalid @enderror" type="email"
                                                placeholder="Username or email address*" name="email" tabindex="5"
                                                value="{{ old('email', auth()->user()->email) }}" aria-required="true"
                                                required>
                                            @error('email')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="account-password">
                                    <h5 class="title">Change Password (leave blank to leave unchanged)</h5>
                                    <fieldset class="position-relative password-item mb_20">
                                        <input class="input-password @error('current_password') is-invalid @enderror"
                                            type="password" placeholder="Current Password" name="current_password"
                                            tabindex="2" aria-required="true">
                                        <span class="toggle-password unshow">
                                            <i class="icon-eye-hide-line"></i>
                                        </span>
                                        @error('current_password')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </fieldset>


                                    <fieldset class="position-relative password-item mb_20">
                                        <input class="input-password @error('password') is-invalid @enderror"
                                            type="password" placeholder="New Password" name="password" tabindex="2"
                                            aria-required="true">
                                        <span class="toggle-password unshow">
                                            <i class="icon-eye-hide-line"></i>
                                        </span>
                                        @error('password')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                    <fieldset class="position-relative password-item">
                                        <input class="input-password" type="password" placeholder="Confirm Password"
                                            name="password_confirmation" tabindex="2" aria-required="true">
                                        <span class="toggle-password unshow">
                                            <i class="icon-eye-hide-line"></i>
                                        </span>
                                    </fieldset>
                                </div>
                                <div class="button-submit">
                                    <button class="tf-btn btn-onsurface" type="submit">
                                        Update Account
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /my-account -->

    </div><!-- main-content -->

@endsection
