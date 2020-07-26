<div class="social-icons">
<?php
    foreach ($jsonContent["Social"] as $key=>$value) {
        echo "<a href=\"" . $value["URL"] . "\">";
        echo "<i class=\"" . $value["Fontawesome Class"] . "\" aria-hidden=\"true\" style='align-self: center; padding-top: 30%'></i>";
        echo "</a>";
    }
?>
</div>