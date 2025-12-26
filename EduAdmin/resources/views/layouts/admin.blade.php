{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - EduAdmin</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --sidebar-gradient: linear-gradient(180deg, #1f2937 0%, #111827 100%);
            --card-gradient: linear-gradient(145deg, #139a32ff, #1872ccff);
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .sidebar-link {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-left: 4px solid transparent;
            position: relative;
            overflow: hidden;
        }
        
        .sidebar-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
            transition: left 0.5s ease;
        }
        
        .sidebar-link:hover::before {
            left: 100%;
        }
        
        .sidebar-link:hover {
            border-left-color: #3b82f6;
            background: rgba(59, 130, 246, 0.08);
            transform: translateX(5px);
        }
        
        .sidebar-link.active {
            border-left-color: #3b82f6;
            background: rgba(59, 130, 246, 0.12);
            box-shadow: inset 0 2px 8px rgba(59, 130, 246, 0.1);
        }
        
        .stat-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: var(--card-gradient);
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
        }
        
        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15), 0 10px 20px -5px rgba(0, 0, 0, 0.08);
        }
        
        .badge {
            padding: 0.35rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .badge-admin { 
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #dc2626;
            border: 1px solid rgba(220, 38, 38, 0.2);
        }
        .badge-teacher { 
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            color: #1d4ed8;
            border: 1px solid rgba(29, 78, 216, 0.2);
        }
        .badge-student { 
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
            color: #16a34a;
            border: 1px solid rgba(22, 163, 74, 0.2);
        }
        .badge-available { 
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
            color: #16a34a;
            border: 1px solid rgba(22, 163, 74, 0.2);
        }
        .badge-unavailable { 
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #dc2626;
            border: 1px solid rgba(220, 38, 38, 0.2);
        }
        
        .nav-title {
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.5px;
        }
        
        .floating-element {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .pulse-dot {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.05); }
            100% { opacity: 1; transform: scale(1); }
        }
        
        .shine-effect {
            position: relative;
            overflow: hidden;
        }
        
        .shine-effect::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 20%;
            height: 200%;
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(30deg);
            transition: all 0.6s ease;
        }
        
        .shine-effect:hover::after {
            left: 100%;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
    
    @yield('styles')
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 relative overflow-hidden" style="background: var(--sidebar-gradient);">
            <!-- Animated background -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-10 left-10 w-32 h-32 rounded-full bg-blue-500 blur-3xl"></div>
                <div class="absolute bottom-10 right-10 w-40 h-40 rounded-full bg-purple-500 blur-3xl"></div>
            </div>
            
            <div class="relative z-10 text-white flex flex-col h-full">
                <!-- Logo -->
                <div class="p-6 border-b border-gray-700/50">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg floating-element">
                            <div class="navbar-brand-logo">📚</div>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold nav-title">EduAdmin</h1>
                            <p class="text-xs text-gray-400 mt-1">Educational Platform</p>
                        </div>
                    </div>
                </div>
                
                <!-- User Profile -->
                <div class="p-4 border-b border-gray-700/50">
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-400 rounded-full flex items-center justify-center shadow-lg">
                                @auth
                                <span class="font-bold text-lg">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                @else
                                <i class="fas fa-user text-white"></i>
                                @endauth
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-gray-900 pulse-dot"></div>
                        </div>
                        <div class="flex-1">
                            @auth
                            <p class="font-semibold truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
                            @else
                            <p class="font-semibold">Guest</p>
                            <p class="text-xs text-gray-400">Not logged in</p>
                            @endauth
                        </div>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                    <div class="px-3 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider border-b border-gray-700/30 mb-2">
                        <i class="fas fa-bars mr-2"></i>Navigation
                    </div>
                    
                    <a href="{{ route('admin.dashboard') }}" 
                       class="sidebar-link flex items-center space-x-3 py-3 px-4 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} shine-effect">
                        <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center">
                            <i class="fas fa-chart-line text-blue-400"></i>
                        </div>
                        <span class="font-medium">Dashboard</span>
                        @if(request()->routeIs('admin.dashboard'))
                        <div class="ml-auto w-2 h-2 rounded-full bg-blue-400 animate-pulse"></div>
                        @endif
                    </a>
                    
                    <div class="px-3 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider border-b border-gray-700/30 mt-6 mb-2">
                        <i class="fas fa-cogs mr-2"></i>Management
                    </div>
                    
                    <a href="{{ route('admin.modules.index') }}" 
                       class="sidebar-link flex items-center space-x-3 py-3 px-4 rounded-lg {{ request()->routeIs('admin.modules.*') ? 'active' : '' }} shine-effect">
                        <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center">
                            <i class="fas fa-book-open text-green-400"></i>
                        </div>
                        <span class="font-medium">Modules</span>
                    </a>
                    
                    <a href="{{ route('admin.users.index') }}" 
                       class="sidebar-link flex items-center space-x-3 py-3 px-4 rounded-lg {{ request()->routeIs('admin.users.*') ? 'active' : '' }} shine-effect">
                        <div class="w-8 h-8 rounded-lg bg-purple-500/20 flex items-center justify-center">
                            <i class="fas fa-users text-purple-400"></i>
                        </div>
                        <span class="font-medium">Users</span>
                    </a>
                    
                    <a href="{{ route('admin.teachers.index') }}" 
                       class="sidebar-link flex items-center space-x-3 py-3 px-4 rounded-lg {{ request()->routeIs('admin.teachers.*') ? 'active' : '' }} shine-effect">
                        <div class="w-8 h-8 rounded-lg bg-orange-500/20 flex items-center justify-center">
                            <i class="fas fa-chalkboard-teacher text-orange-400"></i>
                        </div>
                        <span class="font-medium">Teachers</span>
                    </a>


                   
                    
                    <div class="px-3 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider border-b border-gray-700/30 mt-6 mb-2">
                        <i class="fas fa-sliders-h mr-2"></i>System
                    </div>
                    
                    <a href="#" class="sidebar-link flex items-center space-x-3 py-3 px-4 rounded-lg shine-effect">
                        <div class="w-8 h-8 rounded-lg bg-gray-500/20 flex items-center justify-center">
                            <i class="fas fa-cog text-gray-400"></i>
                        </div>
                        <span class="font-medium">Settings</span>
                    </a>
                    
                    <div class="mt-8 p-4 bg-gray-800/50 rounded-xl mx-2">
                        <p class="text-xs text-gray-400 mb-2">Quick Actions</p>
                        <div class="flex space-x-2">
                            <button class="flex-1 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-xs font-medium transition-colors">
                                <i class="fas fa-plus mr-1"></i> New
                            </button>
                            <button class="flex-1 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg text-xs font-medium transition-colors">
                                <i class="fas fa-download mr-1"></i> Export
                            </button>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('logout') }}" class="mt-6 px-2">
                        @csrf
                        <button type="submit" 
                                class="w-full sidebar-link flex items-center space-x-3 py-3 px-4 rounded-lg text-red-400 hover:text-red-300 hover:bg-red-900/20 transition-all duration-300 border border-red-900/30 shine-effect">
                            <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center">
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            <span class="font-medium">Logout</span>
                        </button>
                    </form>
                </nav>
                
                <!-- Footer -->
                <div class="p-4 border-t border-gray-700/50 text-center">
                    <p class="text-xs text-gray-500 mb-1">EduAdmin v2.0</p>
                    <div class="flex justify-center space-x-2">
                        <div class="w-2 h-2 rounded-full bg-green-500"></div>
                        <div class="w-2 h-2 rounded-full bg-green-500"></div>
                        <div class="w-2 h-2 rounded-full bg-green-500"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="glass-effect border-b border-gray-200/50 shadow-sm">
                <div class="px-8 py-4 flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 gradient-text">@yield('title', 'Dashboard')</h2>
                        <p class="text-sm text-gray-600 mt-1">
                            <i class="fas fa-clock text-gray-400 mr-2"></i>
                            @yield('subtitle', 'Welcome back! ' . now()->format('l, F j, Y'))
                        </p>
                    </div>
                    
                    <div class="flex items-center space-x-6">
                        <!-- Quick Stats -->
                        <div class="hidden md:flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-xs text-gray-500">Online</div>
                                <div class="font-bold text-green-600">24/7</div>
                            </div>
                            <div class="h-6 w-px bg-gray-300"></div>
                            <div class="text-center">
                                <div class="text-xs text-gray-500">Response</div>
                                <div class="font-bold text-blue-600">98%</div>
                            </div>
                        </div>
                        
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full transition-all duration-300 group">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="absolute top-1 right-1 w-3 h-3 bg-red-500 rounded-full animate-ping"></span>
                            <span class="absolute top-1 right-1 w-3 h-3 bg-red-500 rounded-full"></span>
                            <div class="absolute -top-10 right-0 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                Notifications
                            </div>
                        </button>
                        
                        <!-- Search -->
                        <div class="relative group">
                            <input type="text" 
                                   placeholder="Search modules, users..." 
                                   class="pl-12 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-64 transition-all duration-300 bg-white/80 focus:bg-white shadow-sm focus:shadow-md">
                            <i class="fas fa-search absolute left-4 top-3.5 text-gray-400 group-focus-within:text-blue-500 transition-colors"></i>
                            <div class="absolute right-3 top-2.5 text-xs text-gray-400 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                ⌘K
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Breadcrumbs -->
            <div class="bg-white/80 border-b border-gray-200/50 px-8 py-3 backdrop-blur-sm">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors group">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-2 group-hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-home text-blue-600"></i>
                                </div>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                                @yield('breadcrumbs')
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            
            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-8 text-gray-900">
                <!-- Animated Background Elements -->
                <div class="fixed inset-0 pointer-events-none z-0 opacity-5">
                    <div class="absolute top-1/4 left-1/4 w-64 h-64 rounded-full bg-blue-300 blur-3xl"></div>
                    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 rounded-full bg-purple-300 blur-3xl"></div>
                </div>
                
                <div class="relative z-10">
                    <!-- Flash Messages -->
                    @if(session('success'))
                        <div class="mb-6 p-5 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 rounded-xl shadow-lg animate-fade-in">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mr-4">
                                    <i class="fas fa-check-circle text-green-500 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-green-800">Success!</p>
                                    <p class="text-green-700 text-sm mt-1">{{ session('success') }}</p>
                                </div>
                                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-green-500 hover:text-green-700 transition-colors">
                                    <i class="fas fa-times text-lg"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="mb-6 p-5 bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 rounded-xl shadow-lg animate-fade-in">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center mr-4">
                                    <i class="fas fa-exclamation-circle text-red-500 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-red-800">Oops!</p>
                                    <p class="text-red-700 text-sm mt-1">{{ session('error') }}</p>
                                </div>
                                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-500 hover:text-red-700 transition-colors">
                                    <i class="fas fa-times text-lg"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                    
                    @if(session('info'))
                        <div class="mb-6 p-5 bg-gradient-to-r from-blue-50 to-cyan-50 border-l-4 border-blue-500 rounded-xl shadow-lg animate-fade-in">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                    <i class="fas fa-info-circle text-blue-500 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-blue-800">Info</p>
                                    <p class="text-blue-700 text-sm mt-1">{{ session('info') }}</p>
                                </div>
                                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-blue-500 hover:text-blue-700 transition-colors">
                                    <i class="fas fa-times text-lg"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Page Header Actions -->
                    @hasSection('header-actions')
                        <div class="mb-8 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 p-6 bg-white rounded-2xl shadow-lg border border-gray-100">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 mb-2">
                                    @hasSection('page-title')
                                        @yield('page-title')
                                    @else
                                        @yield('title', 'Dashboard')
                                    @endif
                                </h1>
                                <p class="text-gray-600">
                                    @hasSection('page-description')
                                        @yield('page-description')
                                    @else
                                        @yield('subtitle', 'Manage your educational platform efficiently')
                                    @endif
                                </p>
                            </div>
                            <div class="flex flex-wrap gap-3">
                                @yield('header-actions')
                            </div>
                        </div>
                    @else
                        @hasSection('page-title')
                            <div class="mb-8 p-6 bg-white rounded-2xl shadow-lg border border-gray-100">
                                <h1 class="text-3xl font-bold text-gray-900">@yield('page-title')</h1>
                                @hasSection('page-description')
                                    <p class="text-gray-600 mt-2">@yield('page-description')</p>
                                @endif
                            </div>
                        @endif
                    @endif
                    
                    <!-- Main Content -->
                    <div class="relative">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <!-- Scripts -->
    <script>
        // Toggle sidebar on mobile
        function toggleSidebar() {
            const sidebar = document.querySelector('aside');
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('md:flex');
        }
        
        // Active link highlighting
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const currentSearch = window.location.search;
            const fullPath = currentPath + currentSearch;
            
            document.querySelectorAll('.sidebar-link').forEach(link => {
                const href = link.getAttribute('href');
                if (fullPath.startsWith(href) && href !== '/') {
                    link.classList.add('active');
                } else if (fullPath === href) {
                    link.classList.add('active');
                }
            });
            
            // Auto-hide flash messages after 5 seconds
            setTimeout(() => {
                document.querySelectorAll('[class*="bg-"] .fa-times').forEach(closeBtn => {
                    if (closeBtn.closest('div[class*="bg-"]')) {
                        closeBtn.closest('div[class*="bg-"]').style.opacity = '0';
                        setTimeout(() => {
                            closeBtn.closest('div[class*="bg-"]').remove();
                        }, 300);
                    }
                });
            }, 5000);
            
            // Add floating animation to elements
            const floatingElements = document.querySelectorAll('.floating-element');
            floatingElements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.5}s`;
            });
            
            // Time update in header
            function updateTime() {
                const now = new Date();
                const options = { 
                    weekday: 'long', 
                    year: 'numeric', 
                    month: 'long', 
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                };
                const timeElements = document.querySelectorAll('.time-update');
                timeElements.forEach(el => {
                    el.textContent = now.toLocaleDateString('en-US', options);
                });
            }
            
            // Update time every minute
            updateTime();
            setInterval(updateTime, 60000);
        });
        
        // Close flash messages on click
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('fa-times')) {
                const parent = e.target.closest('div[class*="bg-"]');
                if (parent) {
                    parent.style.opacity = '0';
                    setTimeout(() => {
                        parent.remove();
                    }, 300);
                }
            }
        });
        
        // Search shortcut
        document.addEventListener('keydown', function(e) {
            if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                e.preventDefault();
                document.querySelector('input[type="text"]').focus();
            }
        });
    </script>
    
    <style>
        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(-20px) scale(0.95); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
        }
        
        /* Smooth transitions */
        * {
            scroll-behavior: smooth;
        }
        
        /* Gradient borders */
        .gradient-border {
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(135deg, #667eea, #764ba2) border-box;
        }
    </style>
    
    @yield('scripts')
</body>
</html>