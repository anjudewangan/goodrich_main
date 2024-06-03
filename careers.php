<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Goodrich | Careers</title>
    <meta name="description" content="Discover rewarding career paths at Goodrich Cereals. We offer a range of opportunities in the cereal industry. Apply today and be part of our success story.">
  <meta name="keywords" content="Dehydrated potato products, Potato flakes supplier, Potato granules manufacturer, Sustainable potato farming, Air-dried potato pieces, Exporters of dehydrated potatoes, Bulk potato products, Quality potato products India, Potato semolina uses, Industrial potato solutions">
  <meta property="og:image" content="./assets/images/logos/logo.webp">
  <meta property="og:title" content="Goodrich | Careers">
  <meta property="og:description" content="Discover rewarding career paths at Goodrich Cereals. We offer a range of opportunities in the cereal industry. Apply today and be part of our success story.">
  <meta property="og:url" content="https://goodrichcereals.com/careers.html">
  <meta property="og:site_name" content="Goodrich | Careers">
  <meta property="og:type" content="website">
  <link rel="canonical" href="https://goodrichcereals.com/careers.html">
    <meta name="google-site-verification" content="-C4qU4ARV2TTIFlnq3gbHmetbtm_gOMhTYDRQ-EaJIs">
    <script src="./assets/js/jquery.min.js" async></script>
    <link rel="stylesheet" href="./assets/js/bootstrap/css/bootstrap.css">
    <script src="./assets/js/script.js" async></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <noscript>
        <link rel="stylesheet" href="style.css">
    </noscript>
    <link rel="stylesheet" href="./assets/css/content-box.css">
    <link rel="stylesheet" href="./assets/css/image-box.css">
    <link rel="stylesheet" href="./assets/css/animations.css">
    <link rel="stylesheet" href='./assets/css/components.css'>
    <link rel="stylesheet" href="./assets/css/skin.css">
    <link rel="icon" href="./assets/images/logos/logo.webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body>
    <div id="preloader"></div>
    <div class="footer-parallax-container">
        <header class="fixed-top bg-transparent menu-transparent scroll-change wide-area" data-menu-anima="fade-in" id="section-header"></header>
        <div class="header-video">
            <div class="videobox"> <video muted autoplay>
                    <source src="./assets//video/career.mp4" type="video/mp4">
                </video> </div>
            <div class="overlaybox">
                <div class="container">
                    <div class="title-base white">
                        <hr class="anima">
                        <p>Ready to Shape the Future of Potato Processing</p>
                        <h1>Careers</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-bg-image parallax-window parallax-side" id="air-dried-sec" data-sub-height="0" data-bleed="0" data-natural-height="850" data-natural-width="1920" data-parallax="scroll" data-image-src="./assets/images/bg-img/career.webp">
            <div class="container content">
                <div class="row">
                    <ol class="breadcrumb" style="font-style: italic;">
                        <li><a href="./">Home</a></li>
                        <li class="active">Careers</li>
                    </ol>
                </div>
                <hr class="space m">
                <div id="loadpost" class="All-loader" style="display:none">
                    <div class="loader"><i class="fa fa-spinner fa-pulse fa-1x"></i></div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <form method="post" class="form-box actionForm" action="./assets/php/form-functions.php" enctype="multipart/form-data"> <input type="hidden" name="btnform" value="career">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Name</p> <input id="name" name="name" maxlength="50" placeholder="" type="text" class="form-control" required>
                                    <div class="Inpt name"></div>
                                </div>
                                <div class="col-md-6">
                                    <p>Surname</p> <input id="surname" name="surname" maxlength="50" placeholder="" type="text" class="form-control" required>
                                    <div class="Inpt surname"></div>
                                </div>
                            </div>
                            <hr class="space xs">
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Town/City</p> <input id="town" name="city" maxlength="50" placeholder="" type="text" class="form-control" required>
                                    <div class="Inpt city"></div>
                                </div>
                                <div class="col-md-3">
                                    <p>Country</p> <?php include_once("includes/connection_inner.php"); ?> <select id="country" name="country" class="form-control" required> <?php echo $Q_obj->getCountryDropdown(); ?> </select>
                                    <div class="Inpt country"></div>
                                </div>
                                <div class="col-md-4">
                                    <p>Address</p> <input id="address" name="address" maxlength="100" placeholder=" " type="text" class="form-control" required>
                                    <div class="Inpt address"></div>
                                </div>
                                <div class="col-md-2">
                                    <p>Zip Code</p> <input id="zip" name="zipcode" maxlength="6" placeholder=" " type="text" class="form-control TypeInt" required>
                                    <div class="Inpt zipcode"></div>
                                </div>
                            </div>
                            <hr class="space xs">
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Phone</p> <input id="phone" name="phone" maxlength="10" placeholder=" " type="text" class="form-control TypeInt" required>
                                    <div class="Inpt phone"></div>
                                </div>
                                <div class="col-md-4">
                                    <p>Email</p> <input id="email" name="email" maxlength="100" placeholder=" " type="email" class="form-control" required>
                                    <div class="Inpt email"></div>
                                </div>
                                <div class="col-md-4">
                                    <p>Job Title</p> <input id="tob_title" name="tob_title" maxlength="100" placeholder=" " type="text" class="form-control" required>
                                    <div class="Inpt tob_title"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr class="space xs">
                                    <p>About you</p> <textarea id="messagge" name="about_us" rows="4" maxlength="1000" class="form-control" required></textarea>
                                    <div class="Inpt about_us" id="charCount"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr class="space s">
                                    <div class="circle-button btn-border btn btn-xs" style="display: inline-block;">
                                        <label for="cvInput" style="cursor: pointer;">
                                            Attach File
                                        </label>
                                        <input type="file" id="cvInput" name="attached_file" style="display: none;">
                                    </div>
                                    <button class="anima-button circle-button btn-xs btn" type="submit">
                                        <i class="im-envelope-2"></i>Submit
                                    </button>
                                    <div class="Inpt attached_file"></div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <hr class="space visible-sm">
                        <p class="" style="font-style: italic;">Your career journey starts here</p>
                        <div class="title-base text-left">
                            <hr>
                            <h2>Send your details</h2>
                        </div>
                        <h4 class="heading-green text-center-sm"> APPLY NOW</h4>
                        <p> Be a part of a team that transforms potatoes into endless possibilities! </p>
                    </div>
                </div>
            </div>
        </div>
    </div> <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
    <footer class="footer-base footer-parallax bg-white" id="section-footer"></footer>
    <link rel="stylesheet" href="./assets/js/iconsmind/line-icons.min.css">
    <script async src="./assets/js/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/js/parallax.min.js"></script>
    <script src="./assets/js/header-footer.js"></script>
    <script src="./assets/js/toast.js"></script>
    <script>
        const textarea = document.getElementById('messagge');
        const charCount = document.getElementById('charCount');
        textarea.addEventListener('input', function() {
            const maxLength = parseInt(textarea.getAttribute('maxlength'));
            const currentLength = textarea.value.length;
            if (currentLength > maxLength) {
                textarea.value = textarea.value.substring(0, maxLength);
            }
            charCount.textContent = `${currentLength}/${maxLength}`;
        });
    </script>
</body>

</html>