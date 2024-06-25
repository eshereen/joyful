<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('title')
        @yield('head')
        <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!----Font Awsome---->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
         <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

         <!---support for IE--->
         <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js"></script>
         <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine-ie11.min.js" defer></script>
           <!----alpine---->
           <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>

        <!-- Styles -->
        @yield('css')

    </head>
    <body>
      <div id="app">
       <!--responsive header-->
       <header class="">

        <div  x-data="{ mobileMenuOpen : false }" class="relative flex flex-row flex-wrap items-center justify-between px-16 py-1 bg-white shadow-sm md:space-x-4">
            <div class="">
                <a href="/" class="">
                    <img src="{{asset('img/logo.png')}}" alt="joyfulegy logo" width="100">
                  </a>

            </div>
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-block w-8 h-8 p-1 text-gray-600 md:hidden">
                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>

            <nav class="absolute left-0 z-20 flex-col w-full p-6 pt-0 font-semibold bg-white rounded-lg shadow-md md:relative top-24 md:top-0 md:flex md:flex-row md:space-x-6 md:w-auto md:rounded-none md:shadow-none md:bg-transparent md:p-0"
            :class="{ 'flex' : mobileMenuOpen , 'hidden' : !mobileMenuOpen}"  @click.away="mobileMenuOpen = false">




                            <a href="/"
                                class="block p-1 mx-2 font-bold text-orange-500 capitalize rounded-lg lg:inline-block text-md hover:border-indigo-400 hover:text-orange-500 focus:text-yellow-800 hover:text-yellow-800">
                                Home
                            </a>

                            <a href="/about"
                                class="block p-1 mx-2 font-bold text-gray-700 capitalize rounded-lg lg:inline-block text-md hover:border-indigo-400 hover:text-orange-500 focus:text-yellow-800 hover:text-yellow-800">
                                About
                            </a>
                            <a href="/products"
                            class="block p-1 mx-2 font-bold text-gray-700 capitalize rounded-lg lg:inline-block text-md hover:border-indigo-400 hover:text-orange-500 focus:text-yellow-800 hover:text-yellow-800">
                          Candles
                           </a>
                           <a href="/palm-wax"
                           class="block p-1 mx-2 font-bold text-gray-700 capitalize rounded-lg lg:inline-block text-md hover:border-indigo-400 hover:text-orange-500 focus:text-yellow-800 hover:text-yellow-800">
                         Palm Wax
                          </a>
                          <a href="/candle-care"
                          class="block p-1 mx-2 font-bold text-gray-700 capitalize rounded-lg lg:inline-block text-md focus:text-yellow-800 hover:text-yellow-800">
                        Candle Care
                         </a>




                        <hr class="mt-2">
                        <div class="mt-4 ml-2 md:hidden lg:hidden md:mt-1">
                            <a  href="/cart" class="flex p-1 text-gray-700 hover:text-yellow-400 focus:outline-none focus:ring">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />

                                  </svg>
                                  <span class="sr-only">Cart</span>    <sup class="text-gray-700">{{Cart::count()}}</sup>
                            </a>
                        </div>
                </nav>
                <div class="hidden md:inline-block">
                    <a  href="/cart" class="flex p-1 text-yellow-700 hover:text-yellow-400 focus:outline-none focus:ring ">
                        <span class="sr-only">Cart</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            <sup class="text-yellow-700 ">{{Cart::count()}}</sup>
                          </svg>

                    </a>
                </div>
        </div>
</header>
       <!---end of responsive header--->















       <!------       @auth

                <div class="flex items-center justify-center ">
                <div x-data="{ open: false }" class="flex items-center justify-center w-16 ">
                    <div @click="open = !open" class="relative py-3 border-b-4 border-transparent" :class="{'border-indigo-700 transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
                        <div class="flex items-center justify-center space-x-3 cursor-pointer">
                        <div class="w-12 h-12 overflow-hidden border-2 border-gray-900 rounded-full dark:border-white">
                            <img src="https://images.unsplash.com/photo-1610397095767-84a5b4736cbd?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="" class="object-cover w-full h-full">
                        </div>

                        </div>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute px-5 py-3 mt-5 bg-white border rounded-lg shadow right-2 w-60 dark:bg-gray-800 dark:border-transparent">
                        <ul class="space-y-3 dark:text-white">
                            <div class="text-lg font-semibold text-yellow-700 dark:text-white">
                                <div class="cursor-pointer">Welcome {{auth()->user()->name}}</div>
                            </div>
                            <li class="font-medium">
                            <a href="/admin" class="flex items-center transition-colors duration-200 transform border-r-4 border-transparent hover:border-indigo-700">
                                <div class="mr-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                Account
                            </a>
                            </li>

                            <hr class="dark:border-gray-700">
                            <li class="font-medium">
                                <a href="#" class="flex items-center transition-colors duration-200 transform border-r-4 border-transparent hover:border-red-600">
                                    <div class="mr-3 text-red-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    </div>
                                    Logout
                                </a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <a href="/login"
            class="items-center px-4 py-3 mt-4 font-semibold text-blue-700 transition duration-500 ease-in-out transform bg-white rounded-lg lg:inline-flex lg:mt-px hover:border-blue-800 hover:bg-blue-700 hover:text-white focus:ring focus:outline-none">Login
            </a>
            <a href="/register"
            class="items-center px-4 py-3 mt-4 font-semibold text-blue-700 transition duration-500 ease-in-out transform bg-white rounded-lg lg:inline-flex lg:mt-px hover:border-blue-800 hover:bg-blue-700 hover:text-white focus:ring focus:outline-none">Register
            </a>
              @endauth
