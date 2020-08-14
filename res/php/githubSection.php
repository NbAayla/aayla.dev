<section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="<?php echo $value["Anchor"] ?>">
    <div class="w-100" id="projects">
        <h2 class="mb-5"><?php echo $section; ?></h2>
        <?php
        // Get info from gitlab
        $ch = curl_init("https://api.github.com/users/" . $value["User"] . "/repos?sort=updated");
        curl_setopt($ch, CURLOPT_USERAGENT, "afetzer.com/1.0");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        $githubData = json_decode($data, true);
        curl_close($ch);
        // Render the projects onto the page
        foreach ($githubData as $project => $data) {
            // Markdown parsing
            include("res/php/githubSectionObject.php");
        }
        ?>
    </div>
</section>