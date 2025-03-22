@extends('layout.base')

@section('title', 'Termes et Conditions')

@section('content')
<!-- Decorative Background Elements -->
<img style="opacity: 0.8 !important;" src="{{ asset('assets/images/banners/section-vector1.png') }}" class="deco-left" alt="Left Decoration">
<img style="opacity: 0.8 !important;" src="{{ asset('assets/images/banners/section-vector2.png') }}" class="deco-right" alt="Right Decoration">

<div class="container my-5 position-relative" style="z-index: 2;">
    <h1 class="text-primary" style="color: #0A1019 !important;">Termes et Conditions</h1>
    <p class="text-muted">Dernière mise à jour : {{ date('d/m/Y') }}</p>

    <h3>1. Introduction</h3>
    <p>Bienvenue sur <strong>Premium Kech Tour</strong>. En accédant à notre site web et en utilisant nos services, vous acceptez de respecter ces Conditions Générales d'Utilisation.</p>

    <h3>2. Services Proposés</h3>
    <p>Premium Kech Tour propose des services de réservation de circuits, excursions et transports touristiques au Maroc.</p>

    <h3>3. Utilisation du Site</h3>
    <ul>
        <li>L’utilisateur s’engage à utiliser le site uniquement à des fins légales.</li>
        <li>Toute tentative de fraude ou d'accès non autorisé peut entraîner des poursuites judiciaires.</li>
    </ul>

    <h3>4. Réservations et Paiements</h3>
    <p>Les réservations peuvent être effectuées via notre site ou WhatsApp. Nous nous réservons le droit de modifier les prix à tout moment.</p>

    <h3>5. Annulation et Remboursement</h3>
    <p>Les annulations doivent être effectuées au moins 48 heures avant le départ pour un remboursement partiel.</p>

    <h3>6. Responsabilité</h3>
    <p>Nous ne pourrons être tenus responsables des retards ou annulations dus à des circonstances indépendantes de notre volonté.</p>

    <h3>7. Contact</h3>
    <p>Pour toute question, contactez-nous à : <a href="mailto:Premiumkechtours@gmail.com">Premiumkechtours@gmail.com</a></p>
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
a[href^="mailto:"] {
    color: #0EA5E9; /* Default color (Electric Cyan) */
    text-decoration: none;
    transition: color 0.3s ease;
}

a[href^="mailto:"]:hover {
    color: black; /* Change to black on hover */
}

</style>
@endsection
