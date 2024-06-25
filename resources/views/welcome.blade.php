@extends('layouts.front')
@section('title')
<title>Joyful</title>
@endsection
@section('css')
<link href="{{ asset('css/glide.core.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/glide.theme.min.css') }}" rel="stylesheet">
<style>
  .logo-box{
      height:566px;
  }
</style>

@endsection

@section('main')


  <section class="relative flex flex-col text-gray-700 md:flex-row lg:flex-row body-font" >
    <img src="{{asset('img/shapes/7.png')}}" alt="" width="200" height="100" class="hidden md:block md:absolute md:top-0 md:right-0">
        <div class="flex mb-10 bg-yellow-900 bg-cover shadow-md logo-box md:flex-row md:w-1/3 md:mb-0"  >
            <img src="{{asset('img/white.png')}}" alt="" class="m-auto" width="650">
        </div>
        <div
            class="relative flex flex-col items-center justify-center m-auto text-center md:w-2/3 lg:flex-grow lg:pl-24 md:pl-16 md:items-start md:text-left">


            <h1 class="mb-8 text-5xl font-bold tracking-tighter text-center text-yellow-900 uppercase lg:text-left lg:text-5xl title-font">
                Bring joy to your space.</h1>
            <p class="px-12 mb-8 text-base leading-relaxed text-center text-gray-700 xm:text-center md:pr-16 lg:pr-32 lg:text-left md:text-justify lg:text-1xl md:pl-0">
                Welcome our eco-friendly scented candles into your home and they will give both your room and your soul the warmth you need.
            </p>

            <div class="flex flex-col-reverse justify-center md:flex-row">
                <a href="/products">
                <button
                    class="flex items-center px-8 py-2 mt-auto mb-6 font-semibold text-white transition duration-500 ease-in-out transform rounded-lg shadow-xl bg-gradient-to-r from-yellow-800 hover:from-yellow-600 to-yellow-600 hover:to-yellow-800 hover:-translate-y-1 hover:scale-110 focus:ring focus:outline-none">
                    Order Me Now!
                </button>
                </a>

                    <p class="mb-6 ml-3 text-sm text-center text-gray-700 md:ml-6 md:mt-0 sm:text-left">Why palm wax?
                        <br class="hidden lg:block">
                        <a href="/palm-wax" class="inline-flex items-center font-semibold text-red-400 md:mb-2 lg:mb-0 hover:text-blue-400 ">
                            Find out.
                            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                fill="currentColor">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" /></svg>
                        </a>
                    </p>
                </div>

        </div>
    </section>
 <!--Hero section---->

    <!--Carusel Products section---->
    <section class="shadow-md bg-yellow-50 body-font"  id="about">
     <div class="relative text-gray-700">
        <img src="{{asset('img/shapes/9.png')}}" alt="" width="300" height="100" class="z-0 hidden md:absolute md:block md:bottom-0 md:right-0">
        <img src="{{asset('img/shapes/3.png')}}" alt="" width="300" height="100" class="z-0 hidden md:absolute md:block md:top-0 md:left-0">


        <div class="relative z-10 flex flex-col items-center justify-center w-full py-64 mb-12 text-center px-auto md:text-left lg:text-center">
            <h2 class="mb-1 text-xs font-semibold tracking-widest text-center text-red-400 uppercase title-font">Learn more about us!</h2>
            <h1 class="mb-4 text-5xl font-semibold tracking-tighter text-center text-gray-900 sm:text-6xl title-font wow animate__animated animate__fadeInBottomLeft" data-wow-duration="2s">
                About Joyful
                <br class="">
            </h1>
            <p class="px-16 pt-8 text-base font-medium leading-relaxed text-justify text-gray-700 lg:w-1/2"> A small business created to bring joy into people's hearts and souls. Founded by a seventeen year old girl with the intent to create a mood people can relax to after a stressful day. Each candle is made after a different atmosphere, so that you can close your eyes after you light it and be transported to a moment full of beauty.
            <br class="">
            <br class="">
            All our candles are proudly made of palm wax. Palm wax is eco-friendly and does not release toxins when burnt so that you can enjoy your candles guilt-free.
           </p>
        </div>
     </div>



     </section>
 @if ($products)
