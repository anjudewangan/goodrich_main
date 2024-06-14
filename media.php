<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="robots" content="index, follow">
  <title>Goodrich | Media</title>
  <meta name="description" content="Explore the latest news and updates on Goodrich Cereals through our media page. Stay informed about our products and events. Visit now!">
  <meta name="keywords" content="Dehydrated potato products, Potato flakes supplier, Potato granules manufacturer, Sustainable potato farming, Air-dried potato pieces, Exporters of dehydrated potatoes, Bulk potato products, Quality potato products India, Potato semolina uses, Industrial potato solutions">
  <meta property="og:image" content="./assets/images/logos/logo.webp">
  <meta property="og:title" content="Goodrich | Media">
  <meta property="og:description" content="Explore the latest news and updates on Goodrich Cereals through our media page. Stay informed about our products and events. Visit now!">
  <meta property="og:url" content="https://goodrichcereals.com/media">
  <meta property="og:site_name" content="Goodrich | Media">
  <meta property="og:type" content="website">
  <link rel="canonical" href="https://goodrichcereals.com/media">
  <meta name="google-site-verification" content="-C4qU4ARV2TTIFlnq3gbHmetbtm_gOMhTYDRQ-EaJIs">
  <script src="./assets/js/jquery.min.js" async></script>
  <link rel="stylesheet" href="./assets/js/bootstrap/css/bootstrap.css">
  <script src="./assets/js/script.js" async></script>
  <link rel="stylesheet" href="./assets/css/style.css">
  <noscript>
    <link rel="stylesheet" href="style.css">
  </noscript>
  <link rel="stylesheet" href="./assets/css/content-box.css">
  <link rel="stylesheet" href="./assets/css/animations.css">
  <link rel="stylesheet" href="./assets/css/components.css">
  <link rel="stylesheet" href="./assets/css/image-box.css">
  <link rel="icon" href="./assets/images/logos/logo.webp">
  <link rel="stylesheet" href="./assets/css/skin.css">
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

<?php include_once("includes/connection_inner.php"); ?>

