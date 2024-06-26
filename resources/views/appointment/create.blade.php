<x-guest-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Book an appointment') }}
            </h2>
            @if ($errors->has('*'))
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
            @endif
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-6xl">
                    <form method="POST" action="{{ route('appointment') }}">
                        @csrf
                        <div class="flex p-4 sm:p-8">
                            <label class="w-1/4">Your name</label>
                            <input class="w-1/2" name="name" type="text">
                        </div>
                        <div class="flex p-4 sm:p-8">
                            <label class="w-1/4">Appointment date and time</label>
                            <input class="w-1/2" name="date_time" type="datetime-local">
                        </div>
                        <div class="flex p-4 sm:p-8">
                            <label class="w-1/4">Describe your issue</label>
                            <textarea class="w-1/2" name="issue"></textarea>
                        </div>
                        <div class="flex p-4 sm:p-8">
                            <label class="w-1/4">Contact number</label>
                            <input class="w-1/2" name="contact_number" type="text">
                        </div>
                        <div class="flex p-4 sm:p-8">
                            <label class="w-1/4">Email address</label>
                            <input class="w-1/2" name="email_address" type="email">
                        </div>
                        <div class="flex p-4 sm:p-8">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-guest-layout>