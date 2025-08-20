<x-mail::message>

{{-- Email Container --}}
<div style="background-color: #f7f9fc; padding: 30px; font-family: Arial, sans-serif;">

    {{-- Card --}}
    <div style="max-width: 600px; margin: auto; background: #ffffff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); padding: 30px;">

        {{-- Logo --}}
        <div style="text-align: center; margin-bottom: 25px;">
            <img src="{{ asset('board_files/logo.jpg') }}" alt="{{ config('app.name') }} Logo" style="max-width: 160px;">
        </div>

        {{-- Greeting --}}
        <div style="text-align: center; margin-bottom: 20px;">
            @if (! empty($greeting))
                <h1 style="color: #2d3748; font-size: 24px; margin: 0;">{{ $greeting }}</h1>
            @else
                @if ($level === 'error')
                    <h1 style="color: #e53e3e; font-size: 24px; margin: 0;">@lang('Whoops!')</h1>
                @else
                    <h1 style="color: #2b6cb0; font-size: 24px; margin: 0;">@lang('Hello!')</h1>
                @endif
            @endif
        </div>

        {{-- Intro Lines --}}
        @foreach ($introLines as $line)
            <p style="font-size: 16px; line-height: 1.6; color: #4a5568; margin-bottom: 16px;">
                {{ $line }}
            </p>
        @endforeach

        {{-- Action Button --}}
        @isset($actionText)
            <?php
                $color = match ($level) {
                    'success' => '#38a169',
                    'error' => '#e53e3e',
                    default => '#3182ce',
                };
            ?>
            <div style="text-align: center; margin: 25px 0;">
                <a href="{{ $actionUrl }}" style="background-color: {{ $color }}; color: #ffffff; padding: 12px 24px; font-size: 16px; border-radius: 6px; text-decoration: none; display: inline-block;">
                    {{ $actionText }}
                </a>
            </div>
        @endisset

        {{-- Outro Lines --}}
        @foreach ($outroLines as $line)
            <p style="font-size: 15px; color: #4a5568; margin-bottom: 12px;">
                {{ $line }}
            </p>
        @endforeach

        {{-- Salutation --}}
        <p style="margin-top: 25px; font-size: 15px; color: #4a5568;">
            @if (! empty($salutation))
                {{ $salutation }}
            @else
                @lang('Regards,')<br>
                <strong>{{ config('app.name') }}</strong>
            @endif
        </p>

        {{-- Subcopy --}}
        @isset($actionText)
            <x-slot:subcopy>
                <p style="font-size: 13px; color: #718096; margin-top: 20px;">
                    @lang(
                        "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
                        'into your web browser:',
                        [
                            'actionText' => $actionText,
                        ]
                    )
                </p>
                <p style="word-break: break-all; font-size: 13px; color: #3182ce;">
                    [{{ $displayableActionUrl }}]({{ $actionUrl }})
                </p>
            </x-slot:subcopy>
        @endisset

    </div>

    {{-- Footer --}}
    <div style="text-align: center; margin-top: 20px; font-size: 12px; color: #a0aec0;">
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </div>

</div>

</x-mail::message>
