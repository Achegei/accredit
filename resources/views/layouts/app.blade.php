<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GESTAAC | Global Educational Standards')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --gest-navy: #0a0e14;
            --gest-blue-text: #1e293b;
            --gest-accent: #c05a4e; /* The reddish-brown button color */
            --gest-border: #e2e8f0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
            color: var(--gest-blue-text);
            overflow-x: hidden;
        }

        /* Navbar Styling */
        .navbar {
            padding: 1.5rem 0;
            background: white;
        }
        .navbar-brand {
            font-weight: 900;
            letter-spacing: -1px;
            font-size: 1.5rem;
            color: #000 !important;
        }
        .nav-link {
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 600;
            color: #000 !important;
            margin: 0 15px;
            letter-spacing: 0.5px;
        }
        .btn-apply {
            background: var(--gest-navy);
            color: white !important;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 10px 25px;
            border-radius: 0;
            text-transform: uppercase;
        }

        /* Footer Styling */
        footer {
            background-color: #05070a;
            color: #94a3b8;
            padding: 80px 0 30px 0;
            font-size: 0.9rem;
        }
        .footer-logo {
            color: white;
            font-weight: 900;
            font-size: 1.5rem;
            margin-bottom: 20px;
            display: block;
        }
        .footer-heading {
            color: white;
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 1rem;
        }
        .footer-link {
            color: #94a3b8;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            transition: 0.3s;
        }
        .footer-link:hover { color: white; }
        .social-icons a {
            color: white;
            margin-right: 15px;
            font-size: 1.2rem;
            opacity: 0.7;
        }
        .bottom-bar {
            border-top: 1px solid #1e293b;
            margin-top: 50px;
            padding-top: 20px;
            font-size: 0.8rem;
        }

        /* Custom Button */
        .btn-gest-accent {
            background-color: #b35a4f;
            color: white;
            border-radius: 0;
            padding: 15px 30px;
            font-weight: 600;
            border: none;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">GES&TAAC(</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="#">Accreditation Pathways</a></li>
                <li class="nav-item"><a class="nav-link" href="#">The GESTAAC Standard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Global Registry</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact Authority</a></li>
            </ul>
            <div class="d-flex align-items-center">
                <a href="#" class="nav-link me-3" style="font-size: 0.7rem;">Member Login</a>
                <a href="#" class="btn btn-apply">Apply Now</a>
            </div>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <span class="footer-logo">GES&TAAC(</span>
                <p style="max-width: 300px;">Assess, approve, certify, and monitor institutions and training programs across education, skills, and professional sectors globally.</p>
            </div>
            <div class="col-lg-3 col-md-4 mb-4">
                <h6 class="footer-heading">Accreditation Categories</h6>
                <a href="#" class="footer-link">Education Institutions Accreditation</a>
                <a href="#" class="footer-link">Skills & TVET (Vocational Training)</a>
                <a href="#" class="footer-link">Professional & Technical Training</a>
                <a href="#" class="footer-link">Short Courses & Certification Programs</a>
                <a href="#" class="footer-link">Corporate & Industry Training</a>
                <a href="#" class="footer-link">Trainers & Instructors</a>
                <a href="#" class="footer-link">Online & E-Learning Platforms</a>
                <a href="#" class="footer-link">Specialized Programs</a>
            </div>
            <div class="col-lg-2 col-md-4 mb-4">
                <h6 class="footer-heading">Quick Links</h6>
                <a href="#" class="footer-link">Accreditation Pathways</a>
                <a href="#" class="footer-link">The GESTAAC Standard</a>
                <a href="#" class="footer-link">Global Registry</a>
                <a href="#" class="footer-link">Contact Authority</a>
            </div>
            <div class="col-lg-3 col-md-4 mb-4">
                <h6 class="footer-heading">Canadian Headquarters</h6>
                <p class="mb-1">📍 123 Main St, Springfield, Canada</p>
                <p class="mb-1">📞 +1 555-123-4567</p>
                <p class="mb-3">✉️ info@gestaac.ca</p>
                <div class="social-icons">
                    <a href="#">𝕏</a> <a href="#">in</a> <a href="#">f</a>
                </div>
            </div>
        </div>
        <div class="bottom-bar d-flex justify-content-between">
            <p>© {{ date('2026') }} Global Education, Skills & Training Accreditation Authority Canada (GESTAAC). All rights reserved.</p>
            <div>
                <a href="#" class="footer-link d-inline me-3">Privacy Policy</a>
                <a href="#" class="footer-link d-inline">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>