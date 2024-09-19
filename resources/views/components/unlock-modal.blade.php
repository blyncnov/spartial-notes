<div x-show="isOpen"
    class="w-full h-full fixed top-0 right-0 left-0 bg-black/70 flex justify-center items-center z-[999999]"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <div class="w-full max-w-[90%] md:max-w-[500px] bg-white rounded-lg shadow-md px-4 py-6">
        <div class="w-full flex flex-col gap-3">
            <div>
                <h3>You can use the Password associated with this note to unlock the note content.</h3>
            </div>

            <p class="text-sm text-gray-600">
                Note Title: {{ $note->n_title }} <br> Note Password: {{ $note->n_passkey }}
            </p>

            <div>
                <form action="" method="post" class="w-full flex flex-col gap-2">
                    @csrf()

                    <input type="text" name="passkey" id="passkey" placeholder="Enter Password" required
                        value="{{ old('passkey') }}"
                        class="block w-full rounded-lg border px-3 py-2.5 mb-1 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 focus-visible:outline-none">

                    <button type="submit"
                        class="text-base text-white border bg-orange-700 border-b-0 border-white/10 py-1.5 px-6 rounded-lg shadow">
                        Unlock note
                    </button>

                    <button type="button" @click="isOpen = false"
                        class="text-base text-white border bg-black/90 border-b-0 border-white/10 py-1.5 px-6 rounded-lg shadow">
                        Cancel
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
