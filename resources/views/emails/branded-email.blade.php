@php
    $logoUrl = asset('board_files/logo.jpg'); // Make sure the logo is in public/board_files/logo.jpg
@endphp

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { background-color: #f7f9fc; font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .email-container { max-width: 600px; margin: auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .header { text-align: center; padding: 20px; background-color: #ffffff; }
        .header img { max-width: 160px; }
        .content { padding: 24px; }
        .content h1 { color: #2b6cb0; font-size: 24px; margin-bottom: 16px; }
        .content p { color: #4a5568; font-size: 16px; line-height: 1.6; margin-bottom: 16px; }
        .button { text-align: center; margin: 24px 0; }
        .button a { background-color: #3182ce; color: #ffffff; padding: 14px 28px; font-size: 16px; border-radius: 6px; text-decoration: none; display: inline-block; }
        .footer { text-align: center; font-size: 12px; color: #a0aec0; padding: 16px; }
        @media only screen and (max-width: 600px) {
            .content { padding: 16px; }
            .content h1 { font-size: 20px; }
            .button a { display: block; width: 100%; }
        }
    </style>
</head>
<body>

    <div class="email-container">
        <!-- Logo -->
        <div class="header">
            <img src="{{ $logoUrl }}" alt="Logo">
        </div>

        <!-- Content -->
        <div class="content">
            <h1>{{ $greeting ?? 'Hello!' }}</h1>

            @foreach ($introLines as $line)
                <p>{{ $line }}</p>
            @endforeach

            @if ($actionText && $actionUrl)
                <div class="button">
                    <a href="{{ $actionUrl }}">{{ $actionText }}</a>
                </div>
            @endif

            @foreach ($outroLines as $line)
                <p>{{ $line }}</p>
            @endforeach

            <p>
                @if ($salutation)
                    {{ $salutation }}
                @else
                    Regards,<br><strong>{{ config('app.name') }}</strong>
                @endif
            </p>

            @if ($actionText && $actionUrl)
                <hr style="border:none; border-top:1px solid #e5e7eb; margin:24px 0;">
                <p style="font-size: 13px; color: #777;">
                    If you’re having trouble clicking "{{ $actionText }}", copy and paste this URL into your web browser:
                </p>
                <p style="font-size: 13px; word-break: break-all; color: #3182ce;">
                    {{ $actionUrl }}
                </p>
            @endif
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>

</body>
</html>
