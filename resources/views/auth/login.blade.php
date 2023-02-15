@extends('layouts.auth')
@section('css')
<style>
*,
*::after,
*::before {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.main-wrapper {
  display: flex;
  flex-direction: column;
}
.wrapper {
  display: flex;
  justify-content: center;
  align-content: center;
  /* min-height: 100vh; */
  align-items: center;
}

.loginContainer {
  align-self: flex-start;
  margin-top: 67px;
  min-width: 45%;
  max-width: 50%;
  padding: 30px;
  box-shadow: 0 0 32px -19px lightslategrey;
  border-radius: 10px;
}

.loginForm-header {
  display: flex;
  justify-content: space-between;
}

.loginForm-header .newUser-actions {
  display: flex;
  flex-direction: column;
  color: rgba(0, 0, 0, 0.5);
  font-size: 0.7rem;
}
.newUser-actions .newUser-signup {
  font-weight: bold;
  font-size: 1rem;
}
label {
  font-weight: 400 !important;
}
input::placeholder {
  color: lightslategray !important;
  font-size: 0.7rem;
}
.loginContainer-header {
  font-size: 34px;
  font-weight: 500;
  line-height: 41px;
  letter-spacing: 0em;
  text-align: left;
  margin-bottom: 25px;
}

.btnsignIn {
  margin-top: 20px;
}
.btn-lg {
  padding: 0.3rem 1rem !important;
}
.logo-image--container{
    display: flex;
    justify-content: center;
}
</style>
@endsection
@section('content')
<div class="main-wrapper">
      <header class="header">
        <div class="container logo-image--container">
          <img
            src="{{asset('images/image.png')}}"
            alt=""
            width="250px"
            height="auto"
            class="logo-image img-responsive"
          />
        </div>
      </header>
      <div class="container wrapper">
        <section class="loginContainer">
          <div class="loginForm-header">
            <h3 class="loginContainer-header">Login</h3>
            <div class="newUser-actions">
              <span>New User ?</span>
              <a href="{{route('register')}}" class="newUser-signup text-info">Sign up</a>
            </div>
          </div>
          <form method="POST" action="{{ route('login') }}">
          @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input
                type="email"
                name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        placeholder="Email"
              />
              @error('email')
                        <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group ">
              <label for="exampleInputPassword1">Password</label>
              <input
                type="password"
                name="password"
                        class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password"
              />
              @error('email')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
              <!-- <small id="emailHelp" class="form-text text-muted text-right"
                >Forgot your password?</small
              > -->
            </div>
            <button type="button" class="btn btn-outline-info btn-lg btn-block">
              Login
            </button>
            
            <!-- <button
              type="submit"
              class="btn btn-outline-primary btn-lg btn-block"
            >
              Register with Gmail
            </button> -->
          </form>

          <small class="form-text text-muted text-center mt-3" style="color: black !important; font-weight: bold"
                >OR</small
              >
            <div style="text-align: center">
                <a href="{{route('google.login')}}" class="text-info mt-2">
                    <button class="btn bg-danger text-white"><i class="fa-brands fa-google mx-1"></i> Sign In With Google</button>
                </a>
            </div>
        </section>
      </div>
    </div>
@endsection
