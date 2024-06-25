@extends('layouts.front')
@section('main')



                <!-- Col -->
                <div class="relative flex w-full overflow-hidden sm:h-full md:h-screen md:mb-0">
                    <img src="{{asset('img/shapes/2.png')}}" alt="" width="300" class="z-0 hidden md:block md:absolute md:top-0 md:left-0 md:h-screen">
                    <img src="{{asset('img/shapes/2.png')}}" alt="" width="350" class="z-0 hidden transform rotate-180 md:block md:absolute md:top-0 md:right-0 md:h-screen">
                    <div class="flex flex-col items-center justify-center w-full bg-white ">


                    <section class="my-8 text-gray-700 body-font">
                            <div class="container px-8 py-8 mx-auto lg:px-4">
                                <div class="flex flex-col w-full my-12 text-left lg:text-center">
                                    <h2 class="pt-10 mb-1 text-xs font-semibold tracking-widest text-center text-red-400 uppercase title-font">Why Palm Wax?</h2>
                                    <h1 class="mb-6 text-5xl font-semibold tracking-tighter text-center text-black sm:text-6xl title-font">
                                        Palm Wax and
                                        <br class="">
                                       Its Benefits
                                    </h1>
                                    <p class="mx-auto text-base font-bold leading-relaxed text-justify text-gray-900 lg:w-1/2"><br class="">
                                        What is palm wax? </p>
                                        <p class="mx-auto text-base font-medium leading-relaxed text-justify text-gray-700 lg:w-1/2"> Wax is the main material of a candle that melts when the candle is burnt. Most of the candles you see, like birthday candles, are made of a wax called paraffin, which releases harmful chemicals when burnt.
                                        <br class="">
                                        <br class="">
                                        All our candles are proudly made of palm wax. Palm wax is eco-friendly and does not release toxins when burnt so that you can enjoy your candles guilt-free.
                                        <br class="">
                                        <br class="">
                                        <p class="mx-auto text-base font-bold leading-relaxed text-justify text-gray-900 lg:w-1/2">Why palm wax? </p>
                                        <p class="pb-4 mx-auto text-base font-medium leading-relaxed text-justify text-gray-700 lg:w-1/2">Palm wax burns clean. It has a bright, steady flame that produces no soot or smoke when burnt.
                                        It gives a strong, lasting scent, and is also known to burn for longer than other waxes, such as paraffin and soy.
                                        <br class="">
                                        <br class="">
                                        Although soy wax is also a good option, it is much more expensive. Palm wax keeps our candles affordable yet still eco-friendly.

                     </p>
                                </div>
                                <!----taking care of palm wax--->

                        </section>




                    </div>
                  <!--  <div class="absolute right-0 bottom-64 max-h-32">
                        <img src="{{asset('img/shapes/8.png')}}" alt="background" class="transform rotate-180">
                    </div>

                 <!--   <img src="{{asset('img/full-logo.png')}}" alt="background" class="object-cover object-center w-4/12 h-screen">-->
                    </div>

@endsection
