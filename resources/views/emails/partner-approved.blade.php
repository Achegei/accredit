<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial; background:#f7f7f7; padding:40px;">

    <div style="max-width:600px; margin:auto; background:white; padding:30px; border-radius:8px;">

        <h2>Welcome to GESTAAC</h2>

        <p>Your institution has been approved.</p>

        <p><strong>Login Details:</strong></p>

        <p>Email: {{ $user->email }}</p>
        <p>Password: {{ $password }}</p>

        <p>
            <a href="{{ url('/login') }}" 
               style="display:inline-block; padding:12px 20px; background:black; color:white; text-decoration:none;">
                Login to Dashboard
            </a>
        </p>

        <p style="margin-top:20px;">
            You can now manage students, courses, and issue certificates.
        </p>

    </div>

</body>
</html>