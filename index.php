<?php
    // Load yaml file
    require_once 'vendor/autoload.php';

    use \Dallgoot\Yaml;

    // Load content from content.yml
    $yamlContent = Yaml::parseFile("content.yml", 0, 0);
?>

<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <!-- meta charset -->
        <meta charset="utf-8">
        <!-- site title -->
        <title><?php echo $yamlContent->name->given . " " . $yamlContent->name->surname ?></title>
        <!-- meta description -->
        <meta name="description" content="">
        <!-- mobile viwport meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- fevicon -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        
        <!-- ================================
        CSS Files
        ================================= -->
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i|Open+Sans:400,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="res/css/owl.carousel.min.css">
        <link rel="stylesheet" href="res/css/bootstrap.min.css">
        <link rel="stylesheet" href="res/css/main.css">
        <link rel="stylesheet" href="res/css/dark.css">
        <link id="color-changer" rel="stylesheet" href="res/css/colors/blue.css">
    </head>

    <body class="dark">

        <main class="site-wrapper">
            <div class="pt-table">
                <div class="pt-tablecell page-home relative" style="background-image: url('img/banner.jpg');">
                    <div class="overlay"></div>

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                                <div class="page-title home text-center">
                                    <h2><?php echo $yamlContent->name->given ?> <span class="primary"><?php echo $yamlContent->name->surname ?></span></h2>
                                    <p>
                                        <?php
                                            foreach ($yamlContent->bio as $item) {
                                                echo $item;
                                                if (end($yamlContent->bio) != $item) {
                                                    echo " <b>&middot;</b> ";
                                                }
                                            }
                                        ?>
                                    </p>
                                </div>
                                <div class="hexagon-menu clear">
                                    <?php
                                        foreach ($yamlContent->hexmenu as $key => $value) {
                                            $icon = $value->icon;
                                            $url = $value->url;
                                            include("res/php/hexmenu_item.php");
                                        }
                                    ?>
                                </div>
                            </div> <!-- /.col-xs-12 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->
                </div> <!-- /.pt-tablecell -->
            </div> <!-- /.pt-table -->
        </main> <!-- /.site-wrapper -->
        
        <!-- ================================
        JavaScript Libraries
        ================================= -->
        <script src="js/vendor/jquery-2.2.4.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <!-- <script src="js/jquery.easing.min.js"></script> -->
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/jquery.nicescroll.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery-validation.min.js"></script>
        <script src="js/form.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>