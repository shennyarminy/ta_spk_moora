@include('partials.head')

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
    
    @include('partials.navbar')
    @include('partials.sidebar')
      

      <!-- Main Content -->
      <div class="main-content">
      @yield('content')
      </div>
      
      <footer class="main-footer">
        <div class="footer-left">
          @yield('footer')
        </div>
        <div class="footer-right">
        
        </div>
      </footer>
    </div>
  </div>

@include('partials.script')
</body>
</html>
