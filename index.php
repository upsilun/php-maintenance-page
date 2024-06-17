<?php
    // cURL init
    $url = "https://pastebin.com/raw/______";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    $jsonData = curl_exec($ch);

    if ($jsonData === false) {
        echo 'Error: ' . curl_error($ch);
        exit;
    }
    curl_close($ch);
    $data = json_decode($jsonData, true);

    // Check if "maintenance" is set to true
    if (isset($data['maintenance']) && $data['maintenance'] === true) {
        include 'maintenance.php';
    } else {
        echo "open";
    }
?>
