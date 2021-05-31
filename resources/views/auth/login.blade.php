@extends('layouts.auth')

@section('content')
<div class="container-fluid login-main-bg">
  <div class="row">
    <div class="col-12">
      <div class="login-main-box">
        <div class="row">
          <div class="col-md-6 col-12">

            <div class="login-image-box">
              <div class="logo-set-box">
                <p>E-Book Portal</p>
              </div>
              <img src="{{asset('tabler/dist/img/background/login2.png')}}" alt="">
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="login-form-box">
              <div class="login-title-box">
                <h1>Welcome to E-Book Portal</h1>
              </div>
              <div class="log-reg-tab">
                <form class="login-form" action="{{ route('login') }}" method="POST" autocomplete="off">
                  @csrf

                  <div class="">


                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" class="form-control" placeholder="Enter email" name="email" id="email"
                        value="{{old('email')}}" required autofocus>
                    </div>

                    <div class="mb-2">
                      <label class="form-label">
                        Password
                      </label>

                      <div class="input-group input-group-flat">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                          required autocomplete="current-password">
                        <span class="input-group-text">
                          <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                            <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                              viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <circle cx="12" cy="12" r="2" />
                              <path
                                d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                            </svg>
                          </a>
                        </span>
                      </div>
                    </div>

                    <!-- Remember Me -->



                    <div class="form-footer">
                      <button type="submit" class="btn btn-primary w-100">{{__("Login")}}</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection