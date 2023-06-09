@extends('auth.layouts.app')
@section('content')
<div class="row justify-content-center">
    @if (session('error'))
    <span class="text-danger"> {{ session('error') }}</span>
@endif
    <form method="POST" action="{{ route('login') }}">
        @csrf	
					
       
        <span class="login100-form-title p-b-34 p-t-27">
                Log in
            </span>

            <div class="wrap-input100 validate-input" data-validate="Enter username">
                <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address.">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter password">
                <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input class="custom-control-input" type="checkbox" name="remember" id="customCheck" {{ old('remember') ? 'checked' : '' }}>

                    <label class="custom-control-label" for="customCheck">Remember
                        Me</label>
                </div>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn" value="enter" type="submit">
                    Login
                </button>
            </div>

           
            <?php
            ?>
        </form>

   
@endsection