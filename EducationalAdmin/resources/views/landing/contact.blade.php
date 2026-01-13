@extends('layouts.landing')

@section('content')

<!-- Home -->
<div class="home">
    <div class="home_background_container prlx_parent">
        <div class="home_background prlx" style="background-image:url({{ asset('images/landing/contact_background.jpg') }})"></div>
    </div>
    <div class="home_content">
        <h1>Contact Us</h1>
    </div>
</div>

<!-- Contact Info -->
<div class="contact_info page_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="section_title text-center">
                    <h2>Get in Touch</h2>
                    <p class="section_subtitle">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                </div>
            </div>
        </div>

        <div class="row contact_items_container">
            <!-- Contact Item -->
            <div class="col-lg-4 contact_col">
                <div class="contact_item text-center">
                    <div class="contact_item_icon">
                        <img src="{{ asset('images/landing/placeholder.svg') }}" alt="Address">
                    </div>
                    <div class="contact_item_title">
                        <h4>Address</h4>
                    </div>
                    <div class="contact_item_text">
                        <p>Thapathali, Kathmandu</p>
                        <p>Learning City, LC 12345</p>
                    </div>
                </div>
            </div>

            <!-- Contact Item -->
            <div class="col-lg-4 contact_col">
                <div class="contact_item text-center">
                    <div class="contact_item_icon">
                        <img src="{{ asset('images/landing/smartphone.svg') }}" alt="Phone">
                    </div>
                    <div class="contact_item_title">
                        <h4>Phone</h4>
                    </div>
                    <div class="contact_item_text">
                        <p>+1 (555) 123-4567</p>
                        <p>+1 (555) 987-6543</p>
                    </div>
                </div>
            </div>

            <!-- Contact Item -->
            <div class="col-lg-4 contact_col">
                <div class="contact_item text-center">
                    <div class="contact_item_icon">
                        <img src="{{ asset('images/landing/envelope.svg') }}" alt="Email">
                    </div>
                    <div class="contact_item_title">
                        <h4>Email</h4>
                    </div>
                    <div class="contact_item_text">
                        <p>eduadmin.com</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Form -->
<div class="contact_form_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center mb-5">
                        <h3>Send us a Message</h3>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <form action="{{ url('/contact') }}" method="POST" id="contact_form">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Full Name *</label>
                                    <input type="text" 
                                           name="name" 
                                           id="name" 
                                           class="form-control form-control-lg" 
                                           value="{{ old('name') }}"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address *</label>
                                    <input type="email" 
                                           name="email" 
                                           id="email" 
                                           class="form-control form-control-lg" 
                                           value="{{ old('email') }}"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" 
                                           name="phone" 
                                           id="phone" 
                                           class="form-control form-control-lg" 
                                           value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject">Subject *</label>
                                    <input type="text" 
                                           name="subject" 
                                           id="subject" 
                                           class="form-control form-control-lg" 
                                           value="{{ old('subject') }}"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message">Your Message *</label>
                            <textarea name="message" 
                                      id="message" 
                                      class="form-control form-control-lg" 
                                      rows="6" 
                                      required>{{ old('message') }}</textarea>
                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="submit" class="button button_1">
                                <span>Send Message</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="faq_section page_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="section_title text-center">
                    <h2>Frequently Asked Questions</h2>
                    <p class="section_subtitle">Find quick answers to common questions</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <!-- FAQ Item 1 -->
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    How do I enroll in a course?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                            <div class="card-body">
                                Browse our course catalog, select your desired course, and click "Enroll Now". You can pay online and get immediate access to course materials.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    What is your refund policy?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                            <div class="card-body">
                                We offer a 30-day money-back guarantee. If you're not satisfied with a course, contact our support team within 30 days of purchase for a full refund.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Can I access courses on mobile devices?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                            <div class="card-body">
                                Yes! Our platform is fully responsive and works on all devices including smartphones, tablets, and desktop computers.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    How do I become an instructor?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                            <div class="card-body">
                                Visit our "Become a Teacher" page or register as an instructor from your dashboard. Our team will review your application and guide you through the process.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/landing/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/landing/contact_responsive.css') }}">
<style>
    .contact_form_section {
        padding: 80px 0;
        background: #f8f9fa;
    }
    
    .contact_form_container {
        background: white;
        padding: 50px;
        border-radius: 8px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.1);
    }
    
    .contact_items_container {
        margin-top: 60px;
        margin-bottom: 60px;
    }
    
    .contact_item {
        padding: 40px 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .contact_item:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    
    .contact_item_icon {
        margin-bottom: 25px;
    }
    
    .contact_item_icon img {
        height: 80px;
        width: auto;
    }
    
    .contact_item_title h4 {
        font-size: 22px;
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
    }
    
    .contact_item_text p {
        margin-bottom: 5px;
        color: #666;
    }
    
    .faq_section {
        padding: 80px 0;
        background: #fff;
    }
    
    .card-header {
        background: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
    }
    
    .card-header .btn {
        text-decoration: none;
        color: #333;
        font-weight: 600;
        font-size: 16px;
        position: relative;
        padding-left: 40px;
    }
    
    .card-header .btn:before {
        content: '▸';
        position: absolute;
        left: 20px;
        transition: transform 0.3s ease;
    }
    
    .card-header .btn.collapsed:before {
        transform: rotate(90deg);
    }
    
    .card-header .btn:hover {
        color: #ffb606;
        text-decoration: none;
    }
    
    .card-body {
        background: #fff;
        padding: 25px;
        color: #555;
        line-height: 1.8;
    }
    
    .map_container {
        width: 100%;
        height: 400px;
    }
    
    label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        display: block;
    }
    
    .form-control {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 12px 15px;
        font-size: 16px;
    }
    
    .form-control:focus {
        border-color: #ffb606;
        box-shadow: 0 0 0 0.2rem rgba(255, 182, 6, 0.25);
    }
    
    .alert {
        border-radius: 4px;
        margin-bottom: 30px;
    }
    
    .section_title h2 {
        font-size: 36px;
        font-weight: 700;
        color: #333;
        margin-bottom: 15px;
    }
    
    .section_subtitle {
        color: #666;
        font-size: 18px;
        margin-bottom: 40px;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('js/landing/contact_custom.js') }}"></script>
<script>
    function initMap() {
        // Default map location (Learning City coordinates)
        var location = {lat: 40.7128, lng: -74.0060};
        
        var map = new google.maps.Map(document.getElementById('googleMap'), {
            zoom: 12,
            center: location,
            styles: [
                {
                    "featureType": "all",
                    "elementType": "geometry",
                    "stylers": [{"color": "#f5f5f5"}]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{"color": "#e9e9e9"}]
                }
            ]
        });
        
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            title: 'LearnHub Headquarters'
        });
        
        var infoWindow = new google.maps.InfoWindow({
            content: '<div style="padding: 10px;"><h5 style="margin: 0 0 10px 0;">LearnHub Headquarters</h5><p style="margin: 0;">123 Education Street<br>Learning City, LC 12345</p></div>'
        });
        
        marker.addListener('click', function() {
            infoWindow.open(map, marker);
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
@endpush
@endsection