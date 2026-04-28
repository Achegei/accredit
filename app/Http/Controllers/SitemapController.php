<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
{
    $urls = [
        url('/'),
        url('/accreditation-pathways'),
        url('/the-gestaac-standard'),
        url('/global-registry'),
        url('/contact-authority'),
        url('/apply'),
        url('/verify'),
    ];

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    foreach ($urls as $url) {
        $xml .= '
        <url>
            <loc>' . e($url) . '</loc>
            <lastmod>' . date('Y-m-d') . '</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>';
    }

    $xml .= '</urlset>';

    return response($xml, 200)
        ->header('Content-Type', 'application/xml');
}
}
