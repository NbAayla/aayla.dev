<section class="resume-section" id="awards">
<div class="resume-section-content" id="<?php echo slugify($section); ?>">
<h2 class="mb-5"><?php echo $section; ?></h2>
<ul class="fa-ul mb-0">
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