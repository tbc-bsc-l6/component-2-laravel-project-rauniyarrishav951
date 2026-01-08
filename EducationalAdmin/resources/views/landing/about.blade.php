@extends('layouts.landing')

@section('content')

{{-- This Section represents the About Us page for the Edu Admin platform. It includes sections for the company's story, mission, vision, values, team members, testimonials, and a call to action. --}}

<!-- About Intro -->
<div class="about_intro page_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="section_title text-center mb-5">
                    
            </div>
        </div>
        
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about_image">
                    <img src="{{ asset('images/landing/course_1.jpg') }}" alt="About Us" class="img-fluid rounded">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about_content">
                    <h3 class="about_title">Our Story</h3>
                    <p>Founded in 2015, Edu Admin began as a small initiative to make quality education accessible to everyone. What started as a single online course has grown into a comprehensive learning platform serving thousands of students worldwide.</p>
                    <p>Our mission is simple: to break down barriers to education and empower individuals to achieve their learning goals, regardless of their location, background, or circumstances.</p>
                    <div class="about_stats">
                        <div class="row">
                            <div class="col-6">
                                <div class="stat_item">
                                    <div class="stat_number" data-count="50000">0</div>
                                    <div class="stat_text">Students Enrolled</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat_item">
                                    <div class="stat_number" data-count="150">0</div>
                                    <div class="stat_text">Expert Instructors</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat_item">
                                    <div class="stat_number" data-count="300">0</div>
                                    <div class="stat_text">Courses Available</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat_item">
                                    <div class="stat_number" data-count="95">0</div>
                                    <div class="stat_text">% Satisfaction Rate</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mission & Vision -->
<div class="mission_vision_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="mission_box">
                    <div class="mission_icon">
                        <i class="fas fa-bullseye fa-3x"></i>
                    </div>
                    <h3 class="mission_title">Our Mission</h3>
                    <p>To provide accessible, high-quality education that empowers individuals to develop new skills, advance their careers, and achieve personal growth through innovative online learning experiences.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="vision_box">
                    <div class="vision_icon">
                        <i class="fas fa-eye fa-3x"></i>
                    </div>
                    <h3 class="vision_title">Our Vision</h3>
                    <p>To become the world's most trusted online learning platform, transforming lives through education and creating a global community of lifelong learners and educators.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Values -->
<div class="values_section page_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="section_title text-center">
                    <h2>Our Core Values</h2>
                    <p class="section_subtitle">The principles that guide everything we do</p>
                </div>
            </div>
        </div>
        
        <div class="row values_container">
            <!-- Value 1 -->
            <div class="col-lg-3 col-md-6 value_col">
                <div class="value_item text-center">
                    <div class="value_icon">
                        <i class="fas fa-graduation-cap fa-2x"></i>
                    </div>
                    <h4 class="value_title">Quality Education</h4>
                    <p class="value_text">We maintain the highest standards in course content, delivery, and learning outcomes.</p>
                </div>
            </div>
            

            <!-- Value 2 -->
            <div class="col-lg-3 col-md-6 value_col">
                <div class="value_item text-center">
                    <div class="value_icon">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <h4 class="value_title">Accessibility</h4>
                    <p class="value_text">Education should be available to everyone, everywhere, regardless of background.</p>
                </div>
            </div>
            
            <!-- Value 3 -->
            <div class="col-lg-3 col-md-6 value_col">
                <div class="value_item text-center">
                    <div class="value_icon">
                        <i class="fas fa-lightbulb fa-2x"></i>
                    </div>
                    <h4 class="value_title">Innovation</h4>
                    <p class="value_text">We continuously evolve our platform and teaching methods to enhance learning.</p>
                </div>
            </div>
            
            <!-- Value 4 -->
            <div class="col-lg-3 col-md-6 value_col">
                <div class="value_item text-center">
                    <div class="value_icon">
                        <i class="fas fa-handshake fa-2x"></i>
                    </div>
                    <h4 class="value_title">Community</h4>
                    <p class="value_text">We foster supportive learning communities where students and instructors grow together.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Team Preview -->
<div class="team_preview_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="section_title text-center">
                    <h2>Meet Our Leadership</h2>
                    <p class="section_subtitle">Dedicated professionals committed to educational excellence</p>
                </div>
            </div>
        </div>
        
        <div class="row team_container">
            <!-- Team Member 1 -->
            <div class="col-lg-4 col-md-6 team_col">
                <div class="team_member text-center">
                    <div class="team_image">
                        <img src="{{ asset('images/landing/teacher_1.jpg') }}" alt="CEO" class="img-fluid rounded-circle" >
                    </div>
                    <h4 class="team_name">Sarah Johnson</h4>
                    <p class="team_position">CEO & Founder</p>
                    <p class="team_bio">Former university professor with 15+ years of experience in educational technology.</p>
                    <div class="team_social">
                        <a href="#" class="social_icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social_icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social_icon"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="col-lg-4 col-md-6 team_col">
                <div class="team_member text-center">
                    <div class="team_image">
                        <img src="{{ asset('images/landing/teacher_2.jpg') }}" alt="CTO" class="img-fluid rounded-circle">
                    </div>
                    <h4 class="team_name">Michael Chen</h4>
                    <p class="team_position">Chief Technology Officer</p>
                    <p class="team_bio">Tech visionary specializing in scalable learning platforms and AI-driven education.</p>
                    <div class="team_social">
                        <a href="#" class="social_icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social_icon"><i class="fab fa-github"></i></a>
                        <a href="#" class="social_icon"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 3 -->
            <div class="col-lg-4 col-md-6 team_col">
                <div class="team_member text-center">
                    <div class="team_image">
                        <img src="{{ asset('images/landing/teacher_3.jpg') }}" alt="Head of Education" class="img-fluid rounded-circle">
                    </div>
                    <h4 class="team_name">Dr. Emily Rodriguez</h4>
                    <p class="team_position">Head of Education</p>
                    <p class="team_bio">Curriculum development expert with a PhD in Educational Psychology.</p>
                    <div class="team_social">
                        <a href="#" class="social_icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social_icon"><i class="fab fa-github"></i></a>
                        <a href="#" class="social_icon"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('landing.teachers') }}" class="button button_1">
                <span>Meet All Teachers</span>
            </a>
        </div>
    </div>
