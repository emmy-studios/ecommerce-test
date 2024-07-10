<div>
    
    <div class="flex items-center gap-2">
        <select 
            wire:model="brand_id" 
            wire:change="filterBrands" 
            class="border p-1 text-white bg-purple-600 text-lg rounded"
            >
            <option value="">Select a Brand</option>

            @foreach($brands as $brand)

                <option value="{{ $brand->id }}">{{ $brand->name }}</option>

            @endforeach

        </select>
    </div>

</div>
