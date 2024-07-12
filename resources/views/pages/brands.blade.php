@extends('layouts.app')

@section('title', 'ecomerce | Our Brands')

@section('content')
    
    <x-partials.navigation />

    <main>

        <h1 class="text-center text-5xl font-bold my-8 py-8">Our Brands</h1>

        <section class="flex justify-center my-8">

            <div class="flex justify-center flex-wrap gap-5 lg:inline-grid lg:grid-cols-4 xl:grid-cols-5 p-6">
                
                <div class="bg-white rounded-lg shadow w-18 h-18 flex justify-center items-center">
                    <img 
                        class="h-10" 
                        src="{{ asset('assets/images/brands/logo/adidas_logo.png') }}" 
                        alt=""
                        >
                </div>

                <div class="bg-white rounded-lg shadow w-18 h-18 flex justify-center items-center">
                    <img 
                        class="h-10" 
                        src="{{ asset('assets/images/brands/logo/converse_logo.png') }}" 
                        alt=""
                        >
                </div>

                <div class="bg-white rounded-lg shadow w-18 h-18 flex justify-center items-center">
                    <img 
                        class="h-10" 
                        src="{{ asset('assets/images/brands/logo/fila_logo.png') }}" 
                        alt=""
                        >
                </div>

                <div class="bg-white rounded-lg shadow w-18 h-18 flex justify-center items-center">
                    <img 
                        class="h-10" 
                        src="{{ asset('assets/images/brands/logo/gucci_logo.png') }}" 
                        alt=""
                        >
                </div>

                <div class="bg-white rounded-lg shadow w-18 h-18 flex justify-center items-center">
                    <img 
                        class="h-10" 
                        src="{{ asset('assets/images/brands/logo/lacoste_logo.png') }}" 
                        alt=""
                        >
                </div>

                <div class="bg-white rounded-lg shadow w-18 h-18 flex justify-center items-center">
                    <img 
                        class="h-10" 
                        src="{{ asset('assets/images/brands/logo/levis_logo.png') }}" 
                        alt=""
                        >
                </div>

                <div class="bg-white rounded-lg shadow w-18 h-18 flex justify-center items-center">
                    <img 
                        class="h-10" 
                        src="{{ asset('assets/images/brands/logo/nike_logo.png') }}" 
                        alt=""
                        >
                </div>

                <div class="bg-white rounded-lg shadow w-18 h-18 flex justify-center items-center">
                    <img 
                        class="h-10" 
                        src="{{ asset('assets/images/brands/logo/puma_logo.png') }}" 
                        alt=""
                        >
                </div>
             
                <div class="bg-white rounded-lg shadow w-18 h-18 flex justify-center items-center">
                    <img 
                        class="h-10" 
                        src="{{ asset('assets/images/brands/logo/vans_logo.png') }}" 
                        alt=""
                        >
                </div>

                <div class="bg-white rounded-lg shadow w-18 h-18 flex justify-center items-center">
                    <img 
                        class="h-10" 
                        src="{{ asset('assets/images/brands/logo/zara_logo.png') }}" 
                        alt=""
                        >
                </div>

            </div>

        </section>

    </main>

    <x-partials.footer />

@endsection