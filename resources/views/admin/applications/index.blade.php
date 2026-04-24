@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#f9f6f1]">

    <div class="max-w-7xl mx-auto px-6 py-12">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-black">Applications</h1>
                <p class="text-sm text-gray-500">Review and approve partner institutions</p>
            </div>
        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <!-- TABLE -->
        <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
                    <tr>
                        <th class="p-4">Institution</th>
                        <th class="p-4">Contact</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Category</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($applications as $app)
                        <tr class="border-t">

                            <td class="p-4 font-semibold">
                                <a href="/admin/applications/{{ $app->id }}" class="font-semibold hover:underline">
                                    {{ $app->institution_name }}
                                </a>
                                </td>

                            <td class="p-4">
                                {{ $app->contact_person }}
                            </td>

                            <td class="p-4 text-gray-600">
                                {{ $app->email }}
                            </td>

                            <td class="p-4">
                                {{ $app->category }}
                            </td>

                            <td class="p-4">
                                @if($app->status === 'pending')
                                    <span class="px-3 py-1 text-xs bg-yellow-100 text-yellow-700">
                                        Pending
                                    </span>
                                @elseif($app->status === 'approved')
                                    <span class="px-3 py-1 text-xs bg-green-100 text-green-700">
                                        Approved
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs bg-red-100 text-red-700">
                                        Rejected
                                    </span>
                                @endif
                            </td>

                            <td class="p-4 text-right">

                                @if($app->status === 'pending')
                                    <form method="POST" action="/admin/applications/{{ $app->id }}/approve">
                                        @csrf
                                        <button type="submit"
                                            class="px-4 py-2 bg-black text-white text-xs font-bold hover:bg-gray-800">
                                            Approve
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-xs">No action</span>
                                @endif

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-500">
                                No applications found
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection