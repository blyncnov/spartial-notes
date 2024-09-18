<div class="w-full h-full relative">
    <div class="w-full h-full shadow-sm p-4 rounded-lg flex flex-col gap-2 justify-between bg-orange-300">
        <div class="w-full flex flex-col gap-1">
            <h2 class="text-xl font-bold">{{ $note->n_title }}</h2>
            <p class="opacity-70">{{ $note->n_description }}</p>

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

        </div>

        <a href="{{ route('notes.show', $note) }}" class="w-auto">
            <button type="button"
                class="text-base text-white border bg-orange-500 border-b-0 border-white/10 py-1.5 px-3 rounded-lg shadow scale-100 hover:scale-105 duration-300 transition-all">
                Show note content
            </button>
        </a>
    </div>

    @if ($note->n_visibility == 'public')
        <div>
            <div
                class="w-full h-full absolute top-0 left-0 right-0 bg-orange-400 rounded-lg flex justify-center items-center">
                <div class="w-full flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-lock">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>

                    <div class="my-1">
                        <h2>PRIVATE CONTENT</h2>
                    </div>

                    <button type="button" @click="isOpen = true"
                        class="text-base text-white border bg-orange-700 border-b-0 border-white/10 py-1.5 px-3 rounded-lg shadow scale-100 hover:scale-105 duration-300 transition-all">
                        Unlock note content
                    </button>
                </div>
            </div>
        </div>
    @endif

    <h2 x-show="isOpen">He</h2>

    {{-- <x-unlock-modal /> --}}

</div>
