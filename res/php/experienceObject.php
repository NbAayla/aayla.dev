<div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
    <div class="resume-content">
        <h3 class="mb-0"><?php echo $value["Title"] ?></h3>
        <div class="subheading mb-3"><?php echo $value["Subtitle"] ?></div>
        <ul>
            <?php
                foreach ($value["Roles"] as $rolesKey => $rolesValue) {
                    echo "<li>" . $rolesValue . "</li>";
                }
            ?>
        </ul>
    </div>
    <div class="resume-date text-md-right">
        <span class="text-primary"><?php echo $value["Date Range"] ?></span>
    </div>
</div>