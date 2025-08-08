@extends('admin.auth.layouts.app')

@php
    $title = 'Forget Password';
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
            <x-alert />
            <div class="login-wrap">
                <div class="left">
                    <div class="heading">
                        <h4>Forget Password</h4>
                    </div>
                    <form method="POST" action="{{ route('password.email') }}" class="form-login form-has-password">
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
                        </div>
                        <div class="button-submit">
                            <button class="tf-btn btn-onsurface" type="submit">
                                Email Password Reset Link
                            </button>
                        </div>
                    </form>
                </div>
                <div class="right">
                    <h4 class="mb_8">Forget Your Password?</h4>
                    <p class="text-secondary text-body-default">No problem. Just let us know your
                        email address and we will email you a password reset link that will allow you to choose a new one..
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection
