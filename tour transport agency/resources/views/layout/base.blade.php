<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="8zJy15ijz9kYDSmDu--uVNOqCi-PM_X6_l_riIP6AwE" />

   <!-- Standard Favicon -->
<link rel="icon" type="image/x-icon" href="/favicon.ico">

<!-- PNG Favicons -->
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">

    <!-- Fixed Square SVG Favicon (Ensure it's 512x512 or 192x192) -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    <!-- PNG Favicons -->
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/android-chrome-512x512.png">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">

    <!-- Web App Manifest -->
    <link rel="manifest" href="/site.webmanifest">
    <meta name="apple-mobile-web-app-title" content="premiumkechtours">

    <!-- Dynamic Meta Tags -->
    <title>@yield('title', 'Tour Transport - Excursions & Circuits au Maroc')</title>
    <meta name="description" content="@yield('meta_description', 'Découvrez les meilleures excursions et circuits au Maroc.')">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'Tour Transport - Excursions & Circuits au Maroc')">
    <meta property="og:description" content="@yield('meta_description', 'Découvrez les meilleures excursions et circuits au Maroc.')">
    <meta property="og:image" content="@yield('meta_image', asset('images/default-meta.jpg'))">
    <meta property="og:url" content="@yield('meta_url', url()->current())">
    <meta property="og:type" content="website">

    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('meta_url', url()->current())">

    <!-- Preconnect for Faster Loading -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    
    <!-- Fonts & Icons -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- Lazy Load JavaScript -->
    <script src="{{ asset('assets/js/lazy.js') }}" defer></script>

    <!-- Defer Non-Essential Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="{{ asset('assets/js/navbar.js') }}"></script>
</head>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        let lazyVideo = document.querySelector(".lazy-video");

        if (lazyVideo) {
            let videoSource = lazyVideo.querySelector("source");
            if (videoSource) {
                lazyVideo.load(); // Load video only after page is ready
            }
        }
    });
</script>

