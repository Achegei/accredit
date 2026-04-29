<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistryController extends Controller
{
    public function show($slug)
{
    $records = [

    'multi-country-accreditation' => [
        'title' => 'Navigating Multi Country Accreditation',
        'year' => '2024',
        'content' => 'Multi-country accreditation enables institutions to operate across jurisdictions with unified quality assurance systems.',
        
        'overview' => 'Multi-country accreditation establishes harmonized standards across multiple jurisdictions, allowing institutions to maintain consistent quality, compliance, and recognition internationally.',

        'impact' => 'It strengthens global credibility, improves regulatory alignment, and enhances institutional mobility across borders.'
    ],

    'trainer-accreditation' => [
        'title' => 'Trainer Accreditation Elevates Professional Growth',
        'year' => '2024',
        'content' => 'Trainer accreditation ensures global teaching standards are met across professional learning environments.',

        'overview' => 'Trainer accreditation validates instructional competence, ensuring trainers meet internationally recognized pedagogical and technical benchmarks.',

        'impact' => 'It improves training quality, enhances career progression, and increases trust in professional development systems.'
    ],

    'corporate-training-accreditation' => [
        'title' => 'Corporate Training Accreditation Enhances ROI',
        'year' => '2024',
        'content' => 'Corporate training accreditation improves organizational learning systems and performance outcomes.',

        'overview' => 'This accreditation evaluates internal corporate learning frameworks to ensure alignment with measurable business objectives.',

        'impact' => 'It increases ROI on training investment, improves workforce productivity, and standardizes internal learning systems.'
    ],

    'online-learning-accreditation' => [
        'title' => 'Accreditation for Online Learning Platforms',
        'year' => '2024',
        'content' => 'Digital learning platforms are assessed for content integrity and learner experience quality.',

        'overview' => 'This ensures e-learning systems meet global digital education standards, including accessibility and engagement.',

        'impact' => 'It builds trust in online education and improves global recognition of digital certifications.'
    ],

    'tvet-accreditation' => [
        'title' => 'Guide to Skills & TVET Accreditation',
        'year' => '2024',
        'content' => 'TVET accreditation ensures vocational programs meet industry-aligned competency standards.',

        'overview' => 'Focuses on aligning technical education with real-world labor market demands and skills frameworks.',

        'impact' => 'Improves employability, industry readiness, and global competitiveness of graduates.'
    ],

    'international-accreditation' => [
        'title' => 'Why International Accreditation Matters',
        'year' => '2024',
        'content' => 'International accreditation builds global trust and recognition for institutions.',

        'overview' => 'It establishes a universal benchmark for quality assurance across education systems worldwide.',

        'impact' => 'Enhances reputation, global partnerships, and cross-border academic recognition.'
    ],
];

    if (!isset($records[$slug])) {
        abort(404);
    }

    return view('registry.show', [
        'record' => $records[$slug]
    ]);
}
}
