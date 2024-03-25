<x-guest-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Book an appointment') }}
            </h2>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form>
                        <div class="p-2 mx-auto">
                            <label>Your name</label><input type="text">
                        </div>
                        <div class="p-2 mx-auto">
                            <label>Appointment date and time</label><input type="datetime-local">
                        </div>
                        <div class="p-2 mx-auto">
                            <label>Describe your issue</label>
                        </div>
                        <div class="p-2 mx-auto">
                            <textarea></textarea>
                        </div>
                        <div class="p-2 mx-auto">
                            <label>Contact number</label><input type="text">
                        </div>
                        <div class="p-2 mx-auto">
                            <label>Email address</label><input type="email">
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-guest-layout>