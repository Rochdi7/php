@extends('layout.base')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/search_results.css') }}">

<!-- Hero Section -->
<div class="hero-section" data-aos="fade-up">
    <img loading="lazy"src="{{ asset('assets/images/banners/search.jpg') }}" class="hero-image" alt="Search Results">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 style="color: white;">
            {{ request('query') ?? 'Search' }}
        </h1>
        <div class="breadcrumb text-center">
            <a href="{{ url('/') }}" class="text-light">Home</a> » 
            <span style="color: var(--accent-color);">
                Resultat Pour "{{ request('query') ?? 'your search' }}"
            </span>
        </div>
    </div>

    <!-- Decoration Images -->
    <img loading="lazy"style="opacity: 0.8; position: absolute; top: 20%; left: 0; z-index: -1;" 
         src="{{ asset('assets/images/banners/section-vector1.png') }}" 
         class="deco-left" alt="Left Decoration">
    <img loading="lazy"style="opacity: 0.8; position: absolute; top: 20%; right: 0; z-index: -1;" 
         src="{{ asset('assets/images/banners/section-vector2.png') }}" 
         class="deco-right" alt="Right Decoration">
</div>


<div class="container py-5" data-aos="fade-up">
    <h2 class="text-center" style="font-family: 'Amatic SC', cursive;">Résultats de recherche pour : "{{ $query }}"</h2>

    @if(isset($noResults))
        <p class="text-center text-danger">Aucun résultat trouvé.</p>
    @else
        <div class="row">
            <!-- Excursions -->
            @if (!empty($excursions))
                <h3 class="mt-4 search-title">Excursions</h3>
                @foreach ($excursions as $excursion)
                    <div class="col-md-4 mb-4" data-aos="zoom-in-up">
                        <div class="excursion-card">
                            <img loading="lazy"src="{{ asset('assets/images/excursions/' . $excursion['image']) }}" class="img-fluid" alt="{{ $excursion['name'] }}">
                            <h5>{{ $excursion['name'] }}</h5>
                            <p>{{ $excursion['description'] }}</p>
                            <a href="{{ url('/excursions/' . Str::slug($excursion['name'])) }}" class="custom-btn">Voir Détails</a>
                        </div>
                    </div>
                @endforeach
            @endif

            <!-- Circuits -->
            @if (!empty($circuits))
                <h3 class="mt-4">Circuits</h3>
                @foreach ($circuits as $circuit)
                    <div class="col-md-4 mb-4" data-aos="zoom-in-up">
                        <div class="excursion-card">
                            <img loading="lazy"src="{{ asset('assets/images/excursions/' . $circuit['image']) }}" class="img-fluid" alt="{{ $circuit['name'] }}">
                            <h5>{{ $circuit['name'] }}</h5>
                            <p>{{ $circuit['description'] }}</p>
                            <a href="{{ url('/circuits/' . Str::slug($circuit['name'])) }}" class="custom-btn">Voir Détails</a>
                        </div>
                    </div>
                @endforeach
            @endif

            <!-- Transport -->
            @if (!empty($transport))
                <h3 class="mt-4">Transport</h3>
                @foreach ($transport as $item)
                    <div class="col-md-4 mb-4" data-aos="zoom-in-up">
                        <div class="excursion-card">
                            <img loading="lazy"src="{{ asset('assets/images/transport/' . $item['image']) }}" class="img-fluid" alt="{{ $item['departure'] }} - {{ $item['destination'] }}">
                            <h5>{{ $item['departure'] }} → {{ $item['destination'] }}</h5>
                            <p>{{ $item['description'] }}</p>
                            <a href="{{ url('/transport') }}" class="custom-btn">Réserver</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    @endif
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endsection