</div>

<!-- Testimonials -->
<div class="testimonials_section page_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="section_title text-center">
                    <h2>What Our Students Say</h2>
                    <p class="section_subtitle">Success stories from our learning community</p>
                </div>
            </div>
        </div>
        
        <div class="row testimonials_container">
            <!-- Testimonial 1 -->
            <div class="col-lg-4 testimonial_col">
                <div class="testimonial_item">
                    <div class="testimonial_content">
                        <p class="testimonial_text">"LearnHub transformed my career. The courses are well-structured, and the instructors are incredibly supportive. I landed a promotion within 6 months!"</p>
                    </div>
                    <div class="testimonial_author">
                        <div class="author_image">
                            <img src="{{ asset('images/landing/testimonials_user.jpg') }}" alt="Student" class="rounded-circle">
                        </div>
                        <div class="author_info">
                            <h5 class="author_name">David Wilson</h5>
                            <p class="author_course">Web Development Graduate</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="col-lg-4 testimonial_col">
                <div class="testimonial_item">
                    <div class="testimonial_content">
                        <p class="testimonial_text">"As a busy professional, I appreciate the flexibility. The mobile app lets me learn during my commute. The quality exceeds traditional classroom learning."</p>
                    </div>
                    <div class="testimonial_author">
                        <div class="author_image">
                            <img src="{{ asset('images/landing/teacher_4.jpg') }}" alt="Student" class="rounded-circle">
                        </div>
                        <div class="author_info">
                            <h5 class="author_name">Priya Sharma</h5>
                            <p class="author_course">Data Science Student</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="col-lg-4 testimonial_col">
                <div class="testimonial_item">
                    <div class="testimonial_content">
                        <p class="testimonial_text">"The community aspect is amazing. I've connected with students from around the world. The instructors are always available and genuinely care about our progress."</p>
                    </div>
                    <div class="testimonial_author">
                        <div class="author_image">
                            <img src="{{ asset('images/landing/teacher_6.jpg') }}" alt="Student" class="rounded-circle">
                        </div>
                        <div class="author_info">
                            <h5 class="author_name">James Carter</h5>
                            <p class="author_course">Digital Marketing Graduate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="cta_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="cta_content text-center">
                    <h2 class="cta_title">Ready to Start Your Learning Journey?</h2>
                    <p class="cta_text">Join thousands of successful learners who have transformed their lives with our courses.</p>
                    <div class="cta_buttons">
                        <a href="{{ route('register') }}" class="button button_1 mr-3">
                            <span>Join Now</span>
                        </a>
                        <a href="{{ route('landing.courses') }}" class="button button_outline">
                            <span>Browse Courses</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/landing/about_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/landing/about_responsive.css') }}">
