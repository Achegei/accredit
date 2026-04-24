@extends('layouts.app')

@section('title', 'Login | GESTAAC')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-[#0a0c10] px-6">

    <div class="w-full max-w-md">

        <!-- Logo / Title -->
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-black text-white tracking-tight">
                GESTAAC
            </h1>
            <p class="text-gray-500 text-sm mt-2">
                Partner Access Portal
            </p>
        </div>

        <!-- Card -->
        <div class="bg-[#111827] border border-gray-800 p-8 shadow-2xl">

            <!-- Error -->
            @if(session('error'))
                <div class="mb-6 text-sm text-red-400">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-xs uppercase tracking-widest text-gray-400 mb-2">
                        Email Address
                    </label>
                    <input type="email" name="email" required
                        class="w-full bg-[#0f1218] border border-gray-700 text-white px-4 py-3 focus:outline-none focus:border-[#cc5a4e]"
                        placeholder="you@institution.com">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-xs uppercase tracking-widest text-gray-400 mb-2">
                        Password
                    </label>
                    <input type="password" name="password" required
                        class="w-full bg-[#0f1218] border border-gray-700 text-white px-4 py-3 focus:outline-none focus:border-[#cc5a4e]"
                        placeholder="••••••••">
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-[#cc5a4e] hover:bg-[#b34e44] text-white font-bold py-3 transition">
                    Sign In
                </button>

            </form>

        </div>

        <!-- Footer -->
        <p class="text-center text-gray-500 text-xs mt-6">
            Authorized institutions only. All access is logged.
        </p>

    </div>

</div>

@endsection