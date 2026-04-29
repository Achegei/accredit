@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#06080b] font-sans selection:bg-red-500/30">

<section class="flex items-center justify-start min-h-screen bg-[#0b0e14] p-6 lg:pl-24 font-sans">
  
  <div class="w-full max-w-md bg-[#111827] border border-gray-800 p-8 rounded-sm shadow-2xl">
    
    <div class="mb-8">
      <h2 class="text-2xl font-bold text-white mb-3">Global Headquarters</h2>
      <p class="text-gray-400 text-sm leading-relaxed">
        The central authority for international accreditation and quality assurance standards, based in the heart of Canada.
      </p>
    </div>

    <div class="space-y-6">
      
      <!-- Location -->
      <div class="flex items-start gap-4">
        <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-gray-900 border border-gray-800 rounded">
          <svg class="w-5 h-5 text-[#cc5a4e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
          </svg>
        </div>
        <div>
          <h3 class="text-xs font-bold text-gray-300 uppercase tracking-widest mb-1">Location</h3>
          <p class="text-gray-400 text-sm">89 Galaxy Blvd</p>
          <p class="text-gray-400 text-sm">Toronto, ON M9W 6A4, Canada</p>
        </div>
      </div>

      <!-- Phone -->
      <div class="flex items-start gap-4">
        <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-gray-900 border border-gray-800 rounded">
          <svg class="w-5 h-5 text-[#cc5a4e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
          </svg>
        </div>
        <div>
          <h3 class="text-xs font-bold text-gray-300 uppercase tracking-widest mb-1">Direct Line</h3>
          <p class="text-gray-400 text-sm">+1 (780) 800–1824</p>
        </div>
      </div>

      <!-- Email -->
      <div class="flex items-start gap-4">
        <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-gray-900 border border-gray-800 rounded">
          <svg class="w-5 h-5 text-[#cc5a4e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
          </svg>
        </div>
        <div>
          <h3 class="text-xs font-bold text-gray-300 uppercase tracking-widest mb-1">Registry Inquiry</h3>
          <p class="text-gray-400 text-sm">info@gestaac.ca</p>
        </div>
      </div>

      <!-- Hours -->
      <div class="flex items-start gap-4">
        <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-gray-900 border border-gray-800 rounded">
          <svg class="w-5 h-5 text-[#cc5a4e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <div>
          <h3 class="text-xs font-bold text-gray-300 uppercase tracking-widest mb-1">Operational Hours</h3>
          <p class="text-gray-400 text-sm">Monday - Friday: 09:00 AM - 17:00 PM EST</p>
          <p class="text-gray-400 text-sm">Saturday : 10:00 AM - 14:00 PM EST</p>
          <p class="text-gray-400 text-sm">Sunday  : Closed</p>
          <p class="text-gray-400 text-xs mt-1 text-gray-500 italic">Registry Access: 24/7 Digital</p>
        </div>
      </div>

    </div>

    <button class="w-full mt-10 bg-[#cc5a4e] hover:bg-[#b34e44] text-white font-semibold py-3 px-4 rounded transition-colors flex items-center justify-center gap-2">
      <svg class="w-4 h-4 transform rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
      </svg>
      Contact Authority
    </button>

  </div>