------>

        <!----end of Header---->

@yield('main')

<!------Footer---->

<!---footer--->
<footer class="text-white bg-yellow-900 body-font">
<div
    class="container flex flex-col flex-wrap p-5 mx-auto md:items-center lg:items-start md:flex-row md:flex-no-wrap ">

    <div class="w-64 mx-auto text-center md:mx-0 md:text-left">
        <a href="/" class="flex justify-center">
            <img src="{{asset('img/logo-white.png')}}" alt="joyfulegy logo" width="180">

        </a>
    </div>

    <div class="flex flex-wrap flex-grow mt-10 -mb-10 text-center md:pl-20 md:mt-0 md:text-left ">
        <div class="w-full px-4 lg:w-1/3 md:w-1/2">
            <h1 class="mb-3 text-sm font-medium tracking-widest text-white uppercase title-font">Product
            </h1>
            <nav class="mb-10 list-none">
                @foreach ($products as $product)
                <li>
                    <a href="{{route('products.show',$product->id)}}" class="text-sm text-white hover:text-yellow-400">{{$product->name}}</a>
                </li>
                @endforeach


            </nav>
        </div>
        <div class="w-full px-4 lg:w-1/3 md:w-1/2">
            <h1 class="mb-3 text-sm font-medium tracking-widest text-white uppercase title-font">Browse
            </h1>
            <nav class="mb-10 list-none">
                <li>
                    <a href="/" class="text-sm text-white hover:text-yellow-400">Home</a>
                </li>
                <li>
                    <a href="/about" class="text-sm text-white hover:text-yellow-400">About</a>
                </li>
                <li>
                    <a href="/products" class="text-sm text-white hover:text-yellow-400">Candles</a>
                </li>
                <li>
                    <a href="/palm" class="text-sm text-white hover:text-yellow-400">Palm Wax</a>
                </li>
                <li>
                    <a href="/terms" class="text-sm text-white hover:text-yellow-400">Terms & Conditions</a>
                </li>
                <li>
                    <a href="/privacy" class="text-sm text-white hover:text-yellow-400">Privacy</a>
                </li>

            </nav>
        </div>
        <div class="w-full px-4 lg:w-1/3 md:w-1/2">
            <h1 class="mb-3 text-sm font-semibold tracking-widest text-white uppercase title-font">
               Follow Joyful
            </h1>
            <div class="flex justify-center md:justify-start ">
                <a href="https://www.instagram.com/joyfulegy/">
                <button
                    class="inline-flex px-4 py-2 font-semibold text-white transition duration-500 ease-in-out transform rounded-lg shadow-xl md:w-full bg-gradient-to-r from-yellow-700 hover:from-yellow-600 to-yellow-600 hover:to-yellow-700 focus:ring focus:outline-none">Follow us On Instagram
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-4 h-4 my-auto ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </button>
                </a>

            </div>
        </div>
    </div>
</div>
<div class="bg-yellow-800 ">
    <div class="container flex flex-col flex-wrap items-center justify-center px-5 py-8 mx-auto md:py-2 sm:flex-row">
        <p class="text-sm text-center text-white sm:text-left ">© joyfulegy 2021
        </p>
        <span class="inline-flex justify-center py-8 mt-2 md:py-2 sm:ml-auto sm:mt-0 sm:justify-start">
            <a  href="https://www.facebook.com/joyfulegy" class="text-white hover:text-yellow-400">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
            </a>

            <a href="https://www.instagram.com/joyfulegy/" class="ml-4 text-white hover:text-yellow-400">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                </svg>
            </a>
        </span>
    </div>
</div>
</footer>


<!----Footer----->


<!---End of Hero section---->


</div><!---end of #app--->



  <!----Scripts--->


  @yield('scripts')
  <!---end of scripts-->
  @include('sweetalert::alert')
  <script src="//cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>

  <script>
  new WOW().init();
  </script>

</body>
</html>

