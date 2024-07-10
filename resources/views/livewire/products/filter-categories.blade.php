<div>
    
    <div class="flex items-center gap-2">
        <select 
            wire:model="category_id" 
            wire:change="filterCategories" 
            class="border p-1 text-white bg-purple-600 text-lg rounded"
            >
            <option value="">Select a Category</option>

            @foreach($categories as $category)

                <option value="{{ $category->id }}">{{ $category->name }}</option>

            @endforeach

        </select>
    </div>

</div> 