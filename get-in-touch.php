<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="index, follow">
    <title>Contact Goodrich Cereals | Get in Touch with Us Today!</title>
    <script type="application/ld+json" src="./assets/js/product-schema.json"></script>
    <meta name="description" content="Contact Goodrich Cereals for premium dehydrated potato products and partnership opportunities. Our team is here to assist you!">
    <meta name="keywords" content="Contact Goodrich Cereals, Reach Out to Us, Goodrich Cereals Support, Customer Service Goodrich Cereals, Inquire Goodrich Cereals, Contact Information Goodrich Cereals, Connect with Goodrich Cereals, Goodrich Cereals Contact Details, How to Contact Goodrich Cereals, Get in Touch with Goodrich Cereals">
    <meta property="og:image" content="./assets/images/logos/logo.webp">
    <meta property="og:title" content="Contact Goodrich Cereals | Get in Touch with Us Today!">
    <meta property="og:description" content="Contact Goodrich Cereals for premium dehydrated potato products and partnership opportunities. Our team is here to assist you!">
    <meta property="og:url" content="https://www.goodrichcereals.com/get-in-touch">
    <meta property="og:site_name" content="Contact Goodrich Cereals | Get in Touch with Us Today!">
    <meta property="og:type" content="website">
    <link rel="canonical" href="https://goodrichcereals.com/get-in-touch">
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
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/logos/apple-touch-icon.webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
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
        <div class="header-video">
            <div class="videobox"> <video muted autoplay>
                    <source src="./assets//video/get-in-touch1.mp4" type="video/mp4">
                </video> </div>
            <div class="overlaybox">
                <div class="container">
                    <div class="title-base white">
                        <hr class="anima">
                        <p>Connecting Beyond Boundaries</p>
                        <h1>Get In Touch</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-empty section-item">
            <div class="container content">
                <div id="loadpost" class="All-loader" style="display:none">
                    <div class="loader"><i class="fa fa-spinner fa-pulse fa-1x"></i></div>
                </div>
                <div class="row">
                    <ol class="breadcrumb" style="font-style: italic;">
                        <li><a href="./">Home</a></li>
                        <li class="active">Get In Touch</li>
                    </ol>
                </div>
                <hr class="space m">
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="title-base">
                            <hr>
                            <h2><span class="heading-green">Say</span> Hi</h2>
                            <p>Got Potato Queries</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-center">
                        <p class="text-justify-sm"> Whether you have questions about our products, want to explore partnership opportunities, or need assistance with your potato-related endeavors, we're here to help. Reach out to us today to discover how we can support your needs and cultivate success together! </p>
                    </div>
                </div>
                <hr class="space lg">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Send a Message</h3>
                        <p> We value your thoughts and inquiries. Please fill out the form below, and we'll get back to you as soon as possible. </p>
                        <hr class="space s">
                        <form method="post" class="form-box actionForm" action="./assets/php/form-functions.php" enctype="multipart/form-data"> <input type="hidden" name="btnform" value="contact">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Your Name</p> <input id="name" maxlength="50" name="fullname" placeholder="" type="text" class="form-control" required>
                                    <div class="Inpt fullname"></div>
                                </div>
                                <div class="col-md-6">
                                    <p>Your Email</p> <input id="email" maxlength="100" name="email" placeholder="" type="email" class="form-control" required>
                                    <div class="Inpt email"></div>
                                </div>
                            </div>
                            <hr class="space s">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Country</p> <?php include_once("includes/connection_inner.php"); ?> <select id="country" name="country" class="form-control" required> <?php echo $Q_obj->getCountryDropdown(); ?> </select>
                                    <div class="Inpt country"></div>
                                </div>
                                <div class="col-md-6">
                                    <p>Phone</p> <input id="phone" name="phone" maxlength="10" placeholder=" " type="text" class="form-control TypeInt" required>
                                    <div class="Inpt phone"></div>
                                </div>
                            </div>
                            <hr class="space s">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Company Name</p> <input id="company" name="company_name" maxlength="100" placeholder="" type="text" class="form-control" required>
                                    <div class="Inpt company_name"></div>
                                </div>
                            </div>
                            <hr class="space s">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Your Message</p>
                                    <textarea id="message" name="contact_message" rows="4" maxlength="1000" class="form-control" required></textarea>
                                    <div class="Inpt contact_message" id="charCount"></div>
                                    <hr class="space s">
                                    <div class="circle-button btn-border btn btn-xs" style="display: inline-block;">
                                        <label for="cvInput" style="cursor: pointer;">
                                            Attach File
                                            <input type="file" id="cvInput" name="attached_file" style="display: none;">
                                        </label>
                                    </div>
                                    <button class="anima-button circle-button btn-xs btn" type="submit">
                                        <i class="im-mailbox-empty"></i>Send Message
                                    </button>
                                    <div class="Inpt attached_file"></div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <hr class="space lg">
                <div class="row">
                    <div class="col-md-12">
                        <hr class="space visible-sm">
                        <h3>How to reach us</h3>
                        <hr class="space s">
                        <div class="row">
                            <div class="col-lg-6 col-xs-12">
                                <ul class="fa-ul">
                                    <li><i class="fa-li im-building"></i> Goodrich Cereals</li>
                                    <li><i class="fa-li im-headset"></i>(+91) 8059800945</li>
                                    <li><i class="fa-li im-mail-3"></i>info@goodrichworld.com</li>
                                    <li>
                                        <hr class="space s">
                                    </li>
                                    <li>
                                        <div class="text-left">
                                            <div class="btn-group btn-group-icons" role="group"> <a class="btn btn-default" href="https://www.facebook.com/GoodrichCerealss?mibextid=ZbWKwL" target="_blank"> <i class="fa fa-facebook"></i> </a> <a class="btn btn-default" href="https://twitter.com/goodrichcereals" target="_blank"> <i class="fa fa-twitter"></i> </a> <a class="btn btn-default" href="https://www.instagram.com/goodrichcereals?igsh=YThmZnp0ZTNoYnB2" target="_blank"> <i class="fa fa-instagram"></i> </a> <a class="btn btn-default" href="https://www.linkedin.com/company/goodrich-cereals/" target="_blank"> <i class="fa fa-linkedin"></i> </a> </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <ul class="fa-ul">
                                    <li> <i class="fa-li im-home-5"></i> Opposite Hotel Deventure, 1st Floor, Bank of Baroda Building, Namastey Chowk, Karnal - 132001, Haryana (India) </li>
                                    <li><i class="fa-li im-home-5"></i> 01, Meerut Road, Nagla, Karnal, Haryana, 132001</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-empty no-padding-bottom">
            <div class="container content" style="padding-top: 0px !important;">
                <div class="row">
                    <div class="col-md-12"> <iframe style="width: 100%; border:0;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1733.9329125862173!2d77.060549!3d29.636639999999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390e70685800f0fb%3A0xf81707f9b321e54e!2sGoodrich%20Cereals!5e0!3m2!1sen!2sin!4v1705126340734!5m2!1sen!2sin" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> </div>
                </div>
            </div>
        </div>
        <div class="section-empty no-padding-bottom">
            <div class="container content">
                <div class="row">
                    <div class="col-md-12">
                        <hr class="space s">
                        <div class="title-base text-left">
                            <hr>
                            <h2>FREQUENTLY ASKED QUESTIONS </h2>
                            <p>Our Story Meet our Strategy</p>
                        </div>
                        <div class="col-md-12">
                            <div class="list-group accordion-list" data-time="1000" data-type="accordion">
                                <div class="list-group-item"> <a> Are Dehydrated Potato Products 100% Potatoes? </a>
                                    <div class="panel">
                                        <div class="inner text-justify"> Yes dehydrated potato products are made from 100% whole, high-quality potatoes. </div>
                                    </div>
                                </div>
                                <div class="list-group-item"> <a>Can Dehydrated Potatoes be part of Nutritious Formulations?</a>
                                    <div class="panel">
                                        <div class="inner text-justify"> Dehydrated potatoes can be part of a nutritious, balanced diet. They are an excellent source of vitamin C and a good source of potassium and vitamin B6. They contribute 8% of the recommended daily value of fiber. They're also naturally gluten free and always have been, For technical assistance in product and recipe development involving potatoes, please contact us today for more information. </div>
                                    </div>
                                </div>
                                <div class="list-group-item"> <a>How long can I store Dehydrated Potatoes?</a>
                                    <div class="panel">
                                        <div class="inner text-justify"> Dehydrated potato products have a maximum shelf life of 12 months. To optimize that shelf life, keep the product in a cool-below 27°C-dry area with minimal exposure to humidity. </div>
                                    </div>
                                </div>
                                <div class="list-group-item"> <a>Do Companies in my Market or region supply Dehydrated Potato Products? How can I find them?</a>
                                    <div class="panel">
                                        <div class="inner text-justify"> Many processors have local importers or distributors throughout the world. Potatoes can relay your requests to members of the industry who, in turn, will contact their local distributors. </div>
                                    </div>
                                </div>
                                <div class="list-group-item"> <a>What promotional support do you have for establishments that adopt Dehydrated Potatoes? </a>
                                    <div class="panel">
                                        <div class="inner text-justify"> Potatoes has developed marketing programs that promote products made with dehydrated potatoes, and we can assist you in creating and supporting your own promotion plan. Please contact your local Potatoes representative to learn more. </div>
                                    </div>
                                </div>
                                <div class="list-group-item"> <a>My Company would like to test Dehydrated Potatoes; How can I receive samples?</a>
                                    <div class="panel">
                                        <div class="inner text-justify"> Potatoes will assist you in getting samples. Just contact your local representative to get the process started and get creative! </div>
                                    </div>
                                </div>
                                <div class="list-group-item"> <a>Will Dehydrated Potatoes increase my formulation costs?</a>
                                    <div class="panel">
                                        <div class="inner text-justify"> On the contrary, in some cases, using dehydrated potatoes lowers costs. When substituted for fresh, it may save labor and reduce waste. Depending on the formulation, their functionality can even allow for reduced use of inputs such as eggs, sugar, oil or ough improvers. And when comparing costs, remember that dehydrated potatoes yield more servings per metric ton than esh, thanks to their 5:1 hydration ratio. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-empty no-padding-bottom">
                    <hr class="space s">
                    <hr class="space s">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="mailto:info@goodrichcereals.com" class="circle-button btn btn-sm btn-sm-get-in btn1">Email Us</a>
                                <a href="mailto:info@goodrichcereals.com" class="circle-button btn btn-sm btn-sm-get-in btn2">
                                    B2B Partnership Inquiries
                                </a>
                                <a href="mailto:info@goodrichcereals.com" class="circle-button btn btn-sm btn-sm-get-in btn3">
                                    Bulk Buying
                                </a>
                                <hr class="space s">
                                <hr class="space s">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
    <footer class="footer-base footer-parallax bg-white" id="section-footer"></footer>
    <link rel="stylesheet" href="./assets/js/iconsmind/line-icons.min.css">
    <script async src="./assets/js/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.tab-accordion.js"></script>
    <script src="./assets/js/parallax.min.js"></script>
    <script src="./assets/js/header-footer.js"></script>
    <script src="./assets/js/toast.js"></script>
    <script>
        const textarea = document.getElementById('message');
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