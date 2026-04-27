@extends('partner.layouts.app')

@section('title', 'Certificate Requests')

@section('content')

<div class="min-h-screen">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Bulk Certificate Requests</h2>
    </div>

    <!-- SUCCESS -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 p-3 bg-red-100 text-red-700 border border-red-300 rounded">
            {{ session('error') }}
        </div>
    @endif

    <!-- INFO -->
    <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded">
        <p class="text-sm text-blue-800 font-medium">
            Upload a CSV/Excel file containing student cohort data.
        </p>

        <!-- ✅ FIXED -->
        <p class="text-xs text-blue-600 mt-1">
            Required columns: full_name, email, registration_number, course_name, grade
        </p>
    </div>

    <!-- FORM -->
    <form method="POST"
          action="{{ route('partner.certificates.store') }}"
          enctype="multipart/form-data"
          class="mb-8 bg-white border rounded-xl p-6">

        @csrf

        <div class="mb-4">
            <label class="block text-sm font-semibold mb-2">
                Upload Student Cohort File
            </label>

            <input type="file"
                   name="file"
                   accept=".csv,.xlsx,.xls"
                   class="border p-3 w-full rounded text-sm">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-semibold mb-2">
                Cohort / Batch Name (optional)
            </label>

            <input type="text"
                   name="cohort_name"
                   placeholder="e.g. 2026 Nursing Cohort A"
                   class="border p-3 w-full rounded text-sm">
        </div>

        <button class="bg-black text-white px-6 py-2 text-sm rounded hover:bg-gray-800">
            Submit Bulk Certificate Request
        </button>

    </form>

    <!-- TABLE -->
    <div class="bg-white border rounded-xl overflow-hidden">

        <table class="w-full text-sm">

            <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
                <tr>
                    <th class="p-4">Cohort</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Admin Comment</th>
                    <th class="p-4">Resubmissions</th>
                    <th class="p-4">Date</th>
                    <th class="p-4">Action</th>
                </tr>
            </thead>

            <tbody>

            @forelse($requests as $cohortName => $items)

                <!-- GROUP -->
                <tr class="bg-gray-100 border-t">
                    <td colspan="6" class="p-4">
                        <div class="font-bold text-gray-800">
                            {{ $cohortName ?? 'Untitled Cohort' }}
                        </div>
                        <div class="text-xs text-gray-500">
                            {{ $items->count() }} request(s)
                        </div>
                    </td>
                </tr>

                <!-- ITEMS -->
                @foreach($items as $req)
                    <tr class="border-t hover:bg-gray-50">

                        <td class="p-4">
                            {{ $req->cohort_name }}
                        </td>

                        <td class="p-4 text-xs">
                            {{ ucfirst($req->status) }}
                        </td>

                        <td class="p-4 text-xs">
                            {{ $req->admin_comment ?: '—' }}
                        </td>

                        <td class="p-4 text-xs">
                            {{ $req->resubmission_count ?? 0 }}
                        </td>

                        <td class="p-4 text-xs">
                            {{ $req->created_at->format('d M Y') }}
                        </td>

                        <td class="p-4">

                            @if($req->status === 'rejected')
                                <form method="POST"
                                      action="{{ route('partner.certificates.resubmit', $req->id) }}">
                                    @csrf
                                    <button class="bg-black text-white px-3 py-1 text-xs rounded w-full">
                                        Resubmit
                                    </button>
                                </form>

                            @elseif($req->status === 'pending')
                                <span class="text-xs text-gray-400">Awaiting review</span>

                            @elseif($req->status === 'approved')
                                <span class="text-xs text-green-600 font-medium">Completed</span>
                            @endif

                        </td>

                    </tr>
                @endforeach

            @empty

                <tr>
                    <td colspan="6" class="p-6 text-center text-gray-500">
                        No bulk requests submitted yet
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection