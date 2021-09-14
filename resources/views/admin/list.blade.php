@extends('admin.layouts.app')

@section('content')

  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col w-full mb-12 text-left lg:text-center">
        <h2 class="mb-4 text-xs font-semibold tracking-widest text-black uppercase title-font"></h2>
        <h1 class="mb-6 text-2xl font-black tracking-tighter text-blue-900 sm:text-5xl title-font"> Porto Montenegro <br
            class="md:hidden">Records</h1>
        <p class="mx-auto text-base font-medium leading-relaxed text-blueGray-700 lg:w-2/3">Record Listing</p>
      </div>

      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Date
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Name
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Vehicle Type
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Vehicle
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Kilometer Ran
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Inspection Cost
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Inspection Bill Image
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Fuel Cost
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Fuel Bill Image
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Any Damage
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Damage Image
                    </th>

                    {{-- <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Delete
                    </th> --}}



                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @if ($posts->count())
                    @foreach ($posts as $post)
                      <tr>

                        {{-- <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <input id="check" name="check" type="checkbox"
                              class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="check" class="ml-2 block text-sm text-gray-900">
                            </label>
                          </div>
                        </td> --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $post->date }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                              {{ $post->name }}
                            </div>
                          </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $post->vehicle_type }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $post->vehicle }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $post->distance }}</div>
                        </td>


                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $post->inspection }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            @if ($post->inspectionImage == null)
                              <span href="">No Image</span>
                            @else
                              <a href="{{ asset('images/posts/inspection/' . $post->inspectionImage) }}"
                                target="_blank">View
                                Image</a>
                            @endif
                          </span>
                        </td>


                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $post->bill }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            @if ($post->billImage == null)
                              <span href="">No Image</span>
                            @else
                              <a href="{{ asset('images/posts/bill/' . $post->billImage) }}" target="_blank">View
                                Image</a>
                            @endif
                          </span>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $post->damage }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            @if ($post->damageImage == null)
                              <span href="">No Image</span>
                            @else
                              <a href="{{ asset('images/posts/damage/' . $post->damageImage) }}" target="_blank">View
                                Image</a>
                            @endif
                          </span>
                        </td>

                        {{-- <td class="px-6 py-4 whitespace-nowrap">
                          <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-white">
                            <a href="{{ route('') }}">Delete</a>
                          </span>
                        </td> --}}



                      </tr>
                    @endforeach
                  @else
                    <p class="p-2">There is no posts</p>
                  @endif


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>



  </section>

@endsection
