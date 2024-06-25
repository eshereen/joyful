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

                    <h3 class="pt-4 pb-6 text-4xl text-center text-yellow-800">Join Our Family!</h3>
                    <form method="POST" action="{{ route('register') }}" class="w-1/2">

                            @csrf
                        <div class="mb-4">

                            <input
                                type="text"
                                class="w-full px-3 py-2 text-sm leading-tight text-yellow-800 border rounded shadow appearance-none focus:outline-none focus:shadow-outline form-control"
                                id="name" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                        </div>
                        <div class="mb-4">


                                <input type="email" name="email" class="form-control w-full px-3 py-2 mb-3 text-sm leading-tight text-yellow-800 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                        </div>
                        <div class="mb-4">
                            <input type="password" name="password" class="form-control w-full px-3 py-2 mb-3 text-sm leading-tight text-yellow-800 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.login_password') }}">
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <!----confirm Pasword--->
                        <div class="mb-4">
                        <input type="password" name="password_confirmation" class="w-full px-3 py-2 mb-3 text-sm leading-tight text-yellow-800 border border-red-500 rounded shadow appearance-none form-control focus:outline-none focus:shadow-outline" required autofocus placeholder="{{ trans('global.login_password_confirmation') }}">
                        </div>

                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-yellow-800 rounded-md hover:bg-yellow-700 focus:outline-none focus:shadow-outline"
                                type="submit">
                                {{ trans('global.register') }}
                            </button>
                        </div>



                    </form>
                </div>
            </div>

@endsection





