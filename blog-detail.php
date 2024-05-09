<?php include_once("includes/connection_inner.php");

$rsData = $Q_obj->getRecords('blogs', $_GET['id']);
if (count($rsData) == 0) :
  header("Location: ../");
  exit;
endif;

if ($rsData[0]['external_url'] != null) :
  header("Location: ../");
  exit;
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Blogs | <?php echo $rsData[0]['title']; ?></title>
  <meta name="description" content="Goodrich Cereals" />
  <script src="../assets/js/jquery.min.js "></script>
  <link rel="stylesheet" href="../assets/js/bootstrap/css/bootstrap.css" />
  <script src="../assets/js/script.js"></script>
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="stylesheet" href="../assets/css/components.css" />
  <link rel="stylesheet" href="../assets/css/content-box.css" />
  <link rel="stylesheet" href="../assets/js/social.stream.css" />
  <link rel="stylesheet" href="../assets/css/animations.css" />
  <link rel="stylesheet" href="../assets/js/flexslider/flexslider.css" />
  <link rel="stylesheet" href="../assets/js/php/contact-form.css" />
  <link rel="stylesheet" href="../assets/css/skin.css" />
  <link rel="icon" href="../assets/images/logos/logo.png" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>
  <div id="preloader"></div>
  <div class="footer-parallax-container">
    <header class="fixed-top bg-transparent menu-transparent scroll-change wide-area" data-menu-anima="fade-in" id="section-header"></header>
    <div class="header-title ken-burn white " data-parallax="scroll" data-bleed="0" data-position="top" data-natural-height="850" data-natural-width="1920" data-image-src="../assets/images/bg-img/bg-9.jpg">
      <div class="container">
        <div class="title-base">
          <hr class="anima" />
          <p>Pioneering Excellence across Industries</p>
          <h1>Blogs</h1>
        </div>
      </div>
    </div>
    <div class="section-bg-color">
      <div class="container content">
        <div class="row">
          <ol class="breadcrumb" style="font-style: italic">
            <li><a href="../">Home</a></li>
            <li><a href="../blogs.html">Blogs</a></li>
            <li class="active"><?php echo $rsData[0]['title']; ?></li>
          </ol>
        </div>
        <hr class="space m">
        <div class="row blog-container">
          <div class="col-md-10 col-center boxed-inverse shadow-2 big-padding text-center">
            <div class="title-base">
              <hr />
              <h2><?php echo $rsData[0]['title']; ?></h2>
            </div>
            <img src="<?php echo '../assets/uploads/' . $rsData[0]['attached_file']; ?>" alt="<?php echo $rsData[0]['title']; ?>" />
            <?= $rsData[0]['blog_description']; ?>
            <hr class="space" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
  <footer class="footer-base footer-parallax bg-white" id="section-footer"></footer>
  <link property="" rel="stylesheet" href="../assets/js/iconsmind/line-icons.min.css" />
  <script async src="../assets/js/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/js/imagesloaded.min.js"></script>
  <script src="../assets/js/jquery.progress-counter.js"></script>
  <script src="../assets/js/parallax.min.js"></script>
  <script src="../assets/js/flexslider/jquery.flexslider-min.js"></script>
  <script src="../assets/js/social.stream.min.js"></script>
  <script src="../assets/js/jquery.tab-accordion.js"></script>
  <script src="../assets/js/smooth.scroll.min.js"></script>
  <script src="../assets/js/blog-header-footer.js"></script>
</body>

</html>