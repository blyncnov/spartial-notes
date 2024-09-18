@extends('_layout.base')

@section('content')
    <section class="w-full relative p-6">
        <div class="w-full flex flex-col gap-6">

            <div>
                <h3 class="text-3xl font-medium">Edit Note</h3>
            </div>


            <div class="w-full max-w-3xl">
                <form action="" method="post" class="w-auto flex flex-col gap-3">
                    @csrf()

                    <div class="w-full flex flex-col gap-1">
                        <label for="n_title" class="px-1">Note Title</label>
                        <input type="text" name="n_title" id="n_title" placeholder="Enter note title" required
                            value="{{ old('n_title') }}"
                            class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                    </div>

                    <div class="w-full flex flex-col gap-1">
                        <label for="n_description" class="px-1">Note Description</label>
                        <input type="text" name="n_description" id="n_description" placeholder="Enter note description"
                            required value="{{ old('n_description') }}"
                            class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                    </div>

                    <div class="w-full flex flex-col gap-1">
                        <label for="n_content" class="px-1">Note Content</label>
                        <input type="text" name="n_content" id="n_content" placeholder="Enter note content" required
                            value="{{ old('n_content') }}"
                            class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                    </div>


                    <div class="w-full flex flex-col gap-1">
                        <label for="n_visibility" class="px-1">Note Visibility</label>
                        <select name="n_visibility" id="n_visibility"
                            class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                            >
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                        </select>
                    </div>


                    <div class="w-full flex flex-col gap-1">
                        <label for="n_passkey" class="px-1">Note Passkey</label>
                        <input type="text" name="n_passkey" id="n_passkey" placeholder="Enter passkey for note" required
                            value="{{ old('n_passkey') }}"
                            class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                    </div>


                    <div class="w-full flex flex-col gap-1">
                        <label for="n_geo_location" class="px-1">Note Geo-Location</label>
                        <input type="text" name="n_geo_location" id="n_geo_location"
                            placeholder="Enter destination address" required value="{{ old('n_geo_location') }}"
                            class="block w-full rounded-lg border px-3 py-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">
                    </div>


                    <div class="w-auto mt-2">
                        <button type="submit"
                            class="text-base text-white border bg-orange-700 border-b-0 border-white/10 py-1.5 px-6 rounded-lg shadow">
                            Update note
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
