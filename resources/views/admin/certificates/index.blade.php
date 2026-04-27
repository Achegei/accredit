@extends('admin.layouts.app')

@section('title', 'Certificates')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Certificates</h2>

        <a href="/admin/certificates/create"
           class="px-4 py-2 bg-black text-white text-sm rounded-lg">
            + Issue Certificate
        </a>
    </div>

    <table class="w-full text-sm">
        <thead>
            <tr class="text-left border-b">
                <th class="p-2">#</th>
                <th class="p-2">Student</th>
                <th class="p-2">Course</th>
                <th class="p-2">Certificate No</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($certificates ?? [] as $cert)
                <tr class="border-b">
                    <td class="p-2">{{ $cert->id }}</td>
                    <td class="p-2">{{ $cert->student->full_name ?? '—' }}</td>
                    <td class="p-2">{{ $cert->course->name ?? '—' }}</td>
                    <td class="p-2 font-mono">{{ $cert->certificate_number }}</td>
                    <td class="p-2">
                        <span class="px-2 py-1 text-xs rounded
                            {{ $cert->status === 'valid' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $cert->status }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">
                        No certificates found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection