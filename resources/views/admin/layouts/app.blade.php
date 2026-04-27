<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GESTAAC Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-gradient-to-br from-[#f8fafc] to-[#eef2ff] text-slate-800">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white/80 backdrop-blur-xl border-r border-gray-200 p-6 flex flex-col justify-between">

        <div>
            <h1 class="text-xl font-black tracking-tight mb-10">
                GESTAAC
                <span class="text-xs block text-indigo-500 font-semibold">ADMIN</span>
            </h1>

            <nav class="space-y-2 text-sm font-semibold">

                <a href="/admin/dashboard"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">
                    📊 Dashboard
                </a>

                <a href="/admin/applications"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">
                    📄 Applications
                </a>

                <a href="/admin/institutions"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">
                    🏢 Institutions
                </a>

                <a href="/admin/partners"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">
                    👥 Partners
                </a>

            <a href="/admin/certificates"
            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">
                🎓 Certificates
            </a>

            <a href="{{ route('admin.certificates.requests') }}"
                class="block bg-white/10 px-4 py-3 rounded-lg hover:bg-white/20 transition">
                    📩 Certificate Requests
                </a>

            </nav>
        </div>

        <!-- Logout -->
        <form method="POST" action="/admin/logout">
            @csrf
            <button class="w-full text-left px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 transition text-sm font-semibold">
                🚪 Logout
            </button>
        </form>

    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-10">

        <!-- Top Bar -->
        <div class="flex justify-between items-center mb-10">

            <div>
                <h2 class="text-2xl font-black tracking-tight">
                    @yield('title', 'Dashboard')
                </h2>
                <p class="text-sm text-gray-500">
                    Welcome back — manage your ecosystem
                </p>
            </div>

            <div class="text-sm text-gray-500">
                {{ now()->format('l, d M Y') }}
            </div>

        </div>

        @yield('content')

    </main>

</div>

</body>
</html>