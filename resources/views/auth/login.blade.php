{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')

    <!---------- Favicon ---------->
    <link rel="shortcut icon" href="{{ asset('assets/Logo.png') }}" type="image/x-icon">
</head>

<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="flex flex-col justify-center p-8 md:p-14">
                    <span class="mb-3 text-4xl font-bold">Welcome back to Scoosy</span>
                    <span class="font-light text-gray-400 mb-8">
                        Welcom back! Please enter your details
                    </span>
                    <div class="py-4">
                        <span class="mb-2 text-md">{{ __('Email Address') }}</span>
                        <input type="text"
                            class="w-full p-2 border border-gray-300 rounded-xl placeholder:font-light placeholder:text-gray-500"
                            name="email" id="email" placeholder="Your Email" value="{{ old('email') }}" required
                            autocomplete="email" autofocus />

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="py-4">
                        <span class="mb-2 text-md">{{ __('Password') }}</span>
                        <input type="password" name="password" id="pass" placeholder="Your Password"
                            class="w-full p-2 border border-gray-300 rounded-xl placeholder:font-light placeholder:text-gray-500"
                            required autocomplete="current-password" />

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="bg-main-color rounded-xl text-white py-2 hover:bg-opacity-70 duration-300">Sign
                        In</button>
                    <div class="grid grid-cols-3 items-center text-gray-400 mb-3 mt-3">
                        <hr class="border-gray-400">
                        <p class="text-center text-sm">OR</p>
                        <hr class="border-gray-400">
                    </div>

                    <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
                        <p>Don't have an account?</p>
                        <a href="{{ route('register') }}" class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">Sign
                            Up</a>
                    </div>
                </div>
            </form>

            <div class="relative">
                <img src="https://i.pinimg.com/enabled_lo/564x/d9/66/8d/d9668dc22e2afce8fb179b60bd9ebf2b.jpg"
                    alt="img" class="w-[400px] h-full hidden rounded-r-2xl md:block object-cover" />
            </div>
        </div>
    </div>

</body>

</html>
