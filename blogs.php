<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Goodrich | Blogs</title>
    <meta name="description" content="Goodrich Cereals">
    <meta name="google-site-verification" content="-C4qU4ARV2TTIFlnq3gbHmetbtm_gOMhTYDRQ-EaJIs">
    <script src="./assets/js/jquery.min.js" async></script>
    <link rel="stylesheet" href="./assets/js/bootstrap/css/bootstrap.css">
    <script src="./assets/js/script.js" async></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <noscript><link rel="stylesheet" href="style.css"></noscript>
    <link rel="stylesheet" href="./assets/css/content-box.css">
    <link rel="stylesheet" href="./assets/css/components.css">
    <link rel="stylesheet" href="./assets/css/image-box.css">
    <link rel="stylesheet" href="./assets/js/php/contact-form.css">
    <link rel="stylesheet" href="./assets/js/magnific-popup.css">
    <link rel="stylesheet" href="./assets/css/animations.css">
    <link rel="stylesheet" href="./assets/js/social.stream.css">
    <link rel="stylesheet" href="./assets/js/flexslider/flexslider.css">
    <link rel="icon" href="./assets/images/logos/logo.png">
    <link rel="stylesheet" href="./assets/css/skin.css">
    <link rel="stylesheet" href="./assets/css/blog-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
</head><?php include_once("includes/connection_inner.php"); ?>

<body class="home">
    <div id="preloader"></div>
    <div class="footer-parallax-container">
        <header class="fixed-top bg-transparent menu-transparent scroll-change wide-area" data-menu-anima="fade-in" id="section-header"></header>
        <div class="header-title ken-burn-center white" data-parallax="scroll" data-position="top" data-natural-height="850" data-natural-width="1920" data-image-src="./assets/images/bg-img/bg-9.jpg">
            <div class="container">
                <div class="title-base">
                    <hr class="anima">
                    <p>Pioneering Excellence across Industries</p>
                    <h1>Blogs</h1>
                </div>
            </div>
        </div>
        <div class="section-empty no-padding-bottom">
            <div class="container content">
                <div class="row">
                    <ol class="breadcrumb" style="font-style: italic">
                        <li><a href="./">Home</a></li>
                        <li class="active">Blogs</li>
                    </ol>
                </div>
                <hr class="space m">
                <div class="row"> <?php $rsData = $Q_obj->BlogsList();
                                    if (count($rsData) > 0) : foreach ($rsData as $key => $record) : $bloglink = (isset($record['external_url']) && $record['external_url'] != null) ? 'href="' . $record['external_url'] . '" target="_blank"' : 'href="blog-detail.html/' . $record['id'] . '"'; ?> <div class="col-md-4">
                                <div class="single-blog-item">
                                    <div class="image"> <a <?php echo $bloglink; ?>> <img loading="lazy" src="<?php echo './assets/uploads/' . $record['attached_file']; ?>" alt="<?php echo $record['title']; ?>"></a>
                                        <div class="date"> <span><?= date("d M, Y", strtotime($record['blog_date'])); ?></span> </div>
                                    </div>
                                    <div class="content">
                                        <h3> <a <?php echo $bloglink; ?>><?php echo $record['title']; ?></a> </h3> <a <?php echo $bloglink; ?> class="blog-btn">Read More +</a>
                                    </div>
                                </div>
                            </div> <?php if ($key % 3 == 2) : ?>
                                <hr class="space m"> <?php endif;
                                                endforeach; ?> <?php else : ?> <div class="col-md-12 alert alert-danger">No Records</div> <?php endif; ?> <!-- <div class="col-md-4"> <div class="single-blog-item"> <div class="image"> <a target="_blank" href="https://www.potatopro.com/news/2023/goodrich-cereals-entered-global-dehydrated-potato-market-splash"> <img loading="lazy" src="./assets/images/blog/press2.png" alt="An aerial view of the Goodrich Potato factory, featuring blue roofs and industrial architecture."> </a> <div class="date"> <span>27 November 2023</span> </div> </div> <div class="content"> <h3> <a target="_blank" href="https://www.potatopro.com/news/2023/goodrich-cereals-entered-global-dehydrated-potato-market-splash"> Goodrich Cereals entered the global dehydrated potato market with a splash</a> </h3> <a target="_blank" href="https://www.potatopro.com/news/2023/goodrich-cereals-entered-global-dehydrated-potato-market-splash" class="blog-btn">Read More +</a> </div> </div> </div> <div class="col-md-4"> <div class="single-blog-item"> <div class="image"> <a target="_blank" href="blog1.html"><img loading="lazy" src="./assets/images/blog/blog1.jpg" alt="Potatoes in a sack with a white flower, representing a bountiful harvest of freshly harvested produce."></a> <div class="date"> <span>7 January 2020</span> </div> </div> <div class="content"> <h3> <a target="_blank" href="blog1.html">Rwanda Pilots ‘Revolutionary’ Potato Seeds</a> </h3> <a target="_blank" href="blog1.html" class="blog-btn">Read More +</a> </div> </div> </div> <hr class="space m"> <div class="col-md-4"> <div class="single-blog-item"> <div class="image"> <a target="_blank" href="blog2.html"><img loading="lazy" src="./assets/images/blog/blog2.jpg" alt="A person holding potatoes - rustic, fresh, and earthy."></a> <div class="date"> <span>24 December 2019</span> </div> </div> <div class="content"> <h3> <a target="_blank" href="blog2.html">New Book to Guide Potato Research and Development</a> </h3> <a target="_blank" href="blog2.html" class="blog-btn">Read More +</a> </div> </div> </div> <div class="col-md-4"> <div class="single-blog-item"> <div class="image"> <a target="_blank" href="blog3.html"><img loading="lazy" src="./assets/images/blog/blog3.jpg" alt="A row of green potato plants growing in the dirt."></a> <div class="date"> <span>10 January 2019</span> </div> </div> <div class="content"> <h3> <a target="_blank" href="blog3.html">New Joint Venture of Agrico and S.V. Agri to Offer High Quality Seed Sotatoes in India</a> </h3> <a target="_blank" href="blog3.html" class="blog-btn">Read More +</a> </div> </div> </div> -->
                </div>
            </div>
            <hr class="space m">
        </div>
    </div> <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
    <footer class="footer-base footer-parallax bg-white" id="section-footer"></footer>
    <link rel="stylesheet" href="./assets/js/iconsmind/line-icons.min.css">
    <script async src="./assets/js/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/js/imagesloaded.min.js"></script>
    <script src="./assets/js/parallax.min.js"></script>
    <script src="./assets/js/flexslider/jquery.flexslider-min.js"></script>
    <script async src="./assets/js/isotope.min.js"></script>
    <script async src="./assets/js/php/contact-form.js"></script>
    <script async src="./assets/js/jquery.progress-counter.js"></script>
    <script async src="./assets/js/jquery.tab-accordion.js"></script>
    <script async src="./assets/js/bootstrap/js/bootstrap.popover.min.js"></script>
    <script async src="./assets/js/jquery.magnific-popup.min.js"></script>
    <script src="./assets/js/social.stream.min.js"></script>
    <script src="./assets/js/header-footer.js"></script>
</body>

</html>