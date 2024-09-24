@extends('_layout.base')

@section('content')
    <section class="w-full h-screen relative flex flex-col justify-end pt-10">
        <div class="w-full max-w-[90%] md:max-w-[75%] mx-auto flex flex-col gap-1 bg-white rounded-t-3xl py-10 px-6">

            <div class="flex">
                <a href="{{ route('notes.index') }}" class="flex gap-2 cursor-pointer mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-move-left cursor-pointer">
                        <path d="M6 8L2 12L6 16" />
                        <path d="M2 12H22" />
                    </svg>
                    <p>Go back</p>
                </a>
            </div>

         <div class="flex gap-4 items-center flex-wrap">
            <h2 class="text-2xl font-bold">{{ $note->n_title }}</h2>
            <div type="button"
            @class([
                'text-base text-white border-2 px-4 py-0.5 rounded-lg shadow',
                'bg-red-500 border-red-700' => $note->n_label == "urgent",
                'bg-green-500 border-green-700' => $note->n_label == "simple",
            ])
         >
                {{ $note->n_label }}</div>
         </div>

          <div class="w-full py-3 flex flex-col gap-4">
            <h4 class="opacity-90">{{ $note->n_description }}</h4>
            <p class="opacity-70">{{ $note->n_content }}</p>
          </div>

            <div class="w-full flex gap-2 items-center opacity-90 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-circle-user-round">
                    <path d="M18 20a6 6 0 0 0-12 0" />
                    <circle cx="12" cy="10" r="4" />
                    <circle cx="12" cy="12" r="10" />
                </svg>
                <h3 class="font-normal -mt-0.5"> {{ $note->user->name }}</h3>
            </div>

            <div class="w-full md:w-auto flex justify-end mt-3 items-center gap-3 md:flex-row flex-col">
                <a href="{{ route('notes.edit', ['note' => $note]) }}" class="w-full md:w-auto">
                    <button type="button"
                        class="w-full text-base text-white border bg-black/90 border-black py-1.5 px-6 rounded-lg shadow">
                        Edit Note
                    </button>
                </a>

                <form action="{{ route("notes.destroy", $note) }}" method="post" class="w-full md:w-auto flex flex-col gap-3">
                    @csrf()
                    @method("DELETE")

                    <button type="submit"
                        class="w-full text-base text-white border bg-red-600 border-red-800 py-1.5 px-6 rounded-lg shadow">
                        Delete Note
                    </button>
                </form>
            </div>

        </div>
    </section>
@endsection
