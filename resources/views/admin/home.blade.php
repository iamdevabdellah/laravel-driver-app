@extends('admin.layouts.app')

@section('content')

  <section class="text-gray-600 body-font">
    <div class="py-24 bg-white">
      <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-between">
        <div class="text-center">
          <span
            class="inline-block py-1 px-2 rounded bg-indigo-50 text-blue-900 text-xs font-medium tracking-widest">{{ auth()->user()->username }}</span>
          <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Welcome, {{ auth()->user()->name }}
          </h1>
          <h3 class="text-3xl sm:text-5xl leading-normal font-extrabold tracking-tight text-gray-900">
            <span class="text-blue-900">Porto Montenegro</span>
          </h3>
          <img class="mx-auto h-auto w-auto" src="{{ asset('/images/logo/site-logo.png') }}" alt="Workflow">
          <a href="{{ route('admin.lists') }}">
            <button class="bg-blue-900 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
              See Records
            </button>
            <button class="bg-blue-900 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
              Search Records
            </button>

          </a>

        </div>
      </div>
  </section>


@endsection
