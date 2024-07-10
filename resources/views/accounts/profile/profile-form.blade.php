@extends('layouts.app')

@section('title', 'ecommerce | Edit Profile')

@section('content')

    <x-partials.navigation />

    <main>

        <section class="pt-10">
            <div class="flex justify-center my-10">
                <h2 class="text-xl font-bold">Edit Personal Information</h2>
            </div>
        </section>

        <section>

            <div class="flex flex-col items-center px-10">

                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 place-content-between">

                        <div class="px-8">

                            <div class="flex flex-col my-4 space-y-2">
                                <label for="name">Username:</label>
                                <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $user->name }}" type="text" name="name">
                                @error('name')
                                    <p class="pl-6 text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col my-4 space-y-2">
                                <label for="first_name">First Name:</label>
                                <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $user->first_name }}" type="text" name="first_name">
                                @error('first_name')
                                    <p class="pl-6 text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col my-4 space-y-2">
                                <label for="last_name">Last Name:</label>
                                <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $user->last_name }}" type="text" name="last_name">
                                @error('last_name')
                                    <p class="pl-6 text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col my-4 space-y-2">
                                <label for="email">Email:</label>
                                <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $user->email }}" type="email" name="email">
                                @error('email')
                                    <p class="pl-6 text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col my-4 space-y-2">
                                <label for="phone_code">Phone Code:</label>
                                <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $user->phone_code }}" type="text" name="phone_code">
                                @error('phone_code')
                                    <p class="pl-6 text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col my-4 space-y-2">
                                <label for="birth">Birth:</label>
                                <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $user->birth }}" type="date" name="birth">
                                @error('birth')
                                    <p class="pl-6 text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
 
                            <div class="flex flex-col my-4 space-y-2">
                                <label for="profile_image">Profile Image:</label>
                                <input type="file" name="profile_image" id="profile_image">
                            </div>

                        </div>

                        <div class="flex flex-col my-4 space-y-2 px-6">
                            <label for="bio">Bio:</label>
                            <textarea class="px-2 py-2 border border-purple-700 rounded" rows="10" cols="40" name="bio">{{ $user->bio }}</textarea>
                            @error('bio')
                                <p class="pl-6 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- Social Media Links Starts --}}
                    <div class="flex justify-center my-6">
                        <p class="text-xl font-bold py-10">Social Media Links:</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 place-content-between">

                        <div class="flex flex-col my-4 space-y-2 px-10">
                            <label for="facebook_url">Facebook Url:</label>
                            <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $socialmedialinks->facebook_url }}" type="text" name="facebook_url">
                        </div>

                        <div class="flex flex-col my-4 space-y-2 px-10">
                            <label for="twitter_url">Twitter Url:</label>
                            <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $socialmedialinks->twitter_url }}" type="text" name="twitter_url">
                        </div>

                        <div class="flex flex-col my-4 space-y-2 px-10">
                            <label for="instagram_url">Instagram Url:</label>
                            <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $socialmedialinks->instagram_url }}" type="text" name="instagram_url">
                        </div>

                        <div class="flex flex-col my-4 space-y-2 px-10">
                            <label for="tiktok_url">TikTok Url:</label>
                            <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $socialmedialinks->tiktok_url }}" type="text" name="tiktok_url">
                        </div>

                    </div>
                    {{-- Social Media Links Ends --}}

                    {{-- Address Information Starts --}}
                    <div class="flex justify-center my-6">
                        <p class="text-xl font-bold py-10">Address Information:</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 place-content-between">

                        <div>

                            <div class="flex flex-col my-4 space-y-2 px-10">
                                <label for="country">Country:</label>
                                <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $addressInfo->country }}" type="text" name="country">
                                @error('country')
                                    <p class="pl-6 text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col my-4 space-y-2 px-10">
                                <label for="state">State:</label>
                                <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $addressInfo->state }}" type="text" name="state">
                            </div>

                            <div class="flex flex-col my-4 space-y-2 px-10">
                                <label for="city">City:</label>
                                <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $addressInfo->city }}" type="text" name="city">
                            </div>

                        </div>

                        <div>

                            <div class="flex flex-col my-4 space-y-2 px-10">
                                <label for="address_line_1">Address Details 1:</label>
                                <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $addressInfo->address_line_1 }}"  type="text" name="address_line_1">
                            </div>

                            <div class="flex flex-col my-4 space-y-2 px-10">
                                <label for="address_line_2">Additional Details 2:</label>
                                <input class="px-2 py-2 border border-purple-700 rounded" value="{{ $addressInfo->address_line_2 }}"  type="text" name="address_line_2">
                            </div>

                        </div>

                    </div>
                    {{-- Address Information Ends --}}

                    <div class="flex justify-center my-8">
                        <button class="px-4 py-2 bg-purple-600 hover:bg-purple-500 text-white rounded" type="submit">Edit Profile</button>
                    </div>

                </form>

            </div>

        </section>

    </main>

    <x-partials.footer />

@endsection