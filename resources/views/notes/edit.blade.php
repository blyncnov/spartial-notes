@extends('_layout.base')

@section('content')
    <section class="w-full relative p-6">
        <div class="w-full flex flex-col gap-6">

            <div>
                <h3 class="text-3xl font-medium">Edit Note</h3>
            </div>

            <div class="w-full max-w-3xl">
                <form action="{{ route('notes.update', $note) }}" method="POST" class="w-auto flex flex-col gap-3">
                    @method("PUT")
                    @csrf()

                    <div class="w-full flex flex-col gap-1">
                        <label for="n_title" class="px-1">Note Title</label>
                        <input type="text" name="n_title" id="n_title" placeholder="Enter note title" required
                            value="{{ $note -> n_title }}"
                            class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                        @error('n_title')
                            <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full flex flex-col gap-1">
                        <label for="n_description" class="px-1">Note Description</label>
                        <input type="text" name="n_description" id="n_description" placeholder="Enter note description"
                            required value="{{ $note ->n_description }}"
                            class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                        @error('n_description')
                            <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full flex flex-col gap-1">
                        <label for="n_content" class="px-1">Note Content</label>
                        <input type="text" name="n_content" id="n_content" placeholder="Enter note content" required
                            value="{{ $note ->n_content }}"
                            class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                        @error('n_content')
                            <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="w-full flex flex-col gap-1">
                        <label for="n_visibility" class="px-1">Note Visibility</label>
                        <select name="n_visibility" id="n_visibility"

                            class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                            @error('n_visibility')
                                <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                            @enderror
                            >
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                        </select>
                    </div>


                    <div class="w-full flex flex-col gap-1">
                        <label for="n_passkey" class="px-1">Note Passkey <span class="font-normal text-sm">(optional)
                            </span></label>
                        <input type="text" name="n_passkey" id="n_passkey" placeholder="Enter passkey for note"
                            value="{{ $note ->n_passkey }}"
                            class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                        @error('n_passkey')
                            <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="w-full flex flex-col gap-1">
                        <label for="n_formatted_address" class="px-1">Accessible Location</label>
                        <input type="text" name="n_formatted_address" id="n_formatted_address"
                            placeholder="Enter destination address" value="{{ old('n_formatted_address') }}"
                            class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                        @error('n_formatted_address')
                            <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="text" readonly name="n_latitude" id="n_latitude"
                    placeholder="Latitude coordinate" required value="{{ $note ->n_latitude }}"
                    class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">

                    <input type="text" readonly name="n_longitude" id="n_longitude"
                    placeholder="Longitude coordinate" required value="{{ $note ->n_longitude }}"
                    class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">


                    <div class="w-auto">
                        <button type="submit"
                            class="text-base text-white border bg-orange-700 border-b-0 border-white/10 py-1.5 px-6 rounded-lg shadow">
                          Update note
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>


    <script>
        const searchInput = document.getElementById('n_formatted_address');

        // Location cordinate
        const GeoLatitude = document.getElementById('n_latitude');
        const GeoLongitude = document.getElementById('n_longitude');

        document.addEventListener("DOMContentLoaded", function() {

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
