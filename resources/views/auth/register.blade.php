<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../css/SignUp.css" />
    <!-- Boostrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
<main class="container-md my-auto bg-body-tertiary pb-3 pt-5">
    <div class="row row-cols-2">
        <!--Image Container-->
        <div class="col mt-auto d-none d-lg-block my-auto">
            <img
            class="img-fluid pt-3"
            src="../assets/signUp2.svg"
            id="signUpVect"
            />
        </div>
        <!--Image Container-->

        <!--Form Container-->
            <div class="col col-12 col-lg-6">
                <div class="row mt-sm-5">
                        <h1 class="text-wrap">Account Details</h1>
                    <small class="mb-2">Personal Information</small>
                </div>

                <form onsubmit="signUp()" class="form" id="form-true" action="{{ route('register') }}" method="POST">
                @csrf
                        <div class="row row-cols-1 row-cols-md-2 name_row">
                            <div class="col mb-2">
                                <div class="form-floating">
                                    <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="fname"
                                    placeholder="Put First Name Here"
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    required 
                                    autocomplete="name" 
                                    autofocus
                                    />
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <label for="fname">First Name</label>
                                </div>
                            </div>

                            <div class="col mb-2">
                                <div class="form-floating">
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="lname"
                                    name="lname"
                                    placeholder="Put Last Name Here"
                                    value="{{ old('lname') }}"
                                    required
                                    disabled
                                    />
                                    <label for="fname">Last Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="row email_row">
                            <div class="col mb-2">
                                <div class="form-floating">
                                    <input
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    placeholder="Put Email Here"
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="email"
                                    />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="email">Email</label>
                                </div>
                            </div>
                        </div>

                        <div class="row password_row">
                            <div class="col mb-2">
                                <div class="form-floating">
                                    <input
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                    onchange=""
                                    placeholder="Put Password Here"
                                    onchange=""
                                    name="password" 
                                    required 
                                    autocomplete="new-password"
                                    />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="password">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="row conf_password_row">
                            <div class="col mb-2" id="conf_password_row">
                                <div class="form-floating">
                                    <input
                                    type="password"
                                    class="form-control"
                                    id="conf-password"
                                    onchange="passCheck()"
                                    placeholder="Confirm Password Here"
                                    name="password_confirmation" 
                                    required 
                                    autocomplete="new-password"
                                    />
                                    <div class="invalid-feedback">Password Do not match</div>
                                    <label for="conf-password">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="row phone_number_row">
                            <div class="col mb-2">
                                <div class="form-floating">
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="phone-number"
                                    required
                                    name="phone"
                                    placeholder="Put Phone Number Here"
                                    onchange="phoneCheck()"
                                    value="{{ old('phone') }}"
                                    />
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="invalid-feedback">Invalid Phone Number</div>
                                    <label for="phone-number">Phone Number</label>
                                </div>
                            </div>
                        </div>
                        <div class="row address_row">
                            <div class="col mb-2">
                                <div class="form-floating">
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    placeholder="Put Address Here"
                                    required
                                    name="address"
                                    value="{{ old('address') }}"
                                    disabled
                                    />
                                    <label for="address">Address</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="form-label">Select Account Type: </label>
                            <div class="col mb-2">
                                <div class="form-check">
                                    <input
                                    class="form-check-input"
                                    type="radio"
                                    id="farmer-type"
                                    onchange="radioChange('farmer')"             
                                    name="user_type"
                                    value="2"

                                    />
                                    <label class="form-check-label" for="farmer-type">
                                    Farmer
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input
                                    class="form-check-input"
                                    type="radio"
                                    name="user_type"
                                    id="consumer-type"
                                    onchange="radioChange('consumer')"
                                    value="3"

                                    />
                                    <label class="form-check-label" for="consumer-type">
                                    Consumer
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row file_row">
                            <div class="col mb-3">
                                <label
                                    for="credentials"
                                    class="form-label"
                                    id="credentials-label"
                                    >Upload File:
                                </label>
                            <input
                                type="file"
                                class="form-control"
                                id="credentials"
                                
                                name="validation_img1"
                                value="{{ old('validation_img1') }}"
                                disabled
                            />
                            </div>
                        </div>
                        <div class="row pic_row">
                            <div class="col mb-3">
                                <label
                                    for="credentials"
                                    class="form-label"
                                    id="credentials-label"
                                    >Upload Profile Picture:
                                </label>
                            <input
                                type="file"
                                class="form-control"
                                id="pic-sign-up"
                                accept="image/png, image/jpeg"
                                
                                name="validation_img2"
                                value="{{ old('validation_img2') }}"
                                disabled
                            />
                            </div>
                        </div>
                        <div class="row submit_row">
                            <div class="col mb-2">
                                <button
                                    type="submit"
                                    class="btn btn-success w-100 fs-5"
                                    id="form-submit"
                                >
                                    Sign Up
                                </button>
                            </div>
                        </div>
                </form>
                <div class="row mb-3">
                    <div class="col text-center">
                        <small class="text-center">By clicking Sign Up, you agree to our
                            <a href="">Terms and Conditions</a>
                        </small>
                    </div>
                </div>
                <small
                >Already have an account? <a href="{{ route('login') }}">Log In</a></small
                >
            </div>
        <!--Form Container-->
    </div>
    <script src="../js/signUp.js"></script>
</main>
</body>
</html>
<!--Main Div-->
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 -->