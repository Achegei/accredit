@extends('layouts.app')

@section('content')

<section class="py-20 bg-white border-b">
    <div class="max-w-4xl mx-auto px-6">

        <span class="text-xs font-bold uppercase tracking-widest text-green-600">
            Reviewed • {{ $record['year'] }}
        </span>

        <h1 class="text-4xl md:text-5xl font-black mt-4 mb-6">
            {{ $record['title'] }}
        </h1>

        <p class="text-gray-600 text-lg leading-relaxed">
            {{ $record['content'] }}
        </p>

    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6 space-y-10">

        <div>
            <h2 class="text-xl font-bold mb-3">Overview</h2>
            <p class="text-gray-600">
                {{ $record['overview'] }}
            </p>
        </div>

        <div>
            <h2 class="text-xl font-bold mb-3">Impact</h2>
            <p class="text-gray-600">
                {{ $record['impact'] }}
            </p>
        </div>

    </div>
</section>

@endsection