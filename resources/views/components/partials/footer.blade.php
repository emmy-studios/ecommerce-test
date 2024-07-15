<footer class="bg-white dark:bg-gray-900">

    <div class="container px-6 py-12 mx-auto">

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">

            <livewire:subscribe.subscribe-form-email />

            <div>
                <p class="font-semibold text-gray-800 dark:text-white">Quick Link</p>

                <div class="flex flex-col items-start mt-5 space-y-2">
                    <a 
                        href="{{ route('home') }}" 
                        class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-purple-400 hover:underline hover:text-purple-500">
                        Home
                    </a>
                    <a 
                        href="{{ route('products') }}" 
                        class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-purple-400 hover:underline hover:text-purple-500">
                        Our Products
                    </a>
                    <a href="{{ route('news') }}" class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-purple-400 hover:underline hover:text-purple-500">
                        Our News
                    </a>
                </div>
            </div>

            <div>
                <p class="font-semibold text-gray-800 dark:text-white">Our Trending News</p>

                <livewire:news.footer-news />

            </div>
        </div>
        
        <hr class="my-6 border-gray-200 md:my-8 dark:border-gray-700">
        
        <div class="flex items-center justify-between">
            {{-- ecommerce logo --}}
            <livewire:core.footer-logo />
            
            {{--- Footer Icons ---}}
            <livewire:core.footer-icons />

        </div>
    </div>

</footer>