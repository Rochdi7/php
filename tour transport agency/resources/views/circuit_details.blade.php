@extends('layout.base')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('assets/css/circuit.css') }}">

    <!-- Hero Section -->
    <div class="hero-section" data-aos="fade-up">
        <img loading="lazy"src="{{ asset('assets/images/excursions/' . $circuit['image']) }}" class="hero-image"
            alt="{{ $circuit['name'] }}">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 style="color: white;">{{ $circuit['name'] }}</h1>
            <p class="duration-tag text-light">{{ $circuit['duration'] }}</p> <!-- Displays duration -->
            <div class="breadcrumb text-center">
                <a href="{{ url('/') }}" class="text-light">Accueil</a> »
                <a href="{{ url('/circuits') }}" class="text-light">Circuits</a> »
                <span style="color: var(--accent-color);">{{ $circuit['name'] }}</span>
            </div>
        </div>
    </div>

    <!-- Gallery Slider -->
    <section class="container py-5">
        <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($circuit['gallery'] as $index => $image)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img loading="lazy"src="{{ asset('assets/images/excursions/' . $image) }}" class="d-block w-100" alt="Gallery Image">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <!-- Duration Badge (Centered Below Slider) -->
        <div class="duration-badge text-center">
            {{ $circuit['duration'] }}
        </div>
    </section>

    <!-- Tab Navigation -->
    <div class="tab-container d-flex gap-4 my-3 justify-content-center" id="tabContainer" data-aos="flip-up"
        data-aos-delay="200">
        <button class="btn btn-link active-tab d-flex align-items-center p-3" id="descriptionTab">
            <span>Description</span>
        </button>
        <button class="btn btn-link d-flex align-items-center p-3" id="programmeTab">
            <span>Programme</span>
        </button>
        <button class="btn btn-link d-flex align-items-center p-3" id="inclusTab">
            <span>Inclus</span>
        </button>
    </div>

    <!-- Tab Content -->
    <div class="container">
        <p class="about-text" id="descriptionText" data-aos="fade-up">
            {{ $circuit['description'] }}
        </p>

        <!-- Programme Section (Collapse) -->
        <div id="programmeText" class="d-none" data-aos="fade-up">
            <div class="accordion" id="programmeAccordion">
                @foreach ($circuit['programme'] as $day => $info)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $loop->index }}">
                            <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}"
                                aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $loop->index }}">
                                <span class="day-indicator {{ $loop->first ? 'bg-accent' : 'bg-dark' }}">{{ $day }}</span>
                                <span class="day-title">{{ $info['title'] }}</span>
                            </button>
                        </h2>
                        <div id="collapse{{ $loop->index }}"
                            class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                            aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#programmeAccordion">
                            <div class="accordion-body">
                                {{ $info['details'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Inclus Section -->
        <ul id="inclusText" class="list-group d-none" data-aos="fade-up">
            @foreach ($circuit['inclus'] as $item)
                <li class="list-group-item"><i class="fas fa-check-circle" style="color: var(--accent-color);"></i> {{ $item }}
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Réserver Button -->
    <div class="text-center my-4">
        <a href="https://wa.me/212770134539?text={{ urlencode('Bonjour, je souhaite réserver le circuit : ' . $circuit['name']) }}"
            target="_blank" class="btn-whatsapp-circuit">
            <span class="text">Réserver sur WhatsApp</span>
            <i class="fa-brands fa-whatsapp icon"></i>
        </a>

    </div>

    <!-- Related Circuits Section -->
    @if (!empty($relatedCircuits))
        <section class="related-section py-5 bg-light">
            <div class="container">
                <h2 class="section-title text-center mb-4"
                    style="font-family: 'Amatic SC', cursive; color: var(--primary-color);">
                    Circuits Similaires
                </h2>
                <div class="row">
                    @foreach ($relatedCircuits as $related)
                        <div class="col-md-4 col-12 mb-4" data-aos="fade-up" data-aos-delay="200">
                            <a href="{{ route('circuits.show', ['slug' => Str::slug($related['name'])]) }}"
                                class="excursion-card-link">
                                <div class="excursion-card">
                                    <div class="excursion-image">
                                        <img loading="lazy"src="{{ asset('assets/images/' . $circuit['image']) }}" class="hero-image"
                                            alt="{{ $circuit['name'] }}">
                                        alt="{{ $related['name'] }}">
                                        <!-- Gallery Icon -->
                                        <div class="gallery-icon">
                                            <i class="fas fa-images"></i>
                                        </div>
                                    </div>
                                    <div class="excursion-info p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="excursion-title">{{ $related['name'] }}</h5>
                                            <p class="excursion-transport"><i class="fas fa-bus"></i> {{ $related['transport'] }}
                                            </p>
                                        </div>
                                        <p class="excursion-description">{{ Str::limit($related['description'], 100) }}</p>
                                        <a href="{{ route('circuits.show', ['slug' => Str::slug($related['name'])]) }}"
                                            class="reserve-btn">
                                            Voir Détails
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tabs = document.querySelectorAll(".btn-link");
            const contents = {
                descriptionTab: document.getElementById("descriptionText"),
                programmeTab: document.getElementById("programmeText"),
                inclusTab: document.getElementById("inclusText")
            };

            tabs.forEach(tab => {
                tab.addEventListener("click", function () {
                    tabs.forEach(t => t.classList.remove("active-tab"));
                    tab.classList.add("active-tab");

                    Object.keys(contents).forEach(key => {
                        contents[key].classList.add("d-none");
                    });

                    contents[tab.id].classList.remove("d-none");
                });
            });
        });
    </script>

    <script src="{{ asset('assets/js/gallery.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>
@endsection