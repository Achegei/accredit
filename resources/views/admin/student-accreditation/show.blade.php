@extends('admin.layouts.app')

@section('title', 'Application Review')

@section('content')

<div class="space-y-6">

    {{-- ===================================================== --}}
    {{-- PAGE HEADER --}}
    {{-- ===================================================== --}}

    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-2xl font-bold text-gray-900">
                Accreditation Application Review
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Review student credentials, documents and institution verification details.
            </p>

        </div>

        <div>

            @if($application->status == 'pending')

                <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 text-sm font-medium">
                    Pending
                </span>

            @elseif($application->status == 'under_review')

                <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm font-medium">
                    Under Review
                </span>

            @elseif($application->status == 'approved')

                <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm font-medium">
                    Approved
                </span>

            @elseif($application->status == 'rejected')

                <span class="px-4 py-2 rounded-full bg-red-100 text-red-700 text-sm font-medium">
                    Rejected
                </span>

            @endif

        </div>

    </div>


    {{-- ===================================================== --}}
    {{-- SUCCESS --}}
    {{-- ===================================================== --}}

    @if(session('success'))

        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-2xl text-sm">
            {{ session('success') }}
        </div>

    @endif


    {{-- ===================================================== --}}
    {{-- MAIN GRID --}}
    {{-- ===================================================== --}}

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ================================================= --}}
        {{-- LEFT CONTENT --}}
        {{-- ================================================= --}}

        <div class="lg:col-span-2 space-y-6">

            {{-- STUDENT INFO --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

                <h2 class="text-lg font-semibold text-gray-900 mb-6">
                    Student Information
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <p class="text-sm text-gray-500">Full Name</p>
                        <p class="mt-1 font-medium text-gray-900">
                            {{ $application->full_name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Email Address</p>
                        <p class="mt-1 font-medium text-gray-900">
                            {{ $application->email }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Phone Number</p>
                        <p class="mt-1 font-medium text-gray-900">
                            {{ $application->phone ?? '—' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Nationality</p>
                        <p class="mt-1 font-medium text-gray-900">
                            {{ $application->nationality ?? '—' }}
                        </p>
                    </div>

                </div>

            </div>


            {{-- ACADEMIC INFO --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

                <h2 class="text-lg font-semibold text-gray-900 mb-6">
                    Academic Information
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <p class="text-sm text-gray-500">Institution</p>
                        <p class="mt-1 font-medium text-gray-900">
                            {{ $application->institution_name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Course / Program</p>
                        <p class="mt-1 font-medium text-gray-900">
                            {{ $application->course_name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Qualification</p>
                        <p class="mt-1 font-medium text-gray-900">
                            {{ $application->award_received }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Study Mode</p>
                        <p class="mt-1 font-medium text-gray-900">
                            {{ $application->study_mode ?? '—' }}
                        </p>
                    </div>

                </div>

            </div>


            {{-- DOCUMENTS --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

                <h2 class="text-lg font-semibold text-gray-900 mb-6">
                    Supporting Documents
                </h2>

                <div class="space-y-4">

                    @if($application->certificate_path)

                        <a
                            href="{{ asset('storage/' . $application->certificate_path) }}"
                            target="_blank"
                            class="flex items-center justify-between p-4 border border-gray-100 rounded-xl hover:bg-gray-50 transition"
                        >

                            <div>

                                <p class="font-medium text-gray-900">
                                    Certificate Copy
                                </p>

                                <p class="text-sm text-gray-500">
                                    View uploaded certificate
                                </p>

                            </div>

                            <span class="text-sm text-blue-600 font-medium">
                                Open
                            </span>

                        </a>

                    @endif


                    @if($application->transcript_path)

                        <a
                            href="{{ asset('storage/' . $application->transcript_path) }}"
                            target="_blank"
                            class="flex items-center justify-between p-4 border border-gray-100 rounded-xl hover:bg-gray-50 transition"
                        >

                            <div>

                                <p class="font-medium text-gray-900">
                                    Academic Transcript
                                </p>

                                <p class="text-sm text-gray-500">
                                    View uploaded transcript
                                </p>

                            </div>

                            <span class="text-sm text-blue-600 font-medium">
                                Open
                            </span>

                        </a>

                    @endif


                    @if($application->id_document_path)

                        <a
                            href="{{ asset('storage/' . $application->id_document_path) }}"
                            target="_blank"
                            class="flex items-center justify-between p-4 border border-gray-100 rounded-xl hover:bg-gray-50 transition"
                        >

                            <div>

                                <p class="font-medium text-gray-900">
                                    ID / Passport
                                </p>

                                <p class="text-sm text-gray-500">
                                    View identity document
                                </p>

                            </div>

                            <span class="text-sm text-blue-600 font-medium">
                                Open
                            </span>

                        </a>

                    @endif

                </div>

            </div>

        </div>


        {{-- ================================================= --}}
        {{-- RIGHT SIDEBAR --}}
        {{-- ================================================= --}}

        <div class="space-y-6">

            {{-- STATUS --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

                <h2 class="text-lg font-semibold text-gray-900 mb-6">
                    Update Status
                </h2>

                <form
                    method="POST"
                    action="{{ route(
                        'admin.student-accreditation.status',
                        $application->id
                    ) }}"
                    class="space-y-5"
                >

                    @csrf

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Application Status
                        </label>

                        <select
                            name="status"
                            class="w-full rounded-xl border-gray-200 focus:border-black focus:ring-black"
                        >

                            <option value="pending">
                                Pending
                            </option>

                            <option value="under_review">
                                Under Review
                            </option>

                            <option value="awaiting_institution_verification">
                                Awaiting Institution Verification
                            </option>

                            <option value="institution_verified">
                                Institution Verified
                            </option>

                            <option value="approved">
                                Approved
                            </option>

                            <option value="rejected">
                                Rejected
                            </option>

                        </select>

                    </div>


                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Internal Notes
                        </label>

                        <textarea
                            name="admin_notes"
                            rows="6"
                            class="w-full rounded-xl border-gray-200 focus:border-black focus:ring-black"
                            placeholder="Add review notes, verification comments or accreditation remarks..."
                        >{{ $application->admin_notes }}</textarea>

                    </div>


                    <button
                        type="submit"
                        class="w-full bg-black hover:bg-gray-800 text-white py-3 rounded-xl font-medium transition"
                    >
                        Update Application
                    </button>

                </form>

            </div>


            {{-- META --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

                <h2 class="text-lg font-semibold text-gray-900 mb-6">
                    Application Metadata
                </h2>

                <div class="space-y-4 text-sm">

                    <div class="flex justify-between">
                        <span class="text-gray-500">
                            Application ID
                        </span>

                        <span class="font-medium text-gray-900">
                            #{{ $application->id }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">
                            Submitted
                        </span>

                        <span class="font-medium text-gray-900">
                            {{ $application->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">
                            Last Updated
                        </span>

                        <span class="font-medium text-gray-900">
                            {{ $application->updated_at->diffForHumans() }}
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection