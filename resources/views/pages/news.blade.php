@extends('layouts.app')

@section('title', 'ecommerce | Our News')

@section('content')

    <x-partials.navigation />

    <main>

        <section>

            <div class="mb-16">
            
                <div>
                    <div class="container flex justify-center mx-auto pt-16">
                        <div>
                            <p class="text-purple-600 text-lg text-center font-normal pb-3">OUR NEWS</p>
                            <h1
                                class="xl:text-4xl text-3xl text-center text-gray-800 font-extrabold pb-6 sm:w-4/6 w-5/6 mx-auto">
                                Enjoy reading our news related to the fashion and the trending cloth.    
                            </h1>
                        </div>
                    </div>
        
                    <div class="w-full bg-gray-100 px-10 pt-10">
                        <div class="container mx-auto">
                            <div role="list" aria-label="Behind the scenes People "
                                class="lg:flex md:flex sm:flex items-center xl:justify-between flex-wrap md:justify-around sm:justify-around lg:justify-around">
                            
                                @foreach($newsPosts as $news)

                                    <div role="listitem"
                                        class="xl:w-1/3 sm:w-3/4 md:w-2/5 relative mt-16 mb-32 sm:mb-24 xl:max-w-sm lg:w-2/5">
                                        <div class="rounded overflow-hidden shadow-md bg-white">
                                            <div class="absolute -mt-20 w-full flex justify-center">
                                                <div class="h-32 w-32">
                                                    <img 
                                                        src="{{ asset('storage/' . $news->header_image) }}"
                                                        alt="{{ $news->title }} Image" 
                                                        class="rounded-full object-cover h-full w-full shadow-md" />
                                                </div>
                                            </div>
                                            <div class="px-6 mt-16">
                                                <h1 class="font-bold text-xl text-center mb-1">{{ $news->title }}</h1>
                                                <p class="text-gray-800 text-sm text-center">
                                                    {{ $news->excerpt }}
                                                </p>
                                                <p class="text-center text-gray-600 text-base pt-3 font-normal">
                                                    {{ $news->subtitle }}
                                                </p>
                                                <div class="w-full flex justify-center pt-5 pb-5">
                                                    <a 
                                                        href="{{ route('news.show', ['id' => $news->id]) }}" 
                                                        class="mx-5 px-4 py-2 bg-purple-600 text-white hover:bg-purple-500"
                                                        >
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                @endforeach
        
                            </div>
                        </div>
                    </div>
        
                </div>
             
            </div>

        </section>

    </main>

    <x-partials.footer />

@endsection