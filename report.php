<?php
include 'includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $flat_number = $_POST['flat_number'];
    $floor_number = $_POST['floor_number'];
    $incident_time = $_POST['incident_time'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $contact_info = $_POST['contact_info'];

    if (addIncident($name, $description, $flat_number, $floor_number, $incident_time, $latitude, $longitude, $contact_info)) {
        $success = true;
    } else {
        $success = false;
    }
}

// Pagination settings
$limit = 2; // Number of incidents per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch incidents and total count
$incidents = getPaginatedIncidents($limit, $offset);
$totalIncidents = getIncidentCount();
$totalPages = ceil($totalIncidents / $limit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Incident</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>
    <div class="header-wrapper">
        <h1 class="heading">𝚈𝚘𝚞𝚛 𝚁𝚎𝚙𝚘𝚛𝚝, 𝙾𝚞𝚛 𝙿𝚛𝚒𝚘𝚛𝚒𝚝𝚢</h1>
        <nav class="navbar-custom navbar navbar-expand-lg navbar-dark">
            <a href="index.php">
                <img src="images/logo.png" alt="Neighborhood Safety Logo" style="height: 80px;">
            </a>
        <!-- Your navigation items go here -->
    </div>
</nav>

    <div class="container mt-4 form-container-custom">
        <div class="row">
            <!-- Report Incident Form -->
            <div class="col-md-6">
                <div class="custom-card">
                    <div class="card-body">
                        <h5 class="custom-card-title">Report an Incident</h5>
                        <?php if (isset($success)): ?>
                            <?php if ($success): ?>
                                <div class="alert alert-success">Incident reported successfully!</div>
                            <?php else: ?>
                                <div class="alert alert-danger">Failed to report incident.</div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <form action="report.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contact_info">Mobile Number</label>
                                    <input type="text" id="contact_info" name="contact_info" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Details</label>
                                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="incident_time">Time of Incident</label>
                                    <input type="time" id="incident_time" name="incident_time" class="form-control" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="flat_number">Flat No.</label>
                                    <input type="text" id="flat_number" name="flat_number" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="floor_number">Floor No.</label>
                                    <input type="text" id="floor_number" name="floor_number" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" id="latitude" name="latitude" class="form-control" readonly>
                                    <small class="form-text text-muted">Click on the map to get latitude.</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" id="longitude" name="longitude" class="form-control" readonly>
                                    <small class="form-text text-muted">Click on the map to get longitude.</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="search">Search for a City</label>
                                <div class="input-group">
                                    <input type="text" id="search" class="form-control" placeholder="Search for a city...">
                                    <div class="input-group-append">
                                        <button class="btn-search" type="button" id="searchButton">
                                        <img src="images/search.png" alt="Search" style="width: 18px; height: 18px;">

                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="map" class="mb-3"></div>
                            <button type="submit" class="btn btn-custom-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Recent Incidents List -->
            <div class="col-md-6">
                <div class="custom-card">
                    <div class="card-body">
                        <h5 class="custom-card-title">Recent Reported Incidents</h5>
                        <?php if (!empty($incidents)): ?>
                            <?php foreach ($incidents as $incident): ?>
                                <div class="custom-card mb-3">
                                    <div class="card-body">
                                        <h6 class="custom-card-title"><?php echo htmlspecialchars($incident['name']); ?></h6>
                                        <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($incident['reported_at']); ?></h6>
                                        <p class="card-text"><?php echo htmlspecialchars($incident['description']); ?></p>
                                        <p class="card-text"><strong>Flat Number:</strong> <?php echo htmlspecialchars($incident['flat_number']); ?></p>
                                        <p class="card-text"><strong>Floor Number:</strong> <?php echo htmlspecialchars($incident['floor_number']); ?></p>
                                        <p class="card-text"><strong>Contact:</strong> <?php echo htmlspecialchars($incident['contact_info']); ?></p>
                                        <a href="https://www.google.com/maps?q=<?php echo htmlspecialchars($incident['latitude']); ?>,<?php echo htmlspecialchars($incident['longitude']); ?>" class="btn btn-custom-primary" target="_blank">View on Map</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No incidents reported yet.</p>
                        <?php endif; ?>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <?php if ($page > 1): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <?php if ($page < $totalPages): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Emergency Contacts and Safety Tips -->
        <!-- Emergency Contacts and Safety Tips -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="custom-card">
                    <div class="card-body">
                        <h5 class="custom-card-title">Emergency Contacts</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <img src="images/KP.jpeg" alt="Police Icon"  style="width:50px; height: 50px; margin-right: 10px;">
                                <strong>New Town Police Station:</strong>  033 2324 6077
                            </li>
                            <li class="list-group-item">
                                <img src="images/fire.jpg" alt="Fire Icon" style="width:50px; height: 50px; margin-right: 10px;">
                                <strong>Fire Brigade:</strong> 101
                            </li>
                            <li class="list-group-item">
                                <img src="images/AMBU.jpg" alt="Medical Icon"  style="width:50px; height: 50px; margin-right: 10px;">
                                <strong>Ambulance:</strong> 102
                            </li>

                            <li class="list-group-item">
                                <img src="images/OLD.jpg" alt="Local Police Icon"  style="width:50px; height: 50px; margin-right: 10px;">
                                <strong>Senior Citizen Helpline:</strong> 9830088884
                            </li>
                            <li class="list-group-item">
                                <img src="images/WOMEN.png" alt="Local Police Icon"  style="width:50px; height: 50px; margin-right: 10px;">
                                <strong>Women Helpline:</strong> 1091
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom-card">
                    <div class="card-body">
                        <h5 class="custom-card-title">Safety Tips</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">𝐀𝐥𝐰𝐚𝐲𝐬 𝐥𝐨𝐜𝐤 𝐲𝐨𝐮𝐫 𝐝𝐨𝐨𝐫𝐬 𝐚𝐧𝐝 𝐰𝐢𝐧𝐝𝐨𝐰𝐬, 𝐞𝐯𝐞𝐧 𝐝𝐮𝐫𝐢𝐧𝐠 𝐭𝐡𝐞 𝐝𝐚𝐲.</li>
                            <li class="list-group-item">𝐑𝐞𝐩𝐨𝐫𝐭 𝐚𝐧𝐲 𝐬𝐮𝐬𝐩𝐢𝐜𝐢𝐨𝐮𝐬 𝐚𝐜𝐭𝐢𝐯𝐢𝐭𝐢𝐞𝐬 𝐭𝐨 𝐲𝐨𝐮𝐫 𝐥𝐨𝐜𝐚𝐥 𝐩𝐨𝐥𝐢𝐜𝐞 𝐬𝐭𝐚𝐭𝐢𝐨𝐧.</li>
                            <li class="list-group-item">𝐊𝐧𝐨𝐰 𝐲𝐨𝐮𝐫 𝐧𝐞𝐢𝐠𝐡𝐛𝐨𝐫𝐬; 𝐚 𝐬𝐭𝐫𝐨𝐧𝐠 𝐜𝐨𝐦𝐦𝐮𝐧𝐢𝐭𝐲 𝐢𝐬 𝐚 𝐬𝐚𝐟𝐞 𝐜𝐨𝐦𝐦𝐮𝐧𝐢𝐭𝐲.</li>
                            <li class="list-group-item">𝐈𝐧𝐬𝐭𝐚𝐥𝐥 𝐛𝐫𝐢𝐠𝐡𝐭 𝐥𝐢𝐠𝐡𝐭𝐬 𝐚𝐫𝐨𝐮𝐧𝐝 𝐲𝐨𝐮𝐫 𝐡𝐨𝐦𝐞 𝐭𝐨 𝐤𝐞𝐞𝐩 𝐢𝐭 𝐬𝐚𝐟𝐞 𝐚𝐭 𝐧𝐢𝐠𝐡𝐭.</li>
                            <li class="list-group-item">𝐒𝐞𝐜𝐮𝐫𝐞 𝐲𝐨𝐮𝐫 𝐖𝐢-𝐅𝐢 𝐰𝐢𝐭𝐡 𝐚 𝐬𝐭𝐫𝐨𝐧𝐠 𝐩𝐚𝐬𝐬𝐰𝐨𝐫𝐝 𝐭𝐨 𝐩𝐫𝐞𝐯𝐞𝐧𝐭 𝐦𝐢𝐬𝐮𝐬𝐞.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="js/script.js"></script>





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
            <div >
            <h5>Back to Home</h5>
            <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" alt="Neighborhood Safety Logo" style="height: 80px;"> 
    </a>
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
