@extends('layouts.front')
@section('title')
<title>Joyful</title>
@endsection
@section('css')
<link href="{{ asset('css/glide.core.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/glide.theme.min.css') }}" rel="stylesheet">
<style>
     .glide__arrow{
         color:#b45309;
     }
</style>


@endsection

@section('main')
<!----Product page----->

<!-- component -->
<section class="overflow-hidden text-gray-700 bg-white body-font">
    <div class="container px-5 py-24 mx-auto">



  <div class="px-4 mx-auto mt-6 max-w-7xl sm:px-6 lg:px-8">
    <div class="flex flex-col -mx-4 md:flex-row">
      <div class="px-4 md:flex-1">
        <div x-data="{ image: 1 }" x-cloak>


          <div class="flex mb-4 -mx-2">


            <div x-data="{imageUrl: '{{$product->photo[0]->getUrl()}}'}">

                  <img id="main" :src="imageUrl" />




                <div class="flex justify-center my-8">
                    @foreach($product->photo as $key => $media)
                         <div class="mx-4 border-2 border-yellow-100 shadow-xl">
                            <img src="{{ $media->getUrl('thumb') }}" @click="imageUrl = '{{ $media->getUrl() }}'" />
                         </div>
                   @endforeach
                </div>

              </div>
          </div>
        </div>
      </div>
      <div class="w-full mt-6 lg:w-1/2 lg:pl-10 lg:py-6 lg:mt-0">
        @if ($product->categories)
        @foreach ($product->categories as $category)
        <h2 class="text-sm tracking-widest text-red-400 uppercase title-font">{{$category->name}}</h2>
        @endforeach

        @endif

        <h1 class="mb-1 text-3xl font-medium text-gray-900 title-font">{{$product->name}}</h1>

        <p class="leading-relaxed">{{$product->description}}</p>
        <div class="flex items-center pb-5 mt-6 mb-5 border-b-2 border-gray-200">
          @if ($product->size)
          <div class="flex items-center ">
              <span class="mr-3">Size: {{$product->size->name}} gm</span>

            </div>
          @endif

        </div>
        <div class="flex">
          <span class="text-5xl font-medium text-gray-900 title-font">{{$product->price}} <small>LE</small></span>

          <button class="flex px-6 py-2 ml-auto text-white bg-yellow-700 border-0 rounded focus:outline-none hover:bg-yellow-600">
              <svg class="w-5 h-5 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
              <span>    <a href="{{route('product.add',$product->id)}}">  Add to Cart   </a></span>
          </button>


        </div>
      </div>
    </div>
  </div>

</div>
</section>

    <!-----More products---->

    <div class="mx-8 my-32">
        <h2 class="mb-1 text-xs font-semibold tracking-widest text-center text-red-400 uppercase title-font">Try other scents!</h2>
        <h1 class="pb-5 mb-4 text-5xl font-semibold tracking-tighter text-center text-gray-900 sm:text-5xl title-font">More Candles</h1>
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
               <div class="grid grid-cols-1 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 glide__slides">
                    @foreach ($products as $product)
                    <div class=" glide__slide">
                    <div class="w-full max-w-sm mx-auto overflow-hidden border-2 border-yellow-100 rounded-md shadow-md">
                        <div class="relative flex items-end justify-end w-full bg-cover h-96" style="background-image: url('{{$product->photo[0]->getUrl()}}')">
                        <a href="{{route('product.add',$product->id)}}" class="absolute bottom-0">
                            <button class="p-2 mx-5 -mb-6 text-white bg-red-400 rounded-full hover:bg-red-500 focus:outline-none focus:bg-red-500">
                                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </button>
                        </a>
                        </div>
                        <div class="px-5 py-3 bg-yellow-50">
                            @if ($product->size)

                                <h3 class="text-gray-700 uppercase">{{$product->name}}  <span class="mt-2 text-gray-500">{{$product->size->name}}</span></h3>

                            @endif

                            <span class="mt-2 text-gray-500">{{$product->price}}</span>
                        </div>
                    </div>
                    </div>
                     @endforeach
                 </div>
                <div class="flex justify-center mt-8">
                    <div class="inline-flex bg-white rounded-md shadow">
                        <a href="{{route('products.index')}}" class="px-6 py-2 font-bold text-white bg-yellow-700 rounded-md hover:bg-yellow-600 ">
                           Show All Candles
                        </a>
                    </div>
                </div>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class=" glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
                <button class=" glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
            </div>
        </div>
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
        gap:30,
        breakpoints: {
            1024: {
            perView: 4
            },
            600: {
            perView: 1
            }
        },
        animationDuration:2000,

    }
    new Glide('.glide',config).mount()
  </script>
    <!-- partial -->
    <script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>

@endsection
