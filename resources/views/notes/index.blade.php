@extends('_layout.base')

@section('content')
    <section class="w-full relative">
        <div class="w-full p-4 grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-3">

            @forelse ($notes as $note)
                <x-note-card :note="$note" />
            @empty
                <p>No Notes Found</p>
            @endforelse

        </div>
    </section>
@endsection
