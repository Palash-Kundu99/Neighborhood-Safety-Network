<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Events</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
            margin-top: 30px;
        }
        .event-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .event-card img {
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #dee2e6;
        }
        .card-body {
            padding: 20px;
            background-color: #ffffff;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .event-date {
            font-size: 1.2rem;
            color: #007bff;
        }
        .card-text {
            margin-bottom: 1rem;
        }
        .extra-content {
    max-height: 0;
    overflow: hidden;
    padding: 0 20px;
    transition: max-height 0.5s ease, padding 0.5s ease;
    background-color: #f1f1f1;
}
.extra-content.open {
    max-height: 500px;
    padding-bottom: 20px;
}

        .read-more {
            cursor: pointer;
            color: #007bff;
            font-weight: bold;
            text-align: center;
            padding: 10px;
        }
        .read-more:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- Event Cards -->
            <div class="col-md-4 mb-4">
                <div class="card event-card">
                    <img src="images/meeting.jpg" class="card-img-top" alt="Community Meetings">
                    <div class="card-body">
                        <h5 class="card-title">Community Meetings</h5>
                        <p class="card-date event-date">Every first Saturday of the month</p>
                        <p class="card-text">Join our monthly community meetings where neighbors discuss local issues, share updates, and plan future events. Help shape the future of our community the big screen.</p>
                    </div>
                    <div class="extra-content">
                        <p class="card-text">
                            It's a great opportunity to stay informed and get involved in making our neighborhood a better place.<br>
                            <b>Date & Time:</b> 10:00 AM - 12:00 PM<br>
                            <b>Location:</b> Society Clubhouse, 123 Society Lane
                        </p>
                    </div>
                    <p class="read-more" onclick="toggleContent(this)">Read More</p>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card event-card">
                    <img src="images/movie.jpg" class="card-img-top" alt="Outdoor Movie Night">
                    <div class="card-body">
                        <h5 class="card-title">Outdoor Movie Night</h5>
                        <p class="card-date event-date">August 11, 2024</p>
                        <p class="card-text">Enjoy an evening under the stars at our Outdoor Movie Night! Bring your family and friends, along with blankets and lawn chairs, and watch a popular film on the big screen.</p>
                    </div>
                    <div class="extra-content">
                        <p class="card-text">
                            <b>Date & Time:</b> 7:30 PM - 10:00 PM<br>
                            <b>Location:</b> Society Park, 456 Society Avenue
                        </p>
                    </div>
                    <p class="read-more" onclick="toggleContent(this)">Read More</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card event-card">
                    <img src="images/flag.jpg" class="card-img-top" alt="Flag Hoisting Ceremony">
                    <div class="card-body">
                        <h5 class="card-title">Flag Hoisting Ceremony</h5>
                        <p class="card-date event-date">August 15, 2024</p>
                        <p class="card-text">Join us for the Flag Hoisting Ceremony as we celebrate our community spirit. The event includes the national anthem, a speech by a local leader, and a vibrant cultural program.</p>
                    </div>
                    <div class="extra-content">
                        <p class="card-text">
                            <b>Date & Time:</b> 9:00 AM - 10:00 AM<br>
                            <b>Flag Hoisting Ceremony:</b>National anthem, speech by a community leader.<br>
                            <b>Cultural Program:</b>10:00 AM - 11:00 AM.<br>
                            <b>Location:</b> Society Park, 456 Society Avenue
                        </p>
                    </div>
                    <p class="read-more" onclick="toggleContent(this)">Read More</p>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card event-card">
                    <img src="images/food.jpg" class="card-img-top" alt="Food Festival">
                    <div class="card-body">
                        <h5 class="card-title">Food Festival</h5>
                        <p class="card-date event-date">September 1, 2024</p>
                        <p class="card-text">Savor a variety of delicious foods at our annual Food Festival! Featuring stalls from local vendors and home chefs, this event also includes live music and entertainment for all to enjoy.</p>
                    </div>
                    <div class="extra-content">
                        <p class="card-text">
                            <b>Date & Time:</b> 11:00 AM - 6:00 PM<br>
                            <b>Location:</b> Society Plaza, 789 Society Street
                        </p>
                    </div>
                    <p class="read-more" onclick="toggleContent(this)">Read More</p>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card event-card">
                    <img src="images/durga.png" class="card-img-top" alt="Durga Puja">
                    <div class="card-body">
                        <h5 class="card-title">Durga Puja</h5>
                        <p class="card-date event-date">October 11-15, 2024</p>
                        <p class="card-text">Celebrate Durga Puja with vibrant festivities and traditional rituals in our community. Enjoy cultural performances, delicious food, and participate in the joyous celebration of this grand festival.</p>
                    </div>
                    <div class="extra-content">
                        <p class="card-text">
                            - <b>Shasthi Puja and Bodhon:</b> Wednesday, October 11, 6:00 PM<br>
                            - <b>Saptami Puja:</b> Thursday, October 12, 8:00 AM<br>
                            - <b>Ashtami Puja and Sandhi Puja:</b> Friday, October 13, 8:00 AM (Ashtami Puja), 8:00 PM (Sandhi Puja)<br>
                            - <b>Navami Puja:</b> Saturday, October 14, 8:00 AM<br>
                            - <b>Dashami and Sindoor Khela:</b> Sunday, October 15, 9:00 AM (Dashami Puja), 4:00 PM (Visarjan)<br>
                            <b>Location:</b> Society Community Hall, 123 Festive Road
                        </p>
                    </div>
                    <p class="read-more" onclick="toggleContent(this)">Read More</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card event-card">
                    <img src="images/kali.jpg" class="card-img-top" alt="Kali Puja">
                    <div class="card-body">
                        <h5 class="card-title">Kali Puja</h5>
                        <p class="card-date event-date">November 4, 2024</p>
                        <p class="card-text">Experience the devotion and excitement of Kali Puja with us! The event includes rituals, cultural performances, and a festive atmosphere with music, dance, and delightful prasad.</p>
                    </div>
                    <div class="extra-content">
                        <p class="card-text">
                            <b>Date & Time:</b> 6:00 PM - 10:00 PM<br>
                            <b>Location:</b> Society Hall, 456 Devotion Lane
                        </p>
                    </div>
                    <p class="read-more" onclick="toggleContent(this)">Read More</p>
                </div>
            </div>
        </div>
    </div>

    <script>
function toggleContent(element) {
    var extraContent = element.parentNode.querySelector('.extra-content');
    var allExtraContents = document.querySelectorAll('.extra-content');
    var allReadMoreTexts = document.querySelectorAll('.read-more');

    allExtraContents.forEach(function(content) {
        if (content !== extraContent) {
            content.classList.remove('open');
        }
    });

    allReadMoreTexts.forEach(function(readMore) {
        if (readMore !== element) {
            readMore.textContent = 'Read More';
        }
    });

    extraContent.classList.toggle('open');
    element.textContent = extraContent.classList.contains('open') ? 'Read Less' : 'Read More';
}

    </script>
</body>
</html>
