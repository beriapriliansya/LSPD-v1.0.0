  <header class="header-bar">
    <!-- Left Section: Logo & Brand -->
    <div class="header-left">
      <button id="mobileMenuBtn" class="mobile-menu-btn" onclick="toggleMobileSidebar()" aria-label="Toggle Mobile Menu">
        <i class="fa-solid fa-bars"></i>
      </button>
      <img src="{{ asset('img/lspd_logo.png') }}" alt="LSPD Logo" class="header-logo-img">
      <div class="header-brand-text">
        <div class="header-brand-name">LSPD</div>
        <div class="header-brand-sub">Los Santos Police Department</div>
      </div>
    </div>

    <!-- Center Section: Global Search Bar -->
    <div class="global-search-container">
      <div class="global-search-input-wrapper">
        <i class="fa-solid fa-magnifying-glass search-icon"></i>
        <input type="text" id="globalSearchInput" class="global-search-input"
          placeholder="Cari officer, penal code, SOP..." autocomplete="off"
          oninput="handleGlobalSearch(this.value)" onfocus="handleGlobalSearch(this.value)">
        <kbd class="search-shortcut-badge">CTRL + K</kbd>
        <button id="clearGlobalSearchBtn" class="clear-search-btn" onclick="clearGlobalSearch()" style="display:none;"
          title="Bersihkan pencarian">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>

      <!-- Dropdown Search Results Popup Box -->
      <div id="globalSearchResultsDropdown" class="global-search-dropdown" style="display:none;">
        <div class="search-dropdown-header">
          <span>HASIL PENCARIAN GLOBAL</span>
          <span id="globalSearchResultCount" class="results-count-tag">0 ditemukan</span>
        </div>
        <div id="globalSearchResultsList" class="search-results-list">
          <!-- Rendered dynamically via JavaScript -->
        </div>
      </div>
    </div>

    <!-- Right Section: Duty Status, Officer Profile, & Admin Link -->
    <div class="header-right">

      <!-- Officer Profile Pill -->
      <div class="header-profile-pill">
        <img src="{{ asset('img/officers/milo_71302.png') }}" alt="Milo Meletup" class="profile-pill-avatar" style="object-fit: cover;">
        <span class="profile-pill-name">Milo Meletup #71302</span>
      </div>

      <!-- Admin Panel Button -->
      <a href="{{ route('admin.dashboard') }}" class="btn-header-admin" title="Buka Admin Management Panel">
        <i class="fa-solid fa-user-shield"></i> Admin Panel
      </a>
    </div>
  </header>
