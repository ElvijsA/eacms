<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-400 leading-tight">
            {{ __('ITEM CREATE') }}

        </h2>
        <div class="justify-end">
        <a style="margin: 19px;" href="{{ route('items.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">New Item</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                  <!-- CONTENT HERE -->
                  @if(session()->get('success'))
                  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{ session()->get('success') }}</strong>
                  </div>
                  @endif

                  <table class="table-auto w-full">
                  <thead>
                      <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="text-left px-4 py-2">Description</th>
                        <th class="text-right px-4 py-2 ">Actions</th>
                      </tr>
                  </thead>
                  <tbody class="border-b-2">
                      @foreach($items as $item)
                      <tr class="border-t-2">
                          <td class=" px-4 py-2">{{$item->id}}</td>
                          <td class=" px-4 py-2">{{$item->title}}</td>
                          <td class=" px-4 py-2">{{$item->description}}</td>
                          <td class=" px-4 py-2 flex justify-end">
                              <a href="{{ route('items.edit',$item->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 focus:outline-none focus:shadow-outline">Edit</a>
                              <form action="{{ route('items.destroy', $item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 mx-1 focus:outline-none focus:shadow-outline" type="submit">Delete</button>
                              </form>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>

                <!-- PAGINATION -->

            </div>
        </div>
    </div>
</x-app-layout>
