<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none"><?php echo $yamlContent->name; ?></span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?php echo $yamlContent->image; ?>" alt="">
      </span>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#page-top">About</a>
          </li>
<?php

// Create section links
foreach ($yamlContent->sections as $section => $key) {
    echo '
        <li class="nav-item">
            <a class="nav-link" href="#' . slugify($section) . '">' . $section . '</a>
        </li>
    ';
}
echo '</ul></div></nav>';

?>