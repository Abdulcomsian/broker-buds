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
            src="./images/image.png"
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
            <h3 class="loginContainer-header">Sign Up</h3>
            <div class="newUser-actions">
              <span>Existing User ?</span>
              <a href="{{'login'}}" class="newUser-signup text-info">Login</a>
            </div>
          </div>
          <form method="POST" action="{{ route('register') }}">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">First Name</label>
                <input
                name="firstName" 
                class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                value="{{ old('name') }}" 
                placeholder="Enter first name"
                />
                @error('name')
                        <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Last Name</label>
                <input
                name="lasttName" 
                class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                value="{{ old('name') }}" 
                placeholder="Enter last name"
                />
              </div>
              @error('name')
                        <span class="error invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email Address</label>
              <input
                type="email"
                name="email" 
                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" 
                placeholder="Enter email address"
              />
              @error('email')
                <span class="error invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Phone Number</label>
              <input
                type="text"
                name="phoneNumber" 
                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" 
                placeholder="Enter Phone Number"
              />
              @error('email')
                <span class="error invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input
                type="password"
                name="password" 
                class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}" 
                placeholder="Enter Password"
              />
              @error('email')
                <span class="error invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <!-- <small id="emailHelp" class="form-text text-muted"
              >By registering you are agree to the
              <a href="#">Terms and Conditions</a>.</small
            > -->
            <a
              href="login.html"
              type="submit"
              class="btn btn-outline-info btn-lg btn-block btnsignIn"
            >
              Sign in
            </a>
          </form>
        </section>
      </div>
    </div>
@endsection
