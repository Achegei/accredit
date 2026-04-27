@extends('partner.layouts.app')

@section('content')

<div class="max-w-6xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Students</h1>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 mb-6 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- ================= BULK UPLOAD ================= --}}
    <div class="mb-10 border p-6 bg-gray-50 rounded">
        <h2 class="text-lg font-bold mb-3">Bulk Upload (CSV)</h2>

        <form method="POST" action="{{ route('partner.students.bulk') }}"
              enctype="multipart/form-data"
              class="flex flex-col md:flex-row gap-4 items-start md:items-center">
            @csrf

            <input type="file" name="file" accept=".csv" required class="border p-2 bg-white">

            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Upload CSV
            </button>
        </form>

        <div class="mt-3 text-sm text-gray-600">
            Format:
            <strong>
                full_name,email,phone,id_number,date_of_birth,nationality
            </strong>
        </div>

        <div class="mt-4">
            <a href="{{ route('partner.students.template') }}"
               class="text-blue-600 underline text-sm">
                Download CSV Template
            </a>
        </div>
    </div>

    {{-- ================= ADD STUDENT ================= --}}
    <div class="mb-10">
        <h2 class="text-lg font-bold mb-3">Add Student</h2>

        <form method="POST" action="{{ route('partner.students.store') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <input name="full_name" placeholder="Full Name" class="border p-2 rounded" required>
                <input name="email" placeholder="Email" class="border p-2 rounded">
                <input name="phone" placeholder="Phone" class="border p-2 rounded">
                <input name="id_number" placeholder="ID / Passport" class="border p-2 rounded">
                <input type="date" name="date_of_birth" class="border p-2 rounded">
                <input name="nationality" placeholder="Nationality" class="border p-2 rounded">

            </div>

            <button class="mt-4 bg-black text-white px-4 py-2 rounded hover:bg-gray-800">
                Add Student
            </button>
        </form>
    </div>

    {{-- ================= STUDENTS TABLE ================= --}}
    <div>
        <h2 class="text-lg font-bold mb-3">Student List</h2>

        <div class="overflow-x-auto bg-white shadow rounded-lg">

            <table class="w-full text-sm">

                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="p-3 text-left">#</th>
                        <th class="p-3 text-left">Student</th>
                        <th class="p-3 text-left">Reg No</th>
                        <th class="p-3 text-left">ID</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Phone</th>
                        <th class="p-3 text-left">Nationality</th>
                        <th class="p-3 text-left">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($students as $index => $student)

                        <tr class="border-t hover:bg-gray-50">

                            {{-- ROW NUMBER --}}
                            <td class="p-3 text-gray-500">
                                {{ $index + 1 }}
                            </td>

                            {{-- NAME --}}
                            <td class="p-3 font-semibold">
                                {{ $student->full_name }}
                            </td>

                            {{-- REG NO --}}
                            <td class="p-3">
                                {{ $student->registration_number ?? '-' }}
                            </td>

                            {{-- ID --}}
                            <td class="p-3">
                                {{ $student->id_number ?? '-' }}
                            </td>

                            {{-- EMAIL --}}
                            <td class="p-3">
                                {{ $student->email ?? '-' }}
                            </td>

                            {{-- PHONE --}}
                            <td class="p-3">
                                {{ $student->phone ?? '-' }}
                            </td>

                            {{-- NATIONALITY --}}
                            <td class="p-3">
                                {{ $student->nationality ?? '-' }}
                            </td>

                            {{-- ACTIONS --}}
                            <td class="p-3 flex gap-2">

                                {{-- VIEW --}}
                                <a href="{{ route('partner.students.show', $student->id) }}"
                                   class="px-3 py-1 bg-blue-500 text-white rounded text-xs hover:bg-blue-600">
                                    View
                                </a>

                                {{-- EDIT --}}
                                <a href="{{ route('partner.students.edit', $student->id) }}"
                                   class="px-3 py-1 bg-yellow-500 text-white rounded text-xs hover:bg-yellow-600">
                                    Edit
                                </a>

                                {{-- DELETE --}}
                                <form method="POST"
                                      action="{{ route('partner.students.destroy', $student->id) }}"
                                      onsubmit="return confirm('Delete this student?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="px-3 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="p-6 text-center text-gray-500">
                                No students yet
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection