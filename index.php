<?php
    $jsonFile = fopen("en.json", "r") or die("Unable to read JSON content!");
    $jsonString = fread($jsonFile, filesize("en.json"));
    fclose($jsonFile);
    $jsonContent = json_decode($jsonString, true);
    $splitName = explode(" ", $jsonContent["Name"]);

//    error_reporting(E_ALL | E_STRICT);
//    ini_set('display_errors', 1);
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
    include("res/php/metaTags.php");
    ?>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous" />

  <!-- Custom styles for this template -->
  <link href="/res/css/resume.css" rel="stylesheet">
</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none"><?= $jsonContent["Name"]; ?></span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="/res/img/profile.jpg" alt="">
      </span>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#page-top">About</a>
          </li>
          <?php
            foreach ($jsonContent["Sections"] as $section => $key) {
                echo "<li class=\"nav-item\">";
                echo "<a class=\"nav-link js-scroll-trigger\" href=\"#" . $key["Anchor"] . "\">$section</a>";
                echo "</li>";
            }
          ?>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="w-100">
        <h1 class="mb-0"><?php echo $splitName[0]; ?>
          <span class="text-primary"><?php echo $splitName[1]; ?></span>
        </h1>
        <div class="subheading mb-5">
          <a href="<?php echo $jsonContent["Email"]; ?>" aria-hidden="true"><?php echo $jsonContent["Email"]; ?></a>
        </div>
        <p class="lead mb-5">
            <?php
                if ($jsonContent["Bio"]) {
                    echo $jsonContent["Bio"];
                }
            ?>
        </p>
        <?php
        if ($jsonContent["Social"]) {
            include("res/php/socialIcons.php");
        }
        ?>
      </div>
    </section>

      <?php
        foreach ($jsonContent["Sections"] as $section => $value) {
            switch ($value["Type"]) {
                case "Experience":
                    include("res/php/experienceSection.php");
                    break;
                case "Links":
                    include("res/php/linkSection.php");
                    break;
                case "Gitlab":
                    include("res/php/gitlabSection.php");
                    break;
            }
        }
      ?>

  </div>
</body>
</html>
