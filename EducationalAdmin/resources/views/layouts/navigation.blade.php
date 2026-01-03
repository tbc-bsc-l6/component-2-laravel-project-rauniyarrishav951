<nav x-data="{ open: false }" class="bg-gradient-to-r from-gray-900 to-gray-800 shadow-xl">
    <!-- Primary Navigation Menu -->
    <div class="max-w-8xl mx-auto px-6">
        <div class="flex justify-between h-20">
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform duration-300">
                            <span class="text-white text-xl">📚</span>
                        </div>
                        <div>
                            <span class="text-xl font-bold text-white tracking-tight">EduAdmin</span>
                            <span class="block text-xs text-blue-300 font-medium">Management System</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-6 sm:flex">
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" 
                               class="relative group px-4 py-2 rounded-lg transition-all duration-300 hover:bg-white/10">
                        <div class="flex items-center space-x-2">
                            <!-- <i class="fas fa-chart-line text-blue-300 group-hover:text-blue-100"></i>
                            <span class="font-medium text-gray-100 group-hover:text-white">{{ __('Hello ! Admin') }}</span> -->
                        </div>
                        <div class="absolute -bottom-1 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                    </x-nav-link>
                </div>

                <!-- Quick Stats -->
                <div class="hidden lg:flex items-center space-x-6">
                    <div class="flex items-center space-x-2 text-sm">
                        <div class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></div>
                        <span class="text-gray-300">System Online</span>
                    </div>
                    <div class="h-6 w-px bg-gray-700"></div>
                    <div class="text-sm text-gray-300">
                        <i class="far fa-clock mr-1"></i>
                        {{ now()->format('h:i A') }}
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <div class="relative group">
                    <button class="relative p-2 text-gray-300 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full animate-ping"></span>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <div class="absolute -top-10 right-0 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                        Notifications
                    </div>
                </div>

                <!-- User Dropdown -->
                <div class="relative group">
                    <x-dropdown align="right" width="56">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center space-x-3 px-4 py-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-gray-700 hover:border-gray-600 text-gray-100 hover:text-white transition-all duration-300 group">
                                <div class="flex items-center space-x-3">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-md">
                                        <span class="font-bold text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                    </div>
                                    <div class="text-left">
                                        <div class="font-semibold">{{ Auth::user()->name }}</div>
                                        <div class="text-xs text-gray-400">Administrator</div>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-down text-gray-400 group-hover:text-gray-300 transition-colors duration-200"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Dropdown Header -->
                            <div class="px-4 py-3 border-b border-gray-200">
                                <div class="font-semibold text-gray-900">{{ Auth::user()->name }}</div>
                                <div class="text-sm text-gray-600 truncate">{{ Auth::user()->email }}</div>
                            </div>
                            
                            <!-- Dropdown Items -->
                            <div class="py-1">
                                <x-dropdown-link :href="route('profile.edit')" class="flex items-center space-x-2 px-4 py-2.5 hover:bg-blue-50 transition-colors">
                                    <i class="fas fa-user-circle text-gray-500 w-5"></i>
                                    <span>{{ __('Profile Settings') }}</span>
                                </x-dropdown-link>
                                
                                <x-dropdown-link href="#" class="flex items-center space-x-2 px-4 py-2.5 hover:bg-blue-50 transition-colors">
                                    <i class="fas fa-cog text-gray-500 w-5"></i>
                                    <span>{{ __('Preferences') }}</span>
                                </x-dropdown-link>
                                
                                <x-dropdown-link href="#" class="flex items-center space-x-2 px-4 py-2.5 hover:bg-blue-50 transition-colors">
                                    <i class="fas fa-question-circle text-gray-500 w-5"></i>
                                    <span>{{ __('Help & Support') }}</span>
                                </x-dropdown-link>
                                
                                <div class="border-t border-gray-100 mt-1 pt-1">
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();"
                                                class="flex items-center space-x-2 px-4 py-2.5 text-red-600 hover:bg-red-50 transition-colors">
                                            <i class="fas fa-sign-out-alt w-5"></i>
                                            <span>{{ __('Log Out') }}</span>
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger Menu (Mobile) -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2.5 rounded-lg text-gray-300 hover:text-white hover:bg-white/10 focus:outline-none transition-all duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gradient-to-b from-gray-800 to-gray-900 shadow-inner">
        <!-- Mobile User Info -->
        <div class="px-6 py-4 border-b border-gray-700">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-md">
                    <span class="font-bold text-white text-lg">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <div>
                    <div class="font-bold text-white">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-blue-300">Administrator</div>
                    <div class="text-xs text-gray-400">{{ Auth::user()->email }}</div>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Links -->
        <div class="pt-3 pb-2 space-y-1">
            <x-responsive-nav-link :href="route('admin.dashboard')" 
                                  :active="request()->routeIs('admin.dashboard')"
                                  class="flex items-center space-x-3 px-6 py-3.5 text-gray-100 hover:text-white hover:bg-white/10 transition-colors">
                <i class="fas fa-chart-line w-5 text-center"></i>
                <span class="font-medium">{{ __('Dashboard') }}</span>
                @if(request()->routeIs('admin.dashboard'))
                <span class="ml-auto w-2 h-2 rounded-full bg-blue-400 animate-pulse"></span>
                @endif
            </x-responsive-nav-link>
        </div>

        <!-- Mobile Settings Options -->
        <div class="pt-3 pb-4 border-t border-gray-700">
            <div class="space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" 
                                      class="flex items-center space-x-3 px-6 py-3.5 text-gray-100 hover:text-white hover:bg-white/10 transition-colors">
                    <i class="fas fa-user-circle w-5 text-center"></i>
                    <span>{{ __('Profile') }}</span>
                </x-responsive-nav-link>
                
                <x-responsive-nav-link href="#" 
                                      class="flex items-center space-x-3 px-6 py-3.5 text-gray-100 hover:text-white hover:bg-white/10 transition-colors">
                    <i class="fas fa-cog w-5 text-center"></i>
                    <span>{{ __('Settings') }}</span>
                </x-responsive-nav-link>
                
                <x-responsive-nav-link href="#" 
                                      class="flex items-center space-x-3 px-6 py-3.5 text-gray-100 hover:text-white hover:bg-white/10 transition-colors">
                    <i class="fas fa-question-circle w-5 text-center"></i>
                    <span>{{ __('Help') }}</span>
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                                          onclick="event.preventDefault();
                                                      this.closest('form').submit();"
                                          class="flex items-center space-x-3 px-6 py-3.5 text-red-400 hover:text-red-300 hover:bg-red-900/20 transition-colors border-t border-gray-700 mt-2">
                        <i class="fas fa-sign-out-alt w-5 text-center"></i>
                        <span class="font-medium">{{ __('Log Out') }}</span>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>

        <!-- Mobile Footer -->
        <div class="px-6 py-3 border-t border-gray-700">
            <div class="text-xs text-gray-500 flex items-center justify-between">
                <span>EduAdmin v2.0</span>
                <div class="flex items-center space-x-1">
                    <div class="w-1.5 h-1.5 rounded-full bg-green-500"></div>
                    <span class="text-green-400">Online</span>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Custom animations */
    @keyframes glow {
        0%, 100% { box-shadow: 0 0 5px rgba(59, 130, 246, 0.5); }
        50% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.8); }
    }
    
    .glow-effect {
        animation: glow 2s infinite;
    }
    
    /* Smooth transitions */
    nav a, nav button {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Custom scrollbar for dropdown */
    [x-ref="content"] {
        scrollbar-width: thin;
        scrollbar-color: #d1d5db #f3f4f6;
    }
    
    [x-ref="content"]::-webkit-scrollbar {
        width: 6px;
    }
    
    [x-ref="content"]::-webkit-scrollbar-track {
        background: #f3f4f6;
        border-radius: 10px;
    }
    
    [x-ref="content"]::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 10px;
    }
    
    /* Gradient border effect */
    .gradient-border {
        position: relative;
        border: 2px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #667eea, #764ba2) border-box;
    }
</style>

<script>
    // Add some interactivity
    document.addEventListener('DOMContentLoaded', function() {
        // Update time every minute
        function updateTime() {
            const now = new Date();
            const timeElements = document.querySelectorAll('.time-update');
            timeElements.forEach(el => {
                el.textContent = now.toLocaleTimeString('en-US', { 
                    hour: '2-digit', 
                    minute: '2-digit',
                    hour12: true 
                });
            });
        }
        
        updateTime();
        setInterval(updateTime, 60000);
        
        // Add hover effects to nav items
        const navItems = document.querySelectorAll('nav a, nav button');
        navItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-1px)';
            });
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>