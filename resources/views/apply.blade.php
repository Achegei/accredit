@extends('layouts.app')

@section('Title', 'Apply for Accreditation')

@section('content')
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

            <!-- FORM CARD -->
            <div class="lg:col-span-2 bg-white p-10 border border-gray-100 shadow-xl shadow-gray-200/40">

                <div class="mb-8">
                    <h3 class="text-3xl font-black text-[#1a1e26] uppercase tracking-tight">
                        Accreditation Inquiry
                    </h3>
                    <p class="text-xs text-gray-500 mt-2">
                        Submit your institutional profile for assessment. Response within 48 business hours.
                    </p>
                </div>

                <form action="{{ route('applications.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Row 1 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-[#1a1e26] mb-2">
                                Registrar Name
                            </label>
                            <input type="text" name="contact_person"
                                class="w-full bg-[#f9fafb] border border-gray-200 p-3.5 text-sm outline-none focus:border-gray-400"
                                placeholder="Dr. Alexander Sterling">
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-[#1a1e26] mb-2">
                                Official Email
                            </label>
                            <input type="email" name="email"
                                class="w-full bg-[#f9fafb] border border-gray-200 p-3.5 text-sm outline-none focus:border-gray-400"
                                placeholder="registrar@institution.edu">
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-[#1a1e26] mb-2">
                                Institution Name
                            </label>
                            <input type="text" name="institution_name"
                                class="w-full bg-[#f9fafb] border border-gray-200 p-3.5 text-sm outline-none focus:border-gray-400"
                                placeholder="Global Institute of Tech">
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-[#1a1e26] mb-2">
                                Contact Number
                            </label>
                            <input type="text" name="phone"
                                class="w-full bg-[#f9fafb] border border-gray-200 p-3.5 text-sm outline-none focus:border-gray-400"
                                placeholder="+1 (613) 555-0199">
                        </div>
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-[#1a1e26] mb-2">
                            Category
                        </label>

                        <select name="category"
                            class="w-full bg-[#f9fafb] border border-gray-200 p-3.5 text-sm outline-none focus:border-gray-400">
                            <option value="">Select Category</option>
                            <option value="university">University</option>
                            <option value="college">College</option>
                            <option value="tveta">TVET</option>
                            <option value="training_center">Training Center</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-[#1a1e26] mb-2">
                            Institution Overview
                        </label>

                        <textarea name="description" rows="4"
                            class="w-full bg-[#f9fafb] border border-gray-200 p-3.5 text-sm outline-none focus:border-gray-400 resize-none"
                            placeholder="Brief description of your institution..."></textarea>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full bg-[#131722] text-white font-black py-4 flex items-center justify-center gap-3 text-[11px] tracking-widest uppercase hover:bg-black transition-colors">
                        Submit for Review
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </button>

                </form>
            </div>

            <!-- SUMMARY -->
            <div class="bg-white border-t-4 border-pink-600 p-6 shadow-sm">
                <h4 class="font-black mb-4 uppercase text-sm tracking-widest">Summary</h4>

                <p class="text-sm text-gray-500">No category selected</p>
                <p class="text-sm text-gray-500 mt-2">No timeline selected</p>

                <div class="mt-6 text-[10px] text-gray-400 uppercase tracking-widest">
                    GESTAAC Private Authority Notice
                </div>
            </div>

        </div>
    </div>
</section>
@endsection