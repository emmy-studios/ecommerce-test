<div class="mt-16">
    <h3 class="text-gray-600 text-2xl font-medium">More Products</h3>

    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">

        @foreach($moreProducts as $product)

            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                <div 
                    class="flex items-end justify-end h-56 w-full bg-cover" 
                    style="background-image: url({{ $product->firstImage ? asset('storage/' . $product->firstImage->image_url) : asset('assets/images/products/default_product_image01.jpg') }});"
                    >
                    <!--<button
                        class="p-2 rounded-full bg-purple-600 text-white mx-5 -mb-4 hover:bg-purple-500 focus:outline-none focus:bg-purple-500">
                        <i class="fa-solid fa-cart-shopping h-5 w-5"></i>
                    </button>-->
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">
                        <a href="{{ route('product.show', ['id' => $product->id]) }}">{{ $product->name }}</a>
                    </h3>
                    <span class="text-gray-500 mt-2">${{ $product->unit_price }}</span>
                </div>
            </div>

        @endforeach

    </div>
</div> 