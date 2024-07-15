<div class="bg-white w-full px-4 pt-8 pb-8" id="faq">

    <h2 class="text-5xl font-bold text-center">Our Brands</h2>
    <p class="pt-6 pb-8 text-base max-w-2xl text-center m-auto">
        Lorem ipsum dolor sit amet
        consectetur adipisicing elit nam maxime quas fugiat tempore blanditiis, eveniet quia accusantium.
    </p>

    <div
        class="mx-auto w-full max-w-4xl bg-white justify-center items-center grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
        
        @foreach ($brands as $brand)
            
            @if ($brand->logo_url)
                
                <a href="{{ route('brands') }}">
                    <img 
                        alt="{{ $brand->name }} logo image" 
                        class="h-20  mx-auto" 
                        src="{{ asset('storage/' . $brand->logo_url) }}"
                        >
                </a>

            @else
                
                <a href="{{ route('brands') }}">
                    <img 
                        alt="{{ $brand->name }} logo image" 
                        class="h-20  mx-auto" 
                        src="{{ asset('assets/images/brands/generic_brand.png') }}"
                        >
                </a>

            @endif

        @endforeach
    
    </div>

</div>