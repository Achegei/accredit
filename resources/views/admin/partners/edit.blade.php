@extends('admin.layouts.app')

@section('content')

<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white rounded-xl shadow p-6">

        <h1 class="text-xl font-bold mb-6">
            Edit Partner
        </h1>

        <form method="POST" action="{{ route('admin.partners.update', $partner->id) }}">
            @csrf
            @method('PUT')

            <!-- NAME -->
            <div class="mb-4">
                <label class="block text-sm text-gray-600 mb-1">Name</label>
                <input type="text"
                       name="name"
                       value="{{ $partner->name }}"
                       class="w-full border p-2 rounded text-sm">
            </div>

            <!-- EMAIL -->
            <div class="mb-4">
                <label class="block text-sm text-gray-600 mb-1">Email</label>
                <input type="email"
                       name="email"
                       value="{{ $partner->email }}"
                       class="w-full border p-2 rounded text-sm">
            </div>

            <!-- INSTITUTION -->
            <div class="mb-4">
                <label class="block text-sm text-gray-600 mb-1">Institution</label>

                <select name="institution_id"
                        class="w-full border p-2 rounded text-sm">

                    <option value="">-- Not Linked --</option>

                    @foreach($institutions as $institution)
                        <option value="{{ $institution->id }}"
                            {{ $partner->institution_id == $institution->id ? 'selected' : '' }}>
                            {{ $institution->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- ACTIONS -->
            <div class="flex justify-between items-center mt-6">

                <a href="{{ route('admin.partners.index') }}"
                   class="text-sm text-gray-500">
                    Cancel
                </a>

                <button class="bg-blue-600 text-white px-4 py-2 rounded text-sm hover:bg-blue-700">
                    Update Partner
                </button>

            </div>

        </form>

    </div>

</div>

@endsection