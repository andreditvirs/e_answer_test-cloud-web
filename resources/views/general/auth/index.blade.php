@extends('general.layouts.masterAuth')
@section('title')
    Login Page
@endsection
@section('content')
<div class="animate form login_form">
    <section class="login_content">
        <form method="POST" action="{{ route('general.auth.login') }}">
            @csrf
            <h1>LOGIN</h1>
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    <p class="text-left m-0">{{ session()->get('error') }}</p>
                </div>
            @endif
            <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required />
            </div>
            <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required />
            </div>
            <div>
                <button type="submit" class="btn btn-secondary w-100">Log In</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                <h1><i class="fa fa-file"></i> {{ env('APP_NAME') }}</h1>
                <p>©2022 All Rights Reserved. {{ env('APP_NAME') }}! is a electronic answer paper based. Privacy and Terms</p>
                </div>
            </div>
        </form>
    </section>
</div>
@endsection
