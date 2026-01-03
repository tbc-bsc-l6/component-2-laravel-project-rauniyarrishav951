<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - EduAdmin</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .shadow-soft {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }
        
        .hover-lift {
            transition: transform 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="glass-effect shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                            <span class="text-white font-bold text-xl">📚</span>
                        </div>
                        <span class="font-bold text-xl text-gray-800">EduAdmin</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-600 hover:text-blue-600 transition-colors">Home</a>
                    <a href="/about" class="text-blue-600 font-medium">About</a>
                    <a href="/contact" class="text-gray-600 hover:text-blue-600 transition-colors">Contact</a>
                    <a href="/blogs" class="text-gray-600 hover:text-blue-600 transition-colors">Blogs</a>
                    
                </div>

                <!-- Mobile menu button -->
                <button id="mobileMenuBtn" class="md:hidden text-gray-600">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden hidden bg-white px-4 py-3 space-y-3 border-t">
            <a href="/" class="block py-2 text-gray-600 hover:text-blue-600">Home</a>
            <a href="/about" class="block py-2 text-blue-600 font-medium">About</a>
            <a href="/contact" class="block py-2 text-gray-600 hover:text-blue-600">Contact</a>
            <a href="/blogs" class="block py-2 text-gray-600 hover:text-blue-600">Blogs</a>
            
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        <!-- Hero Section -->
        <div class="relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
                <div class="text-center">
                    
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Column - Text Content -->
                <div>
                    <div class="space-y-8">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Mission</h2>
                            <p class="text-gray-600 leading-relaxed">
                                To empower educational institutions with modern, intuitive tools that 
                                streamline administration, enhance learning experiences, and foster 
                                collaboration between educators, students, and administrators.
                            </p>
                        </div>
                        
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">What We Do</h2>
                            <p class="text-gray-600 leading-relaxed">
                                EduAdmin provides a comprehensive platform that simplifies academic 
                                operations. From course management to progress tracking, we help 
                                institutions focus on what matters most: education.
                            </p>
                        </div>
                        
                        <div class="bg-blue-50 p-6 rounded-xl">
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">Our Values</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                    <span class="text-gray-700">Innovation in education technology</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                    <span class="text-gray-700">User-centered design</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                    <span class="text-gray-700">Data security and privacy</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                    <span class="text-gray-700">Continuous improvement</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Image/Stats -->
                <div>
                    <div class="bg-gradient-to-br from-blue-50 to-purple-50 p-8 rounded-2xl shadow-soft">
                        <div class="space-y-6">
                            <div class="text-center">
                                <div class="text-5xl mb-2">🎯</div>
                                <h3 class="text-2xl font-bold text-gray-900">Our Focus</h3>
                                <p class="text-gray-600 mt-2">Simplifying educational administration for everyone</p>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-6 mt-8">
                                <div class="bg-white p-6 rounded-xl text-center hover-lift">
                                    <div class="text-3xl font-bold text-blue-600 mb-2">100+</div>
                                    <div class="text-gray-700">Institutions</div>
                                </div>
                                <div class="bg-white p-6 rounded-xl text-center hover-lift">
                                    <div class="text-3xl font-bold text-blue-600 mb-2">50K+</div>
                                    <div class="text-gray-700">Users</div>
                                </div>
                                <div class="bg-white p-6 rounded-xl text-center hover-lift">
                                    <div class="text-3xl font-bold text-blue-600 mb-2">24/7</div>
                                    <div class="text-gray-700">Support</div>
                                </div>
                                <div class="bg-white p-6 rounded-xl text-center hover-lift">
                                    <div class="text-3xl font-bold text-blue-600 mb-2">99.9%</div>
                                    <div class="text-gray-700">Uptime</div>
                                </div>
                            </div>
                            
                            <div class="pt-6">
                                <h4 class="text-lg font-semibold text-gray-900 mb-4">Key Features</h4>
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <i class="fas fa-check text-green-500 mr-3"></i>
                                        <span class="text-gray-700">Intuitive Dashboard</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check text-green-500 mr-3"></i>
                                        <span class="text-gray-700">Course Management</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check text-green-500 mr-3"></i>
                                        <span class="text-gray-700">Progress Analytics</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check text-green-500 mr-3"></i>
                                        <span class="text-gray-700">Secure Platform</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Team Section -->
            <div class="mt-20">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Our Team</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-xl shadow-soft text-center hover-lift">
                        <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center mb-6">
                            <span class="text-3xl">👨‍💻</span>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Alex Morgan</h4>
                        <p class="text-blue-600 font-medium mb-3">Lead Developer</p>
                        <p class="text-gray-600">Architecting scalable solutions for educational institutions</p>
                    </div>
                    
                    <div class="bg-white p-8 rounded-xl shadow-soft text-center hover-lift">
                        <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-pink-100 to-red-100 flex items-center justify-center mb-6">
                            <span class="text-3xl">🎨</span>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Samantha Lee</h4>
                        <p class="text-blue-600 font-medium mb-3">UI/UX Designer</p>
                        <p class="text-gray-600">Creating intuitive and beautiful user experiences</p>
                    </div>
                    
                    <div class="bg-white p-8 rounded-xl shadow-soft text-center hover-lift">
                        <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-green-100 to-teal-100 flex items-center justify-center mb-6">
                            <span class="text-3xl">🔒</span>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Michael Chen</h4>
                        <p class="text-blue-600 font-medium mb-3">Security Engineer</p>
                        <p class="text-gray-600">Ensuring data protection and platform security</p>
                    </div>
                </div>
            </div>
            
            
            <div class="mt-20 text-center">
               
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                       
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                            <span class="text-white font-bold text-xl"></span>
                        </div>
                        <span class="font-bold text-xl">EduAdmin</span>
                    </div>
                    <p class="text-gray-400 leading-relaxed">
                        Advanced educational management platform designed for modern institutions.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        
                       
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Pricing</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Support Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">API Documentation</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-6">Resources</h4>
                    <ul class="space-y-3">
                         <li><a href="#" class="text-gray-400 hover:text-white transition-colors">System Status</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Documentation</a></li>
                        
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-6">Contact</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li>Email: support@eduadmin.com</li>
                        <li>Phone: +1 (555) 123-4567</li>
                        <li>Address: 123 Education St, Tech City</li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-12 pt-8 border-t border-gray-800 text-center text-gray-500">
                <p>© 2026 EduAdmin. All rights reserved.</p>
                <div class="mt-4 space-x-6">
                    <a href="#" class="hover:text-gray-300 transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-gray-300 transition-colors">Terms of Service</a>
                    <a href="#" class="hover:text-gray-300 transition-colors">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobileMenu');
            const btn = document.getElementById('mobileMenuBtn');
            
            if (!menu.contains(event.target) && !btn.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>