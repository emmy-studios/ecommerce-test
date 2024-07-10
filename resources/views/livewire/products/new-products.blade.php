<div>

    <div
        class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">

        @foreach($products as $product)
        <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">

            <a href="{{ route('product.show', ['id' => $product->id]) }}">
                <img src="{{ $product->firstImage ? asset('storage/' . $product->firstImage->image_url) : asset('assets/images/products/default_product_image01.jpg') }}"
                    alt="Product Image" class="h-80 w-72 object-cover rounded-t-xl" />

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

                    </div>

                </div>

            </a>

        </div>
        @endforeach
    </div>

</div>