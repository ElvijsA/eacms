<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ITEM CREATE') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div><br />
                  @endif

                  <form method="post" action="{{ route('items.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                      @csrf
                    <div class="mb-4">
                      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Title
                      </label>
                      <input name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" placeholder="Title">
                    </div>

                    <div class="mb-4">
                      <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        Description
                      </label>
                      <input name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" placeholder="Description">
                    </div>

                    <div class="flex items-center">
                      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Submit
                      </button>
                    </div>
                  </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
