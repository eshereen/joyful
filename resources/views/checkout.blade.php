@extends('layouts.front')
<!----MAIN sECTION---->

@section('main')
<!-- tailwind.config.js -->
    <main class="my-4">
        <div class="container px-6 mx-auto">
            <h3 class="pt-12 pl-6 text-4xl font-bold text-left text-yellow-800 uppercase">Checkout</h3>
            <div class="flex flex-col mt-8 lg:flex-row">
                <div class="order-2 w-full lg:w-1/2">
                   <!----Check Address----->
                   <!-- component -->
                    <div class="leading-loose">
                        <form class="max-w-xl p-10 m-4 bg-white rounded shadow-xl" action="{{route('order')}}" method="POST">
                            @csrf
                        <p class="mb-4 text-lg font-bold text-gray-900">Shipment Information</p>
                        <div class="inline-block w-full pr-1 mt-2">
                            @if (session('shipment'))
                            <div class="flex justify-between">
                           <label class="text-yellow-800 text-md" for=""> Area: <span>{{session('shipment')->area->name}}
                            </span>
                           </label>
                        <span>

                            <a href="{{route('shipment.destroy')}}" >

                                <span class="text-red-800">Change</span>
                              </a>
                        </span>
                        </div>
                           <input type="hidden" name="area" value="{{session('shipment')->id}}">
                           @else
                            <select name="area" id="area_id"  value=""
                            class="w-full px-5 py-1 text-yellow-800 bg-yellow-100 rounded" id="area" value="{{ old('area', null) }}">

                            <option value="" >  <span><i class="text-red-500 fas fa-arrow-circle-down"></i></span>Please choose your area. </option>
                            @foreach ($areas as $area)
                            <option value="{{$area->id}}">{{$area->name}}</option>

                            @endforeach

                           </select>
                            @endif

                              <div class="mt-3">
                                  <input class="w-full px-2 py-2 text-yellow-800 bg-yellow-100 rounded" id="street" name="address" type="text" required="" placeholder="Detailed Address" aria-label="address">
                              </div>
                            </div>
                            <hr class="my-8 border-yellow-200">
                        <div class="mt-4">
                            <label class="block text-gray-900 text-smt-sm" for="name">Name</label>
                            <input class="w-full px-5 py-1 text-yellow-800 bg-yellow-100 rounded" id="name" name="name" type="text" required="" placeholder="Enter your name" aria-label="Name" value="{{ old('name', null) }}">
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-900 text-smt-sm" for="email">Email</label>
                            <input class="w-full px-5 py-1 text-yellow-800 bg-yellow-100 rounded" id="email" name="email" type="email" required="" placeholder="Enter your Email" aria-label="Email" value="{{ old('email', null) }}">
                        </div>

                        <div class="mt-4">
                            <label class="block text-gray-900 text-smt-sm" for="name">Phone</label>
                            <input class="w-full px-5 py-1 text-yellow-800 bg-yellow-100 rounded" id="phone" name="phone" type="text" required="" placeholder="Enter your phone number" aria-label="Phone" value="{{ old('phone', null) }}">
                        </div>
                        <hr class="my-8 border-yellow-200">

                        <div class="inline-block w-full pr-1 mt-2">
                            <label class="block text-gray-900 text-smt-sm " for="note">Note</label>
                            <textarea class="w-full px-2 py-2 text-yellow-800 bg-yellow-100 rounded" id="note" name="note"  required="" placeholder="If you want to add a note, write to us here." aria-label="note" value="{{ old('note', null) }}">
                            </textarea>
                        </div>
                        @if (Cart::count() > 0)

                        @foreach (Cart::content() as $item)
                        <input type="hidden" name="products[]" value="{{$item->id}}">
                        @endforeach
                        @endif
                       <!----total Price----->
                       <input type="hidden" name="price" value="{{$total}}">
                     

                       <button type = "submit" class="flex justify-center px-6 py-2 mx-auto mt-6 font-medium text-white uppercase transition duration-500 ease-in-out transform rounded-lg shadow-xl place-items-center w-1/2l item-center bg-gradient-to-r from-yellow-800 hover:from-yellow-600 to-yellow-600 hover:to-yellow-800 hover:-translate-y-1 hover:scale-110 focus:ring focus:shadow-outline focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd" />
                          </svg>
                        <span class="ml-2 mt-5px">Place Your Order</span>
                    </button>
                    </form>


                    </div>
                   <!---end of checkout form----->

                </div>
                <div class="flex-col justify-center order-1 w-full mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                    <div class="flex justify-center mt-8 lg:justify-end">
                        <div class="w-full max-w-md px-4 py-6 border rounded-md">
                            <div class="flex items-center justify-between mx-2">
                                <h3 class="text-lg font-bold text-gray-900">Order Total ({{Cart::count()}})</h3>
                               <a href="/cart"> <span class="text-sm text-yellow-800">Edit</span></a>
                            </div>
                            @if (Cart::count() > 0)

                          @foreach (Cart::content() as $item)


                            <div class="flex justify-between mt-6">

                                <div class="flex">
                                    <a href="{{route('products.show', $item->id)}}">
                                    <img class="object-cover w-20 h-20 rounded" src="{{$item->model->photo[0]->getUrl('thumb')}}" alt="{{$item->name}}">
                                    <div class="mx-3">
                                        <h3 class="text-sm text-yellow-800">{{$item->name}}</h3>
                                        <div class="flex items-center mt-2">

                                            <a href="{{route('cart.decrease',$item->rowId)}}">
                                            <button class="text-gray-500 focus:outline-none focus:text-yellow-800">
                                                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </button>
                                            </a>

                                            <span class="mx-2 text-yellow-800">{{$item->qty}}</span>
                                            <a href="{{route('cart.increase',$item->rowId)}}">
                                                <button class="text-gray-500 focus:outline-none focus:text-yellow-800">
                                                    <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                </button>
                                                </a>
                                        </div>
                                    </div>
                                </a>
                                </div>

                                <span class="mt-4 text-yellow-800">{{$item->price}} <small>LE</small></span>
                            </div>
                            @endforeach
                            @endif
                            <hr>
                            <div class="flex items-center justify-between mx-2 my-8">
                                <h3 class="font-medium text-yellow-900 text-md">Subtotal</h3>
                                <span class="text-yellow-900 text-md">{{Cart::subtotal()}} <small>LE</small></span>
                            </div>
                            @if (session('coupon'))
                            <hr>
                            <div class="flex items-center justify-between mx-2 my-8">
                                <h3 class="font-medium text-yellow-900">Coupon</h3>
                                <span class="text-yellow-900 text-md"> - {{session('coupon')->amount}} <small>LE</small></span>
                            </div>
                            @else
                            <hr>
                            <div class="flex items-center justify-between mx-2 my-8">
                                <a href="{{route('coupon.destroy')}}" >
                                    <button  class="mt-1 mr-2 lg:mt-2">
                                      <svg aria-hidden="true" data-prefix="far" data-icon="trash-alt" class="w-4 text-red-600 hover:text-red-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12zM432 80h-82.41l-34-56.7A48 48 0 00274.41 0H173.59a48 48 0 00-41.16 23.3L98.41 80H16A16 16 0 000 96v16a16 16 0 0016 16h16v336a48 48 0 0048 48h288a48 48 0 0048-48V128h16a16 16 0 0016-16V96a16 16 0 00-16-16zM171.84 50.91A6 6 0 01177 48h94a6 6 0 015.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12z"/></svg>
                                    </button>
                                    <span class="font-medium text-yellow-900">Coupon</span>
                                  </a>

                                <span class="text-yellow-900 text-md"> - 0 <small>LE</small></span>
                            </div>
                            @endif
                            <hr>
                            @if (session('shipment_price'))
                            <hr>
                            <div class="flex items-center justify-between mx-2 my-8">
                                <a href="{{route('shipment.destroy')}}" >
                                    <button  class="mt-1 mr-2 lg:mt-2">
                                      <svg aria-hidden="true" data-prefix="far" data-icon="trash-alt" class="w-4 text-red-600 hover:text-red-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12zM432 80h-82.41l-34-56.7A48 48 0 00274.41 0H173.59a48 48 0 00-41.16 23.3L98.41 80H16A16 16 0 000 96v16a16 16 0 0016 16h16v336a48 48 0 0048 48h288a48 48 0 0048-48V128h16a16 16 0 0016-16V96a16 16 0 00-16-16zM171.84 50.91A6 6 0 01177 48h94a6 6 0 015.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12z"/></svg>
                                    </button>
                                    <span class="font-medium text-yellow-900">Shipment Fee</span>
                                  </a>

                                <span class="text-yellow-900 text-md"> {{session('shipment_price')}} <small>LE</small></span>
                            </div>
                            @else
                            <div class="flex items-center justify-between mx-2 my-8">
                                <h3 class="w-1/3 font-medium text-yellow-900">Shipment Fee</h3>
                                <div class="justify-center w-2/3 md:flex">

                                    <form action="{{route('shipment.check')}}" method="POST">
                                        @csrf
                                        <div class="flex items-center pl-3 bg-white bg-yellow-100 border rounded-full h-13">
                                          <select name="area_id" id="area_id"  value=""
                                                  class="w-full text-sm bg-yellow-100 outline-none focus:outline-none active:outline-none hover:cursor-pointer">

                                                  <option value="" >   <span><i class="text-red-400 fas fa-arrow-circle-down"></i></span>Please choose your area. </option>
                                                  @foreach ($areas as $area)
                                                  <option value="{{$area->id}}">{{$area->name}}</option>

                                                  @endforeach

                                        </select>
                                            <button type="submit" class="flex items-center px-1 py-1 text-sm text-white bg-yellow-800 rounded-full outline-none md:px-4 hover:bg-yellow-600 focus:outline-none active:outline-none">

                                              <span class="font-small">Calculate</span>
                                            </button>

                                        </div>
                                    </form>

                                </div>
                            </div>
                            @endif
                            <hr>
                            <div class="flex items-center justify-between mx-2 my-8">
                                <h3 class="text-lg font-bold text-yellow-900">Total</h3>
                                <span class="text-lg text-yellow-900"> <strong>{{$total}}</strong> <small>LE</small></span>


                            </div>



                             <!---Complete Order button--->






                </div><!---end of flex--->


            </div><!---end of order-1-->


        </div>
    </main>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script>
    $(document).ready(function() {
        $('select[name="area"]').on('change', function() {
            var areaID = $(this).val();
            if (areaID) {

                $.ajax({
                    url: '/areas/get/'+areaID,
                    type:"GET",
                    dataType:"json",


                    success:function(data) {



                }
            });
        }


        });
        $(document).ajaxStop(function(){
    window.location.reload();
});
    });
</script>

@endsection
