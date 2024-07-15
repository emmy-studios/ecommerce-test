<div class="flex my-10 pt-4">
    <div class="w-full bg-white rounded-lg border p-2 my-4 mx-6">
        <h3 class="font-bold">Reviews</h3>

        <div class="flex flex-col">

            @if($reviews->isEmpty())

                <p class="py-4 pl-2">
                    No reviews for this product.
                </p>

            @else

                @foreach($reviews as $review)

                    <div class="border rounded-md p-3 ml-3 my-3">
                        <div class="flex gap-3 items-center">
                            <img
                                src="{{ asset('assets/images/accounts/users/' . $review->user->profile_image) }}"
                                class="object-cover w-8 h-8 rounded-full border-2 border-purple-400 shadow-purple-400"
                            />

                            <h3 class="font-bold">{{ $review->user->name }}</h3>
                        </div>

                        <p class="text-gray-600 mt-2">{{ $review->content }}</p>
                
                        @if(Auth::id() == $review->user_id)
                            <livewire:reviews.delete-review :reviewId="$review->id" :wire:key="$review->id"/>
                        @endif
                        
                    </div>

                @endforeach
                
            @endif

        </div>

        @auth()
            <form wire:submit.prevent="addReview">
                <div class="w-full px-3 my-2">
                    <textarea
                        class="bg-purple-100 rounded border border-purple-500 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-purple-400 focus:outline-none focus:bg-white"
                        name="content"
                        wire:model="content"
                        placeholder="Type Your Review"
                        required
                    ></textarea>
                </div> 

                <div class="w-full flex justify-end px-3">
                    <input
                        type="submit"
                        class="px-2.5 py-1.5 rounded-md text-white text-sm bg-purple-600 hover:bg-purple-500"
                        value="Post Review"
                    />
                </div>
            </form>
        @endauth

    </div>
</div>
