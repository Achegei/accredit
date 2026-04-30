@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="relative py-20 md:py-28 bg-white overflow-hidden">

    <!-- Canadian gradient background -->
    <div class="absolute inset-0 bg-gradient-to-br from-red-50 via-white to-gray-100 opacity-70"></div>

    <!-- Soft glow accents -->
    <div class="absolute top-[-100px] left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-red-200/30 blur-3xl rounded-full"></div>
    <div class="absolute bottom-[-120px] right-0 w-[400px] h-[400px] bg-gray-300/20 blur-3xl rounded-full"></div>

    <!-- Content -->
    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">

        <span class="text-xs font-extrabold tracking-[3px] text-red-600 uppercase mb-4 block">
            THE GLOBAL QUALITY PROTOCOL
        </span>

        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black leading-tight md:leading-[0.95] tracking-tight md:tracking-[-2px] text-[#05070a] mb-6">
            THE GESTAAC<br>
            <span class="bg-gradient-to-r from-red-600 to-black bg-clip-text text-transparent">
                STANDARD
            </span>
        </h1>

        <p class="text-base md:text-lg text-slate-500 max-w-2xl mx-auto leading-relaxed">
            A rigorous, multidimensional evaluation framework designed to ensure institutional excellence, academic integrity, and global professional portability.
        </p>

    </div>

</section>

<!-- FRAMEWORK SECTION -->
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- CARD 1 -->
            <div class="bg-white border border-slate-200 p-10 hover:border-red-600 hover:shadow-xl transition">
                <div class="w-12 h-12 bg-red-50 flex items-center justify-center mb-6">
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
            <div class="bg-white border border-slate-200 p-10 hover:border-red-600 hover:shadow-xl transition">
                <div class="w-12 h-12 bg-red-50 flex items-center justify-center mb-6">
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
            <div class="bg-white border border-slate-200 p-10 hover:border-red-600 hover:shadow-xl transition">
                <div class="w-12 h-12 bg-red-50 flex items-center justify-center mb-6">
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
                <span class="text-red-600 text-xs font-extrabold tracking-[2px] uppercase">
                    Common Inquiries
                </span>

                <h2 class="text-4xl font-black mt-4 mb-6 leading-tight">
                    Accreditation Intelligence
                </h2>

                <p class="text-slate-500 mb-10">
                    Detailed insights into global compliance and institutional evaluation systems.
                </p>

                <div class="bg-[#05070a] text-white p-8 border-l-4 border-red-600">
                    <span class="text-red-500 text-xs font-bold uppercase tracking-wider">
                        Official Registrar
                    </span>

                    <h5 class="font-bold mt-3 mb-3">Verification Portal</h5>

                    <p class="text-sm text-white/70 mb-6">
                        Verification is only available via the Global Registry using institutional UID.
                    </p>

                    <a href="/global-registry" class="border border-white px-5 py-2 text-xs font-bold uppercase hover:bg-red-600 hover:border-red-600 hover:text-white transition">
                        Access Registry
                    </a>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="lg:col-span-2 space-y-4">

                @php
                $faqs = [
                    [
                        'q' => 'What is the GESTAAC accreditation process?',
                        'a' => 'The GESTAAC accreditation process follows a structured, multi-phase approach. It begins with application submission, followed by a self-assessment audit aligned with the GESTAAC framework. This is then reviewed through expert evaluation and, where applicable, peer review or site inspection. Successful institutions are granted accreditation and listed in the global registry, with ongoing monitoring to ensure continued compliance.'
                    ],
                    [
                        'q' => 'Is GESTAAC recognized internationally?',
                        'a' => 'GESTAAC operates within an international framework of quality assurance principles and collaborates with global partners to ensure its standards align with recognized best practices. Its accreditation model is designed to support cross-border recognition, institutional credibility, and global education mobility.'
                    ],
                    [
                        'q' => 'How long does accreditation last?',
                        'a' => 'GESTAAC accreditation is typically granted for a defined multi-year period, during which institutions must maintain compliance with established standards. Periodic reviews and monitoring ensure continued quality, with renewal required upon expiration.'
                    ],
                    [
                        'q' => 'Can individuals apply?',
                        'a' => 'GESTAAC accreditation is primarily designed for institutions, training providers, and organizations. However, individuals may engage through affiliated institutions or participate in certified programs that align with the GESTAAC framework.'
                    ],
                    [
                        'q' => 'What are the fees?',
                        'a' => 'GESTAAC accreditation fees vary depending on the type of institution, scope of evaluation, and level of accreditation sought. Fees are structured to reflect the depth of assessment and ongoing quality assurance processes. Institutions receive a detailed quotation upon inquiry, tailored to their specific profile and requirements.'
                    ],
                ];
                @endphp

                @foreach($faqs as $faq)
                <details class="border-b border-slate-200 py-6 group hover:bg-red-50/40 px-2 transition">
                    <summary class="cursor-pointer font-semibold text-lg flex justify-between items-center">
                        {{ $faq['q'] }}
                        <span class="group-open:rotate-180 transition">⌄</span>
                    </summary>

                    <p class="text-slate-500 mt-4 text-sm leading-relaxed">
                        {{ $faq['a'] }}
                    </p>
                </details>
                @endforeach

            </div>

        </div>
    </div>
</section>

@endsection