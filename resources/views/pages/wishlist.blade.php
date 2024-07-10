@extends('layouts.app')

@section('title', 'Wishlist | Ecommerce Website')
    
@section('content')
    
    <x-partials.navigation />

    <main>

        <section class="my-10">

            <div class="py-6 text-center">
                <h1 class="font-bold text-3xl">Your Wishlist</h1>
            </div>

        </section>

        <section class="flex justify-center">

            @if($products->isEmpty())

                <p>
                    No products added.
                </p>
            
            @else

                <livewire:wishlists.wishlist-items :wishlistId="$id"/>
            
            @endif

        </section>

        <aside class="flex justify-center my-10"> 

            <div class="flex flex-row justify-end gap-2 my-2 py-8">
                <a 
                    class="text-red-700 hover:text-red-500 hover:cursor-pointer py-2"
                    href="{{ route('products') }}"
                    >
                    Continue to Shopping
                </a>
                <a 
                    class="font-bold px-4 py-2 bg-purple-600 text-white hover:bg-purple-500 rounded-xl"
                    href="{{ route('home') }}"
                    >
                    Home
                </a>
            </div>

        </aside>

    </main>

    <x-partials.footer />

@endsection