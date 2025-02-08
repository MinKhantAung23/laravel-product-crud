@extends('vouchers.layout')

@section('breadcrumb')
Item Create
@endsection
@section('content')

<section>
  <div class="max-w-4xl mx-auto p-4">
    <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <!-- Product Photo -->
      <div class="mb-4">

        <div class="flex items-center justify-center w-full">
          <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
              <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="2"
                  d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
              </svg>
              <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                  to upload</span> or drag and drop</p>
              <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
              </p>
            </div>
            <input id="dropzone-file" type="file" name="image" class="hidden" />
          </label>
        </div>

      </div>

      <!-- Product Title, Category, Price, and Stock -->
      <div class="flex space-x-4 mb-4">
        <div class="flex-1">
          <label for="product-title" class="block text-sm font-medium text-gray-700">Product Title</label>
          <input type="text" id="product-title" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />

        </div>
        <div class="flex-1">
          <label for="product-category" class="block text-sm font-medium text-gray-700">Category</label>
          <select id="product-category" name="category_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex-1">
          <label for="product-price" class="block text-sm font-medium text-gray-700">Price</label>
          <input type="number" id="product-price" name="price"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
        </div>
        <div class="flex-1">
          <label for="product-stock" class="block text-sm font-medium text-gray-700">Stock</label>
          <input type="number" id="product-stock" name="stock"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
        </div>
      </div>

      <!-- Product Description -->
      <div class="mb-4">
        <label for="product-description" class="block text-sm font-medium text-gray-700">Product
          Description</label>
        <textarea id="product-description" name="description" rows="4"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></textarea>
      </div>

      <!-- Save and Cancel Buttons -->
      <div class="flex justify-end space-x-4">
        <a href="{{ route('item.index') }}" class="text-gray-700 bg-white border border-gray-300 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-md text-sm px-4 py-2 hover:bg-gray-100 hover:text-blue-700">Cancel</a>
        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-md text-sm px-4 py-2">Save</button>
      </div>
    </form>
  </div>

</section>

@endsection