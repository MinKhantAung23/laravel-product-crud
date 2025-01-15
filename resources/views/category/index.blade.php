@extends('vouchers.layout')
@section('breadcrumb')
Manage Cateogry
@endsection
@section('content')

<section>
  @if(session('success'))
  <div id="alert-border-3" class="flex p-4 mt-4 text-green-800 border-t-4 border-green-300 bg-green-50" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M18 10c0 4.418-3.582 8-8 8S2 14.418 2 10 5.582 2 10 2s8 3.582 8 8zM9 7a1 1 0 0 0-2 0v4a1 1 0 0 0 2 0V7zm1 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" clip-rule="evenodd"></path>
    </svg>
    <div class="ml-3 text-sm font-medium">
      {{ session('success') }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 inline-flex h-8 w-8" data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 0 1 1.414 0L10 8.586l4.293-4.293a1 1 0 1 1 1.414 1.414L11.414 10l4.293 4.293a1 1 0 0 1-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 0 1-1.414-1.414L8.586 10 4.293 5.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd"></path>
      </svg>
    </button>
  </div>
  @endif
  <div class="relative border border-1 border-slate-300 overflow-x-auto shadow-md sm:rounded-lg my-12">
    <div class="flex justify-between m-5">
      <!-- Search Form -->
      <form class="max-w-lg" action="{{route('category.search')}}" method="GET">
        <label for="default-search"
          class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </div>
          <input type="search" id="default-search" name="query"
            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="" required />
        </div>
      </form>

      <!-- drawer component -->
      <div id="drawer-right-example"
        class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800"
        tabindex="-1" aria-labelledby="drawer-right-label">
        <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close menu</span>
        </button>
        <form action="{{ route('category.store')}}" method="post">
          @csrf
          <div class="space-y-4">
            <div class="space-y-2">
              <label for="default-search mb-5">Category Name</label>
              <input type="text" id="default-search" name="name" class="block w-full px-2 p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
            </div>
            <div>
              <label for="message" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Description
              </label>
              <textarea id="message" rows="4" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write your thoughts here...">
                                </textarea>
            </div>
            <div class="flex justify-between items-center">
              <a href="{{route('category.index')}}" type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</a>
              <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</button>
            </div>
          </div>
        </form>
      </div>
      <!-- Create Button -->
      <div>
        <div class="text-center">
          <div class="text-center">
            <button
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
              type="button" data-drawer-target="drawer-right-example"
              data-drawer-show="drawer-right-example" data-drawer-placement="right"
              aria-controls="drawer-right-example">
              Create Category +
            </button>
            <a type="button" href="{{ route('category.index') }}"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
              type="button">
              All
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Table -->
    @if (count($categories) > 0)
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            <div class="flex items-center">
              ID
            </div>
          </th>
          <th scope="col" class="px-6 py-3">
            Name
          </th>
          <th scope="col" class="px-6 py-3">
            Description
          </th>
          <th scope="col" class="px-6 py-3">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

          <div>
            <td class="px-6 py-4">
              <div class="flex items-center">
                {{ $loop->iteration }}
            </td>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <!-- Product -->
              <div class="flex items-center gap-x-2">

                <div>{{$category->name}}</div>
              </div>
            </th>
            <td class="px-6 py-4">
              <!-- Category -->
              {{$category->description}}
            </td>
            <td class="px-6 py-4">
              <!-- Action Buttons -->
              <div class="inline-flex rounded-md shadow-sm" role="group">
                <a
                  href="{{ route('category.edit', $category->id) }}"
                  class=" px-4 py-2 text-sm font-medium text-yellow-500 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-yellow-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-yellow-800 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                  Edit
                </a>

                <form action="{{route('category.destroy',$category->id)}}" onsubmit="return confirmDelete()" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-red-500 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-red-800 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                    Delete
                  </button>
                </form>
              </div>
            </td>
          </div>

        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <div class="text-center">
      No Category Found
    </div>
    @endif
    <div class="px-6 py-6">
      {{ $categories->links('pagination::tailwind') }}
    </div>
  </div>
</section>
<script>
  function confirmDelete() {
    return confirm('Are you sure want to delete this category ?');
  }
</script>
@endsection
