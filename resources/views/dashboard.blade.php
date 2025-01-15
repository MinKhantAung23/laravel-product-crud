<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-primary p-6 text-gray-900">
          <h1 class="text-2xl font-bold ">Product CRUD</h1>
          <p class="mt-2 text-gray-600 ">
            This is a simple CRUD app built with Laravel and Tailwind CSS.
            It allows you to create, read, update, and delete products.
            And you can also manage categories.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="h-screen max-w-7xl mx-auto">
    <div class="flex justify-between gap-x-10">
      <div class="bg-gradient-to-bl from-background-400 to-background-600 flex justify-center items-center w-full h-64 text-slate-300 hover:shadow-xl">

        <div>
          <a href="{{ route('category.index') }}" class="text-xl bg-primary-200 text-white rounded-lg p-8 hover:shadow-lg hover:shadow-white">
            Manage category
          </a>
        </div>
      </div>

      <div class="bg-gradient-to-tl from-background-400 to-background-600  flex justify-center items-center w-full h-64 text-slate-300 hover:shadow-xl">
        <div>
          <a href="{{ route('item.index') }}" class="text-xl bg-primary-200 text-white rounded-lg p-8 hover:shadow-lg hover:shadow-white">
            Manage Product
          </a>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
