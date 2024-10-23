<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento de Conductores</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY"></script>
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: {lat: -16.5000, lng: -68.1193} // Centra en una ubicación por defecto
            });
            obtenerUbicaciones();
        }

        function actualizarMapa(ubicaciones) {
            ubicaciones.forEach(function(ubicacion) {
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(ubicacion.latitud), lng: parseFloat(ubicacion.longitud)},
                    map: map,
                    title: 'Conductor ' + ubicacion.id_conductor
                });
            });
        }

        function obtenerUbicaciones() {
            fetch('<?php echo site_url('seguimiento/obtenerUbicaciones'); ?>')
                .then(response => response.json())
                .then(data => actualizarMapa(data));
        }

        setInterval(obtenerUbicaciones, 5000);
    </script>
</head>
<body onload="initMap()">
    <h1>Seguimiento de Conductores</h1>
    <div id="map" style="height: 500px; width: 100%;"></div>
</body>
</html>
