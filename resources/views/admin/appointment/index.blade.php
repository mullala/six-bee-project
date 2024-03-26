<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <table class="table-fixed border-collapse border border-slate-400">
                        <thead>
                            <tr>
                                <td class="w-1/8">Name</td>
                                <td class="w-1/8">Date and time</td>
                                <td class="w-2/8">Issue</td>
                                <td class="w-1/8">Contact number</td>
                                <td class="w-1/8">Email address</td>
                                <td class="w-1/8">Approve</td>
                                <td class="w-1/8">Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            @foreach($appointments as $appointment)
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->date_time }}</td>
                                <td>{{ $appointment->issue }}</td>
                                <td>{{ $appointment->contact_number }}</td>
                                <td>{{ $appointment->email_address }}</td>
                                <td>{{ $appointment->approved }}</td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
