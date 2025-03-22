@extends('layout.base')

@section('content')

<!-- Contact Page Styles -->
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
<link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">

<!-- Hero Section -->
<div class="hero-section" data-aos="fade-up">
    <img src="{{ asset('assets/images/banners/contact.jpg') }}" class="hero-image" alt="Contact">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 style="color: white;">Contactez-nous</h1>
        <div class="breadcrumb text-center">
            <a href="{{ url('/') }}" class="text-light">Accueil</a> »
            <span style="color: var(--secondary-color);">Contact</span>
        </div>
    </div>
</div>

<!-- Contact Section -->
<section class="contact-section py-5">
    <div class="container">
        <h1 class="text-center contact-title" data-aos="fade-up">Vous avez une question ? Contactez-nous !</h1>
        <p class="text-center contact-subtitle" data-aos="fade-up" data-aos-delay="100">Un événement, une fête, un mariage</p>

        <div class="contact-content text-center" data-aos="fade-up" data-aos-delay="200">
            <p>Qu'il s'agisse d'un mariage, d'un anniversaire, d'un événement ou d'une conférence, <strong>Premium Kech Tours</strong> vous accompagne en mettant à votre disposition plusieurs voitures privées avec chauffeurs.</p>

            <h3>Transporter les invités à un mariage</h3>
            <p>Ne laissez pas vos invités se soucier du transport. <strong>Premium Kech Tours</strong> vous propose des véhicules de luxe pour assurer leurs déplacements en toute sérénité.</p>

            <h3>Organisation d'événements & mariages</h3>
            <p>Nos services sont disponibles <strong>24h/24 et 7j/7</strong>, garantissant un transport fluide et efficace pour vos invités.</p>

            <p>Pour toute demande de location de véhicule de luxe, organisation de circuits et excursions, contactez-nous pour un devis personnalisé gratuit !</p>

            <p><strong>Nous sommes actifs sur WhatsApp 24/7, contactez-nous à tout moment !</strong></p>

            <p>Nous sommes joignables par téléphone, e-mail ou WhatsApp.</p>
        </div>

        <div class="contact-info text-center mt-4" data-aos="fade-up" data-aos-delay="300">
            <p><strong>Téléphone :</strong> <a href="tel:+212770134539" class="contact-link">+212 770134539</a></p>
            <p><strong>Email :</strong> <a href="mailto:Premiumkechtours@gmail.com" class="contact-link">Premiumkechtours@gmail.com</a></p>
        </div>

        <!-- WhatsApp Button -->
        <div class="text-center my-4" data-aos="fade-up" data-aos-delay="350">
            <a href="https://wa.me/212770134539" target="_blank" class="btn btn-success btn-lg">
                <i class="fab fa-whatsapp"></i> Contactez-nous sur WhatsApp
            </a>
        </div>

        <!-- Contact Form -->
        <!-- <div class="contact-form mt-5" data-aos="fade-up" data-aos-delay="400">
            <h3 class="text-center">Envoyez-nous un message</h3>
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" class="form-control custom-input" placeholder="Votre nom" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control custom-input" placeholder="Votre e-mail" required>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" class="form-control custom-input" rows="4" placeholder="Votre message..." required></textarea>
                </div>

                <button type="submit" class="custom-btn">
                    <span class="text">Envoyer</span>
                    <span class="icon"><i class="fas fa-paper-plane"></i></span>
                </button>
            </form>
        </div>
    </div>
</section> -->

<!-- Google Map -->
<div class="map-container" data-aos="fade-up" data-aos-delay="500">
    <iframe
        width="100%"
        height="450"
        style="border:0; border-radius: 15px;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3396.2015887073812!2d-8.016389199999999!3d31.655704100000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafec25d50e1639%3A0x2d6643fcd33436cc!2s2%2C%20Marrakech%2040090!5e0!3m2!1sfr!2sma!4v1740510460860!5m2!1sfr!2sma">
    </iframe>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });
</script>

@endsection
