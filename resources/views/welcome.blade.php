@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="relative bg-white min-h-[85vh] flex items-center overflow-hidden">

    <!-- Soft Canadian SaaS background -->
    <div class="absolute inset-0 bg-gradient-to-br from-white via-slate-50 to-red-50/40"></div>

    <!-- Subtle glow -->
    <div class="absolute top-[-120px] right-[-120px] w-[400px] h-[400px] bg-red-500/10 blur-3xl rounded-full"></div>
    <div class="absolute bottom-[-120px] left-[-120px] w-[400px] h-[400px] bg-blue-500/10 blur-3xl rounded-full"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 w-full">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <!-- LEFT CONTENT -->
            <div class="max-w-3xl">

                <span class="text-xs font-bold tracking-[3px] text-red-600 uppercase mb-4 block">
                    Canada-Based • Global Accreditation Authority
                </span>

                <h1 class="text-5xl md:text-6xl font-black leading-[1.05] tracking-tight text-[#0b0f19] mb-6">
                    Accredit Your Courses.<br>
                    Elevate Your Institution
                    <span class="text-red-600">Globally.</span>
                </h1>

                <p class="text-lg text-gray-600 leading-relaxed mb-8">
                    Transform your training programs into recognized, structured, and credible certifications aligned with international standards.
                </p>

                <div class="flex flex-wrap gap-3 text-xs font-bold uppercase tracking-widest text-gray-500 mb-8">
                    <span>Canada-Based</span>
                    <span>•</span>
                    <span>Global Reach</span>
                    <span>•</span>
                    <span>Education • Skills • Professional Training</span>
                </div>

                <div class="flex gap-4">
                    <a href="{{ route('apply') }}"
                       class="bg-[#0b0f19] text-white px-8 py-5 font-bold hover:bg-red-600 transition">
                        Apply for Accreditation →
                    </a>

                    <a href="{{ route('the-gestaac-standard') }}"
                       class="border border-black text-black px-8 py-5 font-bold hover:bg-black hover:text-white transition">
                        View Standards
                    </a>
                </div>

            </div>

            <!-- RIGHT IMAGE PANEL (CANADIAN VISUAL LAYER) -->
            <div class="relative hidden lg:block">

                <!-- Image frame -->
                <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-gray-100">

                    <!-- MAIN IMAGE -->
                    <img src="/images/canada-hero.jpg"
                         class="w-full h-[520px] object-cover"
                         alt="Canada Accreditation Authority">

                    <!-- OVERLAY GRADIENTS -->
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0b0f19]/40 via-transparent to-white/10"></div>
                    <div class="absolute inset-0 bg-gradient-to-l from-red-600/10 to-transparent"></div>

                </div>

                <!-- Floating badge -->
                <div class="absolute -bottom-6 -left-6 bg-white shadow-xl border border-gray-100 px-5 py-4">
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-widest">
                        Headquartered in Canada
                    </p>
                    <p class="text-sm font-black text-[#0b0f19]">
                        Global Education Authority
                    </p>
                </div>

                <!-- Maple accent -->
                <div class="absolute top-6 right-6 text-6xl opacity-10">
                    🍁
                </div>

            </div>

        </div>

    </div>
</section>

<!-- CORE POSITIONING -->
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-4xl md:text-5xl font-black mb-6">
            From Offering Courses → To Issuing Recognized Certifications
        </h2>

        <p class="text-gray-600 max-w-3xl text-lg leading-relaxed mb-12">
            Most institutions offer courses. Leading institutions offer recognized, trusted, and structured programs.
        </p>

        <div class="grid md:grid-cols-2 gap-6 text-gray-700">

            <div class="p-6 border border-gray-100 bg-gray-50">
                <h3 class="font-bold mb-3">Without GESTAAC</h3>
                <ul class="space-y-2 text-sm">
                    <li>• Local-only recognition</li>
                    <li>• Informal training systems</li>
                    <li>• Low institutional trust</li>
                    <li>• Basic certificates</li>
                </ul>
            </div>

            <div class="p-6 border border-red-100 bg-red-50">
                <h3 class="font-bold mb-3 text-red-600">With GESTAAC</h3>
                <ul class="space-y-2 text-sm">
                    <li>• Global institutional positioning</li>
                    <li>• Standardized certification systems</li>
                    <li>• Higher student trust & enrollment</li>
                    <li>• Recognized structured credentials</li>
                </ul>
            </div>

        </div>

    </div>
