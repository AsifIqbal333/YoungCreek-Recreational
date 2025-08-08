@extends('layouts.website')

@php
    $title = 'Verify Email Address';
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
                        <h4>{{ $title }}</h4>
                    </div>
                    <form method="POST" action="{{ route('verification.send') }}" class="form-login form-has-password">
                        @csrf

                        <div class="button-submit">
                            <button class="tf-btn btn-onsurface" type="submit">
                                Resend Verification Email
                            </button>
                        </div>
                    </form>
                </div>
                <div class="right">
                    <h4 class="mb_8">Verify Email</h4>
                    <p class="text-secondary text-body-default">Thanks for signing up! Before getting started, could you
                        verify your email address by clicking on the link we just emailed to you? If you didn't receive the
                        email, we will gladly send you another.</p>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="tf-btn btn-onsurface">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
