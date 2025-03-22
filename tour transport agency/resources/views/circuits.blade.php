@extends('layout.base')
@section('title', $meta_title)
@section('meta_description', $meta_description)
@section('meta_image', $meta_image)
@section('meta_url', $meta_url)
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('assets/css/circuit.css') }}">

    <!-- Hero Section -->
    <div class="hero-section" data-aos="fade-up">
        <img loading="lazy"src="{{ asset('assets/images/activities/marrakech.jpg') }}" class="hero-image" alt="Circuits">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 style="color: white;">Circuits</h1>
            <div class="breadcrumb text-center">
                <a href="{{ url('/') }}" class="text-light">Home</a> »
                <span style="color: var(--accent-color);">Circuits</span>
            </div>
        </div>
    </div>

    <!-- Circuits Grid Section -->
    <section class="circuit-section py-5">
        <div class="container">
            <h2 class="section-title text-center mb-4"
                style="font-family: 'Amatic SC', cursive; color: var(--primary-color);">
                Nos Circuits
            </h2>

            <div class="row">
            @foreach ($circuits as $circuit)
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ route('circuits.show', ['slug' => Str::slug($circuit['name'])]) }}" class="excursion-card-link">
                            <div class="excursion-card">
                                <div class="excursion-image">
                                <img loading="lazy"src="{{ asset('assets/images/excursions/' . $circuit['image']) }}"
                                class="img-fluid" alt="{{ $circuit['name'] }}">
                                    
                                    <!-- Gallery Icon -->
                                    <div class="gallery-icon" onclick="event.preventDefault(); openGallery({{ json_encode($circuit['gallery']) }})">
                                        <i class="fas fa-images"></i>
                                    </div>
                                </div>

                                <!-- Circuit Info -->
                                <div class="excursion-info p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="excursion-title">{{ $circuit['name'] }}</h5>
                                        <p class="excursion-transport"><i class="fas fa-bus"></i> {{ $circuit['transport'] }}</p>
                                    </div>
                                    <p class="excursion-description">{{ Str::limit($circuit['description'], 100, '...') }}</p>
                                    <a href="{{ route('circuits.show', ['slug' => Str::slug($circuit['name'])]) }}" class="custom-btn">
                                        Réserver
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
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

                        <!-- Previous & Next Controls -->
                        <button class="carousel-control-prev custom-carousel-btn" type="button"
                            data-bs-target="#galleryCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next custom-carousel-btn" type="button"
                            data-bs-target="#galleryCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>

                    <!-- Close Button -->
                    <button type="button" class="btn-close gallery-close-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

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
