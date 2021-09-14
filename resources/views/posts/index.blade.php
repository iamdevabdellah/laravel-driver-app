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
          <label for="vehicle_type" class="sr-only"></label>
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

        {{-- <div class="mb-4">
          <label for="vehicle" class="sr-only">Vehicle</label>
          <input type="text" name="vehicle" id="vehicle" placeholder="Vehicle"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('vehicle') border-red-500 @enderror"
            value="{{ old('vehicle') }}">
          @error('vehicle')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div> --}}
        <div class="relative mb-4">
          <label for="vehicle" class="leading-7 text-sm text-gray-600"></label>

          <select id="vehicle" name="vehicle"
            class="bg-white rounded-md border border-gray-200 p-3 focus:outline-none w-full @error('vehicle') border-red-500 @enderror"
            value="{{ old('vehicle') }}" required>
            <option selected="true" disabled>Select Vehicle</option>
            <option value="TV AS 219">TV AS 219</option>
            <option value="TV AT 658">TV AT 658</option>
            <option value="TV AV 257">TV AV 257</option>
            <option value="TV AK 954">TV AK 954</option>
            <option value="TV AK 586">TV AK 586</option>
            <option value="TV AK 973">TV AK 973</option>
            <option value="TV AP 624">TV AP 624</option>
            <option value="TV AP 556">TV AP 556</option>
            <option value="TV AP 670">TV AP 670</option>
            <option value="TV AP 291">TV AP 291</option>
            <option value="TV AM 531">TV AM 531</option>
            <option value="TV AP 870">TV AP 870</option>
            <option value="TV AL 195">TV AL 195</option>
            <option value="TV AK 975">TV AK 975</option>
            <option value="TV AP 622">TV AP 622</option>
            <option value="TV AK 885">TV AK 885</option>
            <option value="TV AL 017">TV AL 017</option>
            <option value="TV AK 987">TV AK 987</option>
            <option value="TV AM 150">TV AM 150</option>
            <option value="TV AK 957">TV AK 957</option>
            <option value="TV AK 916">TV AK 916</option>
            <option value="TV AP 167">TV AP 167</option>
            <option value="TV AM 759">TV AM 759</option>
            <option value="TV AL 498">TV AL 498</option>
            <option value="TV AL 048">TV AL 048</option>
            <option value="TV AR 088">TV AR 088</option>
            <option value="TV AL 104">TV AL 104</option>
            <option value="TV AL 179">TV AL 179</option>
            <option value="TV AK 998">TV AK 998</option>
            <option value="TV AL 183">TV AL 183</option>
            <option value="TV AP 575">TV AP 575</option>
            <option value="TV AP 578">TV AP 578</option>
            <option value="TV AL 550">TV AL 550</option>
            <option value="TV AP 838">TV AP 838</option>
            <option value="TV AT 886">TV AT 886</option>
            <option value="TV AT 775">TV AT 775</option>
            <option value="TV AT 704">TV AT 704</option>
            <option value="TV AR 879">TV AR 879</option>
            <option value="TV AR 358">TV AR 358</option>
            <option value="TV PM 003">TV PM 003</option>
            <option value="TV PM 002">TV PM 002</option>
            <option value="TV PM 006">TV PM 006</option>
            <option value="TV PM 001">TV PM 001</option>
            <option value="TV 70">TV 70</option>
            <option value="TV 74">TV 74</option>
          </select>

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
          <label for="billImage" class="sr-only">Fuel Bill Image</label>
          <input type="file" name="billImage" id="billImage" placeholder="Fuel Bill Image"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('billImage') border-red-500 @enderror"
            value="{{ old('billImage') }}">
          @error('billImage')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="inspection" class="sr-only">Inspection Cost</label>
          <input type="text" name="inspection" id="inspection" placeholder="Inspection Cost"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('inspection') border-red-500 @enderror"
            value="{{ old('inspection') }}">
          @error('inspection')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="inspectionImage" class="sr-only">Inspection Cost Image</label>
          <input type="file" name="inspectionImage" id="inspectionImage" placeholder="Inspection Cost Image"
            class="br-gray-100 border-2 w-full p-4 rounded-lg @error('inspectionImage') border-red-500 @enderror"
            value="{{ old('inspectionImage') }}">
          @error('inspectionImage')
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
