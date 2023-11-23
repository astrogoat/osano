@php use Astrogoat\Osano\Settings\OsanoSettings; @endphp

@if(OsanoSettings::isEnabled())
    <script src="https://cmp.osano.com/{{ resolve(OsanoSettings::class)->account_id }}/{{ resolve(OsanoSettings::class)->configuration_id }}/osano.js"></script>
@endif
