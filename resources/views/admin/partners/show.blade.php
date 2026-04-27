@extends('admin.layouts.app')

@section('content')

<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white rounded-xl shadow p-6">

        <h1 class="text-xl font-bold mb-4">
            Partner Details
        </h1>

        <div class="space-y-3 text-sm">

            <div>
                <span class="text-gray-500">Name:</span>
                <span class="font-semibold">{{ $partner->name }}</span>
            </div>

            <div>
                <span class="text-gray-500">Email:</span>
                <span>{{ $partner->email }}</span>
            </div>

            <div>
                <span class="text-gray-500">Institution:</span>
                <span>
                    {{ $partner->institution->name ?? 'Not linked' }}
                </span>
            </div>

            <div>
                <span class="text-gray-500">Joined:</span>
                <span>{{ $partner->created_at->format('d M Y') }}</span>
            </div>

        </div>

        <div class="mt-6">
            <a href="{{ route('admin.partners.index') }}"
               class="bg-gray-800 text-white px-4 py-2 rounded text-sm">
                Back
            </a>
        </div>

    </div>

</div>

@endsection