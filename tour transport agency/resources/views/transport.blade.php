@extends('layout.base')

@section('title', $meta_title)
@section('meta_description', $meta_description)
@section('meta_image', $meta_image)
@section('meta_url', $meta_url)

@section('content')
    <!-- AOS Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('assets/css/transport.css') }}">

    <!-- Hero Section -->
    <div class="hero-section" data-aos="fade-up">
        <div class="hero-overlay"></div>
        <div class="hero-content ">
            <h1 style="color: white;">Transports Aéroport</h1>
            <div class="breadcrumb text-center">
                <a href="{{ url('/') }}" class="text-light">Home</a> » <span
                    style="color: var(--accent-color); font-weight: bold;">Transports</span>
            </div>
        </div>
    </div>

    <!-- About Premium Kech Tour Section -->
    <div class="container about-premium-section text-center py-5" data-aos="fade-up">
        <h2 class="section-title" style="font-family: 'Amatic SC', cursive; font-size: 2.5rem; color: #1E3A8A;">
            À PROPOS DE PREMIUM KECH TOUR
        </h2>
        <p class="about-text mt-3"
            style="font-size: 1.1rem; max-width: 800px; margin: auto; line-height: 1.6; color: #333;">
            <strong>PREMIUM KECH TOUR</strong> est une agence spécialisée dans les <strong>transports privés de
                luxe</strong> à Marrakech et dans tout le Maroc.
            Nous nous engageons à offrir une expérience de voyage exceptionnelle, alliant confort, discrétion et service
            personnalisé.
        </p>
        <p class="about-text mt-2"
            style="font-size: 1.1rem; max-width: 800px; margin: auto; line-height: 1.6; color: #333;">
            Nos véhicules haut de gamme, nos chauffeurs expérimentés et notre service client réactif garantissent un voyage
            en toute sérénité,
            que ce soit pour un <strong>transfert aéroport, un déplacement professionnel</strong> ou une <strong>mise à
                disposition privée</strong>.
        </p>
    </div>

    <h1 class="hero-title text-center" data-aos="zoom-in" data-aos-delay="200"
        style="font-family: 'Amatic SC', cursive; font-size: 2.5rem; color: #1E3A8A;">Réservez Votre Transport</h1>

       <!-- Main Layout -->
    <div class="container-fluid transport-section ps-lg-5">
        <div class="row">
            <!-- Transport List -->
            <div class="col-md-8 col-lg-9">
                @foreach ($transfers as $transfer)
                    <div class="row align-items-center mt-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center transport-card">
                                <span class="departure">
                                    <strong>{{ $transfer['departure'] }}</strong> ⇄
                                    @if($transfer['destination'])
                                        <span class="destination">{{ $transfer['destination'] }}</span>
                                    @endif
                                </span>
                                <!-- WhatsApp Direct Link for Booking -->
                                <a href="https://wa.me/212770134539?text={{ urlencode('Bonjour, je souhaite réserver un transport de ' . $transfer['departure'] . ' à ' . ($transfer['destination'] ?? 'Destination inconnue') . '. Description: ' . $transfer['description']) }}"
                                    class="price-btn">
                                    ➜ {{ $transfer['price'] }}
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img loading="lazy"src="{{ asset('assets/images/transport/' . $transfer['image']) }}"
                                alt="{{ $transfer['destination'] }}" class="transport-image" data-aos="zoom-in">
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- Offers Section -->
            <div class="col-md-4 col-lg-3">
                <div class="right-side modern-offers" data-aos="fade-left" data-aos-delay="400">
                    <h4 class="text-center fw-bold">Nos Offres</h4>

                    <div class="offer-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-car offer-icon"></i>
                        <span class="offer-text">Véhicules Haut de Gamme</span>
                    </div>

                    <div class="offer-item" data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-shield-alt offer-icon"></i>
                        <span class="offer-text">Sécurité Optimale</span>
                    </div>

                    <div class="offer-item" data-aos="fade-up" data-aos-delay="400">
                        <i class="fas fa-user-tie offer-icon"></i>
                        <span class="offer-text">Chauffeurs Professionnels</span>
                    </div>

                    <div class="offer-item" data-aos="fade-up" data-aos-delay="500">
                        <i class="fas fa-map-marked-alt offer-icon"></i>
                        <span class="offer-text">Service Personnalisé</span>
                    </div>

                    <div class="offer-item" data-aos="fade-up" data-aos-delay="600">
                        <i class="fas fa-clock offer-icon"></i>
                        <span class="offer-text">Disponibilité 24/7</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Transport Modal -->
    <div class="modal fade" id="transportModal" tabindex="-1" aria-labelledby="transportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDeparture"></h5>
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                        &times;
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img loading="lazy"id="modalImage" class="img-fluid transport-modal-image" alt="Transport Image">
                    <p id="modalDescription" class="mt-3"></p>
                    <h4 id="modalPrice" class="fw-bold mt-2"></h4>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <a id="whatsappLink" href="#" class="secondary-btn1">Réserver Maintenant</a>
                </div>
            </div>
        </div>
    </div>

    <section id="vehicules" class="luxury-vehicles scroll-animation">
        <div class="container">
            <div class="luxury-vehicles-container" data-aos="flip-left">
                <img loading="lazy"src="{{ asset('assets/images/banners/deco-left.png.webp') }}" class="deco-left" alt="Left Decoration">

                <div class="content-container text-center">
                    <h2 class="section-title" style="font-family: 'Amatic SC', cursive;">NOS VÉHICULES DE LUXE</h2>
                    <div class="row justify-content-center">

                        <!-- Hyundai Staria -->
                        <div class="col-md-3 col-sm-6 vehicle-item">
                            <h4 class="brand-name">Staria</h4>
                            <div class="vehicle-card">
                                <div class="vehicle-img">
                                    <img loading="lazy"src="{{ asset('assets/images/transport/staria.png') }}" alt="Hyundai Staria">
                                </div>
                                <div class="vehicle-info">
                                    <div class="info-item">
                                        <i class="fas fa-user-friends"></i> 7 Passagers
                                    </div>
                                    <div class="info-item">
                                        <i class="fas fa-car"></i> Transport Privé
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mercedes Vito -->
                        <div class="col-md-3 col-sm-6 vehicle-item">
                            <h4 class="brand-name highlight">Mercedes</h4>
                            <div class="vehicle-card">
                                <div class="vehicle-img">
                                    <img loading="lazy"src="{{ asset('assets/images/transport/vito.png') }}" alt="Mercedes Vito">
                                </div>
                                <div class="vehicle-info">
                                    <div class="info-item">
                                        <i class="fas fa-user-friends"></i> 7 Passagers
                                    </div>
                                    <div class="info-item">
                                        <i class="fas fa-car"></i> Transport Privé
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hyundai Tucson -->
                        <div class="col-md-3 col-sm-6 vehicle-item">
                            <h4 class="brand-name">Tucson</h4>
                            <div class="vehicle-card">
                                <div class="vehicle-img">
                                    <img loading="lazy"src="{{ asset('assets/images/transport/tucson.png') }}" alt="Hyundai Tucson">
                                </div>
                                <div class="vehicle-info">
                                    <div class="info-item">
                                        <i class="fas fa-user-friends"></i> 4 Passagers
                                    </div>
                                    <div class="info-item">
                                        <i class="fas fa-car"></i> Transport Privé
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <img loading="lazy"src="{{ asset('assets/images/banners/deco-right.png.webp') }}" class="deco-right" alt="Right Decoration">
        </div>
    </section>


    <!-- AOS & Bootstrap Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "ItemList",
          "name": "Transports Privés au Maroc",
          "description": "{{ $meta_description }}",
          "url": "{{ $meta_url }}",
          "itemListElement": [
            @foreach($transfers as $index => $transfer)
                  {
                    "@type": "ListItem",
                    "position": {{ $index + 1 }},
                    "name": "{{ $transfer['departure'] }} - {{ $transfer['destination'] }}",
                    "description": "{{ Str::limit($transfer['description'], 100, '') }}",
                    "image": "{{ asset('assets/images/transport/' . $transfer['image']) }}",
                    "url": "{{ $meta_url }}"
                  } @if(!$loop->last),@endif
            @endforeach
          ]
        }
        </script>

    <script>
        // Function to get URL parameters
        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        // Auto-trigger popup if transport details are in the URL
        document.addEventListener("DOMContentLoaded", function () {
            let departure = getQueryParam("departure");
            let destination = getQueryParam("destination") || "Destination inconnue";
            let price = getQueryParam("price");
            let image = getQueryParam("image");
            let description = getQueryParam("description") || "Aucune description disponible.";

            if (departure && price && image) {
                showDetails(departure, destination, price, "/assets/images/transport/" + image, description);
            }
        });

        // Function to show modal
        function showDetails(departure, destination, price, image, description) {
            document.getElementById("modalDeparture").innerText = departure + " ⇄ " + destination;
            document.getElementById("modalPrice").innerText = "Prix: " + price;
            document.getElementById("modalImage").src = image;
            document.getElementById("modalDescription").innerText = description;

            let whatsappMessage = `Bonjour, je souhaite réserver un transport de ${departure} à ${destination}. Description: ${description}`;
            let encodedMessage = encodeURIComponent(whatsappMessage);
            let whatsappLink = `https://wa.me/212770134539?text=${encodedMessage}`;

            document.getElementById("whatsappLink").setAttribute("href", whatsappLink);

            // Ensure the modal exists before showing
            let modalElement = document.getElementById("transportModal");
            if (modalElement) {
                let modal = new bootstrap.Modal(modalElement);
                modal.show();
            }
        }

    </script>
@endsection