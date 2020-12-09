<?php
require_once 'vendor/autoload.php';

use \Dallgoot\Yaml;

// Load content from content.yml
$yamlContent = Yaml::parseFile("content.yml", 0, 0);

// Include functions
include "res/php/functions.php";

// Render page head
include "components/head.php";

// Render navbar
include "components/navbar.php";

// Render page splash
include "components/splash.php";

// Build rest of site sections
foreach ($yamlContent->sections as $section => $value) {
    if (file_exists("components/sections/" . $value->type . ".php")) {
        include "components/sections/" . $value->type . ".php";
    }
}

// Light / Dark theme toggle
include "components/themetoggle.php"
?>