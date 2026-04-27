@extends('partner.layouts.app')

@section('title', 'Courses')

@section('content')

<div class="min-h-screen">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Courses</h2>
    </div>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <!-- ADD COURSE -->
    <form method="POST" action="/partner/courses" class="mb-6 flex gap-3">
        @csrf

        <input type="text" name="name" placeholder="Course name"
               class="border px-3 py-2 text-sm rounded w-1/3">

        <input type="text" name="code" placeholder="Code (e.g SE-001)"
               class="border px-3 py-2 text-sm rounded w-1/4">

        <button class="bg-black text-white px-4 py-2 text-sm rounded">
            + Add Course
        </button>
    </form>

    <!-- TABLE -->
    <div class="bg-white border rounded-xl overflow-hidden">

        <table class="w-full text-sm">

            <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
                <tr>
                    <th class="p-4">Name</th>
                    <th class="p-4">Code</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Created</th>
                </tr>
            </thead>

            <tbody>

                @forelse($courses as $course)
                    <tr class="border-t">
                        <td class="p-4 font-semibold">
                            {{ $course->name }}
                        </td>

                        <td class="p-4">
                            {{ $course->code ?? '—' }}
                        </td>

                        <td class="p-4">
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700">
                                {{ $course->accreditation_status }}
                            </span>
                        </td>

                        <td class="p-4 text-gray-500">
                            {{ $course->created_at->format('d M Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-6 text-center text-gray-500">
                            No courses yet
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection