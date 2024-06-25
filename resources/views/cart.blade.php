@extends('layouts.front')
<!----MAIN sECTION---->

@section('main')
<!-- tailwind.config.js -->

<!-- component -->
<div class="flex justify-center bg-yellow-50">
    @if (Cart::count() > 0)
    <div class="flex flex-col w-full p-8 my-16 text-gray-800 bg-white rounded-md shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
      <div class="flex-1">

        <table class="w-full text-sm lg:text-base" cellspacing="0">
          <thead>
            <tr class="h-12 uppercase">


              <th class="text-left">Product</th>
              <th class="pl-5 text-center lg:text-center lg:pl-0">
                <span class="lg:hidden" title="Quantity">Qtd</span>
                <span class="hidden lg:inline">Quantity</span>
              </th>
              <th class="hidden text-right md:table-cell">Unit price</th>
              <th class="text-right">Total price</th>
            </tr>
          </thead>
          <tbody>


              @foreach (Cart::content() as $item)


            <tr>
              <td class="flex flex-col justify-start pb-4 md:flex md:flex-row lg:flex-row">
                <a href="{{route('products.show', $item->id)}}">
                  <img src="{{$item->model->photo[0]->getUrl('thumb')}}" class="block w-20 rounded" alt="Thumbnail">
                </a>
                 <div class="inline-block" >
                <a href="{{route('products.show', $item->id)}}">
                  <p class="my-2 md:ml-4">{{$item->name}}</p>
                </a>
                 <a href="{{route('cart.remove',$item->rowId)}}" class="text-gray-700 md:ml-4">

                    <small class="pt-3 text-red-400">(Remove item)</small>
                </a>
               </div>
              </td>
              <td class="text-center md:table-cell">
               <div class="flex justify-center">
               <!---change qty---->
                <div
                    class="relative flex flex-row w-24 h-10 text-center border border-gray-100 rounded-2xl"
                >
                    <a
                        href="{{route('cart.decrease',$item->rowId)}}"
                        class="flex w-20 h-full font-semibold text-yellow-700 bg-yellow-100 border-r border-gray-200 cursor-pointer rounded-2xl focus:outline-none"
                        >
                        <span class="m-auto"> - </span>
                    </a>

                    <div
                    class="flex items-center justify-center w-24 text-xs bg-white cursor-default md:text-base"

                    >
                    <span>{{$item->qty}}</span>
                    </div>

                    <a
                        href="{{route('cart.increase',$item->rowId)}}"
                        class="flex w-20 h-full font-semibold text-yellow-700 bg-yellow-100 border-l border-gray-100 cursor-pointer rounded-2xl focus:outline-none"
                        >
                        <span class="m-auto">+</span>
                    </a>
                </div>

                            <!----end of qty--->
                 </div>
              </td>

              <td class="hidden text-right md:table-cell">
                <span class="text-sm font-medium lg:text-base">
                    {{$item->price}} <small>LE</small>
                </span>
              </td>
              <td class="text-right">
                <span class="text-sm font-medium lg:text-base">
                    {{$item->subtotal}} <small>LE</small>
                </span>
              </td>
            </tr>
            @endforeach



          </tbody>

        </table>
        <div class="flex items-center justify-center md:justify-end">
            <a href="{{route('products.index')}}">
                <button class="flex justify-center w-full px-5 py-2 mt-6 font-medium text-white uppercase bg-yellow-800 rounded-full shadow item-center hover:bg-yellow-600 focus:shadow-outline focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                      </svg>
                  <span class="ml-2 mt-5px">continue shopping</span>
                </button>
              </a>
        </div>

        <hr class="pb-6 mt-6">
        <div class="my-4 mt-4 -mx-2 lg:flex">
          <div class=" lg:px-2 lg:w-1/2 lg:mr-16">
            <div class="p-3 ">
              <h1 class="font-bold uppercase ">Coupon Code</h1>
            </div>
            <div class="p-4">
              <p class="mb-4 italic">If you have a coupon code, please enter it in the box below.</p>
              <div class="justify-center md:flex">
                <form action="{{route('coupon.check')}}" method="POST">
                    @csrf
                    <div class="flex items-center w-full pl-3 bg-yellow-100 border rounded-full h-13">
                      <input type="coupon" name="code" id="coupon" placeholder="Apply coupon" value=""
                              class="w-full bg-yellow-100 outline-none appearance-none focus:outline-none active:outline-none"/>
                        <button type="submit" class="flex items-center px-3 py-1 text-sm text-white bg-yellow-800 rounded-full outline-none md:px-4 hover:bg-yellow-600 focus:outline-none active:outline-none">
                          <svg aria-hidden="true" data-prefix="fas" data-icon="gift" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm256 32h160c17.7 0 32-14.3 32-32V320H288v160zm192-320h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40z"/></svg>
                          <span class="font-medium">Apply Coupon</span>
                        </button>

                    </div>
                </form>
              </div>
            </div>
                 <hr class="divide-y-2">
            <div class="p-4 mt-6 ">
              <h1 class="font-bold uppercase ">Shipping</h1>
            </div>
            <div class="p-4 ">
                <p class="mb-4 italic">You can know the shipping fee here, just enter your area and click the button.</p>
               <div class="justify-center md:flex">

                <form action="{{route('shipment.check')}}" method="POST">
                    @csrf
                    <div class="flex items-center w-full pl-3 bg-yellow-100 border rounded-full h-13">
                      <select name="area_id" id="area_id"  value=""
                              class="w-full bg-yellow-100 outline-none focus:outline-none active:outline-none">

                              <option value="" class="text-gray-400">   <span><i class="text-red-500 fas fa-arrow-circle-down"></i></span> Choose your area </option>
                              @foreach ($areas as $area)
                              <option value="{{$area->id}}">{{$area->name}}</option>

                              @endforeach

                    </select>
                        <button type="submit" class="flex items-center px-3 py-1 text-sm text-white bg-yellow-800 rounded-full outline-none md:px-4 hover:bg-yellow-600 focus:outline-none active:outline-none">

                          <span class="font-medium">Calculate Shipping Fee</span>
                        </button>

                    </div>
                </form>
              </div>

            </div>

          </div>
          <!---Shipping-->

          <!-----end of shipping---->
          <div class="shadow-xl lg:px-2 lg:w-1/2">
            <div class="p-4 bg-yellow-100 rounded-full">
              <h1 class="ml-2 font-bold uppercase">Order Details</h1>
            </div>
            <div class="p-4">
              <p class="mb-6 italic">Shipping is calculated based on values you have entered.</p>
                <div class="flex justify-between pt-1 border-b">
                  <div class="m-2 text-lg font-bold text-center text-gray-800 lg:px-3 lg:py-1 lg:text-base">
                    Subtotal
                  </div>
                  <div class="m-2 font-bold text-center text-gray-900 lg:px-3 lg:py-1 lg:text-lg">
                    {{Cart::subtotal()}}<span><small> LE</small></span>
                  </div>
                </div>

                    <div class="flex justify-between pt-4 border-b">

                        <div class="flex m-2 text-lg font-bold text-center text-gray-800 lg:px-3 lg:py-0.2 lg:text-base">

                      <a href="{{route('coupon.destroy')}}" >
                        <button  class="mt-1 mr-2 lg:mt-2">
                          <svg aria-hidden="true" data-prefix="far" data-icon="trash-alt" class="w-4 text-red-600 hover:text-red-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12zM432 80h-82.41l-34-56.7A48 48 0 00274.41 0H173.59a48 48 0 00-41.16 23.3L98.41 80H16A16 16 0 000 96v16a16 16 0 0016 16h16v336a48 48 0 0048 48h288a48 48 0 0048-48V128h16a16 16 0 0016-16V96a16 16 0 00-16-16zM171.84 50.91A6 6 0 01177 48h94a6 6 0 015.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12z"/></svg>
                        </button>
                      </a>

                      @if(session('coupon'))
                      {{session('coupon')->amount}}
                        @if(session('coupon')->type === 'fixed')
                        LE OFF
                        @else
                        % OFF
                        @endif
                      @else
                      Coupon
                       @endif



                            </div>
                            <div class="font-bold text-center text-gray-900 lg:px-3 lg:py-1 lg:text-lg">
                             - {{$couponPrice}} <span><small> LE</small></span>
                            </div>








                  </div>
                  <div class="flex justify-between pt-2 border-b">
                    <div class="m-2 text-lg font-bold text-center text-gray-800 lg:px-3 lg:py-1 lg:text-base">
                      New Subtotal
                    </div>
                    <div class="m-2 font-bold text-center text-gray-900 lg:px-3 lg:py-1 lg:text-lg">

                        <div class="font-bold text-center text-gray-900 lg:px-1 lg:py-1 lg:text-lg">

                           {{$newSubTotal}} <small>LE</small>
                        </div>

                    </div>
                  </div>
                  <div class="flex justify-between pt-2 border-b">
                    <div class="m-2 text-lg font-bold text-center text-gray-800 lg:px-3 lg:py-1 lg:text-base">
                    Shipping
                    </div>


                        <div class="m-2 font-bold text-center text-gray-400 lg:px-1 lg:py-2 lg:text-lg">
                            @if (session('shipment_price'))

                            <strong>{{  session('shipment_price')  }} <small>LE</small></strong>

                         @else
                         <strong>No area selected</strong>
                         @endif
                        </div>
                  </div>
                  <div class="flex justify-between pt-4 border-b">
                    <div class="m-1 text-lg font-bold text-center text-gray-900 lg:px-4 lg:py-1 lg:text-xl">
                      Total
                    </div>
                    <div class="m-2 font-bold text-center text-gray-900 lg:px-4 lg:py-2 lg:text-lg">
                      {{$total}}<small> LE</small>
                    </div>
                  </div>




                <a href="{{route('checkout.index')}}">
                  <button class="flex justify-center w-full px-6 py-2 mt-6 font-medium text-white uppercase bg-yellow-800 rounded-full shadow item-center hover:bg-yellow-600 focus:shadow-outline focus:outline-none">
                    <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"/></svg>
                    <span class="ml-2 mt-5px">Procceed to checkout</span>
                  </button>
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
      @else
      <div class="relative flex w-screen h-screen">
        <img src="{{asset('img/shapes/2.png')}}" alt="" width="300" class="z-0 hidden md:block md:absolute md:top-0 md:left-0 md:h-screen">
        <img src="{{asset('img/shapes/2.png')}}" alt="" width="350" class="z-0 hidden transform rotate-180 md:block md:absolute md:top-0 md:right-0 md:h-screen">
        <div class="flex flex-col items-center justify-center w-full bg-white ">


        <section class="text-gray-700 body-font">
                <div class="container px-8 mx-auto py-36 lg:px-4">
                    <div class="flex flex-col w-full mb-12 text-left lg:text-center">

                        <h1 class="mb-6 text-5xl font-semibold tracking-tighter text-black wow animate__animated animate__hinge sm:text-6xl title-font" data-wow-duration="5s">
                            No candles in your cart...

                        </h1>
                        <p class="mx-auto text-base font-medium leading-relaxed text-gray-600 lg:w-full">Choose one quickly and bring joy to your space!</p>
                        <a href="{{route('products.index')}}" class="flex items-center justify-center">
                            <button class="px-4 py-2 mt-5 font-semibold text-white transition duration-500 ease-in-out transform rounded-lg shadow-xl bg-gradient-to-r from-yellow-800 hover:from-yellow-600 to-yellow-600 hover:to-yellow-800 focus:ring focus:outline-none">Back to Candles</button></a>
                    </div>
            </section>



        </div>
      <!--  <div class="absolute right-0 bottom-64 max-h-32">
            <img src="{{asset('img/shapes/8.png')}}" alt="background" class="transform rotate-180">
        </div>

     <!--   <img src="{{asset('img/full-logo.png')}}" alt="background" class="object-cover object-center w-4/12 h-screen">-->
        </div>




    @endif
  </div>



@endsection
