<section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="<?php echo $value["Anchor"] ?>">
    <div class="w-100">
        <h2 class="mb-5"><?php echo $section; ?></h2>
        <ul class="fa-ul mb-0">
            <?php foreach ($value["Content"] as $key => $newValue) {
                include("res/php/linkSectionObject.php");
            } ?>
        </ul>
    </div>
</section>
<hr class="m-0">