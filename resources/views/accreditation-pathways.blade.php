@extends('layouts.app')

@section('content')

<!-- HERO TITLE -->
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto text-center px-6">
        <h1 class="text-5xl md:text-6xl font-black tracking-tight mb-4">
            ACCREDITATION PATHWAYS
        </h1>
        <p class="text-gray-500 text-lg max-w-2xl mx-auto">
            Explore the comprehensive journey toward becoming a GESTAAC-certified institution, ensuring your educational standards meet global benchmarks.
        </p>
    </div>
</section>

<!-- TIMELINE -->
<section class="bg-[#05070a] text-white py-24 relative overflow-hidden">

    <div class="max-w-6xl mx-auto px-6 relative">

        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-black">
                THE PATH TO EXCELLENCE
            </h2>
        </div>

        <!-- vertical line -->
        <div class="absolute left-1/2 top-0 bottom-0 w-px border-l border-dashed border-white/20 -translate-x-1/2 hidden md:block"></div>

        <!-- ITEM 1 -->
        <div class="grid md:grid-cols-2 gap-12 items-center mb-28 relative">

            <div class="md:text-right">
                <img class="rounded shadow-2xl w-full max-w-md ml-auto"
                     src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4" />
            </div>

            <div class="md:pl-16">
                <div class="text-[#b35a4f] text-xs font-bold tracking-widest mb-2">PHASE 01</div>
                <h3 class="text-2xl font-bold mb-4">APPLICATION SUBMISSION</h3>
                <p class="text-white/70">
                    Submit your institutional profile through our secure portal. Initial review ensures eligibility and alignment with GESTAAC standards.
                </p>
            </div>

            <div class="hidden md:block absolute left-1/2 top-1/2 w-3 h-3 bg-[#b35a4f] rotate-45 -translate-x-1/2 -translate-y-1/2 ring-8 ring-[#b35a4f]/20"></div>
        </div>

        <!-- ITEM 2 -->
        <div class="grid md:grid-cols-2 gap-12 items-center mb-28 relative">

            <div class="md:order-2 md:text-left">
                <img class="rounded shadow-2xl w-full max-w-md"
                     src="{{ asset('images/phase-02.webp') }}" />
            </div>

            <div class="md:order-1 md:text-right md:pr-16">
                <div class="text-[#b35a4f] text-xs font-bold tracking-widest mb-2">PHASE 02</div>
                <h3 class="text-2xl font-bold mb-4">SELF-ASSESSMENT AUDIT</h3>
                <p class="text-white/70">
                    Perform internal evaluation using the GESTAAC Framework to map curriculum, faculty, and outcomes.
                </p>
            </div>

            <div class="hidden md:block absolute left-1/2 top-1/2 w-3 h-3 bg-[#b35a4f] rotate-45 -translate-x-1/2 -translate-y-1/2 ring-8 ring-[#b35a4f]/20"></div>
        </div>

        <!-- ITEM 3 -->
        <div class="grid md:grid-cols-2 gap-12 items-center mb-28 relative">

            <div class="md:text-right">
                <img class="rounded shadow-2xl w-full max-w-md ml-auto"
                     src="https://images.unsplash.com/photo-1552664730-d307ca884978" />
            </div>

            <div class="md:pl-16">
                <div class="text-[#b35a4f] text-xs font-bold tracking-widest mb-2">PHASE 03</div>
                <h3 class="text-2xl font-bold mb-4">PEER REVIEW</h3>
                <p class="text-white/70">
                    Global experts visit or audit your institution to validate standards and learning environment quality.
                </p>
            </div>

            <div class="hidden md:block absolute left-1/2 top-1/2 w-3 h-3 bg-[#b35a4f] rotate-45 -translate-x-1/2 -translate-y-1/2 ring-8 ring-[#b35a4f]/20"></div>
        </div>

        <!-- ITEM 4 -->
        <div class="grid md:grid-cols-2 gap-12 items-center relative">

            <div class="md:order-2 md:text-left">
                <img class="rounded shadow-2xl w-full max-w-md"
                     src="{{ asset('images/phase-04.webp') }}" />
            </div>

            <div class="md:order-1 md:text-right md:pr-16">
                <div class="text-[#b35a4f] text-xs font-bold tracking-widest mb-2">PHASE 04</div>
                <h3 class="text-2xl font-bold mb-4">FINAL ACCREDITATION</h3>
                <p class="text-white/70">
                    Successful institutions are added to the Global Registry of Excellence with official certification.
                </p>
            </div>

            <div class="hidden md:block absolute left-1/2 top-1/2 w-3 h-3 bg-[#b35a4f] rotate-45 -translate-x-1/2 -translate-y-1/2 ring-8 ring-[#b35a4f]/20"></div>
        </div>

    </div>
</section>

<!-- WHY SECTION -->
<section class="bg-white py-24">
    <div class="max-w-6xl mx-auto px-6">

        <span class="text-pink-600 text-xs font-bold tracking-widest">WHY GESTAAC?</span>

        <h2 class="text-4xl md:text-5xl font-black mt-3 mb-6 leading-tight">
            Elevating Standards through <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-pink-600">Excellence</span>
        </h2>

        <p class="text-gray-600 max-w-2xl mb-14">
            Discover the strategic advantages of partnering with Canada's premier private international accreditation authority.
        </p>

        <div class="grid md:grid-cols-3 gap-10">

            <div>
                <div class="w-14 h-14 bg-gray-100 flex items-center justify-center rounded mb-5">
                    ⚙️
                </div>
                <h3 class="text-xl font-bold mb-3">Global Recognition</h3>
                <p class="text-gray-600 text-sm">
                    Gain international prestige with Canadian accreditation recognized globally.
                </p>
            </div>

            <div>
                <div class="w-14 h-14 bg-gray-100 flex items-center justify-center rounded mb-5">
                    🛡️
                </div>
                <h3 class="text-xl font-bold mb-3">Quality Assurance</h3>
                <p class="text-gray-600 text-sm">
                    Rigorous evaluation ensures compliance with global standards.
                </p>
            </div>

            <div>
                <div class="w-14 h-14 bg-gray-100 flex items-center justify-center rounded mb-5 text-pink-600">
                    📊
                </div>
                <h3 class="text-xl font-bold mb-3">Strategic Growth</h3>
                <p class="text-gray-600 text-sm">
                    Unlock global expansion opportunities and institutional scaling.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- FORM -->
<section class="bg-gray-50 py-24">
    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center mb-12">
            <h2 class="text-4xl font-black mb-4">Inquire About Accreditation</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Begin your journey toward global recognition.
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-10">

            <!-- FORM -->
            <div class="lg:col-span-2 bg-white border p-8">
                <h3 class="font-bold mb-6">INSTITUTION PROFILE</h3>

                <div class="grid md:grid-cols-2 gap-6">
                    <input class="border p-3" placeholder="Representative Name">
                    <input class="border p-3" placeholder="Email">
                    <input class="border p-3" placeholder="Phone">
                    <input class="border p-3" placeholder="Audit Date">
                </div>

                <select class="border p-3 w-full mt-6">
                    <option>Select Category</option>
                </select>

                <textarea class="border p-3 w-full mt-6" rows="4" placeholder="Institution Overview"></textarea>

                <button class="mt-6 bg-black text-white px-6 py-3 font-bold">
                    SUBMIT INQUIRY
                </button>
            </div>

            <!-- SUMMARY -->
            <div class="bg-white border-t-4 border-pink-600 p-6">
                <h4 class="font-bold mb-4">SUMMARY</h4>

                <p class="text-sm text-gray-500">No category selected</p>
                <p class="text-sm text-gray-500 mt-2">No timeline selected</p>

                <div class="mt-6 text-xs text-gray-500 uppercase">
                    GESTAAC Private Authority Notice
                </div>
            </div>

        </div>
    </div>
</section>

@endsection