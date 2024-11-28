<x-mail::message>
# Hello, this mail is from MTI Website.

You received an email

**From** :
{{ $mail['name'] }} - {{ $mail['email'] }}

**Content Message** :\
{{ $mail['message'] }}

<x-mail::button url="https://mti.com.mm">
    Go To Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
