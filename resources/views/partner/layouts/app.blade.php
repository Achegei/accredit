<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Partner Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r p-6 flex flex-col justify-between">

        <div>
            <h1 class="text-xl font-black mb-10">
                GESTAAC
                <span class="text-xs block text-indigo-500">PARTNER</span>
            </h1>

            <nav class="space-y-2 text-sm font-semibold">

                <a href="/partner/dashboard" class="block px-4 py-3 rounded-lg hover:bg-indigo-50">
                    📊 Dashboard
                </a>

                <a href="/partner/students" class="block px-4 py-3 rounded-lg hover:bg-indigo-50">
                    👨‍🎓 Students
                </a>

                <a href="/partner/courses" class="block px-4 py-3 rounded-lg hover:bg-indigo-50">
                    📚 Courses
                </a>

                <a href="/partner/certificates" class="block px-4 py-3 rounded-lg hover:bg-indigo-50">
                    🎓 Certificates
                </a>

            </nav>
        </div>

        <form method="POST" action="/logout">
            @csrf
            <button class="w-full text-left px-4 py-3 text-red-500 hover:bg-red-50 rounded-lg">
                🚪 Logout
            </button>
        </form>

    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-10">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-10">

            <div>
                <h2 class="text-2xl font-black">
                    @yield('title', 'Dashboard')
                </h2>
                <p class="text-sm text-gray-500">
                    Institution Control Center
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