<body>
    <!-- Top Navbar -->
    <div class="top-navbar">
        <!-- Contact Details -->
        <div class="contact-info">
            <a href="tel:+212770134539" class="text-white">
                <i class="fas fa-phone-alt"></i> +212 770134539
            </a>
            <a href="mailto:Premiumkechtours@gmail.com" class="text-white"
                style="font-size: 11px !important; font-weight: bold !important;">
                <i class="fas fa-envelope"></i> Premiumkechtours@gmail.com
            </a>
        </div>

        <!-- TripAdvisor Rating (Centered) -->
        <div class="tripadvisor-section d-none d-md-flex">

            <a style="filter: invert(1);" href="https://www.tripadvisor.fr/Profile/607mohamedaminet" target="_blank"
                class="social-icon">
                <img loading="lazy"loading="lazy"src="{{ asset('assets/images/logo/tripadvisor.png') }}" alt="TripAdvisor" class="tripadvisor-logo">
            </a>

        </div>

        <!-- Language Selector -->
        <div class="language-selector" translate="no">
            <a href="#" class="text-white translate-trigger notranslate" data-lang="en">
                <img loading="lazy"loading="lazy"src="{{ asset('assets/images/icons/en_US.webp') }}" width="20" alt="English"> <span>EN</span>
            </a> |
            <a href="#" class="text-white translate-trigger notranslate" data-lang="fr">
                <img loading="lazy"loading="lazy"src="{{ asset('assets/images/icons/fr_FR.webp') }}" width="20" alt="Français"> <span>FR</span>
            </a>
        </div>

        <!-- Google Translate Script -->
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'fr', // Default language set to French
                    autoDisplay: false
                }, 'google_translate_element');
            }

            function setLanguage(lang) {
                var selectField = document.querySelector(".goog-te-combo");
                if (selectField) {
                    selectField.value = lang;
                    selectField.dispatchEvent(new Event('change'));
                }

                // Save language selection in session
                fetch("{{ route('set.language') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ language: lang })
                });
            }

            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll(".translate-trigger").forEach(function (element) {
                    element.addEventListener("click", function (e) {
                        e.preventDefault();
                        setLanguage(this.getAttribute("data-lang"));
                    });
                });
            });

            // Function to hide Google Translate bar and iframe
            function hideGoogleTranslateBar() {
                let observer = new MutationObserver(function () {
                    // Hide the translate bar
                    let translateBar = document.querySelector('.goog-te-banner-frame');
                    if (translateBar) {
                        translateBar.style.display = 'none';
                    }

                    // Hide iframes injected by Google Translate
                    let iframes = document.querySelectorAll('iframe[id^=":"][class*="VIpgJd"]');
                    iframes.forEach(function (iframe) {
                        iframe.style.display = 'none';
                    });

                    document.body.style.top = '0px'; // Prevent layout shift
                });

                // Observe changes in the body to catch iframe injections by Google Translate
                observer.observe(document.body, { childList: true, subtree: true });
            }

            // Run the function when the page is loaded and when DOM changes occur
            document.addEventListener("DOMContentLoaded", function () {
                hideGoogleTranslateBar();
            });
        </script>

        <!-- Hidden Google Translate Widget -->
        <div id="google_translate_element" style="display: none;"></div>
        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


    </div>

    <!-- Main Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light"
        style="background-color: #1b1b1b; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img loading="lazy"loading="lazy"src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" height="90px" width="auto">
            </a>

            <!-- Search Box (Mobile - Centered) -->
         <!--   <form action="{{ route('search') }}" method="GET" class="search-container d-lg-none mx-auto">
                <i class="fas fa-search search-icon"></i>
                <input class="form-control search-input" type="search" name="query" placeholder="Rechercher..."
                    aria-label="Search">
            </form> 

            <!-- Navbar Toggler (Mobile - Aligned Right) -->
            <button class="navbar-toggler menu-toggle ms-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items (Hidden on Mobile) -->
            <div class="collapse navbar-collapse justify-content-center d-none d-lg-flex" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"> Accueil</a>
                    </li>

                    <!-- Excursions Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="excursionsDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Excursions
                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/excursions/ourika') }}">Vallée de l’Ourika</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/excursions/ouarzazate') }}">Ouarzazate</a></li>
                            <li><a class="dropdown-item" href="{{ url('/excursions/essaouira') }}">Essaouira</a></li>
                            <li><a class="dropdown-item" href="{{ url('/excursions/ouzoud') }}">Ouzoud</a></li>
                            <li><a class="dropdown-item" href="{{ url('/excursions/agafay') }}">Agafay</a></li>
                            <li><a class="dropdown-item" href="{{ url('/excursions/imlil') }}">Imlil et Haut Atlas</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Transport Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="transportDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Transport
                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"
                                    href="{{ url('/transport') }}?departure=Marrakech&destination=Casablanca Aéroport">Transfert
                                    Marrakech - Casablanca aéroport</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ url('/transport') }}?departure=Marrakech&destination=Casablanca Centre">Transfert
                                    Marrakech - Casablanca centre</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ url('/transport') }}?departure=Marrakech&destination=Agadir">Transfert
                                    Marrakech - Agadir</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ url('/transport') }}?departure=Marrakech&destination=Essaouira">Transfert
                                    Marrakech - Essaouira</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ url('/transport') }}?departure=Marrakech&destination=Rabat">Transfert
                                    Marrakech - Rabat</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ url('/transport') }}?departure=Aéroport&destination=Hôtel en ville">Transfert
                                    aéroport - hôtel en ville</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ url('/transport') }}?departure=Aéroport&destination=Hôtel Palmeraie">Transfert
                                    aéroport - hôtel Palmeraie</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ url('/transport') }}?departure=Visite de ville&destination=La journée">Visite
                                    de ville la journée</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ url('/transport') }}?departure=Mise à disposition">Mise à disposition</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ url('/transport') }}?departure=Soirée restaurant">Soirée restaurant</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Circuits Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="circuitsDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Circuits
                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/circuits/marrakech-zagora') }}">Marrakech -
                                    Zagora</a></li>
                            <li><a class="dropdown-item" href="{{ url('/circuits/marrakech-merzouga') }}">Marrakech -
                                    Merzouga</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Search Box (Desktop - Aligned Right) -->
            <form action="{{ route('search') }}" method="GET" class="search-container d-none d-lg-flex">
                <i class="fas fa-search search-icon"></i>
                <input class="form-control search-input" type="search" name="query" placeholder="Rechercher..."
                    aria-label="Search">
            </form>
        </div>
    </nav>


    <!-- Sidebar Navigation (Mobile Only) -->
    <div class="sidebar d-lg-none">
    <div class="sidebar-header d-flex align-items-center justify-content-between px-3 pt-1 position-relative">
    <!-- Search Box (Mobile - Left) -->
    <form action="{{ route('search') }}" method="GET" class="d-flex flex-grow-1 position-relative">
        <i class="fas fa-search text-primary position-absolute top-50 start-0 translate-middle-y ms-3"></i>
        <input class="form-control search-input ps-5" type="search" name="query" placeholder="Rechercher..."
            aria-label="Search" style="max-width: 150px; border-radius: 20px;">
    </form>

    <!-- Close Button (Right) - Positioned Absolutely -->
    <button class="btn close-sidebar position-absolute top-0 end-0 mt-2 me-2">
        <i class="fas fa-times fa-lg text-white"></i>
    </button>
