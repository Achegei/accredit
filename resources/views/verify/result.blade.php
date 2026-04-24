@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#0a0c10] text-white flex items-center justify-center p-6">

    <div class="max-w-2xl w-full bg-[#111827] border border-gray-800 p-10 shadow-2xl">

      @if(($result['status'] ?? null) === 'valid')

    <div class="text-center mb-8">
        <div class="text-green-400 text-5xl mb-4">✔</div>
        <h1 class="text-3xl font-black">VERIFIED</h1>
        <p class="text-gray-400 mt-2">Record exists in GESTAAC Registry</p>
    </div>

    <div class="space-y-4 text-sm">

        <!-- TYPE -->
        <div class="flex justify-between border-b border-gray-700 pb-2">
            <span class="text-gray-400">Type</span>
            <span class="font-bold capitalize">
                {{ $result['type'] ?? 'N/A' }}
            </span>
        </div>

        {{-- ================= CERTIFICATE ================= --}}
        @if(($result['type'] ?? null) === 'certificate')

            <div class="flex justify-between border-b border-gray-700 pb-2">
                <span class="text-gray-400">Certificate Number</span>
                <span class="font-bold">
                    {{ $result['data']->certificate_number ?? 'N/A' }}
                </span>
            </div>

            <div class="flex justify-between border-b border-gray-700 pb-2">
                <span class="text-gray-400">Student</span>
                <span class="font-bold">
                    {{ $result['data']->student->full_name ?? 'N/A' }}
                </span>
            </div>

            <div class="flex justify-between border-b border-gray-700 pb-2">
                <span class="text-gray-400">Course</span>
                <span class="font-bold">
                    {{ $result['data']->course->name ?? 'N/A' }}
                </span>
            </div>

            <div class="flex justify-between border-b border-gray-700 pb-2">
                <span class="text-gray-400">Institution</span>
                <span class="font-bold">
                    {{ $result['data']->course->institution->name ?? 'N/A' }}
                </span>
            </div>

        @endif

        {{-- ================= INSTITUTION ================= --}}
        @if(($result['type'] ?? null) === 'institution')

            <div class="flex justify-between border-b border-gray-700 pb-2">
                <span class="text-gray-400">Institution</span>
                <span class="font-bold">
                    {{ $result['data']->name ?? 'N/A' }}
                </span>
            </div>

            <div class="flex justify-between border-b border-gray-700 pb-2">
                <span class="text-gray-400">Status</span>
                <span class="text-green-400 font-bold">Active</span>
            </div>

        @endif

        {{-- ================= COURSE ================= --}}
        @if(($result['type'] ?? null) === 'course')

            <div class="flex justify-between border-b border-gray-700 pb-2">
                <span class="text-gray-400">Course</span>
                <span class="font-bold">
                    {{ $result['data']->name ?? 'N/A' }}
                </span>
            </div>

            <div class="flex justify-between border-b border-gray-700 pb-2">
                <span class="text-gray-400">Institution</span>
                <span class="font-bold">
                    {{ $result['data']->institution->name ?? 'N/A' }}
                </span>
            </div>

        @endif

    </div>

@else

    <div class="text-center">
        <div class="text-red-500 text-5xl mb-4">✖</div>
        <h1 class="text-3xl font-black">NOT FOUND</h1>

        <p class="text-gray-400 mt-2 mb-6">
            No record found for:
            <span class="text-white font-semibold">
                {{ request()->route('number') }}
            </span>
        </p>

        <a href="{{ route('verify.form') }}"
           class="inline-block px-6 py-3 bg-white text-black font-bold text-xs uppercase">
            Try Again
        </a>
    </div>

@endif

    </div>

</div>
@endsection