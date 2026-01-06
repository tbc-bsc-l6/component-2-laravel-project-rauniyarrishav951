{{-- 
    welcome.blade.php - Main landing page for  EduAdmin 
    This file contains the homepage structure with hero sections, services, testimonials, and statistics
--}}

{{-- Extends the main landing layout template --}}
@extends('layouts.landing')

{{-- Defines the content section that will be inserted into the layout --}}
@section('content')

<!-- Home Section - Main hero/slider section -->
<div class="home" id="home">
    {{-- 
        @push - Adds inline CSS styles to the 'styles' stack in the parent layout
        This keeps page-specific styles organized and avoids global CSS pollution
    --}}
    @push('styles')
    <style>
        /* Milestones Styling - Statistics counter section */
        .milestones {
            width: 100%;
            background: #1a1a1a; /* Dark background */
            position: relative; /* For background image positioning */
        }
        .milestones_background {
            position: absolute; /* Background image behind content */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            opacity: 0.27; /* Semi-transparent background */
        }
        .milestone_col {
            padding-top: 80px; /* Vertical spacing */
            padding-bottom: 80px;
        }
        .milestone {
            position: relative; /* For positioning within column */
        }
        .milestone_icon {
            margin-bottom: 20px; /* Space between icon and counter */
        }
        .milestone_icon img {
            width: 60px; /* Fixed icon size */
            height: auto; /* Maintain aspect ratio */
        }
        .milestone_counter {
            font-size: 36px; /* Large counter numbers */
            font-weight: 700; /* Bold text */
            color: #ffb606; /* Gold/yellow brand color */
            line-height: 1; /* Tight line spacing */
            margin-bottom: 10px; /* Space between counter and text */
        }
        .milestone_text {
            font-size: 14px;
            font-weight: 500;
            color: #FFFFFF; /* White text */
            text-transform: uppercase; /* All caps for labels */
            letter-spacing: 0.5px; /* Slight letter spacing */
        }
        
        /* Fix testimonials styling - no parallax */
        .testimonials_background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            opacity: 0.27;
        }
        .testimonials_background_container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden; /* Hide any overflow from background */
        }
        .testimonials {
            position: relative; /* For background container positioning */
            width: 100%;
            background: #1a1a1a; /* Dark background */
            padding-top: 100px; /* Section padding */
            padding-bottom: 100px;
        }
        .testimonials .container {
            position: relative;
            z-index: 1; /* Bring content above background */
        }
        .testimonials .section_title h1 {
            color: #FFFFFF !important; /* Force white title on dark background */
        }
        
        /* Section title styling */
        .section_title h1 {
            color: #1e40af; /* Blue brand color */
            font-size: 2.5rem; /* Large heading size */
            margin-bottom: 2rem; /* Space below title */
        }
        
        /* Hero boxes styling - text white */
        .hero_box_title {
            color: #FFFFFF !important; /* White titles for hero boxes */
        }
        .hero_box_link {
            color: #FFFFFF !important;
            opacity: 0.9; /* Slightly transparent */
        }
        .hero_box_link:hover {
            color: #ffb606 !important; /* Gold on hover */
            opacity: 1; /* Full opacity on hover */
        }
        
        /* Course card title links */
        .card-title a {
            color: #1e40af; /* Blue links */
            font-weight: 600; /* Semi-bold */
            text-decoration: none; /* Remove underline */
        }
        .card-title a:hover {
            color: #3b82f6; /* Lighter blue on hover */
        }
        
        /* Register section title styling */
        .register_title span {
            color: #ffb606; /* Gold highlight for discount */
            font-weight: 700; /* Bold for emphasis */
        }
        
        /* Button Styling from original template */
        .button {
            height: 48px; /* Fixed button height */
            padding-left: 38px; /* Horizontal padding */
            padding-right: 38px;
            background: #ffb606; /* Gold background */
            border-radius: 0px; /* Square corners */
            text-align: center; /* Center text */
            cursor: pointer; /* Pointer cursor on hover */
        }
        .button a {
            font-size: 14px;
            font-weight: 700;
            color: #FFFFFF; /* White text */
            text-transform: uppercase; /* All caps */
            line-height: 48px; /* Vertically center text (same as button height) */
            white-space: nowrap; /* Prevent text wrapping */
            -webkit-transition: all 200ms ease; /* Smooth hover transitions */
            -moz-transition: all 200ms ease;
            -ms-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease;
        }
        .button:hover {
            box-shadow: 0px 10px 20px rgba(0,0,0,0.1); /* Lift effect on hover */
            -webkit-transform: translateY(-3px); /* Move up slightly */
            -moz-transform: translateY(-3px);
            -ms-transform: translateY(-3px);
            -o-transform: translateY(-3px);
            transform: translateY(-3px);
        }
        .button_1 {
            background: #ffb606; /* Gold button variant */
        }
        .button_1:hover {
            background: #e6a505; /* Darker gold on hover */
        }
        
        /* Register button - white with gold text */
        .register_button.button_1 {
            background: #FFFFFF; /* White background */
            border: 2px solid #ffb606; /* Gold border */
        }
        .register_button.button_1 a {
            color: #ffb606; /* Gold text */
            font-weight: 700;
        }
        .register_button.button_1:hover {
            background: #ffb606; /* Gold background on hover */
        }
        .register_button.button_1:hover a {
            color: #FFFFFF; /* White text on hover */
        }
        
        /* Dashboard button same styling */
        .register_button a {
            display: block; /* Make link fill entire button */
        }
        
        /* Responsive milestones - adjust for smaller screens */
        @media (max-width: 991px) {
            .milestone_col {
                padding-top: 40px; /* Reduce padding on mobile */
                padding-bottom: 40px;
            }
            .milestone_counter {
                font-size: 30px; /* Smaller counter on mobile */
            }
        }
    </style>
    @endpush
    
    <!-- Hero Slider - Main image carousel at top of page -->
    <div class="hero_slider_container">
        <div class="hero_slider owl-carousel"> <!-- Owl Carousel for slides -->
            
            <!-- Hero Slide 1 - First slide in carousel -->
            <div class="hero_slide">
                <div class="hero_slide_background" style="background-image:url({{ asset('images/landing/slider_background.jpg') }})"></div>
                <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                    <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
                            Get your <span>Education</span> today! <!-- Highlighted word -->
                        </h1>
                    </div>
                </div>
            </div>
            
            <!-- Hero Slide 2 - Second slide -->
            <div class="hero_slide">
                <div class="hero_slide_background" style="background-image:url({{ asset('images/landing/slider_background.jpg') }})"></div>
                <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                    <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
                            Learn with <span>Smart Edu</span> LMS <!-- Brand name highlight -->
                        </h1>
                    </div>
                </div>
            </div>
            
            <!-- Hero Slide 3 - Third slide -->
            <div class="hero_slide">
                <div class="hero_slide_background" style="background-image:url({{ asset('images/landing/slider_background.jpg') }})"></div>
                <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                    <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
                            Transform your <span>Future</span> now! <!-- Call to action -->
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Carousel navigation arrows -->
        <div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">prev</span></div>
        <div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">next</span></div>
    </div>
