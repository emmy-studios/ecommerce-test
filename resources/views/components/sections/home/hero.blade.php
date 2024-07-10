<section class="grid grid-cols-1 gap-4 md:grid-cols-2 py-6 bg-slate-200">

    <div class="flex flex-col pt-4 md:pt-40 px-10 space-y-4">

        <h1 class="font-black text-5xl">Find The Best Fashion Style For You</h1>

        <p class="px-2 text-slate-700">
            Discover a world of fashion, home accessories, and beauty products. 
            Elevate your style, enhance your living space, and perfect your look 
            with our curated collection of clothing, home decor, and makeup essentials.
        </p>

        <div>
            <a 
                class="px-4 py-2 bg-purple-600 text-white hover:bg-purple-500" 
                href="{{ route('products') }}">
                SHOP NOW!
            </a>
        </div>

    </div>

    {{-- Hero Image --}}
    <div class="pt-6 pl-4">
        <img 
            class="" 
            src="{{ asset('assets/images/core/home01_remove.png') }}" 
            alt="Hero Image">
    </div>

</section>