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
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Date and time</td>
                                <td>Issue</td>
                                <td>Contact number</td>
                                <td>Email address</td>
                                <td>Approve</td>
                                <td>Delete</td>
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
