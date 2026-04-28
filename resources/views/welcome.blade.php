@extends('layouts.app')

@section('content')


<section class="relative bg-white min-h-[80vh] flex items-center overflow-hidden">

    <!-- Globe -->
    <div class="absolute top-0 right-0 w-[60%] h-full bg-cover bg-right z-[1]"
         style="background-image: url('/images/globe.png');">

        <div class="absolute inset-0 bg-gradient-to-r from-white via-white/90 to-transparent"></div>

    </div>

    <!-- Watermark -->
    <div class="absolute bottom-[-20px] right-5 text-[10rem] font-black tracking-[5px] text-black/5 z-[2] pointer-events-none">
        GESTAAC
    </div>

    <!-- Content (THIS is what we shift) -->
    <div class="relative z-10 w-full max-w-6xl mx-auto px-6 flex justify-start">

        <div class="max-w-[700px] text-left -translate-x-2 md:translate-x-0">

            <h1 class="text-4xl sm:text-5xl md:text-[5.5rem] font-black leading-[0.9] tracking-tight md:tracking-[-4px] text-[#0b0f19] mb-8">

                ELEVATING<br>
                GLOBAL<br>

                <span class="bg-gradient-to-b from-[#101828] to-[#2563eb] bg-clip-text text-transparent">
                    EDUCATIONAL STANDARDS
                </span>

            </h1>

            <p class="text-gray-500 mb-10 max-w-[500px] text-base md:text-lg">
                The Global Education, Skills & Training Accreditation Authority Canada (GESTAAC) provides world-class quality assurance and certification for elite institutions.
            </p>

            <div class="flex gap-4">
                <a href="{{ route('apply') }}" class="bg-[#0b0f19] text-white px-8 py-5 font-bold shadow-lg">
                    START ASSESSMENT →
                </a>

                <a href="{{ route('the-gestaac-standard') }}" class="border border-black text-black px-8 py-5 font-bold">
                    VIEW STANDARDS
                </a>
            </div>

        </div>

    </div>

</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="mb-16">
            <h2 class="text-5xl font-black tracking-tight text-[#0f172a] mb-4">
                THE GESTAAC FRAMEWORK
            </h2>
            <p class="text-gray-500 max-w-2xl text-lg leading-relaxed">
                Our multi-tiered accreditation system ensures that educational providers meet the rigorous standards of the Global Education, Skills & Training Accreditation Authority.
            </p>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- CARD 1 -->
            <div class="group border border-gray-100 p-8 bg-white shadow-sm hover:shadow-2xl transition-all duration-500">
                <span class="text-[11px] font-black tracking-widest text-gray-400">GEST-01</span>

                <div class="text-4xl my-6">🎓</div>

                <h3 class="font-bold text-xl mb-3 text-[#0f172a] group-hover:text-blue-600 transition">
                    Academic Institutions
                </h3>

                <p class="text-sm text-gray-500 mb-6 leading-relaxed">
                    Comprehensive accreditation for universities and colleges maintaining global educational standards.
                </p>

                <ul class="text-sm space-y-2 text-gray-600">
                    <li>• Institutional Review</li>
                    <li>• Quality Assurance</li>
                    <li>• Global Recognition</li>
                </ul>

                <a href="{{ route('the-gestaac-standard') }}" class="inline-block mt-6 text-sm font-bold text-[#0f172a] group-hover:text-blue-600 transition">
                    View Standards →
                </a>
            </div>

            <!-- CARD 2 -->
            <div class="group border border-gray-100 p-8 bg-white shadow-sm hover:shadow-2xl transition-all duration-500">
                <span class="text-[11px] font-black tracking-widest text-gray-400">GEST-02</span>

                <div class="text-4xl my-6">🛠️</div>

                <h3 class="font-bold text-xl mb-3 text-[#0f172a] group-hover:text-blue-600 transition">
                    TVET & Skills
                </h3>

                <p class="text-sm text-gray-500 mb-6 leading-relaxed">
                    Specialized certification for vocational training centers and technical skill development hubs.
                </p>

                <ul class="text-sm space-y-2 text-gray-600">
                    <li>• Competency Based</li>
                    <li>• Industry Aligned</li>
                    <li>• Practical Assessment</li>
                </ul>

                <a href="{{ route('the-gestaac-standard') }}" class="inline-block mt-6 text-sm font-bold text-[#0f172a] group-hover:text-blue-600 transition">
                    View Standards →
                </a>
            </div>

            <!-- CARD 3 (HIGHLIGHT) -->
            <div class="group border border-blue-200 p-8 bg-[#f0f7ff] shadow-md hover:shadow-2xl transition-all duration-500 relative">
                
                <span class="text-[11px] font-black tracking-widest text-blue-600">GEST-03</span>

                <div class="text-4xl my-6">💼</div>

                <h3 class="font-bold text-xl mb-3 text-[#0f172a]">
                    Professional Training
                </h3>

                <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                    Validation for technical training providers delivering high-impact professional development.
                </p>

                <ul class="text-sm space-y-2 text-gray-700">
                    <li>• Expert Faculty</li>
                    <li>• Curriculum Audit</li>
                    <li>• Career Impact</li>
                </ul>

                <a href="#" class="inline-block mt-6 text-sm font-bold text-blue-600">
                    View Standards →
                </a>
            </div>

            <!-- CARD 4 -->
            <div class="group border border-gray-100 p-8 bg-white shadow-sm hover:shadow-2xl transition-all duration-500">
                <span class="text-[11px] font-black tracking-widest text-gray-400">GEST-04</span>

                <div class="text-4xl my-6">💻</div>

                <h3 class="font-bold text-xl mb-3 text-[#0f172a] group-hover:text-blue-600 transition">
                    E-Learning Platforms
                </h3>

                <p class="text-sm text-gray-500 mb-6 leading-relaxed">
                    Digital-first accreditation for online education providers and virtual learning environments.
                </p>

                <ul class="text-sm space-y-2 text-gray-600">
                    <li>• LMS Verification</li>
                    <li>• Content Integrity</li>
                    <li>• Remote Standards</li>
                </ul>

                <a href="{{ route('the-gestaac-standard') }}" class="inline-block mt-6 text-sm font-bold text-[#0f172a] group-hover:text-blue-600 transition">
                    View Standards →
                </a>
            </div>

        </div>
    </div>
