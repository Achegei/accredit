<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Services\VerificationService;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    // show form
    public function form()
    {
        return view('verify.index');
    }

    // handle search + result
    public function search(Request $request, VerificationService $service)
{
    $query = $request->input('query');

    $result = $service->verify($query, $request);

    return view('verify.result', compact('result'));
}
}