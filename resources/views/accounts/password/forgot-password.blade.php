@extends('layouts.app')

@section('title', config('app.name') . ' | forgot password')

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
                class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight to-blue-500">
                Forgot Password?
            </h2>

            @if($errors->has('error'))
                <div class="mt-4 text-sm text-red-600 text-center">{{ $errors->first('error') }}</div>
            @endif
        
            @if (session()->has('success'))
                <div class="mt-4 text-sm text-red-600 text-center">
                    {{ session()->get('success') }}
                </div>
            @endif


        </div>

        {{-- Form Input --}}

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            <form class="space-y-6" action="{{ route('forgot.password') }}" method="POST">
                
                @csrf

                    <div>

                        <label for="email" class="block text-sm font-medium leading-6 text-balance">Email</label>

                        <div class="mt-2">
                            <input id="email"  name="email" type="text" required
                                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-purple-600 shadow-sm ring-1 ring-inset ring-purple-500 focus:ring-2 focus:ring-inset focus:ring-balck sm:text-sm sm:leading-6 pl-3">
                        </div>
                    
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-purple-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-purple-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-500">
                            Send
                        </button>
                    </div>

            </form>

            <p class="mt-10 text-center text-sm text-gray-400">
                Not a member?
                <a href="{{ route('signup') }}" class="font-semibold leading-6 text-purple-500 hover:text-purple-400">
                    Register for free
                </a>
            </p>

        </div>

    </main>

@endsection