@extends('layouts.app')

@section('title', 'Ecommerce | Welcome Back')

@section('content')
    
    <main class="flex min-h-full flex-col justify-center px-6 py-14 lg:px-8">

        {{-- Header --}}
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            <img class="mx-auto h-20 w-auto"
                src="{{ asset('assets/images/logo/logo_transparent.png') }}"
                alt="Ecommerce Logo">
            <h2 
                class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight to-blue-500">
                Enter your credentials to continue
            </h2>

            @if($errors->has('errorCredentials'))
                <div class="mt-4 text-sm text-red-600 text-center">{{ $errors->first('errorCredentials') }}</div>
            @endif

            @if (session()->has('success'))
                <div class="mt-4 text-sm text-red-600 text-center">
                    {{ session()->get('success') }}
                </div>
            @endif
        
        </div>

        {{-- Form Input --}}

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            <form class="space-y-6" action="{{ route('authenticate') }}" method="POST">
                
                @csrf

                    <div>

                        <label for="name" class="block text-sm font-medium leading-6 text-balance">Username</label>

                        <div class="mt-2">
                            <input id="name"  name="name" type="text" required
                                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-purple-600 shadow-sm ring-1 ring-inset ring-purple-500 focus:ring-2 focus:ring-inset focus:ring-balck sm:text-sm sm:leading-6 pl-3">
                        
                            @error('name')
                                <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        
                        </div>
                    
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-black">Password</label>
                            <div class="text-sm">
                                <a 
                                    href="{{ route('forgot') }}" 
                                    class="font-semibold text-purple-500 hover:text-purple-400">
                                    Forgot password?
                                </a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" required
                                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-purple shadow-sm ring-1 ring-inset ring-purple-500 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6 pl-3">
                        
                            @error('password')
                                <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                            @enderror

                        </div>

                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-purple-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-purple-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-500">
                            Enter
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