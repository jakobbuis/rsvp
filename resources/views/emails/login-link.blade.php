<x-mail::message>
# RSVP aanmeld-link

Gebruik de button hieronder om je aan te melden in RSVP. Als je nog geen account hebt, wordt er automatisch een voor je aangemaakt.

<x-mail::button :url="$link">
Sign in to RSVP
</x-mail::button>

Deze link is 15 minuten geldig en verloopt op {{ $validUntil->toTimeString() }}.

Thanks,<br>
RSVP
</x-mail::message>
