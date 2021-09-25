<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style type="text/css">
        table {border-collapse:separate;}
        a, a:link, a:visited {text-decoration: none; color: #00788a;}
        a:hover {text-decoration: underline;}
        h2,h2 a,h2 a:visited,h3,h3 a,h3 a:visited,h4,h5,h6,.t_cht {color:#000 !important;}
        .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td     {line-height: 100%;}
        .ExternalClass {width: 100%;}
    </style>

</head>
<body style="background:#f3f4f6; font-family: sans-serif; margin: 20px;">
    <table cellpadding="0" cellspacing="0" border="0" style="background: #ffffff; margin-left: auto; margin-right: auto; max-width: 700px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <tr style="background: #000000; color: #ffffff; font-weight: bold;">
            <td style="padding: 10px;border-top-left-radius: 5px; border-top-right-radius: 5px; font-size: 14px;">{{ config("app.fullname") }}</td>
        </tr>

        <tr>
            <td style="padding: 10px; line-height: 1.7;">
                Masz nową wiadomość ze strony <a href="{{ config("app.url") }}">{{ config("app.name") }}</a>. <br><br>

                <b>Nadawca:</b> {{ $fullName }} <br>
                <b>E-mail:</b> {{ $email }} <br>
                <b>Numer telefonu:</b> {{ $telephoneNumber }} <br><br>

                {{ $content }}

            </td>
        </tr>

        <tr style="background: #000000; color: #ffffff; font-weight: bold">
            <td style="padding: 10px; font-size: 14px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">© {{ date("Y") }} {{ config("app.name") }} - Wszelkie prawa zastrzeżone</td>
        </tr>
    </table>
</body>
</html>
