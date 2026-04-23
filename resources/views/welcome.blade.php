@extends('layouts.app')

@section('content')
<style>
    .hero-wrapper {
        position: relative;
        background: #fff;
        min-height: 80vh;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    /* THE ARMILLARY GLOBE AREA */
    .hero-visual {
        position: absolute;
        top: 0;
        right: 0;
        width: 60%;
        height: 100%;
        background-image: url('/images/globe.png'); /* REPLACE THIS PATH */
        background-size: cover;
        background-position: center right;
        z-index: 1;
    }

    /* The Fade Effect from your image */
    .hero-visual::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to right, 
            rgba(255,255,255,1) 0%, 
            rgba(255,255,255,0.9) 10%, 
            rgba(255,255,255,0) 50%);
        z-index: 2;
    }

    /* THE WATERMARK BEHIND THE GLOBE */
    .hero-watermark {
        position: absolute;
        bottom: -20px;
        right: 20px;
        font-size: 10rem;
        font-weight: 900;
        color: rgba(0, 0, 0, 0.04);
        letter-spacing: 5px;
        z-index: 2;
        pointer-events: none;
    }

    /* TEXT STYLES */
    .hero-content { position: relative; z-index: 10; max-width: 700px; }
    .hero-title { font-size: 5.5rem; font-weight: 900; line-height: 0.85; letter-spacing: -4px; color: #0b0f19; margin-bottom: 30px; }
    .text-gradient {
        background: linear-gradient(to bottom, #101828 40%, #2563eb 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* BUTTONS */
    .btn-gest-dark { background: #0b0f19; color: #fff; padding: 18px 35px; font-weight: 700; border-radius: 0; text-decoration: none; display: inline-block; box-shadow: 5px 5px 15px rgba(0,0,0,0.1); }
    .btn-gest-outline { border: 1px solid #000; color: #000; padding: 18px 35px; font-weight: 700; border-radius: 0; text-decoration: none; display: inline-block; }
</style>

<section class="hero-wrapper">
    <div class="hero-visual"></div>
    <div class="hero-watermark">GESTAAC</div>
    
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                ELEVATING<br>GLOBAL<br>
                <span class="text-gradient">EDUCATIONAL STANDARDS</span>
            </h1>
            <p class="text-muted mb-5" style="max-width: 500px; font-size: 1.1rem;">
                The Global Education, Skills & Training Accreditation Authority Canada (GESTAAC) provides world-class quality assurance and certification for elite institutions.
            </p>
            <div class="d-flex gap-3">
                <a href="#" class="btn-gest-dark">START ASSESSMENT &nbsp; →</a>
                <a href="#" class="btn-gest-outline">VIEW STANDARDS</a>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-5">
        <h2 class="fw-black mb-2 h1">THE GESTAAC FRAMEWORK</h2>
        <p class="text-muted mb-5 col-lg-6">Our multi-tiered accreditation system ensures that educational providers meet the rigorous standards of the Global Education, Skills & Training Accreditation Authority.</p>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="framework-card">
                    <span class="framework-tag">GEST-01</span>
                    <div class="framework-icon">🚗</div>
                    <h3>Academic Institutions</h3>
                    <p class="small text-muted mb-4">Comprehensive accreditation for universities and colleges maintaining global educational standards.</p>
                    <ul class="list-gest">
                        <li>Institutional Review</li>
                        <li>Quality Assurance</li>
                        <li>Global Recognition</li>
                    </ul>
                    <a href="#" class="btn btn-link text-dark fw-bold mt-3 p-0 text-decoration-none">View Standards →</a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="framework-card">
                    <span class="framework-tag">GEST-02</span>
                    <div class="framework-icon">🚘</div>
                    <h3>TVET & Skills</h3>
                    <p class="small text-muted mb-4">Specialized certification for vocational training centers and technical skill development hubs.</p>
                    <ul class="list-gest">
                        <li>Competency Based</li>
                        <li>Industry Aligned</li>
                        <li>Practical Assessment</li>
                    </ul>
                    <a href="#" class="btn btn-link text-dark fw-bold mt-3 p-0 text-decoration-none">View Standards →</a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="framework-card border-primary" style="background: #f0f7ff;">
                    <span class="framework-tag">GEST-03</span>
                    <div class="framework-icon bg-white">💎</div>
                    <h3>Professional Training</h3>
                    <p class="small text-muted mb-4">Validation for technical training providers delivering high-impact professional development.</p>
                    <ul class="list-gest">
                        <li>Expert Faculty</li>
                        <li>Curriculum Audit</li>
                        <li>Career Impact</li>
                    </ul>
                    <a href="#" class="btn btn-link text-dark fw-bold mt-3 p-0 text-decoration-none">View Standards →</a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="framework-card">
                    <span class="framework-tag">GEST-04</span>
                    <div class="framework-icon">🚚</div>
                    <h3>E-Learning Platforms</h3>
                    <p class="small text-muted mb-4">Digital-first accreditation for online education providers and virtual learning environments.</p>
                    <ul class="list-gest">
                        <li>LMS Verification</li>
                        <li>Content Integrity</li>
                        <li>Remote Standards</li>
                    </ul>
                    <a href="#" class="btn btn-link text-dark fw-bold mt-3 p-0 text-decoration-none">View Standards →</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-5 border-bottom">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <h2 style="font-size: 3.5rem; color: #cbd5e1; font-weight: 700;">850+</h2>
                <div style="height: 3px; width: 40px; background: #b35a4f; margin: 10px auto;"></div>
            </div>
            <div class="col-md-4">
                <h2 style="font-size: 3.5rem; color: #cbd5e1; font-weight: 700;">1200+</h2>
                <div style="height: 3px; width: 40px; background: #b35a4f; margin: 10px auto;"></div>
            </div>
            <div class="col-md-4">
                <h2 style="font-size: 3.5rem; color: #cbd5e1; font-weight: 700;">42</h2>
                <div style="height: 3px; width: 40px; background: #b35a4f; margin: 10px auto;"></div>
            </div>
        </div>
        <div class="text-center mt-5">
            <p class="small fw-bold text-uppercase opacity-50 mb-4">Recognized by Global Authorities</p>
            <div class="d-flex justify-content-center gap-5 fw-bold h4 opacity-25">
                <span>IAF</span> <span>GQAN</span> <span>CSC</span> <span>VTA</span> <span>HER</span>
            </div>
        </div>
    </div>
</section>

<section class="testimonial-section center text-center py-5">
    <div class="container">
        <h2 class="testimonial-text">"GESTAAC accreditation has elevated our institution's global standing, providing a framework of excellence that resonates with international students."</h2>
        <div class="avatar-circle">Avatar</div>
        <h5 class="mb-0 fw-bold">DR. ALISTAIR VANCE</h5>
        <p class="small text-uppercase text-muted">Director of Global Education, Toronto</p>
        <div class="mt-4 d-flex justify-content-center gap-4 text-muted">
            <span>← PREV</span> | <span>NEXT →</span>
        </div>
    </div>
</section>

<section class="py-5" style="background: #05070a; color: white;">
    <div class="container py-5 text-center">
        <h2 class="display-4 fw-bold mb-5">Elevate Your Institution to Global Standards.</h2>
        <div class="d-flex justify-content-center align-items-center gap-4">
            <a href="#" class="text-white text-uppercase small fw-bold opacity-50">Download Standards</a>
            <a href="#" class="btn px-5 py-3 rounded-0" style="background: #b35a4f; color: white; font-weight: 700;">Begin Application</a>
            <a href="#" class="text-white text-uppercase small fw-bold opacity-50">Contact Authority</a>
        </div>
    </div>
</section>
@endsection