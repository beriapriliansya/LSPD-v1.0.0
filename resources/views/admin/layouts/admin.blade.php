<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'LSPD Admin Management Console')</title>

  <!-- Google Fonts & FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v=2.8">

  <style>
    :root {
      --admin-bg: #0b0f19;
      --admin-card: #131b2e;
      --admin-border: #1e293b;
      --admin-gold: #3b82f6;
      --admin-blue: #3b82f6;
      --admin-green: #10b981;
      --admin-red: #ef4444;
    }

    body {
      background: var(--admin-bg);
      color: #f8fafc;
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      margin: 0;
      padding: 0;
    }

    .admin-layout {
      display: flex;
      min-height: 100vh;
    }

    /* Admin Sidebar */
    .admin-sidebar {
      width: 270px;
      background: #0f172a;
      border-right: 1px solid var(--admin-border);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .admin-brand {
      padding: 1.25rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      border-bottom: 1px solid var(--admin-border);
    }

    .admin-brand img {
      width: 38px;
      height: 38px;
    }

    .admin-brand-text h1 {
      font-size: 1.05rem;
      font-weight: 800;
      margin: 0;
      color: #ffffff;
      letter-spacing: 0.5px;
    }

    .admin-brand-text span {
      font-size: 0.68rem;
      color: #3b82f6;
      font-weight: 700;
      letter-spacing: 1px;
    }

    .admin-nav {
      list-style: none;
      padding: 1rem 0.75rem;
      margin: 0;
    }

    .admin-nav-item {
      margin-bottom: 0.35rem;
    }

    .admin-nav-link {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.6rem 0.85rem;
      color: #94a3b8;
      text-decoration: none;
      font-weight: 600;
      font-size: 0.82rem;
      border-radius: 8px;
      transition: all 0.2s ease;
    }

    .admin-nav-link:hover {
      background: #1e293b;
      color: #ffffff;
    }

    .admin-nav-link.active {
      background: #2563eb;
      color: #ffffff;
      font-weight: 700;
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35);
    }

    .admin-nav-link i {
      width: 18px;
      text-align: center;
    }

    /* Admin Main Area */
    .admin-main {
      flex: 1;
      display: flex;
      flex-direction: column;
      overflow-x: hidden;
    }

    .admin-header {
      height: 64px;
      background: #0f172a;
      border-bottom: 1px solid var(--admin-border);
      padding: 0 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .admin-user-card {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .admin-badge {
      background: rgba(37, 99, 235, 0.15);
      color: #60a5fa;
      border: 1px solid #2563eb;
      font-size: 0.72rem;
      padding: 0.2rem 0.6rem;
      border-radius: 4px;
      font-weight: 800;
    }

    .admin-content {
      padding: 1.5rem;
      flex: 1;
    }

    .admin-card {
      background: var(--admin-card);
      border: 1px solid var(--admin-border);
      border-radius: 12px;
      padding: 1.25rem;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
      margin-bottom: 1.25rem;
    }

    .admin-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.85rem;
    }

    .admin-table th {
      background: #0f172a;
      color: #94a3b8;
      font-weight: 700;
      text-align: left;
      padding: 0.75rem 1rem;
      border-bottom: 1px solid var(--admin-border);
      font-size: 0.75rem;
      text-transform: uppercase;
    }

    .admin-table td {
      padding: 0.75rem 1rem;
      border-bottom: 1px solid var(--admin-border);
      color: #e2e8f0;
    }

    .admin-table tr:hover {
      background: rgba(255, 255, 255, 0.02);
    }

    .admin-input, .admin-select, .admin-textarea {
      width: 100%;
      background: #090d16;
      border: 1px solid var(--admin-border);
      color: #ffffff;
      padding: 0.55rem 0.85rem;
      border-radius: 6px;
      font-size: 0.85rem;
      box-sizing: border-box;
    }

    .admin-input:focus, .admin-select:focus, .admin-textarea:focus {
      outline: none;
      border-color: #3b82f6;
    }

    .btn-admin {
      background: #2563eb;
      color: #ffffff;
      border: none;
      padding: 0.55rem 1.15rem;
      border-radius: 6px;
      font-weight: 800;
      font-size: 0.82rem;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      text-decoration: none;
      transition: all 0.2s ease;
      box-shadow: 0 4px 14px rgba(37, 99, 235, 0.3);
    }

    .btn-admin:hover {
      background: #1d4ed8;
      color: #ffffff;
    }

    .btn-danger-admin {
      background: var(--admin-red);
      color: #ffffff;
      border: none;
      padding: 0.35rem 0.75rem;
      border-radius: 4px;
      font-size: 0.75rem;
      font-weight: 700;
      cursor: pointer;
    }

    .btn-secondary-admin {
      background: #1e293b;
      color: #e2e8f0;
      border: 1px solid var(--admin-border);
      padding: 0.35rem 0.75rem;
      border-radius: 4px;
      font-size: 0.75rem;
      font-weight: 700;
      cursor: pointer;
    }

    .btn-warning-admin {
      background: rgba(37, 99, 235, 0.15);
      color: #60a5fa;
      border: 1px solid #2563eb;
      padding: 0.35rem 0.75rem;
      border-radius: 4px;
      font-size: 0.75rem;
      font-weight: 700;
      cursor: pointer;
      margin-right: 0.35rem;
      display: inline-flex;
      align-items: center;
      gap: 0.35rem;
    }

    .btn-warning-admin:hover {
      background: #2563eb;
      color: #ffffff;
    }

    /* Custom Admin Pagination Styling */
    .admin-pagination-wrapper {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-top: 1.25rem;
      border-top: 1px solid var(--admin-border);
      margin-top: 1rem;
      flex-wrap: wrap;
      gap: 0.75rem;
    }

    .admin-pagination-info {
      font-size: 0.82rem;
      color: #94a3b8;
      font-weight: 600;
    }

    .admin-pagination-links {
      display: flex;
      gap: 0.35rem;
      align-items: center;
    }

    /* Custom Admin Dashboard Stat Cards */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1.25rem;
      margin-bottom: 1.5rem;
    }

    @media (max-width: 1024px) {
      .stats-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    .stat-box {
      background: var(--admin-card);
      border: 1px solid var(--admin-border);
      border-radius: 12px;
      padding: 1.25rem 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
      transition: all 0.25s ease;
      position: relative;
      overflow: hidden;
    }

    .stat-box::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 4px;
      height: 100%;
      background: #2563eb;
    }

    .stat-box:hover {
      transform: translateY(-3px);
      border-color: rgba(37, 99, 235, 0.4);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
    }

    .stat-number {
      font-size: 2rem;
      font-weight: 900;
      color: #ffffff;
      line-height: 1;
      letter-spacing: -0.5px;
    }

    .stat-label {
      font-size: 0.8rem;
      color: #94a3b8;
      font-weight: 700;
      margin-top: 0.4rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .stat-icon {
      width: 52px;
      height: 52px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
      box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.05);
    }

    /* Custom Admin Pagination Styling */
    .admin-pagination-btn {
      background: #0f172a;
      border: 1px solid var(--admin-border);
      color: #e2e8f0;
      padding: 0.4rem 0.85rem;
      border-radius: 6px;
      font-size: 0.8rem;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.2s ease;
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
    }

    .admin-pagination-btn:hover,
    .admin-pagination-btn.active {
      background: #2563eb;
      color: #ffffff;
      border-color: #2563eb;
    }

    .admin-pagination-btn.disabled {
      opacity: 0.4;
      pointer-events: none;
    }
  </style>
  @stack('styles')
