<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'GESTAAC | Global Educational Standards')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<script>
    let mobileOpen = false;

    function toggleMobileMenu() {
        mobileOpen = !mobileOpen;
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }
</script>
<body class="bg-white text-slate-800 overflow-x-hidden">

<!-- NAVBAR -->
<nav class="sticky top-0 z-50 bg-white border-b border-gray-100 shadow-sm">

    <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">

        <!-- LOGO -->
        <a href="/" class="text-2xl font-black tracking-[-1px] text-black">
            GESTAAC
        </a>

        <!-- DESKTOP LINKS -->
        <ul class="hidden lg:flex items-center gap-6 text-xs font-bold uppercase tracking-wide">

            <li><a href="/accreditation-pathways" class="px-3 py-2 hover:bg-blue-50 hover:text-blue-600 rounded">Accreditation</a></li>

            <li><a href="/the-gestaac-standard" class="px-3 py-2 hover:bg-blue-50 hover:text-blue-600 rounded">Standard</a></li>

            <li><a href="/global-registry" class="px-3 py-2 hover:bg-blue-50 hover:text-blue-600 rounded">Registry</a></li>

            <li><a href="/contact-authority" class="px-3 py-2 hover:bg-blue-50 hover:text-blue-600 rounded">Contact</a></li>

        </ul>

        <!-- RIGHT ACTIONS (DESKTOP ONLY) -->
        <div class="hidden lg:flex items-center gap-4">

            @auth
                <a href="{{ auth()->user()->role === 'admin' ? '/admin/dashboard' : '/partner/dashboard' }}"
                   class="text-xs font-bold uppercase text-gray-600 hover:text-black">
                    Dashboard
                </a>

                <form method="POST" action="/logout">
                    @csrf
                    <button class="text-xs font-bold uppercase text-red-500">
                        Logout
                    </button>
                </form>

            @else
                <a href="/login" class="text-xs font-bold uppercase text-gray-500 hover:text-orange-500">
                    Login
                </a>

                <a href="/apply"
                   class="bg-slate-900 text-white text-xs font-bold uppercase px-5 py-3">
                    Apply
                </a>
            @endauth

        </div>

        <!-- MOBILE BUTTON -->
        <button class="lg:hidden flex flex-col gap-1" onclick="toggleMobileMenu()">
            <span class="w-6 h-0.5 bg-black"></span>
            <span class="w-6 h-0.5 bg-black"></span>
            <span class="w-6 h-0.5 bg-black"></span>
        </button>

    </div>

    <!-- MOBILE MENU -->
    <div id="mobileMenu" class="hidden lg:hidden border-t bg-white">

        <div class="px-6 py-4 flex flex-col gap-4 text-sm font-semibold uppercase">

            <a href="/accreditation-pathways">Accreditation Pathways</a>
            <a href="/the-gestaac-standard">The Standard</a>
            <a href="/global-registry">Registry</a>
            <a href="/contact-authority">Contact</a>

            <hr>

            @auth
                <a href="{{ auth()->user()->role === 'admin' ? '/admin/dashboard' : '/partner/dashboard' }}">
                    Dashboard
                </a>

                <form method="POST" action="/logout">
                    @csrf
                    <button class="text-red-500 text-left">
                        Logout
                    </button>
                </form>
            @else
                <a href="/login">Login</a>
                <a href="/apply" class="text-blue-600">Apply Now</a>
            @endauth

        </div>

    </div>

</nav>

<!-- MAIN CONTENT -->
<main>
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="bg-[#05070a] text-gray-400 mt-20">

    <div class="max-w-7xl mx-auto px-6 py-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

        <!-- BRAND -->
        <div>
            <div class="text-white text-xl font-black mb-4">GES&TAAC</div>
            <p class="max-w-sm text-sm leading-relaxed">
                Assess, approve, certify, and monitor institutions and training programs across global education and skills sectors.
            </p>
        </div>

        <!-- ACCREDITATION -->
        <div>
            <h6 class="text-white font-bold mb-4">Accreditation Categories</h6>
            <ul class="space-y-2 text-sm">
                <li>Education Institutions Accreditation</li>
                <li>Skills & TVET (Vocational Training)</li>
                <li>Professional & Technical Training</li>
                <li>Short Courses & Certification</li>
                <li>Corporate Training</li>
                <li>Online & E-Learning</li>
                <li>Specialized Programs</li>
            </ul>
        </div>

        <!-- LINKS -->
        <div>
            <h6 class="text-white font-bold mb-4">Quick Links</h6>
            <ul class="space-y-2 text-sm">
                <li>Accreditation Pathways</li>
                <li>The GESTAAC Standard</li>
                <li>Global Registry</li>
                <li>Contact Authority</li>
            </ul>
        </div>

        <!-- CONTACT -->
        <div>
            <h6 class="text-white font-bold mb-4">Canadian Headquarters</h6>
            <p class="text-sm">📍 123 Main St, Springfield, Canada</p>
            <p class="text-sm">📞 +1 555-123-4567</p>
            <p class="text-sm mb-4">✉️ info@gestaac.ca</p>

            <div class="flex gap-4 text-white opacity-70 text-lg">
                <span>𝕏</span>
                <span>in</span>
                <span>f</span>
            </div>
        </div>

    </div>

    <!-- BOTTOM BAR -->
    <div class="border-t border-gray-800">

        <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col md:flex-row justify-between gap-4 text-xs">

            <p>
                © {{ date('Y') }} Global Education, Skills & Training Accreditation Authority Canada (GESTAAC).
            </p>

            <div class="flex gap-6">
                <a href="#" class="hover:text-white">Privacy Policy</a>
                <a href="#" class="hover:text-white">Terms of Service</a>
            </div>

        </div>

    </div>

</footer>

</body>
</html>