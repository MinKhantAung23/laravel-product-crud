@extends('vouchers.layout')

@section('breadcrumb')
Manage Item
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
      <form class="max-w-lg" action="{{route('item.search')}}" method="GET">
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
        <h5 id="drawer-right-label"
          class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg
            class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
              d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
          </svg>Search Detail</h5>
        <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example"
          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close menu</span>
        </button>

        <form class="space-y-6" action="{{ route('item.searchDetail') }}" method="get">
          <div>
            <div>Price</div>
            <div class="grid gap-6 mb-6 grid-cols-2">
              <div>
                <input type="text" id="first_name" name="min"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="min" required />
              </div>
              <div>

                <input type="text" id="last_name" name="max"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="max" required />
              </div>
            </div>
          </div>
          <label for="category"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
            Category</label>
          <select id="category" name="category"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>

          <div class="text-end">
            <button type="submit" class="text-white my-4  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>

          </div>
        </form>
      </div>
      <!-- Create Button -->
      <div>
        <div class="text-center">
          <div class="text-center">
            <a href="{{ route('item.create') }}" class="me-6 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
              Item Create +
            </a>
            <button
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
              type="button" data-drawer-target="drawer-right-example"
              data-drawer-show="drawer-right-example" data-drawer-placement="right"
              aria-controls="drawer-right-example">
              Item Search
            </button>

            <a type="button" href="{{ route('item.index') }}"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
              type="button">
              All
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Table -->
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            ID
          </th>
          <th scope="col" class="px-6 py-3">
            Product
          </th>
          <th scope="col" class="px-6 py-3">
            Category
          </th>
          <th scope="col" class="px-6 py-3">
            Price
          </th>
          <th scope="col" class="px-6 py-3">
            Stock
          </th>
          <th scope="col" class="px-6 py-3 text-end">
            Created At
          </th>
          <th scope="col" class="px-6 py-3 text-end">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $item)
        <tr
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4">
            {{ $loop->iteration }}
          </td>
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            <!-- Product -->
            <div class="flex items-center gap-x-2">
              <img src="{{ asset('storage/itemImage/'.$item->image) }}"
                class="w-14 h-14 object-cover" alt="product-image">
              <div>
                <a href="{{route('item.show', $item->id)}}" class="text-black ms-3 hover:text-blue-500 underline">{{ $item->title }}</a>
              </div>
            </div>
          </th>
          <td class="px-6 py-4">
            <!-- Category -->
            {{ $item->category->name }}
          </td>
          <td class="px-6 py-4">
            <!-- Price -->
            {{ $item->price }}
          </td>
          <td class="px-6 py-4">
            <!-- Stock -->
            {{ $item->stock }}
          </td>
          <td class="px-6 py-4 text-end">
            <!-- Created At -->
            {{ $item->created_at->diffForHumans() }}
          </td>
          <td class="px-6 py-4 text-end">
            <!-- Action Buttons -->
            <div class="inline-flex rounded-md shadow-sm" role="group">
              <a href="{{route('item.edit',$item->id)}}"
                class="px-4 py-2 text-sm font-medium text-yellow-500 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-yellow-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                Edit
              </a>
              <form action="{{route('item.destroy',$item->id)}}" onsubmit="return confirmDelete()" method="post">
                @csrf
                @method('delete')
                <button type="submit"
                  class="px-4 py-2 text-sm font-medium text-red-500 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                  Delete
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="px-6 py-6">
      {{ $items->links('pagination::tailwind') }}
    </div>
  </div>
</section>
<script>
  function confirmDelete() {
    return confirm('Are you sure want to delete this Item ?');
  }
</script>


@endsection
