<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Edu Admin') }}</title>

        <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a]">
        <!-- Navigation Bar -->
        <nav class="navbar">
            <div class="navbar-container">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <div class="navbar-brand-logo">📚</div>
                    <span>Edu Admin</span>
                </a>

                <button class="navbar-toggle" id="navbarToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="navbar-menu" id="navbarMenu">
                    <div class="navbar-links">
                        <a href="{{ url('/') }}" class="navbar-link">Home</a>
                        <a href="{{ url('/features') }}" class="navbar-link">Features</a>
                        <a href="{{ url('/about') }}" class="navbar-link">About</a>
                        <a href="{{ url('/contact') }}" class="navbar-link">Contact</a>
                         <a href="{{ url('/blogs') }}" class="navbar-link">Blogs</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Educational Content -->
        <div class="educational-content pt-16">
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="hero-card">
                    <div class="left">
                        <div class="brand-container">
                            <div class="brand-text">
                                <div class="brand-title">Edu Admin </div>
                                <div class="brand-subtitle"> Educational Administration Platform</div>
                            </div>
                        </div>

                        <h1 class="hero-title">Transform Education Management</h1>
                        <p class="hero-description">
                            Streamline academic operations with our comprehensive platform. Create and manage modules, 
                            assign teachers, enrol students, and monitor progress with an intuitive dashboard designed 
                            for modern educational institutions.
                        </p>

                        <div class="hero-buttons">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn-primary">
                                    Go to Dashboard
                                </a>
                            @else
                                <a href="{{ route('register') }}" class="btn-primary">
                                    Register 
                                </a>
                                <a href="{{ route('login') }}" class="btn-secondary">
                                    Sign In
                                </a>
                            @endauth
                        </div>
                    </div>

                    <div class="right">
                        <div class="animated-symbol">
                            <div class="symbol-circle"></div>
                            <div class="symbol-inner">
                                <div class="symbol-icon">🎓</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="features-section">
                <h2 class="section-title">Powerful Features</h2>
                <div class="features-grid">
                    <article class="feature-card">
                        <div class="feature-icon">👥</div>
                        <h3 class="feature-title">User Management</h3>
                        <div class="feature-divider"></div>
                        <p class="feature-description">
                            Manage admins, teachers, and students with granular roles, permissions, and automated workflows.
                        </p>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">🗂️</div>
                        <h3 class="feature-title">Course Management</h3>
                        <div class="feature-divider"></div>
                        <p class="feature-description">
                            Organize and track courses, modules, and curriculum with our intuitive management tools.
                        </p>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">📊</div>
                        <h3 class="feature-title">Analytics Dashboard</h3>
                        <div class="feature-divider"></div>
                        <p class="feature-description">
                            Get actionable insights with detailed reports, metrics, and exportable performance data.
                        </p>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">📱</div>
                        <h3 class="feature-title">Mobile Ready</h3>
                        <div class="feature-divider"></div>
                        <p class="feature-description">
                            Access your dashboard anytime, anywhere with our fully responsive mobile interface.
                        </p>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">🔒</div>
                        <h3 class="feature-title">Secure Platform</h3>
                        <div class="feature-divider"></div>
                        <p class="feature-description">
                            Enterprise-grade security with encrypted data, secure logins, and regular backups.
                        </p>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">🔄</div>
                        <h3 class="feature-title">Automated Workflows</h3>
                        <div class="feature-divider"></div>
                        <p class="feature-description">
                            Streamline operations with automated notifications, grading, and progress tracking.
                        </p>
                    </article>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="cta-section">
                <h2 class="cta-title">Ready to Transform Your Institution?</h2>
                <p style="color: rgba(255,255,255,0.9); margin-bottom: 2rem; font-size: 1.2rem;">
                    Join thousands of educational institutions using Edu Admin 
                </p>
               
               
            </section>

            <!-- Footer -->
            <footer class="site-footer">
                <div class="footer-container">
                    <div class="footer-col">
                        <h3>Edu Admin</h3>
                        <p style="color: rgba(255,255,255,0.8); line-height: 1.6;">
                            Advanced educational management platform designed for modern institutions. 
                            Smart, secure, and scalable.
                        </p>
                    </div>

                    <div class="footer-col">
                        <h4>Quick Links</h4>
                        <ul>
                           
                            <li><a href="{{ url('/pricing') }}">Pricing</a></li>
                            <li><a href="{{ url('/support') }}">Support Center</a></li>
                            <li><a href="{{ url('/api') }}">API Documentation</a></li>
                        </ul>
                    </div>

                    <div class="footer-col">
                        <h4>Resources</h4>
                        <ul>
                            <li><a href="{{ url('/status') }}">System Status</a></li>
                            
                        </ul>
                    </div>

                    <div class="footer-col">
                        <h4>Contact</h4>
                        <ul>
                            <li>Email: support@eduadmin.com</li>
                            <li>Phone: +1 (555) 123-4567</li>
                            <li>Address: 123 Education St, Tech City</li>
                        </ul>
                    </div>
                </div>

                <div class="footer-bottom">
                    © {{ date('Y') }} Edu Admin . All rights reserved.
                    <div style="margin-top: 1rem; font-size: 0.85rem;">
                        <a href="{{ url('/privacy') }}" style="color: rgba(255,255,255,0.7); margin: 0 1rem;">Privacy Policy</a>
                        <a href="{{ url('/terms') }}" style="color: rgba(255,255,255,0.7); margin: 0 1rem;">Terms of Service</a>
                        <a href="{{ url('/cookies') }}" style="color: rgba(255,255,255,0.7); margin: 0 1rem;">Cookie Policy</a>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>