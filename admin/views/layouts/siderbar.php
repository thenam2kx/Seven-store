<div class="app-menu navbar-menu">
  <!-- LOGO -->
  <div class="navbar-brand-box">
    <!-- Dark Logo-->
    <a href="http://localhost/seven-store/admin/" class="logo logo-dark">
      <span class="logo-sm">
        <img src="assets/images/logo-sm.png" alt="" height="22">
      </span>
      <span class="logo-lg">
        <img src="assets/images/logo-dark.png" alt="" height="17">
      </span>
    </a>
    <!-- Light Logo-->
    <a href="http://localhost/seven-store/admin/" class="logo logo-light">
      <span class="logo-sm">
        <img src="assets/images/logo-sm.png" alt="" height="22">
      </span>
      <span class="logo-lg">
        <img src="assets/images/logo-light.png" alt="" height="17">
      </span>
    </a>
    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
      <i class="ri-record-circle-line"></i>
    </button>
  </div>

  <div class="dropdown sidebar-user m-1 rounded">
    <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="d-flex align-items-center gap-2">
        <img class="rounded header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
        <span class="text-start">
          <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
          <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
        </span>
      </span>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
      <!-- item-->
      <h6 class="dropdown-header">Welcome Anna!</h6>
      <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
      <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
    </div>
  </div>
  <div id="scrollbar">
    <div class="container-fluid">


      <div id="two-column-menu">
      </div>
      <ul class="navbar-nav" id="navbar-nav">
        <li class="menu-title"><span data-key="t-menu">Quản lý</span></li>
        <!-- Dashboard -->
        <li class="nav-item">
          <a class="nav-link menu-link" href="http://localhost/seven-store/admin/">
            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Bảng điều khiển</span>
          </a>
        </li>

        <!-- User -->
        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarUser" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUser">
            <i class="ri-user-line"></i> <span data-key="t-advance-ui">Quản lý người dùng</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarUser">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="?act=users" class="nav-link" data-key="t-sweet-alerts">
                  Danh sách
                </a>
              </li>
              <li class="nav-item">
                <a href="?act=addUser" class="nav-link" data-key="t-nestable-list">
                  Thêm mới
                </a>
              </li>
            </ul>
          </div>
        </li>

        <!-- Blog -->
        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarBaiviet" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBaiviet">
            <i class="ri-newspaper-line"></i> <span data-key="t-advance-ui">Quản lý bài viết</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarBaiviet">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="?act=blog" class="nav-link" data-key="t-sweet-alerts">
                  Danh sách
                </a>
              </li>
              <li class="nav-item">
                <a href="?act=addBlog" class="nav-link" data-key="t-nestable-list">
                  Thêm mới
                </a>
              </li>
            </ul>
          </div>
        </li>

        <!-- Blog -->
        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebardanhmuc" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebardanhmuc">
            <i class=" ri-list-check"></i> <span data-key="t-advance-ui">Danh mục sản phẩm</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebardanhmuc">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="?act=listCategory" class="nav-link" data-key="t-sweet-alerts">
                  Danh sách
                </a>
              </li>
              <li class="nav-item">
                <a href="?act=addCategory" class="nav-link" data-key="t-nestable-list">
                  Thêm mới
                </a>
              </li>
            </ul>
          </div>
        </li>

        <!-- Banner -->
        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarBanner" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBanner">
            <i class="ri-image-line"></i> <span data-key="t-advance-ui">Quản lý banner</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarBanner">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="?act=banners" class="nav-link" data-key="t-sweet-alerts">
                  Danh sách
                </a>
              </li>
              <li class="nav-item">
                <a href="?act=addBanner" class="nav-link" data-key="t-nestable-list">
                  Thêm mới
                </a>
              </li>
            </ul>
          </div>
        </li>

        <!-- Contact -->
        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarContact" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarContact">
            <i class="ri-customer-service-line"></i><span data-key="t-advance-ui">Quản lý liên hệ</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarContact">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="?act=Contacts" class="nav-link" data-key="t-sweet-alerts">
                  Danh sách
                </a>
              </li>
            </ul>
          </div>
        </li>
        <!-- end contact -->

        <!-- Products -->
        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarSanpham" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSanpham">
            <i class="ri-shopping-basket-line"></i> <span data-key="t-advance-ui">Quản lý sản phẩm</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarSanpham">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="?act=listProduct" class="nav-link" data-key="t-sweet-alerts">
                  Danh sách
                </a>
              </li>
              <li class="nav-item">
                <a href="?act=addProduct" class="nav-link" data-key="t-nestable-list">
                  Thêm mới
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Bán hàng</span></li>
        <!-- Discount -->
        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarkhuyenmai" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarkhuyenmai">
            <i class="ri-percent-line"></i> <span data-key="t-advance-ui">Quản lý khuyến mãi</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarkhuyenmai">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="?act=listDiscount" class="nav-link" data-key="t-sweet-alerts">
                  Danh sách
                </a>
              </li>
              <li class="nav-item">
                <a href="?act=addDiscount" class="nav-link" data-key="t-nestable-list">
                  Thêm mới
                </a>
              </li>
            </ul>
          </div>
        </li>
        <!-- OrderStatus -->
        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarOrderStatus" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarOrderStatus">
            <i class="ri-remixicon-line"></i> <span data-key="t-advance-ui">Trạng thái đơn hàng</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarOrderStatus">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="?act=listOrderStatus" class="nav-link" data-key="t-sweet-alerts">
                  Danh sách
                </a>
              </li>
              <li class="nav-item">
                <a href="?act=addOrderStatus" class="nav-link" data-key="t-nestable-list">
                  Thêm mới
                </a>
              </li>
            </ul>
          </div>
        </li>
        <!-- end OrderStatus -->

        <!-- Order -->
        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarOrder" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarOrder">
            <i class="ri-bill-line"></i> <span data-key="t-advance-ui">Quản lý đơn hàng</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarOrder">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="?act=listOrder" class="nav-link" data-key="t-sweet-alerts">
                  Danh sách
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
    <!-- Sidebar -->
  </div>

  <div class="sidebar-background"></div>
</div>
