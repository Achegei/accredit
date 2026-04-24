@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- STATS GRID -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- Applications -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">

        <p class="text-xs text-gray-400 uppercase tracking-widest">Applications</p>

        <h2 class="text-4xl font-black mt-3 text-indigo-600">
            {{ $applications }}
        </h2>

        <p class="text-xs text-gray-500 mt-2">
            Total submissions received
        </p>
    </div>

    <!-- Institutions -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">

        <p class="text-xs text-gray-400 uppercase tracking-widest">Institutions</p>

        <h2 class="text-4xl font-black mt-3 text-emerald-600">
            {{ $institutions }}
        </h2>

        <p class="text-xs text-gray-500 mt-2">
            Approved & active institutions
        </p>
    </div>

    <!-- Partners -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">

        <p class="text-xs text-gray-400 uppercase tracking-widest">Partners</p>

        <h2 class="text-4xl font-black mt-3 text-orange-500">
            {{ $partners }}
        </h2>

        <p class="text-xs text-gray-500 mt-2">
            Users with dashboard access
        </p>
    </div>

</div>


<!-- SECOND ROW -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

    <!-- SYSTEM STATUS -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">

        <h3 class="font-bold text-lg mb-4">System Status</h3>

        <div class="flex items-center gap-3 mb-3">
            <span class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></span>
            <p class="text-sm text-gray-600">All services operational</p>
        </div>

        <p class="text-xs text-gray-400">
            No incidents reported. Everything running smoothly.
        </p>
    </div>

    <!-- QUICK ACTIONS -->
    <div class="bg-gradient-to-br from-indigo-600 to-indigo-500 text-white rounded-2xl p-6 shadow-md">

        <h3 class="font-bold text-lg mb-4">Quick Actions</h3>

        <div class="space-y-3 text-sm">

            <a href="/admin/applications"
               class="block bg-white/10 px-4 py-3 rounded-lg hover:bg-white/20 transition">
                Review Applications
            </a>

            <a href="/admin/institutions"
               class="block bg-white/10 px-4 py-3 rounded-lg hover:bg-white/20 transition">
                Manage Institutions
            </a>

            <a href="/admin/partners"
               class="block bg-white/10 px-4 py-3 rounded-lg hover:bg-white/20 transition">
                View Partners
            </a>

        </div>
    </div>

</div>

@endsection