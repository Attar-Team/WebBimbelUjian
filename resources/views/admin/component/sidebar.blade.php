<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mb-2">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">BUMN Muda</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item @active('dashboard')">
        <a href="/admin/dashboard" class="menu-link">
          <i class="menu-icon tf-icons fa-solid fa-house-chimney"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      <li class="menu-header pb-0 small text-uppercase">
        <span class="menu-header-text">Paket</span>
      </li>
      <li class="menu-item @active('package.*')">
        <a href="/admin/package" class="menu-link">
          <i class="menu-icon tf-icons fa-solid fa-cubes"></i>
          <div data-i18n="Analytics">Paket</div>
        </a>
      </li>
      <li class="menu-item @active('course.*')">
        <a href="/admin/course" class="menu-link">
          <i class="menu-icon tf-icons fa-solid fa-photo-film"></i>
          <div data-i18n="Analytics">kursus</div>
        </a>
      </li>
      <li class="menu-item @active('exam.*')">
        <a href="/admin/exam" class="menu-link">
          <i class="menu-icon tf-icons fa-solid fa-pen-to-square"></i>
          <div data-i18n="Analytics">Ujian</div>
        </a>
      </li>
      <li class="menu-item @active('question.*')">
        <a href="/admin/question" class="menu-link">
          <i class="menu-icon tf-icons fa-solid fa-list"></i>
          <div data-i18n="Analytics">Soal</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="/users" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Lihat Ujian</div>
        </a>
      </li>
      <li class="menu-header pb-0 small text-uppercase">
        <span class="menu-header-text">Order</span>
      </li>
      <li class="menu-item @active('order.*')">
        <a href="/admin/order" class="menu-link">
          <i class="menu-icon tf-icons fa-solid fa-pen-to-square"></i>
          <div data-i18n="Analytics">Pemesanan</div>
        </a>
      </li>
      
      <li class="menu-header pb-0 small text-uppercase">
        <span class="menu-header-text">Report</span>
      </li>

      <li class="menu-item @active('user.*')">
        <a href="/admin/user" class="menu-link">
          <i class="fa-solid fa-users"></i>
          <div data-i18n="Analytics">User</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="/users" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Laporan</div>
        </a>
      </li>
    </ul>
  </aside>