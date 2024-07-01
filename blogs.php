<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Goodrich Cereals Blogs | Insights, Recipes & Industry News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="index, follow">
    <meta name="description" content="Explore Goodrich Cereals' blog for insightful articles, recipes featuring premium dehydrated potato products, and the latest industry news.">
    <meta name="keywords" content="Dehydrated Potato Products Blog, Goodrich Cereals Recipes, Potato Product News, Food Industry Insights, Premium Potato Recipes, Industry Trends Blog, Potato Product Innovations, Goodrich Cereals Updates, Food Manufacturing Blog, Potato Processing News">
    <meta property="og:image" content="./assets/images/logos/logo.webp">
    <meta property="og:title" content="Goodrich Cereals Blogs | Insights, Recipes & Industry News">
    <meta property="og:description" content="Explore Goodrich Cereals' blog for insightful articles, recipes featuring premium dehydrated potato products, and the latest industry news.">
    <meta property="og:url" content="https://www.goodrichcereals.com/blogs">
    <meta property="og:site_name" content="Goodrich Cereals Blogs | Insights, Recipes & Industry News">
    <meta property="og:type" content="website">
    <meta name="google-site-verification" content="-C4qU4ARV2TTIFlnq3gbHmetbtm_gOMhTYDRQ-EaJIs">
    <link rel="canonical" href="https://www.goodrichcereals.com/blogs">
    <link rel="icon" href="./assets/images/logos/logo.webp">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/logos/apple-touch-icon.webp">
    <link rel="canonical" href="https://www.goodrichcereals.com/blogs">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" integrity="sha512-i8+QythOYyQke6XbStjt9T4yQHhhM+9Y9yTY1fOxoDQwsQpKMEpIoSQZ8mVomtnVCf9PBvoQDnKl06gGOOD19Q==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="preload" href="./assets/css/style.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="./assets/css/style.css">
    </noscript>
    <link rel="stylesheet" href="./assets/css/content-box.css">
    <link rel="stylesheet" href="./assets/css/image-box.css">
    <link rel="stylesheet" href="./assets/css/skin.css">
    <link rel="stylesheet" href="./assets/js/iconsmind/line-icons.min.css">
    <!-- Preload the LCP image with a high fetchpriority so it starts loading with the stylesheet. -->
    <link rel="preload" as="image" href="./assets/images/bg-img/bg-9.webp" type="image/webp">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="./assets/js/script.js" defer></script>
    <script type="application/ld+json" src="./assets/js/product-schema.json" defer></script>
    <!-- Google tag (gtag.js) -->
    <script src="https://www.googletagmanager.com/gtag/js?id=G-0S50EB0MZY" defer></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-0S50EB0MZY');
    </script>
</head><?php include_once("includes/connection_inner.php"); ?>

<body class="home">
    <div id="preloader"></div>
    <div class="footer-parallax-container">
        <header class="fixed-top bg-transparent menu-transparent scroll-change wide-area" data-menu-anima="fade-in" id="section-header"></header>
        <div class="header-title ken-burn-center white" data-parallax="scroll" data-position="top" data-natural-height="850" data-natural-width="1920" data-image-src="./assets/images/bg-img/bg-9.webp">
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
                                    if (count($rsData) > 0) : foreach ($rsData as $key => $record) : $bloglink = (isset($record['external_url']) && $record['external_url'] != null) ? 'href="' . $record['external_url'] . '" target="_blank"' : 'href="blog-detail/' . $record['id'] . '"'; ?> <div class="col-md-4">
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
                                                endforeach; ?> <?php else : ?> <div class="col-md-12 alert alert-danger">No Records</div> <?php endif; ?> <!-- <div class="col-md-4"> <div class="single-blog-item"> <div class="image"> <a target="_blank" href="https://www.potatopro.com/news/2023/goodrich-cereals-entered-global-dehydrated-potato-market-splash"> <img loading="lazy" src="./assets/images/blog/press2.webp" alt="An aerial view of the Goodrich Potato factory, featuring blue roofs and industrial architecture."> </a> <div class="date"> <span>27 November 2023</span> </div> </div> <div class="content"> <h3> <a target="_blank" href="https://www.potatopro.com/news/2023/goodrich-cereals-entered-global-dehydrated-potato-market-splash"> Goodrich Cereals entered the global dehydrated potato market with a splash</a> </h3> <a target="_blank" href="https://www.potatopro.com/news/2023/goodrich-cereals-entered-global-dehydrated-potato-market-splash" class="blog-btn">Read More +</a> </div> </div> </div> <div class="col-md-4"> <div class="single-blog-item"> <div class="image"> <a target="_blank" href="blog1"><img loading="lazy" src="./assets/images/blog/blog1.webp" alt="Potatoes in a sack with a white flower, representing a bountiful harvest of freshly harvested produce."></a> <div class="date"> <span>7 January 2020</span> </div> </div> <div class="content"> <h3> <a target="_blank" href="blog1">Rwanda Pilots ‘Revolutionary’ Potato Seeds</a> </h3> <a target="_blank" href="blog1" class="blog-btn">Read More +</a> </div> </div> </div> <hr class="space m"> <div class="col-md-4"> <div class="single-blog-item"> <div class="image"> <a target="_blank" href="blog2"><img loading="lazy" src="./assets/images/blog/blog2.webp" alt="A person holding potatoes - rustic, fresh, and earthy."></a> <div class="date"> <span>24 December 2019</span> </div> </div> <div class="content"> <h3> <a target="_blank" href="blog2">New Book to Guide Potato Research and Development</a> </h3> <a target="_blank" href="blog2" class="blog-btn">Read More +</a> </div> </div> </div> <div class="col-md-4"> <div class="single-blog-item"> <div class="image"> <a target="_blank" href="blog3"><img loading="lazy" src="./assets/images/blog/blog3.webp" alt="A row of green potato plants growing in the dirt."></a> <div class="date"> <span>10 January 2019</span> </div> </div> <div class="content"> <h3> <a target="_blank" href="blog3">New Joint Venture of Agrico and S.V. Agri to Offer High Quality Seed Sotatoes in India</a> </h3> <a target="_blank" href="blog3" class="blog-btn">Read More +</a> </div> </div> </div> -->
                </div>
            </div>
            <hr class="space m">
        </div>
    </div> <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
    <footer class="footer-base footer-parallax bg-white" id="section-footer"></footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax.js/1.4.2/parallax.min.js" integrity="sha512-Hr4vRkx/ftAu39Bbzt2vboiggxVCtqqLwU+eLdo7jpYFJQHdwYYoE5nVNN3Oe1910B3u5JZvcxWhOEA4T6tkwg==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="./assets/js/header-footer.js" defer></script>
</body>

</html>