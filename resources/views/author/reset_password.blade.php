@extends('font.layout.app')
@section('title','Reset Password')
@section('content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Reset Password</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reset Password<li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <form action="{{ route('author.reset_password_submit') }}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="login-form">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('passowrd')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Retype Password</label>
                        <input type="password" class="form-control" name="retype_password">
                        @error('retype_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary bg-website">Submit</button>
                        <a href="{{ route('author_login') }}">Back To Login</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
