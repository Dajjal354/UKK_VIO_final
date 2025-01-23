<x-guest-layout>
    <!-- Video Background -->
    <video autoplay muted loop id="bg-video" class="fixed right-0 bottom-0 min-w-full min-h-full object-cover -z-10">
        <source src="{{ asset('video/video.org.ketik.mp4') }}" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>

    <div class="min-h-screen flex items-center justify-center relative overflow-hidden py-12 px-4">
        <!-- Main Container -->
        <div class="w-full sm:max-w-3xl relative z-10">
            <!-- Glass Morphism Card -->
            <div class="backdrop-blur-sm bg-white/10 shadow-2xl rounded-2xl p-8 transform hover:scale-[1.02] transition-all duration-300 border border-white/20">
                <!-- Logo/Brand Section -->
                <div class="text-center mb-8">
                    <div class="inline-block p-4 rounded-full bg-gradient-to-r from-blue-500/50 via-purple-500/50 to-pink-500/50 backdrop-blur-md mb-4">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold text-white drop-shadow-lg">Create Account</h1>
                    <p class="text-white/80 mt-2">Join our community today</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name Input Group -->
                    <div class="group">
                        <x-input-label for="name" :value="__('Name')" class="text-white font-medium" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-white/70">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <x-text-input id="name" 
                                class="pl-10 w-full bg-white/10 border-0 border-b-2 border-white/30 focus:border-blue-400 transition-colors focus:ring-0 peer text-white placeholder-white/50 backdrop-blur-sm rounded-lg"
                                type="text" 
                                name="name" 
                                :value="old('name')" 
                                required 
                                autofocus 
                                autocomplete="name"
                                placeholder="Enter your full name" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Input Group -->
                    <div class="group">
                        <x-input-label for="email" :value="__('Email')" class="text-white font-medium" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-white/70">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </span>
                            <x-text-input id="email" 
                                class="pl-10 w-full bg-white/10 border-0 border-b-2 border-white/30 focus:border-purple-400 transition-colors focus:ring-0 peer text-white placeholder-white/50 backdrop-blur-sm rounded-lg"
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autocomplete="username"
                                placeholder="Enter your email" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password Input Group -->
                    <div class="group">
                        <x-input-label for="password" :value="__('Password')" class="text-white font-medium" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-white/70">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <x-text-input id="password" 
                                class="pl-10 w-full bg-white/10 border-0 border-b-2 border-white/30 focus:border-pink-400 transition-colors focus:ring-0 peer text-white placeholder-white/50 backdrop-blur-sm rounded-lg"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Create a password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password Input Group -->
                    <div class="group">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white font-medium" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-white/70">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </span>
                            <x-text-input id="password_confirmation" 
                                class="pl-10 w-full bg-white/10 border-0 border-b-2 border-white/30 focus:border-blue-400 transition-colors focus:ring-0 peer text-white placeholder-white/50 backdrop-blur-sm rounded-lg"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm your password" />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0 sm:space-x-4 mt-8">
                        <a class="text-sm text-white hover:text-blue-200 transition-colors" 
                            href="{{ route('login') }}">
                            {{ __('Already have an account?') }}
                        </a>

                        <x-primary-button class="w-full sm:w-auto bg-gradient-to-r from-blue-500/80 via-purple-500/80 to-pink-500/80 backdrop-blur-sm text-white px-8 py-3 rounded-lg hover:opacity-90 transform transition duration-300 hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        #bg-video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }

        /* Custom input styles */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus {
            -webkit-text-fill-color: white;
            -webkit-box-shadow: 0 0 0px 1000px rgba(255, 255, 255, 0.1) inset;
            transition: background-color 5000s ease-in-out 0s;
        }

        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }

        /* Glass effect */
        .backdrop-blur-sm {
            backdrop-filter: blur(8px);
        }

        /* Input placeholder color */
        ::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
    </style>
</x-guest-layout>