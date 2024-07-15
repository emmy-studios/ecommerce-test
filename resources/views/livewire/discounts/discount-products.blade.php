<div>

    @if (!empty($productsWithDiscounts))

        <div class="text-center p-10">
            <h1 class="font-bold text-4xl mb-4">Products with Discounts</h1>
            <h1 class="text-3xl">Use the discount code in your shop</h1>
        </div>

        <div class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-2 gap-x-2 mt-10 mb-5">
            
            @foreach ($productsWithDiscounts as $product)

                <div class="relative m-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                    
                    <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="{{ route('product.show', ['id' => $product->id]) }}">
                        <img class="w-fit h-fit"
                            src="{{ $product->firstImage ? asset('storage/' . $product->firstImage->image_url) : asset('assets/images/products/default_product_image01.jpg') }}"
                            alt="product image" />

                        @if ($product->discount)
                            <span class="absolute top-0 left-0 m-2 rounded-full bg-purple-600 px-2 text-center text-sm font-medium text-white">
                                {{ $product->discount->discount_percentage }}% OFF
                            </span>
                        @endif

                    </a>
                    
                    <div class="mt-4 px-5 pb-5">
                        <a href="{{ route('product.show', ['id' => $product->id]) }}">
                            <h5 class="text-xl tracking-tight text-slate-900">{{ $product->name }}</h5>
                        </a>
                        <div class="mt-2 mb-5 flex items-center justify-between">
                            <p>
                                @if($product->discount)
                                    <span class="text-3xl font-bold text-slate-900">${{ ($product->unit_price) * (($product->discount->discount_percentage) / 100) }}</span>
                                @endif
                                <span class="text-sm text-slate-900 line-through">${{ $product->unit_price }}</span>
                            </p>
                        
                        </div>
                        <div class="flex items-center flex-wrap py-2">
                            <p class="text-sm">code: {{ $product->discount->discount_code }}</p>
                        </div>
                        
                        <a 
                            href="{{ route('product.show', ['id' => $product->id]) }}" 
                            class="flex items-center justify-center rounded-md bg-purple-800 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-purple-500 focus:outline-none focus:ring-4 focus:ring-blue-300">
                            <i class="fa-solid fa-cart-shopping"></i>Details
                        </a>

                    </div>

                </div>

            @endforeach
        
        </div>

    @endif

</div>
