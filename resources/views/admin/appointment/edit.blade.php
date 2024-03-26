<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update appointment') }}
            </h2>
            @if ($errors->has('*'))
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
            @endif
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-6xl">
                    <form method="POST" action="{{ route('admin.appointment.update', $appointment) }}">
                        @csrf
                        @method('PATCH')

                        <div class="flex p-4 sm:p-8">
                            <label class="w-1/4">Name</label>
                            <input class="w-1/2" name="name" type="text" value="{{ old('name', $appointment->name) }}">
                        </div>
                        <div class="flex p-4 sm:p-8">
                            <label class="w-1/4">Date and time</label>
                            <input class="w-1/2" name="date_time" type="datetime-local" value="{{ old('date_time', $appointment->date_time) }}">
                        </div>
                        <div class="flex p-4 sm:p-8">
                            <label class="w-1/4">Issue</label>
                            <textarea class="w-1/2" name="issue">{{ old('issue', $appointment->issue) }}</textarea>
                        </div>
                        <div class="flex p-4 sm:p-8">
                            <label class="w-1/4">Contact number</label>
                            <input class="w-1/2" name="contact_number" type="text" value="{{ old('contact_number', $appointment->contact_number) }}">
                        </div>
                        <div class="flex p-4 sm:p-8">
                            <label class="w-1/4">Email address</label>
                            <input class="w-1/2" name="email_address" type="email" value="{{ old('email_address', $appointment->email_address) }}">
                        </div>
                        <div class="flex p-4 sm:p-8">
                            <label class="w-1/4">Approve?</label>
                            <input name="approved" type="hidden" value='0'>
                            <input name="approved" type="checkbox" value="{{ old('approved', $appointment->approved) }}">
                        </div>
                        <div class="flex p-4 sm:p-8">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>