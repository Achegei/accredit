@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#f8f5f0] text-[#0f172a]">

    <!-- HEADER -->
    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

            <div>
                <h1 class="text-3xl font-black tracking-tight text-[#0f172a]">
                    Partner Dashboard
                </h1>
                <p class="text-gray-500 text-sm mt-1">
                    Institution Control Center — Manage courses, students, and certifications
                </p>
            </div>

            <div class="flex gap-3">
                <a href="#"
                   class="px-5 py-3 bg-[#0f172a] text-white font-bold text-xs uppercase rounded-md hover:bg-black transition">
                    + Add Student
                </a>

                <a href="#"
                   class="px-5 py-3 border border-gray-300 text-[#0f172a] font-bold text-xs uppercase rounded-md hover:bg-white transition">
                    Issue Certificate
                </a>
            </div>

        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">

            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                <p class="text-xs text-gray-500 uppercase tracking-widest">Students</p>
                <h2 class="text-4xl font-black mt-3 text-[#0f172a]">{{ $students }}</h2>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                <p class="text-xs text-gray-500 uppercase tracking-widest">Courses</p>
                <h2 class="text-4xl font-black mt-3 text-[#0f172a]">{{ $courses }}</h2>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                <p class="text-xs text-gray-500 uppercase tracking-widest">Certificates</p>
                <h2 class="text-4xl font-black mt-3 text-[#0f172a]">{{ $certificates }}</h2>
            </div>

        </div>

        <!-- QUICK ACTIONS -->
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                <h3 class="font-bold text-lg mb-3 text-[#0f172a]">Quick Actions</h3>

                <div class="space-y-3 text-sm text-gray-600">
                    <p>➤ Add new students to your institution</p>
                    <p>➤ Create accredited courses</p>
                    <p>➤ Issue certificates instantly</p>
                    <p>➤ Track verification status</p>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">

                <h3 class="font-bold text-lg mb-3 text-[#0f172a]">Institution Status</h3>

                <div class="flex items-center gap-3">
                    <span class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></span>
                    <p class="text-sm text-gray-700">
                        Active & Approved Institution
                    </p>
                </div>

                <p class="text-xs text-gray-500 mt-4">
                    All accreditation services are currently active
                </p>

            </div>

        </div>

    </div>

</div>

@endsection