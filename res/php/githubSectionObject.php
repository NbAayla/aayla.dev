<?php
include_once("res/php/php-markdown/Michelf/Markdown.inc.php");
use Michelf\Markdown;
$HtmlDescription = Markdown::defaultTransform($data["description"]);
?>
<div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5" id="gitlab-template">
    <div class="resume-content">
        <h3 class="mb-0"><a href="<?php echo $data["html_url"]; ?>"><?php echo $data["full_name"]; ?></a></h3>
        <div class="subheading mb-3"><?php echo $HtmlDescription; ?></div>
    </div>
</div>