<!DOCTYPE html>


























<!-- =========================================================
* Frest - Bootstrap Admin Template | v1.0.0
==============================================================

* Product Page: https://1.envato.market/frest_admin
* Created by: PIXINVENT
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright PIXINVENT (https://pixinvent.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-semi-dark" data-assets-path="wizzard_assets/" data-template="vertical-menu-template-semi-dark">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login Basic - Pages | Frest - Bootstrap Admin Template</title>
    
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 admin, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://1.envato.market/frest_admin">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="wizzard_assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="wizzard_assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="wizzard_assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="wizzard_assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="wizzard_assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="wizzard_assets/vendor/css/rtl/theme-semi-dark.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="wizzard_assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="wizzard_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="wizzard_assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
<link rel="stylesheet" href="wizzard_assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="wizzard_assets/vendor/css/pages/page-auth.css">
    <!-- Helpers -->
    <script src="wizzard_assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="wizzard_assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="wizzard_assets/js/config.js"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

</head>

<style>
    body {
        background-image: url('/assets/bg.svg');
    }
</style>

<body>

    <!-- Content -->

    <div class="container-xxl">
        <img src="home_assets/images/morning7-logo.png" width="150" alt="">
        <div class="authentication-wrapper authentication-basic" style="margin-top: -6.5%;">
            <div class="">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->

                        <!-- /Logo -->

                        <div class="text-center" id="firstDisplay">
                            <span class="app-brand-text demo h3 mb-0 fw-bold">WELCOME</span>
                            <h4 class="mb-2 mt-2">Morning Seven Resort Hotel Staff</h4>
                            <h4 class="mb-2">Login As</h4>
                            <div class="row">

                                <div class="col" id="managerBtn" style="cursor: pointer;">
                                    <img src="assets/fmale.png" width="200" alt="">
                                    <h6>Manager</h6>
                                </div>
                                <div class="col" id="employeeBtn" style="cursor: pointer;">
                                    <img src="assets/male.png" width="200" alt="">
                                    <h6>Employee</h6>
                                </div>
                            </div>
                        </div>


                        <div class="row d-none" id="secondDisplay">
                            <div class="col text-center">
                                <img src="assets/fmale.png" id="imageUser" width="200" alt="">
                                <h6 id="selectUser">Employee</h6>
                            </div>
                            <div class="col">
                                <form id="formAuthentication" class="mb-3" action="/signinAccount" method="POST">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                        <!-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> -->
                                    </div>
                                    <div>
                                        <label id="switchUser" style="cursor: pointer;">Switch User</label>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary d-grid w-100" style="margin-top: 10px;" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->







    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="wizzard_assets/vendor/libs/jquery/jquery.js"></script>
    <script src="wizzard_assets/vendor/libs/popper/popper.js"></script>
    <script src="wizzard_assets/vendor/js/bootstrap.js"></script>
    <script src="wizzard_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="wizzard_assets/vendor/libs/hammer/hammer.js"></script>


    <script src="wizzard_assets/vendor/libs/i18n/i18n.js"></script>
    <script src="wizzard_assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="wizzard_assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="wizzard_assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="wizzard_assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="wizzard_assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Main JS -->
    <script src="wizzard_assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="wizzard_assets/js/pages-auth.js"></script>
    <script>
        $('#managerBtn').on('click', function() {
            $('#firstDisplay').addClass('d-none')
            $('#secondDisplay').removeClass('d-none')
            $('#selectUser').text('Manager');
            $('#imageUser').attr('src', 'assets/fmale.png')
        });
        $('#employeeBtn').on('click', function() {
            $('#firstDisplay').addClass('d-none')
            $('#secondDisplay').removeClass('d-none')
            $('#selectUser').text('Employee');
            $('#imageUser').attr('src', 'assets/male.png')
        });
        $('#switchUser').on('click', function() {
            $('#firstDisplay').removeClass('d-none');
            $('#secondDisplay').addClass('d-none');
        });
    </script>
</body>

</html>