<body data-spy="scroll" data-target="#menu" data-offset="250">
  <div id="preloader"></div>
  <div class="footer-parallax-container">
    <header class="fixed-top bg-transparent menu-transparent scroll-change wide-area" id="section-header" data-menu-anima="fade-in"></header>
    <div class="header-title ken-burn-center white" data-parallax="scroll" data-bleed="0" data-position="top" data-natural-height="850" data-natural-width="1920" data-image-src="./assets/images/Media/media-bg.webp">
      <div class="container">
        <div class="title-base">
          <hr class="anima">
          <p>Images, Videos and Press Release</p>
          <h1>Media</h1>
        </div>
      </div>
    </div>
    <div class="section-bg-image parallax-window" data-bleed="0" data-natural-height="2500" data-natural-width="1920" data-parallax="scroll" data-image-src="./assets/images/bg-img/bg-4.webp">
      <div class="container content">
        <div class="row">
          <ol class="breadcrumb" style="font-style: italic;">
            <li><a href="./">Home</a></li>
            <li class="active">Media</li>
          </ol>
        </div>
        <hr class="space m">
        <div class="row">
          <div class="col-xs-12 col-lg-3 order-last">
            <div class="fixed-area" data-bottom="150">
              <aside id="menu" class="sidebar mi-menu">
                <nav class="sidebar-nav">
                  <ul class="side-menu">
                    <li class="active">
                      <a class="heading-green" href="#image-galary">
                        <i class="im-camera"></i>
                        Image gallery</a>
                    </li>
                    <li>
                      <a class="heading-green" href="#videos">
                        <i class="im-video"></i>
                        Videos
                      </a>
                    </li>
                  </ul>
                </nav>
              </aside>
            </div>
          </div>
          <div class="col-xs-12 col-lg-9">
            <h3 id="image-galary" class="text-black hidden-sm">Event Images</h3>
            <div class="maso-list list-sm-6 col-margins">
              <div class="navbar navbar-inner">
                <div class="navbar-toggle">
                  <i class="fa fa-bars"></i><span>Choose Event</span><i class="fa fa-angle-down"></i>
                </div>
                <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav over inner maso-filters scroll-spy-menu">
                    <li class="active"><a data-filter="all">All</a></li>
                    <?php
                    $catData = $Q_obj->MediaEventTopList('gallery');
                    if (count($catData) > 0) :
                      foreach ($catData as $recordCat) :
                        echo '<li><a data-filter="cat' . $recordCat['id'] . '">' . $recordCat['type_name'] . '</a></li>';
                      endforeach;
                    endif;
                    ?>
                  </ul>
                </div>
              </div>
              <div class="maso-box row" data-lightbox-anima="fade-top">
                <?php
                $rsData = $Q_obj->Media_GalleryList(1);
                if (count($rsData) > 0) :
                  foreach ($rsData as $key => $record) :
                    $galryid = ($key == 0) ? 'cat' . $record['media_type_id'] : 'cat' . $record['media_type_id'] . ' all';
                    if ((isset($record['attached_file']) && file_exists('./assets/uploads/' . $record['attached_file']))) :
                ?>
                      <div data-sort="<?php echo $record['photo_sorting']; ?>" class="maso-item col-md-6 <?php echo $galryid; ?>">
                        <div class="img-box adv-img adv-img-full-content">
                          <div class="img-box">
                            <img loading="lazy" src="<?php echo './assets/uploads/' . $record['attached_file']; ?>" alt="<?php echo $record['photo_title']; ?>">
                          </div>
                          <a href="#" class="caption-bg img-box">
                            <div class="caption">
                              <div class="inner">
                                <p class="sub"><?php echo $record['type_name']; ?></p>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                <?php endif;
                  endforeach;
                endif; ?>

                <div class="clear"></div>
              </div>
            </div>
            <hr class="space">
            <h3 id="videos" class="text-black hidden-sm">Videos</h3>
            <div class="navbar navbar-inner">
              <div class="navbar-toggle">
                <i class="fa fa-bars"></i><span>Choose Video</span><i class="fa fa-angle-down"></i>
              </div>
              <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav2 over inner maso-filters scroll-spy-menu">
                  <li class="active"><a data-filter="all">All</a></li>
                  <?php
                  $catvData = $Q_obj->MediaEventTopList('video');
                  if (count($catvData) > 0) :
                    foreach ($catvData as $recordVCat) :
                      echo '<li><a data-filter="cat' . $recordVCat['id'] . '">' . $recordVCat['type_name'] . '</a></li>';
                    endforeach;
                  endif;
                  ?>
                </ul>
              </div>
              <div id="video-section">
                <div class="row">
                  <?php
                  $rsVideoData = $Q_obj->Media_VideoList(1);
                  if (count($rsVideoData) > 0) :
                    foreach ($rsVideoData as $recordVideo) :
                  ?>
                      <div class="col-md-6 cat<?php echo $recordVideo['media_type_id']; ?> all video-sec" data-sort="<?php echo $recordVideo['video_sorting']; ?>">
                        <iframe class="media-video" src="<?php echo $recordVideo['video_url']; ?>" title="<?php echo $recordVideo['video_title']; ?>" allowfullscreen></iframe>
                      </div>
                  <?php
                    endforeach;
                  endif;
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
  <footer class="footer-base footer-parallax" id="section-footer"></footer>
  <link rel="stylesheet" href="./assets/js/iconsmind/line-icons.min.css">
  <script async src="./assets/js/bootstrap/js/bootstrap.min.js"></script>
  <script src="./assets/js/imagesloaded.min.js"></script>
  <script src="./assets/js/isotope.min.js"></script>
  <script src="./assets/js/parallax.min.js"></script>
  <script src="./assets/js/smooth.scroll.min.js"></script>
  <script src="./assets/js/header-footer.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const tabLinks = document.querySelectorAll(".nav.navbar-nav2 a");
      const videoSection = document.getElementById("video-section");
      const tabContents = videoSection.querySelectorAll(".video-sec");

      tabLinks.forEach(function(tab) {
        tab.addEventListener("click", function(e) {
          e.preventDefault();

          // Remove 'active' class from all tab links
          tabLinks.forEach(function(link) {
            link.classList.remove("active");
          });

          // Add 'active' class to the clicked tab link
          tab.classList.add("active");

          const target = this.getAttribute("data-filter");

          // Hide all tab contents in video section
          tabContents.forEach(function(content) {
            content.style.display = "none";
          });

          // Display the tab content corresponding to the clicked link in video section
          if (target === "all") {
            tabContents.forEach(function(content) {
              content.style.display = "block";
            });
          } else {
            videoSection.querySelectorAll("." + target).forEach(function(content) {
              content.style.display = "block";
            });
          }
        });
      });
    });
  </script>
</body>

</html>