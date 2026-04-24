<!DOCTYPE html>
<html>
<body style="font-family: Arial; background:#f5f5f5; padding:40px;">

<div style="max-width:600px; margin:auto; background:white; padding:30px; border-radius:8px;">

    <h2>Welcome to GESTAAC</h2>

    <p>Your institution has been approved.</p>

    <h4>Login Details:</h4>

    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>

    <a href="{{ url('/login') }}"
       style="display:inline-block; padding:12px 20px; background:black; color:white; text-decoration:none; margin-top:10px;">
        Login to Dashboard
    </a>

</div>

</body>
</html>