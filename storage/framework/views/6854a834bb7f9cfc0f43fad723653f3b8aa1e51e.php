<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset("assets/media/image/favicon.png")); ?>"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="<?php echo e(asset("vendors/bundle.css")); ?>" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="<?php echo e(asset("vendors/datepicker/daterangepicker.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(asset("assets/Datepiker/persian-datepicker.css")); ?>">


    <!-- Fullcalendar -->
    <link rel="stylesheet" href="<?php echo e(asset("vendors/fullcalendar/fullcalendar.min.css")); ?>" type="text/css">
    <link href='<?php echo e(asset("assets/Cal/fullcalendar.css")); ?>' rel='stylesheet'/>
    <link href='<?php echo e(asset("assets/Cal/fullcalendar.print.css")); ?>' rel='stylesheet' media='print'/>

    <!-- Vmap -->
    <link rel="stylesheet" href="<?php echo e(asset("vendors/vmap/jqvmap.min.css")); ?>">

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo e(asset("assets/css/app.min.css")); ?>" type="text/css">


    <?php echo $__env->yieldContent("custom-style"); ?>
</head>
<body>

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<!-- begin::header -->
<div class="header">

    <div>
        <ul class="navbar-nav">

            <!-- begin::navigation-toggler -->
            <li class="nav-item navigation-toggler">
                <a href="#" class="nav-link" title="Hide navigation">
                    <i data-feather="arrow-left"></i>
                </a>
            </li>
            <li class="nav-item navigation-toggler mobile-toggler">
                <a href="#" class="nav-link" title="Show navigation">
                    <i data-feather="menu"></i>
                </a>
            </li>
            <!-- end::navigation-toggler -->

            <li class="nav-item">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">??????????</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?php echo e(route('user.create')); ?>" class="dropdown-item">??????????</a>
                    <a href="<?php echo e(route('category.list')); ?>" class="dropdown-item">???????????????????</a>
                    <a href="<?php echo e(route('product.create')); ?>" class="dropdown-item">??????????</a>
                </div>
            </li>
        </ul>
    </div>

    <div>
        <ul class="navbar-nav">
            <!-- begin::header minimize/maximize -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" title="???????? ????????" data-toggle="fullscreen">
                    <i class="maximize" data-feather="maximize"></i>
                    <i class="minimize" data-feather="minimize"></i>
                </a>
            </li>
            <!-- end::header minimize/maximize -->

            <!-- begin::header notification dropdown -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link nav-link-notify" title="?????????????????????" data-toggle="dropdown">
                    <i data-feather="bell"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-left dropdown-menu-big">
                    <div class="p-4 text-center d-flex justify-content-between"
                         data-backround-image="<?php echo e(asset("assets/media/image/image1.jpg")); ?>">
                        <h6 class="mb-0">?????????????????????</h6>
                        <small class="font-size-11 opacity-7">1 ?????????????? ???????????? ????????</small>
                    </div>
                    <div>
                        <ul class="list-group list-group-flush">
                            <li>
                                <a href="#" class="list-group-item d-flex hide-show-toggler">
                                    <div>
                                        <figure class="avatar avatar-sm m-r-15">
                                                <span
                                                        class="avatar-title bg-success-bright text-success rounded-circle">
                                                    <i class="ti-user"></i>
                                                </span>
                                        </figure>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0 line-height-20 d-flex justify-content-between">
                                            ?????? ?????? ???????????? ????????
                                            <i title="Mark as read" data-toggle="tooltip"
                                               class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                        </p>
                                        <span class="text-muted small">20 ?????????? ??????</span>
                                    </div>
                                </a>
                            </li>
                            <li class="text-divider small pb-2 pl-3 pt-3">
                                <span>??????????????????????? ????????</span>
                            </li>
                            <li>
                                <a href="#" class="list-group-item d-flex hide-show-toggler">
                                    <div>
                                        <figure class="avatar avatar-sm m-r-15">
                                                <span
                                                        class="avatar-title bg-warning-bright text-warning rounded-circle">
                                                    <i class="ti-package"></i>
                                                </span>
                                        </figure>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0 line-height-20 d-flex justify-content-between">
                                            ?????????? ???????? ???????????? ????
                                            <i title="Mark as unread" data-toggle="tooltip"
                                               class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                        </p>
                                        <span class="text-muted small">45 ?????????? ??????</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="list-group-item d-flex align-items-center hide-show-toggler">
                                    <div>
                                        <figure class="avatar avatar-sm m-r-15">
                                                <span class="avatar-title bg-danger-bright text-danger rounded-circle">
                                                    <i class="ti-server"></i>
                                                </span>
                                        </figure>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0 line-height-20 d-flex justify-content-between">
                                            ???? ?????? ???????? ???????? ?????????? ?????? ??????
                                            <i title="Mark as unread" data-toggle="tooltip"
                                               class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                        </p>
                                        <span class="text-muted small">55 ?????????? ??????</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="list-group-item d-flex align-items-center hide-show-toggler">
                                    <div>
                                        <figure class="avatar avatar-sm m-r-15">
                                                <span class="avatar-title bg-info-bright text-info rounded-circle">
                                                    <i class="ti-layers"></i>
                                                </span>
                                        </figure>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0 line-height-20 d-flex justify-content-between">
                                            ???? ?????? ?????????? ????????????????
                                            <i title="Mark as unread" data-toggle="tooltip"
                                               class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                        </p>
                                        <span class="text-muted small">??????????</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="p-2 text-right">
                        <ul class="list-inline small">
                            <li class="list-inline-item">
                                <a href="#">???????????????????? ???? ?????????? ???????????? ??????</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <!-- end::header notification dropdown -->
        </ul>

        <!-- begin::mobile header toggler -->
        <ul class="navbar-nav d-flex align-items-center">
            <li class="nav-item header-toggler">
                <a href="#" class="nav-link">
                    <i data-feather="arrow-down"></i>
                </a>
            </li>
        </ul>
        <!-- end::mobile header toggler -->
    </div>

</div>
<!-- end::header -->

<!-- begin::main -->
<div id="main">

    <!-- begin::navigation -->
    <div class="navigation">

        <div class="navigation-menu-tab">
            <div>
                <div class="navigation-menu-tab-header" data-toggle="tooltip" title=""
                     data-placement="right">
                    <a href="" class="nav-link" data-toggle="dropdown"
                       aria-expanded="false">
                        <figure class="avatar avatar-sm">
                            <img
                                    src=""
                                    class="rounded-circle" alt="avatar">
                        </figure>
                    </a>
                </div>
            </div>
            <div class="flex-grow-1">
                <ul>
                    <li>
                        <a class="<?php echo e((request()->is('admin')) ? 'active' : ''); ?>" href="#" data-toggle="tooltip"
                           data-placement="right" title="??????????????" data-nav-target="#dashboards">
                            <i data-feather="bar-chart-2"></i>
                        </a>
                    </li>
                    <li>
                        <a class="<?php echo e((request()->routeIs(["category.list","category.edit","product.create","product.list"])) ? 'active' : ''); ?>"
                           href="#" data-toggle="tooltip" data-placement="right" title="??????????????"
                           data-nav-target="#apps">
                            <i data-feather="command"></i>
                        </a>
                    </li>
                    <li>
                        <a class="<?php echo e((request()->routeIs(["orders.index"])) ? 'active' : ''); ?>" href="#"
                           data-toggle="tooltip"
                           data-placement="right" title="??????????????" data-nav-target="#orders">
                            <i data-feather="shopping-bag"></i>
                        </a>
                    </li>
                    <li>
                        <a class="<?php echo e((request()->routeIs(["user.list","user.edit"])) ? 'active' : ''); ?>" href="#"
                           data-toggle="tooltip" data-placement="right" title="??????????????"
                           data-nav-target="#elements">
                            <i data-feather="users"></i>
                        </a>
                    </li>
                    <li>
                        <a class="<?php echo e((request()->routeIs(["tickets.index","tickets.list","tickets.create"])) ? 'active' : ''); ?>"
                           href="#" data-toggle="tooltip" data-placement="right" title="???????? ????"
                           data-nav-target="#tickets">
                            <i data-feather="message-square"></i>
                        </a>
                    </li>
                    <li>
                        <a class="<?php echo e((request()->routeIs(["terms.*","faqs.*"])) ? 'active' : ''); ?>"
                           href="#" data-toggle="tooltip" data-placement="right" title="??????????"
                           data-nav-target="#pages">
                            <i data-feather="copy"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <ul>
                    <li>
                        <a class="<?php echo e((request()->routeIs(["settings.*",'comments.*'])) ? 'active' : ''); ?>"
                           href="#" data-toggle="tooltip" data-placement="right" title="??????????????"
                           data-nav-target="#settings">
                            <i data-feather="settings"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            ????????
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- begin::navigation menu -->
        <div class="navigation-menu-body">

            <!-- begin::navigation-logo -->
            <div>
                <div id="navigation-logo">
                    <a href="index.html">
                        <img class="logo" src="<?php echo e(asset("assets/media/image/logo-F.png")); ?>" alt="logo">
                        <img class="logo-light" src="<?php echo e(asset("assets/media/image/logo-light.png")); ?>" alt="light logo">
                    </a>
                </div>
            </div>
            <!-- end::navigation-logo -->

            <div class="navigation-menu-group">

                <div class="<?php echo e((request()->is('admin')) ? 'open' : ''); ?>" id="dashboards">
                    <ul>
                        <li class="navigation-divider">??????????????</li>
                        <li><a class="<?php echo e((request()->routeIs("dashboard")) ? 'active' : ''); ?>"
                               href="<?php echo e(route("dashboard")); ?>">?????????????? ??????</a></li>
                        <li><a class="<?php echo e((request()->routeIs("dashboard")) ? 'active' : ''); ?>"
                               href="<?php echo e(route("product.list")); ?>">??????????????</a></li>
                    </ul>
                </div>
                <div id="apps"
                     class="<?php echo e((request()->is('admin/products/list*') or request()->routeIs(["category.list","category.edit"])) ? 'open' : ''); ?>">
                    <ul>
                        <li class="navigation-divider">??????????????</li>
                        <li>
                            <a href="<?php echo e(route('product.list')); ?>"
                               class="<?php echo e((request()->routeIs(["product.list"])) ? 'active' : ''); ?>">
                                <span>???????? ??????????????</span>
                                <span class="badge badge-danger"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('product.create')); ?>"
                               class="<?php echo e((request()->routeIs(["product.create"])) ? 'active' : ''); ?>">
                                <span>???????????? ??????????</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('voucher.list')); ?>"
                               class="<?php echo e((request()->routeIs(["voucher.list"])) ? 'active' : ''); ?>">
                                <span>???????? ???????? ????</span>
                                <span class="badge badge-danger"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('category.list')); ?>"
                               class="<?php echo e((request()->routeIs(["category.list","category.edit"])) ? 'active' : ''); ?>">
                                <span>???????? ???????? ????</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span>???? ??????</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="orders" class="<?php echo e((request()->routeIs(["orders.*"])) ? 'open' : ''); ?>">
                    <ul>
                        <li class="navigation-divider">??????????????</li>
                        <li>
                            <a href=""
                               class="<?php echo e((request()->routeIs("orders.index")) ? 'active' : ''); ?>">
                                <span>???????? ?????????? ???? ????????</span>
                            </a>
                        </li>
                        <li>
                            <a href=""
                               class="<?php echo e((request()->routeIs("orders.auto")) ? 'active' : ''); ?>">
                                <span>???????? ?????????? ???? ????????????????</span>
                            </a>
                        </li>
                        <li>
                            <a href=""
                               class="<?php echo e((request()->routeIs("orders.transaction")) ? 'active' : ''); ?>">
                                <span>???????? ???????????? ????</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="elements"
                     class="<?php echo e((request()->routeIs(["user.list","user.create","user.edit"])) ? 'open' : ''); ?>">
                    <ul>
                        <li class="navigation-divider">??????????????</li>
                        <li>
                            <a href="<?php echo e(route('user.list')); ?>"
                               class="<?php echo e((request()->routeIs("user.list")) ? 'active' : ''); ?>">
                                <span>???????? ??????????????</span>
                                <span class="badge badge-danger">5</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('user.create')); ?>"
                               class="<?php echo e((request()->routeIs(["user.create","user.edit"])) ? 'active' : ''); ?>">
                                <span>???????????? ??????????</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="tickets"
                     class="<?php echo e((request()->routeIs(["ticket.create","ticket.list"])) ? 'open' : ''); ?>">
                    <ul>
                        <li class="navigation-divider">???????? ????</li>
                        <li>
                            <a href=""
                               class="<?php echo e((request()->routeIs(["tickets.index"])) ? 'active' : ''); ?>">
                                <span>???????? ????</span>
                            </a>
                        </li>
                        <li class="d-none">
                            <a href=""
                               class="<?php echo e((request()->routeIs(["tickets.create"])) ? 'active' : ''); ?>">
                                <span>???????????? ????????</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="pages"
                     class="<?php echo e((request()->routeIs(["terms.*","faqs.*"])) ? 'open' : ''); ?>">
                    <ul>
                        <li class="navigation-divider">??????????</li>
                        <li>
                            <a href=""
                               class="<?php echo e((request()->routeIs(["terms.*"])) ? 'active' : ''); ?>">
                                <span>terms</span>
                            </a>
                        </li>
                        <li>
                            <a href=""
                               class="<?php echo e((request()->routeIs(["faqs.*"])) ? 'active' : ''); ?>">
                                <span>faqs</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="settings" class="<?php echo e((request()->routeIs(["settings.*","comments.*"])) ? 'open' : ''); ?>">
                    <ul>
                        <li class="navigation-divider">??????????????</li>
                        <li>
                            <a href=""
                               class="<?php echo e((request()->routeIs(["settings.themeSettings.index"])) ? 'active' : ''); ?>">
                                <span>?????????????? ????????</span>
                            </a>
                        </li>
                        <li>
                            <a href=""
                               class="<?php echo e((request()->routeIs(["settings.panels"])) ? 'active' : ''); ?>">
                                <span>?????????????? ?????? ????</span>
                            </a>
                        </li>
                        <li>
                            <a href=""
                               class="<?php echo e((request()->routeIs(["comments.*"])) ? 'active' : ''); ?>">
                                <span>?????????????? ?????????? ????</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end::navigation menu -->

    </div>
    <!-- end::navigation -->

    <!-- begin::main-content -->
    <div class="main-content">
    <?php echo $__env->yieldContent('content'); ?>

    <!-- begin::footer -->
    
    <!-- end::footer -->
    </div>
    <!-- end::main-content -->

