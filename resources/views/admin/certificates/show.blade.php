@extends('admin.layouts.app')

@section('title', 'Certificate Request Details')

@section('content')

<div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">
            Certificate Request #{{ $request->id }}
        </h2>

        <a href="{{ route('admin.certificates.requests') }}"
           class="text-sm bg-gray-600 text-white px-3 py-1 rounded">
            Back to Requests
        </a>
    </div>

    <!-- DETAILS GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">

        <div class="p-3 border rounded">
            <p class="text-gray-500">Institution</p>
            <p class="font-semibold">
                {{ $request->institution?->name ?? '—' }}
            </p>
        </div>

        <div class="p-3 border rounded">
            <p class="text-gray-500">Student</p>
            <p class="font-semibold">
                {{ $request->student?->full_name ?? '—' }}
            </p>
        </div>

        <div class="p-3 border rounded">
            <p class="text-gray-500">Course</p>
            <p class="font-semibold">
                {{ $request->course?->name ?? '—' }}
            </p>
        </div>

        <div class="p-3 border rounded">
            <p class="text-gray-500">Grade</p>
            <p class="font-semibold">
                {{ $request->grade ?? '—' }}
            </p>
        </div>

        <div class="p-3 border rounded">
            <p class="text-gray-500">Status</p>
            <p class="font-semibold capitalize">
                {{ $request->status ?? '—' }}
            </p>
        </div>

        <div class="p-3 border rounded">
            <p class="text-gray-500">Resubmissions</p>
            <p class="font-semibold">
                {{ $request->resubmission_count ?? 0 }}
            </p>
        </div>

    </div>

    <!-- ADMIN COMMENT -->
    <div class="mt-6 p-4 border rounded">
        <p class="text-gray-500 text-sm mb-2">Admin Comment</p>
        <p class="text-sm">
            {{ $request->admin_comment ?? 'No comment provided' }}
        </p>
    </div>

    <!-- ACTIONS -->
    <div class="mt-6 flex gap-3">

        <!-- APPROVE -->
        <form method="POST"
              action="{{ route('admin.certificates.approve', $request->id) }}">
            @csrf
            <button class="bg-green-600 text-white px-4 py-2 text-sm rounded">
                Approve
            </button>
        </form>

        <!-- REJECT -->
        <form method="POST"
              action="{{ route('admin.certificates.reject', $request->id) }}">
            @csrf

            <input type="text"
                   name="comment"
                   placeholder="Reason (optional)"
                   class="border p-2 text-sm rounded w-64">

            <button class="bg-red-600 text-white px-4 py-2 text-sm rounded ml-2">
                Reject
            </button>
        </form>

    </div>

</div>

@endsection