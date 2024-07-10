<div>
    
    <div class="flex items-center gap-2">
        <!--<input wire:model="query" wire:keyup.debounce="filter" type="text" placeholder="Search for a product..." class="border px-2 py-1 rounded w-64">-->
        <select wire:model="category_id" wire:change="filter" class="border p-1 text-slate-600 text-lg rounded">
            <option value="">Select a Category</option>

            @foreach($categories as $category)

                <option value="{{ $category->id }}">{{ $category->name }}</option>

            @endforeach

        </select>
    </div>

</div>
