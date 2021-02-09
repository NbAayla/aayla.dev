<div class="container-fluid p-0">
<section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
    <div class="w-100">
        <h1 class="mb-0"><?php echo $yamlContent->name; ?></h1>
        <? 
        use Michelf\Markdown;
        if ($yamlContent->subheading) {
            echo "<div class='subheading mb-5'>";
            foreach ($yamlContent->subheading as $key=>$value) {
                echo substr(Markdown::defaultTransform($value), 3, -5);
                // Echo a middle dot to separate the elements on all but the last entry to prevent a trailing dot
                if ($key != array_key_last((array) $yamlContent->subheading)) {
                    echo " &middot ";
                }
            }
            echo "</div>";
        }
        ?>
        <p class="lead mb-5"><?php echo $yamlContent->bio; ?></p>

<?php
// Create social media icons
if ($yamlContent->social) {
    echo '<div class="social-icons">';
    foreach ($yamlContent->social as $key=>$value) {
        echo '
        <a class="social-icon" href="' . $value . '">
        <i class="' . $key . '" aria-hidden="true"></i>
        </a>
        ';
    }
    echo '</div>';
}
?>

</div>
</section>