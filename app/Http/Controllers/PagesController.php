<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcom()
    {
        return view('welcome');
    }

    public function accreditationPathways()
    {
        return view('accreditation-pathways');
    }

    public function theGestaacStandard()
    {
        return view('the-gestaac-standard');
    }

    public function globalRegistry()
    {
        return view('global-registry');
    }

    public function contactAuthority()
    {
        return view('contact-authority');
    }
}
