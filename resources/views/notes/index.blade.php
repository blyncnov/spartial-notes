@extends('_layout.base')

@section('content')
    <section class="w-full relative p-4">
        <div class="w-full grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-3">

            @forelse ($notes as $note)
                <x-note-card :note="$note" />
            @empty
              <div>
                    <p>No Notes Found Nearby</p>
              </div>
            @endforelse

        </div>

        <div class="w-full flex md:flex-row flex-col md:gap-5 gap-3 justify-center items-center py-10">
            <div>
                <button type="button"
                onclick="reloadPage()"
                    class="w-full text-base text-white border bg-black border-b-0 border-white/10 py-2 px-6 rounded-lg shadow scale-100 hover:scale-105 duration-300 transition-all">
                    Find Nearby Notes
                </button>
            </div>

            <a href="{{ route('notes.create') }}" class="md:w-auto w-full">
                <button type="button"
                    class="w-full text-base text-white border bg-orange-700 border-b-0 border-white/10 py-2 px-6 rounded-lg shadow scale-100 hover:scale-105 duration-300 transition-all">
                    Create New Note
                </button>
            </a>
        </div>
    </section>
@endsection


<script>

        function reloadPage(lat, lng) {
            location.reload();
        }

        function updateURLWithLocation(lat, lng) {
            const url = new URL(window.location.href);

            // Add lat and lng as query parameters
            url.searchParams.set('lat', lat);
            url.searchParams.set('lng', lng);

            // Push the new URL to the browser without reloading the page
            window.history.pushState({}, '', url);
        }

        function showPosition(position) {
            console.log(`Latitude: ${position.coords.latitude }`)
            console.log(`Longitude: ${position.coords.longitude }`)

            // Call function to update the URL with lat/lng
            updateURLWithLocation(position.coords.latitude, position.coords.longitude);
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
               alert("Geolocation is not supported by this browser.");
            }
    }

    document.addEventListener("DOMContentLoaded", function() {
        getLocation()
    });
</script>
