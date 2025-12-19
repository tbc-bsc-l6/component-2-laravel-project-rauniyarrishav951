<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Edu Admin') }} - Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center relative overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img 
                src="{{ asset('images/College.jpg') }}"
                alt="University Campus Background"
                class="w-full h-full object-cover"
                onerror="this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'"
            />
            <div class="absolute inset-0 bg-gradient-to-r from-[#667eea]/90 to-[#764ba2]/90 mix-blend-multiply"></div>
            
            <!-- Animated Background Elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-40 -right-40 w-80 h-80 bg-white/5 rounded-full blur-3xl animate-pulse-glow"></div>
                <div class="absolute bottom-40 -left-40 w-80 h-80 bg-[#764ba2]/20 rounded-full blur-3xl animate-pulse-glow" style="animation-delay: 1s"></div>
                <div class="absolute top-1/2 left-1/3 w-60 h-60 bg-[#667eea]/10 rounded-full blur-3xl animate-pulse-glow" style="animation-delay: 2s"></div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 w-full max-w-4xl px-4 sm:px-6 lg:px-8 mx-auto">
            <!-- Header with Logo -->
            <div class="text-center mb-10 animate-float">
                <a href="{{ url('/') }}" class="inline-block">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-[#667eea] via-purple-500 to-[#764ba2] rounded-2xl shadow-2xl mb-6 transform hover:scale-105 transition-transform duration-300 relative overflow-hidden group">
                        <!-- Shimmer effect -->
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                        
                        <!-- Logo Icon -->
                       
                        <div class="relative z-10">
                            <div class="navbar-brand-logo">📚</div>
                           
                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                <path d="M12 14v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                    </div>
                </a>
                
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 tracking-tight">
                    Welcome to <span class="gradient-text">Edu Admin</span>
                </h1>
                <p class="text-lg text-white/80 max-w-2xl mx-auto">
                    Streamline your educational institution management with our comprehensive admin panel
                </p>
            </div>

            <!-- Login Card -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Left Side - Information -->
                <div class="glass-effect rounded-3xl p-8 shadow-2xl transform hover:scale-[1.02] transition-all duration-300 hidden lg:block">
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#667eea]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Lightning Fast</h3>
                                <p class="text-white/70">Experience blazing fast performance with our optimized platform.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#764ba2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Secure & Reliable</h3>
                                <p class="text-white/70">Enterprise-grade security with end-to-end encryption.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#667eea]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Powerful Features</h3>
                                <p class="text-white/70">Manage students, faculty, courses, and finances all in one place.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 pt-8 border-t border-white/10">
                        <p class="text-white/60 text-sm italic">
                            "The best educational management system I've used. It has transformed how we operate."
                        </p>
                        <div class="flex items-center mt-4">
                            <div class="w-10 h-10 bg-gradient-to-r from-[#667eea] to-[#764ba2] rounded-full flex items-center justify-center text-white font-bold">
                                JD
                            </div>
                            <div class="ml-3">
                                <p class="text-white font-medium">John Doe</p>
                                <p class="text-white/60 text-sm">University Director</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Login Form -->
                <div class="bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 p-8 transform hover:scale-[1.01] transition-all duration-300">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-white mb-2">Sign In to Your Account</h2>
                        <p class="text-white/70">Enter your credentials to access the dashboard</p>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-6 p-4 bg-gradient-to-r from-green-500/20 to-emerald-500/20 border border-green-500/30 rounded-xl text-white">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-white">
                                {{ __('Email Address') }}
                            </label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-white/60 group-focus-within:text-[#667eea] transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                                <input 
                                    id="email" 
                                    type="email" 
                                    name="email" 
                                    value="{{ old('email') }}"
                                    required 
                                    autofocus 
                                    autocomplete="username"
                                    placeholder="you@university.edu"
                                    class="pl-12 w-full bg-white/5 border border-white/20 text-white placeholder-white/50 rounded-xl py-3 px-4 focus:border-[#667eea] focus:ring-2 focus:ring-[#667eea]/30 focus:custom-ring transition-all duration-200"
                                >
                            </div>
                            @error('email')
                                <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm font-medium text-white">
                                    {{ __('Password') }}
                                </label>
                                @if (Route::has('password.request'))
                                    <a class="text-sm text-white/70 hover:text-white transition-colors duration-200 hover:underline" href="{{ route('password.request') }}">
                                        {{ __('Forgot password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-white/60 group-focus-within:text-[#667eea] transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <input 
                                    id="password" 
                                    type="password" 
                                    name="password"
                                    required 
                                    autocomplete="current-password"
                                    placeholder="••••••••"
                                    class="pl-12 w-full bg-white/5 border border-white/20 text-white placeholder-white/50 rounded-xl py-3 px-4 focus:border-[#667eea] focus:ring-2 focus:ring-[#667eea]/30 focus:custom-ring transition-all duration-200"
                                >
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword()">
                                    <svg id="eye-icon" class="h-5 w-5 text-white/60 hover:text-white cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-[#667eea] bg-white/10 border-white/20 rounded focus:ring-[#667eea] focus:ring-2">
                            <label for="remember_me" class="ml-2 text-sm text-white/80 cursor-pointer">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit" class="w-full btn-shimmer bg-gradient-to-r from-[#667eea] to-[#764ba2] hover:from-[#5a6fd8] hover:to-[#6a4190] text-white font-semibold py-3.5 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#667eea] focus:ring-offset-2 focus:ring-offset-transparent relative overflow-hidden">
                                <span class="relative z-10">{{ __('Sign In') }}</span>
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="relative my-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-white/20"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-transparent text-white/60">Or continue with</span>
                            </div>
                        </div>

                        <!-- Social Login -->
                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" class="flex items-center justify-center px-4 py-3 bg-white/5 hover:bg-white/10 border border-white/20 rounded-xl text-white/80 hover:text-white transition-all duration-200 group">
                                <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform duration-200" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                    <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                    <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                    <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                </svg>
                                Google
                            </button>
                            <button type="button" class="flex items-center justify-center px-4 py-3 bg-white/5 hover:bg-white/10 border border-white/20 rounded-xl text-white/80 hover:text-white transition-all duration-200 group">
                                <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform duration-200" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                                GitHub
                            </button>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center pt-6 border-t border-white/10">
                            <p class="text-white/70 text-sm">
                                Don't have an account?
                                <a href="{{ route('register') }}" class="text-white font-semibold hover:text-white/90 transition-colors duration-200 hover:underline ml-1">
                                    {{ __('Create Account') }}
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Floating Elements -->
            <div class="absolute bottom-10 left-10 w-6 h-6 bg-white/10 rounded-full animate-pulse"></div>
            <div class="absolute top-20 right-20 w-8 h-8 bg-[#764ba2]/20 rounded-full animate-pulse"></div>
            <div class="absolute top-40 left-1/4 w-4 h-4 bg-white/5 rounded-full animate-pulse"></div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.59 6.59m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }

        // Add ripple effect to buttons
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('button[type="submit"], button[type="button"]');
            
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    // Remove existing ripples
                    const existingRipples = this.querySelectorAll('.ripple-effect');
                    existingRipples.forEach(ripple => ripple.remove());
                    
                    // Create new ripple
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.classList.add('ripple-effect');
                    ripple.style.cssText = `
                        position: absolute;
                        border-radius: 50%;
                        background: rgba(255, 255, 255, 0.3);
                        transform: scale(0);
                        width: ${size}px;
                        height: ${size}px;
                        top: ${y}px;
                        left: ${x}px;
                        pointer-events: none;
                    `;
                    
                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);
                    
                    // Animate ripple
                    setTimeout(() => {
                        ripple.style.transform = 'scale(4)';
                        ripple.style.opacity = '0';
                        ripple.style.transition = 'transform 0.6s ease-out, opacity 0.6s ease-out';
                    }, 10);
                    
                    // Remove ripple after animation
                    setTimeout(() => ripple.remove(), 600);
                });
            });

            // Add floating animation to form card
            const formCard = document.querySelector('.bg-white\\/10');
            formCard.classList.add('animate-float');
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const email = this.querySelector('#email').value;
            const password = this.querySelector('#password').value;
            
            if (!email || !password) {
                e.preventDefault();
                alert('Please fill in all required fields');
                return false;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Please enter a valid email address');
                return false;
            }
            
            return true;
        });
    </script>
</body>
</html>