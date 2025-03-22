@extends('layout.base')

@section('title', 'Politique de Confidentialité')

@section('content')
<!-- Decorative Background Elements -->
<img style="opacity: 0.8 !important;" src="{{ asset('assets/images/banners/section-vector1.png') }}" class="deco-left" alt="Left Decoration">
<img style="opacity: 0.8 !important;" src="{{ asset('assets/images/banners/section-vector2.png') }}" class="deco-right" alt="Right Decoration">

<div class="container my-5 position-relative" style="z-index: 2;">
    <h1 class="text-primary" style="color: #0A1019 !important;">Politique de Confidentialité</h1>
    <p class="text-muted">Dernière mise à jour : {{ date('d/m/Y') }}</p>

    <h3>1. Collecte des Données</h3>
    <p>Nous collectons des données personnelles lorsque vous utilisez notre site, notamment :</p>
    <ul>
        <li>Nom, prénom, email, téléphone (pour les réservations)</li>
        <li>Données de navigation (via cookies)</li>
    </ul>

    <h3>2. Utilisation des Données</h3>
    <p>Vos données sont utilisées pour :</p>
    <ul>
        <li>Gérer vos réservations et communications</li>
        <li>Améliorer nos services</li>
        <li>Respecter nos obligations légales</li>
    </ul>

    <h3>3. Partage des Données</h3>
    <p>Nous ne partageons pas vos données sauf avec :</p>
    <ul>
        <li>Nos partenaires de service (chauffeurs, guides) pour exécuter la réservation</li>
        <li>Les autorités légales si nécessaire</li>
    </ul>

    <h3>4. Sécurité des Données</h3>
    <p>Nous mettons en place des mesures strictes pour protéger vos données.</p>

    <h3>5. Cookies</h3>
    <p>Nous n’utilisons pas de cookies pour collecter ou stocker vos données personnelles. Cependant, notre site peut utiliser des cookies techniques pour assurer son bon fonctionnement et améliorer votre expérience utilisateur.</p>
    <p>Vous pouvez configurer votre navigateur pour bloquer ces cookies si vous le souhaitez.</p>

    <h3>6. Vos Droits</h3>
    <p class="mail">Vous avez le droit d’accéder, modifier ou supprimer vos données. Contactez-nous à : <a class="mail2" href="mailto:Premiumkechtours@gmail.com">Premiumkechtours@gmail.com</a></p>
</div>

<style>
    /* Decorative Elements Inside */
.deco-left, .deco-right {
    position: absolute;
    width: 350px;
    opacity: 0.3;
    z-index: 1;
    pointer-events: none;
}

.deco-left {
    left: -20px;
    top: 15%;
}

.deco-right {
    right: -20px;
    bottom: 15%;
}
.mail2 {
    color: #0EA5E9; /* Default color (Electric Cyan from your palette) */
    text-decoration: none;
    transition: color 0.3s ease;
}

.mail2:hover {
    color: black; /* Change to black on hover */
}

</style>
@endsection

