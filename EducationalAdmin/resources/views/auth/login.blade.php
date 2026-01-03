<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - EduAdmin</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e6f7ff 100%);
            min-height: 100vh;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .form-input {
            transition: all 0.3s ease;
            border: 2px solid #e2e8f0;
        }
        
        .form-input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.2);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <!-- Login Container -->
    <div class="w-full max-w-md">
        <!-- Logo and Brand -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center shadow-lg">
                    <span class="text-white font-bold text-3xl">📚</span>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-gray-900">
                <span class="gradient-text">EduAdmin</span>
            </h1>
            <p class="text-gray-600 mt-2">Educational Administration Platform</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-6 p-4 bg-green-50 text-green-700 rounded-lg border border-green-200">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span>{{ session('status') }}</span>
                    </div>
                </div>
            @endif

            <h2 class="text-2xl font-bold text-gray-900 mb-2">Welcome back</h2>
            <p class="text-gray-600 mb-6">Sign in to your account to continue</p>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus 
                            autocomplete="username"
                            class="pl-10 w-full px-4 py-3 rounded-lg form-input focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter your email">
                    </div>
                    @if ($errors->has('email'))
                        <div class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <!-- Password -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800 hover:underline">
                                Forgot password?
                            </a>
                        @endif
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="current-password"
                            class="pl-10 w-full px-4 py-3 rounded-lg form-input focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter your password">
                    </div>
                    @if ($errors->has('password'))
                        <div class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        name="remember"
                        class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500 border-gray-300">
                    <label for="remember_me" class="ml-2 text-sm text-gray-700">
                        Remember me
                    </label>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full btn-primary text-white font-semibold py-3 px-6 rounded-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Sign In
                    </button>
                </div>

               

                <!-- Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with</span>
                    </div>
                </div>

                <!-- Alternative Actions -->
                <div class="text-center space-y-4">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-800 hover:underline">
                            Create one now
                        </a>
                    </p>
                    
                    <div>
                        <a href="/" class="inline-flex items-center text-gray-600 hover:text-gray-900">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back to Home
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-gray-500 text-sm">
            <p>© {{ date('Y') }} EduAdmin. All rights reserved.</p>
            <div class="mt-2 space-x-4">
                <a href="#" class="hover:text-gray-700">Privacy Policy</a>
                <a href="#" class="hover:text-gray-700">Terms of Service</a>
                <a href="#" class="hover:text-gray-700">Support</a>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility (optional enhancement)
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.createElement('button');
            toggleButton.type = 'button';
            toggleButton.innerHTML = '<i class="fas fa-eye"></i>';
            toggleButton.className = 'absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600';
            toggleButton.addEventListener('click', function() {
                const type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });
            
            const passwordContainer = passwordInput.parentElement;
            passwordContainer.classList.add('relative');
            passwordContainer.appendChild(toggleButton);
        });
    </script>
</body>
</html>