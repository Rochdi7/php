@extends('layout.base')
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<!-- Standard Favicon -->
<link rel="icon" type="image/png" sizes="192x192" href="/assets/images/icons/android-chrome-192x192.png">
<link rel="icon" type="image/png" sizes="512x512" href="/assets/images/icons/android-chrome-512x512.png">

<!-- Apple Touch Icon (for iOS) -->
<link rel="apple-touch-icon" sizes="180x180" href="/assets/images/icons/apple-touch-icon.png">

<!-- Default ICO Favicon -->
<link rel="shortcut icon" href="/assets/images/icons/favicon.ico" type="image/x-icon">

<div class="gallery-overlay"></div>

@section('content')
<link rel="icon" href="/favicon.ico" type="image/x-icon">


        <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset(path: 'assets/css/animation.css') }}">

<section class="hero-section container-fluid p-0">
    <!-- Preload Video -->
    <video class="hero-video" autoplay loop muted playsinline preload="auto"
        poster="{{ asset('assets/images/aeroport.webp') }}">
        
        <!-- Load WebM First (Faster & Smaller) -->
        <source src="{{ asset('assets/images/excursions/aeroport.webp') }}" type="video/webm">
        
        <!-- MP4 Fallback (For Browsers That Don't Support WebM) -->
        <source src="{{ asset('assets/videos/Transport.mp4') }}" type="video/mp4">

        Your browser does not support the video tag.
    </video>

    <div class="hero-overlay"></div>

    <div class="hero-content text-center">
        <h1 class="hero-title" style="font-family: 'Amatic SC', cursive;">
            Découvrez le Transport Privé de Luxe
        </h1>
        <p class="hero-subtitle">
            Voyagez en toute exclusivité avec notre service de transport privé haut de gamme.
        </p>
        <a href="#vehicules" class="custom-btn" style="border: none;">
            <span class="text">Réserver votre trajet privé</span>
            <span class="icon">✈</span>
        </a>
    </div>
</section>


    <!-- Lazy Load Video Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let video = document.querySelector(".lazy-video");
            let source = video.querySelector("source");

            // Load video only when it's about to be seen
            let observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        source.src = source.dataset.src;
                        video.load(); // Start loading video
                        observer.unobserve(video);
                    }
                });
            }, { threshold: 0.3 });

            observer.observe(video);
        });
    </script>



    <h2 class="fw-bold text-center" style="font-family: 'Amatic SC', cursive; margin-top: 20px;">À Propos ? </h2>
    <section id="apropos" class="about-us position-relative py-5">
        <img loading="lazy" style="opacity: 0.8; !important" src="{{ asset('assets/images/banners/section-vector1.png') }}"
            class="deco-left" alt="Left Decoration">
        <img loading="lazy" style="opacity: 0.8; !important" src="{{ asset('assets/images/banners/section-vector2.png') }}"
            class="deco-right">
        <!-- Decorative Background -->
        <div class="about-bg-left position-absolute top-0 start-0 w-25 h-100" data-aos="fade-right"></div>
        <div class="about-bg-right position-absolute top-0 end-0 w-25 h-100" data-aos="fade-left"></div>

        <div class="container">

            <div class="row align-items-center">
                <!-- Left Content (Text & Tabs) -->
                <div class="col-lg-6" data-aos="zoom-in">
                    <p class="text-accent fw-semibold" data-aos="fade-down">PK Tours</p>
                    <h2 class="fw-bold text-dark" data-aos="fade-up" data-aos-delay="100">Découvrez Notre Parcours avec
                        PK Tours</h2>

                    <!-- Tabs Container -->
                    <div class="tab-container d-flex gap-4 my-3 justify-content-center" id="tabContainer" data-aos="flip-up"
                        data-aos-delay="200">
                        <button class="btn btn-link text-primary fw-bold active-tab d-flex align-items-center p-3"
                            id="descriptionTab" data-aos="fade-right">
                            <svg class="icon-tab me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 12l2-2 4 4L21 5l2 2L9 19l-6-6z" />
                            </svg>
                            Description
                        </button>
                        <button class="btn btn-link text-secondary fw-bold d-flex align-items-center p-3" id="customerTab"
                            data-aos="fade-left">
                            <svg class="icon-tab me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M17 6.1c.5 0 .9.4.9.9v9.9c0 .5-.4.9-.9.9H7c-.5 0-.9-.4-.9-.9V7c0-.5.4-.9.9-.9h10M9 11h6m-6 4h3m5.3-9.4L18 5l.7.6 1.3 1.3 1.3 1.3L21 10l-.6-.7-1.3-1.3L18 6z" />
                            </svg>
                            Satisfaction Client
                        </button>
                    </div>

                    <p class="about-text" id="aboutText" data-aos="fade-up">
                        Une agence de transport touristique à Marrakech pour vous guider dans vos déplacements touristiques
                        et événements.
                        Une large gamme de circuits Maroc sur mesure et d'excursions Maroc pour les clients souhaitant
                        découvrir la magie de la ville.
                        Nous mettons à votre disposition une équipe alliant dynamisme et expérience, vous accompagnant dans
                        vos déplacements touristiques
                        dans des véhicules confortables et entièrement climatisés.
                    </p>

                    <p class="about-text d-none" id="customerText" data-aos="fade-up" data-aos-delay="300">
                        La satisfaction de nos clients est notre priorité absolue. Nous nous engageons à offrir un service
                        de qualité, répondant à
                        toutes vos attentes pour un voyage agréable et sans stress.
                    </p>

                    <!-- Button and Customer Group (Aligned on the Same Line) -->
                    <div class="d-flex align-items-center justify-content-between mt-3" data-aos="flip-up">
                        <a href="{{ url('/transport') }}" class="custom-btn">En savoir plus</a>
                        <div class="d-flex align-items-center">
                            <img loading="lazy" src="{{ asset('assets/images/icons/customer-img-grp.png') }}" width="40"
                                alt="Clients Satisfaits">
                            <span class="ms-2 text-muted fw-bold">1K+ Clients Satisfaits</span>
                        </div>
                    </div>
                </div>

                <!-- Image Grid Section -->
                <div class="col-lg-6">
                    <div class="image-grid">
                        <div class="image-large" data-aos="zoom-in">
                            <img loading="lazy" src="{{ asset('assets/images/banners/apropos.jpg') }}"
                                class="img-fluid rounded" alt="Image 1">
                        </div>
                        <div class="image-small" data-aos="fade-right">
                            <img loading="lazy" src="{{ asset('assets/images/activities/apropos2.webp') }}"
                                class="img-fluid rounded" alt="Image 2">
                        </div>
                        <div class="image-small" data-aos="fade-left">
                            <img loading="lazy" src="{{ asset('assets/images/activities/1.png.webp') }}"
                                class="img-fluid rounded" alt="Image 3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="vehicules" class="luxury-vehicles scroll-animation">
        <div class="container">
            <div class="luxury-vehicles-container" data-aos="flip-left">
                <img loading="lazy" src="{{ asset('assets/images/banners/deco-left.png.webp') }}" class="deco-left"
                    alt="Left Decoration">

                <div class="content-container text-center">
                    <h2 class="section-title" style="font-family: 'Amatic SC', cursive;">NOS VÉHICULES DE LUXE</h2>
                    <div class="row justify-content-center">

                        <!-- Hyundai Staria -->
                        <div class="col-md-3 col-sm-6 vehicle-item">
                            <h4 class="brand-name">Staria</h4>
                            <div class="vehicle-card">
                                <div class="vehicle-img">
                                    <img loading="lazy" src="{{ asset('assets/images/transport/staria.png') }}"
                                        alt="Hyundai Staria">
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
                                    <img loading="lazy" src="{{ asset('assets/images/transport/vito.png') }}"
                                        alt="Mercedes Vito">
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
                                    <img loading="lazy" src="{{ asset('assets/images/transport/tucson.png') }}"
                                        alt="Hyundai Tucson">
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

                        <div class="d-flex justify-content-center mt-3" data-aos="flip-up">
                            <a href="{{ url('/transport') }}" class="custom-btn">En savoir plus</a>
                        </div>

                    </div>
                </div>
            </div>

            <img loading="lazy" src="{{ asset('assets/images/banners/deco-right.png.webp') }}" class="deco-right"
                alt="Right Decoration">
        </div>
    </section>


    <!-- EXCURSIONS SECTION -->
    <section id="excursion" class="excursion-section py-5">
        <div class="container">
            <h2 class="section-title text-center mb-4"
                style="font-family: 'Amatic SC', cursive; color: var(--primary-color);">
                Nos Excursions
            </h2>
        </div>

        <div class="container-fluid px-lg-5">
            <div id="excursionCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach (array_chunk($excursions, 3) as $index => $chunk)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row justify-content-center">
                                @foreach ($chunk as $excursion)
                                                <div class="col-md-4 col-12">
                                        <!-- Link wrapping the card to make the entire card clickable -->
                                        <a href="{{ route('excursions.show', ['slug' => Str::slug($excursion['name'])]) }}"
                                            class="excursion-card-link">
                                            <div class="excursion-card">
                                                <div class="excursion-image">
                                                    <img loading="lazy"
                                                        src="{{ asset('assets/images/excursions/' . $excursion['image']) }}"
                                                        class="img-fluid" alt="{{ $excursion['name'] }}">
                                                    <div class="gallery-icon"
                                                        onclick="event.preventDefault(); openGallery({{ json_encode($excursion['gallery']) }})">
                                                        <i class="fas fa-images"></i>
                                                    </div>
                                                </div>
                                                <div class="excursion-info p-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="excursion-title">{{ $excursion['name'] }}</h5>
                                                        <p class="excursion-transport">
                                                            <i class="fas fa-bus"></i> {{ $excursion['transport'] }}
                                                        </p>
                                                    </div>
                                                    <p class="excursion-description">{{ $excursion['description'] }}</p>

                                                    <!-- Centered Voir Détails Button -->
                                                    <div class="d-flex justify-content-center">
                                                        <button class="custom-btn" style="border: none;">
                                                            Voir Détails
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </a> <!-- End of link -->
                                    </div>
                                @endforeach
                                    </div>
                        </div>
                    @endforeach
                    </div>

                <!-- Centered Voir Tous Button -->
                <div class="d-flex justify-content-center mt-3">
                    <button class="custom-btn2" onclick="window.location.href='{{ url('/excursions') }}'">
                        Voir Tous
                    </button>
                </div>

                <!-- Carousel Controls -->
                @if(count($excursions) > 3)
                    <button class="carousel-control-prev custom-carousel-btn" type="button" data-bs-target="#excursionCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next custom-carousel-btn" type="button" data-bs-target="#excursionCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                @endif

            </div>
        </div>
    </section>

    <!-- CIRCUITS SECTION -->
    <section id="circuit" class="excursion-section py-5">
        <div class="container">
            <h2 class="section-title text-center mb-4"
                style="font-family: 'Amatic SC', cursive; color: var(--primary-color);">
                Nos Circuits
            </h2>
        </div>
        <div class="container-fluid px-lg-5">
            <div id="circuitCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach (array_chunk($circuits, 2) as $index => $chunk)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row justify-content-center">
                                @foreach ($chunk as $circuit)
                                                <div class="col-md-6 col-12">
                                        <div class="excursion-card">
                                            <div class="excursion-image">
                                                <img loading="lazy"
                                                    src="{{ asset('assets/images/excursions/' . $circuit['image']) }}"
                                                    class="img-fluid" alt="{{ $circuit['name'] }}">
                                                <div class="gallery-icon"
                                                    onclick="event.preventDefault(); openGallery({{ json_encode($circuit['gallery']) }})">
                                                    <i class="fas fa-images"></i>
                                                </div>

                                            </div>
                                            <div class="excursion-info p-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="excursion-title">{{ $circuit['name'] }}</h5>
                                                    <p class="excursion-transport">
                                                        <i class="fas fa-bus"></i> {{ $circuit['transport'] }}
                                                    </p>
                                                </div>
                                                <p class="excursion-description">{{ $circuit['description'] }}</p>

                                                <!-- Centered Voir Détails Button -->
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('circuits.show', ['slug' => Str::slug($circuit['name'])]) }}"
                                                        class="custom-btn" style="border: none;">
                                                        Voir Détails
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    </div>
                        </div>
                    @endforeach
                    </div>
            </div>

            <!-- Centered Voir Tous Button -->
            <div class="d-flex justify-content-center mt-3">
                <button class="custom-btn2" onclick="window.location.href='{{ route('circuits.index') }}'">
                    Voir Tous
                </button>
            </div>

            <!-- Carousel Controls -->
            @if(count($circuits) > 2)
                <button class="carousel-control-prev custom-carousel-btn" type="button" data-bs-target="#circuitCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next custom-carousel-btn" type="button" data-bs-target="#circuitCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            @endif

        </div>
    </section>


    <!-- Gallery Modal -->
    <div class="modal fade gallery-modal" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0 shadow-none">
                <div class="modal-body text-center p-0">
                    <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner"></div>
                        <button class="carousel-control-prev custom-carousel-btn" type="button"
                            data-bs-target="#galleryCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next custom-carousel-btn" type="button"
                            data-bs-target="#galleryCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                    <button type="button" class="btn-close gallery-close-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    <section id="offers" class="offers-section" data-aos="fade-right">
        <!-- Left Background Decoration -->
        <img loading="lazy" src="{{ asset('assets/images/banners/deco-left.png.webp') }}" class="deco-left"
            alt="Left Decoration">

        <h2 class="offers-title" style="    font-family: 'Amatic SC', cursive;
                                                                                                ">Nos Meilleures Offres
        </h2>
        <p class="offers-subtitle">Découvrez nos offres</p>

        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card-offer"
                        style="background-image: url('{{ asset('assets/images/excursions/Agafay.jpg.webp') }}');">
                        <span class="discount-badge">8% Off</span>
                        <div class="card-body">
                            <h5 class="card-title">Le désert de Marrakech</h5>
                            <p class="card-text">Dinner+ <span id="camel-text">Dromadaire</span> +Quad</p>
                            <a href="{{ url('/excursions/agafay') }}" class="custom-btn">
                                <span>Réservez Maintenant</span>
                                <span>➜</span>
                            </a>
                        </div>
                    </div>
                </div>

                <style>
                    #camel-text {
                        display: inline !important;
                    }
                </style>

                <script>
                    function fixTranslation() {
                        let camelText = document.getElementById("camel-text");
                        if (camelText.innerText.includes("Dromedary")) {
                            camelText.innerText = "Camels"; // Replaces only "Dromedary" inside <span>
                        }
                    }

                    document.addEventListener("DOMContentLoaded", function () {
                        setInterval(fixTranslation, 1000); // Runs every second to check for incorrect translations
                    });
                </script>





                <div class="col-md-6 col-lg-4">
                    <div class="card-offer"
                        style="background-image: url('{{ asset('assets/images/excursions/marrakech.webp') }}');">
                        <span class="discount-badge">Nouveau</span>
                        <div class="card-body">
                            <h5 class="card-title">Visite de ville</h5>
                            <p class="card-text">les jardins Majorelle et Menara + les monuments historiques</p>
                            <a href="#" class="custom-btn" onclick="openPopup(event)">
                                <span>Réservez Maintenant</span>
                                <span>➜</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Popup Modal -->
                <div id="reservationPopup" class="popup-overlay">
                    <div class="popup-content">
                        <span class="popup-close" onclick="closePopup()">&times;</span>
                        <h3>Visite de ville</h3>
                        <p>
                            Renommée depuis toujours pour l’activité de ses commerçants et l’habileté de ses artisans,
                            Marrakech brille aussi par la qualité de son climat et un environnement aussi exceptionnel que
                            varié, avec sa palmeraie, ses roseraies, la proximité de l’Atlas enneigé et des vallées fleuries
                            qui en descendent. Elle est encore aujourd’hui la capitale du Sud Marocain, toujours au
                            carrefour des cultures, gardienne des traditions et du folklore, et riche d’un patrimoine
                            architectural qui en fait l’un des hauts lieux du tourisme international.
                        </p>
                        <p><strong>Monuments et Palaces:</strong> Vous découvrirez la majestueuse silhouette de la Koutoubia
                            (11e siècle) et le Palais la Bahia (19e siècle).</p>
                        <p><strong>La place Jemaa el Fna:</strong> Cœur vivant de la ville, connue dans le monde entier pour
                            son animation perpétuelle.</p>
                        <p><strong>Souks:</strong> Véritables poumons économiques de la ville rouge où les artisans
                            utilisent encore dans de nombreux domaines les anciennes techniques.</p>
                        <p><strong>Les Jardins Historiques:</strong> Le jardin Majorelle et les Jardins de la Menara.</p>
                        <a href="https://wa.me/?text={{ urlencode('Bonjour, je souhaite réserver un transport de Visite de ville à La journée.') }}"
                            class="custom-btn">
                            Réserver via WhatsApp
                        </a>
                    </div>
                </div>
                <!-- Script to Control Popup -->
                <script>
                    function openPopup(event) {
                        event.preventDefault(); // Prevents jumping to the top
                        document.getElementById("reservationPopup").classList.add("show");
                    }

                    function closePopup() {
                        document.getElementById("reservationPopup").classList.remove("show");
                    }
                </script>

                <div class="col-md-6 col-lg-4">
                    <div class="card-offer"
                        style="background-image: url('{{ asset('assets/images/banners/sahara.avif') }}');">
                        <span class="discount-badge ">Offre Spéciale</span>
                        <div class="card-body">
                            <h5 class="card-title marrakech">Circuit</h5>
                            <p class="card-text">les Dunes du saraha</p>
                            <a href="{{ url('/circuits') }}" class="custom-btn">
                                <span>Réservez Maintenant</span>
                                <span>➜</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="card-offer"
                        style="background-image: url('{{ asset('assets/images/excursions/Essaouira.jpg.webp') }}');">
                        <span class="discount-badge">-30%</span>
                        <div class="card-body">
                            <h5 class="card-title">EXCURSIONS</h5>
                            <p class="card-text">Visitez votre endroit de rêve avec -30%.</p>
                            <a href="{{ url('/excursions') }}" class="custom-btn">
                                <span>Réservez Maintenant</span>
                                <span>➜</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="card-offer"
                        style="background-image: url('{{ asset('assets/images/excursions/aeroport.webp') }}');">
                        <span class="discount-badge">Offre Limitée</span>
                        <div class="card-body">
                            <h5 class="card-title">TRANSPORT</h5>
                            <p class="card-text">Économisez 25% explorez le Maroc avec nous !</p>
                            <a href="{{ url('/transport') }}" class="custom-btn">
                                <span>Réservez Maintenant</span>
                                <span>➜</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Background Decoration -->
        <img loading="lazy" src="{{ asset('assets/images/banners/deco-right.png.webp') }}" class="deco-right"
            alt="Right Decoration">
    </section>

    <section class="why-choose-us py-5" data-aos="flip-left"
        style="background: url('{{ asset('assets/images/banners/hero.webp') }}') no-repeat center center; 
                                                                               background-size: cover; opacity: 0.1; !important">
        <div class="container text-center">
            <p class="text-success fw-semibold" style="color: var(--accent-color) !important;">Notre Succès</p>
            <h2 class="fw-bold" style="font-family: 'Amatic SC', cursive;">Pourquoi Nous ? </h2>
            <div class="row mt-4">
                <!-- Card 1 -->
                <div class="col-md-4 mb-4">
                    <div class="feature-card bg-1" data-aos="flip-left" data-aos-delay="100">
                        <div class="icon-wrapper bg-success text-white rounded-circle p-3">
                            <i class="fas fa-handshake fs-3"></i>
                        </div>
                        <div class="text-start">
                            <h5 class="fw-bold">Des clients satisfaits</h5>
                            <p class="text-muted">Service personnalisé du premier contact au retour et au suivi.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-4 mb-4">
                    <div class="feature-card bg-2" data-aos="flip-left" data-aos-delay="200">
                        <div class="icon-wrapper bg-warning text-white rounded-circle p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" viewBox="0 0 70 70">
                                <path
                                    d="M63.3244 22.918C62.2732 22.7909 58.8339 22.9134 57.757 22.876C56.4317 22.8749 53.0974 22.8597 51.8059 22.8597L50.8142 22.8574C50.1877 22.9134 49.8389 22.3744 50.071 21.84C50.1854 21.5157 50.806 19.8847 50.9344 19.5149C52.4779 15.3639 54.9104 8.78736 56.4679 4.64103C56.6837 4.05303 56.9905 3.31453 57.1819 2.7102C57.4339 1.7407 56.679 0.652196 55.6442 0.590363L39.7274 0.416529C37.7744 0.376863 30.8957 0.259029 29.0652 0.220529C28.7036 0.197772 28.3422 0.267313 28.0148 0.422618C27.6875 0.577923 27.405 0.813894 27.1939 1.10836C26.8987 1.47353 26.838 1.98103 26.7249 2.3917C26.6234 2.7837 26.4099 3.72753 26.236 4.46953C25.9333 4.45046 25.6438 4.33887 25.4065 4.14986C23.7569 2.80936 22.176 1.69986 20.1857 3.2632C19.3877 3.79403 18.9794 4.4917 18.0892 4.6177C17.0812 4.66903 16.0685 4.25253 14.8855 4.5022C14.1739 4.62353 13.475 5.23953 13.1659 5.85086C12.6525 6.71886 12.5207 7.8062 11.9654 8.46653C11.3505 9.0557 10.2387 9.2412 9.41037 9.77086C8.12004 10.402 7.95554 12.0237 8.24137 13.195C8.38837 14.168 8.62871 14.8575 8.01037 15.6894C5.90921 18.2957 5.92671 19.0645 8.07687 21.6044C8.73254 22.4175 8.53187 23.191 8.39887 24.1687C7.73154 27.6512 10.2772 27.3152 12.1882 28.6499C12.761 29.2239 12.9407 30.3065 13.4925 31.297C14.0245 32.4905 15.5587 32.6562 16.6659 32.4124C17.6447 32.2759 18.438 32.0764 19.2547 32.7355L19.9185 33.2535L19.1707 36.456L19.0739 36.8749C18.7087 38.2445 19.9524 39.697 21.3185 39.6329C21.3349 39.6235 28.5484 39.6795 28.8879 39.6515C29.834 39.655 36.1364 39.6597 36.9274 39.6667C36.9285 39.6025 35.9859 42.7759 35.9812 42.7712L28.3045 68.5709C28.2413 68.7725 28.2508 68.9898 28.3313 69.1852C28.4118 69.3805 28.5582 69.5414 28.7451 69.6399C28.932 69.7384 29.1475 69.7683 29.3542 69.7243C29.5608 69.6803 29.7455 69.5653 29.876 69.3992C36.2904 61.1614 52.9294 39.8184 59.1909 31.885L64.1025 25.6539C64.9519 24.8209 64.5202 23.1782 63.3255 22.9215L63.3244 22.918ZM16.5235 31.4569C15.6089 31.5899 14.7805 31.7334 14.2882 30.8245C13.797 30.0499 13.6897 28.9579 12.8427 27.9907C11.886 27.125 10.7882 27.0107 10.0205 26.5242C9.11871 26.0307 9.27387 25.2245 9.40338 24.3145C9.62271 23.2692 9.72071 21.8902 8.94254 20.9849C8.31604 20.1122 7.53671 19.3434 7.55887 18.6667C7.63121 17.521 9.76854 16.1677 9.68921 14.6522C9.74871 13.629 9.37771 12.5919 9.53404 11.704C9.60871 11.396 9.76854 11.2257 10.1395 11.0122C11.0717 10.507 12.1415 10.4032 13.0655 9.5667C13.923 8.67886 14.0817 7.59853 14.6149 6.70136C14.8424 6.35136 14.9824 6.2557 15.239 6.20903C16.1117 6.11336 17.1115 6.5112 18.1627 6.48436C19.3644 6.52753 20.4937 5.49503 21.3372 4.87553C22.4992 3.92703 23.1549 5.2232 24.1804 5.87186C25.137 6.73753 26.8007 6.7212 27.8997 6.4902C28.5052 6.43653 28.9054 6.32336 29.2367 6.55086C29.9869 7.5227 29.9507 8.77453 30.989 9.84436C32.0507 10.8804 33.292 10.8734 34.2557 11.62C34.5929 12.4682 34.062 13.5695 34.1647 14.6732C34.0877 16.2704 35.9054 17.4195 36.288 18.669C36.3009 18.8137 36.1935 19.124 35.9392 19.4845C35.5239 20.034 34.818 20.9382 34.5415 21.588C33.9815 22.8819 34.7072 24.4102 34.5987 25.5897C34.4412 26.2722 33.5242 26.4635 32.8394 26.789C32.3494 27.006 31.787 27.2347 31.255 27.7574C30.415 28.6884 30.3182 29.7512 29.82 30.695C29.379 31.549 28.7117 31.3729 27.8332 31.2912C27.0562 31.1909 26.0447 31.017 25.2245 31.381C24.1384 31.8384 23.0639 33.2885 22.1655 33.3014C21.4679 33.3282 20.6932 32.5465 19.8275 31.92C18.9269 31.1477 17.5654 31.241 16.5224 31.4592L16.5235 31.4569ZM57.253 32.662C56.6171 32.2274 55.9652 31.8165 55.2989 31.43C53.9304 30.6357 52.544 29.8725 51.1409 29.141C50.0395 28.5682 48.9289 28.014 47.8124 27.4704C46.718 26.9313 45.6072 26.4263 44.4815 25.956C44.4211 25.9315 44.3596 25.9097 44.2972 25.8907C44.2379 25.8736 44.1746 25.8759 44.1167 25.8973C44.0587 25.9187 44.0092 25.9581 43.9752 26.0097C43.938 26.066 43.9224 26.1338 43.9311 26.2006C43.9399 26.2675 43.9726 26.329 44.023 26.3737C44.0919 26.432 44.1677 26.4892 44.2505 26.5417C46.3063 27.8269 48.411 29.0322 50.5599 30.1549L50.687 30.2214C51.7814 30.793 52.8862 31.3449 54.0015 31.8769C54.9407 32.3237 55.8927 32.7484 56.847 33.166L55.4377 34.9184C53.0577 33.502 50.5984 32.2467 48.1425 30.982C45.5164 29.7045 42.8984 28.4084 40.1824 27.3105C40.1123 27.2834 40.0346 27.2834 39.9645 27.3105C39.8944 27.3376 39.8369 27.3898 39.8032 27.457C39.7696 27.5242 39.7622 27.6015 39.7824 27.6739C39.8027 27.7462 39.8492 27.8084 39.9129 27.8484C42.4352 29.3255 45.0051 30.7197 47.6187 32.0285C50.0485 33.2423 52.5144 34.3822 55.013 35.4469L52.5934 38.4499C52.004 38.0298 51.3984 37.6328 50.778 37.2599C49.434 36.4651 48.0689 35.7065 46.6842 34.9849C44.7965 34.0119 42.9077 33.0424 40.9302 32.2292C40.8229 32.1849 40.698 32.2094 40.6304 32.2887C40.5499 32.3832 40.5639 32.5104 40.6444 32.571C41.8274 33.4647 43.6392 34.5987 45.577 35.6732C45.8839 35.8435 46.1942 36.008 46.5057 36.1737C47.7158 36.8147 48.9387 37.4312 50.1737 38.0229C50.8889 38.367 51.5585 38.6727 52.1909 38.9469L49.7992 41.909C49.4907 41.6414 49.1674 41.3914 48.8309 41.16C47.9699 40.5639 46.9922 39.9899 46.2455 39.543C46.0962 39.4532 45.9679 39.3739 45.8629 39.3144C44.4862 38.5257 43.0979 37.7592 41.6197 37.1339C41.5404 37.1 41.4494 37.0965 41.391 37.1292C41.3175 37.1712 41.3012 37.2435 41.3175 37.2797C41.552 37.7954 42.9835 38.8734 44.6472 39.8965C45.7635 40.564 46.8991 41.1986 48.0527 41.7994C48.5369 42.0537 48.9779 42.2742 49.3617 42.4527L47.1357 45.206C47.0914 45.1664 47.0494 45.1267 47.0027 45.087C46.291 44.4734 45.3367 43.8235 45.1617 43.6695C44.233 43.0629 43.3149 42.4399 42.2707 41.9977C41.2405 42.0385 42.3722 43.092 43.8352 44.1467C44.5667 44.674 45.381 45.2014 46.0484 45.6015C46.2374 45.7147 46.41 45.815 46.571 45.9049C41.279 52.4499 35.5787 59.486 31.4732 64.5505L38.1757 43.449C38.4989 42.413 38.9107 41.1869 39.1989 40.1252C39.5384 38.7182 38.2889 37.2599 36.8737 37.3392C36.596 37.3322 35.903 37.3509 35.6125 37.3415L28.8844 37.352C28.4399 37.3275 21.3664 37.4069 21.2229 37.352C21.2229 37.352 21.217 37.345 21.2182 37.3275L21.2999 36.925L21.8295 34.3222C23.0137 34.4984 24.0415 33.6502 25.1324 32.8067C25.9665 32.186 26.6677 32.4264 27.6419 32.5757C29.988 33.117 31.0275 32.018 31.7625 29.9285C32.3319 27.9639 34.6104 28.476 35.8307 27.0247C36.5435 26.2547 36.477 24.92 36.3464 24.1034C36.2414 23.1864 36.0465 22.5505 36.6252 21.8622C37.3182 20.9125 38.3005 20.16 38.374 18.6667C38.3635 17.7684 37.9575 17.1174 37.632 16.639L36.7127 15.4082C36.1935 14.7152 36.4362 14.1634 36.5599 13.2604C36.7372 12.425 36.8037 10.9527 36.0489 10.1255C35.2089 9.03353 33.5324 8.86203 32.6445 8.18653C32.1475 7.60903 31.9539 6.51703 31.4265 5.6957C31.08 5.0412 30.2692 4.36803 29.498 4.2572C29.1273 4.1916 28.7494 4.17591 28.3745 4.21053L28.4597 3.7847C28.5449 3.43936 28.6814 2.5282 28.7817 2.21903C28.7945 2.19458 28.8126 2.17324 28.8346 2.15651C28.8565 2.13978 28.8819 2.12807 28.9089 2.1222L29.8037 2.10236C36.0302 1.9542 49.1774 1.81303 55.5427 1.75703C55.8729 1.76053 56.1482 2.12336 56.0712 2.4652C54.9139 5.80653 52.577 12.0715 51.366 15.449L50.0057 19.1765C49.8704 19.5359 49.2824 21.175 49.1552 21.5064C48.6407 22.603 49.6359 23.9575 50.8084 23.8129L52.6365 23.807C53.8839 24.759 55.1803 25.6449 56.5204 26.4612C57.2423 26.8991 57.9764 27.3165 58.7219 27.713C59.3075 28.0245 59.906 28.3127 60.5069 28.5985L59.0835 30.3754C58.6121 30.0059 58.1206 29.6627 57.6112 29.3475C56.468 28.6375 55.3076 27.9555 54.131 27.3024C53.2191 26.7979 52.2981 26.3102 51.3684 25.8394C50.4507 25.3642 49.5156 24.9237 48.5649 24.5187C48.5145 24.4973 48.4615 24.4824 48.4074 24.4744C48.3558 24.4666 48.3031 24.4733 48.2552 24.4937C48.2072 24.5141 48.1658 24.5474 48.1355 24.5899C48.1025 24.635 48.0842 24.6893 48.0832 24.7453C48.0821 24.8012 48.0984 24.8562 48.1297 24.9025C48.1745 24.9676 48.2306 25.0241 48.2954 25.0694C49.9767 26.2245 51.7128 27.298 53.4975 28.2859L53.6025 28.3442C54.5108 28.8495 55.4304 29.3342 56.3605 29.7979C57.1224 30.1782 57.8982 30.534 58.6752 30.8864L58.3847 31.248L57.2484 32.6655L57.253 32.662ZM63.3512 25.053L60.9572 28.0397C60.6311 27.76 60.2891 27.4994 59.9329 27.2592C58.7744 26.4612 57.3277 25.627 57.1317 25.4579C56.4014 25.0344 55.6745 24.6074 54.9337 24.2025C54.6805 24.0637 54.4239 23.933 54.1684 23.8C56.728 23.793 59.4744 23.7884 61.7237 23.7954C61.9325 23.807 62.9382 23.7732 63.0922 23.8257C63.616 23.9902 63.8039 24.6167 63.3512 25.053Z">
                                </path>
                                <path
                                    d="M20.878 14.0001C21.1265 9.52474 14.3983 9.60757 14.6083 14.0001C14.9105 17.7567 20.5817 17.8256 20.878 14.0001ZM18.7885 14.0001C19.0627 16.4186 15.5592 16.3766 15.7248 14.0001C16.0935 12.0634 18.4012 12.3866 18.7885 14.0001ZM23.9417 23.3334C24.2438 27.0901 29.915 27.1589 30.2113 23.3334C30.4598 18.8581 23.7317 18.9409 23.9417 23.3334ZM28.123 23.3334C28.3972 25.7519 24.8937 25.7099 25.0593 23.3334C25.428 21.3967 27.7357 21.7199 28.123 23.3334ZM27.3285 12.1614L15.509 23.6752C14.4065 24.7626 16.0772 26.4227 17.1587 25.3249L28.6725 13.5054C29.5277 12.6211 28.2058 11.3097 27.3285 12.1614Z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-start">
                            <h5 class="fw-bold">Tarification compétitive</h5>
                            <p class="text-muted">Bénéficiez des meilleures offres et prix pour une expérience inoubliable.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4 mb-4">
                    <div class="feature-card bg-3" data-aos="flip-left" data-aos-delay="300">
                        <div class="icon-wrapper bg-primary text-white rounded-circle p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70">
                                <path
                                    d="M7.93843 51.3252C12.6831 53.68 5.85265 67.3267 12.9084 67.6647C75.927 66.7022 62.2114 79.3328 63.2231 16.2584C63.2406 13.9156 60.9842 12.6644 58.8459 12.9772C59.5798 8.84501 55.3722 8.22704 52.2834 8.6022C54.0936 -0.339209 39.5347 -0.33374 41.3459 8.6022H38.0647C39.8748 -0.339209 25.3159 -0.33374 27.1272 8.6022H23.8459C25.6561 -0.339209 11.0972 -0.33374 12.9084 8.6022C10.3972 8.47532 6.29125 8.33095 6.34593 11.8834C6.93656 13.7144 4.78296 51.5155 7.93843 51.3252ZM61.0662 16.7309C61.1406 17.6692 61.1358 18.6121 61.052 19.5495C60.1803 19.3308 59.4989 20.115 58.8459 20.5733V19.4292C61.3933 19.3702 61.8428 16.3995 58.8459 17.9308V17.5786C59.6577 17.5412 60.4361 17.2441 61.0662 16.7309ZM58.8459 21.5752C59.6078 21.5006 60.3403 21.2428 60.9809 20.8238C60.954 21.1259 60.972 21.4304 61.0345 21.7272H58.847L58.8459 21.5752ZM59.9397 15.1658C60.1215 15.15 60.3036 15.1937 60.4585 15.2904C60.6133 15.3871 60.7326 15.5314 60.7983 15.7017C60.0917 15.5158 59.4092 16.137 58.847 16.5002V15.1658H59.9397ZM58.8459 23.9158H61.0334C60.433 82.3045 70.2953 62.3064 12.9073 65.4794C10.6837 65.8064 12.2686 56.1431 11.8158 55.2113C14.0656 56.8202 18.527 63.5183 21.6595 63.2908C69.3623 63.2263 57.7478 69.9517 58.847 23.9158H58.8459ZM15.0959 50.1658H21.6584V56.7283H19.4709C19.8898 53.7194 18.6572 50.1199 15.0959 50.1658ZM17.2834 57.5869L12.0498 52.3522C16.7716 51.9158 17.6586 52.9319 17.2845 57.5869H17.2834ZM43.5334 6.4147C43.5334 3.7536 47.203 3.96907 48.9584 4.45142C44.0803 6.66626 45.7231 8.9172 49.9811 6.01329C50.0705 6.42552 50.1217 6.8451 50.1342 7.26673C47.5573 7.91204 46.5467 10.5064 50.1211 8.7411C50.1025 9.18517 50.0806 9.61282 50.073 9.99017C48.8447 10.3325 48.3087 11.8638 50.0456 11.3169C49.6847 13.1314 47.2566 13.0669 45.7209 12.9772C42.5797 13.0559 43.7358 8.25985 43.5334 6.4147ZM29.3147 6.4147C29.2862 3.72517 33.4578 3.77657 35.07 4.67782C30.882 5.99579 31.8719 8.96532 35.7481 5.95751C35.8546 6.42791 35.9122 6.90807 35.9198 7.39032C35.4014 7.63751 34.6216 7.73923 34.4564 8.39439C32.4297 9.36892 33.3309 10.9789 35.1094 9.48814C35.3709 9.53698 35.6414 9.4941 35.875 9.36673C35.8608 9.72767 35.8487 10.0645 35.8542 10.3588C34.172 10.7459 32.8836 13.3491 35.5458 11.9972C34.7758 13.1106 32.8136 13.0538 31.5022 12.9772C28.3609 13.0559 29.517 8.25985 29.3147 6.4147ZM15.0959 6.4147C15.0281 3.69673 19.7553 3.58298 21.1127 4.96439C16.462 6.24954 17.3939 9.83923 21.6081 6.3272C21.6742 6.77182 21.7064 7.22082 21.7044 7.67032C18.9197 8.59126 18.1136 11.6428 21.677 8.90079C21.6573 9.34157 21.6387 9.75501 21.6355 10.1225C20.673 10.4025 19.8909 12.3013 21.4616 11.7642C20.8152 13.1183 18.6802 13.0581 17.2834 12.9783C14.1422 13.0559 15.2983 8.25985 15.0959 6.41579V6.4147ZM8.53343 11.8834C8.46015 10.0897 11.9481 10.9986 12.9084 10.7897C12.8264 16.8097 23.9291 16.8097 23.8459 10.7897H27.1272C27.0452 16.8097 38.1478 16.8097 38.0647 10.7897H41.3459C41.2639 16.8097 52.3666 16.8097 52.2834 10.7897C58.4544 9.91798 56.315 13.1763 56.6584 17.3522C40.9609 17.1127 24.1434 18.4853 8.53343 17.3522V11.8834ZM56.6584 19.5397C54.04 69.1303 70.4309 60.5663 21.6595 61.1022C21.0795 61.1019 20.5232 60.8713 20.1131 60.4612C19.7029 60.051 19.4723 59.4948 19.472 58.9147C25.4439 60.2808 23.5955 53.6024 23.847 50.1647C23.9947 46.5739 17.0177 48.3961 15.097 47.9772C14.517 47.9778 13.961 48.2084 13.5509 48.6185C13.1408 49.0286 12.9101 49.5847 12.9095 50.1647C11.235 50.2555 8.49734 50.3419 8.53453 47.9772V19.5397H56.6584Z">
                                </path>
                                <path
                                    d="M12.9069 23.8962C13.3236 26.2576 11.7562 30.7529 14.1789 31.9309C17.1211 31.4945 23.1848 33.3987 23.9986 29.5181C23.759 26.8274 24.0751 21.0076 20.1551 21.4768C18.4872 21.8924 10.1594 20.6565 12.9069 23.8962ZM16.0634 23.5867C22.4509 22.4295 22.8622 23.159 22.0178 29.6023C19.7881 29.9834 17.5192 30.0812 15.265 29.8932C15.0615 27.8293 14.8964 25.8026 14.5781 23.7496C15.0747 23.672 15.5887 23.6402 16.0634 23.5867ZM27.9175 23.3449C28.0389 25.4449 26.2167 31.3293 29.0878 31.5699C32.03 30.5374 35.8384 32.2087 38.3573 30.6588C38.4361 27.5928 37.8716 24.5443 36.7003 21.7098C34.1562 20.6215 31.1003 21.9012 28.39 21.3838C28.1594 21.3882 27.9367 21.4688 27.7569 21.6132C27.577 21.7576 27.4501 21.9576 27.3961 22.1819C27.3421 22.4061 27.364 22.6419 27.4583 22.8524C27.5527 23.0628 27.7141 23.2361 27.9175 23.3449ZM30.5239 23.089C32.2941 22.8799 34.0745 22.7685 35.857 22.7554C36.1447 24.8434 36.218 26.9871 36.4323 29.0926C34.249 28.8701 32.047 28.9061 29.872 29.1998C29.8522 27.2215 29.6663 25.2484 29.3164 23.3012C29.7136 23.203 30.117 23.1321 30.5239 23.089ZM42.2248 29.716C41.5095 33.9488 49.4873 31.8576 51.9876 31.652C53.6469 29.8517 52.8933 22.5345 50.9125 21.176C42.344 19.7421 40.8215 21.2318 42.2248 29.716ZM44.6037 30.6151L44.6694 30.7288C44.6256 30.8459 44.6037 30.8021 44.6037 30.6151ZM43.989 23.1087C46.103 22.755 48.2493 22.6332 50.3897 22.7456C50.755 25.0922 50.861 27.472 50.7058 29.8418C48.6495 29.9435 46.6009 29.9862 44.5425 30.0529C44.2253 27.7254 43.6598 25.4482 43.498 23.101C43.6606 23.1298 43.8256 23.1324 43.989 23.1087ZM23.1815 34.5931C21.1745 34.1599 14.0105 33.3615 13.8595 36.0554C13.7906 38.1871 12.4355 44.9432 15.1753 45.3676C17.5052 44.9456 19.8633 44.6981 22.23 44.6271C25.6315 43.3343 25.4784 36.7992 23.1815 34.5931ZM22.4455 40.2259C22.3518 40.871 22.1931 41.5049 21.9719 42.1181C21.9762 42.1104 21.8537 42.3149 21.9172 42.2198C20.0687 42.8192 17.7762 42.3357 15.8239 42.9931C15.7034 40.9104 15.4785 38.8352 15.1501 36.7751C19.0308 36.3726 23.7251 34.2092 22.4455 40.2259ZM51.8389 33.4687C50.1086 33.3079 43.1326 32.5346 44.199 35.4834C42.7181 37.2246 43.4859 40.4326 43.2628 42.6606C43.6117 45.7493 47.5437 43.9917 49.5759 44.0999C51.2253 44.1185 53.2247 43.704 53.3155 41.7079C53.5069 39.1671 54.4617 34.9376 51.8389 33.4687ZM51.303 35.3718H51.3139C51.5326 35.351 51.327 35.4517 51.303 35.3718ZM45.505 42.4265C45.5148 42.4637 45.5422 42.421 45.505 42.4265V42.4265ZM51.397 38.9079C51.3481 39.8327 51.21 40.7506 50.9847 41.6488C49.1641 41.8531 47.3384 42.0074 45.5094 42.1115C45.307 40.0345 45.7117 37.7223 44.875 35.7896C46.9608 35.8334 49.1712 35.1892 51.2865 35.3729C51.4508 36.5438 51.4885 37.7291 51.397 38.9079ZM38.9589 48.0779C29.9748 45.8937 27.8289 47.9302 28.8275 56.9526C29.0025 61.0607 34.3575 59.081 36.9748 59.0985C39.3494 59.3501 40.0373 57.1801 39.7792 55.2059C39.3723 52.9451 41.0512 49.6277 38.9589 48.0779ZM30.9034 57.1342C30.9303 57.1308 30.9575 57.136 30.9812 57.1489C31.005 57.1619 31.0241 57.182 31.0358 57.2063C30.9947 57.1771 30.9502 57.1529 30.9034 57.1342ZM37.7033 56.9777C37.6289 57.027 37.6726 57.0784 37.7033 56.9777V56.9777ZM38.365 50.5695C38.2221 52.7076 38.0032 54.8399 37.7087 56.9624C35.5497 57.0346 33.2758 57.6843 31.1473 57.2763C31.1692 54.6312 30.9395 51.9899 30.4615 49.3882C32.2586 49.6912 38.6515 47.9401 38.365 50.5695ZM49.3867 47.4534C48.0983 47.7804 42.9489 46.8431 44.4331 49.2176C43.6325 51.8579 43.2814 56.3707 45.4503 58.3012C48.5521 58.7564 51.7135 58.5879 54.7494 57.8057C56.1056 52.991 56.5781 45.5688 49.3867 47.4534ZM53.6764 48.6598C54.523 50.9184 53.8536 54.0749 53.5889 56.5599C51.2308 56.1585 48.8344 56.887 46.4697 56.5052C45.8524 54.1521 45.553 51.7268 45.5794 49.2942C48.2656 49.1137 50.9934 48.2343 53.6764 48.6598ZM30.2067 34.6806C30.1995 34.7111 30.1955 34.7422 30.1947 34.7735L30.2067 34.6806ZM30.1936 34.7954C30.1888 34.8196 30.1852 34.8441 30.1826 34.8687L30.1936 34.7954Z">
                                </path>
                                <path
                                    d="M27.5413 36.9599C28.4054 37.2453 31.2404 34.64 29.7474 34.0067C28.5552 33.8547 26.6412 35.9153 27.5413 36.9599ZM27.4166 41.0396C29.3996 42.7611 28.0729 39.3049 28.0882 38.2833C27.0207 36.8002 26.7505 40.4183 27.4166 41.0396ZM30.6804 42.6802C28.7488 40.8427 28.9194 43.7193 30.3982 44.4072C32.0727 45.7963 34.398 43.8024 31.5455 43.1089L31.7501 43.1964C31.3756 43.0635 31.0176 42.8904 30.6804 42.6802Z">
                                </path>
                                <path
                                    d="M33.795 44.7878C35.3361 45.6256 39.406 43.0564 36.4682 42.3969C35.6347 42.8037 32.1489 43.6284 33.795 44.7878ZM40.3269 39.7303C39.1478 39.5564 38.5441 41.2911 38.0596 42.1158C38.6021 44.113 41.8866 40.613 40.3269 39.7303ZM33.9066 34.1533C37.551 35.2656 37.6264 32.2775 34.0674 32.3989C31.1175 32.225 30.703 34.0461 33.9066 34.1533Z">
                                </path>
                                <path
                                    d="M37.7899 34.3283C37.8528 34.9919 38.0872 35.6278 38.4702 36.1734L38.3357 35.9984C38.5369 36.2916 38.7437 36.6645 39.1538 36.6317C37.756 37.755 36.6644 39.8364 35.3662 37.4083C33.0988 34.5722 33.7146 38.758 34.8685 39.8856C38.736 45.0044 49.7151 26.8427 39.9041 35.9427C40.2399 34.8981 38.5151 32.7675 37.7899 34.3283Z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-start">
                            <h5 class="fw-bold">Réservation rapide</h5>
                            <p class="text-muted">Un processus de réservation fluide et rapide pour une expérience sans
                                souci.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-md-4 mb-4">
                    <div class="feature-card bg-1" data-aos="flip-left" data-aos-delay="400">
                        <div class="icon-wrapper bg-info text-white rounded-circle p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" viewBox="0 0 70 70">
                                <g clip-path="url(#clip0_1335_373)">
                                    <path
                                        d="M54.4993 61.413C54.3979 61.3243 54.2801 61.2565 54.1525 61.2134C54.0249 61.1703 53.8901 61.1528 53.7557 61.1618C53.6214 61.1708 53.4901 61.2061 53.3694 61.2659C53.2488 61.3256 53.141 61.4085 53.0524 61.5099L48.8249 66.3448C48.3771 66.8574 47.7556 67.1523 47.075 67.1753C46.3925 67.1996 45.7543 66.9461 45.2729 66.4653L42.0148 63.2085V61.0548C42.0148 60.4885 41.5558 60.0294 40.9894 60.0294C40.423 60.0294 39.964 60.4885 39.964 61.0548V68.9746C39.964 69.5409 40.423 70 40.9894 70C41.5558 70 42.0148 69.5409 42.0148 68.9746V66.1082L43.8233 67.9159C44.6625 68.7542 45.8108 69.2274 46.9942 69.2274C48.2802 69.2274 49.5231 68.6632 50.369 67.6945L54.5963 62.8599C54.685 62.7585 54.7528 62.6406 54.7959 62.5131C54.839 62.3855 54.8565 62.2507 54.8475 62.1163C54.8385 61.982 54.8031 61.8507 54.7433 61.73C54.6836 61.6093 54.6007 61.5016 54.4993 61.413ZM11.9144 60.0294C11.6424 60.0294 11.3816 60.1374 11.1893 60.3297C10.997 60.522 10.889 60.7828 10.889 61.0548V68.9746C10.889 69.5409 11.348 70 11.9144 70C12.4808 70 12.9398 69.5409 12.9398 68.9746V61.0548C12.9398 60.7828 12.8317 60.522 12.6394 60.3297C12.4471 60.1374 12.1863 60.0294 11.9144 60.0294ZM68.7023 16.2561L61.8293 10.6717C61.3539 10.2856 60.7153 10.2091 60.1622 10.4724C59.6091 10.7356 59.2656 11.2796 59.2656 11.8921V25.0719C59.2656 25.0738 59.266 25.0756 59.266 25.0775V41.7088L48.9415 53.4838L45.6708 47.3773C44.1097 44.4607 41.2284 42.3994 37.9627 41.8631C36.616 41.6421 33.4727 41.1281 32.34 40.9418C31.9316 40.876 31.5601 40.6666 31.2922 40.3513C31.0243 40.0361 30.8777 39.6356 30.8788 39.2219V38.0101C31.6873 37.5012 32.4364 36.9034 33.1121 36.228C35.516 33.8226 36.8399 30.6257 36.8399 27.2262V26.7805H37.235C39.2637 26.7898 40.9893 25.0645 40.9893 23.0262C40.9893 21.9447 40.5143 20.9396 39.744 20.2412C40.3401 19.391 40.5091 18.2737 40.1699 17.2927C40.024 16.8727 39.7935 16.487 39.4926 16.1595C39.1918 15.8319 38.8271 15.5696 38.4209 15.3885C38.3133 15.3407 38.2046 15.2947 38.0963 15.248V7.8668C38.0963 3.52912 34.5672 0 30.2295 0H17.9945C13.6569 0 10.1277 3.52912 10.1277 7.8668V15.248C10.0197 15.2947 9.91146 15.3407 9.80386 15.3884C9.39763 15.5695 9.03284 15.8319 8.73199 16.1594C8.43114 16.487 8.20062 16.8727 8.05468 17.2929C7.7111 18.2865 7.87982 19.3866 8.47864 20.2424C7.70905 20.9403 7.23478 21.9447 7.23478 23.0262C7.23478 25.059 8.94048 26.7921 10.9904 26.7805H11.3856V27.2262C11.3856 31.7607 13.7683 35.7484 17.3466 38.0043V39.4311C17.347 39.8132 17.2192 40.1845 16.9835 40.4853C16.7479 40.7862 16.4181 40.9993 16.047 41.0905L7.53214 43.1905C5.52758 43.6816 3.74605 44.8317 2.47334 46.4564C1.20063 48.0811 0.51051 50.0862 0.513683 52.15V68.9746C0.513683 69.5409 0.972648 70 1.53907 70C2.1055 70 2.56446 69.5409 2.56446 68.9746V52.15C2.56199 50.5448 3.09874 48.9854 4.08859 47.7218C5.07845 46.4582 6.46404 45.5636 8.0231 45.1817L14.6187 43.5552C16.6578 46.8254 20.2252 48.8255 24.1123 48.8255C28.1455 48.8255 31.7863 46.7106 33.7884 43.2573L37.6308 43.8869C40.2709 44.3204 42.6006 45.987 43.8628 48.3453L47.1724 54.5241C47.3243 54.8082 47.5428 55.0512 47.8092 55.2323C48.0756 55.4133 48.382 55.5271 48.702 55.5639C49.0224 55.6007 49.3469 55.5592 49.6478 55.4431C49.9487 55.327 50.2169 55.1397 50.4296 54.8972L57.4521 46.888L61.9127 51.3502C61.9169 51.3543 61.9215 51.3578 61.9257 51.362L56.2076 57.9016C56.0324 58.1069 55.9452 58.3729 55.9648 58.6421C55.9845 58.9112 56.1095 59.1618 56.3126 59.3394C56.5158 59.517 56.7807 59.6074 57.0501 59.591C57.3195 59.5745 57.5715 59.4526 57.7515 59.2516L67.176 48.4732C69.1049 46.2852 68.7667 42.786 66.5081 40.9805C64.9908 39.7675 63.0039 39.5363 61.3166 40.2164V25.5596L68.7023 19.5587C68.9483 19.3596 69.1466 19.1079 69.2826 18.8221C69.4186 18.5364 69.4889 18.2238 69.4883 17.9073C69.4883 17.2638 69.2017 16.6619 68.7023 16.2561ZM38.9385 23.0262C38.9385 23.9504 38.1599 24.7343 37.235 24.7297H36.8399V21.618C37.2258 21.6455 37.6136 21.6042 37.9851 21.496C38.558 21.7786 38.9385 22.3722 38.9385 23.0262ZM11.3856 24.7297H10.9904C10.0602 24.7345 9.28556 23.9516 9.28556 23.0262C9.28556 22.3728 9.66509 21.7803 10.2364 21.4981C10.6092 21.6065 10.9982 21.6479 11.3854 21.6204L11.3856 24.7297ZM11.6394 19.4756C11.052 19.736 10.3715 19.4812 10.0658 18.9115C9.7437 18.3113 10.0139 17.5391 10.6359 17.2629C16.2692 14.7617 22.4875 13.878 28.5945 14.7108C29.1546 14.7864 29.6724 14.3942 29.7487 13.8331C29.7668 13.6996 29.7585 13.5639 29.7242 13.4337C29.6899 13.3035 29.6303 13.1813 29.5488 13.0741C29.4673 12.9669 29.3655 12.8768 29.2491 12.809C29.1328 12.7411 29.0042 12.6969 28.8708 12.6788C23.2463 11.9122 17.5198 12.5152 12.1784 14.4367V7.8668C12.1784 4.65979 14.7874 2.05078 17.9944 2.05078H30.2295C33.4365 2.05078 36.0455 4.65979 36.0455 7.8668V14.4363C35.262 14.1544 34.4687 13.9003 33.6672 13.6746C33.4059 13.6027 33.1269 13.6371 32.8909 13.7703C32.655 13.9035 32.4814 14.1247 32.408 14.3855C32.3346 14.6463 32.3674 14.9255 32.4993 15.1622C32.6311 15.3989 32.8513 15.5738 33.1117 15.6487C34.6406 16.0794 36.1367 16.6188 37.5887 17.2628C38.2055 17.5366 38.4773 18.3095 38.161 18.9072C37.8607 19.4744 37.1868 19.7421 36.585 19.4755C28.9331 16.087 19.3932 16.0379 11.6394 19.4756ZM13.4363 27.2262V20.946C20.278 18.2097 27.9479 18.2098 34.7892 20.9464V27.2262C34.7892 30.0781 33.6785 32.7603 31.6618 34.7782C29.6614 36.7799 26.9666 37.9065 24.1128 37.9065C18.2257 37.9066 13.4363 33.1153 13.4363 27.2262ZM24.1123 46.7748C21.1644 46.7748 18.4417 45.3651 16.7339 43.0244C18.4057 42.5052 19.565 40.833 19.3973 39.0511C20.8968 39.6514 22.4975 39.959 24.1127 39.9574C25.7546 39.9574 27.3476 39.6458 28.828 39.0555C28.723 40.822 29.9402 42.4175 31.6016 42.8751C29.9062 45.3094 27.1453 46.7748 24.1123 46.7748ZM65.2272 42.5817C66.6013 43.6801 66.8041 45.7964 65.632 47.1233L63.2783 49.8151L58.8073 45.3426L60.8902 42.9671C61.4239 42.356 62.173 41.9747 62.9812 41.9029C63.7894 41.831 64.5941 42.0743 65.2272 42.5817ZM67.4091 17.967L61.3166 22.9172L61.3162 12.8974L67.4089 17.8478C67.44 17.8671 67.4408 17.9471 67.4091 17.967ZM29.7581 26.4495C30.03 26.4495 30.2909 26.3414 30.4832 26.1491C30.6755 25.9568 30.7835 25.696 30.7835 25.4241V23.1649C30.7835 22.5987 30.3245 22.1396 29.7581 22.1396C29.1917 22.1396 28.7327 22.5987 28.7327 23.1649V25.4241C28.7327 25.696 28.8407 25.9568 29.033 26.1491C29.2253 26.3414 29.4861 26.4495 29.7581 26.4495ZM18.4665 22.1397C18.1945 22.1397 17.9337 22.2477 17.7414 22.44C17.5491 22.6323 17.4411 22.8931 17.4411 23.1651V25.4242C17.4411 25.9905 17.9001 26.4496 18.4665 26.4496C19.0329 26.4496 19.4919 25.9905 19.4919 25.4242V23.1651C19.4919 22.8931 19.3839 22.6323 19.1916 22.44C18.9993 22.2477 18.7384 22.1397 18.4665 22.1397ZM27.2695 31.5488C27.1387 31.3104 26.9185 31.1337 26.6575 31.0576C26.3964 30.9815 26.1158 31.0123 25.8773 31.143C25.3245 31.4449 24.7038 31.6008 24.0739 31.596C23.4699 31.5889 22.8769 31.4333 22.3473 31.143C22.1091 31.0157 21.8303 30.9874 21.5714 31.0643C21.3126 31.1412 21.0945 31.3172 20.9645 31.554C20.8346 31.7907 20.8033 32.0692 20.8775 32.3289C20.9516 32.5886 21.1252 32.8085 21.3606 32.941C21.9348 33.2562 22.8679 33.6343 24.0524 33.6468C25.2491 33.6592 26.2722 33.2656 26.8638 32.9412C27.1022 32.8103 27.2789 32.5901 27.355 32.329C27.4311 32.0679 27.4004 31.7873 27.2695 31.5488Z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <div class="text-start">
                            <h5 class="fw-bold">Visites guidées</h5>
                            <p class="text-muted">Profitez de nos visites guidées expertes dans les meilleures destinations.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="col-md-4 mb-4">
                    <div class="feature-card bg-2" data-aos="flip-left" data-aos-delay="500">
                        <div class="icon-wrapper bg-danger text-white rounded-circle p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" viewBox="0 0 70 70">
                                <g clip-path="url(#clip0_1335_400)">
                                    <path
                                        d="M67.276 47.5101C64.9528 45.2928 62.1063 49.3728 55.5442 51.8647C50.2253 53.8906 49.1313 53.9912 46.3561 54.4485C44.2405 54.7944 38.581 55.7242 35.9324 55.2744C38.5248 53.7263 40.8589 51.508 42.9053 49.2485C46.2761 45.5934 47.554 44.8193 47.7377 42.895C47.9248 41.0961 46.8307 39.4194 44.7961 38.9696C40.1832 37.8972 36.7983 42.7026 34.1432 44.6204C32.3508 45.9199 29.807 45.615 28.074 45.7696V45.7674C24.047 46.0096 21.5368 48.068 17.7444 48.8669C17.5984 48.2193 17.4546 47.5718 17.2795 46.9285C16.8298 45.2528 15.1833 44.0723 13.4287 44.1728C9.29249 44.3566 9.93249 44.7101 6.58332 44.8464C4.63197 44.9274 2.94549 44.9977 2.22333 45.8636C2.09343 46.0182 1.99823 46.1989 1.94414 46.3934C1.89005 46.5879 1.87835 46.7918 1.90982 46.9912C2.76928 53.1133 2.30441 57.4885 3.04387 61.949C3.07986 62.1602 3.198 62.3486 3.37249 62.473C3.54698 62.5974 3.76362 62.6477 3.97506 62.6128C4.18649 62.578 4.37553 62.4608 4.50085 62.287C4.62618 62.1132 4.67759 61.8968 4.64386 61.6852C3.99846 57.789 4.33035 52.629 3.52711 46.8593C4.2417 46.4118 7.66223 46.5426 9.11195 46.2626C10.3401 46.0247 11.8168 45.8669 13.5011 45.7923C14.4979 45.7674 15.4644 46.4193 15.7163 47.3512C17.4633 53.8106 17.6946 60.5079 16.3952 66.7706C13.5454 66.6138 10.7455 66.336 7.88169 66.2019C7.48277 66.1738 7.05466 66.5263 7.03304 66.9738C7.02306 67.1886 7.09877 67.3985 7.24351 67.5574C7.38826 67.7164 7.5902 67.8113 7.80493 67.8214L7.84818 67.8236L9.14979 69.056C10.2719 70.1198 11.2687 70.0008 17.766 69.9922C18.5281 69.9922 19.1357 69.469 19.1757 68.7511C19.2665 67.0917 19.3379 65.389 19.4362 63.7457C27.5378 67.8571 36.2567 69.4592 44.3096 68.3003C52.4772 67.1252 59.9312 63.1187 65.5452 56.8885C66.4274 55.9101 67.2793 54.8517 67.7431 53.5069C68.0371 52.655 68.2663 51.3404 67.9614 50.2863C68.2847 49.1209 67.9993 48.202 67.276 47.5101ZM26.0578 47.6982C29.2394 46.8982 31.7065 47.9707 34.8286 46.1026C37.2654 44.6647 38.9216 41.6777 42.1561 40.6431C42.2642 40.6431 44.7691 39.9231 45.7475 41.3404C45.7723 41.3761 45.8405 41.4572 45.8707 41.4896C46.6253 43.6366 45.8513 43.6626 41.7443 48.1166C41.6902 48.1653 41.6621 48.2031 41.6707 48.2031H41.6729C41.0491 48.6809 38.3075 52.2615 34.3346 54.349C34.2621 54.3879 34.2059 54.4442 34.1508 54.5004C33.4146 54.4409 32.9983 55.3036 33.4805 55.8441C35.1735 57.7458 41.1507 56.9469 46.6199 56.0474C47.9204 55.7296 48.9356 56.1144 56.1215 53.3815C61.1582 51.468 66.449 46.7501 66.4782 49.3988C66.4944 50.988 63.7398 53.3912 62.5961 54.5101C59.7442 57.2236 56.7204 59.2906 53.288 60.9976C41.9767 66.5349 31.0989 63.9836 18.8016 60.3349C18.928 57.0245 18.6814 53.7103 18.0665 50.455C20.8254 49.8755 23.7238 48.3469 26.0578 47.6982Z">
                                    </path>
                                    <path
                                        d="M12.4165 51.1956C14.4803 51.7026 15.4965 49.2173 14.0209 47.9935C13.9348 47.9206 13.8341 47.8668 13.7256 47.8359C13.6171 47.8049 13.5033 47.7975 13.3917 47.814C12.9679 47.6043 12.4857 47.5524 12.0652 47.6854C10.3993 48.2 10.4403 50.7124 12.4165 51.1956ZM29.7149 24.7179C30.0662 24.7179 30.4132 24.6336 30.7332 24.4887L33.9689 27.7341L33.9256 27.7384C33.7115 27.7559 33.513 27.8578 33.3739 28.0216C33.2348 28.1854 33.1665 28.3978 33.184 28.6119C33.2015 28.8261 33.3034 29.0246 33.4672 29.1637C33.631 29.3027 33.8434 29.371 34.0575 29.3535L36.091 29.186C36.3019 29.1688 36.4978 29.0699 36.6368 28.9103C36.7757 28.7508 36.8468 28.5432 36.8348 28.3319L36.7202 26.3471C36.7066 26.1328 36.6091 25.9326 36.4488 25.7897C36.2885 25.6468 36.0784 25.5729 35.864 25.5838C35.6493 25.5964 35.4484 25.6936 35.3053 25.8541C35.1622 26.0146 35.0887 26.2254 35.1008 26.44L35.1094 26.5806L31.8878 23.3514C32.0567 23.0059 32.143 22.6259 32.14 22.2413C32.137 21.8567 32.0447 21.4781 31.8705 21.1352L35.8208 17.052L35.8229 17.1395C35.828 17.3512 35.9157 17.5525 36.0672 17.7003C36.2187 17.8482 36.422 17.931 36.6337 17.9309H36.6543C36.7608 17.9282 36.8657 17.9046 36.963 17.8614C37.0604 17.8182 37.1483 17.7562 37.2217 17.679C37.2951 17.6018 37.3525 17.5109 37.3908 17.4114C37.429 17.312 37.4473 17.206 37.4445 17.0995L37.3927 15.0596C37.3873 14.8481 37.2995 14.6471 37.148 14.4995C36.9966 14.3518 36.7934 14.2692 36.5819 14.2693H34.5938C34.3787 14.2693 34.1725 14.3547 34.0204 14.5068C33.8684 14.6588 33.7829 14.8651 33.7829 15.0801C33.7829 15.2951 33.8684 15.5014 34.0204 15.6534C34.1725 15.8055 34.3787 15.8909 34.5938 15.8909H34.6878L30.7008 20.013C30.2017 19.8034 29.6454 19.7736 29.1267 19.9287C28.6121 20.0739 28.158 20.3812 27.832 20.805C27.5059 21.2288 27.3253 21.7465 27.317 22.2811C27.2976 23.5222 28.3257 24.7179 29.7149 24.7179Z">
                                    </path>
                                    <path
                                        d="M33.7466 5.703C32.2005 5.44255 30.6267 5.38947 29.0666 5.54516C24.8309 5.70516 21.0558 7.4511 17.8461 10.7408C16.411 12.2099 15.2614 13.9328 14.4558 15.8219C13.75 17.4938 13.3252 19.2709 13.1985 21.0813C12.9012 25.1862 14.1066 29.0726 16.6861 32.318C17.2143 32.9734 17.7922 33.5871 18.4147 34.1537C19.5974 35.9256 21.3899 37.3656 23.3412 38.292C33.0839 42.9169 45.0233 36.9158 47.086 25.7516C48.02 20.6975 46.6189 15.2867 43.4352 11.2327C40.9746 8.0965 37.6979 6.35921 33.7466 5.703ZM14.8115 23.0835H17.1099C17.3249 23.0835 17.5311 22.998 17.6832 22.846C17.8353 22.6939 17.9207 22.4877 17.9207 22.2727C17.9207 22.0576 17.8353 21.8514 17.6832 21.6993C17.5311 21.5473 17.3249 21.4618 17.1099 21.4618H14.8083C14.8137 21.3732 14.8083 21.2856 14.8158 21.1959C14.9315 19.5581 15.3131 17.9624 15.9477 16.4554C16.6092 14.9177 17.5247 13.5023 18.6558 12.2684L19.7001 13.3116C19.7744 13.3913 19.8639 13.4552 19.9633 13.4995C20.0628 13.5438 20.1702 13.5676 20.279 13.5695C20.3879 13.5715 20.496 13.5514 20.597 13.5107C20.6979 13.4699 20.7897 13.4092 20.8667 13.3322C20.9436 13.2552 21.0043 13.1635 21.0451 13.0625C21.0859 12.9616 21.1059 12.8534 21.104 12.7446C21.1021 12.6357 21.0783 12.5283 21.0339 12.4289C20.9896 12.3294 20.9257 12.2399 20.8461 12.1657L19.8028 11.1214C22.4807 8.68136 25.5444 7.35488 28.9325 7.18191V9.11703C28.9325 9.33207 29.018 9.53831 29.17 9.69036C29.3221 9.84242 29.5283 9.92784 29.7433 9.92784C29.9584 9.92784 30.1646 9.84242 30.3167 9.69036C30.4687 9.53831 30.5541 9.33207 30.5541 9.11703V7.22083C31.0482 7.26948 31.5174 7.33002 31.9563 7.42083C34.8374 7.97434 37.5433 9.38082 39.6795 11.3495L39.1465 11.8813C39.0691 11.9562 39.0074 12.0457 38.965 12.1446C38.9225 12.2436 38.9002 12.35 38.8993 12.4576C38.8984 12.5653 38.919 12.672 38.9598 12.7717C39.0006 12.8713 39.0609 12.9618 39.137 13.0379C39.2132 13.114 39.3038 13.1741 39.4034 13.2149C39.5031 13.2556 39.6099 13.276 39.7175 13.2751C39.8252 13.2741 39.9316 13.2517 40.0305 13.2091C40.1294 13.1666 40.2188 13.1048 40.2936 13.0273L40.8092 12.5127C41.5958 13.3997 42.2704 14.38 42.8179 15.4316C43.7811 17.2802 44.313 19.3559 44.4341 21.4618H42.9044C42.6893 21.4618 42.4831 21.5473 42.331 21.6993C42.179 21.8514 42.0936 22.0576 42.0936 22.2727C42.0936 22.4877 42.179 22.6939 42.331 22.846C42.4831 22.998 42.6893 23.0835 42.9044 23.0835H44.4525C44.3368 25.7397 43.5638 28.3634 42.1498 30.5645C41.6806 31.2867 41.1249 31.9645 40.5206 32.6045L39.7292 31.8132C39.655 31.7335 39.5655 31.6696 39.466 31.6253C39.3666 31.581 39.2592 31.5571 39.1503 31.5552C39.0415 31.5533 38.9333 31.5733 38.8324 31.6141C38.7314 31.6549 38.6397 31.7156 38.5627 31.7926C38.4857 31.8696 38.425 31.9613 38.3842 32.0622C38.3435 32.1632 38.3234 32.2713 38.3254 32.3802C38.3273 32.4891 38.3511 32.5964 38.3954 32.6959C38.4397 32.7954 38.5036 32.8849 38.5833 32.9591L39.3465 33.7234C36.6828 36.0023 33.6763 37.1007 30.5541 37.2088V35.9072C30.5541 34.8337 28.9325 34.8337 28.9325 35.9072V37.1796C25.4342 36.9072 22.1974 35.3634 19.7434 33.1818L22.165 31.4251C22.3392 31.2988 22.456 31.1084 22.4899 30.896C22.5238 30.6835 22.4718 30.4663 22.3455 30.2921C22.2192 30.1179 22.0289 30.001 21.8164 29.9672C21.604 29.9333 21.3867 29.9852 21.2126 30.1115L18.6526 31.9678C18.6277 31.9861 18.6136 32.0142 18.5909 32.0348C18.3747 31.7969 18.1553 31.5602 17.9564 31.3105C16.0342 28.891 14.9737 26.0759 14.8115 23.0835Z">
                                    </path>
                                    <path
                                        d="M10.0051 16.051C10.2091 16.1187 10.4317 16.1027 10.6239 16.0064C10.816 15.9101 10.9621 15.7414 11.03 15.5375C13.5867 7.85317 21.3143 2.00887 29.405 1.64238C37.2688 1.29644 45.2936 6.14831 48.6969 13.2683L48.0547 13.6704C47.2266 14.1894 47.3304 15.4142 48.2223 15.7958C49.1444 16.1893 50.4677 17.0164 51.0785 17.3439C51.1792 17.3976 51.2902 17.4294 51.4041 17.4372C51.518 17.4451 51.6323 17.4287 51.7394 17.3893C51.8466 17.3499 51.9442 17.2884 52.0259 17.2086C52.1076 17.1289 52.1716 17.0328 52.2136 16.9266C52.6579 15.8023 52.5055 14.3504 52.6352 13.0942C52.739 12.0942 51.6536 11.4175 50.805 11.9483L50.0796 12.4023C46.325 4.6921 37.9574 -0.394368 29.3305 0.0240085C20.4548 0.425088 12.2959 6.59371 9.49054 15.0261C9.42279 15.2301 9.43883 15.4527 9.53512 15.6448C9.63142 15.837 9.80008 15.9831 10.004 16.051H10.0051ZM49.2374 20.3472C49.0071 20.8542 48.9996 21.4131 49.2158 21.8823C49.6633 22.8542 51.1401 22.1796 50.6882 21.2034C50.6741 21.1709 50.6752 21.0996 50.7141 21.0153C50.9498 20.4899 51.952 20.8185 52.0363 22.5363C52.1304 24.4639 51.1347 26.4034 49.5606 27.3666C49.3876 27.4713 49.26 27.637 49.2028 27.831C49.1456 28.025 49.163 28.2334 49.2515 28.4152C49.3401 28.5971 49.4934 28.7393 49.6814 28.8139C49.8694 28.8885 50.0785 28.8901 50.2677 28.8185C51.6542 28.3013 53.1446 28.1245 54.6136 28.3028C54.8262 28.3262 55.0396 28.2658 55.2083 28.1344C55.3771 28.003 55.488 27.8109 55.5174 27.599C55.544 27.3857 55.4848 27.1706 55.3528 27.0009C55.2208 26.8312 55.0269 26.7209 54.8136 26.6942C54.0495 26.5994 53.2775 26.5874 52.5109 26.6585C53.3001 25.4271 53.7282 23.9374 53.6568 22.4574C53.4774 18.8142 50.1498 18.3212 49.2374 20.3472ZM56.8957 25.0985C57.6438 24.7807 58.5909 24.4315 59.5768 24.2834C59.5076 25.1947 59.4038 26.1039 59.2471 27.0034C59.0601 28.0606 60.659 28.3396 60.8438 27.2844C61.2438 24.9947 61.3768 22.6553 61.2363 20.331C61.2151 20.1223 61.114 19.9298 60.9542 19.794C60.7943 19.6582 60.5881 19.5895 60.3787 19.6024C60.1694 19.6153 59.9731 19.7087 59.8311 19.863C59.689 20.0174 59.6122 20.2207 59.6168 20.4304C59.6611 21.1645 59.6665 21.8996 59.6536 22.6336C58.8566 22.7283 58.0734 22.9151 57.3195 23.1904L57.0903 19.4737C57.0211 18.3818 55.406 18.5158 55.4709 19.5731L55.7682 24.4023C55.7766 24.5317 55.8158 24.6573 55.8827 24.7684C55.9495 24.8796 56.042 24.9732 56.1523 25.0413C56.2627 25.1095 56.3878 25.1502 56.5171 25.1602C56.6464 25.1701 56.7762 25.149 56.8957 25.0985Z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <div class="text-start">
                            <h5 class="fw-bold">Meilleur support 24/7</h5>
                            <p class="text-muted">Nous offrons une assistance client 24/7 pour vous aider à tout moment.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="col-md-4 mb-4">
                    <div class="feature-card bg-3" data-aos="flip-left" data-aos-delay="600">
                        <div class="icon-wrapper bg-secondary text-white rounded-circle p-3">
                            <i class="fas fa-exchange-alt fs-3"></i>
                        </div>
                        <div class="text-start">
                            <h5 class="fw-bold">Flexibilité ultime</h5>
                            <p class="text-muted">Modifiez ou annulez vos réservations en toute simplicité, pour un contrôle
                                total.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="question" class="faq-section py-5">
        <div class="container">
            <h2 class="section-title text-center mb-4"
                style="font-family: 'Amatic SC', cursive; color: var(--primary-color);">
                Questions Fréquemment Posées
            </h2>

            <div class="accordion" id="faqAccordion" data-aos="fade-up">
                <!-- Question 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="questionOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#answerOne"
                            aria-expanded="true" aria-controls="answerOne">
                            1. Quels types de services proposez-vous ?
                        </button>
                    </h2>
                    <div id="answerOne" class="accordion-collapse collapse show" aria-labelledby="questionOne"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Nous proposons des services de transport privé, transferts aéroport, excursions et
                            circuits touristiques à Marrakech et au Maroc.
                        </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="questionTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#answerTwo" aria-expanded="false" aria-controls="answerTwo">
                            2. Comment puis-je réserver une excursion ou un transport ?
                        </button>
                    </h2>
                    <div id="answerTwo" class="accordion-collapse collapse" aria-labelledby="questionTwo"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Vous pouvez réserver via notre site web, par WhatsApp (<a href="https://wa.me/212770134539"
                                target="_blank" class="contact-link">+212 770134539</a>) ou par email (<a
                                href="mailto:Premiumkechtours@gmail.com"
                                class="contact-link">Premiumkechtours@gmail.com</a>).
                        </div>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="questionThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#answerThree" aria-expanded="false" aria-controls="answerThree">
                            3. Acceptez-vous les paiements en ligne ?
                        </button>
                    </h2>
                    <div id="answerThree" class="accordion-collapse collapse" aria-labelledby="questionThree"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Nous acceptons les paiements en espèces à la prise en charge. Pour certaines réservations, un
                            paiement anticipé peut être demandé via virement bancaire ou Paypal.
                        </div>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="questionFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#answerFour" aria-expanded="false" aria-controls="answerFour">
                            4. Puis-je annuler ma réservation ?
                        </button>
                    </h2>
                    <div id="answerFour" class="accordion-collapse collapse" aria-labelledby="questionFour"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Oui, vous pouvez annuler gratuitement jusqu'à 48 heures avant l'heure de départ. Pour les
                            annulations tardives, des frais peuvent s'appliquer.
                        </div>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="questionFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#answerFive" aria-expanded="false" aria-controls="answerFive">
                            5. Vos chauffeurs parlent-ils anglais ou d'autres langues ?
                        </button>
                    </h2>
                    <div id="answerFive" class="accordion-collapse collapse" aria-labelledby="questionFive"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Oui, nos chauffeurs parlent français, anglais et arabe. Certains chauffeurs peuvent
                            également parler d'autres langues sur demande.
                        </div>
                    </div>
                </div>

                <!-- Question 6 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="questionSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#answerSix" aria-expanded="false" aria-controls="answerSix">
                            6. Êtes-vous disponibles 24h/24 et 7j/7 ?
                        </button>
                    </h2>
                    <div id="answerSix" class="accordion-collapse collapse" aria-labelledby="questionSix"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Oui, nous sommes disponibles 24h/24 et 7j/7 sur WhatsApp pour répondre à vos questions et
                            prendre vos réservations.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="{{ asset("assets/js/home.js") }}"></script>
    <script src="{{ asset("assets/js/animation.js") }}"></script>
    <script src="{{ asset("assets/js/gallery.js") }}"></script>
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


@endsection