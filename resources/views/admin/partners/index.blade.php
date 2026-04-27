@extends('admin.layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-black">
            Partners Registry
        </h1>

        <span class="text-sm text-gray-500">
            Total: {{ method_exists($partners, 'total') ? $partners->total() : count($partners) }}
        </span>
    </div>

    <!-- TABLE CARD -->
    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">

        <table class="w-full text-sm">

            <!-- TABLE HEAD -->
            <thead class="bg-gray-50 text-left text-xs uppercase tracking-wider text-gray-500">
                <tr>
                    <th class="p-4 w-12">#</th>
                    <th class="p-4">Name</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Institution</th>
                    <th class="p-4">Joined</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>

            <!-- TABLE BODY -->
            <tbody class="divide-y">

                @forelse($partners as $index => $partner)

                    <tr class="hover:bg-gray-50 transition">

                        <!-- NUMBERING -->
                        <td class="p-4 text-gray-400">
                            {{ $partners->firstItem() + $index }}
                        </td>

                        <!-- NAME -->
                        <td class="p-4 font-semibold text-gray-800">
                            {{ $partner->name }}
                        </td>

                        <!-- EMAIL -->
                        <td class="p-4 text-gray-600">
                            {{ $partner->email }}
                        </td>

                        <!-- INSTITUTION -->
                        <td class="p-4">
                            @if($partner->institution)
                                <span class="bg-indigo-50 text-indigo-600 px-2 py-1 rounded text-xs font-medium">
                                    {{ $partner->institution->name }}
                                </span>
                            @else
                                <span class="text-gray-400 text-xs">Not linked</span>
                            @endif
                        </td>

                        <!-- DATE -->
                        <td class="p-4 text-gray-500">
                            {{ $partner->created_at->format('d M Y') }}
                        </td>

                        <!-- ACTIONS -->
                        <td class="p-4 text-right space-x-2">

                    <!-- VIEW -->
                    <a href="{{ route('admin.partners.show', $partner->id) }}"
                    class="inline-block bg-gray-800 text-white px-3 py-1 text-xs rounded hover:bg-black transition">
                        View
                    </a>

                    <!-- EDIT -->
                    <a href="{{ route('admin.partners.edit', $partner->id) }}"
                    class="inline-block bg-blue-600 text-white px-3 py-1 text-xs rounded hover:bg-blue-700 transition">
                        Edit
                    </a>

                    <!-- DELETE -->
                    <form method="POST"
                        action="{{ route('admin.partners.destroy', $partner->id) }}"
                        class="inline-block">

                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Delete this partner?')"
                            class="bg-red-600 text-white px-3 py-1 text-xs rounded hover:bg-red-700 transition">
                            Delete
                        </button>
                    </form>

                </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-400">
                            No partners found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <!-- PAGINATION -->
    <div class="mt-6">
        {{ $partners->links() }}
    </div>

</div>

@endsection