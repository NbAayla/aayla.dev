<hr class="m-0">
<section id="<?php echo slugify($section); ?>" class="resume-section p-3 p-lg-5 d-flex align-items-center">
<div class="w-100">
<h2 class="mb-5"><?php echo $section; ?></h2>
<?php
use Michelf\Markdown;
// Render content
foreach ($value->content as $key => $sectionValue) {
    echo(
        Markdown::defaultTransform($sectionValue)
    );
}
?>
</div>
</section>