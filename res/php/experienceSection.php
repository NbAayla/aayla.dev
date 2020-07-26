<hr class="m-0">
<section id="<?php echo $value["Anchor"] ?>" class="resume-section p-3 p-lg-5 d-flex justify-content-center">
    <div class="w-100">
        <h2 class="mb-5"><?php echo $section; ?></h2>
        <?php
            foreach ($value["Content"] as $key => $value) {
                include("res/php/experienceObject.php");
            }
        ?>
    </div>
</section>