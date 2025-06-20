<?php

class SEO {
    public static function meta($title = '', $description = '') {
        echo "<title>" . htmlspecialchars($title) . "</title>\n";
        echo "<meta name='description' content='" . htmlspecialchars($description) . "' />\n";
    }

    public static function openGraph($title, $description, $image, $url) {
        echo "<meta property='og:title' content='" . htmlspecialchars($title) . "' />\n";
        echo "<meta property='og:description' content='" . htmlspecialchars($description) . "' />\n";
        echo "<meta property='og:image' content='$image' />\n";
        echo "<meta property='og:url' content='$url' />\n";
    }
}
