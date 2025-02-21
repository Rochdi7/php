@section('title', 'Home')

@extends('layout.base')

@section('content')

<section class="hero w-100 position-relative text-center">
    <div class="hero-image position-relative">
        <img class="img-fluid w-100" src="/images/hero.jpg" alt="Hero Image">

        <div class="contact-left position-absolute start-0 top-10 d-flex align-items-center">
            <img src="/images/question.png" alt="Have Questions?" class="icon">
            <div class="contact-text">
                <p>Have questions?</p>
                <a href="tel:+212689981022" class="contact-number">+212 689981022</a>
            </div>
        </div>

        <div class="contact-right position-absolute end-0 top-10 d-flex align-items-center">
            <p>Visit our Social Media</p>
            <a href="#" class="social-icon fb">FB</a>
            <a href="#" class="social-icon in">IN</a>
        </div>

        <div class="hero-content position-absolute top-25 start-50 translate-middle-x text-center">
            <h1 class="hero-title">Online solutions <br> <span>to boost your website</span></h1>
            <p class="hero-description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
            </p>
            <div class="hero-buttons">
                <a href="{{ route('services') }}" class="btn btn-primary btn-custom">Our services</a>
                <a href="{{ route('about') }}" class="btn btn-outline-dark btn-custom">Learn more</a>
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

<section class="offer-section w-100 d-flex align-items-center justify-content-center py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="/images/solution.svg" alt="Team Working" class="img-fluid offer-image">
            </div>
            <div class="col-md-6">
                <h2 class="offer-title"><span>What</span> can we offer you?</h2>
                <p class="offer-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                </p>
                <ul class="offer-list">
                    <li> We have over 15 years experience in the industry</li>
                    <li> One of the best ratings on the market - 98%</li>
                    <li> Our team is very qualified and we are still growing</li>
                    <li> We helped many companies</li>
                </ul>
                <a href="{{ route('about') }}" class="btn btn-primary btn-custom">More about us</a>
            </div>
        </div>
    </div>
</section>

<section class="services-section w-100 text-center">
    <div class="container">
        <h2 class="services-title"><span>What we can do for</span> your website</h2>
        <p class="services-description">
            Starting from SEO services to comprehensive service related to advertising your brand.
        </p>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-icon bg-accent">
                        <img src="/images/social-media-marketing.png" alt="Social Media Marketing">
                    </div>
                    <h4>Social Media Marketing</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-icon bg-primary">
                        <img src="/images/optimisation.png" alt="Speed Optimization">
                    </div>
                    <h4>Speed Optimization</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-icon bg-secondary">
                        <img src="/images/cible.png" alt="Client & Sale Targeting">
                    </div>
                    <h4>Client & Sale Targeting</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</p>
                </div>
            </div>
        </div>

        <a href="{{ route('services') }}" class="btn btn-primary btn-custom">See all services</a>
    </div>
</section>

<section class="facts-section w-100 py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="/images/business.svg" alt="Business Analysis" class="img-fluid facts-image">
            </div>
            <div class="col-md-6">
                <h2 class="facts-title"><span>Let the facts</span> convince you</h2>
                <p class="facts-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                </p>
                <div class="row text-center">
                    <div class="col-md-4">
                        <h3 class="fact-number text-accent">64%</h3>
                        <p class="fact-text">Increase of total visit on website</p>
                    </div>
                    <div class="col-md-4">
                        <h3 class="fact-number text-secondary">38%</h3>
                        <p class="fact-text">Increase of total visit on website</p>
                    </div>
                    <div class="col-md-4">
                        <h3 class="fact-number text-primary">49%</h3>
                        <p class="fact-text">Increase of total visit on website</p>
                    </div>
                </div>
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


@endsection
