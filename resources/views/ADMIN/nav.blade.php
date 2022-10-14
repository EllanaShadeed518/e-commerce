

<div class="container-scroller">

    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="Admin assets/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="Admin assets/images/logo-mini.svg" alt="logo" /></a>
      </div>

      <ul class="nav">

        <li class="nav-item profile">
          <div class="profile-desc">



        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('dashboardadmin')}}">
              <span class="menu-icon">
                <i class="mdi  mdi-checkbox-blank"></i>

              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{route('dislaycategories')}}">
            <span class="menu-icon">
             <i class=" mdi mdi-format-list-bulleted"></i>

            </span>
            <span class="menu-title">Categories</span>
          </a>
        </li>

        <li class="nav-item menu-items">
          <a class="nav-link" href="{{route('displayproduct')}}">
            <span class="menu-icon">
              <i class="mdi mdi-shopping"></i>
            </span>
            <span class="menu-title">Products</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{url('adminorder')}}">
            <span class="menu-icon">
              <i class="mdi mdi-clipboard-text"></i>
            </span>
            <span class="menu-title">Orders</span>
          </a>
        </li>

      </ul>
    </nav>
