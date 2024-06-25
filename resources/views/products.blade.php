@extends('layouts.front')
@section('head')
<!-- partial -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

@endsection
@section('main')
    <div class="py-6">
      <!-- Breadcrumbs -->
      <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center space-x-2 text-sm text-gray-400">
          <a href="#" class="hover:underline hover:text-gray-600">Home</a>
          <span>
            <svg class="w-5 h-5 leading-none text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </span>
          <a href="#" class="hover:underline hover:text-gray-600">Electronics</a>
          <span>
            <svg class="w-5 h-5 leading-none text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </span>
          <span>Headphones</span>
        </div>
      </div>
      <!-- ./ Breadcrumbs -->

      <div class="px-4 mx-auto mt-6 max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col -mx-4 md:flex-row">
          <div class="px-4 md:flex-1">
            <div x-data="{ image: 1 }" x-cloak>
              <div class="h-64 mb-4 bg-gray-100 rounded-lg md:h-80">
                <div x-show="image === 1" class="flex items-center justify-center h-64 mb-4 bg-gray-100 rounded-lg md:h-80">
                  <span class="text-5xl">1</span>
                </div>

                <div x-show="image === 2" class="flex items-center justify-center h-64 mb-4 bg-gray-100 rounded-lg md:h-80">
                  <span class="text-5xl">2</span>
                </div>

                <div x-show="image === 3" class="flex items-center justify-center h-64 mb-4 bg-gray-100 rounded-lg md:h-80">
                  <span class="text-5xl">3</span>
                </div>

                <div x-show="image === 4" class="flex items-center justify-center h-64 mb-4 bg-gray-100 rounded-lg md:h-80">
                  <span class="text-5xl">4</span>
                </div>
              </div>

              <div class="flex mb-4 -mx-2">
                <template x-for="i in 4">
                  <div class="flex-1 px-2">
                    <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" class="flex items-center justify-center w-full h-24 bg-gray-100 rounded-lg focus:outline-none md:h-32">
                      <span x-text="i" class="text-5xl"></span>
                    </button>
                  </div>
                </template>
              </div>
            </div>
          </div>
          <div class="px-4 md:flex-1">
            <h2 class="mb-2 text-5xl font-bold leading-tight tracking-tight text-gray-800 md:text-3xl">Lorem ipsum dolor, sit amet consectetur, adipisicing elit.</h2>
            <p class="text-sm text-gray-500">By <a href="#" class="text-indigo-600 hover:underline">ABC Company</a></p>

            <div class="flex items-center my-4 space-x-4">
              <div>
                <div class="flex px-3 py-2 bg-gray-100 rounded-lg">
                  <span class="mt-1 mr-1 text-indigo-400">$</span>
                  <span class="text-3xl font-bold text-indigo-600">25</span>
                </div>
              </div>
              <div class="flex-1">
                <p class="text-xl font-semibold text-green-500">Save 12%</p>
                <p class="text-sm text-gray-400">Inclusive of all Taxes.</p>
              </div>
            </div>

            <p class="text-gray-500">Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Vitae exercitationem porro saepe ea harum corrupti vero id laudantium enim, libero blanditiis expedita cupiditate a est.</p>

            <div class="flex py-4 space-x-4">
              <div class="relative">
                <div class="absolute left-0 right-0 block pt-2 text-xs font-semibold tracking-wide text-center text-gray-400 uppercase">Qty</div>
                <select class="flex items-end pb-1 pl-4 pr-8 border border-gray-200 appearance-none cursor-pointer rounded-xl h-14">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>

                <svg class="absolute bottom-0 right-0 w-5 h-5 mb-2 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                </svg>
              </div>

              <button type="button" class="px-6 py-2 font-semibold text-white bg-indigo-600 h-14 rounded-xl hover:bg-indigo-500">
                  <a href="/cart">
                Add to Cart
                </a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    @endsection
    @section('scripts')
    @endsection