</div>

<!-- Hero Boxes - Three feature boxes below slider -->
<div class="hero_boxes">
    <div class="hero_boxes_inner">
        <div class="container">
            <div class="row">
                
                <!-- Box 1: Online Courses -->
                <div class="col-lg-4 hero_box_col">
                    <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                        <img src="{{ asset('images/landing/earth-globe.svg') }}" class="svg" alt="Online Courses Icon">
                        <div class="hero_box_content">
                            <h2 class="hero_box_title">Online Courses</h2>
                            <a href="#courses" class="hero_box_link">view more</a> <!-- Internal link to courses section -->
                        </div>
                    </div>
                </div>
                
                <!-- Box 2: Library -->
                <div class="col-lg-4 hero_box_col">
                    <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                        <img src="{{ asset('images/landing/books.svg') }}" class="svg" alt="Library Icon">
                        <div class="hero_box_content">
                            <h2 class="hero_box_title">Our Library</h2>
                            <a href="#library" class="hero_box_link">view more</a>
                        </div>
                    </div>
                </div>
                
                <!-- Box 3: Teachers -->
                <div class="col-lg-4 hero_box_col">
                    <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                        <img src="{{ asset('images/landing/professor.svg') }}" class="svg" alt="Teachers Icon">
                        <div class="hero_box_content">
                            <h2 class="hero_box_title">Our Teachers</h2>
                            <a href="#teachers" class="hero_box_link">view more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Courses Section - External component for course listing -->
@include('landing.components.courses-section')

