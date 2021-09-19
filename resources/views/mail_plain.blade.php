{{ config("app.name") }} - Biuro Podróży

Masz nową wiadomość ze strony {{ config("app.name") }}.
Adres strony: {{ config("app.url") }}

Nadawca: {!! $fullName !!}
E-mail: {!! $email !!}
Numer telefonu: {!! $telephoneNumber !!}

{!! $content !!}

{{ date("Y") }} © {{ config("app.name") }} - Wszelkie prawa zastrzeżone.
