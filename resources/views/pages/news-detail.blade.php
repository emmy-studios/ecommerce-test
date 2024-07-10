@extends('layouts.app')

@section('title', 'ecommerce | Our News')

@section('content')

    <x-partials.navigation />

    <main>

        <section>

            <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
                <div 
                    class="bg-cover bg-center text-center overflow-hidden"
                    style="min-height: 500px; background-image: url({{ asset('storage/' . $news->header_image) }})"
                    title="{{ $news->title }} image">
                </div>
                <div class="max-w-3xl mx-auto">
                    <div
                        class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                        <div class="bg-white relative top-0 -mt-32 p-5 sm:p-10">
                            <h1 href="#" class="text-gray-900 font-bold text-3xl mb-2">{{ $news->title }}</h1>
                            
                            <p class="text-gray-700 text-xs mt-2">Written By:

                                @foreach($news->authors as $author)
                                    <a href="#"
                                        class="text-purple-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                                        {{ $author->nickname }}
                                    </a>
                                @endforeach

                                 In

                                @foreach($news->newstags as $tag)
                                    <a href="#"
                                        class="text-xs text-purple-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                                        {{ $tag->name }}
                                    </a>|
                                @endforeach

                            </p>

                            <h3 class="text-xl font-bold text-purple-600 my-5">{{ $news->subtitle }}</h3>

                            <p class="text-base leading-8 my-5">
                                {{ $news->resume }}
                            </p>

                            <p class="text-base leading-8 my-5">
                                {{ $news->header }}
                            </p>

                            <p class="text-base leading-8 my-5">
                                {{ $news->content }}
                            </p>

                            <div class="text-base leading-8 my-5">
                                {{ $news->header }}
                            </div>

                            <p class="text-base leading-8 my-5">
                                {{ $news->section_1 }}
                            </p>

                            <p class="text-base leading-8 my-5">
                                <img 
                                    src="{{ asset('storage/' . $news->second_image) }}" 
                                    alt="{{ $news->title }} second image">
                            </p>

                            <p class="text-base leading-8 my-5">
                                {{ $news->conclusion }}
                            </p>
                            
                            @foreach($news->newstags as $tag)
                                <a href="#"
                                    class="text-xs text-purple-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                                    #{{ $tag->name }}
                                </a>|
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>

        </section>

    </main>

    <x-partials.footer />

@endsection