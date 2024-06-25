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


                <section class="flex flex-col w-screen h-screen text-gray-700 md:flex-row lg:flex-row body-font">
                <img src="{{asset('img/shapes/7.png')}}" alt="" width="200"  class="hidden md:block md:absolute md:top-0 md:right-0">


                    <div class="flex bg-yellow-900 bg-cover shadow-md logo-box md:flex-row md:w-5/12 md:mb-0">
                        <img src="{{asset('img/white.png')}}" alt="" class="" >
                    </div>
                    <div
                        class="relative flex flex-col items-center justify-center text-center md:w-7/12 lg:flex-grow ">

                        <img src="{{asset('img/shapes/3.png')}}" alt="" width="300" class="z-0 hidden md:absolute md:block md:top-0 md:left-0">


                        <div class="w-full mt-8 text-center ">
                            <h1 class="pb-4 text-2xl font-bold tracking-tighter text-center text-gray-900 uppercase lg:text-left lg:text-5xl title-font">Thank You! </h1>
                            <p class="py-2 text-xl text-gray-500">Your order is placed.</p>
                               <p class="text-xl text-gray-500">We sent you a confirmation email.</p>

                        </div>
                      <div class="divide-x-4"></div>
                        <div class="flex items-center justify-center w-full px-5 py-5">

                            <a href="/" class="flex px-10 py-2 text-white transition-colors bg-yellow-700 border-l-8 border-yellow-500 rounded-full hover:bg-yellow-800">
                                <span class="pr-2"> <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                  </svg></span>
                                Back to Home
                            </a>
                        </div>
                      </div>
                    </section>

                <img src="{{asset('img/shapes/9.png')}}" alt="" width="300" height="100" class="z-0 hidden md:absolute md:block md:bottom-0
@endsection


