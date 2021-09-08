@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-6/12 bg-white p-10 rounded-lg">

      @if (session()->has('success'))
        <div class="p-5 rounded-lg border border-green-400 bg-green-300 text-green-900">
          <h2 class="font-bold text-xl pb-2">{{ session()->get('success') }}</h2>
          <p class="pt-2">
            Thank you for posting.
          </p>
        </div>

      @endif

      <h2 class="text-4xl text-blue-900 mb-4 font-bold">Enter Record</h2>


      <form action="{{ route('posts') }}" method="post" enctype="multipart/form-data" class="mb-4">
        @csrf

        <div class="mb-4">
          <label for="name" class="sr-only">Name</label>
          <input type="hidden" name="name" id="name" placeholder="" class="br-gray-100 border-2 w-full p-2 rounded-lg"
            value="{{ auth()->user()->name }}">
        </div>

        <div class="mb-4">
          <label for="vehicle_type" class="sr-only">Vehicle Type</label>
          <input type="hidden" name="vehicle_type" id="vehicle_type" placeholder=""
            class="br-gray-100 border-2 w-full p-2 rounded-lg" value="{{ auth()->user()->vehicle_type }}">
        </div>

        <div class="mb-4">
          <label for="date" class="sr-only">Date</label>
          <input type="date" name="date" id="date" placeholder="Date"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('date') border-red-500 @enderror"
            value="{{ old('date') }}">
          @error('date')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="vehicle" class="sr-only">Vehicle</label>
          <input type="text" name="vehicle" id="vehicle" placeholder="Vehicle"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('vehicle') border-red-500 @enderror"
            value="{{ old('vehicle') }}">
          @error('vehicle')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="distance" class="sr-only">Kilometer Ran</label>
          <input type="text" name="distance" id="distance" placeholder="Kilometer Ran"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('distance') border-red-500 @enderror"
            value="{{ old('distance') }}">
          @error('distance')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="bill" class="sr-only">Fuel Cost</label>
          <input type="text" name="bill" id="bill" placeholder="Fuel Cost"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('bill') border-red-500 @enderror"
            value="{{ old('bill') }}">
          @error('bill')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="billImage" class="sr-only">Bill Image</label>
          <input type="file" name="billImage" id="billImage" placeholder="Bill Image"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('billImage') border-red-500 @enderror"
            value="{{ old('billImage') }}">
          @error('billImage')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="damage" class="sr-only">Damage</label>
          <select id="damage" name="damage"
            class="bg-white rounded-md border border-gray-200 p-3 focus:outline-none w-full @error('damage') border-red-500 @enderror"
            value="{{ old('damage') }}" required>
            <option selected="true" disabled>Any Damage</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
          @error('damage')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>




        <div class="mb-4">
          <label for="damageImage" class="sr-only">Damage Image</label>
          <input type="file" name="damageImage" id="damageImage" placeholder="Damage Image"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('damageImage') border-red-500 @enderror"
            value="{{ old('damageImage') }}">
          @error('car')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        {{-- <div class="mb-4">
          <label for="body" class="sr-only"></label>
          <textarea name="body" id="body" cols="30" rows="3" placeholder="Say Something!"
            class="bg-gray-100 border-dashed border-4 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
            value="{{ old('body') }}"></textarea>
          @error('body')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div> --}}

        <div>
          <button type="submit" class="bg-blue-900 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">Post
            Record</button>
        </div>

      </form>

    </div>

  </div>

@endsection
