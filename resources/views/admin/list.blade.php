@extends('admin.layouts.app')

@section('content')

  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap w-full mb-20">
        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
          <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Pitchfork Kickstarter Taxidermy</h1>
          <div class="h-1 w-20 bg-indigo-500 rounded"></div>
        </div>
        <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Whatever cardigan tote bag tumblr hexagon brooklyn
          asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep
          jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
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
                      Name
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Car
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Kilometer Ran
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Fuel Cost
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Fuel Bill
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Any Damage
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Damage Image
                    </th>

                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Edit</span>
                    </th>

                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @if ($posts->count())
                    @foreach ($posts as $post)
                      <tr>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                              {{ $post->user->name }}
                            </div>
                          </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $post->car }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $post->distance }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $post->cost }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <a href="{{ asset('images/posts/' . $post->damageImage) }}">Image</a>
                          </span>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $post->damage }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <a href="{{ asset('images/posts/' . $post->damageImage) }}">Image</a>
                          </span>
                        </td>

                        {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      Admin
                    </td>
    
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td> --}}

                      </tr>
                    @endforeach
                  @else
                    <p>There is no posts</p>
                  @endif


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>



  </section>


  {{-- <div class="flex justify-center">
    <div class="w-full bg-white p-10 rounded-lg">

      <h2 class="text-4xl text-gray-900 mb-4">Listing</h2>










    </div>


  </div> --}}
@endsection
