<div>

    <div class="grid gap-4 space-x-1 md:grid-cols-3">

        @foreach($products as $product)

            <div class="px-2 py-3 bg-white border-2 border-slate-300 rounded">
                <h2 class="text-2xl font-bold text-slate-800">{{ $product->title }}</h2>
                <p class="text-slate-600">
                    {{ $product->description }}
                </p>
                @foreach($product->categories as $category)
                    <div class="mb-1">
                        <span class="bg-blue-400 text-blue-100 rounded px-1 text-sm">
                            {{ $category->name }}
                        </span>
                    </div>
                @endforeach
            </div>

        @endforeach

    </div>

</div>
