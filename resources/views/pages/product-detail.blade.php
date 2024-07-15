@extends('layouts.app')

@section('title', 'Product Detail | ecommerce Website')
    
@section('content')
    
    <x-partials.navigation /> 

    
 
    <main>


        <section class="my-10">

            <div class="container mx-auto px-6">
                
                <div class="md:flex md:items-center">
                    <!-- Product Image -->
                    <div class="w-full h-64 md:w-1/2 lg:h-96">

                        {{-- Mostrar la imagen principal del producto o una imagen por defecto si no hay imágenes disponibles --}}
                        @php
                            $firstImage = $product->productImages->sortBy('id')->first();
                        @endphp

                        @if($firstImage)    
                            <img 
                                class="h-full w-full rounded-md object-cover max-w-lg mx-auto"
                                src="{{ asset('storage/' . $firstImage->image_url) }}" 
                                alt="{{ $product->name }}"
                                >
                        @else

                            <img
                                class="h-full w-full rounded-md object-cover max-w-lg mx-auto"
                                src="{{ asset('assets/images/products/default_product_image01.jpg') }}" 
                                alt="{{ $product->name }}"
                                >

                        @endif

                    </div>

                    <!-- Product Information -->
                    <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">

                        <h3 class="text-gray-700 uppercase text-lg">{{ $product->name }}</h3>
                        <p class="text-sm">{{ $product->description }}</p>
                        <span class="text-gray-500 mt-3">${{ $product->unit_price }}</span>
                        <hr class="my-3">
                        
                        <div class="mt-2">
                            <label class="text-gray-700 text-sm" for="count">Quantity:</label>
                            <div class="flex mt-1">
                                <span class="text-gray-700 text-lg mx-2">{{ $product->selling_quantity }}</span>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <label class="text-gray-700 text-sm" for="count">Color:</label>
                            <div class="flex items-center mt-1 space-x-2">

                                {{--@foreach($product->productDetails as $detail)
                                    @if($detail->color)
                                    <p class="">
                                        {{ $detail->color->product_color }}
                                    </p>
                                    @else
                                    <p class="">
                                        None
                                    </p>
                                    @endif
                                @endforeach--}}
                                @foreach($uniqueColors as $detail)

                                    @if($detail->color)
                                        <p>{{ $detail->color->product_color }}</p>
                                    @else
                                        <p>None</p>
                                    @endif

                                @endforeach
                            </div>

                        </div>

                        <div class="mt-3">
                            <label class="text-gray-700 text-sm" for="count">Sizes:</label>
                            <div class="flex items-center mt-1 space-x-2">

                                @foreach($product->productDetails as $detail)
                                    @if($detail->size)
                                        <p class="">
                                            {{ $detail->size->product_size }}
                                        </p>
                                    @else
                                        <p class="">
                                            None
                                        </p>
                                    @endif
                                @endforeach

                            </div>

                        </div>

                        @auth()
                            <div class="flex flex-col items-start mt-6 space-y-3">
                                <livewire:shoppingcarts.add-to-cart-btn :productId="$product->id" />
                                <livewire:wishlists.add-to-wishlist-btn :productId="$product->id" />

                            </div>
                        @endauth
                    </div>

                </div>

                <!-- Product Review -->
                <livewire:reviews.show-reviews :productId="$product->id" />
                    

                <!-- Related Products -->
                <livewire:products.more-products />

            </div>

        </section>

    </main>

    <x-partials.footer />

@endsection