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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"></path>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold text-white drop-shadow-lg">Welcome Back!</h1>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

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
                                class="pl-10 w-full bg-white/10 border-0 border-b-2 border-white/30 focus:border-blue-400 transition-colors focus:ring-0 peer text-white placeholder-white/50 backdrop-blur-sm rounded-lg"
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autofocus 
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
                                autocomplete="current-password"
                                placeholder="Enter your password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center space-x-2 group cursor-pointer">
                            <input type="checkbox" 
                                name="remember" 
                                class="w-5 h-5 rounded border-gray-300 text-blue-400 focus:ring-blue-400 transition-colors cursor-pointer bg-white/10" />
                            <span class="text-sm text-white group-hover:text-blue-200 transition-colors">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-white hover:text-blue-200 transition-colors" 
                                href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0 sm:space-x-4 mt-8">
                        @if (Route::has('register'))
                            <a class="text-sm text-white hover:text-blue-200 transition-colors underline" 
                                href="{{ route('register') }}">
                                {{ __('Create an account') }}
                            </a>
                        @endif

                        <x-primary-button class="w-full sm:w-auto bg-gradient-to-r from-blue-500/80 via-purple-500/80 to-pink-500/80 backdrop-blur-sm text-white px-8 py-3 rounded-lg hover:opacity-90 transform transition duration-300 hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            {{ __('Log in') }}
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