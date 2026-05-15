@extends('admin.layouts.app')

@section('title', 'Student Accreditation Applications')

@section('content')

<div class="space-y-8">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">

        <div>

            <h1 class="text-2xl font-bold text-gray-900">
                Student Accreditation Applications
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Review, verify and manage student accreditation submissions.
            </p>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- METRIC CARDS (SAAS STYLE) --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        {{-- TOTAL --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 hover:shadow-md transition">

            <p class="text-sm text-gray-500">Total Applications</p>

            <div class="flex items-end justify-between mt-3">

                <h2 class="text-3xl font-bold text-gray-900">
                    {{ $applications->total() }}
                </h2>

                <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center">
                    📄
                </div>

            </div>

        </div>


        {{-- PENDING --}}
        <div class="bg-white rounded-2xl border border-yellow-100 shadow-sm p-6 hover:shadow-md transition">

            <p class="text-sm text-gray-500">Pending Review</p>

            <div class="flex items-end justify-between mt-3">

                <h2 class="text-3xl font-bold text-yellow-600">
                    {{ $applications->where('status', 'pending')->count() }}
                </h2>

                <div class="w-10 h-10 rounded-xl bg-yellow-50 flex items-center justify-center">
                    ⏳
                </div>

            </div>

        </div>


        {{-- UNDER REVIEW --}}
        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-6 hover:shadow-md transition">

            <p class="text-sm text-gray-500">Under Review</p>

            <div class="flex items-end justify-between mt-3">

                <h2 class="text-3xl font-bold text-blue-600">
                    {{ $applications->where('status', 'under_review')->count() }}
                </h2>

                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                    🔎
                </div>

            </div>

        </div>


        {{-- APPROVED --}}
        <div class="bg-white rounded-2xl border border-green-100 shadow-sm p-6 hover:shadow-md transition">

            <p class="text-sm text-gray-500">Approved</p>

            <div class="flex items-end justify-between mt-3">

                <h2 class="text-3xl font-bold text-green-600">
                    {{ $applications->where('status', 'approved')->count() }}
                </h2>

                <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center">
                    ✅
                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- TABLE CARD --}}
    {{-- ========================================================= --}}

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        {{-- HEADER --}}
        <div class="px-6 py-5 border-b border-gray-100">

            <h2 class="text-lg font-semibold text-gray-900">
                Applications
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Latest submitted accreditation requests.
            </p>

        </div>


        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))

            <div class="mx-6 mt-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
                {{ session('success') }}
            </div>

        @endif


        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-100">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            ID
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Student
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Institution
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Course
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Status
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Date
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($applications as $application)

                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-5 text-sm font-semibold text-gray-900">
                                #{{ $application->id }}
                            </td>

                            <td class="px-6 py-5">

                                <div class="flex flex-col">

                                    <span class="text-sm font-medium text-gray-900">
                                        {{ $application->full_name }}
                                    </span>

                                    <span class="text-xs text-gray-500">
                                        {{ $application->email }}
                                    </span>

                                </div>

                            </td>

                            <td class="px-6 py-5 text-sm text-gray-700">
                                {{ $application->institution_name }}
                            </td>

                            <td class="px-6 py-5">

                                <div class="flex flex-col">

                                    <span class="text-sm font-medium text-gray-800">
                                        {{ $application->course_name }}
                                    </span>

                                    <span class="text-xs text-gray-500">
                                        {{ $application->award_received }}
                                    </span>

                                </div>

                            </td>

                            <td class="px-6 py-5">

                                @php
                                    $statusClasses = [
                                        'pending' => 'bg-yellow-100 text-yellow-700',
                                        'under_review' => 'bg-blue-100 text-blue-700',
                                        'awaiting_institution_verification' => 'bg-purple-100 text-purple-700',
                                        'institution_verified' => 'bg-indigo-100 text-indigo-700',
                                        'approved' => 'bg-green-100 text-green-700',
                                        'rejected' => 'bg-red-100 text-red-700',
                                    ];
                                @endphp

                                <span class="px-3 py-1 rounded-full text-xs font-medium {{ $statusClasses[$application->status] ?? 'bg-gray-100 text-gray-600' }}">
                                    {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                                </span>

                            </td>

                            <td class="px-6 py-5 text-sm text-gray-500">
                                {{ $application->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-5 text-right">

                                <a href="{{ route('admin.student-accreditation.show', $application->id) }}"
                                   class="inline-flex items-center px-4 py-2 rounded-xl bg-black text-white text-sm font-medium hover:bg-gray-800 transition">
                                    View
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                No accreditation applications found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $applications->links() }}
        </div>

    </div>

</div>

@endsection