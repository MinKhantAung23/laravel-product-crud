@extends('vouchers.layout')
@section('breadcrumb')
Edit Category
@endsection
@section('content')

<section class="my-10">
  <div class="max-w-lg mx-auto">
    <h2 class="text-xl font-bold mb-5">Edit Category</h2>
    <form action="{{ route('category.update', $category->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-4">
        <label for="name" class="block mb-1 text-sm font-medium">Category Name</label>
        <input type="text" id="name" name="name" value="{{ $category->name }}"
          class="block w-full px-3 py-2 text-sm text-gray-900 border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white  @error('name') border-red-500 @enderror" />
        @error('name')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-4">
        <label for="description" class="block mb-1 text-sm font-medium">Description</label>
        <textarea id="description" name="description" rows="4"
          class="block w-full px-3 py-2 text-sm text-gray-900 border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
          required>{{ $category->description }}</textarea>
      </div>
      <div class="flex justify-between">
        <a href="{{ route('category.index') }}"
          class="px-4 py-2 text-sm text-gray-900 bg-white border rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-200">
          Cancel
        </a>
        <button type="submit"
          class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
          Update
        </button>
      </div>
    </form>
  </div>
</section>

@endsection
