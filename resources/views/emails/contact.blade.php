@component('mail::message')
# New request

From: {{ $first_name ?? "" }} {{ $last_name  ?? ""}}<br>
Mail: {{ $mail ?? "" }}<br>
Company: {{ $company ?? "" }}<br>
Message: {{ $message ?? "" }}<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
