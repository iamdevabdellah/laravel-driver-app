{{-- @extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
      <form action="{{ route('register') }}" method="post">

        @csrf
        <div class="mb-4">
          <label for="name" class="sr-only">Name</label>
          <input type="text" name="name" id="name" placeholder="Your name"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
            value="{{ old('name') }}">
          @error('name')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="username" class="sr-only">Username</label>
          <input type="text" name="username" id="username" placeholder="Your username"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror"
            value="{{ old('username') }}">
          @error('email')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="email" class="sr-only">Email</label>
          <input type="email" name="email" id="email" placeholder="Your email"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
            value="{{ old('email') }}">
          @error('email')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="password" class="sr-only">Password</label>
          <input type="password" name="password" id="password" placeholder="Your password"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
          @error('password')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="password_confirmation" class="sr-only">Password again</label>
          <input type="password" name="password_confirmation" id="password_confirmation"
            placeholder="Repeat your password"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror"
            value="">
          @error('password_confirmation')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div>
          <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
        </div>




      </form>
    </div>
  </div>
@endsection --}}

@extends('layouts.app')

@section('content')
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
      <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
        <img class="mx-auto h-auto w-auto" src="{{ asset('/images/logo/site-logo.png') }}" alt="Workflow">
        <h1 class="title-font font-medium text-5xl text-gray-900"></h1>
        <p class="leading-relaxed mt-4"></p>
      </div>
      <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
        <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign Up</h2>

        <form action="{{ route('register') }}" method="post">
          @csrf
          <div class="relative mb-4">
            <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
            <input type="text" id="name" name="name"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out @error('name') border-red-500 @enderror"
              value="{{ old('name') }}">
            @error('name')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="relative mb-4">
            <label for="username" class="leading-7 text-sm text-gray-600">Username</label>
            <input type="text" id="username" name="username"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out @error('username') border-red-500 @enderror"
              value="{{ old('username') }}">
            @error('username')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="relative mb-4">
            <label for="vehicle_type" class="leading-7 text-sm text-gray-600">Vehicle Type</label>
            {{-- <input type="text" id="vehicle_type" name="vehicle_type"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out @error('vehicle_type') border-red-500 @enderror"
              value="{{ old('vehicle_type') }}"> --}}

            <select id="vehicle_type" name="vehicle_type"
              class="bg-white rounded-md border border-gray-200 p-3 focus:outline-none w-full @error('vehicle_type') border-red-500 @enderror"
              value="{{ old('vehicle_type') }}" required>
              <option selected="true" disabled>Select Vehicle Type</option>
              <option value="Car">Car</option>
              <option value="Boat">Boat</option>
              <option value="Buggy">Buggies</option>
            </select>

            @error('vehicle_type')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
            <input type="email" id="email" name="email"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out @error('email') border-red-500 @enderror"
              value="{{ old('email') }}">
            @error('email')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="relative mb-4">
            <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
            <input type="password" id="password" name="password"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out @error('password') border-red-500 @enderror"
              value="{{ old('password') }}">
            @error('password')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="relative mb-4">
            <label for="password_confirmation" class="leading-7 text-sm text-gray-600">Password Again</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out @error('password_confirmation') border-red-500 @enderror"
              value="{{ old('password_confirmation') }}">
            @error('password_confirmation')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
            @enderror
          </div>



          <button type="submit"
            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Signup
          </button>
          <p class="text-xs text-gray-500 mt-3"></p>

        </form>

      </div>
    </div>
  </section>
@endsection
