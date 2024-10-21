{{-- @extends('layouts.app')

@section('content')
<div class="container">
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
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    @vite('resources/css/app.css')

    <!---------- Favicon ---------->
    <link rel="shortcut icon" href="{{ asset('assets/Logo.png') }}" type="image/x-icon">

    <!---------- Remix Icon ---------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" />
</head>

<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">

        <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
            <div class="relative">
                <img src="https://i.pinimg.com/enabled_lo/564x/d9/66/8d/d9668dc22e2afce8fb179b60bd9ebf2b.jpg"
                    alt="img" class="w-[400px] h-full hidden rounded-l-2xl md:block object-cover" />
            </div>

            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="flex flex-col justify-center p-8 md:p-14">
                    <span class="mb-3 text-4xl font-bold">Hello, Welcome to Scoosy</span>
                    <span class="font-light text-gray-400 mb-8">
                        Please enter your details
                    </span>

                    <div class="py-4">
                        <span class="text-md">User Name</span>
                        <input type="text"
                            class="w-full p-2 border border-gray-300 rounded-xl placeholder:font-light placeholder:text-gray-500"
                            name="name" id="name" placeholder="User Name" required autocomplete="name" autofocus
                            value="{{ old('name') }}" />

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="py-4">
                        <span class="text-md">Email</span>
                        <input type="text"
                            class="w-full p-2 border border-gray-300 rounded-xl placeholder:font-light placeholder:text-gray-500"
                            name="email" id="email" placeholder="Email" value="{{ old('email') }}" required
                            autocomplete="email" />

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="py-4">
                        <span class="text-md">Password</span>
                        <input type="password" name="password" id="pass" placeholder="Password"
                            class="w-full p-2 border border-gray-300 rounded-xl placeholder:font-light placeholder:text-gray-500"
                            required autocomplete="new-password" />

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="py-4">
                        <span class="text-md">Confrim Password</span>
                        <input type="password" name="password_confirmation" required autocomplete="new-password"
                            id="pass" placeholder="Confrim password"
                            class="w-full p-2 border border-gray-300 rounded-xl placeholder:font-light placeholder:text-gray-500" />
                    </div>

                    <button type="submit" class="bg-main-color rounded-xl text-white py-2 hover:bg-opacity-70 duration-300">Sign
                        Up</button>
                    <div class="grid grid-cols-3 items-center text-gray-400 mb-3 mt-3">
                        <hr class="border-gray-400">
                        <p class="text-center text-sm">OR</p>
                        <hr class="border-gray-400">
                    </div>

                    <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
                        <p>I have account</p>
                        <a href="{{ route('login') }}" class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">Sign
                            In</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

</body>

</html>
