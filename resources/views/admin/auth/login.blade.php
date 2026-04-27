<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .bg-image {
            background-image: url('https://images.unsplash.com/photo-1557683316-973673baf926?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-image relative">

<!-- DARK OVERLAY -->
<div class="absolute inset-0 bg-black/70"></div>

<div class="relative w-full max-w-md">

    <!-- TITLE -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-semibold text-white tracking-tight">
            Gestaac Admin Portal
        </h1>
        <p class="text-gray-400 text-sm mt-2">
            Secure institutional access
        </p>
    </div>

    <!-- GLASS CARD -->
    <div class="bg-white/10 backdrop-blur-xl border border-white/10 rounded-2xl p-8 shadow-2xl">

        <!-- ERROR -->
        @if($errors->any())
            <div class="mb-4 text-sm text-red-300 bg-red-500/10 border border-red-500/20 px-4 py-2 rounded-lg">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-5">
            @csrf

            <!-- EMAIL -->
            <div>
                <label class="text-xs text-gray-300 mb-2 block">Email</label>
                <input type="email"
                       name="email"
                       placeholder="admin@institution.com"
                       class="w-full bg-black/30 border border-white/10 text-white px-4 py-3 rounded-lg
                              focus:outline-none focus:ring-2 focus:ring-[#cc5a4e]/50 focus:border-[#cc5a4e]
                              transition"
                       required>
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="text-xs text-gray-300 mb-2 block">Password</label>
                <input type="password"
                       name="password"
                       placeholder="••••••••"
                       class="w-full bg-black/30 border border-white/10 text-white px-4 py-3 rounded-lg
                              focus:outline-none focus:ring-2 focus:ring-[#cc5a4e]/50 focus:border-[#cc5a4e]
                              transition"
                       required>
            </div>

            <!-- BUTTON -->
            <button class="w-full bg-[#cc5a4e] hover:bg-[#b34e44]
                           text-white font-medium py-3 rounded-lg
                           shadow-lg hover:shadow-xl
                           transition-all duration-200">
                Sign In
            </button>

        </form>

        <!-- FOOTER NOTE -->
        <div class="mt-6 text-center text-xs text-gray-400">
            All access is monitored and logged
        </div>

    </div>

</div>

</body>
</html>