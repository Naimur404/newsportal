@extends('font.layout.app')
@section('title','Forget Password')
@section('content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Forget Password</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Forget Password<li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <form action="{{ route('author.forget_pass_submit') }}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="login-form">
                    <div class="mb-3">
                        <label for="" class="form-label">Email Address</label>
                        <input type="text" class="form-control" name="email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary bg-website">Send Reset Password Link</button>
                        <a href="{{ route('author_login') }}">Back To Login</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
