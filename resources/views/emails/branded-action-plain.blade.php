
{{ $greeting ?? 'Hello!' }}

@foreach ($introLines as $line)
- {{ $line }}
@endforeach

@if ($actionText && $actionUrl)
{{ $actionText }}: {{ $actionUrl }}
@endif

@foreach ($outroLines as $line)
- {{ $line }}
@endforeach

{{ $salutation ?? "Regards,\n" . config('app.name') }}
