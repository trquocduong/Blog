<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newColor = $_POST["main_color"];
    $configPath = __DIR__ . '/../../../theme.json';
    $config = json_decode(file_get_contents($configPath), true);
    $config['main_color'] = $newColor;
    file_put_contents($configPath, json_encode($config, JSON_PRETTY_PRINT));
    header("Location: /");
    exit;
}
