@extends('admin.layouts.app')

@section('title', 'Certificate Requests')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Certificate Requests</h2>

        <form method="POST" action="{{ route('admin.certificates.bulk') }}" id="bulkForm">
            @csrf

            <button name="action" value="approve"
                class="bg-green-600 text-white px-3 py-1 text-xs rounded">
                Bulk Approve
            </button>

            <button name="action" value="reject"
                class="bg-red-600 text-white px-3 py-1 text-xs rounded">
                Bulk Reject
            </button>
        </form>
    </div>

    <!-- TABLE -->
    <table class="w-full text-sm">

        <thead>
            <tr class="text-left border-b">

                <th class="p-2">
                    <input type="checkbox" id="selectAll">
                </th>

                <th class="p-2">Cohort</th>
                <th class="p-2">Institution</th>
                <th class="p-2">Student</th>
                <th class="p-2">Course</th>
                <th class="p-2">Grade</th>
                <th class="p-2">Status</th>
                <th class="p-2">Admin Comment</th>
                <th class="p-2">Resubmissions</th>
                <th class="p-2">Actions</th>

            </tr>
        </thead>

        <tbody>

        @forelse($requests as $req)

            <tr class="border-b hover:bg-gray-50">

                <!-- checkbox -->
                <td class="p-2">
                    <input type="checkbox"
                           name="ids[]"
                           value="{{ $req->id }}"
                           class="row-checkbox"
                           form="bulkForm">
                </td>

                <!-- COHORT (FIXED) -->
                <td class="p-2 font-medium text-gray-800">
                    {{ $req->cohort_name ?? $req->batch_id ?? 'Unassigned' }}
                </td>

                <!-- Institution -->
                <td class="p-2">
                    {{ $req->institution?->name ?? '—' }}
                </td>

                <!-- Student -->
                <td class="p-2">
                    <div class="font-semibold">
                        {{ $req->student?->full_name ?? '—' }}
                    </div>

                    <div class="text-xs text-gray-500">
                        {{ $req->student?->registration_number ?? 'No Reg No' }}
                    </div>
                </td>

                <!-- Course -->
                <td class="p-2">
                    {{ $req->course?->name ?? '—' }}
                </td>

                <!-- Grade -->
                <td class="p-2">
                    {{ $req->grade ?? '—' }}
                </td>

                <!-- Status -->
                <td class="p-2 font-semibold">
                    {{ ucfirst($req->status) }}
                </td>

                <!-- Comment -->
                <td class="p-2 text-xs">
                    {{ $req->admin_comment ?? '—' }}
                </td>

                <!-- Resubmissions -->
                <td class="p-2 text-xs">
                    {{ $req->resubmission_count ?? 0 }}
                </td>

                <!-- Actions -->
                <td class="p-2 space-y-1">

                    <a href="{{ route('admin.certificates.show', $req->id) }}"
                       class="block bg-gray-600 text-white px-2 py-1 text-xs rounded text-center">
                        View
                    </a>

                    <form method="POST"
                          action="{{ route('admin.certificates.approve', $req->id) }}">
                        @csrf
                        <button class="bg-green-600 text-white px-2 py-1 text-xs rounded w-full">
                            Approve
                        </button>
                    </form>

                    <form method="POST"
                          action="{{ route('admin.certificates.reject', $req->id) }}">
                        @csrf

                        <input type="text"
                               name="comment"
                               placeholder="Reason"
                               class="w-full border p-1 text-xs mb-1">

                        <button class="bg-red-600 text-white px-2 py-1 text-xs rounded w-full">
                            Reject
                        </button>
                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="10" class="p-6 text-center text-gray-500">
                    No certificate requests found
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

    <!-- PAGINATION -->
    <div class="mt-6">
        {{ $requests->links() }}
    </div>

</div>

<!-- JS -->
<script>
document.getElementById('selectAll')?.addEventListener('change', function () {
    document.querySelectorAll('.row-checkbox').forEach(cb => {
        cb.checked = this.checked;
    });
});

document.getElementById('bulkForm')?.addEventListener('submit', function (e) {
    const checked = document.querySelectorAll('.row-checkbox:checked').length;

    if (!checked) {
        e.preventDefault();
        alert('Select at least one request.');
    }
});
</script>

@endsection