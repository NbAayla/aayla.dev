<hr class="m-0">
<section id="<?php echo slugify($section); ?>" class="resume-section p-3 p-lg-5 d-flex align-items-center">
<div class="w-100">
<h2 class="mb-5"><?php echo $section; ?></h2>

<?php
foreach ($value->content as $key => $sectionValue) {
    echo "<li>";
    // Test if a URL is provided
    if (isset($sectionValue->url)) {
        echo "<a href='$sectionValue->url'>";
    }
    echo "
    <span class='fa-li'>
    <i class='$sectionValue->fontawesome'></i>
    </span>
    $key
    </li>";
    if (isset($sectionValue->url)) {
        echo "</a>";
    }
}
?>
</div>
</section>