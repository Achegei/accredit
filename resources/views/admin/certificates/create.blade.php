@extends('admin.layouts.app')

@section('title', 'Issue Certificate')

@section('content')

<div class="max-w-3xl bg-white p-6 rounded-xl shadow">

    <form method="POST" action="{{ route('admin.certificates.issue') }}" id="issueForm">
        @csrf

        <!-- 🔍 STUDENT SEARCH -->
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-2">
                Search Student (Registration Number)
            </label>

            <input type="text"
                   id="studentSearch"
                   placeholder="e.g C01/1130/2012"
                   class="w-full border p-3 rounded">

            <input type="hidden" name="student_id" id="student_id">
        </div>

        <!-- RESULT -->
        <div id="studentResult"
             class="mb-4 hidden border rounded p-3 bg-gray-50 text-sm">
        </div>

        <!-- COURSE -->
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-2">Course</label>

            <select name="course_id" class="w-full border p-3 rounded">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- GRADE -->
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-2">Grade</label>
            <input type="text" name="grade" class="w-full border p-3 rounded" placeholder="e.g Pass / A / B+">
        </div>

        <button class="bg-black text-white px-4 py-2 w-full rounded hover:bg-gray-800">
            Issue Certificate
        </button>

    </form>

</div>

<!-- 🚀 SEARCH SCRIPT -->
<script>
let timeout = null;

const searchInput = document.getElementById('studentSearch');
const resultBox = document.getElementById('studentResult');
const studentIdInput = document.getElementById('student_id');

searchInput.addEventListener('input', function () {

    clearTimeout(timeout);

    timeout = setTimeout(async () => {

        let query = this.value.trim();

        if (query.length < 3) {
            resultBox.classList.add('hidden');
            studentIdInput.value = '';
            return;
        }

        try {
            let res = await fetch(`/admin/students/search?reg=${encodeURIComponent(query)}`);
            let data = await res.json();

            if (data.found) {

                resultBox.classList.remove('hidden');

                resultBox.innerHTML = `
                    <div class="font-semibold text-gray-800">
                        ${data.full_name}
                    </div>
                    <div class="text-xs text-gray-600">
                        Reg: ${data.registration_number}
                    </div>
                    <div class="text-xs text-gray-600">
                        Institution: ${data.institution ?? '—'}
                    </div>
                    <div class="text-xs mt-1">
                        Status:
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">
                            ${data.status ?? 'Active'}
                        </span>
                    </div>
                `;

                studentIdInput.value = data.id;

            } else {

                resultBox.classList.remove('hidden');

                resultBox.innerHTML = `
                    <div class="text-red-600 text-sm font-medium">
                        ❌ No student found with that registration number
                    </div>
                `;

                studentIdInput.value = '';
            }

        } catch (e) {

            resultBox.classList.remove('hidden');

            resultBox.innerHTML = `
                <div class="text-red-600 text-sm">
                    Error searching student. Check connection.
                </div>
            `;

            studentIdInput.value = '';
        }

    }, 300);

});

// 🚫 PREVENT SUBMIT WITHOUT STUDENT
document.getElementById('issueForm').addEventListener('submit', function(e) {

    if (!studentIdInput.value) {
        e.preventDefault();

        alert('Please search and select a valid student first.');
    }
});
</script>

@endsection