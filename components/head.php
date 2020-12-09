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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />
<!-- Custom fonts for this template -->
<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous" />
<!-- Custom styles for this template -->
<link href="/res/css/resume.css" rel="stylesheet">
<link href="/res/css/darktheme.css" rel="stylesheet">
</head>