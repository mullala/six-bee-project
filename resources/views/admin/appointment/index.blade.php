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
                    <table class="table-auto border-collapse border border-slate-400">
                        <thead>
                            <tr>
                                <td class="p-4">Name</td>
                                <td class="p-4">Date and time</td>
                                <td class="p-4">Issue</td>
                                <td class="p-4">Contact number</td>
                                <td class="p-4">Email address</td>
                                <td class="p-4">Approve</td>
                                <td class="p-4">Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                            <tr {{ $appointment->approved ? 'style=background:#90ee90' : ''}}>
                                <td class="p-4">{{ $appointment->name }}</td>
                                <td class="p-4">{{ $appointment->date_time }}</td>
                                <td class="p-4">{{ $appointment->issue }}</td>
                                <td class="p-4">{{ $appointment->contact_number }}</td>
                                <td class="p-4">{{ $appointment->email_address }}</td>
                                <td class="p-4"><a href="{{ route('admin.appointment', $appointment) }}">{{ $appointment->approved ? 'YES' : 'NO'}}</a></td>
                                <td class="p-4">
                                    <form method="POST" action="{{ route('admin.appointment.delete', $appointment) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>