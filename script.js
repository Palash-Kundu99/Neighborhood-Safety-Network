document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('map').setView([22.5726, 88.3639], 12); // Default center on Kolkata

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    var marker;

    // Function to add markers for existing incidents with pagination
    function loadIncidents(page = 1) {
        var limit = 3; // Number of incidents per page
        var offset = (page - 1) * limit;

        fetch(`functions.php?action=getIncidents&limit=${limit}&offset=${offset}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(incident => {
                    // Add markers to map
                    L.marker([incident.latitude, incident.longitude])
                        .bindPopup(`<b>${incident.name}</b><br>${incident.description}<br>Reported At: ${incident.reported_at}`)
                        .addTo(map);

                    // Add incident to the "Recent Reported Incidents" section
                    var incidentsList = document.getElementById('incidents-list');
                    var listItem = document.createElement('li');
                    listItem.innerHTML = `<b>${incident.name}</b><br>${incident.description}<br>Reported At: ${incident.reported_at}`;
                    incidentsList.appendChild(listItem);
                });
            })
            .catch(error => console.error('Error:', error));
    }

    // Initial load of incidents
    loadIncidents();

    map.on('click', function(e) {
        if (marker) {
            map.removeLayer(marker);
        }
        marker = L.marker(e.latlng).addTo(map);
        document.getElementById('latitude').value = e.latlng.lat;
        document.getElementById('longitude').value = e.latlng.lng;
    });

    document.getElementById('searchButton').addEventListener('click', function() {
        var searchQuery = document.getElementById('search').value;
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${searchQuery}`)
            .then(response => response.json())
            .then(data => {
                if (data && data.length > 0) {
                    var lat = data[0].lat;
                    var lon = data[0].lon;
                    map.setView([lat, lon], 12);
                    if (marker) {
                        map.removeLayer(marker);
                    }
                    marker = L.marker([lat, lon]).addTo(map);
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lon;
                } else {
                    alert('Location not found!');
                }
            })
            .catch(error => console.error('Error:', error));
    });
});
