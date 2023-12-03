@php
    use Astrogoat\Osano\Settings\OsanoSettings;
    $settings = resolve(OsanoSettings::class);
@endphp

@if(OsanoSettings::isEnabled())
    @unless($settings->show_cookie_widget)
        <style>
            .osano-cm-widget { display: none; }
        </style>
    @endunless

    <script src="https://cmp.osano.com/{{ $settings->account_id }}/{{ $settings->configuration_id }}/osano.js"></script>
@endif
