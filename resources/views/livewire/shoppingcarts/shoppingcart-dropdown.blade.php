<div class="relative" x-data="{ shoppingcartShow: false }">
    {{-- Shoppingcart Icon --}}
    <div class="t-0 absolute left-3">
        <p class="flex h-1 w-1 items-center justify-center rounded-full bg-purple-500 p-3 text-xs text-white">
            {{ $totalProducts }}
        </p>
    </div> 

    <button @click="shoppingcartShow = !shoppingcartShow">
        <i class="fa-solid fa-cart-shopping px-2 py-3 mt-4 h-6 w-6"></i>
    </button>

    @auth()

        <div 
            x-show="shoppingcartShow" 
            @click.outside="shoppingcartShow = false" 
            x-cloak
            class="absolute right-0 mt-2 py-2 w-[220px] bg-white rounded-lg shadow-xl">

            {{-- Shoppingcart Total --}} 
            <div class="flex flex-row my-2 mx-4 justify-between">
                <div class="flex flex-row space-x-4">
                    <i class="fa-solid fa-cart-shopping w-2 h-2 pt-2"></i>
                    <p class="bg-purple-500 text-xs mb-3 px-2 py-1 text-white rounded-full">
                        {{ $totalProducts }}
                    </p>
                </div>
                <p class="pt-2">Total: <span class="text-slate-600">${{ $totalPrice }}</span></p>
            </div>

            {{-- Products --}}

            @forelse($shoppingcartProducts as $product)

                <div class="grid grid-cols-3 items-center gap-4 mx-4 mt-8 mb-2 justify-center">

                    <img 
                        src="{{ $product->firstImage ? asset('storage/' . $product->firstImage->image_url) : asset('assets/images/products/default_product_image01.jpg') }}" 
                        alt="{{ $product->name }}"
                        >
                    <div>
                        <h3 class="text-xs">{{ $product->name }}</h3>
                        <p class="text-xs text-slate-600">{{ $product->unit_price }}</p>
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
                        No product in shoppingcart.
                    </p> 
                </div>

            @endforelse

            {{-- Checkout Button --}}
            <div class="my-8 text-center">
                <a 
                    class="px-8 py-2 bg-purple-600 text-white hover:bg-purple-500 cursor-pointer"
                    href="{{ route('shoppingcart.show', ['id' => Auth::user()->shoppingcart->id]) }}"
                    >
                    Checkout
                </a>
            </div>

        </div>

    @endauth

    @guest()

        <div 
            x-show="shoppingcartShow" 
            @click.outside="shoppingcartShow = false" 
            x-cloak 
            class="absolute right-0 mt-2 py-2 w-[220px] bg-white rounded-lg shadow-xl"
            >

            <div class="flex flex-row px-4 my-4 text-red-700 hover:text-red-500">
                <p>
                    No product available.
                </p>
            </div>

        </div> 

    @endguest

</div>