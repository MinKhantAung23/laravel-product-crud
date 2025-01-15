@extends('vouchers.layout')

@section('breadcrumb')
Edit Item
@endsection
@section('content')

<section>
  <div class="max-w-4xl mx-auto p-4">
    <form action="{{ route('item.update', $item->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('put')
      <!-- Product Photo -->
      <div class="mb-4">
        @if (isset($item->image) && $item->image)
        <div class="relative flex items-center justify-center w-full">
          <img src="{{ asset('storage/itemImage/' . $item->image) }}" alt="Product Image" class="w-full h-64 object-cover rounded-lg">

          <label for="dropzone-file"
            class="absolute top-2 right-2 flex items-center justify-center w-10 h-10 bg-gray-800 bg-opacity-70 rounded-full cursor-pointer hover:bg-opacity-90">
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            <input id="dropzone-file" type="file" name="image" class="hidden" />
          </label>
        </div>
        @else
        <div class="flex items-center justify-center w-full">
          <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
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
        @endif
      </div>


      <!-- Product Title, Category, Price, and Stock -->
      <div class="flex space-x-4 mb-4">
        <div class="flex-1">
          <label for="title" class="block text-sm font-medium text-gray-700">Product Title</label>
          <input type="text" id="title" name="title"
            value="{{ $item->title }}"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
          @error('title')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="flex-1">
          <label for="product-category" class="block text-sm font-medium text-gray-700">Category</label>
          <select id="product-category" name="category_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
            @endforeach
          </select>
          @error('category_id')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="flex-1">
          <label for="product-price" class="block text-sm font-medium text-gray-700">Price</label>
          <input type="number" id="product-price" name="price"
            value="{{ $item->price }}"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
          @error('price')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="flex-1">
          <label for="product-stock" class="block text-sm font-medium text-gray-700">Stock</label>
          <input type="number" id="product-stock" name="stock"
            value="{{ $item->stock }}"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
          @error('stock')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- Product Description -->
      <div class="mb-4">
        <label for="product-description" class="block text-sm font-medium text-gray-700">Product
          Description
        </label>
        <textarea id="product-description" name="description" rows="4"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        {{ $item->description }}
        </textarea>
        @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Save and Cancel Buttons -->
      <div class="flex justify-end space-x-4">
        <a
          href="{{ route('item.index') }}"
          type="button"
          class="text-gray-700 bg-white border border-gray-300 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-md text-sm px-4 py-2 hover:bg-gray-100 hover:text-blue-700">
          Cancel
        </a>
        <button type="submit"
          class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-md text-sm px-4 py-2">Update</button>
      </div>
    </form>
  </div>
</section>

@endsection
