<div class="container-fluid p-0">
<section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
    <div class="w-100">
        <h1 class="mb-0"><?php echo $yamlContent->name; ?></h1>
        <div class="subheading mb-5">
            <a href="mailto:<?php echo $yamlContent->email; ?>" aria-hidden="true"><?php echo $yamlContent->email; ?></a>
        </div>
        <p class="lead mb-5"><?php echo $yamlContent->bio; ?></p>

<?php
// Create social media icons
if ($yamlContent->social) {
    echo '<div class="social-icons">';
    foreach ($yamlContent->social as $key=>$value) {
        echo '
        <a class="social-icon" href="' . $value . '">
        <i class="fab fa-' . slugify($key) . '" aria-hidden="true"></i>
        </a>
        ';
    }
    echo '</div>';
}
?>

</div>
</section>