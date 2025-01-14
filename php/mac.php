<?php

$ip = $_GET['ip'];

$url = "http://ip-api.com/json/$ip";

$response = file_get_contents($url);
$response = json_decode($response, true);

$lat = $response['lat'];
$lon = $response['lon'];

echo "IP: " . $response["query"] . '<br/>';
echo "Mamlakat: " . $response["country"] . '<br/>';
echo 'Shahar: ' . $response['city'] . '<br/>';
echo "Manzil: " . "<a href=\"https://www.google.com/maps?q=$lat,$lon\" target=\"_blank\">Google Maps</a> <br/>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <iframe id="map" src="https://www.google.com/maps?q=<?php echo $lat; ?>,<?php echo $lon; ?>&output=embed"
        frameborder="0" style="border:0" allowfullscreen></iframe>

    <style>
        iframe {
            width: 100%;
            height: 50vh;
        }
    </style>
</body>

</html>