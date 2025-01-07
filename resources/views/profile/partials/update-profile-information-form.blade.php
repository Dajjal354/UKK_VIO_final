<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<style>
    /* Global Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f9fafb; /* Light gray background */
    margin: 0;
    padding: 0;
}

section {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff; /* White background */
    border: 1px solid #e5e7eb; /* Light gray border */
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Header Styles */
header h2 {
    color: #1f2937; /* Dark gray */
    margin-bottom: 5px;
}

header p {
    color: #6b7280; /* Medium gray */
    margin-top: 0;
}

/* Form Styles */
form {
    margin-top: 20px;
}

form div {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: 600;
    color: #374151; /* Darker gray */
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #d1d5db; /* Light gray border */
    border-radius: 6px;
    background-color: #f9fafb;
    font-size: 14px;
    color: #374151;
    transition: border-color 0.2s;
}

input[type="text"]:focus,
input[type="email"]:focus {
    border-color: #6366f1; /* Indigo border on focus */
    outline: none;
}

button {
    padding: 10px 20px;
    background-color: #4f46e5; /* Indigo button */
    color: white;
    font-size: 14px;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.2s;
}

button:hover {
    background-color: #4338ca; /* Darker indigo */
}

/* Status Messages */
.text-green-600 {
    color: #10b981; /* Green success text */
}

.text-gray-600 {
    color: #6b7280; /* Gray text */
}

.text-gray-800 {
    color: #374151; /* Darker gray text */
}

button.underline {
    background: none;
    color: inherit;
    padding: 0;
    font: inherit;
    text-decoration: underline;
}

button.underline:hover {
    color: #1f2937; /* Dark gray on hover */
}

/* Transition for status message */
[x-show="show"] {
    transition: opacity 0.2s ease-in-out;
    opacity: 1;
}

[x-show="show"][x-transition="leave"] {
    opacity: 0;
}

</style>