</section>

<!-- VALUE PROPOSITION -->
<section class="py-24 bg-slate-50">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-4xl font-black mb-12">What Your Institution Gains</h2>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-white p-8 border">
                <h3 class="font-bold mb-3">Structured Certification</h3>
                <p class="text-gray-600 text-sm">Issue globally recognized and standardized certificates.</p>
            </div>

            <div class="bg-white p-8 border">
                <h3 class="font-bold mb-3">Institutional Growth</h3>
                <p class="text-gray-600 text-sm">Increase enrollment and strengthen institutional reputation.</p>
            </div>

            <div class="bg-white p-8 border">
                <h3 class="font-bold mb-3">Global Alignment</h3>
                <p class="text-gray-600 text-sm">Align with international education frameworks and mobility systems.</p>
            </div>

        </div>

    </div>
</section>

<!-- WHO SHOULD APPLY -->
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-4xl font-black mb-10">Designed for Institutions That Want to Grow</h2>

        <div class="grid md:grid-cols-3 gap-6 text-gray-700">

            <div>• Private Schools</div>
            <div>• Colleges & Institutes</div>
            <div>• Training Centers</div>
            <div>• Online Academies</div>
            <div>• TVET Institutions</div>
            <div>• Corporate Training Providers</div>

        </div>

        <p class="mt-10 text-gray-600 font-medium">
            If you offer courses — you qualify to apply.
        </p>

    </div>
</section>

<!-- ACCREDITATION COVERAGE -->
<section class="py-24 bg-slate-50">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-4xl font-black mb-10">Courses We Accredit</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 text-sm">

            <div>
                <h3 class="font-bold mb-2">Education</h3>
                <p class="text-gray-600">Academic programs & institutions</p>
            </div>

            <div>
                <h3 class="font-bold mb-2">Skills & TVET</h3>
                <p class="text-gray-600">Technical & vocational training</p>
            </div>

            <div>
                <h3 class="font-bold mb-2">Professional</h3>
                <p class="text-gray-600">AI, ICT, cybersecurity, software</p>
            </div>

            <div>
                <h3 class="font-bold mb-2">Short Courses</h3>
                <p class="text-gray-600">Bootcamps & workshops</p>
            </div>

        </div>

    </div>
</section>

<!-- PROCESS -->
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-4xl font-black mb-10">How It Works</h2>

        <div class="grid md:grid-cols-4 gap-6">

            <div>
                <h3 class="font-bold mb-2">1. Apply</h3>
                <p class="text-gray-600 text-sm">Submit institution profile</p>
            </div>

            <div>
                <h3 class="font-bold mb-2">2. Review</h3>
                <p class="text-gray-600 text-sm">Curriculum evaluation</p>
            </div>

            <div>
                <h3 class="font-bold mb-2">3. Approval</h3>
                <p class="text-gray-600 text-sm">Accreditation granted</p>
            </div>

            <div>
                <h3 class="font-bold mb-2">4. Certify</h3>
                <p class="text-gray-600 text-sm">Issue recognized certificates</p>
            </div>

        </div>

    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-[#0b0f19] text-white text-center">

    <div class="max-w-4xl mx-auto px-6">

        <h2 class="text-4xl font-black mb-6">
            Position Your Institution for the Future
        </h2>

        <p class="text-gray-300 mb-10">
            Institutions that adapt early gain the advantage.
        </p>

        <div class="flex flex-wrap justify-center gap-4">

            <a href="{{ route('apply') }}"
               class="bg-red-600 px-8 py-4 font-bold hover:bg-red-700 transition">
                Apply Today →
            </a>

            <a href="{{ route('the-gestaac-standard') }}"
               class="border border-white px-8 py-4 font-bold hover:bg-white hover:text-black transition">
                Start Process
            </a>

        </div>

    </div>

</section>

<!-- FOOTER AUTHORITY -->
<section class="py-10 bg-white text-center text-xs text-gray-500">

    Global Education, Skills & Training Accreditation Authority Canada (GESTAAC)<br>
    Canada-Based • Global Education • Certification Standards<br>
    <strong>info@gestaac.ca</strong>

</section>

@endsection