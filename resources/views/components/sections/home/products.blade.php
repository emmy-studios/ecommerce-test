<section class="pt-10">

    <div 
        class="flex flex-col py-20 px-6 md:px-1 space-y-6"
        >

        <h1 class="text-5xl text-center font-black">Our Products</h1>
        <p class="text-center">
            There are some of our products. Click on 
            <a class="font-bold" href="{{ route('products') }}">More</a> to see all our Products.
        </p>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mx-6">

        <div class="w-72 h-fit group">

            <div class="relative overflow-hidden">
                <img src="{{ asset('assets/images/products/product01.jpg') }}" alt="">
                <div 
                    class="absolute flex items-center justify-center w-full h-full bg-black/20 -bottom-10 group-hover:bottom-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                    <button class="bg-black text-white px-5 py-2">
                        Add to Cart
                    </button>
                </div>
            </div>

            <h2 class="mt-3 text-xl capitalize">Product Title</h2>
            <del class="text-red-700 text-lg">$40.00</del>
            <p class="text-xl mt-2 ml-1 inline-block">$30.00</p>

        </div>

        <div class="w-72 h-fit group">

            <div class="relative overflow-hidden">
                <img src="{{ asset('assets/images/products/product01.jpg') }}" alt="">
                <div 
                    class="absolute flex items-center justify-center w-full h-full bg-black/20 -bottom-10 group-hover:bottom-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                    <button class="bg-black text-white px-5 py-2">
                        Add to Cart
                    </button>
                </div>
            </div>

            <h2 class="mt-3 text-xl capitalize">Product Title</h2>
            <del class="text-red-700 text-lg">$40.00</del>
            <p class="text-xl mt-2 ml-1 inline-block">$30.00</p>

        </div>

        <div class="w-72 h-fit group">

            <div class="relative overflow-hidden">
                <img src="{{ asset('assets/images/products/product01.jpg') }}" alt="">
                <div 
                    class="absolute flex items-center justify-center w-full h-full bg-black/20 -bottom-10 group-hover:bottom-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                    <button class="bg-black text-white px-5 py-2">
                        Add to Cart
                    </button>
                </div>
            </div>

            <h2 class="mt-3 text-xl capitalize">Product Title</h2>
            <del class="text-red-700 text-lg">$40.00</del>
            <p class="text-xl mt-2 ml-1 inline-block">$30.00</p>

        </div>

        <div class="w-72 h-fit group">

            <div class="relative overflow-hidden">
                <img src="{{ asset('assets/images/products/product01.jpg') }}" alt="">
                <div 
                    class="absolute flex items-center justify-center w-full h-full bg-black/20 -bottom-10 group-hover:bottom-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                    <button class="bg-black text-white px-5 py-2">
                        Add to Cart
                    </button>
                </div>
            </div>

            <h2 class="mt-3 text-xl capitalize">Product Title</h2>
            <del class="text-red-700 text-lg">$40.00</del>
            <p class="text-xl mt-2 ml-1 inline-block">$30.00</p>

        </div>

    </div>

</section>
