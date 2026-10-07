<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Beranda LSPD - Mobile Data Computer (MDC)')</title>

  <!-- Google Fonts & FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v=2.8">
  @stack('styles')
</head>

<body>

  <!-- TOP HEADER BAR -->
  @include('partials.header')

  <!-- Mobile Sidebar Backdrop Overlay -->
  <div id="sidebarBackdrop" class="sidebar-backdrop" onclick="toggleMobileSidebar(false)"></div>

  <!-- MAIN APP CONTAINER -->
  <div class="app-container">

    <!-- SIDEBAR NAVIGATION -->
    @include('partials.sidebar')

    <!-- MAIN CONTENT WINDOW -->
    <main class="main-content">
      <div style="flex:1;">
        @yield('content')
      </div>
    </main>
  </div>

  <!-- MODALS -->
  @include('partials.modals')

  <!-- JS Dependencies -->
  <script src="{{ asset('js/data.js') }}?v=10.0"></script>
  <script src="{{ asset('js/app.js') }}?v=10.0"></script>
  @stack('scripts')
</body>

</html>
