@extends('_layout.base')

@section('content')
    <section class="w-full h-screen flex justify-center items-center">
        <a href="{{ route('notes.index') }}" class="w-auto">
            <button type="button"
                class="text-base text-white border bg-black border-b-0 border-white/10 py-2 px-6 rounded-lg shadow scale-100 hover:scale-105 duration-300 transition-all">
                Find Nearby Notes
            </button>
        </a>
    </section>
@endsection
