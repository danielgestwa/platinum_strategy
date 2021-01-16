<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Expenses</title>
    </head>
    <body>
        <x-guest-layout>
            <div class="relative bg-white overflow-hidden">
                <div class="max-w-7xl mx-auto">
                  <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                    <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                      <polygon points="50,0 100,0 50,100 0,100" />
                    </svg>
              
                    <div class="pt-6 px-4 sm:px-6 lg:px-8">
                        <x-jet-authentication-card-logo class="block h-9 w-auto" />
                    </div>
              
                    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-14 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                      <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                          <span class="block xl:inline">Take control of your</span>
                          <span class="block text-indigo-600 xl:inline">Expenses</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Analyze your expenses and check what you spend the most money on. Add daily purchases or costs incurred by the company, use several predefined categories or create your own, view monthly reports and save money.<br>
                            <span class="font-bold">All of this is completely FREE with NO ads!</span>
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            @if (Route::has('login'))
                                @auth
                                    <div class="rounded-md shadow">
                                        <a href="{{ url('/dashboard') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                            Dashboard
                                        </a>
                                    </div>
                                @else
                                    <div class="rounded-md shadow">
                                        <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                        Login
                                        </a>
                                    </div>
                                    <div class="mt-3 sm:mt-0 sm:ml-3">
                                        <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                                        Register
                                        </a>
                                    </div>
                                @endauth
                            @endif
                        </div>
                      </div>
                    </main>
                  </div>
                </div>
                <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                  <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src=" {{ asset('images/main_walk.jpeg') }} " alt="">
                </div>
              </div>
            
        </x-guest-layout>
    </body>
</html>
