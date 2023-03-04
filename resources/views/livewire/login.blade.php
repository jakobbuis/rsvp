<form wire:submit.prevent="send" class="bg-blue-100 p-8">
    <label for="email" class="font-bold mb-2 block">Sign in using a link via e-mail:</label>
    <input
        type="email"
        name="email"
        placeholder="yourname@example.com"
        wire:model="email"
        class="p-2 rounded-md w-96">
    <button type="submit" class="border bg-green-500 p-2 px-4 rounded-md hover:underline">Send link</button>

    @if ($errors->any())
        <div class="bg-white border-l-8 p-2 border-red-500 bg-red-100 mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('login_email_sent'))
        <div class="bg-white border-l-8 p-2 border-green-500 bg-green-100 mt-4">
            Link verzonden.
        </div>
    @endif
</form>
