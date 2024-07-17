// Initialize the map and set its view to Lebanon with a zoom level
var map = L.map('map').setView([33.8547, 35.8623], 10);

// Load and display tile layers on the map
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Fetch marker data from PHP backend
fetch('../../backend/MapData/data.php')
    .then(response => response.json())
    .then(data => {
        data.forEach(marker => {
            L.marker([marker.lat, marker.lng])
                .bindPopup(marker.name)
                .addTo(map);
        });
    })
    .catch(error => console.error('Error fetching marker data:', error));

