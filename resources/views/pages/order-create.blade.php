@extends('layouts.app')

@section('title', 'Create an Order | ecommerce')

@section('content')

    <x-partials.navigation />

    <main>

        <form action="{{ route('order.store') }}" method="post">

            @csrf

            <div class="py-14 px-4 md:px-6 2xl:px-20 2xl:container 2xl:mx-auto">

                <div class="flex justify-start item-start space-y-2 flex-col">
                    <h1 class="text-3xl dark:text-white lg:text-4xl font-semibold leading-7 lg:leading-9 text-gray-800">
                        Create an Order
                    </h1>
                    <p class="text-base dark:text-gray-300 font-medium leading-6 text-gray-600">
                        {{ $currentDateTime }}
                    </p>
                </div>
    
                <div
                    class="mt-10 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
                    <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">
    
                        <div
                            class="flex flex-col justify-start items-start dark:bg-gray-800 bg-gray-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
                            <p class="text-lg md:text-xl dark:text-white font-semibold leading-6 xl:leading-5 text-gray-800">
                                Customer s Cart
                            </p>
    
                            @foreach($products as $product)
    
                                <div
                                    class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
                                    <div class="pb-4 md:pb-8 w-full md:w-40">
                                        


                                        <img 
                                            class="w-32 md:block" 
                                            src="{{ $product->firstImage ? asset('storage/' . $product->firstImage->image_url) : asset('assets/images/products/default_product_image01.jpg') }}"  
                                            alt="{{ $product->name }}" />
    
                                    </div>
                                    <div
                                        class="border-b border-gray-200 md:flex-row flex-col flex justify-between items-start w-full pb-8 space-y-4 md:space-y-0">
                                        <div class="w-full flex flex-col justify-start items-start space-y-8">
                                            <h3 class="text-xl dark:text-white xl:text-2xl font-semibold leading-6 text-gray-800">
                                                {{ $product->name }}
                                            </h3>
                                            <div class="flex justify-start items-start flex-col space-y-2">
    
                                                <p class="text-sm dark:text-white leading-none text-gray-800">
                                                    <span class="dark:text-gray-400 text-purple-600">Size: </span>
                                                    <select name="products[{{ $product->id }}][size]" required>
                                                        @foreach($product->productDetails as $detail)
                                                            <option value="{{ $detail->size->product_size }}">{{ $detail->size->product_size }}</option>
                                                        @endforeach
                                                    </select>
                                                </p>
    
                                                <p class="text-sm dark:text-white leading-none text-gray-800">
                                                    <span class="dark:text-gray-400 text-purple-600">Color: </span>
                                                    <select name="products[{{ $product->id }}][color]" required>
                                                        @foreach($product->productDetails as $detail)
                                                            <option value="{{ $detail->color->product_color }}">{{ $detail->color->product_color }}</option>
                                                        @endforeach
                                                    </select>
                                                </p>
    
                                            </div>
                                        </div>
    
                                        <div class="flex justify-between space-x-8 items-start w-full">
    
                                            <p name="price" class="text-base dark:text-white xl:text-lg leading-6">
                                                ${{ $product->unit_price }}
                                            </p>
                                            <input type="hidden" name="products[{{ $product->id }}][price]" value="{{ $product->unit_price }}">
    
                                            {{-- Discount --}}
                                            {{--@if ($discount && $discount->products->contains($product->id))
                                                <p class="text-base dark:text-red-500 xl:text-lg leading-6">
                                                    Discounted Price: ${{ $product->unit_price - ($product->unit_price * ($discount->discount_percentage / 100)) }}
                                                </p>
                                            @endif--}}
                                            {{-- Discount --}}
                                            <p class="text-base dark:text-white xl:text-lg leading-6 text-gray-800">
                                                <input
                                                    class="w-10" 
                                                    type="number" 
                                                    name="products[{{ $product->id }}][quantity]" 
                                                    value="1" 
                                                    min="1" 
                                                    required
                                                    >
                                            </p>
    
                                        </div>
    
                                    </div>
                                </div>
    
                            @endforeach
    
                        </div>
    
                        <div
                            class="flex justify-center flex-col md:flex-row items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">
                            <!-- Order Summary Starts -->
                            <div class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                                <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Summary</h3>
                                <div
                                    class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                                    <div class="flex justify-between w-full">
                                        <p class="text-base dark:text-white leading-4 text-gray-800">Subtotal</p>
                                        <p class="text-base dark:text-gray-300 leading-4 text-gray-600">${{ $subtotal }}</p>
                                    </div>
                                    <div class="flex justify-between items-center w-full">
                                        <p class="text-base dark:text-white leading-4 text-gray-800">Discount Code
                                        </p>
                                        <!--<p class="text-base dark:text-gray-300 leading-4 text-gray-600">-$28.00 (50%)</p>-->
                                        <input 
                                            class="w-40 border border-purple-500" 
                                            type="text"
                                            name="discount_code">
                                    </div>
                                    <!--<div class="flex justify-between items-center w-full">
                                        <p class="text-base dark:text-white leading-4 text-gray-800">Shipping</p>
                                        <p class="text-base dark:text-gray-300 leading-4 text-gray-600">$8.00</p>
                                    </div>-->
                                </div>
                                <div class="flex justify-between items-center w-full">
                                    <p class="text-base dark:text-white font-semibold leading-4 text-gray-800">
                                        Total
                                    </p>
                                    <p class="text-base dark:text-gray-300 font-semibold leading-4 text-gray-600">
                                        ${{ $total }}
                                    </p>
                                </div>
                            </div>
                            <!-- Order Summary Ends -->
    
                            <div
                                class="flex flex-col justify-center px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                                <div class="w-full flex justify-center items-center">
                                    <button
                                        type="submit"
                                        class="hover:bg-purple-500 dark:bg-white dark:text-purple-800 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-800 py-5 w-96 md:w-full bg-purple-600 text-base font-medium leading-4 text-white">
                                        Order by Email
                                    </button>
                                </div>
                            </div>
    
                        </div>
    
                    </div>
    
                    <!-- Customer Info Starts --> 
                    <div
                        class="bg-gray-50 dark:bg-gray-800 w-full xl:w-96 flex justify-between items-center md:items-start px-4 py-6 md:p-6 xl:p-8 flex-col">
                        <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Customer</h3>
                        <div
                            class="flex flex-col md:flex-row xl:flex-col justify-start items-stretch h-full w-full md:space-x-6 lg:space-x-8 xl:space-x-0">
                            <div class="flex flex-col justify-start items-start flex-shrink-0">
                                <div
                                    class="flex justify-center w-full md:justify-start items-center space-x-4 py-8 border-b border-gray-200">
                                    <img 
                                        class="w-10 h-10"
                                        src="{{ asset('assets/images/accounts/users/' . $user->profile_image) }}" 
                                        alt="{{ $user->name }} Profile Image" />
                                    <div class="flex justify-start items-start flex-col space-y-2">
                                        <p class="text-base dark:text-white font-semibold leading-4 text-left text-gray-800">
                                            {{ $user->first_name }}
                                            {{ $user->last_name }}</p>
                                        <p class="text-sm dark:text-gray-300 leading-5 text-gray-600">
                                            {{ $orderCount }} Previous Orders
                                        </p>
                                    </div>
                                </div>
    
                                <div
                                    class="flex justify-center text-gray-800 dark:text-white md:justify-start items-center space-x-4 py-4 border-b border-gray-200 w-full">
                                    <i class="fa-solid fa-envelope"></i>
                                    <p class="cursor-pointer text-sm leading-5 ">
                                        {{ $user->email }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex justify-between xl:h-full items-stretch w-full flex-col mt-6 md:mt-0">
                                <div
                                    class="flex justify-center md:justify-start xl:flex-col flex-col md:space-x-6 lg:space-x-8 xl:space-x-0 space-y-4 xl:space-y-12 md:space-y-0 md:flex-row items-center md:items-start">
                                    <div
                                        class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4 xl:mt-8">
                                        <p
                                            class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">
                                            Personal Address
                                        </p>
                                        <p
                                            class="w-48 lg:w-full dark:text-gray-300 xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600">
                                            {{ $user->address->address_line_1 }}
                                        </p>
                                    </div>
                                    <div
                                        class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4">
                                        <p
                                            class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">
                                            Shipping Address</p>
                                        <p
                                            class="w-48 lg:w-full dark:text-gray-300 xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600">
                                            {{ $user->address->address_line_2 }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex w-full justify-center items-center md:justify-start md:items-start mt-4">
                                    <a 
                                        class="text-center mt-6 md:mt-0 dark:border-white dark:hover:bg-purple-900 dark:bg-transparent dark:text-white py-5 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-800 border border-purple-800 font-medium w-96 2xl:w-full text-base leading-4 text-purple-800"
                                        href="{{ route('profile.edit') }}">
                                        Edit Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Customer Info Ends -->
    
                </div>
    
            </div>

        </form>

        

    </main>

    <x-partials.footer />

@endsection