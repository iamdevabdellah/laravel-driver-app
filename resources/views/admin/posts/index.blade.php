@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-8/12 bg-white p-10 rounded-lg">
      <h2 class="text-4xl text-gray-900 mb-4">Post As Admin</h2>
      <form action="{{ route('posts') }}" method="post" enctype="multipart/form-data" class="mb-4">
        @csrf

        <div class="mb-4">
          <label for="car" class="sr-only">Car</label>
          <input type="text" name="car" id="car" placeholder="Car"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('car') border-red-500 @enderror"
            value="{{ old('car') }}">
          @error('car')
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
          <label for="cost" class="sr-only">Fuel Cost</label>
          <input type="text" name="cost" id="distance" placeholder="Fuel Cost"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('cost') border-red-500 @enderror"
            value="{{ old('cost') }}">
          @error('cost')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="damage" class="sr-only">Damage</label>
          <input type="text" name="damage" id="damage" placeholder="Any Damage Yes/No"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('damage') border-red-500 @enderror"
            value="{{ old('damage') }}">
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

        <div class="mb-4">
          <label for="body" class="sr-only"></label>
          <textarea name="body" id="body" cols="30" rows="3" placeholder="Say Something!"
            class="bg-gray-100 border-dashed border-4 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
            value="{{ old('body') }}"></textarea>
          @error('body')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div>
          <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Post</button>
        </div>

      </form>

    </div>






  </div>
@endsection