<!-- Register Section - Split section with discount offer and search -->
<div class="register">
    <div class="container-fluid">
        <div class="row row-eq-height"> <!-- Equal height columns -->
            
            <!-- Left Column: Registration/Discount Offer -->
            <div class="col-lg-6 nopadding"> <!-- No padding for full background -->
                <div class="register_section d-flex flex-column align-items-center justify-content-center">
                    <div class="register_content text-center">
                        <h1 class="register_title">Start learning today! Get <span>30%</span> discount</h1>
                        <p class="register_text">Join thousands of students and start your learning journey with Smart Edu. Transform your skills and advance your career with our comprehensive courses.</p>
                        <div class="button button_1 register_button mx-auto trans_200">
                            {{-- 
                                Conditional button text:
                                - If user is authenticated: Show "Go to Dashboard"
                                - If user is not authenticated: Show "Register Now"
                            --}}
                            @auth
                                <a href="{{ url('/dashboard') }}">Go to Dashboard</a>
                            @else
                                <a href="{{ route('register') }}">Register Now</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column: Course Search -->
            <div class="col-lg-6 nopadding">
                <div class="search_section d-flex flex-column align-items-center justify-content-center">
                    <div class="search_background" style="background-image:url({{ asset('images/landing/search_background.jpg') }});"></div>
                    <div class="search_content text-center">
                        <h1 class="search_title">Search for your course</h1>
                        {{-- 
                            Search form (currently static/demo - would connect to backend in production)
                            Note: Action is "#" meaning it submits to same page
                        --}}
                        <form id="search_form" class="search_form" action="#" method="POST">
                            @csrf <!-- CSRF protection token -->
                            <input id="search_form_name" class="input_field search_form_name" type="text" placeholder="Course Name" required="required">
                            <input id="search_form_category" class="input_field search_form_category" type="text" placeholder="Category">
                            <input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Level">
                            <button id="search_submit_button" type="submit" class="search_submit_button trans_200">Search Course</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Services Section - Lists features/benefits of the platform -->
<div class="services page_section" id="services">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>Our Services</h1> <!-- Section heading -->
                </div>
            </div>
        </div>
        
        <div class="row services_row">
            <!-- Service 1: Online Courses -->
            <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                <div class="icon_container d-flex flex-column justify-content-end">
                    <img src="{{ asset('images/landing/earth-globe.svg') }}" alt="Online Courses Icon">
                </div>
                <h3>Online Courses</h3>
                <p>Access thousands of high-quality courses from anywhere in the world. Learn at your own pace with our flexible online platform.</p>
            </div>
            
            <!-- Service 2: Interactive Learning -->
            <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                <div class="icon_container d-flex flex-column justify-content-end">
                    <img src="{{ asset('images/landing/exam.svg') }}" alt="Interactive Learning Icon">
                </div>
                <h3>Interactive Learning</h3>
                <p>Engage with interactive quizzes, assignments, and projects. Get instant feedback and track your progress.</p>
            </div>
            
            <!-- Service 3: Digital Library -->
            <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                <div class="icon_container d-flex flex-column justify-content-end">
                    <img src="{{ asset('images/landing/books.svg') }}" alt="Digital Library Icon">
                </div>
                <h3>Digital Library</h3>
                <p>Access a vast collection of digital resources, e-books, and study materials to support your learning journey.</p>
            </div>
            
            <!-- Service 4: Expert Instructors -->
            <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                <div class="icon_container d-flex flex-column justify-content-end">
                    <img src="{{ asset('images/landing/professor.svg') }}" alt="Expert Instructors Icon">
                </div>
                <h3>Expert Instructors</h3>
                <p>Learn from industry experts and experienced educators who bring real-world knowledge to your learning experience.</p>
            </div>
            
            <!-- Service 5: Certification Programs -->
            <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                <div class="icon_container d-flex flex-column justify-content-end">
                    <img src="{{ asset('images/landing/blackboard.svg') }}" alt="Certification Icon">
                </div>
                <h3>Certification Programs</h3>
                <p>Earn certificates upon course completion that you can add to your professional profile.</p>
            </div>
            
            <!-- Service 6: Career Support -->
            <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                <div class="icon_container d-flex flex-column justify-content-end">
                    <img src="{{ asset('images/landing/mortarboard.svg') }}" alt="Career Support Icon">
                </div>
                <h3>Career Support</h3>
                <p>Get career guidance, resume building tips, and job placement assistance to advance your career.</p>
            </div>
        </div>
    </div>
</div>

<!-- Include Quizzes Section - External component for quiz listing -->
@include('landing.components.quizzes-section')

