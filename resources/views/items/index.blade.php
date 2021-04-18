<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ITEM CREATE') }}

        </h2>
        <div class="justify-end">
        <a style="margin: 19px;" href="{{ route('items.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">New Item</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                  <!-- CONTENT HERE -->
                  @if(session()->get('success'))
                    <div class="alert alert-success">
                      {{ session()->get('success') }}
                    </div>
                  @endif

                  <table class="table-auto w-full">
                  <thead>
                      <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2" colspan = 2>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($items as $item)
                      <tr>
                          <td class="border px-4 py-2">{{$item->id}}</td>
                          <td class="border px-4 py-2">{{$item->title}}</td>
                          <td class="border px-4 py-2">{{$item->description}}</td>
                          <td class="border px-4 py-2 flex">
                              <a href="{{ route('items.edit',$item->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                              <form action="{{ route('items.destroy', $item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded focus:outline-none focus:shadow-outline" type="submit">Delete</button>
                              </form>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
