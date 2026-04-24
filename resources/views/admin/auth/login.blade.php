<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f6f7fb] flex items-center justify-center min-h-screen">

<div class="w-full max-w-md bg-white border border-gray-200 p-8">

    <h1 class="text-2xl font-black mb-6">Admin Login</h1>

    @if($errors->any())
        <div class="mb-4 text-red-500 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-4">
        @csrf

        <input type="email"
               name="email"
               placeholder="Email"
               class="w-full border border-gray-300 p-3 text-sm"
               required>

        <input type="password"
               name="password"
               placeholder="Password"
               class="w-full border border-gray-300 p-3 text-sm"
               required>

        <button class="w-full bg-black text-white py-3 text-sm font-bold hover:bg-gray-800">
            Login
        </button>

    </form>

</div>

</body>
</html>