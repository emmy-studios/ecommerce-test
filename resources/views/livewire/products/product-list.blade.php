<div>
    {{-- Searchbar --}}
    <div class="flex justify-center my-4 mx-6 px-6 pb-4">
        <input
            class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 border border-purple-600 focus:outline-none focus:border-purple-600" 
            type="search" 
            name="searchProduct" 
            id="searchProduct"
            wire:model.defer="search"
            placeholder="write the product name..."
            >
        <button 
            class="px-3 py-2 bg-purple-600 text-white hover:bg-purple-500 cursor-pointer rounded-sm" 
            wire:click="searchProducts">
            Search
        </button>
    </div>

    {{-- Categories Dropdown --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
        <div class="md:justify-self-end justify-self-center">
            <livewire:products.filter-categories />
        </div>
        <div class="flex justify-self-center md:justify-self-start"> 
            <livewire:products.filter-brands />
        </div>
    </div>

    <div class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">

        @foreach($products as $product)
            <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">

                <a href="{{ route('product.show', ['id' => $product->id]) }}">
                    <img 
                        src="{{ $product->firstImage ? asset('storage/' . $product->firstImage->image_url) : asset('assets/images/products/default_product_image01.jpg') }}"                       
                        alt="Product Image" 
                        class="h-80 w-72 object-cover rounded-t-xl" />

                    <div class="px-4 py-3 w-72">
                        
                        <span class="text-gray-400 mr-3 uppercase text-xs">
                            {{ $product->brand->name }}
                        </span>

                        <p class="text-lg font-bold text-black truncate block capitalize">
                            {{ $product->name }}
                        </p>

                        <div class="flex items-center">

                            <p class="text-lg font-semibold text-black cursor-auto my-3">
                                ${{ $product->unit_price }}
                            </p>

                            <!--<del>
                                <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                            </del>-->

                            <!--<div class="ml-auto">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>-->

                        </div>

                    </div>

                </a>

            </div>
        @endforeach
    </div>

    <div class="my-8 mx-10">
        {{ $products->links('vendor.pagination.simple') }}
    </div>


</div>
 
