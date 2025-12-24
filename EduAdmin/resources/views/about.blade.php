@extends('layouts.app')

@section('title', 'About Us - EduAdmin')

@section('content')
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <!-- Main Content Card -->
        <div class="glass-card rounded-2xl p-8 md:p-12 animate-fade-in-up">
            <!-- Page Header -->
            <h1 class="text-4xl md:text-5xl font-bold mb-6 text-gradient">About Edu Admin</h1>
            <p class="text-xl text-gray-200 mb-10 leading-relaxed">
                Edu Admin is a modern educational management platform designed to simplify
                the administration of institutions. From managing users and courses to analytics
                and reporting, Edu Admin provides a clean and powerful interface built for productivity.
            </p>

            <!-- Our Mission Section -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold mb-4 text-white">Our Mission</h2>
                <p class="text-gray-200 leading-relaxed">
                    Our mission is to empower schools, colleges, and learning centers with next-generation
                    tools that streamline operations. We aim to eliminate manual paperwork, improve accuracy,
                    and ensure that administrators, teachers, and students have everything they need—instantly.
                </p>
            </div>

            <!-- Why Choose Us Section -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold mb-4 text-white">Why Choose Edu Admin?</h2>
                <ul class="space-y-3 text-gray-200">
                    <li class="flex items-start">
                        <span class="text-green-400 mr-2">•</span>
                        <span>Intuitive dashboards and clean design</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-green-400 mr-2">•</span>
                        <span>Easy user & course management</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-green-400 mr-2">•</span>
                        <span>Smart analytics for tracking progress</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-green-400 mr-2">•</span>
                        <span>Built with performance and security in mind</span>
                    </li>
                </ul>
            </div>

            <!-- Our Team Section -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold mb-8 text-white">Our Team</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Development Lead -->
                    <div class="bg-white/5 p-6 rounded-xl border border-white/10 hover:bg-white/10 transition-all duration-300 hover:-translate-y-1">
                        <div class="icon-circle mx-auto mb-4">
                            👨‍💻
                        </div>
                        <h4 class="text-xl font-semibold text-center mb-2">Development Lead</h4>
                        <p class="text-gray-300 text-center text-sm">Architecting a fast, scalable system.</p>
                    </div>

                    <!-- UI/UX Designer -->
                    <div class="bg-white/5 p-6 rounded-xl border border-white/10 hover:bg-white/10 transition-all duration-300 hover:-translate-y-1">
                        <div class="icon-circle mx-auto mb-4">
                            🎨
                        </div>
                        <h4 class="text-xl font-semibold text-center mb-2">UI/UX Designer</h4>
                        <p class="text-gray-300 text-center text-sm">Designing beautiful user experiences.</p>
                    </div>

                    <!-- QA Engineer -->
                    <div class="bg-white/5 p-6 rounded-xl border border-white/10 hover:bg-white/10 transition-all duration-300 hover:-translate-y-1">
                        <div class="icon-circle mx-auto mb-4">
                            🧪
                        </div>
                        <h4 class="text-xl font-semibold text-center mb-2">QA Engineer</h4>
                        <p class="text-gray-300 text-center text-sm">Ensuring quality and perfect workflows.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<footer class="mt-16 bg-white/5 backdrop-blur-sm rounded-t-2xl border-t border-white/10">
    <div class="max-w-6xl mx-auto py-12 px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Brand Column -->
            <div>
                <h3 class="text-xl font-bold mb-4">Edu Admin</h3>
                <p class="text-gray-300 leading-relaxed">
                    Advanced educational management platform designed for modern institutions. Smart, secure, and scalable.
                </p>
            </div>

            <!-- Quick Links Column -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/blogs/create') }}" class="text-gray-300 hover:text-white transition-colors">Pricing</a></li>
                    <li><a href="{{ url('/terms') }}" class="text-gray-300 hover:text-white transition-colors">Support Center</a></li>
                    <li><a href="{{ url('/about') }}" class="text-gray-300 hover:text-white transition-colors">API Documentation</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Resources</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/blogs/create') }}" class="text-gray-300 hover:text-white transition-colors">System Status</a></li>
                    
                </ul>
            </div>

            <!-- Contact Column -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact</h4>
                <ul class="space-y-2 text-gray-300">
                    <li>Email: support@eduadmin.com</li>
                    <li>Phone: +1 (555) 123-4567</li>
                </ul>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-white/10 text-center text-gray-400">
            <p>© {{ date('Y') }} Edu Admin — All rights reserved.</p>
        </div>
    </div>
</footer>
@endsection