<section class="pb-16 ">
    <div class="pt-16">
        <h2 class="mb-1 text-xs font-semibold tracking-widest text-center text-red-400 uppercase title-font">Made of eco-friendly palm wax.</h2>
        <h1 class="mb-6 text-5xl font-semibold tracking-tighter text-center text-gray-900 sm:text-6xl title-font wow animate__animated animate__backInDown" data-wow-duration="2s">Our Candles</h1>

    </div>
<div class="mx-8 my-32 ">
    <div class=" glide">
        <div class=" glide glide__track" data-glide-el="track">

            <div class=" glide glide__slides">
                @foreach ($products as $product)
                <div class=" glide__slide">
                    <div class="flex flex-col justify-center mb-4 item-center" >
                        <a href="{{route('products.show', $product->id)}}" class="flex justify-center">
                            <img src="{{$product->photo[0]->getUrl('slide')}}" alt="" class="pb-5 ">
                        </a>
                    </div>

                    <div class="flex flex-col justify-center p-4 mx-auto ">
                        <h1 class="text-2xl font-bold text-center text-gray-900">{{$product->name}}</h1>
                        <h2 class="my-2 text-xs font-semibold tracking-widest text-center text-red-400 uppercase title-font">{{$product->slug}}</h2>

                        <div class="flex flex-col justify-center mt-3 md:justify-between place-items-center md:flex-row ">
                          <h1 class="text-xl font-bold text-gray-700">{{$product->price}} <small> LE</small></h1>
                          <a href="{{route('product.add',$product->id)}}" class="mt-4">
                            <button class="flex items-center px-8 py-2 mt-auto mb-6 font-semibold text-white transition duration-500 ease-in-out transform rounded-lg shadow-xl bg-gradient-to-r from-yellow-800 hover:from-yellow-600 to-yellow-600 hover:to-yellow-800 hover:-translate-y-1 hover:scale-110 focus:ring focus:outline-none">
                                <span class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />

                                      </svg>
                                </span>
                                Add to Basket
                            </button></a>
                        </div>
                      </div>

                  </div>
                @endforeach
            </div>
          </div>

      </div>
    </div>
</section>

@endif

    <!--End of Carusel Products section---->
     <!------Contact Us---->




        <div
        class="flex flex-col justify-end w-full p-20 mx-auto mt-6 text-center md:flex-row "
        id="contact"
        style="background-image:url('img/products.jpg');background-position:center;background-size:cover;background-repeat: no-repeat;height:550px; ">


            <div
            class="p-8 mx-auto mt-10 md:w-1/2 lg:w-2/6 md:ml-auto md:mt-0">
            <h2 class="mb-3 text-5xl font-semibold text-gray-700 lg:text-5xl title-font wow animate__animated animate__lightSpeedInRight">Contact Us!
            </h2>
            <p class="mb-4">For requests, inquiries, and feedback.</p>
            <div class="relative ">
               <form action="/contact" method="post" class="">
                 @csrf

                <input type="email" id="v" name="email" placeholder="email"
                    class="w-full px-4 py-2 mb-4 mr-4 text-base text-blue-700 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
            </div>
            <div class="relative ">

                <input type="name" id="name" name="name" placeholder="name"
                    class="w-full px-4 py-2 mb-4 mr-4 text-base text-blue-700 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
            </div>

            <div class="relative ">

                <textarea type="message" id="message" name="msg" placeholder="message"
                    class="w-full px-4 py-2 mb-4 mr-4 text-base text-blue-700 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                </textarea>
            </div>

            <button
                class="flex justify-center px-8 py-2 mx-auto font-semibold text-white transition duration-500 ease-in-out transform rounded-lg shadow-xl place-items-center bg-gradient-to-r from-yellow-700 hover:from-yellow-600 to-yellow-600 hover:to-yellow-700 focus:ring focus:outline-none" type="submit">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                  </svg>
                  <span class="pl-2">Send</span>
            </button>

        </form>
        </div>
        <div class="w-1/2"></div>
    </div>

<!-----End of contact us----->
@endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>

<script>
    const config={
        type: 'carousel',
        startAt: 0,

        perView:2,
        autoplay:3200,
        gap:100,
        breakpoints: {
            1024: {
            perView: 2
            },
            600: {
            perView: 1
            }
        },
        animationDuration:2000,

    }
    new Glide(".glide",config).mount()
  </script>

@endsection
