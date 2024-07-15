@extends('layouts.app')

@section('title', 'Welcome | Ecommerce Website')
    
@section('content')
    
    <x-partials.navigation />

    <main>

        <x-sections.home.hero />
        
        <x-sections.home.first-banner />

        <section class="py-20 px-6">

            <div 
                class="flex flex-col py-20 px-6 md:px-1 space-y-6"
                >

                <h1 class="text-5xl text-center font-black">New Collection</h1>
                <p class="text-center">
                    There are some of our new products. Click on <a class="font-bold" href="{{ route('products') }}">More</a> to see our collections.
                </p>

            </div>

            <livewire:products.new-products />

        </section>

        {{-- Discounts --}}
        <livewire:discounts.discount />

        <section class="my-10">

            <livewire:discounts.discount-products />

        </section>

        <section class="py-10 mt-8 px-6">

            <div 
                class="flex flex-col py-10 px-6 md:px-1 space-y-6"
                >

                <h1 class="text-5xl text-center font-black">Our Products</h1>
                <p class="text-center">
                    There are some of our products. Click on <a class="font-bold" href="{{ route('products') }}">More</a> to explore our shop.
                </p>

            </div>

            <livewire:products.our-products />

        </section>


        <x-sections.home.second-banner />
        
        <section class="pt-4">

            <livewire:brands.brands-banner />

        </section>

        <x-partials.footer/>
        
    </main>

@endsection
