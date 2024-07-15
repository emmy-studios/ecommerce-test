@extends('layouts.app')

@section('title', 'Ecommerce | Create an Account')

@section('content')
    
    <main class="flex min-h-full flex-col justify-center px-6 py-14 lg:px-8">

        {{-- Header --}}
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            @if($websiteInfo && $websiteInfo->main_logo)
                <img class="mx-auto h-20 w-auto"
                    src="{{ asset('storage/' . $websiteInfo->signup_logo) }}"
                    alt="Ecommerce Logo">

            @else
                <img class="mx-auto h-20 w-auto"
                    src="{{ asset('assets/images/logo/logo_transparent.png') }}"
                    alt="Ecommerce Logo">
            @endif

            <h2 
                class="mt-8 text-center text-2xl font-bold leading-9 tracking-tight to-blue-500">
                Sign in for free
            </h2>
        
        </div>

        {{-- Form Input --}}

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">

            <form class="space-y-6" action="{{ route('register') }}" method="POST">
                
                @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium leading-6 text-balance">Username</label>
                        <div class="mt-2">
                            <input id="name" value="{{ old('name') }}" name="name" type="text" required
                                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-purple-600 shadow-sm ring-1 ring-inset ring-purple-500 focus:ring-2 focus:ring-inset focus:ring-balck sm:text-sm sm:leading-6 pl-3">
                        </div>
                        
                        @error('name')
                            <p class="pl-3 pt-2 text-red-600 text-sm">{{ $message }}</p>
                        @enderror

                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-balance">Email</label>
                        <div class="mt-2">
                            <input id="email" value="{{ old('email') }}" name="email" type="email" required
                                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-purple-600 shadow-sm ring-1 ring-inset ring-purple-500 focus:ring-2 focus:ring-inset focus:ring-balck sm:text-sm sm:leading-6 pl-3">
                        </div>

                        @error('email')
                            <p class="pl-3 pt-2 text-red-600 text-sm">{{ $message }}</p>
                        @enderror

                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-black">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" required
                                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-purple shadow-sm ring-1 ring-inset ring-purple-500 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6 pl-3">
                        </div>

                        @error('password')
                            <p class="pl-3 pt-2 text-red-600 text-sm">{{ $message }}</p>
                        @enderror

                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password_confirmation" class="block text-sm font-medium leading-6 text-black">Confirm Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-purple shadow-sm ring-1 ring-inset ring-purple-500 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6 pl-3">
                        </div>

                        @error('password_confirmation')
                            <p class="pl-3 pt-2 text-red-600 text-sm">{{ $message }}</p>
                        @enderror

                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-purple-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-purple-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-500">
                            Create
                        </button>
                    </div>

            </form>

            <p class="mt-10 text-center text-sm text-gray-400">
                Have an account?
                <a href="{{ route('login') }}" class="font-semibold leading-6 text-purple-500 hover:text-purple-400">
                    login
                </a>
            </p>

        </div>

    </main>

@endsection