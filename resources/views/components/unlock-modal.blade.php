<div class="w-full h-full fixed top-0 right-0 left-0 bg-black/70 flex justify-center items-center">
    <div class="w-full max-w-[90%] md:max-w-[500px] bg-white rounded-lg shadow-md px-4 py-6">
        <div class="w-full flex flex-col gap-3">
            <div>
                <h3>You can use the Passkey Associated with this note to unlock the note content.</h3>
            </div>

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

                    <button type="button"
                        class="text-base text-white border bg-black/90 border-b-0 border-white/10 py-1.5 px-6 rounded-lg shadow">
                        Cancel
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
