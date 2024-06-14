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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="robots" content="index, follow">
  <title>Blogs | <?php echo $rsData[0]['title']; ?></title>
  <meta name="description" content="Get inspired by our blog featuring a range of tasty cereal recipes and breakfast tips. Start your day off right with Goodrich Cereals.">
  <meta name="keywords" content="Dehydrated potato products, Potato flakes supplier, Potato granules manufacturer, Sustainable potato farming, Air-dried potato pieces, Exporters of dehydrated potatoes, Bulk potato products, Quality potato products India, Potato semolina uses, Industrial potato solutions">
  <meta property="og:image" content="./assets/images/logos/logo.webp">
  <meta property="og:title" content="Goodrich | Blog Detail">
  <meta property="og:description" content="Get inspired by our blog featuring a range of tasty cereal recipes and breakfast tips. Start your day off right with Goodrich Cereals.">
  <meta property="og:url" content="https://goodrichcereals.com/blogs">
  <meta property="og:site_name" content="Goodrich | Blog Detail">
  <meta property="og:type" content="website">
  <link rel="canonical" href="https://goodrichcereals.com/blogs">
  <meta name="google-site-verification" content="-C4qU4ARV2TTIFlnq3gbHmetbtm_gOMhTYDRQ-EaJIs">
  <script src="../assets/js/jquery.min.js "></script>
  <link rel="stylesheet" href="../assets/js/bootstrap/css/bootstrap.css">
  <script src="../assets/js/script.js"></script>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <link rel="stylesheet" href="../assets/css/content-box.css">
  <link rel="stylesheet" href="../assets/css/animations.css">
  <link rel="stylesheet" href="../assets/css/skin.css">
  <link rel="icon" href="../assets/images/logos/logo.webp">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
  <script type="application/ld+json" src="./assets/js/schema.json"></script>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-0S50EB0MZY"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-0S50EB0MZY');
  </script>
</head>

<body>
  <div id="preloader"></div>
  <div class="footer-parallax-container">
    <header class="fixed-top bg-transparent menu-transparent scroll-change wide-area" data-menu-anima="fade-in" id="section-header"></header>
    <div class="header-title ken-burn white " data-parallax="scroll" data-bleed="0" data-position="top" data-natural-height="850" data-natural-width="1920" data-image-src="../assets/images/bg-img/bg-9.webp">
      <div class="container">
        <div class="title-base">
          <hr class="anima">
          <p>Pioneering Excellence across Industries</p>
          <h1>Blogs</h1>
        </div>
      </div>
    </div>
    <div class="section-bg-color">
      <div class="container content">
        <div class="row">
          <ol class="breadcrumb" style="font-style: italic;">
            <li><a href="../">Home</a></li>
            <li><a href="../blogs">Blogs</a></li>
            <li class="active"><?php echo htmlspecialchars($rsData[0]['title'], ENT_QUOTES, 'UTF-8'); ?></li>
          </ol>
        </div>
        <hr class="space m">
        <div class="row blog-container">
          <div class="col-md-10 col-center boxed-inverse shadow-2 big-padding text-center">
            <div class="title-base">
              <hr>
              <h2><?php echo htmlspecialchars($rsData[0]['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
            </div>
            <img src="<?php echo htmlspecialchars('../assets/uploads/' . $rsData[0]['attached_file'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($rsData[0]['title'], ENT_QUOTES, 'UTF-8'); ?>">
            <?php echo $rsData[0]['blog_description']; ?>
            <hr class="space">
          </div>
        </div>
      </div>
    </div>

  </div>
  <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
  <footer class="footer-base footer-parallax bg-white" id="section-footer"></footer>
  <link property="" rel="stylesheet" href="../assets/js/iconsmind/line-icons.min.css">
  <script async src="../assets/js/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/js/parallax.min.js"></script>
  <script src="../assets/js/blog-header-footer.js"></script>
</body>

</html>