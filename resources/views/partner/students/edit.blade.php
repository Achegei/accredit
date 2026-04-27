@extends('partner.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Edit Student</h1>

    <form method="POST" action="{{ route('partner.students.update', $student->id) }}"
          class="bg-white shadow p-6 rounded space-y-4">

        @csrf
        @method('PUT')

        <input name="full_name" value="{{ $student->full_name }}"
               class="w-full border p-2 rounded" placeholder="Full Name">

        <input name="email" value="{{ $student->email }}"
               class="w-full border p-2 rounded" placeholder="Email">

        <input name="phone" value="{{ $student->phone }}"
               class="w-full border p-2 rounded" placeholder="Phone">

        <input name="id_number" value="{{ $student->id_number }}"
               class="w-full border p-2 rounded" placeholder="ID Number">

        <input type="date" name="date_of_birth"
               value="{{ $student->date_of_birth }}"
               class="w-full border p-2 rounded">

        <input name="nationality" value="{{ $student->nationality }}"
               class="w-full border p-2 rounded" placeholder="Nationality">

        <button class="bg-black text-white px-4 py-2 rounded">
            Save Changes
        </button>

    </form>

</div>

@endsection