<!-- Testimonials Section - Student feedback/reviews -->
<div class="testimonials page_section" id="testimonials">
    <div class="testimonials_background_container">
        <div class="testimonials_background" style="background-image:url({{ asset('images/landing/testimonials_background.jpg') }})"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>What our students say</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1"> <!-- Center column with offset -->
                <div class="testimonials_slider_container">
                    <div class="owl-carousel owl-theme testimonials_slider"> <!-- Testimonial carousel -->
                        
                        <!-- Testimonial 1 -->
                        <div class="owl-item">
                            <div class="testimonials_item text-center">
                                <div class="quote">"</div> <!-- Quote mark -->
                                <p class="testimonials_text">Smart Edu has completely transformed my learning experience. The courses are well-structured, the instructors are knowledgeable, and the platform is user-friendly. I've gained valuable skills that have advanced my career significantly.</p>
                                <div class="testimonial_user">
                                    <div class="testimonial_image mx-auto">
                                        <img src="{{ asset('images/landing/testimonials_user.jpg') }}" alt="Sarah Johnson">
                                    </div>
                                    <div class="testimonial_name">Sarah Johnson</div>
                                    <div class="testimonial_title">Software Developer</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Testimonial 2 -->
                        <div class="owl-item">
                            <div class="testimonials_item text-center">
                                <div class="quote">"</div>
                                <p class="testimonials_text">The flexibility of online learning with Smart Edu allows me to balance my studies with my full-time job. The interactive features and community support make learning engaging and enjoyable.</p>
                                <div class="testimonial_user">
                                    <div class="testimonial_image mx-auto">
                                        <img src="{{ asset('images/landing/testimonials_user.jpg') }}" alt="Michael Brown">
                                    </div>
                                    <div class="testimonial_name">Michael Brown</div>
                                    <div class="testimonial_title">Data Analyst</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Testimonial 3 -->
                        <div class="owl-item">
                            <div class="testimonials_item text-center">
                                <div class="quote">"</div>
                                <p class="testimonials_text">I've taken multiple courses on Smart Edu and each one exceeded my expectations. The instructors are supportive, and the curriculum is designed to make complex topics easy to understand. Highly recommend!</p>
                                <div class="testimonial_user">
                                    <div class="testimonial_image mx-auto">
                                        <img src="{{ asset('images/landing/testimonials_user.jpg') }}" alt="Emily Davis">
                                    </div>
                                    <div class="testimonial_name">Emily Davis</div>
                                    <div class="testimonial_title">Marketing Specialist</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Milestones Section - Statistics counters (animated) -->
<div class="milestones page_section" id="milestones">
    <div class="milestones_background" style="background-image:url({{ asset('images/landing/milestones_background.jpg') }})"></div>
    <div class="container">
        <div class="row">
            
            <!-- Milestone 1: Students Count -->
            <div class="col-lg-3 milestone_col">
                <div class="milestone text-center">
                    <div class="milestone_icon"><img src="{{ asset('images/landing/milestone_1.svg') }}" alt="Students Icon"></div>
                    {{-- 
                        Counter uses data-end-value attribute for JavaScript animation
                        ?? 0 is null coalescing - shows 0 if $totalStudents is not set
                    --}}
                    <div class="milestone_counter" data-end-value="{{ $totalStudents ?? 0 }}">0</div>
                    <div class="milestone_text">Students</div>
                </div>
            </div>
            
            <!-- Milestone 2: Courses Count -->
            <div class="col-lg-3 milestone_col">
                <div class="milestone text-center">
                    <div class="milestone_icon"><img src="{{ asset('images/landing/milestone_2.svg') }}" alt="Courses Icon"></div>
                    <div class="milestone_counter" data-end-value="{{ $totalCourses ?? 0 }}">0</div>
                    <div class="milestone_text">Courses</div>
                </div>
            </div>
            
            <!-- Milestone 3: Teachers Count -->
            <div class="col-lg-3 milestone_col">
                <div class="milestone text-center">
                    <div class="milestone_icon"><img src="{{ asset('images/landing/milestone_3.svg') }}" alt="Teachers Icon"></div>
                    <div class="milestone_counter" data-end-value="{{ $totalTeachers ?? 0 }}">0</div>
                    <div class="milestone_text">Teachers</div>
                </div>
            </div>
            
            <!-- Milestone 4: Success Rate (hardcoded) -->
            <div class="col-lg-3 milestone_col">
                <div class="milestone text-center">
                    <div class="milestone_icon"><img src="{{ asset('images/landing/milestone_4.svg') }}" alt="Success Rate Icon"></div>
                    <div class="milestone_counter" data-end-value="99">0</div> <!-- Static 99% success rate -->
                    <div class="milestone_text">Success Rate %</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Events Section - Upcoming workshops/events -->
