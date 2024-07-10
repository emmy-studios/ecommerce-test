@extends('layouts.app')

@section('title', 'Shopping Cart | ecommerce Website')
    
@section('content')
    
    <x-partials.navigation />

    <main>

        <section class="flex justify-center">

            <livewire:shoppingcarts.shoppingcart-items :shoppingcartId="$id"/>

        </section>

        <aside class="flex justify-center mb-8">

            <div class="my-10">
                <a 
                    class="text-red-700 hover:text-red-500 hover:cursor-pointer"
                    href="{{ route('products') }}"
                    >
                    Continue to Shopping
                </a>
            </div>

        </aside>

    </main>

    <x-partials.footer />

@endsection