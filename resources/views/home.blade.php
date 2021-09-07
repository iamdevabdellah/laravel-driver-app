@extends('layouts.app')

@section('content')

  <section class="text-gray-600 body-font">
    <div class="py-24 bg-white">
      <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-between">
        <div class="text-center">
          <p class="mt-4 text-sm leading-7 text-gray-500 font-regular">
            WELCOME
          </p>
          <h3 class="text-3xl sm:text-5xl leading-normal font-extrabold tracking-tight text-gray-900">
            Porto <span class="text-blue-900">Montenegro</span>
          </h3>
          <img class="mx-auto h-auto w-auto" src="{{ asset('/images/logo/site-logo.png') }}" alt="Workflow">
        </div>
      </div>
  </section>


@endsection
