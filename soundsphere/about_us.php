<?php
    include_once('config/db.php');
    include_once('includes/header.php');
    include_once('includes/side_bar.php');
?>

<!-- Content Wrapper -->
<div class="col-md-8 col-lg-9 py-4 text-white main-content" style="width: 1080px;">
    <h1 class="fw-bold mb-4">About Soundsphere</h1>
    <div class="about-content">
        <p class="lead">
            <strong>Soundsphere</strong> is the ultimate music streaming platform, designed to bring music lovers around the world closer to the artists, albums, and tracks they love. Whether you're discovering new music or revisiting your favorite songs, Soundsphere offers an easy, seamless, and immersive experience for everyone.
        </p>
        <h2 class="mt-4">Our Mission</h2>
        <p>
            At Soundsphere, our mission is simple: to make music accessible to everyone, anywhere. We believe music has the power to connect people, evoke emotions, and create memories. Our platform gives artists a space to share their work with a global audience while providing users with personalized music experiences and recommendations.
        </p>
        <h2 class="mt-4">What We Offer</h2>
        <ul class="list-group">
            <li class="list-group-item bg-dark text-white">
                <strong>Unlimited Streaming</strong> - Listen to your favorite tracks, albums, and playlists anytime, anywhere, with no ads interrupting your music experience.
            </li>
            <li class="list-group-item bg-dark text-white">
                <strong>Personalized Playlists</strong> - Our advanced algorithms learn your listening habits and create custom playlists to match your taste.
            </li>
            <li class="list-group-item bg-dark text-white">
                <strong>Discover New Music</strong> - Explore new releases, trending artists, and discover music from different genres to keep your playlist fresh.
            </li>
            <li class="list-group-item bg-dark text-white">
                <strong>High-Quality Audio</strong> - Enjoy your music in pristine, high-fidelity sound, whether you’re using headphones, speakers, or car audio systems.
            </li>
            <li class="list-group-item bg-dark text-white">
                <strong>Artist Support</strong> - As an artist-focused platform, we provide tools to help musicians grow their fanbase and monetize their work.
            </li>
        </ul>

        <h2 class="mt-4">Join Us Today</h2>
        <p>
            Join millions of users who trust Soundsphere to provide them with the best music experience. Whether you’re looking for the latest hits or underground gems, we have it all. Sign up today and start enjoying music on your terms.
        </p>
        <a href="inscription.php" class="btn btn-custom d-flex align-items-center px-4 py-2 shadow rounded-pill text-black" style="width: 150px;">
            Get Started
        </a>
    </div>
</div> 

<style>
/* Body: Prevent horizontal scrolling */
body {

}

/* Main Content: Ensure no horizontal scrolling and proper padding */
.main-content {
    width: 100%;
    padding-right: 0;
    overflow-x: hidden;  /* Prevent horizontal scroll */
}

/* About Section: Limit vertical overflow and prevent scroll */
.about-content {
    max-height: calc(100vh - 120px); /* Adjust based on header size */
    overflow-y: auto; /* Allow vertical scroll if content is too long */
    padding-right: 15px;  /* Optional, if necessary for content */
}

/* Ensuring the list items are not overflowing */
.about-content ul {
    margin-top: 20px;
    padding-left: 0;
}

.about-content ul .list-group-item {
    background-color: #242731;
    color: #B3B3B3;
    font-size: 1rem;
    border: none;
    padding: 15px;
    margin: 0;  /* Remove any margin to avoid overflow */
}

/* Button Customization */
.about-content a.btn-custom {
    background-color: #A8FA4F;
    border-color: #A8FA4F;
    font-weight: bold;
    transition: background-color 0.3s;
}

.about-content a.btn-custom:hover {
    background-color: #32CD7C;
    border-color: #32CD7C;
}

/* Heading and Text Styles */
.about-content h2 {
    font-size: 1.75rem;
    font-weight: 600;
    margin-top: 30px;
    color: #A8FA4F;
}

.about-content .lead, .about-content p {
    font-size: 1.25rem;
    color: #B3B3B3;
}

.about-content h1 {
    color: #A8FA4F;
}

</style>

<!-- Footer Section -->
<?php
    include_once('includes/footer.php');
?>
</div> <!-- Make sure to close the body or any extra divs here -->
