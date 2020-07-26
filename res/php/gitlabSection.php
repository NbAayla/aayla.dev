<section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="<?php echo $value["Anchor"] ?>">
    <div class="w-100" id="projects">
        <h2 class="mb-5"><?php echo $section; ?></h2>
        <?php
        // Get info from gitlab
        $gitlabData = json_decode(file_get_contents(
            "https://gitlab.com/api/v4/users/" . $value["User"] . "/projects?order_by=last_activity_at"), true);
        // Render the projects onto the page
        foreach ($gitlabData as $project => $data) {
            include("res/php/gitlabSectionObject.php");
        }
        ?>
    </div>
</section>