<div class="events page_section" id="events">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>Upcoming Events</h1>
                </div>
            </div>
        </div>

        <div class="event_items">
            
            <!-- Event 1: Web Development Workshop -->
            <div class="row event_item">
                <div class="col">
                    <div class="row d-flex flex-row align-items-end">
                        <div class="col-lg-2 order-lg-1 order-2">
                            <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                <div class="event_day">15</div> <!-- Day number -->
                                <div class="event_month">January</div> <!-- Month -->
                            </div>
                        </div>
                        
                        <div class="col-lg-6 order-lg-2 order-3">
                            <div class="event_content">
                                <div class="event_name"><a class="trans_200" href="#">Web Development Workshop</a></div>
                                <div class="event_location">Online Event</div>
                                <p>Join our free workshop to learn the fundamentals of web development. Perfect for beginners.</p>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 order-lg-3 order-1">
                            <div class="event_image">
                                <img src="{{ asset('images/landing/event_1.jpg') }}" alt="Web Development Workshop">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Event 2: Data Science Bootcamp -->
            <div class="row event_item">
                <div class="col">
                    <div class="row d-flex flex-row align-items-end">
                        <div class="col-lg-2 order-lg-1 order-2">
                            <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                <div class="event_day">22</div>
                                <div class="event_month">January</div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 order-lg-2 order-3">
                            <div class="event_content">
                                <div class="event_name"><a class="trans_200" href="#">Data Science Bootcamp</a></div>
                                <div class="event_location">Online Event</div>
                                <p>Intensive bootcamp covering data analysis, machine learning, and visualization techniques.</p>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 order-lg-3 order-1">
                            <div class="event_image">
                                <img src="{{ asset('images/landing/event_2.jpg') }}" alt="Data Science Bootcamp">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Event 3: Career Networking Event -->
            <div class="row event_item">
                <div class="col">
                    <div class="row d-flex flex-row align-items-end">
                        <div class="col-lg-2 order-lg-1 order-2">
                            <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                <div class="event_day">28</div>
                                <div class="event_month">January</div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 order-lg-2 order-3">
                            <div class="event_content">
                                <div class="event_name"><a class="trans_200" href="#">Career Networking Event</a></div>
                                <div class="event_location">Online Event</div>
                                <p>Connect with industry professionals and learn about career opportunities in tech.</p>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 order-lg-3 order-1">
                            <div class="event_image">
                                <img src="{{ asset('images/landing/event_3.jpg') }}" alt="Career Networking Event">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection <!-- End of content section -->

{{-- 
    @push - Adds JavaScript to the 'scripts' stack in the parent layout
    This keeps page-specific JavaScript organized
--}}
@push('scripts')
<script src="{{ asset('js/landing/custom.js') }}"></script> <!-- Custom landing page JS -->
<script>
// Document ready function - runs when page is fully loaded
$(document).ready(function() {
    'use strict'; // Use strict mode for better error checking
    
    // Initialize milestone counters if they exist on page
    if($('.milestone_counter').length) {
        var milestoneItems = $('.milestone_counter'); // Get all counter elements
        
        // Loop through each counter element
        milestoneItems.each(function(i) {
            var ele = $(this); // Current counter element
            var endValue = parseInt(ele.data('end-value')); // Get target value from data attribute
            var signBefore = ele.data('sign-before') || ''; // Optional prefix (e.g., $)
            var signAfter = ele.data('sign-after') || ''; // Optional suffix (e.g., %)
            
            // Only animate if we have a positive end value
            if(endValue > 0) {
                var counter = {value: 0}; // Object to track current value
                
                // Create animation from 0 to endValue over 2 seconds
                var counterTween = TweenMax.to(counter, 2, {
                    value: endValue, // Target value
                    roundProps: {value}, // Round value to whole number
                    ease: Power2.easeOut, // Easing function for smooth animation
                    onUpdate: function() {
                        // Update displayed value on each animation frame
                        document.getElementsByClassName('milestone_counter')[i].innerHTML = signBefore + counter.value + signAfter;
                    }
                });
                
                // Create ScrollMagic scene to trigger animation when element is in view
                var milestoneScene = new ScrollMagic.Scene({
                    triggerElement: ele[0], // Element that triggers animation
                    triggerHook: 0.8, // Trigger when 80% of element is visible
                    duration: 0 // No scroll duration needed
                })
                .setTween(counterTween) // Attach the animation
                .addTo(ctrl); // Add to ScrollMagic controller (assumes 'ctrl' is defined elsewhere)
            }
        });
    }
});
</script>
@endpush