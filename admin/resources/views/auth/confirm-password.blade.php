@extends('admin.auth.layouts.app')

@php
    $title = 'Confirm Password';
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
                    <form method="POST" action="{{ route('password.confirm') }}" class="form-login form-has-password">
                        @csrf

                        <div class="wrap">

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
                        </div>
                        <div class="button-submit">
                            <button class="tf-btn btn-onsurface" type="submit">
                                Confirm
                            </button>
                        </div>
                    </form>
                </div>
                <div class="right">
                    <h4 class="mb_8">Why need?</h4>
                    <p class="text-secondary text-body-default">This is a secure area of the application. Please confirm
                        your password before continuing.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
