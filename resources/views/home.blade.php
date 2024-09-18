@extends('_layout.base')

@section('content')
    <section class="w-full h-screen flex justify-center items-center">
        <div class="w-full max-w-4xl mx-auto flex flex-col gap-5">
            <div class="w-full flex flex-col gap-2">
                <h2 class="text-3xl font-medium">Welcome to Spartial Notes</h2>
                <p>We allow you to create a geo fencing notes, create a note in a location you favorite and get to see it
                    next time you visit the location again!</p>
            </div>

            <div class="w-auto flex gap-5">
                <a href="{{ route('notes.index') }}" class="w-auto">
                    <button type="button"
                        class="text-base text-white border bg-black border-b-0 border-white/10 py-2 px-6 rounded-lg shadow scale-100 hover:scale-105 duration-300 transition-all">
                        Find Nearby Notes
                    </button>
                </a>

                <a href="{{ route('notes.create') }}" class="w-auto">
                    <button type="button"
                        class="text-base text-white border bg-orange-700 border-b-0 border-white/10 py-2 px-6 rounded-lg shadow scale-100 hover:scale-105 duration-300 transition-all">
                        Create New Note
                    </button>
                </a>
            </div>
        </div>
    </section>
@endsection
