<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/export.js') }}"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  {{-- <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script> --}}
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

  <script>
    function ExportToExcel(type, fn, dl) {
      var elt = document.getElementById('example');
      var wb = XLSX.utils.table_to_book(elt, {
        sheet: "sheet1"
      });
      return dl ?
        XLSX.write(wb, {
          bookType: type,
          bookSST: true,
          type: 'base64'
        }) :
        XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));
    }
  </script>

  <title>Porto Montenegro</title>
</head>

<body class="bg-white-50">
  <!-- navbar goes here -->
  <nav class="bg-gray-100">
    <div class="max-w-6xl mx-auto px-4">
      <div class="flex justify-between">

        <div class="flex space-x-4">
          <!-- logo -->
          <div>
            <a href="{{ route('admin.home') }}" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
              <span class="font-bold text-xl text-blue-900">Porto Montenegro</span>
            </a>
          </div>

          <!-- primary nav -->
          {{-- <div class="hidden md:flex items-center space-x-1">
            <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">Hello</a>
          </div> --}}
        </div>

        <!-- secondary nav -->
        <div class="hidden md:flex items-center space-x-1">
          <a href="{{ route('admin.dashboard') }}"
            class="py-5 px-3 text-blue-900 hover:bg-gray-200 hover:text-gray-700">Dashboard</a>
          <a href="{{ route('admin.lists') }}"
            class="py-5 px-3 text-blue-900 hover:bg-gray-200 hover:text-gray-700">Lists</a>
          <a href="{{ route('admin.search') }}"
            class="py-5 px-3 text-blue-900 hover:bg-gray-200 hover:text-gray-700">Search</a>
          @guest
            <a href="{{ route('login') }}"
              class="py-5 px-3 text-blue-900 hover:bg-gray-200 hover:text-gray-700">Login</a>
            <a href="{{ route('register') }}"
              class="py-2 px-3 bg-blue-900 hover:bg-blue-700 text-white transition duration-300">Signup</a>
          @endguest

          @auth
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button class="py-2 px-3 bg-blue-900 hover:bg-blue-700 text-white transition duration-300"
                type="submit">Logout</button>
            </form>
          @endauth
        </div>

        <!-- mobile button goes here -->
        <div class="md:hidden flex items-center">
          <button class="mobile-menu-button">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>

      </div>
    </div>

    <!-- mobile menu start-->
    <div class="mobile-menu hidden md:hidden">
      {{-- <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Features</a> --}}
      @auth
        <a href="{{ route('admin.dashboard') }}"
          class="block py-2 px-4 text-sm hover:bg-gray-200 text-center">Dashboard</a>
        <a href="{{ route('admin.lists') }}" class="block py-2 px-4 text-sm hover:bg-gray-200 text-center">Lists</a>
        <a href="{{ route('admin.search') }}" class="block py-2 px-4 text-sm hover:bg-gray-200 text-center">Search</a>
      @endauth

      @guest
        <a href="{{ route('login') }}" class="block py-2 px-4 text-sm hover:bg-gray-200 text-center">Login</a>
        <a href="{{ route('register') }}" class="block py-2 px-4 text-sm hover:bg-gray-200 text-center">Signup</a>
      @endguest

      @auth
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button class="block py-2 px-4 text-sm hover:bg-gray-200 w-full text-center" type="submit">Logout</button>
        </form>
      @endauth

    </div>
    <!-- mobile menu end-->
  </nav>
  <!-- navbar ends here -->
  @yield('content')

  <script>
    // grab everything we need
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    // add event listeners
    btn.addEventListener("click", () => {
      menu.classList.toggle("hidden");
    });
  </script>
</body>

</html>
