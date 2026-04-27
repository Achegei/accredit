@extends('admin.layouts.app')

@section('content')

<div class="max-w-6xl mx-auto p-6">

    <h1 class="text-2xl font-black mb-6">
        Institutions Registry
    </h1>

    <div class="bg-white border rounded-lg shadow-sm overflow-hidden">

        <table class="w-full text-sm">

            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-3">Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Phone</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Created</th>
                    <th class="p-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($institutions as $institution)

                    <tr class="border-t hover:bg-gray-50 transition">

                        <!-- NAME -->
                        <td class="p-3 font-semibold">
                            {{ $institution->name ?? '—' }}
                        </td>

                        <!-- EMAIL -->
                        <td class="p-3">
                            {{ $institution->email ?? '—' }}
                        </td>

                        <!-- PHONE -->
                        <td class="p-3">
                            {{ $institution->phone ?? '—' }}
                        </td>

                        <!-- STATUS -->
                        <td class="p-3">
                            <span class="px-2 py-1 text-xs rounded 
                                {{ $institution->status === 'approved' 
                                    ? 'bg-green-100 text-green-700' 
                                    : 'bg-yellow-100 text-yellow-700' }}">
                                {{ strtoupper($institution->status ?? 'pending') }}
                            </span>
                        </td>

                        <!-- CREATED -->
                        <td class="p-3 text-gray-500 text-xs">
                            {{ $institution->created_at?->format('d M Y') ?? '—' }}
                        </td>

                        <!-- ACTIONS -->
                        <td class="p-3 text-right space-x-2">

                            <!-- VIEW -->
                            <a href="{{ route('admin.institutions.show', $institution->id) }}"
                               class="bg-indigo-600 text-white px-3 py-1 text-xs rounded hover:bg-indigo-700">
                                View
                            </a>

                            <!-- EDIT (optional - future) -->
                            <a href="#"
                               class="bg-gray-500 text-white px-3 py-1 text-xs rounded hover:bg-gray-600">
                                Edit
                            </a>

                            <!-- DELETE -->
                            <form method="POST"
                                  action="{{ route('admin.institutions.delete', $institution->id) }}"
                                  class="inline-block"
                                  onsubmit="return confirm('Delete this institution? This cannot be undone.')">
                                @csrf
                                @method('DELETE')

                                <button class="bg-red-600 text-white px-3 py-1 text-xs rounded hover:bg-red-700">
                                    Delete
                                </button>
                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="p-6 text-center text-gray-500">
                            No institutions found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection