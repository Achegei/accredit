@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#0a0c10] text-white font-sans selection:bg-red-500/30">

    {{-- HERO --}}
    <section class="relative pt-32 pb-24 px-6 overflow-hidden">
        <div class="absolute inset-0 flex items-center justify-center opacity-[0.04] pointer-events-none select-none">
            <h1 class="text-[14rem] font-black tracking-tighter uppercase">Verification</h1>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto text-center">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 mb-8 border border-green-500/20 bg-green-500/10 rounded-sm text-[10px] tracking-[0.2em] text-green-400 uppercase font-bold">
                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                Status: Registry Online
            </div>

            <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-12 leading-relaxed">
                Access the GESTAAC Global Registry to verify institutional accreditation, professional certifications, and trainer credentials in real-time.
            </p>

            <div class="relative p-[1px] bg-gradient-to-br from-red-500/20 via-transparent to-red-500/20 rounded-sm">
                <div class="bg-[#0f1218] border border-gray-800/50 p-10 shadow-2xl">
                    
                <form onsubmit="event.preventDefault(); goVerify();"
      class="flex flex-col md:flex-row gap-0 border-b border-gray-700/50 pb-2 mb-8">

    <!-- INPUT -->
    <div class="flex items-center flex-grow py-4 px-2">

        <svg class="w-6 h-6 text-gray-500 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>

        <input
            id="verifyInput"
            type="text"
            placeholder="Enter Certificate ID, Institution Name, or Course..."
            class="bg-transparent border-none focus:ring-0 text-gray-200 w-full placeholder-gray-600 text-lg"
            required
        >

    </div>

    <!-- BUTTON -->
    <button type="submit"
        class="bg-white text-[#0a0c10] font-black px-12 py-5 text-xs tracking-widest hover:bg-gray-200 transition uppercase">
        Scan / Verify
    </button>

</form>

                    <div class="flex flex-wrap items-center gap-6 text-[10px] tracking-[0.15em] uppercase font-bold">
                        <span class="text-gray-500">Registry Category</span>
                        <div class="flex bg-[#161a22] rounded-sm p-1 gap-1">
                            <button class="bg-[#d35f55] px-5 py-2.5 text-white">All Records</button>
                            <button class="px-5 py-2.5 text-gray-400 hover:text-white hover:bg-gray-800">Institutions</button>
                            <button class="px-5 py-2.5 text-gray-400 hover:text-white hover:bg-gray-800">Trainers</button>
                            <button class="px-5 py-2.5 text-gray-400 hover:text-white hover:bg-gray-800">Programs</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- LIGHT SECTION --}}
    <section class="bg-[#f7f5f2] py-24 px-6 text-slate-900">
        <div class="max-w-7xl mx-auto">

            <h2 class="text-6xl font-black mb-6 leading-none tracking-tight">
                GLOBAL <span class="text-[#d35f55]">REGISTRY</span>
            </h2>

            <p class="text-slate-600 text-lg max-w-3xl mb-16 leading-relaxed">
                Access the official GESTAAC registry. Verify institutions, programs, and professionals committed to global excellence and compliance.
            </p>

            @php
                $records = [
                    ['title' => 'Navigating Multi Country Accreditation', 'year' => '2024', 'image' => 'registry-1.webp'],
                    ['title' => 'Trainer Accreditation Elevates Professional Growth', 'year' => '2024', 'image' => 'registry-2.webp'],
                    ['title' => 'Corporate Training Accreditation Enhances ROI', 'year' => '2024', 'image' => 'registry-3.webp'],
                    ['title' => 'Accreditation for Online Learning Platforms', 'year' => '2024', 'image' => 'registry-4.webp'],
                    ['title' => 'Guide to Skills & TVET Accreditation', 'year' => '2024', 'image' => 'registry-5.webp'],
                    ['title' => 'Why International Accreditation Matters', 'year' => '2024', 'image' => 'registry-6.webp'],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach($records as $item)
                <div class="group bg-white border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden">

                    {{-- IMAGE --}}
                    <div class="relative overflow-hidden aspect-[4/3]">
                        <img src="{{ asset('images/'.$item['image']) }}"
                             class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700"
                             alt="{{ $item['title'] }}">

                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition"></div>

                        <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>

                    {{-- CONTENT --}}
                    <div class="p-6 flex flex-col flex-grow">

                        <div class="flex justify-between items-center mb-4">
                            <span class="text-[10px] font-black tracking-widest text-blue-600 uppercase">
                                Accredited
                            </span>
                            <span class="text-[10px] text-slate-400">
                                {{ $item['year'] }}
                            </span>
                        </div>

                        <h3 class="text-lg font-bold mb-3 leading-tight group-hover:text-[#d35f55] transition">
                            {{ $item['title'] }}
                        </h3>

                        <p class="text-sm text-slate-500 leading-relaxed mb-6">
                            Explore how global accreditation enhances institutional credibility and international recognition.
                        </p>

                        <div class="mt-auto pt-4 border-t border-slate-100 flex justify-between items-center">
                            <span class="text-xs font-bold">View Record</span>
                            <span class="text-xs">→</span>
                        </div>

                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </section>

</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
    body { font-family: 'Inter', sans-serif; }
</style>
<script>
function goVerify() {

    let query = document.getElementById('verifyInput').value.trim();

    if (!query) return;

    window.location.href = `/verify/search?query=${encodeURIComponent(query)}`;
}
</script>

@endsection