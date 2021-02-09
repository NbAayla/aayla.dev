<html lang="<?php echo $yamlContent->meta->language; ?>">
<head>
<title><?php echo $yamlContent->meta->title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

<?php
// Create slightly different meta tags for each platform because the market system fosters competition that generally
// produces the most efficient allocation of resources.
$metaTags = array(
    $yamlContent->meta->title => array(["title", "og:title", "twitter:title"]),
    $yamlContent->bio => array(["description", "og:description", "twitter:description"]),
    $yamlContent->meta->url => array(["og:url", "twitter:url"]),
    $yamlContent->image => array(["og:image", "twitter:image"]),
    "summary_large_image" => array(["twitter:card"])
);
// Echo the tags
foreach ($metaTags as $value => $tags) {
    foreach (array_values($tags) as $tag_array) {
        foreach($tag_array as $tag) {
            echo '<meta property="' . $tag .'" content="' . $value . '">';
        }
    }
}
?>

<?php
    /*
        ATTENTION: I have minimized the files included from the vendor folders by removing all unused features. While this
        resulted in a massive size reduction, many if not most features will be missing. To restore this functionality,
        please get a fresh copy of the libraries.
    */
?>

<!-- <link rel="stylesheet" href="/res/css/vendor/bootstrap.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" />
<link rel="stylesheet" href="/res/css/vendor/fontawesome.css">
<!-- Custom fonts -->
<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
<!-- Custom styles -->
<link href="/res/css/resume.css" rel="stylesheet">
<link href="/res/css/darktheme.css" rel="stylesheet">
</head>