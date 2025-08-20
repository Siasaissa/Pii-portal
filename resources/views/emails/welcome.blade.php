<!-- resources/views/emails/welcome.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome</title>
</head>
<body>
    
    <h1>Hello {{ $name }},</h1>
    <p>Your account has been created successfully.</p>
    <p>Here is your temporary password: <strong>{{ $password }}</strong></p>
    <p>Please <a href="{{ $resetUrl }}">reset your password</a> after logging in.</p>
    <p>Regards,<br>{{ config('app.name') }}</p>
</body>
</html>
