@extends('layouts.front')
@section('title')
<title>Our Candles</title>
@endsection


@section('main')
<!----Products page----->
<main class="relative ">
    <img src="{{asset('img/shapes/7.png')}}" alt="" width="250"  class="z-0 hidden md:absolute md:block md:top-0 md:right-0">

    <div class="container px-6 mx-auto">


        <h2 class="pt-10 mb-1 text-xs font-semibold tracking-widest text-center text-red-400 uppercase title-font">CHOOSE YOUR MOOD!</p>
        <h1 class="mb-6 text-5xl font-semibold tracking-tighter text-center text-gray-900 sm:text-6xl title-font">Our Candles</h1>

        <div class="grid grid-cols-1 gap-16 my-32 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">

                @foreach ($products as $product)
                  <div class="p-2 shadow-md hover:shadow-xl hover:border-4 hover:border-yellow-200">
                    <div class="flex flex-col justify-center item-center " >
                        <a href="{{route('products.show', $product->id)}}" class="flex justify-center">
                            <img src="{{$product->photo[0]->getUrl('slide')}}" alt="" >
                        </a>
                    </div>

                    <div class="w-full p-4 mx-auto ">
                        <h1 class="text-2xl font-bold text-gray-900">{{$product->name}}</h1>
                        <p class="mt-2 text-sm text-red-400">{{$product->slug}}</p>

                        <div class="flex justify-between mt-8 ">
                          <h1 class="text-xl font-bold text-gray-700">{{$product->price}} <small> LE</small></h1>
                          <a href="{{route('product.add',$product->id)}}" class="text-center"><button class="px-3 py-2 text-xs font-bold text-white uppercase bg-yellow-800 rounded">Add to Basket</button></a>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
          </div>
      <!----pagination--->
    <!--    <div class="flex justify-center">
            <div class="flex mt-8 rounded-md">
                <a href="#" class="px-4 py-2 ml-0 leading-tight text-blue-700 bg-white border border-r-0 border-gray-200 rounded-l hover:bg-blue-500 hover:text-white"><span>Previous</a></a>
                <a href="#" class="px-4 py-2 leading-tight text-blue-700 bg-white border border-r-0 border-gray-200 hover:bg-blue-500 hover:text-white"><span>1</span></a>
                <a href="#" class="px-4 py-2 leading-tight text-blue-700 bg-white border border-r-0 border-gray-200 hover:bg-blue-500 hover:text-white"><span>2</span></a>
                <a href="#" class="px-4 py-2 leading-tight text-blue-700 bg-white border border-r-0 border-gray-200 hover:bg-blue-500 hover:text-white"><span>3</span></a>
                <a href="#" class="px-4 py-2 leading-tight text-blue-700 bg-white border border-gray-200 rounded-r hover:bg-blue-500 hover:text-white"><span>Next</span></a>
            </div>
        </div><!---end of pagination---->
    </div><!----end of container---->
</main>







<!-----End of contact us----->
@endsection


@section('scripts')


    <!-- partial -->
    <script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>

@endsection
