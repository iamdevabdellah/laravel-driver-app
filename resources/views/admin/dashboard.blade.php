@extends('admin.layouts.app')

@section('content')
  <section class="text-gray-600 body-font">
    <div class="py-24 bg-white">
      <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-between">
        <div class="text-center">
          <span
            class="inline-block py-1 px-2 rounded bg-indigo-50 text-blue-900 text-xs font-medium tracking-widest">{{ auth()->user()->username }}</span>


          <h1 class="text-5xl text-blue-900 pt-2 font-bold ">Admin Dashboard</h1>
          {{-- <p>Posts Information</p> --}}

          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mt-10 lg:mt-20">

            <div class="bg-transparent rounded text-center bg-indigo-50">
              <p class="text-5xl px-10 py-5">{{ $driver_count }}</p>
              <hr />
              <p class="px-10 py-5">Total Driver</p>
            </div>

            <div class="bg-transparent text-center bg-indigo-50 rounded">
              <p class="text-5xl px-10 py-5">{{ $record_count }}</p>
              <hr />
              <p class="px-10 py-5">Total Records</p>
            </div>

            <div class="rounded text-center bg-indigo-50">
              <p class="text-5xl px-10 py-5">35</p>
              <hr />
              <p class="px-10 py-5">Total Vehicles</p>
            </div>

            <div class="bg-transparent rounded text-center bg-indigo-50">
              <p class="text-5xl px-10 py-5">03</p>
              <hr />
              <p class="px-10 py-5">Vehicle Type</p>
            </div>

          </div>


        </div>
      </div>
  </section>

@endsection
