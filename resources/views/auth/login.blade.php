<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Partner Login | GESTAAC</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Background overlay effect */
        .bg-overlay {
            background: radial-gradient(circle at top left, rgba(204,90,78,0.25), transparent 40%),
                        radial-gradient(circle at bottom right, rgba(59,130,246,0.15), transparent 45%);
        }
    </style>
</head>

<body class="min-h-screen bg-[#0b0f14] text-white relative overflow-hidden">

    <!-- BACKGROUND IMAGE -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c"
             class="w-full h-full object-cover opacity-20">
    </div>

    <!-- DARK OVERLAY -->
    <div class="absolute inset-0 bg-[#0b0f14]/80 bg-overlay"></div>

    <!-- MAIN CONTENT -->
    <div class="relative min-h-screen flex items-center justify-center px-6">

        <div class="w-full max-w-md">

            <!-- BRAND -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold tracking-tight">
                    GESTAAC
                </h1>
                <p class="text-gray-400 text-sm mt-2">
                    Partner Access Portal
                </p>
            </div>

            <!-- LOGIN CARD -->
            <div class="bg-[#0f172a]/70 backdrop-blur-2xl border border-white/10 rounded-2xl p-8 shadow-[0_20px_60px_rgba(0,0,0,0.6)]">

                <!-- ERROR -->
                @if(session('error'))
                    <div class="mb-6 text-sm text-red-400 bg-red-500/10 border border-red-500/20 px-4 py-3 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- FORM -->
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- EMAIL -->
                    <div>
                        <label class="text-xs text-gray-100 uppercase tracking-widest">
                            Email Address
                        </label>

                        <input type="email" name="email" required
                            class="mt-2 w-full bg-[#0b1220] border border-gray-700/50 text-white px-4 py-3 rounded-lg
                                   focus:outline-none focus:ring-2 focus:ring-[#cc5a4e]/40 focus:border-[#cc5a4e]
                                   transition"
                            placeholder="you@institution.com">
                    </div>

                    <!-- PASSWORD -->
                    <div>
                        <label class="text-xs text-gray-100 uppercase tracking-widest">
                            Password
                        </label>

                        <input type="password" name="password" required
                            class="mt-2 w-full bg-[#0b1220] border border-gray-700/50 text-white px-4 py-3 rounded-lg
                                   focus:outline-none focus:ring-2 focus:ring-[#cc5a4e]/40 focus:border-[#cc5a4e]
                                   transition"
                            placeholder="••••••••">
                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                        class="w-full bg-[#cc5a4e] hover:bg-[#b24b42]
                               text-white font-semibold py-3 rounded-lg
                               shadow-lg hover:shadow-xl transition-all duration-200">
                        Sign In
                    </button>

                </form>
                <!-- REGISTER CTA -->
                <div class="mt-6 text-center">

                    <p class="text-xs text-gray-100">
                        Don’t have a partner account?
                    </p>

                    <a href="/apply"
                    class="inline-block mt-3 text-sm font-medium text-[#cc5a4e] hover:text-[#b24b42]
                            transition">
                        Create an account →
                    </a>

                </div>

                <!-- FOOTER NOTE -->
                <div class="mt-6 text-center text-xs text-gray-100">
                    Secure encrypted access • Institution verified
                </div>

            </div>

            <!-- BOTTOM TEXT -->
            <p class="text-center text-gray-500 text-xs mt-6">
                Unauthorized access is monitored and logged.
            </p>

        </div>

    </div>

</body>
</html>