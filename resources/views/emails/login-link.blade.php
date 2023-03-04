<x-mail::message>
# RSVP login link

Use the button to sign in to RSVP. This link is valid for 15 minutes and expires at
{{ $validUntil->toTimeString() }}.

<x-mail::button :url="$link">
Sign in to RSVP
</x-mail::button>

Thanks,<br>
RSVP
</x-mail::message>
