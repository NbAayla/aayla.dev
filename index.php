<?php
// Load content from content.yml
$yamlContent = yaml_parse(
    file_get_contents("content.yml")
);

// Include functions
include "res/php/functions.php";
include_once "res/php/php-markdown/Michelf/Markdown.inc.php";

// Render page head
include "components/head.php";

// Render navbar
include "components/navbar.php";

// Render page splash
include "components/splash.php";

// Build rest of site sections
foreach ($yamlContent["sections"] as $section => $value) {
    if (file_exists("components/sections/" . $value["type"] . ".php")) {
        include "components/sections/" . $value["type"] . ".php";
    }
}
?>
</div>

<div class="themetoggle social-icons">
    <a class="social-icon" onclick="toggleDark();">
        <i class="fas fa-moon" id="theme-toggle"></i>
    </a>
</div>

<noscript>
<style>
.themetoggle {
    display: none;
}
</style>
</noscript>
<script>
function toggleDark() {
    for (let tag of ["a", "body", "h1", "h2", "h3"]) {
        for (let item of document.getElementsByTagName(tag)) { 			 		
            item.classList.toggle("darktheme"); 
        }
    }
    let toggle = document.getElementById("theme-toggle");
    if (toggle.classList[1] == "fa-moon") {
        toggle.classList.replace("fa-moon", "fa-sun");
    } else {
        toggle.classList.replace("fa-sun", "fa-moon");
    }
}
if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    toggleDark();
}

</script>
</body>
</html>