@section('title', 'About Us')
<link href="{{ asset('css/about.css') }}" rel="stylesheet">

@extends('layout.base')

@section('content')

<!-- Hero Section -->
<section class="hero w-100 ">
    <div class="hero-image">
        <img class="img-fluid w-100" src="/images/about.jpg" alt="About Us">
        <div class="hero-content">
            <h1 class="hero-title">Who We Are</h1>
            <p class="hero-description">
                We are ByteCrafters, a team of passionate digital experts crafting 
                cutting-edge solutions for brands that want to stand out.
            </p>
        </div>
    </div>
</section>

<section class="team-stats-section">
    <div class="container-fluid">
        <div class="row g-0 align-items-center">
            <div class="col-md-6 team-image">
                <img src="/images/team.jpg" alt="Our Team" class="grid-image">
            </div>
            <div class="col-md-6 team-content text-center">
                <h2><span class="highlight">Our team</span> Meet the best people in SEO</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Our team is made up of 
                    industry experts who are passionate about digital transformation and SEO.
                </p>
                <div class="team-benefits d-flex flex-wrap justify-content-center">
                    <div class="benefit-item"><i class="icon-check"></i> Advanced security</div>
                    <div class="benefit-item"><i class="icon-check"></i> Quick results</div>
                    <div class="benefit-item"><i class="icon-check"></i> Certificate of guarantee</div>
                    <div class="benefit-item"><i class="icon-check"></i> All in one</div>
                </div>
                <a href="/contact" class="btn btn-primary" style="border-radius: 40px; padding: 12px 32px;">Contact Us</a>
            </div>
        </div>
        <div class="row g-0 align-items-center">
            <div class="col-md-6 stats-content text-center">
                <h2><span class="highlight">These numbers</span> represent us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Our numbers speak for 
                    themselves, showcasing our expertise and industry leadership.</p>
                <div class="stats-box d-flex justify-content-center">
                    <div class="stat-item">
                        <h1>64%</h1>
                        <p>Lorem ipsum</p>
                    </div>
                    <div class="stat-item">
                        <h1 style="color: #F97316;">38%</h1>
                        <p>Lorem ipsum</p>
                    </div>
                    <div class="stat-item">
                        <h1 style="color: #0EA5E9;">49%</h1>
                        <p>Lorem ipsum</p>
                    </div>
                </div>
                <a href="/contact" class="btn btn-primary" style="border-radius: 40px; padding: 12px 32px;">Contact Us</a>
            </div>
            <div class="col-md-6 stats-image">
                <img src="/images/happy.jpg" alt="Happy Team" class="grid-image">
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
