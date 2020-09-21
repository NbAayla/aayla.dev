<div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
    <div class="resume-content">
        <?php
            if (array_key_exists("Title", $value)) {
                echo '<h3 class="mb-0">' . $value["Title"] . '</h3>';
            }
            if (array_key_exists("Subtitle", $value)) {
                echo '<div class="subheading mb-3">' . $value["Subtitle"] . '</div>';
            }
            use Michelf\Markdown;
            if (array_key_exists("Roles", $value)) {
                echo '<ul>';
                foreach ($value["Roles"] as $rolesKey => $rolesValue) {
                    $rolesValue = Markdown::defaultTransform($rolesValue);
                    echo "<li>" . strip_tags($rolesValue, '<a>') . "</li>";
                }
                echo '</ul>';
            }
            if (array_key_exists("Date Range", $value)) {
                echo '
                </div><div class="resume-date text-md-right">
                    <span class="text-primary">' . $value["Date Range"] . '</span>
                </div>';
            }
        ?>
</div>