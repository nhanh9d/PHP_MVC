<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Index</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100i%2C200%2C200i%2C300%2C300i%2C400%2C400i%2C500%2C500i%2C600%2C600i%2C700%2C700i%2C800%2C800i%2C900%2C900i&#038;ver=4.9.12' type='text/css' media='all' />
  <link rel="stylesheet" href="/public/stylesheets/app.css">
  <link rel="stylesheet" href="/public/stylesheets/bootstrap.min.css">
  <link rel="stylesheet" href="/public/stylesheets/mpc-styles.css">
  <link rel="stylesheet" href="/public/stylesheets/js_composer.min.css">
  <link rel="stylesheet" href="/public/stylesheets/woocommerce-layout.css">
  <link rel="stylesheet" href="/public/stylesheets/woocommerce.css">
  <link rel="stylesheet" href="/public/stylesheets/media.css">
  <link rel="stylesheet" href="/public/stylesheets/ion.css">
  <link rel="stylesheet" href="/public/stylesheets/footer.css">
  <link rel="stylesheet" href="/public/stylesheets/header.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="wrap">
    <div class="body-wrap">
      <header class="site-header">
        <div class="c-header__top">
          <ul class="search-main-menu">
            <li>
              <form id="blog-post-search" action="https://comicola.com/" method="get">
                <input type="text" placeholder="Tìm kiếm..." name="s" value="">
                <input type="submit" value="Tìm kiếm">
              </form>
            </li>
          </ul>
          <div class="main-navigation style-1 ">
            <div class="container ">
              <div class="row">
                <div class="col-md-12">
                  <div class="main-navigation_wrap">
                    <div class="wrap_branding">
                      <a class="logo" href="/" title="Comicola">
                        <img class="img-responsive" src="https://comicola.com/wp-content/uploads/2018/10/comicola.png" alt="Comicola" />
                      </a>
                    </div>
                    <div class="main-menu">
                      <ul class="nav navbar-nav main-navbar"></ul> </div>
                      <div class="search-navigation search-sidebar">
                        <div class="search-navigation__wrap">
                          <!-- <ul class="main-menu-search nav-menu">
                          <li class="menu-search">
                          <a href="https://comicola.com/cart/" class="woo-cart-main-menu">
                          <i class="ion-ios-cart"></i>
                        </a>
                      </li>
                      <li class="menu-search">
                      <a id="search-btn" class="open-search-main-menu">
                      <i class="ion-ios-search-strong"></i>
                      <i class="ion-android-close"></i>
                    </a>
                  </li>
                </ul> -->
              </div>
            </div>
            <div class="c-togle__menu">
              <button type="button" class="menu_icon__open">
                <span></span> <span></span> <span></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="mobile-menu menu-collapse off-canvas">
  <div class="close-nav">
    <button class="menu_icon__close">
      <span></span> <span></span>
    </button>
  </div>
  <div class="c-modal_item">

    <span class="c-modal_sign-in">
      <a href="javascript:void(0)" data-toggle="modal" data-target="#form-login" class="btn-active-modal">Đăng nhập</a>
    </span>
    <span class="c-modal_sign-up">
      <a href="javascript:void(0)" data-toggle="modal" data-target="#form-sign-up" class="btn-active-modal">Đăng ký</a>
    </span>
  </div>
  <nav class="off-menu">
    <ul id="menu-main-menu-1" class="nav navbar-nav main-navbar"></ul> </nav>
  </div>
  <div class="no-subnav c-sub-header-nav with-border  ">
    <div class="container ">
      <div class="c-sub-nav_wrap">
        <div class="sub-nav_content">
          <ul class="sub-nav_list list-inline second-menu">
            <?php if (isset($_SESSION['client'])) { ?>
              <li class="sub-nav_list-item"><a href="/BorrowBook/">Xem các sách đã đăng ký thuê</a></li>
              <li class="sub-nav_list-item"><a href="#">Yêu cầu thêm đầu sách</a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="c-modal_item">
          <?php if (isset($_SESSION['client'])) { ?>
            <a class="btn-active-modal" href="/login/logout">Đăng xuất</a>
          <?php } else { ?>
            <a class="btn-active-modal" id='btn-login'>Đăng nhập</a>
            <a class="btn-active-modal" id='btn-register'>Đăng ký</a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</header>