</section>

   <section class="bg-[#f8f9fb] py-20 px-6 flex justify-center items-center font-sans">
    <div class="max-w-7xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
        
        <div class="flex flex-col space-y-10">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-100 border-l-2 border-red-600 self-start">
                <span class="w-1.5 h-1.5 bg-red-600 rounded-full animate-pulse"></span>
                <span class="text-[10px] tracking-[0.2em] font-black uppercase text-gray-900">Global Standards Authority</span>
            </div>

            <h2 class="text-6xl md:text-7xl font-[900] text-[#1a1e26] leading-[0.9] tracking-tighter">
                Secure your <br> 
                <span class="text-[#d35f55]">Global Status.</span>
            </h2>

            <p class="text-lg text-gray-600 max-w-md leading-relaxed font-medium">
                Initiate the formal accreditation process with GESTAAC. Our board of examiners provides rigorous quality assurance for institutions worldwide.
            </p>

            <div class="space-y-6 pt-8 border-t border-gray-200">
                <div class="flex items-center gap-5">
                    <div class="w-12 h-12 bg-white border border-gray-100 flex items-center justify-center shadow-sm">
                        <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-[9px] font-black text-gray-400 tracking-widest uppercase">Official Correspondence</span>
                        <span class="text-md font-bold text-gray-900">info@gestaac.ca</span>
                    </div>
                </div>

                <div class="flex items-center gap-5">
                    <div class="w-12 h-12 bg-white border border-gray-100 flex items-center justify-center shadow-sm">
                        <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-[9px] font-black text-gray-400 tracking-widest uppercase">Authority Hotline</span>
                        <span class="text-md font-bold text-gray-900">+1 780-800-1824</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-10 border border-gray-100 shadow-xl shadow-gray-200/40">
            <div class="mb-8">
                <h3 class="text-3xl font-black text-[#1a1e26] uppercase tracking-tight">Accreditation Inquiry</h3>
                <p class="text-xs text-gray-500 mt-2">Submit your institutional profile for assessment. Response within 48 business hours.</p>
            </div>

            <form action="{{ route('applications.store') }}" method="POST" class="space-y-6">
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <div>
            <label class="block text-[10px] font-black text-[#1a1e26] tracking-widest uppercase mb-2">
                Registrar Name
            </label>
            <input
                type="text"
                name="contact_person"
                placeholder="Dr. Alexander Sterling"
                class="w-full bg-[#f9fafb] border border-gray-200 p-3.5 text-sm outline-none focus:border-[#cc5a4e] focus:ring-1 focus:ring-[#cc5a4e]/30 transition"
            >
        </div>

        <div>
            <label class="block text-[10px] font-black text-[#1a1e26] tracking-widest uppercase mb-2">
                Official Email
            </label>
            <input
                type="email"
                name="email"
                placeholder="registrar@institution.edu"
                class="w-full bg-[#f9fafb] border border-gray-200 p-3.5 text-sm outline-none focus:border-[#cc5a4e] focus:ring-1 focus:ring-[#cc5a4e]/30 transition"
            >
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <div>
            <label class="block text-[10px] font-black text-[#1a1e26] tracking-widest uppercase mb-2">
                Institution Name
            </label>
            <input
                type="text"
                name="institution_name"
                placeholder="Global Institute of Tech"
                class="w-full bg-[#f9fafb] border border-gray-200 p-3.5 text-sm outline-none focus:border-[#cc5a4e] focus:ring-1 focus:ring-[#cc5a4e]/30 transition"
            >
        </div>

        <div>
            <label class="block text-[10px] font-black text-[#1a1e26] tracking-widest uppercase mb-2">
                Contact Number
            </label>
            <input
                type="text"
                name="phone"
                placeholder="+1 (613) 555-0199"
                class="w-full bg-[#f9fafb] border border-gray-200 p-3.5 text-sm outline-none focus:border-[#cc5a4e] focus:ring-1 focus:ring-[#cc5a4e]/30 transition"
            >
        </div>

    </div>

    <div>
        <label class="block text-[10px] font-black text-[#1a1e26] tracking-widest uppercase mb-2">
            Category
        </label>

        <select
            name="category"
            class="w-full bg-[#f9fafb] border border-gray-200 p-3.5 text-sm outline-none focus:border-[#cc5a4e] focus:ring-1 focus:ring-[#cc5a4e]/30 transition"
        >
            <option value="">Select Category</option>
            <option value="university">University</option>
            <option value="college">College</option>
            <option value="tveta">TVET</option>
            <option value="training_center">Training Center</option>
        </select>
    </div>

    <!-- ✅ DESCRIPTION ADDED (MISSING BEFORE) -->
    <div>
        <label class="block text-[10px] font-black text-[#1a1e26] tracking-widest uppercase mb-2">
            Institution Overview
        </label>

        <textarea
            name="description"
            rows="4"
            placeholder="Brief description of your institution, programs, and accreditation goals..."
            class="w-full bg-[#f9fafb] border border-gray-200 p-3.5 text-sm outline-none focus:border-[#cc5a4e] focus:ring-1 focus:ring-[#cc5a4e]/30 transition resize-none"
        ></textarea>
    </div>

    <button
        type="submit"
        class="w-full bg-[#131722] text-white font-black py-4 flex items-center justify-center gap-3 text-[11px] tracking-widest uppercase hover:bg-black transition-colors"
    >
        Submit for Review
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
            <path d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
    </button>

