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

    <!-- Custom Styles -->
    <style>
        /* Navigation Bar */
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.5rem;
            color: #2d3748;
        }

        .navbar-brand-logo {
            font-size: 2rem;
            margin-right: 0.5rem;
        }

        .navbar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #4a5568;
            cursor: pointer;
        }

        .navbar-menu {
            display: flex;
            align-items: center;
        }

        .navbar-links {
            display: flex;
            gap: 2rem;
        }

        .navbar-link {
            text-decoration: none;
            color: #4a5568;
            font-weight: 500;
            transition: color 0.3s;
        }

        .navbar-link:hover {
            color: #3182ce;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #f0f9ff 0%, #e6f7ff 100%);
            padding: 6rem 2rem 4rem;
            margin-top: 4rem;
        }

        .hero-card {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 4rem;
        }

        .hero-card .left {
            flex: 1;
        }

        .brand-container {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .brand-text {
            margin-left: 1rem;
        }

        .brand-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1a202c;
        }

        .brand-subtitle {
            font-size: 1.2rem;
            color: #4a5568;
            margin-top: 0.25rem;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            color: #1a202c;
            margin-bottom: 1.5rem;
        }

        .hero-description {
            font-size: 1.25rem;
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 2.5rem;
            max-width: 600px;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-block;
            padding: 1rem 2rem;
            background-color: #3182ce;
            color: white;
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #2c5282;
        }

        .btn-secondary {
            display: inline-block;
            padding: 1rem 2rem;
            background-color: white;
            color: #3182ce;
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: 600;
            border: 2px solid #3182ce;
            transition: all 0.3s;
        }

        .btn-secondary:hover {
            background-color: #ebf8ff;
        }

        .hero-image {
            flex: 1;
            text-align: center;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 1rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Features Section */
        .features-section {
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 3rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 1rem;
        }

        .feature-divider {
            width: 3rem;
            height: 3px;
            background-color: #3182ce;
            margin-bottom: 1rem;
        }

        .feature-description {
            color: #4a5568;
            line-height: 1.6;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #3182ce 0%, #2c5282 100%);
            color: white;
            padding: 5rem 2rem;
            text-align: center;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .btn-light {
            display: inline-block;
            padding: 1rem 2rem;
            background-color: white;
            color: #3182ce;
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: transform 0.3s;
        }

        .btn-light:hover {
            transform: translateY(-2px);
        }

        /* Footer */
        .site-footer {
            background-color: #1a202c;
            color: white;
            padding: 4rem 2rem 2rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-col h3,
        .footer-col h4 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .footer-col h4 {
            color: #cbd5e0;
        }

        .footer-col ul {
            list-style: none;
            padding: 0;
        }

        .footer-col ul li {
            margin-bottom: 0.75rem;
        }

        .footer-col ul li a {
            color: #cbd5e0;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-col ul li a:hover {
            color: white;
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 2rem;
            border-top: 1px solid #4a5568;
            text-align: center;
            color: #cbd5e0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar-toggle {
                display: block;
            }

            .navbar-menu {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background-color: white;
                padding: 1rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                display: none;
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar-menu.active {
                display: flex;
            }

            .navbar-links {
                flex-direction: column;
                gap: 1rem;
                width: 100%;
            }

            .hero-card {
                flex-direction: column;
                text-align: center;
                gap: 2rem;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-description {
                font-size: 1.1rem;
            }

            .brand-container {
                justify-content: center;
            }

            .section-title {
                font-size: 2rem;
            }

            .cta-title {
                font-size: 2rem;
            }
        }
    </style>
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
                    <a href="{{ url('/about') }}" class="navbar-link">About</a>
                    <a href="{{ url('/contact') }}" class="navbar-link">Contact</a>
                    <a href="{{ url('/blogs') }}" class="navbar-link">Blogs</a>
                    
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="educational-content">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-card">
                <div class="left">
                    <div class="brand-container">
                        
                        <div class="brand-text">
                            
                            
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
                            <a href="{{ url('/admin/dashboard') }}" class="btn-primary">
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
                <!-- <div class="hero-image">
                    <!-- Placeholder for hero image -->
                    <!-- <div style="background: linear-gradient(135deg, #3182ce 0%, #2c5282 100%); border-radius: 1rem; padding: 3rem; color: white; font-size: 1.5rem; font-weight: 600;">
                        📊 Modern Dashboard Preview
                    </div> -->
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
            <div class="cta-buttons">
               
               
            </div>
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
                        <li><a href="{{ url('/docs') }}">Documentation</a></li>
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

    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        document.getElementById('navbarToggle').addEventListener('click', function() {
            const menu = document.getElementById('navbarMenu');
            menu.classList.toggle('active');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('navbarMenu');
            const toggle = document.getElementById('navbarToggle');
            
            if (!menu.contains(event.target) && !toggle.contains(event.target)) {
                menu.classList.remove('active');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>