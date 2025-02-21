@section('title', 'Our Portfolio')
<link href="{{ asset('css/portfolio.css') }}" rel="stylesheet">

@extends('layout.base')

@section('content')

<section class="hero">
    <div class="container">
        <div class=" flex-column">
        <h1 class="hero-title">Our Portfolio</h1>
            <p class="hero-description">
                Discover the projects we’ve worked on and see how we’ve helped businesses achieve their goals 
                through innovative and creative digital solutions.
            </p>
            <a href="/contact" class="btn btn-primary" style="border-radius: 40px; padding: 12px 32px;" >Work With Us</a>
        </div>
        <div class="hero-image">
            <img src="/images/portfolio.svg" alt="Our Portfolio">
        </div>
    </div>
</section>


<section class="portfolio-projects">
            <h2 class="section-title">Our Latest Work</h2>
        <p class="section-subtitle">Explore some of our most recent and successful projects.</p>
    <div class="container">

        <div class="row">
            <div class="col-md-4 portfolio-box">
                <img src="/images/project1.svg" alt="Project One">
                <h3>Project One</h3>
                <p>E-commerce website with an intuitive user experience.</p>
            </div>
            <div class="col-md-4 portfolio-box">
                <img src="/images/project2.svg" alt="Project Two">
                <h3>Project Two</h3>
                <p>Branding and digital marketing campaign for a startup.</p>
            </div>
            <div class="col-md-4 portfolio-box">
                <img src="/images/project3.svg" alt="Project Three">
                <h3>Project Three</h3>
                <p>Custom web application with advanced features.</p>
            </div>
        </div>
    </div>
</section>

<section class="testimonials">
    <h2 class="section-title">What Our Clients Say</h2>
    <div class="container ">
        <div class="row">
            <div class="col-md-4 testimonial-box">
                <p>"ByteCrafters transformed our online presence and increased our sales by 50%!"</p>
                <h4>- Sarah Johnson, CEO of XYZ Company</h4>
            </div>
            <div class="col-md-4 testimonial-box">
                <p>"Professional, reliable, and creative. Their team is outstanding!"</p>
                <h4>- Mark Davis, Founder of ABC Startup</h4>
            </div>
            <div class="col-md-4 testimonial-box">
                <p>"Exceptional service and support. They truly understand our business needs!"</p>
                <h4>- Lisa Brown, Marketing Director</h4>
            </div>
            <div class="col-md-4 testimonial-box">
                <p>"A game-changer for our brand. Highly recommended!"</p>
                <h4>- James White, Business Owner</h4>
            </div>
        </div>
    </div>
</section>


<section class="newsletter w-100 text-center">
    <div class="newsletter-container">
        <h2 class="newsletter-title">
            Don’t miss <span>our future updates!</span>
        </h2>
        <p class="newsletter-description">
            Stay updated with the latest trends, insights, and exclusive offers. Subscribe to our newsletter now!
        </p>

        <form action="/be/agency4/#wpcf7-f106-p9-o1" method="post" class="newsletter-form custom-form">
            <div class="hidden-inputs">
                <input type="hidden" name="_wpcf7" value="106">
                <input type="hidden" name="_wpcf7_version" value="5.4.2">
                <input type="hidden" name="_wpcf7_locale" value="en_US">
                <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f106-p9-o1">
                <input type="hidden" name="_wpcf7_container_post" value="9">
                <input type="hidden" name="_wpcf7_posted_data_hash" value="">
            </div>

            <div class="newsletter-input-group">
                <input type="email" name="your-name" class="newsletter-input" placeholder="Enter your email" required>
                <button type="submit" class="newsletter-btn">Join</button>
            </div>
        </form>

        <p class="newsletter-policy">
            By signing up, you automatically accept our 
            <a href="#">Privacy Policy</a> and <a href="#">Terms of Use</a>.
        </p>
    </div>
</section>

<section class="cta">
    <div class="container text-center">
        <h2>Have a Project in Mind?</h2>
        <p>We’d love to bring your vision to life. Get in touch today!</p>
        <a href="/contact" class="btn btn-primary" style="border-radius: 40px; ">Get in Touch</a>
    </div>
</section>



@endsection
