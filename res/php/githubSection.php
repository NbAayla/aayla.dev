<section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="<?php echo $value["Anchor"] ?>">
    <div class="w-100" id="projects">
        <h2 class="mb-5"><?php echo $section; ?></h2>
        <?php
        // Get info from gitlab
        $githubData = json_decode(file_get_contents(
            "https://api.github.com/users/" . $value["User"] . "/repos?sort=updated"), true);
        // Render the projects onto the page
        foreach ($githubData as $project => $data) {
            // Markdown parsing
            include("res/php/githubSectionObject.php");
        }
        ?>
    </div>
</section>