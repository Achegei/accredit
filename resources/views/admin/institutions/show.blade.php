@extends('admin.layouts.app')

@section('title', 'Institution Details')

@section('content')

<div class="max-w-5xl mx-auto p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-black">
            {{ $institution->name ?? 'Institution' }}
        </h1>

        <a href="{{ route('admin.institutions.index') }}"
           class="bg-gray-600 text-white px-4 py-2 text-sm rounded">
            Back
        </a>
    </div>

    <!-- INFO -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6 text-sm">

        <div class="p-4 border rounded">
            <p class="text-gray-500">Email</p>
            <p class="font-semibold">
                {{ $institution->email ?? '—' }}
            </p>
        </div>

        <div class="p-4 border rounded">
            <p class="text-gray-500">Phone</p>
            <p class="font-semibold">
                {{ $institution->phone ?? '—' }}
            </p>
        </div>

        <div class="p-4 border rounded">
            <p class="text-gray-500">Status</p>
            <p class="font-semibold capitalize">
                {{ $institution->status ?? '—' }}
            </p>
        </div>

    </div>

    <!-- COURSES HEADER -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold">
            Accredited Courses
        </h2>
    </div>

    <!-- ADD COURSE -->
    <form method="POST"
          action="{{ route('admin.institutions.courses.add', $institution->id) }}"
          class="flex gap-2 mb-6">

        @csrf

        <input type="text"
               name="name"
               placeholder="Enter course name"
               class="border p-2 rounded w-full text-sm">

        <button class="bg-indigo-600 text-white px-4 py-2 text-sm rounded">
            Add Course
        </button>

    </form>

    <!-- COURSES LIST -->
    <div class="bg-white border rounded-lg overflow-hidden">

        <table class="w-full text-sm">

            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-3">Course Name</th>
                    <th class="p-3 text-right">Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($institution->courses as $course)

                    <tr class="border-t">

                        <td class="p-3 font-medium">
                            {{ $course->name ?? '—' }}
                        </td>

                        <td class="p-3 text-right">

                            <form method="POST"
                                  action="{{ route('admin.institutions.courses.remove', [$institution->id, $course->id]) }}"
                                  onsubmit="return confirm('Remove this course?')">

                                @csrf
                                @method('DELETE')

                                <button class="text-red-600 text-xs">
                                    Remove
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="2" class="p-6 text-center text-gray-500">
                            No courses accredited yet
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection