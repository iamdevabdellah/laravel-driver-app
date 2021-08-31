<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>Fire</title>
</head>

<body class="bg-white-50">
  {{-- <nav class="p-6 bg-white flex justify-between mb-6">
    <ul class="flex items-center">
      <li>
        <a href="{{ route('home') }}" class="p-3">Home</a>
      </li>
      @auth
        <li>
          <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
        </li>
        <li>
          <a href="{{ route('posts') }}" class="p-3">Posts</a>
        </li>
        <li>
          <a href="{{ route('lists') }}" class="p-3">List</a>
        </li>
      @endauth
    </ul>

    <ul class="flex items-center">
      @auth
        <li>
          <a href="" class="p-3">{{ auth()->user()->name }}</a>
        </li>
        <li>
          <form action="{{ route('logout') }}" method="post" class="p-3 inline">
            @csrf
            <button type="submit">Logout</button>
          </form>
        </li>
      @endauth


      @guest
        <li>
          <a href="{{ route('register') }}" class="p-3">Register</a>
        </li>
        <li>
          <a href="{{ route('login') }}" class="p-3">Login</a>
        </li>
      @endguest


    </ul>
  </nav> --}}

  <nav class="bg-white py-2 md:py-4 border-b-2">
    <div class="container px-4 mx-auto md:flex md:items-center">

      <div class="flex justify-between items-center">
        <a href="{{ route('home') }}" class="font-bold text-xl text-indigo-600">Fire</a>
        <button
          class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden"
          id="navbar-toggle">
          <i class="fas fa-bars"></i>
        </button>
      </div>

      <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
        <a href="{{ route('home') }}" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-indigo-600">Home</a>
        <a href="{{ route('dashboard') }}"
          class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Dashboard</a>
        <a href="{{ route('posts') }}"
          class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Post</a>

        <a href="#"
          class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Contact</a>
        @guest
          <a href="{{ route('login') }}"
            class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-300">Login</a>
          <a href="{{ route('register') }}"
            class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-solid border-indigo-600 rounded hover:bg-indigo-600 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1">Signup</a>
        @endguest

        @auth
          <a href=""
            class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-300">{{ auth()->user()->name }}</a>

          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button
              class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-300"
              type="submit">Logout</button>
          </form>
        @endauth

      </div>
    </div>
  </nav>

  @yield('content')
</body>

</html>
