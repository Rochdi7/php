@section('title', 'Our Services')
<link href="{{ asset('css/services.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

@extends('layout.base')

@section('content')
<section class="hero w-100 d-flex flex-column align-items-center">
    <div class="container d-flex justify-content-between">
        <div class="hero-content">
            <h1 class="hero-title">Our Services</h1>
            <p class="hero-description">
                We offer a wide range of digital services designed to elevate your brand and accelerate growth.
                Our expert team specializes in providing innovative and results-driven solutions tailored to your
                business.
            </p>
            <a href="/contact" class="btn btn-primary" style="border-radius: 40px; padding: 12px 32px;">Get Started</a>
        </div>
    </div>
    <div class="full-width-image">
        <img src="/images/choose.jpg" alt="Why Choose Us" class="img-full">
    </div>
</section>


<section class="services-overview">
    <h2 class="section-title">What We Offer</h2>
    <p class="section-subtitle">We provide cutting-edge digital solutions that drive results.</p>

    <div class="container">

    <div class="row">
    <div class="col-md-4 service-box">
        <i class="fas fa-code service-icon"></i>
        <h3>Web Development</h3>
        <p>We build modern, high-performance websites tailored to your business needs.</p>
    </div>
    <div class="col-md-4 service-box">
        <i class="fas fa-chart-line service-icon"></i>
        <h3>SEO Optimization</h3>
        <p>Improve your search engine rankings and increase organic traffic with our SEO strategies.</p>
    </div>
    <div class="col-md-4 service-box">
        <i class="fas fa-bullhorn service-icon"></i>
        <h3>Digital Marketing</h3>
        <p>Boost your brand visibility and reach your target audience with data-driven marketing campaigns.</p>
    </div>
</div>


    </div>
</section>

<section class="why-choose-us">
    <div class="container">
        <div class="why-content">
            <div class="why-left">
                <h2 class="section-title">Why Choose Us?</h2>
                <p class="section-subtitle">We combine creativity, technology, and strategy to deliver impactful
                    results.</p>
                <ul class="benefits-list">
                    <li><span class="icon-check"></span> Data-Driven Strategies</li>
                    <li><span class="icon-check"></span> Experienced Professionals</li>
                    <li><span class="icon-check"></span> Cutting-Edge Technology</li>
                    <li><span class="icon-check"></span> Transparent Pricing</li>
                </ul>
            </div>
            <div class="why-right">
                <img src="/images/choose.svg" alt="Why Choose Us">
            </div>
        </div>
    </div>
</section>



<section class="sponsors w-100 text-center py-5">
    <h2 class="sponsor-title">Trusted by Leading Companies</h2>
    <div class="sponsor-carousel">
        <div class="sponsor-logo"><img src="/images/barid.png" alt="Sponsor 1"></div>
        <div class="sponsor-logo"><img src="/images/barid.png" alt="Sponsor 2"></div>
        <div class="sponsor-logo"><img src="/images/barid.png" alt="Sponsor 3"></div>
        <div class="sponsor-logo"><img src="/images/barid.png" alt="Sponsor 4"></div>
        <div class="sponsor-logo"><img src="/images/barid.png" alt="Sponsor 5"></div>
    </div>
</section>

<section class="cta">
    <h2>Ready to Elevate Your Brand?</h2>
    <p>Let's work together to create something amazing. Contact us today!</p>
    <a href="/contact" class="btn btn-primary" style="border-radius: 40px; padding: 12px 42px;">Contact Us</a>
</section>



@endsection