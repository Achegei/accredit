@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-[#0a0c10] text-white">
<form method="GET" action="{{ route('verify.search') }}"
          class="w-full max-w-xl bg-[#111827] p-10 border border-gray-800 shadow-2xl">

        @csrf

        <h1 class="text-2xl font-black mb-6 text-center">
            Verify Registry
        </h1>

        <input
            type="text"
            name="query"
            id="verifyInput"
            placeholder="Certificate, Institution or Course..."
            class="w-full p-4 bg-transparent border border-gray-700 text-white mb-6"
            autofocus
            required
        >

        <button type="submit"
                class="w-full bg-white text-black font-bold py-3">
            Scan / Verify
        </button>
        <p>if you have any questions, please contact us. info@gestaac.ca</p>

    </form>

</div>

@endsection