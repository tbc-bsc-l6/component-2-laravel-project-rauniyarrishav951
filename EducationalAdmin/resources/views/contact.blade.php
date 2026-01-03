<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - EduAdmin</title>

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
        
        .form-input {
            transition: all 0.3s ease;
            border: 2px solid #e2e8f0;
        }
        
        .form-input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
        
        .success-message {
            display: none;
            background-color: #10b981;
            color: white;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
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
                    <a href="/about" class="text-gray-600 hover:text-blue-600 transition-colors">About</a>
                    <a href="/contact" class="text-blue-600 font-medium">Contact</a>
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
            <a href="/about" class="block py-2 text-gray-600 hover:text-blue-600">About</a>
            <a href="/contact" class="block py-2 text-blue-600 font-medium">Contact</a>
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
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Left Column - Contact Form -->
                <div class="bg-white rounded-2xl p-8 shadow-soft">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Send A Message</h2>
                   
                    
                    <!-- Success Message (Hidden by default) -->
                    <div id="successMessage" class="success-message">
                        <i class="fas fa-check-circle mr-2"></i>
                        Thank you for your message! We'll get back to you soon.
                    </div>
                    
                    <form id="contactForm" class="space-y-6" action="/contact" method="POST">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    First Name *
                                </label>
                                <input type="text" id="first_name" name="first_name" required
                                    class="w-full px-4 py-3 rounded-lg form-input focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Last Name *
                                </label>
                                <input type="text" id="last_name" name="last_name" required
                                    class="w-full px-4 py-3 rounded-lg form-input focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email Address *
                            </label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 rounded-lg form-input focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label for="institution" class="block text-sm font-medium text-gray-700 mb-2">
                                Institution / Organization
                            </label>
                            <input type="text" id="institution" name="institution"
                                class="w-full px-4 py-3 rounded-lg form-input focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                Subject *
                            </label>
                            <select id="subject" name="subject" required
                                class="w-full px-4 py-3 rounded-lg form-input focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="sales">Sales Questions</option>
                                <option value="support">Technical Support</option>
                                <option value="demo">Request a Demo</option>
                                <option value="partnership">Partnership Opportunities</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                Message *
                            </label>
                            <textarea id="message" name="message" rows="5" required
                                class="w-full px-4 py-3 rounded-lg form-input focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Tell us how we can help you..."></textarea>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="checkbox" id="newsletter" name="newsletter"
                                class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500">
                            <label for="newsletter" class="ml-2 text-sm text-gray-700">
                                Subscribe to our newsletter for updates and tips
                            </label>
                        </div>
                        
                        <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-3 px-6 rounded-lg hover:opacity-90 transition-opacity">
                            Send Message
                        </button>
                        
                        <p class="text-sm text-gray-500 text-center">
                            By submitting this form, you agree to our 
                            <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>.
                        </p>
                    </form>
                </div>
               
            
            <!-- FAQ Section -->
            <div class="mt-20">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Frequently Asked Questions</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-soft">
                        <h4 class="text-xl font-semibold text-gray-900 mb-3">
                            How do I request a demo?
                        </h4>
                        <p class="text-gray-600">
                            You can request a demo by filling out the contact form above and selecting "Request a Demo" 
                            as your subject, or by emailing us at <strong>demo@eduadmin.com</strong>.
                        </p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-soft">
                        <h4 class="text-xl font-semibold text-gray-900 mb-3">
                            What support options are available?
                        </h4>
                        <p class="text-gray-600">
                            We offer email support, live chat during business hours, and a comprehensive knowledge base 
                            with tutorials and documentation.
                        </p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-soft">
                        <h4 class="text-xl font-semibold text-gray-900 mb-3">
                            Do you offer custom solutions?
                        </h4>
                        <p class="text-gray-600">
                            Yes, we work with institutions to develop custom solutions. Please contact our sales team 
                            to discuss your specific requirements.
                        </p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-soft">
                        <h4 class="text-xl font-semibold text-gray-900 mb-3">
                            What are your business hours?
                        </h4>
                        <p class="text-gray-600">
                            Our support team is available Monday through Friday, 9:00 AM to 6:00 PM EST. 
                            Emergency support is available 24/7 for critical issues.
                        </p>
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
                <p>© {{ date('Y') }} EduAdmin. All rights reserved.</p>
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
        
        // Contact form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = {
                first_name: document.getElementById('first_name').value,
                last_name: document.getElementById('last_name').value,
                email: document.getElementById('email').value,
                institution: document.getElementById('institution').value,
                subject: document.getElementById('subject').value,
                message: document.getElementById('message').value,
                newsletter: document.getElementById('newsletter').checked,
                _token: document.querySelector('input[name="_token"]').value
            };
            
            // Show success message
            const successMessage = document.getElementById('successMessage');
            successMessage.style.display = 'block';
            
            // Scroll to success message
            successMessage.scrollIntoView({ behavior: 'smooth' });
            
            // Reset form after 2 seconds
            setTimeout(() => {
                this.reset();
            }, 2000);
            
            // Hide success message after 5 seconds
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000);
            
            // In a real Laravel application, you would submit to a route
            // For now, we're just showing the success message
            console.log('Form data:', formData);
        });
    </script>
</body>
</html>