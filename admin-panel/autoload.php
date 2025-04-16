<?php
cleanConfigData();
require_once('assets/includes/helper.php');
require_once('assets/includes/data_general.php');
$page  = 'dashboard';
include('includes/admin_autoload/f_data.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel | <?php echo $wo['config']['siteTitle']; ?></title>
    <link rel="icon" href="<?php echo $wo['config']['theme_url']; ?>/img/icon.png" type="image/png">


    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo (Wo_LoadAdminLink('vendors/bundle.css')) ?>" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="<?php echo (Wo_LoadAdminLink('vendors/datepicker/daterangepicker.css')) ?>" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="<?php echo (Wo_LoadAdminLink('vendors/dataTable/datatables.min.css')) ?>" type="text/css">

    <!-- App css -->
    <link rel="stylesheet" href="<?php echo (Wo_LoadAdminLink('assets/css/app.css')) ?>" type="text/css">
    <!-- Main scripts -->
    <script src="<?php echo (Wo_LoadAdminLink('vendors/bundle.js')) ?>"></script>

    <!-- Apex chart -->
    <script src="<?php echo (Wo_LoadAdminLink('vendors/charts/apex/apexcharts.min.js')) ?>"></script>

    <!-- Daterangepicker -->
    <script src="<?php echo (Wo_LoadAdminLink('vendors/datepicker/daterangepicker.js')) ?>"></script>

    <!-- DataTable -->
    <script src="<?php echo (Wo_LoadAdminLink('vendors/dataTable/datatables.min.js')) ?>"></script>

    <!-- Dashboard scripts -->
    <script src="<?php echo (Wo_LoadAdminLink('assets/js/examples/pages/dashboard.js')) ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('vendors/charts/chartjs/chart.min.js'); ?>"></script>

    <!-- App scripts -->

    <link href="<?php echo Wo_LoadAdminLink('vendors/sweetalert/sweetalert.css'); ?>" rel="stylesheet" />
    <script src="<?php echo Wo_LoadAdminLink('assets/js/admin.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo (Wo_LoadAdminLink('vendors/select2/css/select2.min.css')) ?>" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <?php //if ($page == 'create-article' || $page == 'edit-article' || $page == 'manage-announcements' || $page == 'newsletters') { 
    ?>
    <script src="<?php echo Wo_LoadAdminLink('vendors/tinymce/js/tinymce/tinymce.min.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('vendors/bootstrap-tagsinput/src/bootstrap-tagsinput.js'); ?>"></script>
    <link href="<?php echo Wo_LoadAdminLink('vendors/bootstrap-tagsinput/src/bootstrap-tagsinput.css'); ?>" rel="stylesheet" />
    <?php //} 
    ?>
    <?php //if ($page == 'custom-code') { 
    ?>
    <script src="<?php echo Wo_LoadAdminLink('vendors/codemirror-5.30.0/lib/codemirror.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('vendors/codemirror-5.30.0/mode/css/css.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('vendors/codemirror-5.30.0/mode/javascript/javascript.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo Wo_LoadAdminLink('vendors/codemirror-5.30.0/lib/codemirror.css'); ?>">
    <?php //} 
    ?>
    <?php if ($page == 'bank-receipts' || $page == 'manage-verification-reqeusts' || $page == 'monetization-requests' || $page == 'manage-user-ads') { ?>
        <!-- Css -->
        <link rel="stylesheet" href="<?php echo (Wo_LoadAdminLink('vendors/lightbox/magnific-popup.css')) ?>" type="text/css">

        <!-- Javascript -->
        <script src="<?php echo (Wo_LoadAdminLink('vendors/lightbox/jquery.magnific-popup.min.js')) ?>"></script>
        <script src="<?php echo (Wo_LoadAdminLink('vendors/charts/justgage/raphael-2.1.4.min.js')) ?>"></script>
        <script src="<?php echo (Wo_LoadAdminLink('vendors/charts/justgage/justgage.js')) ?>"></script>
    <?php } ?>
    <script src="<?php echo Wo_LoadAdminLink('assets/js/jquery.form.min.js'); ?>"></script>
    <script>
        function Wo_Ajax_Requests_File() {
            return "<?php echo $wo['config']['site_url'] . '/requests.php'; ?>"
        }

        function Wo_Ajax_Requests_File_load() {
            return "<?php echo $wo['config']['site_url'] . '/admin_load.php'; ?>"
        }
    </script>
    <style>
        body {
            background-color: #222;
        }

        .btn.btn-primary,
        a.btn[href="#next"],
        a.btn[href="#previous"] {
            color: #fff !important;
            background: #C32E3A;
            border-color: #C32E3A;
        }

        .btn.btn-primary:not(:disabled):not(.disabled):hover,
        a.btn[href="#next"]:not(:disabled):not(.disabled):hover,
        a.btn[href="#previous"]:not(:disabled):not(.disabled):hover,
        .btn.btn-primary:not(:disabled):not(.disabled):focus,
        a.btn[href="#next"]:not(:disabled):not(.disabled):focus,
        a.btn[href="#previous"]:not(:disabled):not(.disabled):focus,
        .btn.btn-primary:not(:disabled):not(.disabled):active,
        a.btn[href="#next"]:not(:disabled):not(.disabled):active,
        a.btn[href="#previous"]:not(:disabled):not(.disabled):active,
        .btn.btn-primary:not(:disabled):not(.disabled).active,
        a.btn[href="#next"]:not(:disabled):not(.disabled).active,
        a.btn[href="#previous"]:not(:disabled):not(.disabled).active {
            background: #CE3643;
            border-color: #CE3643;
        }

        body.dark .navigation .navigation-menu-body ul li a.active,
        .breadcrumb .breadcrumb-item.active,
        body.dark .breadcrumb li.breadcrumb-item.active,
        body.dark .navigation .navigation-menu-body ul li a.active .nav-link-icon {
            color: #C32E3A !important;
        }

        .card form .form-check-inline input:checked {
            background-color: #C32E3A;
        }

        .card form .form-check-inline input:checked+label::before,
        .card form .form-check-inline input:active+label::before {
            border-color: #C32E3A;
        }

        .card form .form-check-inline label::after {
            background-color: #C32E3A;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: 2px solid #C32E3A !important;
        }
    </style>
</head>
<script type="text/javascript">
    $(function() {
        $(document).on('click', 'a[data-ajax]', function(e) {
            $(document).off('click', '.ranges ul li');
            $(document).off('click', '.applyBtn');
            e.preventDefault();
            if (($(this)[0].hasAttribute("data-sent") && $(this).attr('data-sent') == '0') || !$(this)[0].hasAttribute("data-sent")) {
                if (!$(this)[0].hasAttribute("data-sent") && !$(this).hasClass('waves-effect')) {
                    $('.navigation-menu-body').find('a').removeClass('active');
                    $(this).addClass('active');
                }
                window.history.pushState({
                    state: 'new'
                }, '', $(this).attr('href'));
                $(".barloading").css("display", "block");
                if ($(this)[0].hasAttribute("data-sent")) {
                    $(this).attr('data-sent', "1");
                }
                var url = $(this).attr('data-ajax');
                $.post(Wo_Ajax_Requests_File_load() + url, {
                    url: url
                }, function(data) {
                    $(".barloading").css("display", "none");
                    if ($('#redirect_link')[0].hasAttribute("data-sent")) {
                        $('#redirect_link').attr('data-sent', "0");
                    }
                    json_data = JSON.parse($(data).filter('#json-data').val());
                    $('.content').html(data);
                    setTimeout(function() {
                        $(".content").getNiceScroll().resize()
                    }, 500);
                    $(".content").animate({
                        scrollTop: 0
                    }, "slow");
                    showEncryptedAlert();
                });
            }
        });
        $(window).on("popstate", function(e) {
            location.reload();
        });
    });
</script>

<body <?php echo ($mode == 'night' ? 'class="dark"' : ''); ?>>
    <div class="barloading"></div>
    <a id="redirect_link" href="" data-ajax="" data-sent="0"></a>
    <input type="hidden" class="main_session" value="<?php echo Wo_CreateMainSession(); ?>">
    <div class="colors"> <!-- To use theme colors with Javascript -->
        <div class="bg-primary"></div>
        <div class="bg-primary-bright"></div>
        <div class="bg-secondary"></div>
        <div class="bg-secondary-bright"></div>
        <div class="bg-info"></div>
        <div class="bg-info-bright"></div>
        <div class="bg-success"></div>
        <div class="bg-success-bright"></div>
        <div class="bg-danger"></div>
        <div class="bg-danger-bright"></div>
        <div class="bg-warning"></div>
        <div class="bg-warning-bright"></div>
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-icon"></div>
        <span>Loading...</span>
    </div>
    <!-- ./ Preloader -->

    <!-- Sidebar group -->
    <div class="sidebar-group">

    </div>
    <!-- ./ Sidebar group -->

    <!-- Layout wrapper -->
    <div class="layout-wrapper">

        <!-- Header -->
        <div class="header d-print-none">
            <div class="header-container">
                <div class="header-left">
                    <div class="navigation-toggler">
                        <a href="#" data-action="navigation-toggler">
                            <i data-feather="menu"></i>
                        </a>
                    </div>

                    <div class="header-logo">
                        <a href="<?php echo $wo['config']['site_url'] ?>">
                            <img class="logo" src="<?php echo $wo['config']['theme_url']; ?>/img/<?php echo ($wo['config']['theme'] == 'sunshine' ? 'night-' : '') ?>logo.<?php echo $wo['config']['logo_extension']; ?>" alt="logo">
                        </a>
                    </div>
                </div>

                <div class="header-body">
                    <div class="header-body-left">
                        <ul class="navbar-nav">
                            <li class="nav-item mr-3">
                                <div class="header-search-form">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn">
                                                <i data-feather="search"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search" onkeyup="searchInFiles($(this).val())">
                                        <div class="pt_admin_hdr_srch_reslts" id="search_for_bar"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="header-body-right">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link <?php if ($notify_count > 0) { ?> nav-link-notify<?php } ?>" title="Notifications" data-toggle="dropdown">
                                    <i data-feather="bell"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                    <div
                                        class="border-bottom px-4 py-3 text-center d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Notifications</h5>
                                        <?php if ($notify_count > 0) { ?>
                                            <small class="opacity-7"><?php echo $notify_count; ?> unread notifications</small>
                                        <?php } ?>
                                    </div>
                                    <div class="dropdown-scroll">
                                        <ul class="list-group list-group-flush">
                                            <?php if ($notify_count > 0) { ?>
                                                <li class="px-4 py-2 text-center small text-muted bg-light">Unread Notifications</li>
                                                <?php if (!empty($notifications)) {
                                                    foreach ($notifications as $key => $notify) {
                                                        $page_ = '';
                                                        $text = '';
                                                        if ($notify->type == 'bank') {
                                                            $page_ = 'bank-receipts';
                                                            $text = 'You have a new bank payment awaiting your approval';
                                                        } elseif ($notify->type == 'verify') {
                                                            $page_ = 'manage-verification-reqeusts';
                                                            $text = 'You have a new verification requests awaiting your approval';
                                                        } elseif ($notify->type == 'refund') {
                                                            $page_ = 'pro-refund';
                                                            $text = 'You have a new refund requests awaiting your approval';
                                                        } elseif ($notify->type == 'with') {
                                                            $page_ = 'payment-reqeuests';
                                                            $text = 'You have a new withdrawal requests awaiting your approval';
                                                        } elseif ($notify->type == 'report') {
                                                            $page_ = 'manage-reports';
                                                            $text = 'You have a new reports awaiting your approval';
                                                        } elseif ($notify->type == 'user_reports') {
                                                            $page_ = 'user_reports';
                                                            $text = 'You have a new reports awaiting your approval';
                                                        }
                                                ?>
                                                        <li class="px-4 py-3 list-group-item">
                                                            <a href="<?php echo Wo_LoadAdminLinkSettings($page_); ?>" class="d-flex align-items-center hide-show-toggler">
                                                                <div class="flex-shrink-0">
                                                                    <figure class="avatar mr-3">
                                                                        <span
                                                                            class="avatar-title bg-info-bright text-info rounded-circle">
                                                                            <?php if ($notify->type == 'bank') { ?>
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                                                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                                                                </svg>
                                                                            <?php } elseif ($notify->type == 'verify') { ?>
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                                                    <path fill="#2196f3" d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z"></path>
                                                                                </svg>
                                                                            <?php } elseif ($notify->type == 'refund') { ?>
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw">
                                                                                    <polyline points="23 4 23 10 17 10"></polyline>
                                                                                    <polyline points="1 20 1 14 7 14"></polyline>
                                                                                    <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                                                                                </svg>
                                                                            <?php } elseif ($notify->type == 'with') { ?>
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                                                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                                                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                                                                </svg>
                                                                            <?php } elseif ($notify->type == 'report' || $notify->type == 'user_reports') { ?>
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag">
                                                                                    <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                                                                                    <line x1="4" y1="22" x2="4" y2="15"></line>
                                                                                </svg>
                                                                            <?php } ?>

                                                                        </span>
                                                                    </figure>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                                        <?php echo $text; ?>
                                                                    </p>
                                                                    <span class="text-muted small"><?php echo Wo_Time_Elapsed_String($notify->time); ?></span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                <?php }
                                                } ?>
                                            <?php } ?>
                                            <?php if ($notify_count == 0 && !empty($old_notifications)) { ?>
                                                <li class="px-4 py-2 text-center small text-muted bg-light">Old Notifications</li>
                                                <?php
                                                foreach ($old_notifications as $key => $notify) {
                                                    $page_ = '';
                                                    $text = '';
                                                    if ($notify->type == 'bank') {
                                                        $page_ = 'bank-receipts';
                                                        $text = 'You have a new bank payment awaiting your approval';
                                                    } elseif ($notify->type == 'verify') {
                                                        $page_ = 'verification-requests';
                                                        $text = 'You have a new verification requests awaiting your approval';
                                                    } elseif ($notify->type == 'refund') {
                                                        $page_ = 'pro-refund';
                                                        $text = 'You have a new refund requests awaiting your approval';
                                                    } elseif ($notify->type == 'with') {
                                                        $page_ = 'payment-reqeuests';
                                                        $text = 'You have a new withdrawal requests awaiting your approval';
                                                    } elseif ($notify->type == 'report') {
                                                        $page_ = 'manage-reports';
                                                        $text = 'You have a new reports awaiting your approval';
                                                    } elseif ($notify->type == 'user_reports') {
                                                        $page_ = 'user_reports';
                                                        $text = 'You have a new reports awaiting your approval';
                                                    }
                                                ?>
                                                    <li class="px-4 py-3 list-group-item">
                                                        <a href="<?php echo Wo_LoadAdminLinkSettings($page_); ?>" class="d-flex align-items-center hide-show-toggler">
                                                            <div class="flex-shrink-0">
                                                                <figure class="avatar mr-3">
                                                                    <span class="avatar-title bg-secondary-bright text-secondary rounded-circle">
                                                                        <?php if ($notify->type == 'bank') { ?>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                                                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                                                <line x1="1" y1="10" x2="23" y2="10"></line>
                                                                            </svg>
                                                                        <?php } elseif ($notify->type == 'verify') { ?>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                                                <path fill="#2196f3" d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z"></path>
                                                                            </svg>
                                                                        <?php } elseif ($notify->type == 'refund') { ?>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw">
                                                                                <polyline points="23 4 23 10 17 10"></polyline>
                                                                                <polyline points="1 20 1 14 7 14"></polyline>
                                                                                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                                                                            </svg>
                                                                        <?php } elseif ($notify->type == 'with') { ?>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                                                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                                                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                                                            </svg>
                                                                        <?php } elseif ($notify->type == 'report' || $notify->type == 'user_reports') { ?>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag">
                                                                                <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                                                                                <line x1="4" y1="22" x2="4" y2="15"></line>
                                                                            </svg>
                                                                        <?php } ?>
                                                                    </span>
                                                                </figure>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                                    <?php echo $text; ?>
                                                                </p>
                                                                <span class="text-muted small"><?php echo Wo_Time_Elapsed_String($notify->time); ?></span>
                                                            </div>
                                                        </a>
                                                    </li>
                                            <?php }
                                            } ?>
                                        </ul>
                                    </div>
                                    <?php if ($notify_count > 0) { ?>
                                        <div class="px-4 py-3 text-right border-top">
                                            <ul class="list-inline small">
                                                <li class="list-inline-item mb-0">
                                                    <a href="javascript:void(0)" onclick="ReadNotify()">Mark All Read</a>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                                    <figure class="avatar avatar-sm">
                                        <img src="<?php echo $wo['user']['avatar']; ?>"
                                            class="rounded-circle"
                                            alt="avatar">
                                    </figure>
                                    <span class="ml-2 d-sm-inline d-none"><?php echo $wo['user']['name']; ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                    <div class="text-center py-4">
                                        <figure class="avatar avatar-lg mb-3 border-0">
                                            <img src="<?php echo $wo['user']['avatar']; ?>"
                                                class="rounded-circle" alt="image">
                                        </figure>
                                        <h5 class="text-center"><?php echo $wo['user']['name']; ?></h5>
                                        <div class="mb-3 small text-center text-muted"><?php echo $wo['user']['email']; ?></div>
                                        <a href="<?php echo $wo['user']['url']; ?>" class="btn btn-outline-light btn-rounded">View Profile</a>
                                    </div>
                                    <div class="list-group">
                                        <a href="<?php echo (Wo_Link('logout')) ?>" class="list-group-item text-danger">Sign Out!</a>
                                        <?php if ($mode == 'night') { ?>
                                            <a href="javascript:void(0)" class="list-group-item admin_mode" onclick="ChangeMode('day')">
                                                <span id="night-mode-text">Day mode</span>
                                                <svg class="feather feather-moon float-right" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                                </svg>
                                            </a>
                                        <?php } else { ?>
                                            <a href="javascript:void(0)" class="list-group-item admin_mode" onclick="ChangeMode('night')">
                                                <span id="night-mode-text">Night mode</span>
                                                <svg class="feather feather-moon float-right" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                                </svg>
                                            </a>
                                        <?php } ?>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item header-toggler">
                        <a href="#" class="nav-link">
                            <i data-feather="arrow-down"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ./ Header -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- begin::navigation -->
            <div class="navigation">
                <div class="navigation-header">
                    <span>Navigation</span>
                    <a href="#">
                        <i class="ti-close"></i>
                    </a>
                </div>
                <!-- Left Sidebar  -->
                <!-- ------------------------------------------------------------------------------------------------------------------- -->
                <div class="navigation-menu-body">
                    <ul>
                        <!-- --------------------------------------------------------------------------------------------------- -->
                        <!-- Dashboard -->
                        <!-- --------------------------------------------------------------------------------------------------- -->
                        <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['dashboard'] == 1)) {
                            include("includes/admin_autoload/dashboard.php");
                        } ?>
                        <!-- --------------------------------------------------------------------------------------------------- -->

                        <!-- Setting -->
                        <!-- --------------------------------------------------------------------------------------------------- -->
                        <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['post-settings'] == 1 || $wo['user']['permission']['manage-colored-posts'] == 1 || $wo['user']['permission']['manage-reactions'] == 1 || $wo['user']['permission']['live'] == 1 || $wo['user']['permission']['general-settings'] == 1 || $wo['user']['permission']['site-settings'] == 1 || $wo['user']['permission']['amazon-settings'] == 1 || $wo['user']['permission']['email-settings'] == 1 || $wo['user']['permission']['video-settings'] == 1 || $wo['user']['permission']['social-login'] == 1 || $wo['user']['permission']['node'] == 1 || $wo['user']['permission']['cronjob_settings'] == 1))) { ?>

                            <li <?php echo ($page == 'general-settings' || $page == 'post-settings' || $page == 'site-settings' || $page == 'email-settings' || $page == 'social-login' || $page == 'site-features' || $page == 'amazon-settings' ||  $page == 'video-settings' || $page == 'manage-currencies' || $page == 'manage-colored-posts' || $page == 'live' || $page == 'node' || $page == 'manage-reactions' || $page == 'ffmpeg' || $page == 'cronjob_settings') ? 'class="open"' : ''; ?>>
                                <a href="#">
                                    <span class="nav-link-icon">
                                        <i class="material-icons">settings</i>
                                    </span>
                                    <span> <?php echo $wo['lang']['setting'] ?></span>
                                </a>
                                <!-- Child Settings -->
                                <ul class="ml-menu">
                                    <!-- Chế độ trang web -->
                                    <!-- ------------------------------------------ -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['website_mode'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'website_mode') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('website_mode'); ?>" data-ajax="?path=website_mode">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['website_mode'])) {
                                                        echo $wo['lang']['website_mode'];
                                                    } else {
                                                        echo $admin_sidebar_default["website_mode"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-- ------------------------------------------ -->
                                    <!-- Cài đặt chung-->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['general-settings'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'general-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('general-settings'); ?>" data-ajax="?path=general-settings">
                                                <span>
                                                    <?php
                                                    // echo $admin_sidebar_default["general_setting"];
                                                    if (isset($wo['lang']['general_setting'])) {
                                                        echo $wo['lang']['general_setting'];
                                                    } else {
                                                        echo $admin_sidebar_default["general_setting"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-- ------------------------------------------ -->
                                    <!-- Thông tin website -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['site-settings'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'site-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('site-settings'); ?>" data-ajax="?path=site-settings">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['site_information'])) {
                                                        echo $wo['lang']['site_information'];
                                                    } else {
                                                        echo $admin_sidebar_default["site_information"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-- ------------------------------------------ -->
                                    <!-- Thiết lập cấu hình tải tệp -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['amazon-settings'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'amazon-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('amazon-settings'); ?>" data-ajax="?path=amazon-settings">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['file_upload_config'])) {
                                                        echo $wo['lang']['file_upload_config'];
                                                    } else {
                                                        echo $admin_sidebar_default["file_upload_config"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-- Cài đặt email và SMS -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['email-settings'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'email-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('email-settings'); ?>" data-ajax="?path=email-settings">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['email_sms_setup'])) {
                                                        echo $wo['lang']['email_sms_setup'];
                                                    } else {
                                                        echo $admin_sidebar_default["email_sms_setup"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-- Trò chuyện & Video/Âm thanh -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['video-settings'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'video-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('video-settings'); ?>" data-ajax="?path=video-settings">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['chat_video_audio'])) {
                                                        echo $wo['lang']['chat_video_audio'];
                                                    } else {
                                                        echo $admin_sidebar_default["chat_video_audio"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-- Cài đặt mạng xã hội -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['social-login'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'social-login') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('social-login'); ?>" data-ajax="?path=social-login">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['social_login_setting'])) {
                                                        echo $wo['lang']['social_login_setting'];
                                                    } else {
                                                        echo $admin_sidebar_default["social_login_setting"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-- Cài đặt nodejs -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['node'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'node') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('node'); ?>" data-ajax="?path=node">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['nodejs_setting'])) {
                                                        echo $wo['lang']['nodejs_setting'];
                                                    } else {
                                                        echo $admin_sidebar_default["nodejs_setting"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-- Cài đặt CronJob -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['cronjob_settings'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'cronjob_settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('cronjob_settings'); ?>" data-ajax="?path=cronjob_settings">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['cronjob_setting'])) {
                                                        echo $wo['lang']['cronjob_setting'];
                                                    } else {
                                                        echo $admin_sidebar_default["cronjob_setting"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-- Cài đặt AI                                                 -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['ai-settings'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'ai-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('ai-settings'); ?>" data-ajax="?path=ai-settings">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['ai_settings'])) {
                                                        echo $wo['lang']['ai_settings'];
                                                    } else {
                                                        echo $admin_sidebar_default["ai_settings"];
                                                    }
                                                    ?>
                                                </span>

                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-- Post Settings -->
                                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['post-settings'] == 1 || $wo['user']['permission']['manage-colored-posts'] == 1 || $wo['user']['permission']['manage-reactions'] == 1 || $wo['user']['permission']['live'] == 1))) { ?>
                                        <li>
                                            <!-- Cài đặt bài viết -->
                                            <a <?php echo ($page == 'post-settings' || $page == 'manage-colored-posts' || $page == 'manage-reactions') ? 'class="open"' : ''; ?> href="javascript:void(0);">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['posts_setting'])) {
                                                        echo $wo['lang']['posts_setting'];
                                                    } else {
                                                        echo $admin_sidebar_default["posts_setting"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                            <!-- Mục con của cài đặt bài viết -->
                                            <ul class="ml-menu">
                                                <!-- Mục con: Cài đặt bài viết -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['post-settings'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'post-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('post-settings'); ?>" data-ajax="?path=post-settings">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['posts_setting'])) {
                                                                    echo $wo['lang']['posts_setting'];
                                                                } else {
                                                                    echo $admin_sidebar_default["posts_setting"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!-- quản lý bài đăng có màu -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-colored-posts'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'manage-colored-posts') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-colored-posts'); ?>" data-ajax="?path=manage-colored-posts">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['manage_colored_posts'])) {
                                                                    echo $wo['lang']['manage_colored_posts'];
                                                                } else {
                                                                    echo $admin_sidebar_default["manage_colored_posts"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!-- Phản ứng bài đăng  -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-reactions'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'manage-reactions') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-reactions'); ?>" data-ajax="?path=manage-reactions">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['post_reactions'])) {
                                                                    echo $wo['lang']['post_reactions'];
                                                                } else {
                                                                    echo $admin_sidebar_default["post_reactions"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!-- Cài đặt phát trực tiếp -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['live'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'live') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('live'); ?>" data-ajax="?path=live">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['setup_live_Streaming'])) {
                                                                    echo $wo['lang']['setup_live_Streaming'];
                                                                } else {
                                                                    echo $admin_sidebar_default["setup_live_streaming"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <!------------------------------------------------------------------------------------------------------->
                        <!-- Quản lý tính nắng -->
                        <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-apps'] == 1 || $wo['user']['permission']['manage-pages'] == 1 || $wo['user']['permission']['manage-stickers'] == 1 || $wo['user']['permission']['add-new-sticker'] == 1 || $wo['user']['permission']['manage-gifts'] == 1 || $wo['user']['permission']['add-new-gift'] == 1 || $wo['user']['permission']['manage-groups'] == 1 || $wo['user']['permission']['manage-posts'] == 1 || $wo['user']['permission']['manage-articles'] == 1 || $wo['user']['permission']['manage-events'] == 1 || $wo['user']['permission']['manage-forum-sections'] == 1 || $wo['user']['permission']['manage-forum-forums'] == 1 || $wo['user']['permission']['manage-forum-threads'] == 1 || $wo['user']['permission']['manage-forum-messages'] == 1 || $wo['user']['permission']['create-new-forum'] == 1 || $wo['user']['permission']['create-new-section'] == 1 || $wo['user']['permission']['manage-movies'] == 1 || $wo['user']['permission']['add-new-movies'] == 1 || $wo['user']['permission']['manage-games'] == 1 || $wo['user']['permission']['add-new-game'] == 1 || $wo['user']['permission']['edit-movie'] == 1 || $wo['user']['permission']['pages-categories'] == 1 || $wo['user']['permission']['pages-sub-categories'] == 1 || $wo['user']['permission']['groups-sub-categories'] == 1 || $wo['user']['permission']['products-sub-categories'] == 1 || $wo['user']['permission']['groups-categories'] == 1 || $wo['user']['permission']['blogs-categories'] == 1 || $wo['user']['permission']['products-categories'] == 1 || $wo['user']['permission']['manage-fund'] == 1 || $wo['user']['permission']['manage-jobs'] == 1 || $wo['user']['permission']['manage-offers'] == 1 || $wo['user']['permission']['pages-fields'] == 1 || $wo['user']['permission']['groups-fields'] == 1 || $wo['user']['permission']['products-fields'] == 1))) { ?>
                            <!-- Manage Features -->
                            <li <?php echo ($page == 'manage-apps' || $page == 'manage-pages' || $page == 'manage-stickers' || $page == 'add-new-sticker' || $page == 'manage-gifts' || $page == 'add-new-gift' || $page == 'manage-groups' || $page == 'manage-posts' || $page == 'manage-articles' || $page == 'manage-events' ||  $page == 'manage-forum-sections' || $page == 'manage-forum-forums' || $page == 'manage-forum-threads' || $page == 'manage-forum-messages' || $page == 'create-new-forum' || $page == 'create-new-section' || $page == 'manage-movies' || $page == 'add-new-movies' || $page == 'manage-games' || $page == 'add-new-game' || $page == 'edit-movie' || $page == 'pages-categories' || $page == 'pages-sub-categories' || $page == 'groups-sub-categories' || $page == 'products-sub-categories' || $page == 'groups-categories' || $page == 'blogs-categories' || $page == 'products-categories' || $page == 'manage-fund' || $page == 'manage-jobs' || $page == 'manage-offers' || $page == 'pages-fields' || $page == 'groups-fields' || $page == 'products-fields') ? 'class="open"' : ''; ?>>
                                <a href="#">
                                    <span class="nav-link-icon">
                                        <i class="material-icons">view_agenda</i>
                                    </span>
                                    <span>
                                        <?php
                                        if (isset($wo['lang']['manage_features'])) {
                                            echo $wo['lang']['manage_features'];
                                        } else {
                                            echo $admin_sidebar_default["manage_features"];
                                        }
                                        ?>
                                    </span>
                                </a>
                                <!-- Sub Manage Features -->
                                <!-- Enable / Disable Features - Bật tắt tính năng-->
                                <!-- ----------------------------------------------------------------------------------------------------------------------------------------- -->
                                <ul class="ml-menu">
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['site-features'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'site-features') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('site-features'); ?>"
                                                data-ajax="?path=site-features">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['enable_disable_features'])) {
                                                        echo $wo['lang']['enable_disable_features'];
                                                    } else {
                                                        echo $admin_sidebar_default["enable_disable_features"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-- -------------------------------------------------------------------------------- -->
                                    <!-- Applications -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-apps'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-apps') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-apps'); ?>" data-ajax="?path=manage-apps">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['apps'])) {
                                                        echo $wo['lang']['apps'];
                                                    } else {
                                                        echo $admin_sidebar_default["apps"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-- -------------------------------------------------------------------------------- -->
                                    <!-- Các trang - Pages -->
                                    <!-- -------------------------------------------------------------------------------- -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-pages'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-pages') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-pages'); ?>" data-ajax="?path=manage-pages">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['pages'])) {
                                                        echo $wo['lang']['pages'];
                                                    } else {
                                                        echo $admin_sidebar_default["pages"];
                                                    }
                                                    ?>
                                                </span>

                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-- -------------------------------------------------------------------------------- -->
                                    <!-- Groups -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-groups'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-groups') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-groups'); ?>" data-ajax="?path=manage-groups">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['groups'])) {
                                                        echo $wo['lang']['groups'];
                                                    } else {
                                                        echo $admin_sidebar_default["groups"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-- -------------------------------------------------------------------------------- -->
                                    <!-- Posts -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-posts'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-posts') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-posts'); ?>" data-ajax="?path=manage-posts">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['posts'])) {
                                                        echo $wo['lang']['posts'];
                                                    } else {
                                                        echo $admin_sidebar_default["posts"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!---------------------------------------------------------------------------------- -->
                                    <!-- Kinh phí -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-fund'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-fund') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-fund'); ?>" data-ajax="?path=manage-fund">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['funding'])) {
                                                        echo $wo['lang']['funding'];
                                                    } else {
                                                        echo $admin_sidebar_default["funding"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!---------------------------------------------------------------------------------- -->
                                    <!-- Công việc - Jobs -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-jobs'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-jobs') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-jobs'); ?>" data-ajax="?path=manage-jobs">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['jobs'])) {
                                                        echo $wo['lang']['jobs'];
                                                    } else {
                                                        echo $admin_sidebar_default["jobs"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!---------------------------------------------------------------------------------- -->
                                    <!-- Ữu đãi - Offers -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-offers'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-offers') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-offers'); ?>" data-ajax="?path=manage-offers">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['offers'])) {
                                                        echo $wo['lang']['offers'];
                                                    } else {
                                                        echo $admin_sidebar_default["offers"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!---------------------------------------------------------------------------------- -->
                                    <!-- Articles - Bài viết -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-articles'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-articles') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-articles'); ?>" data-ajax="?path=manage-articles">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['articles'])) {
                                                        echo $wo['lang']['articles'];
                                                    } else {
                                                        echo $admin_sidebar_default["articles"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!---------------------------------------------------------------------------------- -->
                                    <!-- Sự kiện -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-events'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-events') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-events'); ?>" data-ajax="?path=manage-events">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['events'])) {
                                                        echo $wo['lang']['events'];
                                                    } else {
                                                        echo $admin_sidebar_default["events"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!--------------------------------------------------------------------------------------------------------------------------------->
                                    <!-- Kiểm tiền từ nội dung - Content Monetization -->
                                    <li>
                                        <a <?php echo ($page == 'manage-events') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-content-monetization'); ?>" data-ajax="?path=manage-content-monetization">
                                            <span>
                                                <?php
                                                if (isset($wo['lang']['content']) && isset($wo['lang']['monetization'])) {
                                                    echo $wo['lang']['monetization'] . ' từ ' . strtolower($wo['lang']['content']);
                                                } else {
                                                    echo $admin_sidebar_default["posts"];
                                                }
                                                ?>
                                            </span>
                                        </a>
                                    </li>
                                    <!--------------------------------------------------------------------------------------------------------------------------------->
                                    <!-- Quản lý tính năng - Quản lý cửa hàng -->
                                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['store-settings'] == 1 || $wo['user']['permission']['manage-products'] == 1 || $wo['user']['permission']['manage-orders'] == 1 || $wo['user']['permission']['manage-reviews'] == 1))) { ?>
                                        <li <?php echo ($page == 'store-settings' || $page == 'manage-products' || $page == 'manage-orders' || $page == 'manage-reviews') ? 'class="open"' : ''; ?>>
                                            <!--------------------------------------------------------------------------------------------------------------------------------->
                                            <!-- Store -->
                                            <a href="javascript:void(0);">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['store'])) {
                                                        echo $wo['lang']['store'];
                                                    } else {
                                                        echo $admin_sidebar_default["store"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                            <!--------------------------------------------------------------------------------------------------------------------------------->
                                            <ul class="ml-menu">
                                                <!-- Cài đặt cửa hàng -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['store-settings'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'store-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('store-settings'); ?>" data-ajax="?path=store-settings">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['store_settings'])) {
                                                                    echo $wo['lang']['store_settings'];
                                                                } else {
                                                                    echo $admin_sidebar_default["store_settings"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Quản lý sản phẩm - Manage Products -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-products'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'manage-products') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-products'); ?>" data-ajax="?path=manage-products">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['manage_product'])) {
                                                                    echo $wo['lang']['manage_product'];
                                                                } else {
                                                                    echo $admin_sidebar_default["manage_product"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Quản lý đơn hàng - Manage Orders -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-orders'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'manage-orders') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-orders'); ?>" data-ajax="?path=manage-orders">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['manage_orders'])) {
                                                                    echo $wo['lang']['manage_orders'];
                                                                } else {
                                                                    echo $admin_sidebar_default["manage_orders"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Quản lý đánh giá -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-reviews'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'manage-reviews') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-reviews'); ?>" data-ajax="?path=manage-reviews">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['manage_review'])) {
                                                                    echo $wo['lang']['manage_review'];
                                                                } else {
                                                                    echo $admin_sidebar_default["manage_review"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <!--------------------------------------------------------------------------------------------------------------------------------->
                                    <!-- Quản lý diễn đàn-->
                                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-forum-sections'] == 1 || $wo['user']['permission']['manage-forum-forums'] == 1 || $wo['user']['permission']['manage-forum-threads'] == 1 || $wo['user']['permission']['manage-forum-messages'] == 1 || $wo['user']['permission']['create-new-forum'] == 1 || $wo['user']['permission']['create-new-section'] == 1))) { ?>
                                        <li <?php echo ($page == 'manage-forum-sections' || $page == 'manage-forum-forums' || $page == 'manage-forum-threads' || $page == 'manage-forum-messages' || $page == 'create-new-forum' || $page == 'create-new-section') ? 'class="open"' : ''; ?>>
                                            <!--------------------------------------------------------------------------------------------------------------------------------->
                                            <!-- Quản lý diễn đàn -->
                                            <a href="javascript:void(0);">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['forums'])) {
                                                        echo $wo['lang']['forums'];
                                                    } else {
                                                        echo $admin_sidebar_default["forums"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                            <ul class="ml-menu">
                                                <!-- Quản lý phần diễn đàn - Manage Forums Sections -->
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-forum-sections'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'manage-forum-sections') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-forum-sections'); ?>" data-ajax="?path=manage-forum-sections">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['manage_forum_sec'])) {
                                                                    echo $wo['lang']['manage_forum_sec'];
                                                                } else {
                                                                    echo $admin_sidebar_default["manage_forum_sec"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Quản lý diễn đàn - Manage Forums  -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-forum-forums'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'manage-forum-forums') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-forum-forums'); ?>" data-ajax="?path=manage-forum-forums">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['manage_forums'])) {
                                                                    echo $wo['lang']['manage_forums'];
                                                                } else {
                                                                    echo $admin_sidebar_default["manage_forums"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Manage Threads - Quản lý chủ đề -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-forum-threads'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'manage-forum-threads') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-forum-threads'); ?>" data-ajax="?path=manage-forum-threads">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['manage_threads'])) {
                                                                    echo $wo['lang']['manage_threads'];
                                                                } else {
                                                                    echo $admin_sidebar_default["manage_threads"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Manage Replies - Quản lý trả lời -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-forum-messages'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'manage-forum-messages') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-forum-messages'); ?>" data-ajax="?path=manage-forum-messages">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['replies'])) {
                                                                    echo "Quản lý " . $wo['lang']['replies'];
                                                                } else {
                                                                    echo $admin_sidebar_default["manage_threads"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Tạo phần mới - Create New Section-->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['create-new-section'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'create-new-section') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('create-new-section'); ?>" data-ajax="?path=create-new-section">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['create_new_seciton'])) {
                                                                    echo $wo['lang']['create_new_seciton'];
                                                                } else {
                                                                    echo $admin_sidebar_default["create_new_seciton"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Tạo mới diễn đàn - create new forum -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['create-new-forum'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'create-new-forum') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('create-new-forum'); ?>" data-ajax="?path=create-new-forum">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['create_new_forum'])) {
                                                                    echo $wo['lang']['create_new_forum'];
                                                                } else {
                                                                    echo $admin_sidebar_default["create_new_forum"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>

                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <!--------------------------------------------------------------------------------------------------------------------------------->
                                    <!-- Phim -->
                                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-movies'] == 1 || $wo['user']['permission']['add-new-movies'] == 1))) { ?>
                                        <li <?php echo ($page == 'manage-movies' || $page == 'add-new-movies') ? 'class="open"' : ''; ?>>
                                            <a href="javascript:void(0);">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['movies'])) {
                                                        echo $wo['lang']['movies'];
                                                    } else {
                                                        echo $admin_sidebar_default["movies"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                            <!--------------------------------------------------------------------------------------------------------------------------------->
                                            <ul class="ml-menu">
                                                <!-- Quản lý phim -->
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-movies'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'manage-movies') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-movies'); ?>" data-ajax="?path=manage-movies">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['manage_movies'])) {
                                                                    echo $wo['lang']['manage_movies'];
                                                                } else {
                                                                    echo $admin_sidebar_default["manage_movies"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['add-new-movies'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'add-new-movies') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('add-new-movies'); ?>" data-ajax="?path=add-new-movies">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['add_new_movies'])) {
                                                                    echo $wo['lang']['add_new_movies'];
                                                                } else {
                                                                    echo $admin_sidebar_default["add_new_movies"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <!--------------------------------------------------------------------------------------------------------------------------------->
                                    <!-- Trò chơi -->
                                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-games'] == 1 || $wo['user']['permission']['add-new-game'] == 1))) { ?>
                                        <li <?php echo ($page == 'manage-games' || $page == 'add-new-game') ? 'class="open"' : ''; ?>>
                                            <a href="javascript:void(0);">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['games'])) {
                                                        echo $wo['lang']['games'];
                                                    } else {
                                                        echo $admin_sidebar_default["games"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                            <!--------------------------------------------------------------------------------------------------------------------------------->
                                            <!-- Quản lý trò chơi - Manager games -->
                                            <ul class="ml-menu">
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-games'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'manage-games') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-games'); ?>" data-ajax="?path=manage-games">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['games'])) {
                                                                    echo "Quản lý " . $wo['lang']['games'];
                                                                } else {
                                                                    echo $admin_sidebar_default["manage_game"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Tạo trò chơi mới - Create new game -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['add-new-game'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'add-new-game') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('add-new-game'); ?>" data-ajax="?path=add-new-game">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['create_new_game'])) {
                                                                    echo "Quản lý " . $wo['lang']['create_new_game'];
                                                                } else {
                                                                    echo $admin_sidebar_default["create_new_game"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->

                                            </ul>
                                            <!--------------------------------------------------------------------------------------------------------------------------------->
                                        </li>
                                    <?php } ?>
                                    <!--------------------------------------------------------------------------------------------------------------------------------->
                                    <!-- Categories - Quản lý danh mục -->
                                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['pages-categories'] == 1 || $wo['user']['permission']['pages-sub-categories'] == 1 || $wo['user']['permission']['groups-sub-categories'] == 1 || $wo['user']['permission']['products-sub-categories'] == 1 || $wo['user']['permission']['groups-categories'] == 1 || $wo['user']['permission']['blogs-categories'] == 1 || $wo['user']['permission']['products-categories'] == 1))) { ?>
                                        <li <?php echo ($page == 'pages-categories' || $page == 'pages-sub-categories' || $page == 'groups-sub-categories' || $page == 'products-sub-categories' || $page == 'groups-categories' || $page == 'blogs-categories' || $page == 'products-categories') ? 'class="open"' : ''; ?>>
                                            <!--------------------------------------------------------------------------------------------------------------------------------->
                                            <!-- Categories - Quản lý danh mục -->
                                            <a href="javascript:void(0);">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['categories'])) {
                                                        echo $wo['lang']['categories'];
                                                    } else {
                                                        echo $admin_sidebar_default["categories"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                            <!--------------------------------------------------------------------------------------------------------------------------------->
                                            <!-- Sub categories - -->
                                            <ul class="ml-menu">
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Page caegories - Hạng mục trang -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['pages-categories'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'pages-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('pages-categories'); ?>" data-ajax="?path=pages-categories">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['categories']) && isset($wo['lang']['pages'])) {
                                                                    echo $wo['lang']['categories'] . ' ' . strtolower($wo['lang']['pages']);
                                                                } else {
                                                                    echo $admin_sidebar_default["page_categories"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Pages Sub Categories - Hạng mục trang -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['pages-sub-categories'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'pages-sub-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('pages-sub-categories'); ?>" data-ajax="?path=pages-sub-categories">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['sub_category']) && isset($wo['lang']['pages'])) {
                                                                    echo $wo['lang']['sub_category'] . ' ' . strtolower($wo['lang']['pages']);
                                                                } else {
                                                                    echo $admin_sidebar_default["page_sub_cate"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Groups Categories - Hạng mục trang -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['groups-categories'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'groups-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('groups-categories'); ?>" data-ajax="?path=groups-categories">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['groups']) && isset($wo['lang']['categories'])) {
                                                                    echo $wo['lang']['groups'] . ' ' . strtolower($wo['lang']['categories']);
                                                                } else {
                                                                    echo $admin_sidebar_default["groups_categories"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Groups Sub Categories - Hạng mục trang -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['groups-sub-categories'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'groups-sub-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('groups-sub-categories'); ?>" data-ajax="?path=groups-sub-categories">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['groups']) && isset($wo['lang']['sub_category'])) {
                                                                    echo $wo['lang']['groups'] . ' ' . strtolower($wo['lang']['sub_category']);
                                                                } else {
                                                                    echo $admin_sidebar_default["grp_sub_categories"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Blogs Categories - Hạng mục blog -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['blogs-categories'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'blogs-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('blogs-categories'); ?>" data-ajax="?path=blogs-categories">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['categories']) && isset($wo['lang']['blog'])) {
                                                                    echo $wo['lang']['categories'] . ' ' . strtolower($wo['lang']['blog']);
                                                                } else {
                                                                    echo $admin_sidebar_default["blogs_categories"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Products Categories - Hạng mục blog -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['products-categories'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'products-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('products-categories'); ?>" data-ajax="?path=products-categories">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['categories']) && isset($wo['lang']['products'])) {
                                                                    echo $wo['lang']['categories'] . ' ' . strtolower($wo['lang']['products']);
                                                                } else {
                                                                    echo $admin_sidebar_default["products_categories"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Products Sub Categories - Hạng mục blog -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['products-sub-categories'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'products-sub-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('products-sub-categories'); ?>" data-ajax="?path=products-sub-categories">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['sub_categories']) && isset($wo['lang']['products'])) {
                                                                    echo $wo['lang']['sub_categories'] . ' ' . strtolower($wo['lang']['products']);
                                                                } else {
                                                                    echo $admin_sidebar_default["prd_sub_categories"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!-- Job Categories -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['job-categories'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'job-categories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('job-categories'); ?>" data-ajax="?path=job-categories">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['categories']) && isset($wo['lang']['jobs'])) {
                                                                    echo $wo['lang']['categories'] . ' ' . strtolower($wo['lang']['jobs']);
                                                                } else {
                                                                    echo $admin_sidebar_default["job_categories"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <!--------------------------------------------------------------------------------------------------------------------------------->
                                    <!-- Gift - Qùa tặng -->
                                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['add-new-gift'] == 1 || $wo['user']['permission']['manage-gifts'] == 1))) { ?>
                                        <?php if ($wo['config']['gift_system'] == 1) { ?>
                                            <li <?php echo ($page == 'manage-gifts' || $page == 'add-new-gift') ? 'class="open"' : ''; ?>>
                                                <a href="javascript:void(0);">
                                                    <span>
                                                        <?php
                                                        if (isset($wo['lang']['gifts'])) {
                                                            echo $wo['lang']['gifts'];
                                                        } else {
                                                            echo $admin_sidebar_default["gifts"];
                                                        }
                                                        ?>
                                                    </span>
                                                </a>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Sub Gift - Qùa tặng -->
                                                <ul class="ml-menu">
                                                    <!--------------------------------------------------------------------------------------------------------------------------------->
                                                    <!-- Manage Gifts - Quản lý quà tặng -->
                                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-gifts'] == 1)) { ?>
                                                        <li>
                                                            <a <?php echo ($page == 'manage-gifts') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-gifts'); ?>" data-ajax="?path=manage-gifts">
                                                                <span>
                                                                    <?php
                                                                    if (isset($wo['lang']['manage_gifts'])) {
                                                                        echo $wo['lang']['manage_gifts'];
                                                                    } else {
                                                                        echo $admin_sidebar_default["manage_gifts"];
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                    <!--------------------------------------------------------------------------------------------------------------------------------->
                                                    <!-- Add New Gift - Thêm mới quà tặng -->
                                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['add-new-gift'] == 1)) { ?>
                                                        <li>
                                                            <a <?php echo ($page == 'add-new-gift') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('add-new-gift'); ?>" data-ajax="?path=add-new-gift">
                                                                <span>
                                                                    <?php
                                                                    if (isset($wo['lang']['add_new_gifts'])) {
                                                                        echo $wo['lang']['add_new_gifts'];
                                                                    } else {
                                                                        echo $admin_sidebar_default["add_new_gifts"];
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                    <!--------------------------------------------------------------------------------------------------------------------------------->
                                    <!-- Gift - Qùa tặng -->
                                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-stickers'] == 1 || $wo['user']['permission']['add-new-sticker'] == 1))) { ?>
                                        <?php if ($wo['config']['stickers_system'] == 1) { ?>
                                            <li <?php echo ($page == 'manage-stickers' || $page == 'add-new-sticker') ? 'class="open"' : ''; ?>>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Sticker - Hình dán -->
                                                <a href="javascript:void(0);">
                                                    <span>
                                                        <?php
                                                        if (isset($wo['lang']['stickers'])) {
                                                            echo $wo['lang']['stickers'];
                                                        } else {
                                                            echo $admin_sidebar_default["stickers"];
                                                        }
                                                        ?>
                                                    </span>
                                                </a>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <ul class="ml-menu">
                                                    <!-- Manage Sticker - Quản lý Hình dán -->
                                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-stickers'] == 1)) { ?>
                                                        <li>
                                                            <a <?php echo ($page == 'manage-stickers') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-stickers'); ?>" data-ajax="?path=manage-stickers">
                                                                <span>
                                                                    <?php
                                                                    if (isset($wo['lang']['manage_sticker'])) {
                                                                        echo $wo['lang']['manage_sticker'];
                                                                    } else {
                                                                        echo $admin_sidebar_default["manage_sticker"];
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                    <!--------------------------------------------------------------------------------------------------------------------------------->
                                                    <!-- Add New sticker -->
                                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['add-new-sticker'] == 1)) { ?>
                                                        <li>
                                                            <a <?php echo ($page == 'add-new-sticker') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('add-new-sticker'); ?>" data-ajax="?path=add-new-sticker">
                                                                <span>
                                                                    <?php
                                                                    if (isset($wo['lang']['add_new_sticker'])) {
                                                                        echo $wo['lang']['add_new_sticker'];
                                                                    } else {
                                                                        echo $admin_sidebar_default["add_new_sticker"];
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                    <!--------------------------------------------------------------------------------------------------------------------------------->
                                    <!-- Gift - Qùa tặng -->
                                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['pages-fields'] == 1 || $wo['user']['permission']['groups-fields'] == 1 || $wo['user']['permission']['products-fields'] == 1 || $wo['user']['permission']['manage-profile-fields'] == 1))) { ?>
                                        <li <?php echo ($page == 'pages-fields' || $page == 'groups-fields' || $page == 'products-fields' || $page == 'manage-profile-fields') ? 'class="open"' : ''; ?>>
                                            <!--------------------------------------------------------------------------------------------------------------------------------->
                                            <!-- Custom Fields - Trường tùy chỉnh -->
                                            <a href="javascript:void(0);">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['custom_fields'])) {
                                                        echo $wo['lang']['custom_fields'];
                                                    } else {
                                                        echo $admin_sidebar_default["custom_fields"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                            <!--------------------------------------------------------------------------------------------------------------------------------->
                                            <ul class="ml-menu">
                                                <!-- Custom Users Fields - Trường tùy chỉnh người dùng -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-profile-fields'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'manage-profile-fields') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-profile-fields'); ?>" data-ajax="?path=manage-profile-fields">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['custom_user_fields'])) {
                                                                    echo $wo['lang']['custom_user_fields'];
                                                                } else {
                                                                    echo $admin_sidebar_default["custom_user_fields"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Custom page Fields - Trường tùy chỉnh trang -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['pages-fields'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'pages-fields') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('pages-fields'); ?>" data-ajax="?path=pages-fields">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['custom_pages_fields'])) {
                                                                    echo $wo['lang']['custom_pages_fields'];
                                                                } else {
                                                                    echo $admin_sidebar_default["custom_pages_fields"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Custom Groups Fields - Trường tùy chỉnh nhóm -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['groups-fields'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'groups-fields') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('groups-fields'); ?>" data-ajax="?path=groups-fields">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['custom_group_fields'])) {
                                                                    echo $wo['lang']['custom_group_fields'];
                                                                } else {
                                                                    echo $admin_sidebar_default["custom_group_fields"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!--------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- Custom Product Fields - Trường tùy chỉnh nhóm -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['products-fields'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'products-fields') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('products-fields'); ?>" data-ajax="?path=products-fields">
                                                            <span>
                                                                <?php
                                                                    if (isset($wo['lang']['custom_product_fields'])) {
                                                                        echo $wo['lang']['custom_product_fields'];
                                                                    } else {
                                                                        echo $admin_sidebar_default["custom_product_fields"];
                                                                    }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <!-- ----------------------------------------------------------------------------------------------------------------------------------------- -->
                            </li>
                        <?php } ?>
                        <!------------------------------------------------------------------------------------------------------->
                        <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-languages'] == 1 || $wo['user']['permission']['add-language'] == 1 || $wo['user']['permission']['edit-lang'] == 1))) { ?>
                            <li <?php echo ($page == 'manage-languages' || $page == 'add-language' || $page == 'edit-lang') ? 'class="open"' : ''; ?>>
                                <!-- Quản lý ngôn ngữ -->
                                <a href="#">
                                    <span class="nav-link-icon">
                                        <i class="material-icons">language</i>
                                    </span>
                                    <span>
                                        <?php
                                        if (isset($wo['lang']['languages'])) {
                                            echo $wo['lang']['languages'];
                                        } else {
                                            echo $admin_sidebar_default["languages"];
                                        }
                                        ?>
                                    </span>
                                </a>
                                <!------------------------------------------------------------------------------------------------------->
                                <ul <?php echo ($page == 'manage-languages' || $page == 'add-language' || $page == 'edit-lang') ? 'style="display: block;"' : ''; ?>>
                                    <!-- Thêm mới ngôn ngữ và key - Add New Language & Keys -->                                    
                                    <!------------------------------------------------------------------------------------------------------->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['add-language'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'add-language') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('add-language'); ?>" data-ajax="?path=add-language">                                                
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['add_lang_key'])) {
                                                        echo $wo['lang']['add_lang_key'];
                                                    } else {
                                                        echo $admin_sidebar_default["add_lang_key"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Quản lý ngôn ngữ - Manage Languages -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-languages'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-languages' || $page == 'edit-lang') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-languages'); ?>" data-ajax="?path=manage-languages">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['manage_languages'])) {
                                                        echo $wo['lang']['manage_languages'];
                                                    } else {
                                                        echo $admin_sidebar_default["manage_languages"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <!------------------------------------------------------------------------------------------------------->            
                            </li>
                        <?php } ?>
                        <!------------------------------------------------------------------------------------------------------->
                        <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-users'] == 1 || $wo['user']['permission']['manage-stories'] == 1 || $wo['user']['permission']['manage-profile-fields'] == 1 || $wo['user']['permission']['add-new-profile-field'] == 1 || $wo['user']['permission']['manage-verification-reqeusts'] == 1 || $wo['user']['permission']['affiliates-settings'] == 1 || $wo['user']['permission']['payment-reqeuests'] == 1 || $wo['user']['permission']['referrals-list'] == 1 || $wo['user']['permission']['online-users'] == 1 || $wo['user']['permission']['manage-genders'] == 1))) { ?>
                            <li <?php echo ($page == 'manage-users' || $page == 'manage-stories' || $page == 'manage-profile-fields' || $page == 'add-new-profile-field' || $page == 'edit-profile-field' || $page == 'manage-verification-reqeusts' || $page == 'affiliates-settings' || $page == 'payment-reqeuests' || $page == 'referrals-list' || $page == 'online-users' || $page == 'manage-genders') ? 'class="open"' : ''; ?>>
                                <!-- Người dùng -->
                                <a href="#">
                                    <span class="nav-link-icon">
                                        <i class="material-icons">account_circle</i>
                                    </span>
                                    <span>
                                        <?php
                                            if (isset($wo['lang']['users'])) {
                                                echo $wo['lang']['users'];
                                            } else {
                                                echo $admin_sidebar_default["users"];
                                            }
                                        ?>
                                    </span>
                                </a>
                                <!------------------------------------------------------------------------------------------------------->
                                <!-- Mục con của người dùng -->
                                <!------------------------------------------------------------------------------------------------------->
                                <ul class="ml-menu">
                                    <!-- Quản lý người dùng - Manager Users -->
                                    <!------------------------------------------------------------------------------------------------------->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-users'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-users') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-users'); ?>" data-ajax="?path=manage-users">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['manage_users'])) {
                                                        echo $wo['lang']['manage_users'];
                                                    } else {
                                                        echo $admin_sidebar_default["manage_users"];
                                                    }
                                                    ?>
                                                </span>
                                            
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Người dùng trực tuyến - Online -->                                                    
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['online-users'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'online-users') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('online-users'); ?>" data-ajax="?path=online-users">                                                
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['online_users'])) {
                                                        echo $wo['lang']['online_users'];
                                                    } else {
                                                        echo $admin_sidebar_default["online_users"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Manage User Stories / Status --  Quản lý câu chuyện người dùng / trạng thái -->                                                    
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-stories'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-stories') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-stories'); ?>" data-ajax="?path=manage-stories">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['manage_store']) && isset($wo['lang']['users']) && isset($wo['lang']['status'])) {
                                                        echo $wo['lang']['manage_store'] . ' ' . strtolower($wo['lang']['users']) . '/ ' . strtolower($wo['lang']['status']);
                                                    } else {
                                                        echo $admin_sidebar_default["m_store_users_status"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Manage Verification Reqeusts -- Quản lý yêu cầu xác minh -->     
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-verification-reqeusts'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-verification-reqeusts') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-verification-reqeusts'); ?>" data-ajax="?path=manage-verification-reqeusts">                                                
                                            <span>
                                                <?php
                                                if (isset($wo['lang']['verifications_requests']) && isset($admin_sidebar_default["manage"])) {
                                                    echo $admin_sidebar_default["manage"] . ' ' . strtolower($wo['lang']['verifications_requests']);
                                                } else {
                                                    echo $admin_sidebar_default["m_veri_request"];                                                
                                                }
                                                ?>
                                            </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Affiliates Settings - Cài đặt liên kết --> 
                                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['affiliates-settings'] == 1 || $wo['user']['permission']['payment-reqeuests'] == 1 || $wo['user']['permission']['referrals-list'] == 1))) { ?>
                                        <li>
                                            <!-- Affiliates System -->
                                            <a <?php echo ($page == 'affiliates-settings' || $page == 'payment-reqeuests' || $page == 'referrals-list') ? 'class="active"' : ''; ?> href="javascript:void(0);">    
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['affiliate_settings'])) {
                                                        echo $wo['lang']['affiliate_settings'];
                                                    } else {
                                                        echo $admin_sidebar_default["affiliate_settings"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                            <!------------------------------------------------------------------------------------------------------->
                                            <ul class="ml-menu">
                                                <!-- Affiliates Settings -->
                                                <!------------------------------------------------------------------------------------------------------->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['affiliates-settings'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'affiliates-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('affiliates-settings'); ?>" data-ajax="?path=affiliates-settings">
                                                        <span>
                                                            <?php
                                                            if (isset($wo['lang']['affiliate_settings'])) {
                                                                echo $wo['lang']['affiliate_settings'];
                                                            } else {
                                                                echo $admin_sidebar_default["affiliate_settings"];
                                                            }
                                                            ?>
                                                        </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!------------------------------------------------------------------------------------------------------->
                                                <!-- Payment Requests  -- Yêu cầu thanh toán -->
                                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['payment-reqeuests'] == 1)) { ?>
                                                    <li>
                                                        <a <?php echo ($page == 'payment-reqeuests') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('payment-reqeuests'); ?>" data-ajax="?path=payment-reqeuests">
                                                            <span>
                                                                <?php
                                                                if (isset($wo['lang']['requests']) && isset($wo['lang']['payment'])) {
                                                                    echo $wo['lang']['requests'] . ' ' . $wo['lang']['requests'];
                                                                } else {
                                                                    echo $admin_sidebar_default["payment_request"];
                                                                }
                                                                ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Manage Genders - Quản lý giới tính -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-genders'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-genders') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-genders'); ?>" data-ajax="?path=manage-genders">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['gender'])) {
                                                        echo $admin_sidebar_default["manage"] . ' ' . $wo['lang']['gender'];
                                                    } else {
                                                        echo $admin_sidebar_default["manage_genders"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <!------------------------------------------------------------------------------------------------------->
                            </li>
                        <?php } ?>
                        <!------------------------------------------------------------------------------------------------------->                        
                        <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['ads-settings'] == 1 || $wo['user']['permission']['manage-site-ads'] == 1 || $wo['user']['permission']['manage-user-ads'] == 1 || $wo['user']['permission']['bank-receipts'] == 1 || $wo['user']['permission']['payment-settings'] == 1 || $wo['user']['permission']['manage-currencies'] == 1))) { ?>
                            <li <?php echo ($page == 'ads-settings' || $page == 'manage-site-ads' || $page == 'manage-user-ads' || $page == 'bank-receipts' || $page == 'payment-settings' || $page == 'manage-currencies') ? 'class="open"' : ''; ?>>
                                <!-- Payments & Ads   --  Thanh toán và quảng cáo -->
                                <a href="#">
                                    <span class="nav-link-icon">
                                        <i class="material-icons">attach_money</i>
                                    </span>
                                    <span>
                                        <?php
                                        if (isset($wo['lang']['payments']) && isset($wo['lang']['ads'])) {
                                            echo $wo['lang']['payments'] . ' và ' . strtolower($wo['lang']['ads']);
                                        } else {
                                            echo $admin_sidebar_default["payments_ads"];
                                        }
                                        ?>
                                    </span>                                    
                                </a>
                                <ul class="ml-menu">
                                    <!-- Payment Configuration -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['payment-settings'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'payment-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('payment-settings'); ?>" data-ajax="?path=payment-settings">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['config']) && isset($wo['lang']['payments'])) {
                                                        echo $wo['lang']['config'] . ' ' . strtolower($wo['lang']['payments']);
                                                    } else {
                                                        echo $admin_sidebar_default["payment_configuration"];
                                                    }
                                                    ?>
                                                </span>     
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->                        
                                    <!-- Cài đặt quảng cáo - Advertisement Settings  -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['ads-settings'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'ads-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('ads-settings'); ?>" data-ajax="?path=ads-settings">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['advertisement_setting'])) {
                                                        echo $wo['lang']['advertisement_setting'];
                                                    } else {
                                                        echo $admin_sidebar_default["advertisement_setting"];
                                                    }
                                                    ?>
                                                </span>                                            
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->                        
                                    <!-- Manage Currencies  - Quản lý tiền tệ-->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-currencies'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-currencies') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-currencies'); ?>" data-ajax="?path=manage-currencies">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['manage']) && isset($wo['lang']['currency'])) {
                                                        echo $wo['lang']['manage'] . ' ' . strtolower($wo['lang']['currency']);
                                                    } else {
                                                        echo $admin_sidebar_default["manage_currency"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->                        
                                    <!-- Manage Site Advertisements --  Quản lý quảng cáo trang web -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-site-ads'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-site-ads') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-site-ads'); ?>" data-ajax="?path=manage-site-ads">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['m_site_ads'])) {
                                                        echo $wo['lang']['m_site_ads'];
                                                    } else {
                                                        echo $admin_sidebar_default["m_site_ads"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->                        
                                    <!-- Manage User Advertisements --  Quản lý quảng cáo người dùng -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-user-ads'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-user-ads') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-user-ads'); ?>" data-ajax="?path=manage-user-ads">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['m_user_ads'])) {
                                                        echo $wo['lang']['m_user_ads'];
                                                    } else {
                                                        echo $admin_sidebar_default["m_user_ads"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->                        
                                    <!-- Manage Bank Receipts - Quản lý Biên lai ngân hàng -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['bank-receipts'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'bank-receipts') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('bank-receipts'); ?>" data-ajax="?path=bank-receipts">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['m_bank_receipts'])) {
                                                        echo $wo['lang']['m_bank_receipts'];
                                                    } else {
                                                        echo $admin_sidebar_default["m_bank_receipts"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <!------------------------------------------------------------------------------------------------------->
                        <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['pro-settings'] == 1 || $wo['user']['permission']['pro-memebers'] == 1 || $wo['user']['permission']['pro-payments'] == 1 || $wo['user']['permission']['pro-features'] == 1 || $wo['user']['permission']['pro-refund'] == 1))) { ?>
                            <li <?php echo ($page == 'pro-settings' || $page == 'pro-memebers' || $page == 'pro-payments' || $page == 'pro-features' || $page == 'pro-refund') ? 'class="open"' : ''; ?>>
                                <!-- Pro System -->
                                <a href="#">
                                    <span class="nav-link-icon">
                                        <i class="material-icons">stars</i>
                                    </span>
                                    <span>
                                        <?php
                                        if (isset($wo['lang']['pro_system'])) {
                                            echo $wo['lang']['pro_system'];
                                        } else {
                                            echo $admin_sidebar_default["pro_system"];
                                        }
                                        ?>
                                    </span>
                                </a>
                                <!------------------------------------------------------------------------------------------------------->
                                <ul class="ml-menu">
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['pro-settings'] == 1)) { ?>
                                        <!-- Pro System Settings - Cài đặt hệ thống Pro -->
                                        <li>
                                            <a <?php echo ($page == 'pro-settings') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('pro-settings'); ?>" data-ajax="?path=pro-settings">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['pro_system_setup'])) {
                                                        echo $wo['lang']['pro_system_setup'];
                                                    } else {
                                                        echo $admin_sidebar_default["pro_system_setup"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Manage Payments -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['pro-payments'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'pro-payments') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('pro-payments'); ?>" data-ajax="?path=pro-payments">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['manage_payment'])) {
                                                        echo $wo['lang']['manage_payment'];
                                                    } else {
                                                        echo $admin_sidebar_default["manage_payment"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Manage Members -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['pro-memebers'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'pro-memebers') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('pro-memebers'); ?>" data-ajax="?path=pro-memebers">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['manage_member'])) {
                                                        echo $wo['lang']['manage_member'];
                                                    } else {
                                                        echo $admin_sidebar_default["manage_member"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Manage Refund Requests - Quản lý yêu cầu hoàn tiền -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['pro-refund'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'pro-refund') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('pro-refund'); ?>" data-ajax="?path=pro-refund">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['manage_refund_requests'])) {
                                                        echo $wo['lang']['manage_refund_requests'];
                                                    } else {
                                                        echo $admin_sidebar_default["manage_refund_requests"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                </ul>
                            </li>
                        <?php } ?>
                        <!------------------------------------------------------------------------------------------------------->
                        <!-- Design - Thiết kế -->
                        <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-themes'] == 1 || $wo['user']['permission']['manage-site-design'] == 1 || $wo['user']['permission']['custom-code'] == 1))) { ?>
                            <li <?php echo ($page == 'manage-themes' || $page == 'manage-site-design' || $page == 'custom-code') ? 'class="open"' : ''; ?>>
                                <a href="#">
                                    <span class="nav-link-icon">
                                        <i class="material-icons">color_lens</i>
                                    </span>
                                    <span>
                                        <?php
                                        if (isset($wo['lang']['design'])) {
                                            echo $wo['lang']['design'];
                                        } else {
                                            echo $admin_sidebar_default["design"];
                                        }
                                        ?>
                                    </span>
                                </a>
                                <!------------------------------------------------------------------------------------------------------->
                                <!-- Themes - Chủ đề -->
                                <ul class="ml-menu">
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-themes'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-themes') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-themes'); ?>" data-ajax="?path=manage-themes">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['themes'])) {
                                                        echo $wo['lang']['themes'];
                                                    } else {
                                                        echo $admin_sidebar_default["themes"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Change Site Design - Thay đổi thiết kế trang web -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-site-design'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-site-design') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-site-design'); ?>" data-ajax="?path=manage-site-design">                                                
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['change_site_design'])) {
                                                        echo $wo['lang']['change_site_design'];
                                                    } else {
                                                        echo $admin_sidebar_default["change_site_design"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Custom JS / CSS - Tùy chỉnh JS/ CSS -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['custom-code'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'custom-code') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('custom-code'); ?>" data-ajax="?path=custom-code">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['custom_js_css'])) {
                                                        echo $wo['lang']['custom_js_css'];
                                                    } else {
                                                        echo $admin_sidebar_default["custom_js_css"];
                                                    }
                                                    ?>
                                                </span>                                                
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <!------------------------------------------------------------------------------------------------------->
                        <!-- Tools - Công cụ -->
                        <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-announcements'] == 1 || $wo['user']['permission']['mass-notifications'] == 1 || $wo['user']['permission']['ban-users'] == 1 || $wo['user']['permission']['generate-sitemap'] == 1 || $wo['user']['permission']['manage-invitation-keys'] == 1 || $wo['user']['permission']['backups'] == 1 || $wo['user']['permission']['auto-delete'] == 1 || $wo['user']['permission']['auto-friend'] == 1 || $wo['user']['permission']['fake-users'] == 1 || $wo['user']['permission']['auto-like'] == 1 || $wo['user']['permission']['auto-join'] == 1 || $wo['user']['permission']['send_email'] == 1 || $wo['user']['permission']['manage-invitation'] == 1))) { ?>
                            <li <?php echo ($page == 'manage-announcements' || $page == 'mass-notifications' || $page == 'ban-users' || $page == 'generate-sitemap' || $page == 'manage-invitation-keys' || $page == 'backups' || $page == 'auto-delete' || $page == 'auto-friend' || $page == 'fake-users' || $page == 'auto-like' || $page == 'auto-join' || $page == 'send_email' || $page == 'manage-invitation') ? 'class="open"' : ''; ?>>
                                <a href="#">
                                    <span class="nav-link-icon">
                                        <i class="material-icons">build</i>
                                    </span>
                                    <span>
                                        <?php
                                        if (isset($wo['lang']['tools'])) {
                                            echo $wo['lang']['tools'];
                                        } else {
                                            echo $admin_sidebar_default["tools"];
                                        }
                                        ?>
                                    </span>
                                </a>
                                <!------------------------------------------------------------------------------------------------------->
                                <ul class="ml-menu">
                                    <!-- Manage Emails -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage_emails'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage_emails') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage_emails'); ?>" data-ajax="?path=manage_emails">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['manage_email'])) {
                                                        echo $wo['lang']['manage_email'];
                                                    } else {
                                                        echo $admin_sidebar_default["manage_email"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Users Invitation -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-invitation'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-invitation') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-invitation'); ?>" data-ajax="?path=manage-invitation">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['user_invitation'])) {
                                                        echo $wo['lang']['user_invitation'];
                                                    } else {
                                                        echo $admin_sidebar_default["user_invitation"];
                                                    }
                                                    ?>
                                                </span>                                               
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Send email -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['send_email'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'send_email') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('send_email'); ?>" data-ajax="?path=send_email">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['send_email'])) {
                                                        echo $wo['lang']['send_email'];
                                                    } else {
                                                        echo $admin_sidebar_default["send_email"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Announcements - Thông báo -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-announcements'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-announcements') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-announcements'); ?>" data-ajax="?path=manage-announcements">
                                            <span>
                                                <?php
                                                if (isset($wo['lang']['announcements'])) {
                                                    echo $wo['lang']['announcements'];
                                                } else {
                                                    echo $admin_sidebar_default["announcements"];
                                                }
                                                ?>
                                            </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Auto Delete Data - Tự động xóa dữ liệu -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['auto-delete'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'auto-delete') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('auto-delete'); ?>" data-ajax="?path=auto-delete">
                                            <span>
                                                <?php
                                                if (isset($wo['lang']['auto_delete_data'])) {
                                                    echo $wo['lang']['auto_delete_data'];
                                                } else {
                                                    echo $admin_sidebar_default["auto_delete_data"];
                                                }
                                                ?>
                                            </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Auto Friend - Tự động kết bạn -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['auto-friend'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'auto-friend') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('auto-friend'); ?>" data-ajax="?path=auto-friend">
                                            <span>
                                                <?php
                                                if (isset($wo['lang']['auto_friend'])) {
                                                    echo $wo['lang']['auto_friend'];
                                                } else {
                                                    echo $admin_sidebar_default["auto_friend"];
                                                }
                                                ?>
                                            </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Auto Page Like - Tự động thích trang -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['auto-like'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'auto-like') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('auto-like'); ?>" data-ajax="?path=auto-like">
                                            <span>
                                                <?php
                                                if (isset($wo['lang']['auto_page_like'])) {
                                                    echo $wo['lang']['auto_page_like'];
                                                } else {
                                                    echo $admin_sidebar_default["auto_page_like"];
                                                }
                                                ?>
                                            </span>                                            
                                        </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                    <!-- Auto Group Join = Tự động tham gia vào nhóm -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['auto-join'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'auto-join') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('auto-join'); ?>" data-ajax="?path=auto-join">
                                            <span>
                                                <?php
                                                if (isset($wo['lang']['auto_group_join'])) {
                                                    echo $wo['lang']['auto_group_join'];
                                                } else {
                                                    echo $admin_sidebar_default["auto_group_join"];
                                                }
                                                ?>
                                            </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->
                                     <!-- Fake User Generator  -- Trình tạo người dùng giả mạo -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['fake-users'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'fake-users') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('fake-users'); ?>" data-ajax="?path=fake-users">
                                            <span>
                                                <?php
                                                if (isset($wo['lang']['fake_user_generator'])) {
                                                    echo $wo['lang']['fake_user_generator'];
                                                } else {
                                                    echo $admin_sidebar_default["fake_user_generator"];
                                                }
                                                ?>
                                            </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-------------------------------------------------------------------------------------------------------> 
                                    <!-- Mass Notifications  --  Thông báo hàng loạt -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['mass-notifications'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'mass-notifications') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('mass-notifications'); ?>" data-ajax="?path=mass-notifications">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['mass_notifications'])) {
                                                        echo $wo['lang']['mass_notifications'];
                                                    } else {
                                                        echo $admin_sidebar_default["mass_notifications"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!-------------------------------------------------------------------------------------------------------> 
                                    <!-- Black List  --  Danh sách đen -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['ban-users'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'ban-users') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('ban-users'); ?>" data-ajax="?path=ban-users">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['black_list'])) {
                                                        echo $wo['lang']['black_list'];
                                                    } else {
                                                        echo $admin_sidebar_default["black_list"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <!------------------------------------------------------------------------------------------------------->                  
                                    <!-- Generate SiteMap - Tạo sơ đồ trang web -->
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['generate-sitemap'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'generate-sitemap') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('generate-sitemap'); ?>" data-ajax="?path=generate-sitemap">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['generate_site_map'])) {
                                                        echo $wo['lang']['generate_site_map'];
                                                    } else {
                                                        echo $admin_sidebar_default["generate_site_map"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-invitation-keys'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-invitation-keys') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-invitation-keys'); ?>" data-ajax="?path=manage-invitation-keys">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['invitation_codes'])) {
                                                        echo $wo['lang']['invitation_codes'];
                                                    } else {
                                                        echo $admin_sidebar_default["invitation_codes"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['backups'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'backups') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('backups'); ?>" data-ajax="?path=backups">
                                                <span>
                                                    <?php
                                                    if (isset($wo['lang']['backup_sql_files'])) {
                                                        echo $wo['lang']['backup_sql_files'];
                                                    } else {
                                                        echo $admin_sidebar_default["backup_sql_files"];
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <!------------------------------------------------------------------------------------------------------->

                        <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['edit-terms-pages'] == 1 || $wo['user']['permission']['manage_terms_pages'] == 1 || $wo['user']['permission']['manage-custom-pages'] == 1 || $wo['user']['permission']['add-new-custom-page'] == 1 || $wo['user']['permission']['edit-custom-page'] == 1))) { ?>
                            <li <?php echo ($page == 'edit-terms-pages' || $page == 'manage_terms_pages' || $page == 'manage-custom-pages' || $page == 'add-new-custom-page' || $page == 'edit-custom-page') ? 'class="open"' : ''; ?>>
                                <a href="#">
                                    <span class="nav-link-icon">
                                        <i class="material-icons">description</i>
                                    </span>
                                    <span>
                                        <?php
                                            if (isset($wo['lang']['pages'])) {
                                                echo $wo['lang']['pages'];
                                            } else {
                                                echo $admin_sidebar_default["pages"];
                                            }
                                        ?> 
                                    </span>
                                </a>
                                <ul class="ml-menu">
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-custom-pages'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-custom-pages') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-custom-pages'); ?>" data-ajax="?path=manage-custom-pages">
                                                <span>
                                                    <?php
                                                        if (isset($wo['lang']['manage_custom_pages'])) {
                                                            echo $wo['lang']['manage_custom_pages'];
                                                        } else {
                                                            echo $admin_sidebar_default["manage_custom_pages"];
                                                        }
                                                    ?> 
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['edit-terms-pages'] == 1 && $wo['user']['permission']['manage_terms_pages'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage_terms_pages' || $page == 'edit-terms-pages') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage_terms_pages'); ?>" data-ajax="?path=manage_terms_pages">
                                                <span>
                                                    <?php
                                                        if (isset($wo['lang']['manage_terms_pages'])) {
                                                            echo $wo['lang']['manage_terms_pages'];
                                                        } else {
                                                            echo $admin_sidebar_default["manage_terms_pages"];
                                                        }
                                                    ?> 
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-reports'] == 1 || $wo['user']['permission']['user_reports'] == 1))) { ?>
                            <li <?php echo ($page == 'manage-reports' || $page == 'user_reports') ? 'class="open"' : ''; ?>>
                                <a href="#">
                                    <span class="nav-link-icon">
                                        <i class="material-icons">warning</i>
                                    </span>
                                    <span>
                                        <?php
                                            if (isset($wo['lang']['reports'])) {
                                                echo $wo['lang']['reports'];
                                            } else {
                                                echo $admin_sidebar_default["reports"];
                                            }
                                        ?> 
                                    </span>
                                </a>
                                <ul class="ml-menu">
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-reports'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-reports') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-reports'); ?>" data-ajax="?path=manage-reports">
                                                <span>
                                                    <?php
                                                        if (isset($wo['lang']['manage_reports'])) {
                                                            echo $wo['lang']['manage_reports'];
                                                        } else {
                                                            echo $admin_sidebar_default["manage_reports"];
                                                        }
                                                    ?> 
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['user_reports'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'user_reports') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('user_reports'); ?>" data-ajax="?path=user_reports">
                                                <span>
                                                    <?php
                                                        if (isset($wo['lang']['manage_users_reports'])) {
                                                            echo $wo['lang']['manage_users_reports'];
                                                        } else {
                                                            echo $admin_sidebar_default["manage_users_reports"];
                                                        }
                                                    ?> 
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>

                        <!-- Cài đặt API -->
                        <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['verfiy-applications'] == 1 || $wo['user']['permission']['push-notifications-system'] == 1 || $wo['user']['permission']['manage-api-access-keys'] == 1 || $wo['user']['permission']['manage-third-psites'] == 1))) { ?>
                            <li <?php echo ($page == 'verfiy-applications' || $page == 'push-notifications-system' || $page == 'manage-api-access-keys' || $page == 'manage-third-psites') ? 'class="open"' : ''; ?>>
                                <a href="#">
                                    <span class="nav-link-icon">
                                        <i class="material-icons">compare_arrows</i>
                                    </span>
                                    <span>
                                        <?php
                                            if (isset($wo['lang']['api_settings'])) {
                                                echo $wo['lang']['api_settings'];
                                            } else {
                                                echo $admin_sidebar_default["api_settings"];
                                            }
                                        ?>
                                    </span>
                                </a>
                                <ul class="ml-menu">
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-api-access-keys'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-api-access-keys') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-api-access-keys'); ?>" data-ajax="?path=manage-api-access-keys">
                                                <span>
                                                    <?php
                                                        if (isset($wo['lang']['manage_api_server_key'])) {
                                                            echo $wo['lang']['manage_api_server_key'];
                                                        } else {
                                                            echo $admin_sidebar_default["manage_api_server_key"];
                                                        }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['push-notifications-system'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'push-notifications-system') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('push-notifications-system'); ?>" data-ajax="?path=push-notifications-system">
                                                <span>
                                                    <?php
                                                        if (isset($wo['lang']['push_notifications_settings'])) {
                                                            echo $wo['lang']['push_notifications_settings'];
                                                        } else {
                                                            echo $admin_sidebar_default["push_notifications_settings"];
                                                        }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['verfiy-applications'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'verfiy-applications') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('verfiy-applications'); ?>" data-ajax="?path=verfiy-applications">
                                                <span>
                                                    <?php
                                                        if (isset($wo['lang']['verify_applications'])) {
                                                            echo $wo['lang']['verify_applications'];
                                                        } else {
                                                            echo $admin_sidebar_default["verify_applications"];
                                                        }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-third-psites'] == 1)) { ?>
                                        <li>
                                            <a <?php echo ($page == 'manage-third-psites') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-third-psites'); ?>" data-ajax="?path=manage-third-psites">
                                                <span>
                                                    <?php
                                                        if (isset($wo['lang']['3rd_party_scripts'])) {
                                                            echo $wo['lang']['3rd_party_scripts'];
                                                        } else {
                                                            echo $admin_sidebar_default["3rd_party_scripts"];
                                                        }
                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-updates'] == 1))) { ?>
                            <!--  <li <?php echo ($page == 'manage-updates') ? 'class="active"' : ''; ?>>
                        <a href="#">
                            <span class="nav-link-icon">
                                <i class="material-icons">cloud_download</i>
                            </span>
                            <span>Updates</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-updates'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-updates') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('manage-updates'); ?>" data-ajax="?path=manage-updates">Updates & Bug Fixes</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li> -->
                        <?php } ?>

                        <!-- Trạng thái hệ thống -->
                        <li>
                            <a <?php echo ($page == 'system_status') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('system_status'); ?>" data-ajax="?path=system_status">
                                <span class="nav-link-icon">
                                    <i class="material-icons">info</i>
                                </span>
                                <span>
                                    <?php
                                        if (isset($wo['lang']['system_status'])) {
                                            echo $wo['lang']['system_status'];
                                        } else {
                                            echo $admin_sidebar_default["system_status"];
                                        }
                                    ?>
                                </span>
                            </a>
                        </li>
                        <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['changelog'] == 1))) { ?>
                            <li>
                                <a <?php echo ($page == 'changelog') ? 'class="active"' : ''; ?> href="<?php echo Wo_LoadAdminLinkSettings('changelog'); ?>" data-ajax="?path=changelog">
                                    <span class="nav-link-icon">
                                        <i class="material-icons">update</i>
                                    </span>
                                    <span>
                                        <?php
                                            if (isset($wo['lang']['changelogs'])) {
                                                echo $wo['lang']['changelogs'];
                                            } else {
                                                echo $admin_sidebar_default["changelogs"];
                                            }
                                        ?>
                                    </span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($is_admin == true) { ?>
                            <li>
                                <a href="http://docs.wowonder.com/#faq" target="_blank">
                                    <span class="nav-link-icon">
                                        <i class="material-icons">more_vert</i>
                                    </span>
                                    <span>FAQs</span>
                                </a>
                            </li>
                        <?php } ?>
                        <a class="pow_link" href="https://bit.ly/2R2jrcz" target="_blank">
                            <p>Powered by</p>
                            <img src="https://demo.wowonder.com/themes/default/img/logo.png">
                            <b class="badge">v<?php echo $wo['config']['version']; ?></b>
                        </a>
                    </ul>
                </div>
                <!-- ------------------------------------------------------------------------------------------------------------------- -->
            </div>
            <!-- end::navigation -->

            <!-- Content body -->
            <div class="content-body">
                <!-- Content -->
                <div class="content ">
                    <?php echo $page_loaded; ?>
                </div>
                <!-- ./ Content -->

            </div>
            <!-- ./ Content body -->
        </div>
        <!-- ./ Content wrapper -->
    </div>
    <!-- ./ Layout wrapper -->
    <div class="select_pro_model"></div>
    <script src="<?php echo Wo_LoadAdminLink('vendors/sweetalert/sweetalert.min.js'); ?>"></script>
    <script src="<?php echo (Wo_LoadAdminLink('vendors/select2/js/select2.min.js')) ?>"></script>
    <script src="<?php echo (Wo_LoadAdminLink('assets/js/examples/select2.js')) ?>"></script>
    <script src="<?php echo (Wo_LoadAdminLink('assets/js/app.min.js')) ?>"></script>
    <script type="text/javascript">
        function showEncryptedAlert() {
            <?php foreach ($wo['encryptedKeys'] as $key => $value) {
                if (!empty($wo['hiddenConfig'][$value])) { ?>
                    if ($(".alert_<?php echo ($value) ?>").length == 0) {
                        $("input[name='<?php echo ($value) ?>']").before('<div class="alert alert-danger alert_<?php echo ($value) ?>" role="alert">The secret key is not showing due security reasons, you can still overwrite the current one.</div>');
                    }
            <?php }
            } ?>
        }

        function Wo_SubmitSelectProForm(self) {
            let form_select_pro = $('.SelectProModalForm');
            form_select_pro.ajaxForm({
                url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=select_pro_package',
                beforeSend: function() {
                    form_select_pro.find('.waves-effect').text('Please wait..');
                },
                success: function(data) {
                    form_select_pro.find('.waves-effect').text('Save');
                    $('#SelectProModal').animate({
                        scrollTop: 0 // Scroll to top of body
                    }, 500);
                    if (data.status == 200) {
                        $('#SelectProModalAlert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Settings updated successfully</div>');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else {
                        $('#SelectProModalAlert').html('<div class="alert alert-danger">' + data.message + '</div>');
                    }
                }
            });
            form_select_pro.submit();
        }

        function SelectProModel(type, self) {
            if ($(self).val() == 'pro') {
                hash_id = $('#hash_id').val();
                $.get(Wo_Ajax_Requests_File(), {
                    f: 'admin_setting',
                    s: 'select_pro_model',
                    hash_id: hash_id,
                    type: type
                }, function(data) {
                    $('.select_pro_model').html('');
                    $('.select_pro_model').html(data.html);
                    $('#SelectProModal').modal('show');
                });
            }

        }

        function SelectDirectoryLandingPage(type, self) {
            // if ($(self).val() == 'pro') {
            //     hash_id = $('#hash_id').val();
            //     $.get(Wo_Ajax_Requests_File(),{f:'admin_setting', s:'select_pro_model', hash_id: hash_id, type: type}, function(data) {
            //         $('.select_pro_model').html('');
            //         $('.select_pro_model').html(data.html);
            //         $('#SelectProModal').modal('show');
            //     });
            // }

        }

        function ChangeMode(mode) {
            if (mode == 'day') {
                $('body').removeClass('dark');
                $('.admin_mode').html('<span id="night-mode-text">Night mode</span><svg class="feather feather-moon float-right" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>');
                $('.admin_mode').attr('onclick', "ChangeMode('night')");
            } else {
                $('body').addClass('dark');
                $('.admin_mode').html('<span id="night-mode-text">Day mode</span><svg class="feather feather-moon float-right" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>');
                $('.admin_mode').attr('onclick', "ChangeMode('day')");
            }
            hash_id = $('#hash_id').val();
            $.get(Wo_Ajax_Requests_File(), {
                f: 'admin_setting',
                s: 'change_mode',
                hash_id: hash_id
            }, function(data) {});
        }
        $(document).ready(function() {
            showEncryptedAlert();
            $('[data-toggle="popover"]').popover();
            var hash = $('.main_session').val();
            $.ajaxSetup({
                data: {
                    hash: hash
                },
                cache: false
            });
        });
        $('body').on('click', function(e) {
            $('.dropdown-animating').removeClass('show');
            $('.dropdown-menu').removeClass('show');
        });

        function searchInFiles(keyword) {
            if (keyword.length > 2) {
                $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=search_in_pages', {
                    keyword: keyword
                }, function(data, textStatus, xhr) {
                    if (data.html != '') {
                        $('#search_for_bar').html(data.html)
                    } else {
                        $('#search_for_bar').html('')
                    }
                });
            } else {
                $('#search_for_bar').html('')
            }
        }
        jQuery(document).ready(function($) {
            jQuery.fn.highlight = function(str, className) {
                if (str != '') {
                    var aTags = document.getElementsByTagName("h2");
                    var bTags = document.getElementsByTagName("label");
                    var cTags = document.getElementsByTagName("h3");
                    var dTags = document.getElementsByTagName("h6");
                    var searchText = str.toLowerCase();

                    if (aTags.length > 0) {
                        for (var i = 0; i < aTags.length; i++) {
                            var tag_text = aTags[i].textContent.toLowerCase();
                            if (tag_text.indexOf(searchText) != -1) {
                                $(aTags[i]).addClass(className)
                            }
                        }
                    }

                    if (bTags.length > 0) {
                        for (var i = 0; i < bTags.length; i++) {
                            var tag_text = bTags[i].textContent.toLowerCase();
                            if (tag_text.indexOf(searchText) != -1) {
                                $(bTags[i]).addClass(className)
                            }
                        }
                    }

                    if (cTags.length > 0) {
                        for (var i = 0; i < cTags.length; i++) {
                            var tag_text = cTags[i].textContent.toLowerCase();
                            if (tag_text.indexOf(searchText) != -1) {
                                $(cTags[i]).addClass(className)
                            }
                        }
                    }

                    if (dTags.length > 0) {
                        for (var i = 0; i < dTags.length; i++) {
                            var tag_text = dTags[i].textContent.toLowerCase();
                            if (tag_text.indexOf(searchText) != -1) {
                                $(dTags[i]).addClass(className)
                            }
                        }
                    }
                }
            };
            jQuery.fn.highlight("<?php echo (!empty($_GET['highlight']) ? $_GET['highlight'] : '') ?>", 'highlight_text');
            $.get(Wo_Ajax_Requests_File(), {
                f: 'admin_setting',
                s: 'exchange'
            });
        });
        $(document).on('click', '#search_for_bar a', function(event) {
            event.preventDefault();
            location.href = $(this).attr('href');
        });

        function ReadNotify() {
            hash_id = $('#hash_id').val();
            $.get(Wo_Ajax_Requests_File(), {
                f: 'admin_setting',
                s: 'ReadNotify',
                hash_id: hash_id
            });
            location.reload();
        }

        function delay(callback, ms) {
            var timer = 0;
            return function() {
                var context = this,
                    args = arguments;
                clearTimeout(timer);
                timer = setTimeout(function() {
                    callback.apply(context, args);
                }, ms || 0);
            };
        }
        let container_fluid_height = $('.container-fluid').height();

        setInterval(function() {
            if (container_fluid_height != $('.container-fluid').height()) {
                container_fluid_height = $('.container-fluid').height();
                $(".content").getNiceScroll().resize();
            }
        }, 500);
    </script>

</body>

</html>