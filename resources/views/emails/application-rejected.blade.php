<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial; background:#f7f7f7; padding:40px;">

    <div style="max-width:600px; margin:auto; background:white; padding:30px; border-radius:8px;">

        <h2>Application Update</h2>

        <p>We regret to inform you that your application was not approved.</p>

        @if($application->notes)
            <p><strong>Reason:</strong></p>
            <p>{{ $application->notes }}</p>
        @endif

        <p>
            You may reapply after addressing the above concerns.
        </p>

    </div>

</body>
</html>