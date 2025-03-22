<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oops! 404 Not Found</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/icons/android-chrome-192x192.png') }}">

    <!-- Bootstrap & FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <style>
        /* Body Background */
        body {
            background: radial-gradient(circle, rgba(30,58,138,1) 0%, rgba(0,0,0,1) 100%);
            color: white;
            font-family: 'Roboto Slab', serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        /* 404 Container */
        .error-container {
            position: relative;
            max-width: 600px;
            background: rgba(0, 0, 0, 0.85);
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1.2s ease-in-out;
        }

        /* Animated 404 Text */
        .error-container h1 {
            font-size: 120px;
            font-weight: 700;
            color: #F97316;
            position: relative;
            animation: glitch 1s infinite linear alternate-reverse;
        }

        /* Glitch Effect */
        @keyframes glitch {
            0% { text-shadow: 3px 3px #0EA5E9; }
            20% { text-shadow: -3px -3px #F97316; }
            40% { text-shadow: 2px -2px #64748B; }
            60% { text-shadow: -2px 2px #0EA5E9; }
            80% { text-shadow: 3px 3px #F97316; }
            100% { text-shadow: -3px -3px #64748B; }
        }

        /* Subheading */
        .error-container h2 {
            font-size: 26px;
            margin-bottom: 15px;
            letter-spacing: 1px;
            color: #ddd;
        }

        /* Description */
        .error-container p {
            font-size: 18px;
            color: #bbb;
        }

        /* Custom Buttons with SkewX Effect */
        .custom-btn {
            
            position: relative;
            display: inline-block;
            padding: 14px 30px;
            margin: 10px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            text-transform: uppercase;
            border: 2px solid white;
            color: white;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        /* Button Hover Effects */
        .custom-btn::after {
            position: absolute;
            content: "";
            display: block;
            left: 15%;
            right: -20%;
            top: -4%;
            height: 150%;
            width: 150%;
            bottom: 0;
            border-radius: 2px;
            background-color: #F97316;
          
            transform: skewX(45deg) scale(0, 1);
            z-index: -1;
            transition: all 0.5s ease-out 0s;
        }

        .custom-btn:hover::after {
            
            transform: skewX(45deg) scale(1, 1);
        }
        .custom-btn:hover{
            text-decoration: none;
            border: 2px solid #F97316;
        }
        .custom-btn span {
            position: relative;
            z-index: 2;
        }

        .custom-btn .text {
            transition: transform 0.3s ease-in-out;
        }

        .custom-btn:hover .text {
            transform: translateX(-5px);
        }

        .custom-btn .icon {
            transition: transform 0.3s ease-in-out;
        }

        .custom-btn:hover .icon {
            transform: translateX(5px);
        }

        /* Floating Background Particles */
        .floating-bubbles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .floating-bubbles span {
            position: absolute;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            animation: floatUp linear infinite;
        }

        @keyframes floatUp {
            0% { transform: translateY(0); opacity: 1; }
            100% { transform: translateY(-100vh); opacity: 0; }
        }

        /* Fade-In Animation */
        @keyframes fadeIn {
            0% { opacity: 0; transform: scale(0.8); }
            100% { opacity: 1; transform: scale(1); }
        }
    </style>
</head>

<body>

    <!-- Background Floating Particles -->
    <div class="floating-bubbles">
        <!-- Generates bubbles dynamically with JS -->
    </div>

    <div class="error-container">
        <h1>404</h1>
        <h2>Oops! Page Introuvable</h2>
        <p>Nous sommes désolés, la page que vous cherchez est introuvable.</p>

        <a href="{{ url('/') }}" class="custom-btn">
            <span class="text"><i class="fas fa-home"></i> Retour Accueil</span>
            <span class="icon"></span>
        </a>

        <a href="{{ url('/contact') }}" class="custom-btn">
            <span class="text"><i class="fas fa-envelope"></i> Contactez-nous</span>
            <span class="icon"></span>
        </a>
    </div>

    <!-- JavaScript for Floating Bubbles -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const bubbleContainer = document.querySelector(".floating-bubbles");

            for (let i = 0; i < 20; i++) {
                let bubble = document.createElement("span");
                let size = Math.random() * 20 + 10; // Random size 10px-30px
                let position = Math.random() * 100; // Random left position
                let duration = Math.random() * 5 + 5; // Animation duration 5s-10s

                bubble.style.width = size + "px";
                bubble.style.height = size + "px";
                bubble.style.left = position + "%";
                bubble.style.animationDuration = duration + "s";

                bubbleContainer.appendChild(bubble);
            }
        });
    </script>

</body>
</html>