</form>
        </div>

    </div>
</section>

<div class="min-h-screen bg-[#06080b] font-sans selection:bg-red-500/30">

    {{-- KEEP EVERYTHING ABOVE UNCHANGED --}}

    <!-- ================= LIGHT / CREAM SECTION START ================= -->
    <div class="bg-[#f6f1ea]">

        <section class="max-w-7xl mx-auto p-6 font-sans text-slate-900">
            <div class="flex flex-col md:flex-row md:items-end justify-between border-b border-slate-200 pb-8 mb-8">
                <div class="max-w-2xl">
                    <h2 class="text-5xl font-extrabold tracking-tight mb-4 text-slate-900">
                        Latest Standards Updates
                    </h2>
                    <p class="text-lg text-slate-800">
                        Official directives, regulatory changes, and quality assurance bulletins from the GESTAAC Authority.
                    </p>
                </div>
                <div class="mt-6 md:mt-0">
                    <button class="border border-slate-900 px-6 py-2 text-sm font-medium hover:bg-white transition-colors">
                        Access Full Registry
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- FEATURE CARD (FIXED DARK OVERLAY ISSUE) -->
                <div class="lg:col-span-2 relative group overflow-hidden rounded-sm bg-[#1a1e26] h-[500px]">
                    <img src="https://images.unsplash.com/photo-1526772662000-3f88f10405ff?auto=format&fit=crop&q=80"
                         class="absolute inset-0 w-full h-full object-cover opacity-40">

                    <div class="absolute inset-0 p-10 flex flex-col justify-center text-white">
                        <div class="mb-8">
                            <div class="flex flex-col items-center w-fit">
                                <div class="w-12 h-12 border border-white/70 rounded-full flex items-center justify-center mb-2">
                                    🌐
                                </div>
                                <span class="tracking-widest font-semibold">GESTAAC</span>
                            </div>
                        </div>

                        <span class="bg-red-600 text-white text-[10px] font-bold px-2 py-1 uppercase tracking-wider w-fit mb-4">
                            International Accreditation
                        </span>

                        <h3 class="text-4xl md:text-5xl font-bold leading-tight mb-6 max-w-xl text-blue-300">
                            Navigating Multi Country Accreditation with GESTAAC
                        </h3>

                        <p class="text-white/90 text-lg max-w-lg">
                            Learn how institutions can efficiently manage cross-border accreditation processes, ensure compliance with diverse regulations...
                        </p>
                    </div>
                </div>

                <!-- SIDE CARD -->
                <div class="bg-white border border-slate-200 shadow-sm flex flex-col">
                    <div class="h-64 overflow-hidden">
                        <img src="{{ asset('images/trainer.webp') }}" class="w-full h-full object-cover">
                    </div>

                    <div class="p-6 flex-grow flex flex-col">
                        <span class="text-[10px] font-bold tracking-widest text-slate-500 uppercase border border-slate-200 w-fit px-2 py-1 mb-4">
                            Accreditation
                        </span>

                        <h4 class="text-2xl font-bold mb-4 text-slate-900">
                            Trainer Accreditation Elevates Professional Growth and Marketability
                        </h4>

                        <p class="text-slate-600 text-sm mb-8">
                            Explore how becoming an accredited trainer through GESTAAC enhances credibility, opens new career opportunities...
                        </p>

                        <div class="mt-auto pt-4 border-t border-slate-100 flex justify-between items-center">
                            <span class="text-xs font-bold text-slate-900">2026-04-22</span>
                            <a href="#" class="text-[10px] font-black uppercase hover:underline">View Directive</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- GRID ARTICLES -->
        <section class="max-w-7xl mx-auto p-6 font-sans text-slate-900">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- CARD -->
                <div class="bg-white border border-slate-200 shadow-sm flex flex-col">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <span class="text-[10px] font-bold tracking-widest text-slate-500 uppercase border border-slate-200 w-fit px-2 py-1 mb-4">
                            Accreditation
                        </span>
                        <h4 class="text-2xl font-bold mb-4">
                            Corporate Training Accreditation Enhances ROI and Employee Performance
                        </h4>
                        <p class="text-slate-600 text-sm mb-8">
                            Learn how corporate training accreditation drives measurable ROI and improves workforce skills...
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex justify-between">
                            <span class="text-xs font-bold">2026-04-22</span>
                            <a href="#" class="text-[10px] font-black uppercase hover:underline">View Directive</a>
                        </div>
                    </div>
                </div>

                <!-- CARD -->
                <div class="bg-white border border-slate-200 shadow-sm flex flex-col">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?auto=format&fit=crop&q=80"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <span class="text-[10px] font-bold tracking-widest text-slate-500 uppercase border border-slate-200 w-fit px-2 py-1 mb-4">
                            Accreditation
                        </span>
                        <h4 class="text-2xl font-bold mb-4 text-red-600">
                            Benefits of Accreditation for Online and E Learning Platforms
                        </h4>
                        <p class="text-slate-600 text-sm mb-8">
                            Discover how accreditation boosts credibility and learner trust for online platforms...
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex justify-between">
                            <span class="text-xs font-bold">2026-04-22</span>
                            <a href="#" class="text-[10px] font-black uppercase hover:underline">View Directive</a>
                        </div>
                    </div>
                </div>

                <!-- CARD -->
                <div class="bg-white border border-slate-200 shadow-sm flex flex-col">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&q=80"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <span class="text-[10px] font-bold tracking-widest text-slate-500 uppercase border border-slate-200 w-fit px-2 py-1 mb-4">
                            Professional Training
                        </span>
                        <h4 class="text-2xl font-bold mb-4">
                            Step by Step Guide to Achieving Skills and TVET Accreditation
                        </h4>
                        <p class="text-slate-600 text-sm mb-8">
                            A practical roadmap for vocational schools to secure accreditation through GESTAAC...
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex justify-between">
                            <span class="text-xs font-bold">2026-04-22</span>
                            <a href="#" class="text-[10px] font-black uppercase hover:underline">View Directive</a>
                        </div>
                    </div>
                </div>

                <!-- CARD -->
                <div class="bg-white border border-slate-200 shadow-sm flex flex-col">
                    <div class="h-64 overflow-hidden">
                        <img src="{{ asset('images/university-campus.webp') }}"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <span class="text-[10px] font-bold tracking-widest text-slate-500 uppercase border border-slate-200 w-fit px-2 py-1 mb-4">
                            Accreditation
                        </span>
                        <h4 class="text-2xl font-bold mb-4">
                            Why International Accreditation Matters for Education Institutions
                        </h4>
                        <p class="text-slate-600 text-sm mb-8">
                            Explore the strategic advantages of international accreditation and how it elevates institutional reputation...
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex justify-between">
                            <span class="text-xs font-bold">2026-04-22</span>
                            <a href="#" class="text-[10px] font-black uppercase hover:underline">View Directive</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
    <!-- ================= LIGHT SECTION END ================= -->

</div>

<style>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
input::placeholder {
    color: #4b5563;
    font-weight: 500;
}
</style>

@endsection