</div>


        <ul class="sidebar-menu">
            <!-- Accueil (Home) -->
            <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Accueil</a></li>

            <!-- Excursions (Collapsible) -->
            <li class="dropdown">
                <a class="dropdown-toggle d-flex justify-content-between align-items-center" href="#"
                    data-target="#excursionsMenu">
                    <i class="fas fa-umbrella-beach"></i> Excursions
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <ul class="collapse" id="excursionsMenu">
                    <li><a href="{{ url('/excursions/ourika') }}">Vallée de l’Ourika</a></li>
                    <li><a href="{{ url('/excursions/ouarzazate') }}">Ouarzazate</a></li>
                    <li><a href="{{ url('/excursions/essaouira') }}">Essaouira</a></li>
                    <li><a href="{{ url('/excursions/ouzoud') }}">Ouzoud</a></li>
                    <li><a href="{{ url('/excursions/agafay') }}">Agafay</a></li>
                    <li><a href="{{ url('/excursions/imlil') }}">Imlil et Haut Atlas</a></li>
                </ul>
            </li>

            <!-- Transport (Collapsible) -->
            <li class="dropdown">
                <a class="dropdown-toggle d-flex justify-content-between align-items-center" 
                    href="#transportMenu" data-target="#transportMenu">
                    <i class="fas fa-bus"></i> Transport
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <ul class="collapse" id="transportMenu">
                    <li><a
                            href="{{ url('/transport?departure=Marrakech&destination=Casablanca Aéroport&price=1500 DH&image=casa-airo.jpg&description=Transfert privé de Marrakech à Casablanca Aéroport avec confort et sécurité.') }}">Transfert
                            Marrakech - Casablanca aéroport</a></li>

                    <li><a
                            href="{{ url('/transport?departure=Marrakech&destination=Casablanca Centre&price=1700 DH&image=casa.webp&description=Voyagez sereinement de Marrakech à Casablanca Centre avec nos véhicules premium.') }}">Transfert
                            Marrakech - Casablanca centre</a></li>

                    <li><a
                            href="{{ url('/transport?departure=Marrakech&destination=Agadir&price=1700 DH&image=agadir-centre.webp&description=Transfert rapide et confortable de Marrakech à Agadir.') }}">Transfert
                            Marrakech - Agadir</a></li>

                    <li><a
                            href="{{ url('/transport?departure=Marrakech&destination=Essaouira&price=1300 DH&image=Essaouira.jpg&description=Découvrez Essaouira avec un transport privé de qualité.') }}">Transfert
                            Marrakech - Essaouira</a></li>

                    <li><a
                            href="{{ url('/transport?departure=Marrakech&destination=Rabat&price=2000 DH&image=rabat.JPG&description=Voyagez de Marrakech à Rabat avec un chauffeur professionnel.') }}">Transfert
                            Marrakech - Rabat</a></li>

                    <li><a
                            href="{{ url('/transport?departure=Hôtel en ville&destination=Hôtel en ville&price=150 DH&image=hotel-enville.jpg&description=Déplacement rapide entre hôtels en ville.') }}">Transfert
                            hôtel - hôtel en ville</a></li>

                    <li><a
                            href="{{ url('/transport?departure=Aéroport&destination=Hôtel en ville&price=150 DH&image=marrakech-airport.webp&description=Transport confortable depuis l’aéroport vers votre hôtel en ville.') }}">Transfert
                            aéroport - hôtel en ville</a></li>

                    <li><a
                            href="{{ url('/transport?departure=Aéroport&destination=Hôtel Palmeraie&price=200 DH&image=palmerie.jpg&description=Service exclusif vers votre hôtel à la Palmeraie.') }}">Transfert
                            aéroport - hôtel Palmeraie</a></li>

                    <li><a
                            href="{{ url('/transport?departure=Visite de ville&destination=La journée&price=800 DH&image=visite.jpg&description=Visitez Marrakech avec un chauffeur privé à votre disposition.') }}">Visite
                            de ville la journée</a></li>

                    <li><a
                            href="{{ url('/transport?departure=Mise à disposition&destination=&price=1200 DH&image=logo.png&description=Chauffeur et véhicule privé à votre service pour toute la journée.') }}">Mise
                            à disposition</a></li>

                    <li><a
                            href="{{ url('/transport?departure=Soirée restaurant&destination=&price=400 DH&image=soiree-evenings.jpg&description=Profitez de votre soirée avec un transport sécurisé.') }}">Soirée
                            restaurant</a></li>
                </ul>
            </li>

            <!-- Circuits (Collapsible) -->
            <li class="dropdown">
                <a class="dropdown-toggle d-flex justify-content-between align-items-center" href="#"
                    data-target="#circuitsMenu">
                    <i class="fas fa-map"></i> Circuits
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <ul class="collapse" id="circuitsMenu">
                    <li><a href="{{ url('/circuits/marrakech-zagora') }}">Marrakech - Zagora</a></li>
                    <li><a href="{{ url('/circuits/marrakech-merzouga') }}">Marrakech - Merzouga</a></li>
                </ul>
            </li>

            <!-- Contact -->
            <li><a href="{{ url('/contact') }}"><i class="fas fa-envelope-open-text"></i> Contactez-nous</a></li>

            <div class="tripadvisor-section-mobile text-center my-3">
                <a href="https://www.tripadvisor.fr/Profile/607mohamedaminet" target="_blank" class="social-icon">
                    <img loading="lazy" src="{{ asset('assets/images/logo/tripadvisor.png') }}" alt="TripAdvisor"
                        class="tripadvisor-logo">
                </a>
            </div>
        </ul>
    </div>

    <!-- Overlay for Sidebar -->
    <div class="sidebar-overlay d-lg-none"></div>

    <!-- Main Content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

        <!-- JavaScript to Optimize Load -->
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hide Preloader & Show Content
            document.getElementById("preloader").style.display = "none";
            document.getElementById("content-wrapper").classList.remove("hidden");
        });
    </script>

    <footer class="footer">
        <!-- Top Section -->
        <div class="container py-4 top-footer">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h3 class="footer-heading">Inscrivez-vous aujourd'hui et ne manquez plus jamais une autre offre !
                    </h3>
                </div>
                <div class="col-md-5 text-md-end">
                    <p class="footer-privacy">Vous acceptez les conditions générales et la politique de confidentialité
                        de Travel Plans Marrakech.</p>
                </div>
            </div>
        </div>

        <!-- Middle Section -->
        <div class="container py-5 middle-footer">
            <div class="row">
                <!-- Left Section: Logo, Description, Social Media -->
                <div class="col-md-6">
                    <div class="footer-logo mb-3">
                        <img loading="lazy"loading="lazy"src="{{ asset('assets/images/logo/logo.png') }}" style="height: 100px; width: auto;"
                            alt="Travel Plans Logo">

                    </div>
                    <p class="footer-description">
                        <strong>Premium Kech Tours</strong> Découvrez le Maroc à travers des formules de voyage sur mesure et
                        des excursions uniques. Nous mettons à votre disposition une équipe expérimentée et dynamique,
                        vous accompagnant dans vos déplacements touristiques avec des véhicules confortables et
                        climatisés, pour une expérience inoubliable.
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/premiumkechtours?utm_source=qr&igsh=MXU0OHgxamNtdzM2eA=="
                            class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Right Section: Links & Contact -->
                <div class="col-md-6">
                    <div class="row">
                        <!-- Important Links -->
                        <div class="col-md-6">
                            <h5 class="footer-title">Liens importants</h5>
                            <ul class="footer-links">
                                <li><a href="#apropos">À propos de nous</a></li>
                                <li><a href="#vehicules">Transport</a></li>
                                <li><a href="#excursion">Excursions</a></li>
                                <li><a href="#circuit">Circuit</a></li>
                                <li><a href="#offers">Nos Offre</a></li>
                                <li><a href="#question">FAQ</a></li>
                                <li><a href="#contact">Contactez-nous</a></li>

                            </ul>
                        </div>
                        <!-- Contact Info -->
                        <div class="col-md-6">
                            <h5 class="footer-title">Coordonnées</h5>
                            <ul class="footer-contact">
                                <li><i class="fas fa-map-marker-alt"></i> Sidi Abad 2 , Marrakech</li>
                                <li><i class="fas fa-phone"></i> +212 07 70 13 45 39</li>
                                <li><i class="fas fa-envelope"></i> Premiumkechtours@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="footer-bottom">
            <div class="container text-center py-3">
                <p class="mb-0">&copy; 2025 Premium Kech Tour. All rights reserved.</p>
                <p class="mb-0">
                    <a href="{{ route('terms') }}">Termes et conditions</a> /
                    <a href="{{ route('privacy') }}">Politique de Confidentialité</a>
                </p>

                <p class="mb-0 mt-2">
                    Développé par
                    <a href="https://wa.me/212632582096" class="developer-credit">
                        <i class="fas fa-code"></i>
                    </a>
                </p>
            </div>
        </div>

        <!-- Font Awesome (if not already included) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    </footer>
    <script src="{{ asset('assets/js/lazy.js') }}" defer></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/navbar.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>

</body>
<a href="https://wa.me/212770134539" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

<!-- Floating WhatsApp Button Styles -->
<style>
        .hidden { visibility: hidden; opacity: 0; transition: opacity 0.5s ease-in-out; }
        #preloader {
            position: fixed; width: 100%; height: 100%; background: white; display: flex;
            justify-content: center; align-items: center; z-index: 9999;
        }
        .spinner {
            width: 50px; height: 50px; border: 5px solid #ddd; border-top: 5px solid #1E3A8A;
            border-radius: 50%; animation: spin 1s linear infinite;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        .whatsapp-float {
            position: fixed; bottom: 20px; right: 20px; background-color: #25D366; color: white;
            width: 60px; height: 60px; border-radius: 50%; display: flex; justify-content: center;
            align-items: center; font-size: 28px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            z-index: 1000; transition: all 0.3s ease-in-out;
        }
        .whatsapp-float:hover { background-color: #1EBE5D; transform: scale(1.1); }
    </style>

</html>