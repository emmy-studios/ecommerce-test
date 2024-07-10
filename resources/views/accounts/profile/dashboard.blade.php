@extends('layouts.app')

@section('title', 'ecommerce | User Dashboard')

@section('content')

    <x-partials.navigation />

    <main>

        <div class="bg-gray-100">
            <div class="container mx-auto py-8">
                <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                    
                    {{-- Personal Information --}}
                    <div class="col-span-4 sm:col-span-3">
    
                        <div class="bg-white shadow rounded-lg p-6">
                            <div class="flex flex-col items-center">
    
                                <img 
                                    src="{{ asset('assets/images/accounts/users/' . $user->profile_image) }}"
                                    class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0"
                                    >
    
                                </img>
                                <h1 class="text-xl font-bold">{{ $user->name }}</h1>
                                <p class="text-gray-700">{{ $user->first_name }} {{ $user->last_name }}</p>
                                
                                <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                    <a 
                                        href="{{ route('profile.edit') }}" 
                                        class="bg-purple-600 hover:bg-purple-500 text-white py-2 px-4 rounded"
                                        >
                                        Edit Profile
                                    </a>
                                    <a 
                                        href="{{ route('wishlist.show', ['id' => $wishlist->id]) }}" 
                                        class="bg-purple-600 hover:bg-purple-500 text-white py-2 px-4 rounded"
                                        >
                                        Wishlist
                                    </a>
                                </div>
     
                            </div>
                            <hr class="my-6 border-t border-gray-300">
    
                            <div class="flex flex-col">
                                <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Address</span>
                                <p class="mb-2">
                                    Country: <span class="text-sm text-gray-500">{{ $address->country }}</span>
                                </p>
                                <p class="mb-2">
                                    City: <span class="text-sm text-gray-500">{{ $address->city }}</span>
                                </p>
                                <p class="mb-2">
                                    State: <span class="text-sm text-gray-500">{{ $address->state }}</span>
                                </p>
                                <p class="mb-2">
                                    Personal Address: <span class="text-sm text-gray-500">{{ $address->address_line_1 }}</span>
                                </p>
                                <p class="mb-2">
                                    Shipping Address <span class="text-sm text-gray-500">{{ $address->address_line_2 }}</span>
                                </p>
                            </div>
    
                        </div>
    
                    </div>
    
                    <div class="col-span-4 sm:col-span-9">
    
                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-xl font-bold mb-4">About Me</h2>
                            <p class="text-gray-700">
                                {{ $user->bio }}
                            </p>
    
                            <h3 class="font-semibold text-center mt-3 -mb-2">
                                Find me on
                            </h3>
    
                            <div class="flex justify-center items-center gap-6 my-6">

                                <a 
                                    class="text-gray-700 hover:text-purple-600" 
                                    aria-label="Visit my Tiktok" 
                                    href="{{ $user->socialmedialink->tiktok_url }}" 
                                    target="_blank">
                                    <i class="fa-brands fa-tiktok h-6"></i>
                                </a>
                                <a 
                                    class="text-gray-700 hover:text-purple-600" 
                                    aria-label="Visit TrendyMinds Facebook" 
                                    href="{{ $user->socialmedialink->facebook_url }}"
                                    target="_blank">
                                    <i class="fa-brands fa-facebook-f h-6"></i>
                                </a>
                                <a 
                                    class="text-gray-700 hover:text-purple-600" 
                                    aria-label="Visit TrendyMinds Instagram" 
                                    href="{{ $user->socialmedialink->instagram_url }}"
                                    target="_blank">
                                    <i class="fa-brands fa-instagram h-6"></i>
                                </a>
                                <a 
                                    class="text-gray-700 hover:text-purple-600" 
                                    aria-label="Visit TrendyMinds Twitter" 
                                    href="{{ $user->socialmedialink->twitter_url }}"
                                    target="_blank">
                                    <i class="fa-brands fa-twitter h-6"></i>
                                </a>
                            </div>
    
    
                            <h2 class="text-xl font-bold mt-6 mb-4">Orders</h2>

                            @if($orders->isEmpty())

                                <p>
                                    No order for user.
                                </p>

                            @else
                            
                                @foreach($orders as $order)
                                    <!--<div class="border-b border border-purple-500"></div>-->
                                    <div class="mb-6 bg-slate-200 rounded-xl">
            
                                        <div class="flex justify-between flex-wrap gap-2 w-full px-6 py-4">
                                            <span class="text-gray-700 font-bold">Order Code: {{ $order->order_code }}</span>
                                            <p>
                                                <span class="text-gray-700 mr-2">{{ $order->created_at->format('d-m-Y') }}</span>
                                                <span class="text-gray-700">Created at {{ $order->created_at->format('h:i A') }}</span>
                                                
                                            </p> 
                                        </div>
                                        <p class="mt-2 px-8 py-2"> 
                                            Subtotal: ${{ $order->subtotal }}
                                        </p>
                                        <p class="mt-2 px-8 py-2"> 
                                            Total: ${{ $order->total }}
                                        </p>
                                        <div class="flex justify-start px-4 py-4"> 
                                            <a 
                                                class="px-4 py-2 bg-purple-600 text-white hover:bg-purple-500 cursor-pointer rounded-sm"
                                                href="{{ route('order.show', ['id' =>$order->id]) }}"
                                                >
                                                Details
                                            </a>
                                        </div>
                                        
                                    </div>

                                @endforeach

                            @endif

                        </div>
    
                    </div>
    
                </div>
            </div>
        </div>

    </main>

    <x-partials.footer />

@endsection

