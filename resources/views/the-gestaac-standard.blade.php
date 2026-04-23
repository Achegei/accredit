@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="py-28 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex flex-col lg:flex-row items-center gap-16">

            <!-- LEFT: SEAL -->
            <div class="lg:w-1/3 flex justify-center lg:justify-end">
                <div class="w-[280px] h-[280px]">
                    <svg viewBox="0 0 100 100" class="w-full h-full">
                        <circle cx="50" cy="50" r="49" stroke="#e2e8f0" stroke-width="0.5"/>
                        <circle cx="50" cy="50" r="40" stroke="#05070a" stroke-width="0.5" stroke-dasharray="4 2"/>
                        <path d="M50 25L35 70H42L50 45L58 70H65L50 25Z" fill="#05070a"/>
                        <path d="M43 58H57" stroke="#05070a" stroke-width="2"/>
                    </svg>
                </div>
            </div>

            <!-- RIGHT: TEXT -->
            <div class="flex-1 text-center lg:text-left">

                <span class="text-xs font-extrabold tracking-[3px] text-pink-600 uppercase mb-4 block">
                    THE GLOBAL QUALITY PROTOCOL
                </span>

                <h1 class="text-5xl lg:text-7xl font-black leading-[0.9] tracking-[-4px] text-[#05070a] mb-6">
                    THE GESTAAC<br>
                    <span class="bg-gradient-to-r from-blue-500 to-pink-600 bg-clip-text text-transparent">
                        STANDARD
                    </span>
                </h1>

                <p class="text-lg text-slate-500 max-w-xl leading-relaxed">
                    A rigorous, multidimensional evaluation framework designed to ensure institutional excellence, academic integrity, and global professional portability.
                </p>

            </div>

        </div>
    </div>
</section>

<!-- FRAMEWORK SECTION -->
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- CARD 1 -->
            <div class="bg-white border border-slate-200 p-10 hover:border-blue-500 hover:shadow-xl transition">
                <div class="w-12 h-12 bg-slate-100 flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>

                <h4 class="font-bold text-lg mb-3">Governance & Integrity</h4>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Institutional leadership, transparency, and ethical operational standards.
                </p>
            </div>

            <!-- CARD 2 -->
            <div class="bg-white border border-slate-200 p-10 hover:border-blue-500 hover:shadow-xl transition">
                <div class="w-12 h-12 bg-slate-100 flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>

                <h4 class="font-bold text-lg mb-3">Academic Standards</h4>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Curriculum design, pedagogy, and global industry alignment.
                </p>
            </div>

            <!-- CARD 3 -->
            <div class="bg-white border border-slate-200 p-10 hover:border-blue-500 hover:shadow-xl transition">
                <div class="w-12 h-12 bg-slate-100 flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>

                <h4 class="font-bold text-lg mb-3">Global Portability</h4>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Cross-border recognition for certifications and degrees.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- FAQ SECTION -->
<section class="py-28 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">

            <!-- LEFT -->
            <div>
                <span class="text-pink-600 text-xs font-extrabold tracking-[2px] uppercase">
                    Common Inquiries
                </span>

                <h2 class="text-4xl font-black mt-4 mb-6 leading-tight">
                    Accreditation Intelligence
                </h2>

                <p class="text-slate-500 mb-10">
                    Detailed insights into global compliance and institutional evaluation systems.
                </p>

                <div class="bg-[#05070a] text-white p-8">
                    <span class="text-pink-500 text-xs font-bold uppercase tracking-wider">
                        Official Registrar
                    </span>

                    <h5 class="font-bold mt-3 mb-3">Verification Portal</h5>

                    <p class="text-sm text-white/70 mb-6">
                        Verification is only available via the Global Registry using institutional UID.
                    </p>

                    <a href="#" class="border border-white px-5 py-2 text-xs font-bold uppercase hover:bg-white hover:text-black transition">
                        Access Registry
                    </a>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="lg:col-span-2 space-y-4">

                <!-- FAQ ITEM -->
                @foreach([
                    'What is the GESTAAC accreditation process?',
                    'Is GESTAAC recognized internationally?',
                    'How long does accreditation last?',
                    'Can individuals apply?',
                    'What are the fees?'
                ] as $q)

                <details class="border-b border-slate-200 py-6 group">
                    <summary class="cursor-pointer font-semibold text-lg flex justify-between">
                        {{ $q }}
                        <span class="group-open:rotate-180 transition">⌄</span>
                    </summary>

                    <p class="text-slate-500 mt-4 text-sm leading-relaxed">
                        This is part of the structured GESTAAC evaluation framework ensuring global compliance and institutional excellence.
                    </p>
                </details>

                @endforeach

            </div>

        </div>
    </div>
</section>

@endsection