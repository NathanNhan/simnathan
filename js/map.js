
function initMap() {
    var uluru = {
        lat: 23.094197,
        lng: 72.558148
    };
    var map = new google.maps.Map(document.getElementById('contact-map'), {
        zoom: 14,
        center: uluru,
        scrollwheel: false
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map,
        icon: 'images/map_marker.png'

    });
}