<style>
    /* Main Styles */
    .about_intro {
        padding: 80px 0;
        background: #fff;
    }
    
    .about_image img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .about_content {
        padding-left: 50px;
    }
    
    .about_title {
        font-size: 32px;
        font-weight: 700;
        color: #333;
        margin-bottom: 25px;
    }
    
    .about_content p {
        color: #555;
        line-height: 1.8;
        margin-bottom: 20px;
        font-size: 16px;
    }
    
    /* Stats */
    .about_stats {
        margin-top: 40px;
    }
    
    .stat_item {
        text-align: center;
        padding: 20px 10px;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    
    .stat_number {
        font-size: 36px;
        font-weight: 700;
        color: #ffb606;
        margin-bottom: 10px;
    }
    
    .stat_text {
        color: #666;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    /* Mission & Vision */
    .mission_vision_section {
        padding: 80px 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .mission_box, .vision_box {
        padding: 40px;
        text-align: center;
    }
    
    .mission_icon, .vision_icon {
        margin-bottom: 25px;
        color: rgba(255,255,255,0.9);
    }
    
    .mission_title, .vision_title {
        font-size: 26px;
        font-weight: 600;
        margin-bottom: 20px;
        color: white;
    }
    
    .mission_box p, .vision_box p {
        color: rgba(255,255,255,0.9);
        line-height: 1.8;
        font-size: 16px;
    }
    
    /* Values */
    .values_section {
        padding: 80px 0;
        background: #fff;
    }
    
    .values_container {
        margin-top: 60px;
    }
    
    .value_item {
        padding: 40px 20px;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 30px;
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .value_item:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        background: white;
    }
    
    .value_icon {
        margin-bottom: 25px;
        color: #ffb606;
    }
    
    .value_title {
        font-size: 20px;
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
    }
    
    .value_text {
        color: #666;
        line-height: 1.6;
        font-size: 15px;
    }
    
    /* Team */
    .team_preview_section {
        padding: 80px 0;
        background: #f8f9fa;
    }
    
    .team_container {
        margin-top: 60px;
    }
    
    .team_member {
        padding: 40px 30px;
        background: white;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    
    .team_member:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    
    .team_image {
         width: 150px;
        height: 150px;
        margin: 0 auto 25px;
        overflow: hidden;
        border: 3px solid #ffb606; 
        padding: 5px;
        border-radius: 50%
    }
    
    .team_image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%
    }
    
    .team_name {
        font-size: 22px;
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }
    
    /* This line styles the position/title of the team member */
    .team_position {
        color: #ffb606;
        font-weight: 600;
        margin-bottom: 15px;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 1px;
    }
    
    .team_bio {
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
        font-size: 15px;
    }
    
    .team_social {
        display: flex;
        justify-content: center;
        gap: 15px;
    }
    
    .social_icon {
        width: 40px;
        height: 40px;
        background: #f8f9fa;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .social_icon:hover {
        background: #ffb606;
        color: white;
        transform: scale(1.1);
    }
    
    /* Testimonials */
    .testimonials_section {
        padding: 80px 0;
        background: #fff;
    }
    
    .testimonials_container {
        margin-top: 60px;
    }
    
    .testimonial_item {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 40px 30px;
        height: 100%;
        position: relative;
    }
    
    .testimonial_content {
        margin-bottom: 30px;
    }
    
    .testimonial_text {
        color: #555;
        font-style: italic;
        line-height: 1.8;
        font-size: 16px;
        position: relative;
        padding-left: 20px;
    }
    
    .testimonial_text:before {
        content: '"';
        position: absolute;
        left: 0;
        top: -10px;
        font-size: 60px;
        color: #ffb606;
        opacity: 0.3;
        font-family: Georgia, serif;
    }
    
    .testimonial_author {
        display: flex;
        align-items: center;
    }
    
    .author_image {
        width: 60px;
        height: 60px;
        margin-right: 20px;
    }
    
    .author_image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .author_name {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }
    
    .author_course {
        color: #666;
        font-size: 14px;
    }
    
    /* CTA */
    .cta_section {
        padding: 100px 0;
        background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ asset("images/landing/cta_background.jpg") }}');
        background-size: cover;
        background-position: center;
        color: white;
    }
    
    .cta_title {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 20px;
        color: white;
    }
    
    .cta_text {
        font-size: 20px;
        color: rgba(255,255,255,0.9);
        margin-bottom: 40px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .button_outline {
        background: transparent;
        border: 2px solid #ffb606;
        height: 48px;
        padding-left: 38px;
        padding-right: 38px;
        border-radius: 0px;
        text-align: center;
        cursor: pointer;
        display: inline-block;
        transition: all 200ms ease;
        text-decoration: none;
    }
    
    .button_outline span {
        font-size: 14px;
        font-weight: 700;
        color: #ffb606;
        text-transform: uppercase;
        line-height: 48px;
        white-space: nowrap;
        text-decoration: none;
    }
    
    .button_outline:hover {
        background: #ffb606;
    }
    
    .button_outline:hover span {
        color: #FFFFFF;
    }
    
    /* Responsive */
    @media (max-width: 991px) {
        .about_content {
            padding-left: 0;
            margin-top: 40px;
        }
        
        .cta_title {
            font-size: 32px;
        }
        
        .cta_buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .cta_buttons .mr-3 {
            margin-right: 0 !important;
        }
    }
    
    @media (max-width: 767px) {
        .about_title {
            font-size: 26px;
        }
        
        .stat_number {
            font-size: 28px;
        }
        
        .team_image {
            width: 120px;
            height: 120px;
        }
        
        .cta_title {
            font-size: 26px;
        }
        
        .cta_text {
            font-size: 16px;
        }
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('js/landing/about_custom.js') }}"></script>
<script>
    // Animate counter numbers
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.stat_number');
        
        const animateCounter = (counter) => {
            const target = parseInt(counter.getAttribute('data-count') || counter.textContent);
            const increment = target / 200;
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target;
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current);
                }
            }, 10);
        };
        
        // Intersection Observer to trigger animation when element is visible
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        counters.forEach(counter => {
            counter.textContent = '0';
            observer.observe(counter);
        });
    });
</script>
@endpush
@endsection