<div class="relative" x-data="{ wishlistShow: false }">
    {{-- Wishlist Icon --}}
    <div class="t-0 absolute left-3">
        <p class="flex h-1 w-1 items-center justify-center rounded-full bg-purple-500 p-3 text-xs text-white">
            {{ $totalProducts }}
        </p>
    </div>

    <button @click="wishlistShow = !wishlistShow">
        <i class="fa-solid fa-heart px-2 py-3 mt-4 h-6 w-6"></i>
    </button>
 
    @auth() 

        <div 
            x-show="wishlistShow" 
            @click.outside="wishlistShow = false" 
            x-cloak
            class="absolute right-0 mt-2 py-2 w-[220px] bg-white rounded-lg shadow-xl">

            {{-- Products --}}

            @forelse($wishlistProducts as $product)

                <div class="grid grid-cols-3 items-center gap-4 mx-4 mt-2 mb-2 justify-center">

                    <img 
                        class=""
                        src="{{ $product->firstImage ? asset('storage/' . $product->firstImage->image_url) : asset('assets/images/products/default_product_image01.jpg') }}" 
                        alt="{{ $product->name }}"
                        >
                    <div>
                        <h3>{{ $product->name }}</h3>
                    </div>
                    
                    <p class="justify-self-end text-red-600 hover:text-red-400">
                        <i 
                            class="fa-solid fa-trash cursor-pointer"
                            wire:click="removeProduct({{ $product->id }})"></i>
                    </p>

                </div>

            @empty

                <div class="flex flex-row px-4 my-4 text-red-700 hover:text-red-500">
                    <p>
                        No product in wishlist.
                    </p> 
                </div>

            @endforelse     
            
            <div class="my-4 text-center">
                <a 
                    class="px-8 py-2 bg-purple-600 text-white hover:bg-purple-500 cursor-pointer"
                    href="{{ route('wishlist.show', ['id' => Auth::user()->wishlist->id]) }}"
                    >
                    View All
                </a>
            </div>

        </div>

    @endauth

    @guest()

        <div 
            x-show="wishlistShow" 
            @click.outside="wishlistShow = false" 
            x-cloak
            class="absolute right-0 mt-2 py-2 w-[220px] bg-white rounded-lg shadow-xl">

            <div class="flex flex-row px-4 my-4 text-red-700 hover:text-red-500">
                <p>
                    No product available.
                </p>
            </div>

        </div>

    @endguest

</div>
