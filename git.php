
<?php
$output = shell_exec('/usr/bin/git pull 2>&1');
echo "<pre>$output</pre>";
?>
