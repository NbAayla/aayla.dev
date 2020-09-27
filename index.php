<?php

set_error_handler(function($errno, $error_str, $error_file, $error_line) {
    // error was suppressed with the @-operator
    if (0 === error_reporting()) {
        return false;
    }
    throw new ErrorException($error_str, 0, $errno, $error_file, $error_line);
});

// Import requirements
try {
    include_once("res/php/php-markdown/Michelf/Markdown.inc.php");
} catch (Exception $e) {
    shell_exec("/usr/bin/git submodule update --init --recursive");
}
include_once("res/php/php-markdown/Michelf/Markdown.inc.php");
use Michelf\Markdown;

// Load page content
$jsonContent = json_decode(
    file_get_contents("content.json"), true
);

// Start the file
echo '
<html lang="' . $jsonContent["Meta"]["Language"] . '">
<head><title>' . $jsonContent["Meta"]["Title"] . '</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
';

// Get URL for profile image
$imageUrl = $jsonContent["Meta"]["URL"] . "/" . $jsonContent["Image"];
// Split name for style
$splitName = explode(" ", $jsonContent["Name"]);

// Create slightly different meta tags for each platform because the market system fosters competition that generally
// produces the most efficient allocation of resources.
$metaTags = array(
    $jsonContent["Meta"]["Title"] => array(["title", "og:title", "twitter:title"]),
    $jsonContent["Bio"] => array(["description", "og:description", "twitter:description"]),
    $jsonContent["Meta"]["URL"] => array(["og:url", "twitter:url"]),
    $imageUrl => array(["og:image", "twitter:image"]),
    "summary_large_image" => array(["twitter:card"])
);
// Create the meta tags
foreach ($metaTags as $value => $tags) {
    foreach (array_values($tags) as $tag_array) {
        foreach($tag_array as $tag) {
            echo '<meta property="' . $tag .'" content="' . $value . '">';
        }
    }
}

// Build rest of head and start of body
echo '
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />
<!-- Custom fonts for this template -->
<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous" />
<!-- Custom styles for this template -->
<link href="/res/css/resume.css" rel="stylesheet">
</head>
<body id="page-top">
';

// Build navbar
echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none">' . $jsonContent["Name"] . '</span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="' . $imageUrl . '" alt="">
      </span>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#page-top">About</a>
          </li>
';
// Build links to sections
foreach ($jsonContent["Sections"] as $section => $key) {
    echo '
        <li class="nav-item">
            <a class="nav-link" href="#' . $key["Anchor"] . '">' . $section . '</a>
        </li>
    ';
}
echo '</ul></div></nav>';

// Build site splash
echo '
    <div class="container-fluid p-0">
        <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
          <div class="w-100">
            <h1 class="mb-0">' . $splitName[0] . '
              <span class="text-primary">' . $splitName[1] . '</span>
            </h1>
            <div class="subheading mb-5">
              <a href="mailto:' . $jsonContent["Email"] . '" aria-hidden="true">' . $jsonContent["Email"] . '</a>
            </div>
            <p class="lead mb-5">' . $jsonContent["Bio"] . '</p>
';

// Build Social Media Icons
if ($jsonContent["Social"]) {
    echo '<div class="social-icons">';
    foreach ($jsonContent["Social"] as $key=>$value) {
        echo '
        <a class="social-icon" href="' . $value["URL"] . '">
        <i class="' . $value["Fontawesome Class"] . '" aria-hidden="true"></i>
        </a>
        ';
    }
    echo '</div>';
}

// Close splash section
echo '</div></section>';

// Build rest of site content
foreach ($jsonContent["Sections"] as $section => $value) {
    echo '
<hr class="m-0">
<section id="' . $value["Anchor"] . '" class="resume-section p-3 p-lg-5 d-flex align-items-center">
<div class="w-100">
<h2 class="mb-5">' . $section . '</h2>
';
    switch ($value["Type"]) {
        case "Experience":
            foreach ($value["Content"] as $key => $value) {
                echo '
                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">';
                if (array_key_exists("Title", $value)) {
                    echo '<h3 class="mb-0">' . $value["Title"] . '</h3>';
                }
                if (array_key_exists("Subtitle", $value)) {
                    echo '<div class="subheading mb-3">' . $value["Subtitle"] . '</div>';
                }
                if (array_key_exists("Roles", $value)) {
                    echo '<ul>';
                    foreach ($value["Roles"] as $rolesKey => $rolesValue) {
                        $rolesValue = Markdown::defaultTransform($rolesValue);
                        echo "<li>" . strip_tags($rolesValue, '<a>') . "</li>";
                    }
                    echo '</ul>';
                }
                if (array_key_exists("Date Range", $value)) {
                    echo '
                                </div><div class="resume-date text-md-right">
                                    <span class="text-primary">' . $value["Date Range"] . '</span>
                                </div>';
                }
                echo '</div>';
            }
            break;
        case "Links":
            echo '<ul class="fa-ul mb-0">';
            foreach ($value["Content"] as $key => $newValue) {
                echo '
                    <li>
                        <a href="' . $newValue["URL"] . '">
                            <i class="' . $newValue["Icon"] . '" style="padding-right: 1em;"></i>' . $newValue["Title"] . '
                        </a>
                    </li>
                ';
            }
            echo '</ul>';
            break;
        case "Github":
            // Get info from gitlab
            $ch = curl_init("https://api.github.com/users/" . $value["User"] . "/repos?sort=updated");
            curl_setopt($ch, CURLOPT_USERAGENT, "afetzer.com/1.0");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            $githubData = json_decode($data, true);
            curl_close($ch);
            // Render the projects onto the page
            foreach ($githubData as $project => $data) {
                $HtmlDescription = Markdown::defaultTransform($data["description"]);
                echo '
                    <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="resume-content">
                            <h3 class="mb-0"><a href="' . $data["html_url"] . '">' . $data["full_name"] . '</a></h3>
                            <div class="subheading mb-3">' . $HtmlDescription . '</div>
                        </div>
                    </div>
                ';
            }
            break;
    }
    echo '</div></section>';
}
echo '</div></body></html>';