@extends('vouchers.layout')

@section('breadcrumb')
Item Details
@endsection

@section('content')

<section>
  <div class="max-w-4xl mx-auto my-12 p-6 bg-white border border-gray-200 rounded-lg shadow-md">

    <div class="mb-6 text-center">
      @if($item->image)
      <img src="{{ asset('storage/itemImage/' . $item->image) }}" alt="{{ $item->title }}" class="w-64 h-64 mx-auto rounded-lg object-cover">
      @else
      <div class="w-64 h-64 mx-auto flex items-center justify-center bg-gray-200 rounded-lg">
        <span class="text-gray-500">No Image Available</span>
      </div>
      @endif
    </div>

    <h1 class="text-2xl font-bold text-gray-900 mb-4">{{ $item->title }}</h1>

    <p class="text-sm text-gray-600 mb-2">
      <strong>Category:</strong> {{ $item->category->name ?? 'N/A' }}
    </p>

    <p class="text-lg font-semibold text-green-700 mb-4">
      Price: ${{ number_format($item->price, 2) }}
    </p>

    <p class="text-sm text-gray-600 mb-2">
      <strong>Stock:</strong> {{ $item->stock > 0 ? $item->stock : 'Out of Stock' }}
    </p>

    <div class="mt-4">
      <h2 class="text-lg font-semibold text-gray-800 mb-2">Description</h2>
      <p class="text-sm text-gray-700">{{ $item->description }}</p>
    </div>

    <div class="mt-8">
      <a href="{{ route('item.index') }}" class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5">
        Back to Items
      </a>
    </div>
  </div>
</section>

@endsection
