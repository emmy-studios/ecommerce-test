<div class="sm:col-span-2">

    <h1 class="max-w-lg text-xl font-semibold tracking-tight text-gray-800 xl:text-2xl dark:text-white">Subscribe our newsletter to get update.</h1>

    <form wire:submit.prevent="subscribe">

        <div class="flex flex-col mx-auto mt-6 space-y-3 md:space-y-0 md:flex-row">
            
            <input
                wire:model="email" 
                id="email" 
                type="text" 
                class="px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-purple-400 dark:focus:border-purple-300 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-purple-300" 
                placeholder="Email Address">

            <button
                type="submit" 
                class="w-full px-6 py-2.5 text-sm font-medium tracking-wider text-white transition-colors duration-300 transform md:w-auto md:mx-4 focus:outline-none bg-gray-800 rounded-lg hover:bg-gray-700 focus:ring focus:ring-gray-300 focus:ring-opacity-80">
                Subscribe
            </button>

        </div> 
        @error('email') 
            <span class="pt-2 text-red-500">{{ $message }}</span> 
        @enderror
    </form>

    @if (session()->has('message'))
        <div class="mt-4 text-green-500">
            {{ session('message') }}
        </div>
    @endif

</div>