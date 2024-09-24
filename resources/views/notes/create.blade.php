@extends('_layout.base')

@section('content')
    <section class="w-full relative pt-6">
        <div class="w-full max-w-[90%] md:max-w-[75%] mx-auto flex flex-col gap-8 bg-white rounded-t-3xl py-10 px-6">
            <div>
                <h3 class="text-2xl font-medium">Create New Note</h3>
                <p class="opacity-80 mt-0.5 mb-2">This note will be created and visible only when you are nearby the location set when creating the note!</p>
                <hr>
            </div>

            <div class="w-full max-w-full">
                <form action="{{ route('notes.store') }}" method="POST" class="w-full grid grid-cols-1 gap-4">
                    @csrf()

                    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="w-full flex flex-col gap-1">
                            <label for="n_title" class="px-1">Note Title</label>
                            <input type="text" name="n_title" id="n_title" placeholder="Enter note title" required
                                value="{{ old("n_title") }}"
                                class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                            @error('n_title')
                                <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full flex flex-col gap-1">
                            <label for="n_description" class="px-1">Note Description</label>
                            <input type="text" name="n_description" id="n_description" placeholder="Enter note description"
                                required value="{{ old("n_description") }}"
                                class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                            @error('n_description')
                                <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full flex flex-col gap-1">
                        <label for="n_content" class="px-1">Note Content</label>
                        <textarea
                        name="n_content" id="n_content" placeholder="Enter note content" required
                        class="block w-full min-h-[100px] rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">{{ old('n_content') }}</textarea>
                        @error('n_content')
                            <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="w-full flex flex-col gap-1">
                            <label for="n_label" class="px-1">Note Label</label>
                            <select name="n_label" id="n_label"

                                class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                                @error('n_label')
                                    <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                                @enderror
                                >
                                <option value="simple">Simple</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>

                        <div class="w-full flex flex-col gap-1">
                            <label for="n_visibility" class="px-1">Note Visibility</label>
                            <select name="n_visibility" id="n_visibility"
                                class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                                @error('n_visibility')
                                    <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                                @enderror
                                >
                                <option value="public" {{ old('n_visibility') == 'public' ? 'selected' : '' }}>Public</option>
                                <option value="private" {{ old('n_visibility') == 'private' ? 'selected' : '' }}>Private</option>
                            </select>
                        </div>
                    </div>

                    <div class="w-full flex flex-col gap-1" id="passkeyContainer">
                        <label for="n_passkey" class="px-1">Note Passkey</label>
                        <input type="text" name="n_passkey" id="n_passkey" placeholder="Enter passkey for note"
                            value="{{ old('n_passkey') }}"
                            class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                        @error('n_passkey')
                            <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full flex flex-col gap-1">
                        <label for="n_geolocation" class="px-1">Choose a Location</label>
                        <input type="text" name="n_geolocation" id="n_geolocation"
                            placeholder="Enter destination address" required value="{{ old('n_geolocation') }}"
                            class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                        @error('n_geolocation')
                            <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="hidden" readonly name="n_latitude" id="n_latitude"
                    placeholder="Enter latitude coordinate" required value="{{ old('n_latitude') }}"
                    class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">

                    <input type="hidden" readonly name="n_longitude" id="n_longitude"
                    placeholder="Enter longitude coordinate" required value="{{ old('n_longitude') }}"
                    class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">


                    <div class="w-auto">
                        <button type="submit"
                            class="text-base text-white border bg-orange-700 border-b-0 border-white/10 py-2 px-6 rounded-lg shadow">
                            Create new note
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>


    <script>
        const searchInput = document.getElementById('n_geolocation');

        // Location cordinate
        const GeoLatitude = document.getElementById('n_latitude');
        const GeoLongitude = document.getElementById('n_longitude');

        const visibilitySelect = document.getElementById('n_visibility');
        const passkeyContainer = document.getElementById('passkeyContainer');

        document.addEventListener("DOMContentLoaded", function() {

            togglePasskeyVisibility()

            function togglePasskeyVisibility() {
                if (visibilitySelect.value === 'private') {
                    passkeyContainer.style.display = 'block';
                } else {
                    passkeyContainer.style.display = 'none';
                }
            }

            visibilitySelect.addEventListener('change', togglePasskeyVisibility);

            const autocomplete = new google.maps.places.Autocomplete(searchInput, {
                types: ["geocode"]
            });

            autocomplete.addListener("place_changed", function() {
                const place = autocomplete.getPlace();

                if (place.geometry && place.geometry.location) {
                    const latitude = place.geometry.location.lat();
                    const longitude = place.geometry.location.lng();

                    console.log("Latitude: " + latitude);
                    GeoLatitude.value = latitude

                    console.log("Longitude: " + longitude);
                    GeoLongitude.value = longitude
                } else {
                    console.log("No geometry information available for the selected place.");
                }
            });
        });
    </script>
@endsection
