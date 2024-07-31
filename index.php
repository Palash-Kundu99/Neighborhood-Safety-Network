<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neighborhood Safety Network</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <style>
        /* Hide prev/next buttons */
        .carousel-control-prev, 
        .carousel-control-next {
            display: none;
        }
        /* CSS for sections */
        #events h2, #watch h2 {
            font-size: 60px;
            color: #ffffff;
            text-shadow: 0 0 30px rgba(0, 0, 0, 0.8), 0 0 60px rgba(0, 0, 0, 0.6), 0 0 90px rgba(0, 0, 0, 0.4);
        }
        #communication h2 {
            font-size: 60px;
            color: #ffffff;
            text-shadow: 0 0 30px rgba(0, 0, 0, 0.8), 0 0 60px rgba(0, 0, 0, 0.6), 0 0 90px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>
<body>
<h1 class="heading">𝓥𝓪𝓼𝓾𝓷𝓭𝓱𝓪𝓻𝓪 | বসুন্ধরা</h1>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#home">
        <img src="images/logo.png" alt="Neighborhood Safety Logo" style="height: 80px;"> 
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="#events">Upcoming Events</a></li>
            <li class="nav-item"><a class="nav-link" href="#watch">Community Watch</a></li>
            <li class="nav-item"><a class="nav-link" href="report.php">Report Incident</a></li>
            <li class="nav-item"><a class="nav-link" href="index1.php">Chat Room</a></li>
        </ul>
    </div>
</nav>

<!-- Carousel Section -->
<div id="home" class="carousel-container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/1.jpg" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="images/2.jpg" class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="images/3.jpg" class="d-block w-100" alt="Image 3">
            </div>
            <div class="carousel-item">
                <img src="images/4.jpg" class="d-block w-100" alt="Image 4">
            </div>
            <!-- Add more carousel items as needed -->
        </div>
    </div>
</div>

<!-- Sections -->
<div id="events" class="section">
    <h2 class="mb-4 text-center">Upcoming Events</h2>
    <?php include 'Upcoming_Events.php'; ?>
</div>

<div id="watch" class="section">
    <h2 class="mb-4 text-center">Community Watch</h2>
    <?php include 'Neighbour_Watch.php'; ?>
</div>
<!-- Footer Section -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li>Email: info@neighborhoodsafety.com</li>
                    <li>Phone: (123) 456-7890</li>
                    <li>Address: 123 Safety St, Safe Town, ST 12345</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#events">Upcoming Events</a></li>
                    <li><a href="#watch">Community Watch</a></li>
                    <li><a href="index1.php">Chat Room</a></li>
                    <li><a href="report.php">Report Incident</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Follow Us</h5>
                <ul class="social-icons-grid">
                    <li><a href="#"><img src="images/fb.png" alt="Facebook" style="width: 28px; height: 28px;"></a></li>
                    <li><a href="#"><img src="images/X.png" alt="X" style="width: 24px; height: 24px;"></a></li>
                    <li><a href="#"><img src="images/insta.png" alt="Instagram" style="width: 28px; height: 28px;"></a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-3">
            <p>&copy; 2024 Neighborhood Safety Network. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- JavaScript Files -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Custom Script for Navigation Highlight -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sections = document.querySelectorAll('.section');
        const navLinks = document.querySelectorAll('.nav-link');

        function changeNavOnScroll() {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= sectionTop - 50 && scrollY < sectionTop + sectionHeight - 50) {
                    current = section.getAttribute('id');
                }
            });
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        }
        
        window.addEventListener('scroll', changeNavOnScroll);
    });
</script>
</body>
</html>
