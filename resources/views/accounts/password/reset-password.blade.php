@extends('layouts.app')

@section('title', config('app.name') . ' | reset password')

@section('content')
    
    <main class="flex min-h-full flex-col justify-center px-6 py-14 lg:px-8">

        {{-- Header --}}
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            @if($websiteInfo && $websiteInfo->signup_logo)
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
                Reset Password
            </h2>

            @if($errors->has('errorCredentials'))
                <div class="mt-4 text-sm text-red-600 text-center">{{ $errors->first('errorCredentials') }}</div>
            @endif
        
        </div>

        {{-- Form Input --}}

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            <form 
                class="space-y-6" 
                action="{{ route('reset.password.post', ['token' => $user->remember_token]) }}" 
                method="POST"  
                enctype="multipart/form-data">
                
                @csrf

                    <div>

                        <label for="password" class="block text-sm font-medium leading-6 text-balance">Password</label>

                        <div class="mt-2">
                            <input id="password"  name="password" type="password" required
                                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-purple shadow-sm ring-1 ring-inset ring-purple-500 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6 pl-3">
                        </div> 
                        @if($errors->has('errorCredentials'))
                            <div class="mt-4 text-sm text-red-600 text-center">{{ $errors->first('errorCredentials') }}</div>
                        @endif
                    
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password_confirmation" class="block text-sm font-medium leading-6 text-black">Confirm Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-purple shadow-sm ring-1 ring-inset ring-purple-500 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6 pl-3">

                        </div>

                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-purple-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-purple-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-500">
                            Change
                        </button>
                    </div>

            </form>

        </div>

    </main>

@endsection