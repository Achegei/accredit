<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Accreditation Application</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f5f7fb;
            margin:0;
            padding:40px;
        }

        .container{
            max-width:900px;
            margin:auto;
            background:white;
            padding:40px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.05);
        }

        h1{
            margin-bottom:10px;
        }

        p{
            color:#666;
        }

        .section{
            margin-top:40px;
        }

        .section h2{
            margin-bottom:20px;
            border-bottom:1px solid #eee;
            padding-bottom:10px;
        }

        .grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:20px;
        }

        .field{
            display:flex;
            flex-direction:column;
        }

        label{
            margin-bottom:8px;
            font-weight:bold;
        }

        input,
        select,
        textarea{
            padding:12px;
            border:1px solid #ddd;
            border-radius:6px;
            font-size:14px;
        }

        textarea{
            min-height:120px;
        }

        .full{
            grid-column:1 / -1;
        }

        .btn{
            background:#0d6efd;
            color:white;
            border:none;
            padding:15px 25px;
            border-radius:6px;
            cursor:pointer;
            font-size:16px;
        }

        .btn:hover{
            background:#0b5ed7;
        }

        .success{
            background:#d1e7dd;
            color:#0f5132;
            padding:15px;
            border-radius:6px;
            margin-bottom:20px;
        }

        .errors{
            background:#f8d7da;
            color:#842029;
            padding:15px;
            border-radius:6px;
            margin-bottom:20px;
        }

        @media(max-width:768px){
            .grid{
                grid-template-columns:1fr;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Student Accreditation Application</h1>

    <p>
        Submit your academic qualifications for accreditation evaluation and verification.
    </p>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    {{-- VALIDATION ERRORS --}}
    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('student-accreditation.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        {{-- ===================================================== --}}
        {{-- 👤 STUDENT DETAILS --}}
        {{-- ===================================================== --}}

        <div class="section">

            <h2>Student Information</h2>

            <div class="grid">

                <div class="field">
                    <label>Full Name *</label>
                    <input type="text" name="full_name" required>
                </div>

                <div class="field">
                    <label>Email Address *</label>
                    <input type="email" name="email" required>
                </div>

                <div class="field">
                    <label>Phone Number</label>
                    <input type="text" name="phone">
                </div>

                <div class="field">
                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth">
                </div>

                <div class="field">
                    <label>Nationality</label>
                    <input type="text" name="nationality">
                </div>

            </div>

        </div>

        {{-- ===================================================== --}}
        {{-- 🎓 ACADEMIC DETAILS --}}
        {{-- ===================================================== --}}

        <div class="section">

            <h2>Academic Information</h2>

            <div class="grid">

                <div class="field">
                    <label>Institution Name *</label>
                    <input type="text" name="institution_name" required>
                </div>

                <div class="field">
                    <label>Course / Program *</label>
                    <input type="text" name="course_name" required>
                </div>

                <div class="field">
                    <label>Qualification Awarded *</label>
                    <input type="text" name="award_received" required>
                </div>

                <div class="field">
                    <label>Graduation Date</label>
                    <input type="date" name="graduation_date">
                </div>

                <div class="field">
                    <label>Study Mode</label>

                    <select name="study_mode">
                        <option value="">Select</option>
                        <option value="full_time">Full Time</option>
                        <option value="part_time">Part Time</option>
                        <option value="online">Online</option>
                        <option value="hybrid">Hybrid</option>
                    </select>
                </div>

                <div class="field">
                    <label>Student Number / Registration Number</label>
                    <input type="text" name="student_number">
                </div>

            </div>

        </div>

        {{-- ===================================================== --}}
        {{-- 🏫 INSTITUTION CONTACTS --}}
        {{-- ===================================================== --}}

        <div class="section">

            <h2>Institution Verification Contacts</h2>

            <div class="grid">

                <div class="field">
                    <label>Institution Email</label>
                    <input type="email" name="institution_email">
                </div>

                <div class="field">
                    <label>Institution Phone</label>
                    <input type="text" name="institution_phone">
                </div>

                <div class="field">
                    <label>Institution Website</label>
                    <input type="text" name="institution_website">
                </div>

                <div class="field">
                    <label>Registrar Name</label>
                    <input type="text" name="registrar_name">
                </div>

            </div>

        </div>

        {{-- ===================================================== --}}
        {{-- 📂 DOCUMENTS --}}
        {{-- ===================================================== --}}

        <div class="section">

            <h2>Supporting Documents</h2>

            <div class="grid">

                <div class="field">
                    <label>Certificate Copy *</label>
                    <input
                        type="file"
                        name="certificate"
                        required
                    >
                </div>

                <div class="field">
                    <label>Academic Transcript</label>
                    <input
                        type="file"
                        name="transcript"
                    >
                </div>

                <div class="field">
                    <label>National ID / Passport</label>
                    <input
                        type="file"
                        name="id_document"
                    >
                </div>

            </div>

        </div>

        {{-- ===================================================== --}}
        {{-- ✅ CONSENT --}}
        {{-- ===================================================== --}}

        <div class="section">

            <h2>Consent & Declaration</h2>

            <div class="field full">

                <label>
                    <input type="checkbox" required>

                    I confirm that all information submitted is accurate
                    and authorize academic verification with the institution.
                </label>

            </div>

        </div>

        <div style="margin-top:40px;">
            <button type="submit" class="btn">
                Submit Application
            </button>
        </div>

    </form>

</div>

</body>
</html>