</div>
<!-- end::main -->


<!-- Plugin scripts -->
<script src="<?php echo e(asset("vendors/bundle.js")); ?>"></script>

<!-- Chartjs -->
<script src="<?php echo e(asset("vendors/charts/chartjs/chart.min.js")); ?>"></script>

<!-- Apex chart -->
<script src="<?php echo e(asset("vendors/charts/apex/apexcharts.min.js")); ?>"></script>

<!-- Circle progress -->
<script src="<?php echo e(asset("vendors/circle-progress/circle-progress.min.js")); ?>"></script>

<!-- Peity -->
<script src="<?php echo e(asset("vendors/charts/peity/jquery.peity.min.js")); ?>"></script>
<script src="<?php echo e(asset("assets/js/examples/charts/peity.js")); ?>"></script>

<!-- Datepicker -->





<!-- Slick -->
<script src="<?php echo e(asset("vendors/slick/slick.min.js")); ?>"></script>

<!-- Vamp -->
<script src="<?php echo e(asset("vendors/vmap/jquery.vmap.min.js")); ?>"></script>
<script src="<?php echo e(asset("vendors/vmap/maps/jquery.vmap.usa.js")); ?>"></script>
<script src="<?php echo e(asset("assets/js/examples/vmap.js")); ?>"></script>


<!-- a -->
<script src='<?php echo e(asset("assets/Cal/moment.js")); ?>'></script>





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


<!-- App scripts -->
<script src="<?php echo e(asset("assets/js/app.min.js")); ?>"></script>

<?php echo $__env->yieldContent("custom-script"); ?>
</body>
</html>
<?php /**PATH C:\Users\SamiraVz\Desktop\web-design\resources\views/admin/main.blade.php ENDPATH**/ ?>