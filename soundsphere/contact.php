<?php
    include_once('config/db.php');
    include_once('includes/header.php');
    include_once('includes/side_bar.php');
?>

<div class="col-md-8 col-lg-9 py-4 text-white main-content"style="width: 1080px;">
    <h1 class="fw-bold mb-4">Contact Us</h1>
    <form action="contact_form.php" method="POST" class="contact-form">
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-custom d-flex align-items-center px-4 py-2 shadow rounded-pill text-black">
            Send Message
        </button>
    </form>
</div>
<style>
    .contact-form .form-control {
    background-color: #1C1F26;
    border-color: #3A3F4C;
    color: #FFFFFF;
    border-radius: 25px;
    padding: 10px;
    font-size: 1rem;
}

.contact-form .form-control:focus {
    background-color: #1C1F26 !important;
    border-color: #A8FA4F !important;
    color: #FFFFFF !important;
    box-shadow: 0 0 8px rgba(168, 250, 79, 0.5) !important;
}

.contact-form label {
    color: #B3B3B3;
}

.contact-form button {
    background-color: #A8FA4F;
    border-color: #A8FA4F;
    font-weight: bold;
}

.contact-form button:hover {
    background-color: #32CD7C;
    border-color: #32CD7C;
}

</style>
<?php
    include_once('includes/footer.php');
?>
</div>