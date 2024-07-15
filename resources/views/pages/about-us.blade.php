@extends('layouts.app')

@section('title', 'ecommerce | about us')

@section('content')
    
    <x-partials.navigation />

    <main>

        <section>

            <div class="py-16 bg-white">
                <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
                    <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
                        <div class="md:5/12 lg:w-5/12">
                            <img 
                                src="{{ asset('assets/images/core/about-us01.jpg') }}" 
                                alt="Abou Us Section Image"
                                loading="lazy" width="" height="">
                        </div>
                        <div class="md:7/12 lg:w-6/12">
                            <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">
                                Transform Your Style with Us
                            </h2>
                            <p class="mt-6 text-gray-600">
                                Welcome to ecommerce, where fashion meets innovation. Our online store is designed 
                                for you to manage your products with ease, allowing you to focus on what you love: fashion 
                                and your customers.
                            </p>
                            <p class="my-4 text-gray-600"> 
                                From starting on Instagram to offering a professional shopping experience on our 
                                platform, we're here to support your growth.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
    
        </section>


        <section class="mx-4">
            <div
                class="mx-auto max-w-sm mt-20 border-4 border-purple-600 shadow shadow-purple-600/100 p-4 md:p-10 flex flex-col items-center justify-center text-center">
               
                <p class="text-purple-900 text-xl md:text-2xl font-bold border-b-4 border-b-purple-300">Send Us a Message</p>
        
                <ul class="flex flex-col items-center justify-center text-center mt-5 space-y-4">
                    
                    <div class="flex flex-row space-x-2">
                        <i class="fa-solid fa-envelope h-8 text-purple-700 hover:text-purple-300"></i>
                        <p class="text-sm">luisfernandomorales930@gmail.com</p>
                    </div>

                    <div class="flex flex-row space-x-4">
                        <i class="fa-brands fa-whatsapp h-8 text-purple-700 hover:text-purple-300"></i>
                        (+506) 1234 56789
                    </div>

                </ul>
            </div>
        </section>


        <section>

            <div id="contact-us" class="overflow-hidden bg-white py-16 px-4 dark:bg-purple-900 sm:px-6 lg:px-8 lg:py-24">
                <div class="relative mx-auto max-w-xl">
                    <svg class="absolute left-full translate-x-1/2 transform" width="404" height="404" fill="none"
                        viewBox="0 0 404 404" aria-hidden="true">
                        <defs>
                            <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20"
                                patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-purple-200 dark:text-purple-600"
                                    fill="currentColor"></rect>
                            </pattern>
                        </defs>
                        <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"></rect>
                    </svg>
                    <svg class="absolute right-full bottom-0 -translate-x-1/2 transform" width="404" height="404"
                        fill="none" viewBox="0 0 404 404" aria-hidden="true">
                        <defs>
                            <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20"
                                patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-purple-200 dark:text-purple-800"
                                    fill="currentColor"></rect>
                            </pattern>
                        </defs>
                        <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"></rect>
                    </svg>
                    <div class="text-center">
                        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-gray-200 sm:text-4xl">
                            Contact Us
                        </h2>
                        <p class="mt-4 text-lg leading-6 text-purple-500 dark:text-purple-400">Please use the form below to
                            contact us.
                            Thank you!
                        </p>
                    </div>

                    @if (session('successEmail'))
                        
                        <div class="flex justify-center my-4">
                            <p class="text-red-600 text-sm">{{ session('successEmail') }}</p>
                        </div>
                        
                    @endif
                    
                    <div class="mt-12">

                        {{-- Contact Form --}}
                        <form 
                            action="{{ route('contact.post') }}"
                            method="POST" 
                            class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">

                            @csrf

                                <div class="sm:col-span-2">
                                    <label for="name"
                                        class="block text-sm font-medium text-purple-700 dark:text-purple-400">Name</label>
                                    <div class="mt-1">
                                        <input 
                                            name="name" 
                                            type="text" 
                                            id="name"  
                                            value="{{ old('name') }}"                                     
                                            class="border border-purple-300 block w-full rounded-md py-3 px-4 shadow-sm focus:border-purple-500 focus:ring-purple-500 dark:border-white/5 dark:bg-purple-700/50 dark:text-white">
                                        @error('name')
                                            <p class="ml-3 mt-1 text-red-600 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="email"
                                        class="block text-sm font-medium text-purple-700 dark:text-purple-400">Email</label>
                                    <div class="mt-1">
                                        <input 
                                            name="email" 
                                            id="email" 
                                            type="email"
                                            value="{{ old('email') }}"
                                            class="border border-purple-300 block w-full rounded-md py-3 px-4 shadow-sm focus:border-purple-500 focus:ring-purple-500 dark:border-white/5 dark:bg-purple-700/50 dark:text-white">
                                        @error('email')
                                            <p class="ml-3 mt-1 text-red-600 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="message"
                                        class="block text-sm font-medium text-purple-700 dark:text-purple-400">Message</label>
                                    <div class="mt-1">
                                        <textarea
                                            name="message" 
                                            id="message" 
                                            rows="4"
                                            class="border border-purple-300 block w-full rounded-md py-3 px-4 shadow-sm focus:border-purple-500 focus:ring-purple-500 dark:border-white/5 dark:bg-purple-700/50 dark:text-white">
                                            {{ old('message') }}
                                        </textarea>
                                        @error('message')
                                            <p class="ml-3 mt-1 text-red-600 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                </div>

                                <div class="flex justify-end sm:col-span-2">
                                    <button type="submit"
                                        class="inline-flex items-center rounded-md px-4 py-2 font-medium focus:outline-none focus-visible:ring focus-visible:ring-purple-500 shadow-sm sm:text-sm transition-colors duration-75 text-purple-500 border border-purple-500 hover:bg-purple-50 active:bg-purple-100 disabled:bg-purple-100 dark:hover:bg-purple-900 dark:active:bg-purple-800 dark:disabled:bg-purple-800 disabled:cursor-not-allowed">
                                        <span>Send Message</span>
                                    </button>
                                </div>

                        </form>
                        
                    </div>
                </div>
            </div>
    
        </section>

    </main>

    <x-partials.footer />

@endsection