</section>

<section class="py-20 border-b">
    <div class="max-w-6xl mx-auto px-6 text-center">

        <div class="grid md:grid-cols-3 gap-10">
            @foreach(['850+','1200+','42'] as $stat)
            <div>
                <h2 class="text-6xl font-bold text-gray-300">{{ $stat }}</h2>
                <div class="h-[3px] w-10 bg-[#b35a4f] mx-auto my-3"></div>
            </div>
            @endforeach
        </div>

        <div class="mt-12">
            <p class="text-xs font-bold uppercase text-gray-400 mb-6">
                Recognized by Global Authorities
            </p>

            <div class="flex justify-center gap-8 text-xl font-bold text-gray-300 opacity-30">
                <span>IAF</span>
                <span>GQAN</span>
                <span>CSC</span>
                <span>VTA</span>
                <span>HER</span>
            </div>
        </div>

    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">

        <h2 class="text-4xl font-black text-[#0f172a] mb-16">
            Trusted by Global Institutions
        </h2>

        <!-- Slider Wrapper -->
        <div class="overflow-hidden relative">

            <!-- Slides Track -->
            <div class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth">

                <!-- SLIDE 1 -->
                <div class="min-w-full flex justify-center snap-center px-4">
                    <div class="max-w-xl bg-white border border-gray-100 p-10 shadow-lg">
                        
                        <p class="text-gray-600 text-lg leading-relaxed mb-8">
                            "GESTAAC accreditation has elevated our institution's global standing, providing a framework of excellence that resonates with international students."
                        </p>

                        <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto mb-4 flex items-center justify-center font-bold">
                            AV
                        </div>

                        <h5 class="font-bold text-[#0f172a]">Dr. Alistair Vance</h5>
                        <p class="text-xs uppercase text-gray-500">Director of Global Education, Toronto</p>
                    </div>
                </div>

                <!-- SLIDE 2 -->
                <div class="min-w-full flex justify-center snap-center px-4">
                    <div class="max-w-xl bg-white border border-gray-100 p-10 shadow-lg">
                        
                        <p class="text-gray-600 text-lg leading-relaxed mb-8">
                            "The structured accreditation process gave our institution credibility, improved curriculum quality, and strengthened our international partnerships."
                        </p>

                        <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto mb-4 flex items-center justify-center font-bold">
                            MK
                        </div>

                        <h5 class="font-bold text-[#0f172a]">Mary K. Obeng</h5>
                        <p class="text-xs uppercase text-gray-500">Academic Director, Accra</p>
                    </div>
                </div>

                <!-- SLIDE 3 -->
                <div class="min-w-full flex justify-center snap-center px-4">
                    <div class="max-w-xl bg-white border border-gray-100 p-10 shadow-lg">
                        
                        <p class="text-gray-600 text-lg leading-relaxed mb-8">
                            "GESTAAC helped us align with global training standards, ensuring our graduates are competitive in international job markets."
                        </p>

                        <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto mb-4 flex items-center justify-center font-bold">
                            JP
                        </div>

                        <h5 class="font-bold text-[#0f172a]">Jean-Paul Mensah</h5>
                        <p class="text-xs uppercase text-gray-500">Training Director, Paris</p>
                    </div>
                </div>

            </div>

        </div>

        <!-- Hint -->
        <p class="text-xs text-gray-400 mt-6">
            ← Swipe to navigate →
        </p>

    </div>
</section>

<section class="py-20 bg-[#05070a] text-white text-center">
    <div class="max-w-4xl mx-auto px-6">

        <h2 class="text-4xl font-bold mb-10">
            Elevate Your Institution to Global Standards.
        </h2>

        <div class="flex flex-wrap justify-center gap-6 items-center">
            <a href="#" class="text-sm uppercase opacity-50 font-bold">
                Download Standards
            </a>

            <a href="{{ route('apply') }}" class="bg-[#b35a4f] px-10 py-4 font-bold">
                Begin Application
            </a>

            <a href="{{ route('apply') }}" class="text-sm uppercase opacity-50 font-bold">
                Contact Authority
            </a>
        </div>

    </div>
</section>
@endsection