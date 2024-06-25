@extends('layouts.front')
@section('main')

              <!---error message--->
        @if(session('message'))
        <div class="alert alert-info" role="alert">
            {{ session('message') }}
        </div>
        @endif
            <!-- Row -->

                <!-- Col -->
                <div class="relative flex w-full h-screen pt-6 overflow-hidden">
                    <img src="{{asset('img/shapes/2.png')}}" alt="" width="300" class="z-0 hidden md:block md:absolute md:top-0 md:left-0 md:h-screen">
                    <img src="{{asset('img/shapes/2.png')}}" alt="" width="350" class="z-0 hidden transform rotate-180 md:block md:absolute md:top-0 md:right-0 md:h-screen">
                    <div class="flex flex-col items-center justify-center w-full bg-white ">


                    <section class="text-gray-700 body-font">
                            <div class="container px-8 mx-auto py-36 lg:px-4">
                                <div class="flex flex-col w-full mb-12 text-left lg:text-center">
                                    <h2 class="mb-1 text-xs font-semibold tracking-widest text-center text-red-400 uppercase title-font">Learn More About Us!</h2>
                                    <h1 class="pb-4 mb-6 text-5xl font-semibold tracking-tighter text-center text-black sm:text-6xl title-font">
                                        About Joyful
                                    </h1>
                                    <p class="mx-auto text-base font-medium leading-relaxed text-justify text-gray-700 lg:w-1/2">A small business created to bring joy into people's hearts and souls. Founded by a seventeen year old girl with the intent to create a mood people can relax to after a stressful day. Each candle is made after a different atmosphere, so that you can close your eyes after you light it and be transported to a moment full of beauty.
                                        <br class="">
                                        <br class="">
                                        All our candles are proudly made of palm wax. Palm wax is eco-friendly and does not release toxins when burnt so that you can enjoy your candles guilt-free.
                    </p>
                                </div>
                        </section>



                    </div>
                  <!--  <div class="absolute right-0 bottom-64 max-h-32">
                        <img src="{{asset('img/shapes/8.png')}}" alt="background" class="transform rotate-180">
                    </div>

                 <!--   <img src="{{asset('img/full-logo.png')}}" alt="background" class="object-cover object-center w-4/12 h-screen">-->
                    </div>

@endsection
