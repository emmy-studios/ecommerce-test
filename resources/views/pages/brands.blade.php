@extends('layouts.app')

@section('title', 'ecomerce | Our Brands')

@section('content')
    
    <x-partials.navigation />

    <main>

        <h1 class="text-center text-5xl font-bold my-8 py-8">Our Brands</h1>

        <section class="flex justify-center my-8">

            <div class="flex justify-center flex-wrap gap-5 lg:inline-grid lg:grid-cols-4 xl:grid-cols-5 p-6">

                @foreach ($brands as $brand)

                    @if($brand->logo_url)

                        <div class="bg-white rounded-lg shadow w-18 h-18 flex justify-center items-center">
                            <img 
                                class="h-10" 
                                src="{{ asset('storage/' . $brand->logo_url) }}" 
                                alt="{{ $brand->name }} logo image"
                                >
                        </div>
                    
                    @else

                        <div class="bg-white rounded-lg shadow w-18 h-18 flex justify-center items-center">
                            <img 
                                class="h-10" 
                                src="{{ asset('assets/images/brands/generic_brand.png') }}" 
                                alt="{{ $brand->name }} logo image"
                                >
                        </div>

                    @endif
                    
                @endforeach

            </div>

        </section>

    </main>

    <x-partials.footer />

@endsection