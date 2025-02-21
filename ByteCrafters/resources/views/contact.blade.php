@section('title', 'Contact Us')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">

@extends('layout.base')

@section('content')

<section class="hero w-100">
    <div class="hero-image">
        <img class="img-fluid w-100" src="/images/contact-header.jpg" alt="Contact Us">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-comments"></i>
                <span class="highlight">Feel free</span> to contact us
            </h1>
            <p class="hero-description">
                <i class="fas fa-envelope"></i> Have a question or want to start a project? Reach out and let's connect.
            </p>
        </div>
    </div>
</section>


<section class="contact-form-section">
    <h2 class="section-title"><span class="highlight">Fill the form</span> to contact us quickly</h2>
    <p class="section-subtitle">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
        Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
    </p>
    
    <div class="container">
        <form action="#" method="POST" class="contact-form">
            <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="input-group row">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
            </div>
            <div class="input-group">
                <input type="text" name="details" class="form-control" placeholder="Details" required>
            </div>
            <div class="input-group">
                <textarea name="message" class="form-control" placeholder="Your message" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
</section>

<section class="contact-details-section">
    <div class="container">
        <div class="contact-info">
            <h2><i class="fas fa-phone-alt"></i> Get in Touch</h2>
            <p>We’d love to hear from you! Contact us through any of the channels below.</p>
            <div class="contact-items">
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div class="contact-text">
                        <span>Email</span>
                        <a href="mailto:contact@bytecrafters.com">contact@bytecrafters.com</a>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <div class="contact-text">
                        <span>Phone</span>
                        <a href="tel:+212689981022">+212 689 981 022</a>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="contact-text">
                        <span>Address</span>
                        <p style="color: white">123 Digital Street, Tech City, Morocco</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