</head>

<body>
  <div class="admin-layout">
    <!-- Sidebar Navigation Covering ALL 13 Handbook Sections -->
    <aside class="admin-sidebar">
      <div>
        <div class="admin-brand">
          <img src="{{ asset('img/lspd_logo.png') }}" alt="LSPD Emblem">
          <div class="admin-brand-text">
            <h1>LSPD ADMIN</h1>
            <span>MANAGEMENT CONSOLE</span>
          </div>
        </div>

        <ul class="admin-nav">
          <li class="admin-nav-item">
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
              <i class="fa-solid fa-house"></i> Beranda
            </a>
          </li>
          <li class="admin-nav-item">
            <a href="{{ route('admin.officers') }}" class="admin-nav-link {{ request()->routeIs('admin.officers*') ? 'active' : '' }}">
              <i class="fa-solid fa-users-viewfinder"></i> Chain of Command
            </a>
          </li>
          <li class="admin-nav-item">
            <a href="{{ route('admin.weapons') }}" class="admin-nav-link {{ request()->routeIs('admin.weapons*') ? 'active' : '' }}">
              <i class="fa-solid fa-gun"></i> Weapon Classes
            </a>
          </li>
          <li class="admin-nav-item">
            <a href="{{ route('admin.penal_codes') }}" class="admin-nav-link {{ request()->routeIs('admin.penal_codes*') ? 'active' : '' }}">
              <i class="fa-solid fa-book-skull"></i> Penal Code Cheat
            </a>
          </li>
        </ul>
      </div>

      <div style="padding: 1.25rem; border-top: 1px solid var(--admin-border);">
        <a href="{{ route('handbook.index') }}" target="_blank" class="btn-secondary-admin" style="display: block; text-align: center; margin-bottom: 0.65rem;">
          <i class="fa-solid fa-external-link"></i> Open Public MDC
        </a>
        <form action="{{ route('admin.logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn-danger-admin" style="width: 100%; padding: 0.5rem; text-align: center;">
            <i class="fa-solid fa-right-from-bracket"></i> Logout Admin
          </button>
        </form>
      </div>
    </aside>

    <!-- Main Workspace -->
    <main class="admin-main">
      <header class="admin-header">
        <div style="font-weight: 800; font-size: 1.1rem; color: #ffffff;">
          @yield('header_title', 'Admin Management Console')
        </div>
        <div class="admin-user-card" style="display: flex; align-items: center; gap: 0.85rem;">
          <img src="{{ asset('img/officers/milo_71302.png') }}" alt="Milo Meletup" style="width: 36px; height: 36px; border-radius: 50%; object-fit: cover; border: 2px solid #3b82f6; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.4);">
          <div style="display: flex; flex-direction: column;">
            <div style="display: flex; align-items: center; gap: 0.4rem;">
              <span style="font-size: 0.85rem; font-weight: 800; color: #ffffff;">Milo Meletup</span>
              <span style="background: rgba(59, 130, 246, 0.2); color: #60a5fa; font-family: monospace; font-size: 0.68rem; font-weight: 800; padding: 0.05rem 0.35rem; border-radius: 4px;">#71302</span>
            </div>
            <span style="font-size: 0.72rem; color: #94a3b8; font-weight: 700;">Police Officer III &bull; CHIEF ACCESS</span>
          </div>
        </div>
      </header>

      <div class="admin-content">
        @if(session('success'))
          <div style="background: rgba(16,185,129,0.15); border: 1px solid #10b981; color: #34d399; padding: 0.75rem 1rem; border-radius: 8px; margin-bottom: 1.25rem; font-size: 0.85rem; font-weight: 700; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
          </div>
        @endif

        @if(session('error'))
          <div style="background: rgba(239,68,68,0.15); border: 1px solid #ef4444; color: #f87171; padding: 0.75rem 1rem; border-radius: 8px; margin-bottom: 1.25rem; font-size: 0.85rem; font-weight: 700; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}
          </div>
        @endif

        @yield('content')
      </div>
    </main>
  </div>
  @stack('scripts')
</body>

</html>
