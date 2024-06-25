@extends('layouts.auth')
@section('content')

<!-- component -->

    <!-- Container -->




              <!---error message--->
        @if(session('message'))
        <div class="alert alert-info" role="alert">
            {{ session('message') }}
        </div>
        @endif
            <!-- Row -->

                <!-- Col -->
                <div class="flex w-full h-screen">
                    <img src="https://images.unsplash.com/photo-1540569876033-6e5d046a1d77?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="background" class="object-cover object-center w-7/12 h-screen">
                    <div class="flex flex-col items-center justify-center w-5/12 bg-white shadow-lg">
                <!-- Col -->

                    <h3 class="pt-4 text-2xl text-center">Welcome Back!</h3>
                    <form class="w-1/2 pt-8"  method="POST" action="{{ route('login') }}">
                            @csrf
                        <div class="mb-4">

                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline form-control{{ $errors->has('email') ? ' is-invalid' : '' }}
                                id="email" name="email" type="text" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}"
                            />
                            <!---error email---->
                            @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-4">
                            
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                id="password" name="password" type="password" required placeholder="{{ trans('global.login_password') }}"
                            />
                          <!----error for password--->
                        @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                       @endif
                        </div>
                        <div class="mb-4">
                            <input class="mr-2 leading-tight"  name="remember" type="checkbox" id="remember" " />
                            <label class="text-sm" for="checkbox_id">
                                Remember Me
                            </label>
                        </div>
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="submit">

                                Sign In
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />
                        <div class="text-center">
                            <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href=href="{{ route('register') }}"

                            >
                                Create an Account!
                            </a>
                        </div>
                        <div class="text-center">
                            @if(Route::has('password.request'))
                            <a class="px-0 btn btn-link" href="{{ route('password.request') }}">
                                {{ trans('global.forgot_password') }}
                            </a><br>
                        @endif

                        </div>

                    </form>
                </div>
                    </div>

@endsection
