<hr class="m-0">
<section id="<?php echo slugify($section); ?>" class="resume-section p-3 p-lg-5 d-flex align-items-center">
<div class="w-100">
<h2 class="mb-5"><?php echo $section; ?></h2>

<?php
use Michelf\Markdown;
// Render experience content
foreach ($value["content"] as $key => $value) {
    echo '<div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
    <div class="resume-content">';
    // Title
    echo '<h3 class="mb-0">' . $key . '</h3>';
    // Company
    if (array_key_exists("subtitle", $value)) {
        echo '<div class="subheading mb-3">' . $value["subtitle"] . '</div>';
    }
    // Roles
    if (array_key_exists("roles", $value)) {
        echo '<ul>';
        foreach ($value['roles'] as $roleValue) {
            $roleValue = Markdown::defaultTransform($roleValue);
            // Remove <p> tags
            $roleValue = substr($roleValue, 3, -2);
            echo "<li>" . $roleValue . "</li>";
        }
    }
    // Date Range
    if (array_key_exists("date range", $value)) {
        echo '</div><div class="resume-date text-md-right">
        <span class="text-primary">' . $value["date range"] . '</span></div>';
    }
    echo '</div>';
}
?>

</section>