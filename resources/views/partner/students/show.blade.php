@extends('partner.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Student Profile</h1>

        <div class="flex gap-2">
            <a href="{{ route('partner.students.edit', $student->id) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded">
                Edit
            </a>

            <a href="{{ route('partner.students') }}"
               class="bg-gray-200 px-4 py-2 rounded">
                Back
            </a>
        </div>
    </div>

    <div class="bg-white shadow rounded p-6 space-y-4">

        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-gray-500 text-sm">Full Name</p>
                <p class="font-semibold">{{ $student->full_name }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Registration Number</p>
                <p class="font-semibold">{{ $student->registration_number ?? '-' }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Email</p>
                <p class="font-semibold">{{ $student->email ?? '-' }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Phone</p>
                <p class="font-semibold">{{ $student->phone ?? '-' }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">ID Number</p>
                <p class="font-semibold">{{ $student->id_number ?? '-' }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Nationality</p>
                <p class="font-semibold">{{ $student->nationality ?? '-' }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Date of Birth</p>
                <p class="font-semibold">
                    {{ $student->date_of_birth ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Enrollment Date</p>
                <p class="font-semibold">
                    {{ $student->enrollment_date ?? '-' }}
                </p>
            </div>
        </div>

    </div>

</div>

@endsection