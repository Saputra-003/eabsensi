@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Content area -->
    <div class="content d-flex justify-content-center align-items-center">

        <!-- Registration form -->
        <form class="login-form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i
                            class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                        <h5 class="mb-0">Create account</h5>
                        <span class="d-block text-muted">All fields are required</span>
                    </div>

                    <div class="form-group text-center text-muted content-divider">
                        <span class="px-2">Your credentials</span>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Username" value="{{ old('name') }}">
                        <div class="form-control-feedback">
                            <i class="icon-user-check text-muted"></i>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}">
                        <div class="form-control-feedback">
                            <i class="icon-mention text-muted"></i>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Password Confirmation">
                        <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn bg-teal-400 btn-block">Register <i
                                class="icon-circle-right2 ml-2"></i></button>
                    </div>

                    <div class="form-group text-center text-muted content-divider">
                        <span class="px-2">Already have an account?</span>
                    </div>

                    <div class="form-group">
                        <a href="{{ route('login') }}" class="btn btn-light btn-block">Sign In</a>
                    </div>
                </div>
            </div>
        </form>
        <!-- /registration form -->

    </div>
    <!-- /content area -->
</div>
@endsection