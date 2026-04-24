@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#f9f6f1]">

    <div class="max-w-4xl mx-auto px-6 py-12">

        <!-- HEADER -->
        <div class="mb-10">
            <h1 class="text-3xl font-black">Application Review</h1>
            <p class="text-gray-500 text-sm mt-1">
                Review institution details and take action
            </p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <!-- CARD -->
        <div class="bg-white border border-gray-200 p-8 space-y-6">

            <!-- DETAILS -->
            <div>
                <p class="text-xs text-gray-400 uppercase">Institution</p>
                <h2 class="text-xl font-bold">{{ $application->institution_name }}</h2>
            </div>

            <div>
                <p class="text-xs text-gray-400 uppercase">Contact Person</p>
                <p class="text-gray-700">{{ $application->contact_person }}</p>
            </div>

            <div>
                <p class="text-xs text-gray-400 uppercase">Email</p>
                <p class="text-gray-700">{{ $application->email }}</p>
            </div>

            <div>
                <p class="text-xs text-gray-400 uppercase">Phone</p>
                <p class="text-gray-700">{{ $application->phone }}</p>
            </div>

            <div>
                <p class="text-xs text-gray-400 uppercase">Category</p>
                <p class="text-gray-700">{{ $application->category }}</p>
            </div>

            <div>
                <p class="text-xs text-gray-400 uppercase">Description</p>
                <p class="text-gray-700">{{ $application->description ?? 'N/A' }}</p>
            </div>

            <div>
                <p class="text-xs text-gray-400 uppercase">Status</p>
                <span class="px-3 py-1 text-xs
                    @if($application->status === 'pending') bg-yellow-100 text-yellow-700
                    @elseif($application->status === 'approved') bg-green-100 text-green-700
                    @else bg-red-100 text-red-700
                    @endif">
                    {{ ucfirst($application->status) }}
                </span>
            </div>

            <!-- NOTES FIELD (NOT inside a form) -->
            <div>
                <label class="text-xs text-gray-400 uppercase">Admin Notes</label>
                <textarea id="notesTextarea" rows="4"
                    class="w-full mt-2 border border-gray-300 p-3 text-sm"
                    placeholder="Add rejection reason or internal notes...">{{ $application->notes }}</textarea>
            </div>

            <!-- ACTIONS -->
            @if($application->status === 'pending')
                <div class="flex gap-4 mt-6">

                    <!-- APPROVE -->
                    <form method="POST" action="/admin/applications/{{ $application->id }}/approve">
                        @csrf
                        <button type="submit"
                            class="px-6 py-3 bg-black text-white text-xs font-bold hover:bg-gray-800">
                            Approve & Create Partner
                        </button>
                    </form>

                    <!-- REJECT -->
                    <form id="rejectForm" method="POST" action="/admin/applications/{{ $application->id }}/reject">
                        @csrf
                        <input type="hidden" name="notes" id="notesField">

                        <button type="button"
                            onclick="submitReject()"
                            class="px-6 py-3 border border-red-500 text-red-500 text-xs font-bold hover:bg-red-500 hover:text-white">
                            Reject Application
                        </button>
                    </form>

                </div>
            @endif

        </div>

    </div>

</div>

<script>
function submitReject() {
    let notes = document.getElementById('notesTextarea').value;
    document.getElementById('notesField').value = notes;
    document.getElementById('rejectForm').submit();
}
</script>

@endsection